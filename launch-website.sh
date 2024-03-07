#!/bin/bash

# Check docker is available
docker stats --no-stream > /dev/null 2>&1
if [ $? -ne 0 ]; then
  echo "Docker is not available!"
  exit 1
fi

# Place us in script directory
cd -P -- "$(dirname -- "$0")"

export registry="${registry:-docker.io}"

# Force cleanup before run
docker compose rm -fsv

docker compose up --quiet-pull

docker compose down -v
docker rmi -f portfolio-v2-portfolio
