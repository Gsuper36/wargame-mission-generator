package main

import (
	"fmt"
	"os"

	"github.com/joho/godotenv"
	"github.com/linni/mission/generator/db"
	"github.com/linni/mission/generator/server"
	"gorm.io/gorm"
)

// Здесь будем читать конфиг и запускать сервис
func main() {
	loadEnv()

	databaseConnection, err := db.MakeConnection(
		db.ConnectionParams{
			Username: os.Getenv("DB_USERNAME"),
			Password: os.Getenv("DB_PASSWORD"),
			Host: os.Getenv("DB_HOST"),
			Port: os.Getenv("DB_PORT"),
			Database: os.Getenv("DB_DATABASE"),
		},
		gorm.Config{},
	)

	if err != nil {
		panic(err)
	}

	server := server.NewMissionGeneratorServer(databaseConnection)
}

func loadEnv() {
	err := godotenv.Load(".env")

	if err != nil {
		panic(err)
	}
}
