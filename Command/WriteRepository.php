<?php

namespace Beanstalk\Command;

class WriteRepository
{
    /**
     * Human-readable name. Required on create.
     *
     * @var string
     * @Type("string")
     */
    protected $title;

    /**
     * Name of the specified color label. White by default.
     * (white / pink / red / red-orange / orange / yellow / yellow-green / aqua-green / green / green-blue / sky-blue /
     * light-blue / blue / orchid / violet / brown / black / grey)
     *
     * @var string
     * @Type("string")
     */
    protected $colorLabel;

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
