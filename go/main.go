package main

import (
	"os"
	"fmt"
	"github.com/joho/godotenv"
)

// Здесь будем читать конфиг и запускать сервис
func main() {
	loadEnv()

	serverPort := os.Getenv("GENERATOR_PORT")

	fmt.Print(serverPort)
}

func loadEnv() {
	err := godotenv.Load(".env")

	if err != nil {
		panic(err)
	}
}
