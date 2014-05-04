<?php

namespace Beanstalk\Model;

use Beanstalk\Command\WriteUser;

class UserRequest
{
    /**
     * @var WriteUser
     */
    private $user;

    /**
     * @param WriteUser $user
     */
    public function __construct(WriteUser $user)
    {
        $this->user = $user;
    }
}
