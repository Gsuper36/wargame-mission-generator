package server

import (
	"context"
	"sync"

	"github.com/linni/mission/generator/db"
	"github.com/linni/mission/generator/proto"
	pb "github.com/linni/mission/generator/proto"
	"gorm.io/gorm"
)


type MissionGeneratorServer struct {
	pb.UnimplementedMissionGeneratorServer
	dbConnection *gorm.DB
	syncGroup *sync.WaitGroup
}

func NewMissionGeneratorServer(conn *gorm.DB) *MissionGeneratorServer {
	return &MissionGeneratorServer{
		dbConnection: conn,
		syncGroup: &sync.WaitGroup{},
	}
}

func (s *MissionGeneratorServer) Generate(
	ctx context.Context, 
	request *pb.GenerateMissionRequest,
) (*pb.Mission, error) {
	mission := Mission{}
	go s.setTwist(&mission)
	go s.setObjectives(&mission)
	go s.setDeployment(&mission)
	go s.setBattlefield(&mission)
	s.syncGroup.Wait()
	return &mission.Mission, nil
}

func (s *MissionGeneratorServer) setTwist(mission *Mission) {
	var twist db.Twist
	conn := s.dbConnection
	
	s.syncGroup.Add(1)

	conn.First(&twist).Order("ORDER BY RANDOM")
	
	mission.Lock()
	mission.Mission.Twist = &pb.Mission_Twist{
		Title: twist.Title,
		Description: twist.Description,
		Rules: twist.Rules,
	}
	mission.Unlock()
	
	s.syncGroup.Done()
}

func (s *MissionGeneratorServer) setObjectives(mission *Mission) {
	var objectives []db.Objective
	var protoObjectives []*proto.Mission_Objective
	conn := s.dbConnection

	s.syncGroup.Add(1)
	conn.Limit(3).Find(&objectives).Order("ORDER BY RANDOM")
	for _, objective := range objectives {
		protoObjectives = append(protoObjectives, &proto.Mission_Objective{
			Title: objective.Title,
			Description: objective.Description,
			RulesText: objective.RulesText,
			Primary: true,
			ObjectivePoints: nil,
		})
	}
	mission.Lock()
	mission.Mission.Objectives = protoObjectives
	mission.Unlock()
	s.syncGroup.Done()
}

func (s *MissionGeneratorServer) setDeployment(mission *Mission) {
	conn := s.dbConnection
	var deployment db.Deployment

	s.syncGroup.Add(1)
	conn.First(&deployment).Order("ORDER BY RANDOM")
	mission.Lock()
	mission.Mission.Deployment = &proto.Mission_Deployment{
		PlayerAPoints: nil,
		PlayerBPoints: nil,
		DistancePoints: nil,
	}
	mission.Unlock()
	s.syncGroup.Done()
}

func (s *MissionGeneratorServer) setBattlefield(mission *Mission) {
	var battlefield db.Battlefield
	conn := s.dbConnection

	s.syncGroup.Add(1)
	conn.First(&battlefield).Order("ORDER BY RANDOM")
	mission.Lock()
	mission.Mission.Battlefield = &proto.Mission_Battlefield{
		Title: battlefield.Title,
		Width: int32(battlefield.Width),
		Height: int32(battlefield.Height),
		PowerLevel: int32(battlefield.PowerLevel),
		Points: int32(battlefield.Points),
	}
	mission.Unlock()
	s.syncGroup.Done()
}

type Mission struct {
	sync.Mutex
	pb.Mission
}