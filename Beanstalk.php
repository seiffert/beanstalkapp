<?php

namespace Beanstalk;

use Beanstalk\Command\CreateRepository;
use Beanstalk\Command\CreateUser;
use Beanstalk\Command\UpdateRepository;
use Beanstalk\Command\UpdateUser;
use Beanstalk\Model\Branch;
use Beanstalk\Model\BranchResponse;
use Beanstalk\Model\PublicKey;
use Beanstalk\Model\PublicKeyResponse;
use Beanstalk\Model\Repository;
use Beanstalk\Model\RepositoryRequest;
use Beanstalk\Model\RepositoryResponse;
use Beanstalk\Model\Tag;
use Beanstalk\Model\TagResponse;
use Beanstalk\Model\User;
use Beanstalk\Model\UserRequest;
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
     * Admin privileges required for this API method.
     *
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
     * Admin privileges required for this API method.
     *
     * @param int $id
     * @param UpdateRepository $repository
     */
    public function updateRepository($id, UpdateRepository $repository)
    {
        $this->apiClient->updateRepository(['id' => $id, 'body' => new RepositoryRequest($repository)]);
    }

    /**
     * Returns an array of repository’s tags. For Subversion always returns an empty array.
     *
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
     * Returns an array of repository’s branches. For Subversion always returns an empty array.
     *
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
     * Admin privileges required for this API method.
     *
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
     * Admin privileges required for this API method.
     *
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
     * Returns currently logged in user.
     *
     * @return User
     */
    public function findCurrentUser()
    {
        return $this->apiClient->findCurrentUser();
    }

    /**
     * Admin privileges required for this API method.
     *
     * @param CreateUser $user
     * @return User
     */
    public function createUser(CreateUser $user)
    {
        /** @var UserResponse $response */
        $response = $this->apiClient->createUser(['body' => new UserRequest($user)]);

        return $response->getUser();
    }

    /**
     * Admin privileges required for this API method.
     *
     * @param int $id
     * @param UpdateUser $user
     */
    public function updateUser($id, UpdateUser $user)
    {
        $this->apiClient->updateUser(['id' => $id, 'body' => new UserRequest($user)]);
    }

    /**
     * Admin privileges required for this API method.
     * You can not delete account owner.
     *
     * @param int $id
     */
    public function deleteUser($id)
    {
        $this->apiClient->deleteUser(['id' => $id]);
    }

    /**
     * Admins can pass user_id parameter to fetch keys for all account’s users. Otherwise only current user’s keys are
     * returned.
     *
     * @param int $userId
     * @return array|PublicKey[]
     */
    public function findAllPublicKeys($userId = null)
    {
        return array_map(
            function (PublicKeyResponse $response) {
                return $response->getPublicKey();
            },
            $this->apiClient->findAllPublicKeys(['user_id' => $userId])
        );
    }
}
