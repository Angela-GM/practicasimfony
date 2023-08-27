# practicasimfony

1. docker-compose up -d
2. docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' my-symfony-app
