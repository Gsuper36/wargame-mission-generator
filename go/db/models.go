package db

import (
	"database/sql/driver"
	"encoding/json"
	"errors"
	"fmt"

	"gorm.io/gorm"
)

type Twist struct {
	gorm.Model
	Title       string
	Description string
	Rules       string
}

type Deployment struct {
	gorm.Model
	PlayerAPoints  Points
	PlayerBPoints  Points
	DistancePoinst Points
}

type Battlefield struct {
	gorm.Model
	Title      string
	Width      int
	Height     int
	PowerLevel int
	Points     int
}

type Objective struct {
	gorm.Model
	Title       string
	Description string
	RulesText   string
	Primary     bool
}

type Terrain struct {
	gorm.Model
	Title       string
	Description string
	Rules       string
	RulesShort  string
}

type TerrainTrait struct {
	gorm.Model
	Title      string
	Rules      string
	RulesShort string
}

type TerrainCategory struct {
	gorm.Model
	Title      string
	Rules      string
	RulesShort string
}

type Point struct {
	ID        int
	XValue    float32
	YValue    float32
	Relations []int
}

type Points struct {
	Points []Point
}

func (p *Points) Scan(value interface{}) error {

	bytes, ok := value.([]byte)

	if !ok {
		return errors.New(fmt.Sprint("Failed to unmarshal JSONB value:", value))
	}

	result := json.RawMessage{}

	err := json.Unmarshal(bytes, &result)
	fmt.Println(result)

	return err
}

func (p Points) Value() (driver.Value, error) {
	if len(p.Points) == 0 {
		return nil, nil
	}

	return json.Marshal(p.Points)
}
