<?php

namespace Beanstalk\Command;

use JMS\Serializer\Annotation\Type;

class UpdateRepository extends WriteRepository
{
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
     * @param string $title
     * @param string $color
     */
    public function __construct($title, $color = null)
    {
        $this->title = $title;
        $this->colorLabel = $color;
    }
}
