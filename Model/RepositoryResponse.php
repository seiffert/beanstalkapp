<?php

namespace Beanstalk\Model;

use JMS\Serializer\Annotation\HandlerCallback;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\JsonDeserializationVisitor;

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

    /**
     * @HandlerCallback("json", direction = "deserialization")
     */
    public function deserializeFromJson(JsonDeserializationVisitor $visitor, $data, DeserializationContext $context)
    {
        $this->repository = $context->accept(current($data), ['name' => 'Beanstalk\Model\Repository']);
    }
}
