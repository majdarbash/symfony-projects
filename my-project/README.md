## Starting up the project

### Using docker machine:
bash <(curl -s  https://raw.githubusercontent.com/majdarbash/docker-machine-symfony/master/run.sh)


### Using native docker (with nfs support):
```
1. Expose your "/Users" directory over NFS:
    
2. Launch your docker using:
    export SOURCE_DIRECTORY=$PWD
    docker-compose up -d
```

## Running the server
docker-machine ssh symfony \
docker exec -it app bash \
cd /app/my-project \
bin/console server:run 0.0.0.0:80 