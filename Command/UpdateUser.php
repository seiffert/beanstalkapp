<?php

namespace Beanstalk\Command;

use JMS\Serializer\Annotation\Type;

class UpdateUser extends WriteUser
{
    /**
     * @var string
     * @Type("string")
     */
    private $email;

    /**
     * @var string
     * @Type("string")
     */
    private $name;

    /**
     * @var string
     * @Type("string")
     */
    private $password;

    /**
     * @var bool
     * @Type("boolean")
     */
    private $admin;

    /**
     * @var string
     * @Type("string")
     */
    private $timzone;

    /**
     * @param $email
     * @param $name
     * @param $password
     * @param bool $admin
     * @param null $timezone
     */
    public function __construct($email, $name, $password, $admin = false, $timezone = null)
    {
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
        $this->admin = $admin;
        $this->timzone = $timezone;
    }
}
