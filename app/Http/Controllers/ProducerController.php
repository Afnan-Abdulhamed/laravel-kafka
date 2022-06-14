<?php

namespace App\Http\Controllers;

use Junges\Kafka\Facades\Kafka;

class ProducerController
{
    public function __invoke()
    {
        // 1 - Configure MSG
        Kafka::publishOn('laravel-topic')
            ->withBodyKey('Message', 'Afnan')
            ->withConfigOptions([
                'compression.codec' => 'gzip'
            ])
//            ->withHeaders([ // configure msg header.
//                'foo-header' => 'foo-value'
//            ])
            ->send(); // 2- Send.


        return response()->json('Message published!'); // TODO: check this??
    }

    //TODO: Producing message batch to kafka.
}
