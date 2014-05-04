<?php

namespace Beanstalk;

use Beanstalk\Command\UpdateRepository;
use Beanstalk\Model\ReadRepository;
use Beanstalk\Model\RepositoryRequest;
use Beanstalk\Model\RepositoryResponse;
use GuzzleHttp\Command\Guzzle\GuzzleClientInterface;

class Beanstalk
{
    /** @var GuzzleClientInterface */
    private $apiClient;

    /**
     * @param GuzzleClientInterface $apiClient
     */
    public function __construct(GuzzleClientInterface $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * @return ReadRepository[]
     */
    public function findAllRepositories()
    {
        return array_map(
            function (RepositoryResponse $response) {
                return $response->getRepository();
            },
            $this->apiClient->findAllRepositories()
        );
    }

    /**
     * @param int $id
     * @param UpdateRepository $repository
     */
    public function updateRepository($id, UpdateRepository $repository)
    {
        $this->apiClient->updateRepository(['id' => $id, 'body' => new RepositoryRequest($repository)]);
    }
}
