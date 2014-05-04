<?php

namespace Beanstalk\Command;

use JMS\Serializer\Annotation\Type;

class CreateRepository extends WriteRepository
{
    /**
     * File-system name.
     * Required on create. Must be unique in account.
     *
     * @var string
     * @Type("string")
     */
    private $name;

    /**
     * Type of repository. (git / subversion)
     *
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

        parent::__construct($title, $color);
    }
}
