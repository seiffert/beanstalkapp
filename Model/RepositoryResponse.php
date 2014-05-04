<?php

namespace Beanstalk\Model;

use JMS\Serializer\Annotation\Type;

class RepositoryResponse
{
    /**
     * @var Repository
     * @Type("Beanstalk\Model\Repository")
     */
    private $repository;

    /**
     * @return Repository
     */
    public function getRepository()
    {
        return $this->repository;
    }
}
