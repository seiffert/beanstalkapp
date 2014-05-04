<?php

namespace Beanstalk\Command;

use JMS\Serializer\Annotation\Type;

class WriteUser
{
    /**
     * Email address. Unique per account. Required on create.
     *
     * @var string
     * @Type("string")
     */
    protected $email;

    /**
     * Full name. Required on create.
     *
     * @var string
     * @Type("string")
     */
    protected $name;

    /**
     * Required on create.
     *
     * @var string
     * @Type("string")
     */
    protected $password;

    /**
     * Optional.
     *
     * @var bool
     * @Type("boolean")
     */
    protected $admin;

    /**
     * Optional.
     *
     * @var string
     * @Type("string")
     */
    protected $timzone;

    /**
     * @param string $email
     * @param string $name
     * @param string $password
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
