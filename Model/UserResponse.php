<?php

namespace Beanstalk\Model;

use JMS\Serializer\Annotation\HandlerCallback;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\JsonDeserializationVisitor;

class UserResponse
{
    /**
     * @var Repository
     * @Type("Beanstalk\Model\User")
     */
    private $user;

    /**
     * @return Repository
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @HandlerCallback("json", direction = "deserialization")
     */
    public function deserializeFromJson(JsonDeserializationVisitor $visitor, $data, DeserializationContext $context)
    {
        $this->user = $context->accept(current($data), ['name' => 'Beanstalk\Model\User']);
    }
}
