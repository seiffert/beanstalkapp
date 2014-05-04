<?php

namespace Beanstalk\Command;

use JMS\Serializer\Annotation\Type;

class CreateUser extends WriteUser
{
    /**
     * Username. Unique per Account.
     * Writable only on create. Always required and must be unique in the Account.
     *
     * @var string
     * @Type("string")
     */
    private $login;

    /**
     * @param string $login
     * @param string $email
     * @param string $name
     * @param string $password
     * @param bool $admin
     * @param null $timezone
     */
    public function __construct($login, $email, $name, $password, $admin = false, $timezone = null)
    {
        $this->login = $login;

        parent::__construct($email, $name, $password, $admin, $timezone);
    }
}
