package db

import (
	"fmt"

	"gorm.io/driver/postgres"
	"gorm.io/gorm"
)

type ConnectionParams struct {
	Username string 
	Password string
	Host string
	Port string
	Database string
}

func MakeConnection(params ConnectionParams, config gorm.Config) (*gorm.DB, error) {
	return gorm.Open(
		postgres.Open(
			fmt.Sprintf(
				"user=%s password=%s host=%s port=%s dbname=%s sslmode=disable",
				params.Username,
				params.Password,
				params.Host,
				params.Port,
				params.Database,
		)),
		&config,
	)
}