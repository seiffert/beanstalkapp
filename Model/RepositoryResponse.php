<?php

namespace Beanstalk\Model;

use JMS\Serializer\Annotation\Type;

class RepositoryResponse
{
    /**
     * @var ReadRepository
     * @Type("Beanstalk\Model\ReadRepository")
     */
    private $repository;

    /**
     * @return ReadRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }
}
