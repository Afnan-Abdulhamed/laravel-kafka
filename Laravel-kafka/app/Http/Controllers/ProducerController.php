<?php

namespace App\Http\Controllers;

use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;

class ProducerController
{
    public function __invoke()
    {
        $path = storage_path() . "/dump-data/truck_engine_sensors.json";
        $sensor_reads = json_decode(file_get_contents($path), true);

        foreach ($sensor_reads as $key => $read) {
            $message = new Message(
//                headers: ['header-key' => 'header-value'],
                body: [
                    'truck_id' => $read['truck_id'],
                    'engine_temperature' => $read['engine_temperature'],
                    'average_rpm' => $read['average_rpm'],
                ],
                key: 'Read ' . $key
            );

        // Publish to producer.
        Kafka::publishOn('laravel-topic')
            ->withMessage($message)
            ->withConfigOptions([
                'compression.codec' => 'gzip'
            ])
            ->send();


        echo  'Read ' . $key . ' Published !' . '<br>';
        }
    }
}
