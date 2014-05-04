<?php

namespace Beanstalk;

use Beanstalk\RequestLocation\JsonLocation;
use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Guzzle\GuzzleClientInterface;
use GuzzleHttp\Subscriber\Log\Formatter;
use GuzzleHttp\Subscriber\Log\LogSubscriber;
use Beanstalk\Subscriber\DeserializeResponse;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

class BeanstalkFactory
{
    /**
     * @param array $config
     * @return Beanstalk
     */
    public function create(array $config)
    {
        return new Beanstalk($this->createApiClient(new Configuration($config)));
    }

    /**
     * @param Configuration $configuration
     * @return GuzzleClientInterface
     */
    private function createApiClient(Configuration $configuration)
    {
        $client = new GuzzleClient(
            $this->createHttpClient($configuration),
            $this->createServiceDescription($configuration),
            [
                'request_locations' => ['json' => $this->createRequestLocationVisitor($configuration)],
                'validate' => false
            ]
        );

        $client->getEmitter()->attach(new DeserializeResponse($this->createSerializer($configuration)));

        return $client;
    }

    /**
     * @param Configuration $configuration
     * @return Client
     */
    private function createHttpClient(Configuration $configuration)
    {
        $client = new Client([
            'defaults' => [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'User-Agent' => $configuration->getAppName()
                ],
                'auth' => [$configuration->getUsername(), $configuration->getAccessToken()]
            ]
        ]);

        $client->getEmitter()->attach($this->createLogSubscriber($configuration));

        return $client;
    }

    /**
     * @param Configuration $configuration
     * @return Description
     */
    private function createServiceDescription(Configuration $configuration)
    {
        $descriptionData = json_decode(file_get_contents($configuration->getDescriptionPath()), true);
        $descriptionData['baseUrl'] = sprintf('https://%s.beanstalkapp.com/api/', $configuration->getAccount());

        return new Description($descriptionData);
    }

    /**
     * @param Configuration $configuration
     * @return LogSubscriber
     */
    private function createLogSubscriber(Configuration $configuration)
    {
        $format = $configuration->isDebugModeEnabled() ? Formatter::DEBUG : null;

        return new LogSubscriber($configuration->getLogger(), $format);
    }

    /**
     * @param Configuration $configuration
     * @return SerializerInterface
     */
    private function createSerializer(Configuration $configuration)
    {
        $builder = new SerializerBuilder();

        $builder->setMetadataDirs([
            'Beanstalk\\Model' => __DIR__ . '/Model'
        ]);
        $builder->setDebug($configuration->isDebugModeEnabled());
        $builder->setCacheDir($configuration->getCacheDir());

        return $builder->build();
    }

    /**
     * @param Configuration $configuration
     * @return JsonLocation
     */
    private function createRequestLocationVisitor(Configuration $configuration)
    {
        return new JsonLocation($this->createSerializer($configuration));
    }
}
