<?php

namespace Beanstalk\Command;

use JMS\Serializer\Annotation\Type;

class CreateRepository extends WriteRepository
{
    /**
     * @var string
     * @Type("string")
     */
    private $name;

    /**
     * @var string
     * @Type("string")
     */
    private $title;

    /**
     * @var string
     * @Type("string")
     */
    private $colorLabel;

    /**
     * @var string
     * @Type("string")
     */
    private $type;

    /**
     * @param string $name
     * @param string $title
     * @param string $color
     * @param string $type
     */
    public function __construct($name, $title, $color, $type)
    {
        $this->name = $name;
        $this->type = $type;
        $this->title = $title;
        $this->colorLabel = $color;
    }
}
