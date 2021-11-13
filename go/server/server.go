package server

import (
	"context"

	pb "github.com/linni/mission/generator/proto"
	"gorm.io/gorm"
)


type MissionGeneratorServer struct {
	pb.UnimplementedMissionGeneratorServer
	dbConnection *gorm.DB
}

func NewMissionGeneratorServer(conn *gorm.DB) *MissionGeneratorServer {
	return &MissionGeneratorServer{
		dbConnection: conn,
	}
}

func (s *MissionGeneratorServer) Generate(
	ctx context.Context, 
	request *pb.GenerateMissionRequest,
) (*pb.Mission, error) {
	return &pb.Mission{}, nil
}