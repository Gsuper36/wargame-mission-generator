package main

import (
	"fmt"
	"net"
	"os"

	"github.com/joho/godotenv"
	"github.com/linni/mission/generator/db"
	"github.com/linni/mission/generator/server"
	pb "github.com/linni/mission/generator/proto"
	"google.golang.org/grpc"
	"gorm.io/gorm"
)

// Здесь будем читать конфиг и запускать сервис
func main() {
	loadEnv()

	databaseConnection := databaseConnection()

	lis, err := net.Listen("tcp", fmt.Sprintf("localhost:%s", os.Getenv("GENERATOR_PORT")))

	if err != nil {
		panic(err)
	}

	var opts []grpc.ServerOption

	grpcServer := grpc.NewServer(opts...)
	pb.RegisterMissionGeneratorServer(grpcServer, server.NewMissionGeneratorServer(&databaseConnection))
	grpcServer.Serve(lis)
}

func loadEnv() {
	err := godotenv.Load(".env")

	if err != nil {
		panic(err)
	}
}

func databaseConnection() gorm.DB {
	conn, err := db.MakeConnection(
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

	return *conn
}
