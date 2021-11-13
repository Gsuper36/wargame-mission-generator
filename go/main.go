package main

import (
	"fmt"
	"os"

	"github.com/joho/godotenv"
	"github.com/linni/mission/generator/db"
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
}

func loadEnv() {
	err := godotenv.Load(".env")

	if err != nil {
		panic(err)
	}
}
