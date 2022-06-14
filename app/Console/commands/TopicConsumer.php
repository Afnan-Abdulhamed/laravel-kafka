<?php

namespace App\Console\Commands;

use App\Handlers\TestHandler;
use Illuminate\Console\Command;
use Junges\Kafka\Facades\Kafka;

class TopicConsumer extends Command
{
    protected $signature = 'kafka:topic-consume';

    protected $description = 'Consume laravel-topic Topic';

    public function handle(): void
    {
        $consumer = Kafka::createConsumer() // 1- create consumer.
            ->subscribe('laravel-topic') // 2- subscribe to topic.
            ->withHandler(new TestHandler)
            ->withAutoCommit()
            ->withConsumerGroupId('group1')
            ->withOptions([
                'compression.codec' => 'gzip',
                'builtin.features' => 'gzip'
            ])
            ->build(); // build consumer.

        $consumer->consume();
    }
}
