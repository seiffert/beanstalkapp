<?php

namespace Beanstalk\Model;

use JMS\Serializer\Annotation\HandlerCallback;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\JsonDeserializationVisitor;

class TagResponse
{
    /** @var string */
    private $tag;

    /**
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @HandlerCallback("json", direction = "deserialization")
     */
    public function deserializeFromJson(JsonDeserializationVisitor $visitor, $data, DeserializationContext $context)
    {
        $this->tag = new Tag($data['tag']);
    }
}
