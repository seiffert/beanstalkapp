<?php

namespace Beanstalk\Model;

use Beanstalk\Command\WriteRepository;

class RepositoryRequest
{
    /**
     * @var WriteRepository
     */
    private $repository;

    /**
     * @param WriteRepository $repository
     */
    public function __construct(WriteRepository $repository)
    {
        $this->repository = $repository;
    }
}
