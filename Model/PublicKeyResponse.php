<?php

namespace Beanstalk\Model;

use JMS\Serializer\Annotation\HandlerCallback;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\JsonDeserializationVisitor;

class PublicKeyResponse
{
    /**
     * @var PublicKey
     * @Type("Beanstalk\Model\PublicKey")
     */
    private $publicKey;

    /**
     * @return PublicKey
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /**
     * @HandlerCallback("json", direction = "deserialization")
     */
    public function deserializeFromJson(JsonDeserializationVisitor $visitor, $data, DeserializationContext $context)
    {
        $this->publicKey = $context->accept(current($data), ['name' => 'Beanstalk\Model\PublicKey']);
    }
}
