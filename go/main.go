package main

import (
	"os"
	"fmt"
	"github.com/joho/godotenv"
	"github.com/linni/mission/generator/db"
)

// Здесь будем читать конфиг и запускать сервис
func main() {
	loadEnv()

	model := db.Mission{};
}

func loadEnv() {
	err := godotenv.Load(".env")

	if err != nil {
		panic(err)
	}
}
