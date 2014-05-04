<?php

namespace Beanstalk\Subscriber;

use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Command\Guzzle\Command;
use GuzzleHttp\Event\SubscriberInterface;
use JMS\Serializer\SerializerInterface;

class DeserializeResponse implements SubscriberInterface
{
    /** @var SerializerInterface */
    private $serializer;

    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param ProcessEvent $event
     */
    public function onProcess(ProcessEvent $event)
    {
        $response = $event->getResponse();

        $body = $response->getBody();
        $body->seek(0);
        $body = $body->getContents();

        $command = $event->getCommand();

        if ($command instanceof Command) {
            $operation = $command->getOperation();

            $modelName = $operation->getResponseModel();
            if (!$modelName) {
                return;
            }

            $result = $this->serializer->deserialize($body, $modelName, 'json');

            $event->setResult($result);
            $event->stopPropagation();
        }
    }

    /**
     * @return array
     */
    public function getEvents()
    {
        return ['process' => ['onProcess', 10]];
    }
}
