# Introduction
This is a demo project for kafka that consist of `producer` app using Kafka producer to write messages to Kafka topic called `TRUCK_ENGINE_SENSORS` , these data is filtered and mapped by `kafkaStream` app using Kafka stream processing and processed messages pushed to three different tpics `TRUCK_1_SENSORS, TRUCK_2_SENSORS, TRUCK_3_SENSORS`, then this data is consumed by `kafkaConsumer` app using Kafka consumer and emit consumed data using socket to the frontend to draw a realtime chart for sensors data.
## Project Prerequisites
* Docker
## Project Installing
Please follow these steps to get your project up and running
1. `docker-compose up -d --build zookeeper kafka`
2. `docker exec -it kafka bash`
3. `/app/create-topics.sh`
4. `exit`
5. `docker-compose up -d --build consumer producer streamprocessing`

## Browse to you app from [here](http://localhost:4000)