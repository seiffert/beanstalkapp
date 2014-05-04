<?php

namespace Beanstalk\RequestLocation;

use GuzzleHttp\Command\Guzzle\GuzzleCommandInterface;
use GuzzleHttp\Command\Guzzle\Operation;
use GuzzleHttp\Command\Guzzle\Parameter;
use GuzzleHttp\Command\Guzzle\RequestLocation\RequestLocationInterface;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Stream\Stream;
use JMS\Serializer\SerializerInterface;

class JsonLocation implements RequestLocationInterface
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
     * Visits a location for each top-level parameter
     *
     * @param GuzzleCommandInterface $command Command being prepared
     * @param RequestInterface $request Request being modified
     * @param Parameter $param Parameter being visited
     * @param array $context Associative array containing a
     *     'client' key referencing the client that created the command.
     */
    public function visit(
        GuzzleCommandInterface $command,
        RequestInterface $request,
        Parameter $param,
        array $context
    ) {

        $body = $this->serializer->serialize($command[$param->getName()], 'json');

        $request->setBody(Stream::factory($body));
    }

    /**
     * Called when all of the parameters of a command have been visited.
     *
     * @param GuzzleCommandInterface $command Command being prepared
     * @param RequestInterface $request Request being modified
     * @param Operation $operation Operation being serialized
     * @param array $context Associative array containing a
     *     'client' key referencing the client that created the command.
     */
    public function after(
        GuzzleCommandInterface $command,
        RequestInterface $request,
        Operation $operation,
        array $context
    ) {
        // TODO: Implement after() method.
    }
}
