<?php

namespace Beanstalk;

use Beanstalk\Command\CreateRepository;
use Beanstalk\Command\UpdateRepository;
use Beanstalk\Model\Branch;
use Beanstalk\Model\BranchResponse;
use Beanstalk\Model\Repository;
use Beanstalk\Model\RepositoryRequest;
use Beanstalk\Model\RepositoryResponse;
use Beanstalk\Model\Tag;
use Beanstalk\Model\TagResponse;
use Beanstalk\Model\User;
use Beanstalk\Model\UserResponse;
use GuzzleHttp\Command\Exception\CommandException;
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
     * @return Repository[]
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
     * @throws CommandException
     * @return Repository|null
     */
    public function findRepository($id)
    {
        try {
            return $this->apiClient->findRepository(['id' => $id]);
        } catch (CommandException $e) {
            if ($e->getResponse() && 404 == $e->getResponse()->getStatusCode()) {
                return null;
            }

            throw $e;
        }
    }

    /**
     * @param CreateRepository $repository
     * @return Repository
     */
    public function createRepository(CreateRepository $repository)
    {
        /** @var RepositoryResponse $response */
        $response = $this->apiClient->createRepository(['body' => new RepositoryRequest($repository)]);

        return $response->getRepository();
    }

    /**
     * @param int $id
     * @param UpdateRepository $repository
     */
    public function updateRepository($id, UpdateRepository $repository)
    {
        $this->apiClient->updateRepository(['id' => $id, 'body' => new RepositoryRequest($repository)]);
    }

    /**
     * @param int $id
     * @return array|Tag[]
     */
    public function findTags($id)
    {
        return array_map(
            function (TagResponse $response) {
                return $response->getTag();
            },
            $this->apiClient->findTags(['id' => $id])
        );
    }

    /**
     * @param int $id
     * @return array|Branch[]
     */
    public function findBranches($id)
    {
        return array_map(
            function (BranchResponse $response) {
                return $response->getBranch();
            },
            $this->apiClient->findBranches(['id' => $id])
        );
    }

    /**
     * @return array|User[]
     */
    public function findAllUsers()
    {
        return array_map(
            function (UserResponse $response) {
                return $response->getUser();
            },
            $this->apiClient->findAllUsers()
        );
    }

    /**
     * @param int $id
     * @return null|User
     * @throws CommandException
     */
    public function findUser($id)
    {
        try {
            return $this->apiClient->findUser(['id' => $id]);
        } catch (CommandException $e) {
            if ($e->getResponse() && 404 == $e->getResponse()->getStatusCode()) {
                return null;
            }

            throw $e;
        }
    }

    /**
     * @return User
     */
    public function findCurrentUser()
    {
        return $this->apiClient->findCurrentUser();
    }
}
