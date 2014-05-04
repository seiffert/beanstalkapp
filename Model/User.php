<?php

namespace Beanstalk\Model;

use JMS\Serializer\Annotation\Type;

class User
{
    /**
     * @var int Unique ID of the User.
     * @Type("integer")
     */
    private $id;

    /**
     * @var int ID of the Account user belongs to.
     * @Type("integer")
     */
    private $accountId;

    /**
     * @var string Username. Unique per Account.
     * @Type("string")
     */
    private $login;

    /**
     * @var string Email address. Unique per account.
     * @Type("string")
     */
    private $email;

    /**
     * @var string Full name.
     * @Type("string")
     */
    private $name;

    /**
     * @var string First name.
     * @Type("string")
     */
    private $firstName;

    /**
     * @var string Last name.
     * @Type("string")
     */
    private $lastName;

    /**
     * @var bool True if User has created the Account initially.
     * @Type("boolean")
     */
    private $owner;

    /**
     * @var bool True if has admin privileges in the Account.
     * @Type("boolean")
     */
    private $admin;

    /**
     * @var string User’s preferred time zone. If not specified, Account’s time zone is used by default.
     * @Type("string")
     */
    private $timezone;

    /**
     * @var \DateTime
     * @Type("DateTime<'Y/m/d H:i:s e'>")
     */
    private $createdAt;

    /**
     * @var \DateTime
     * @Type("DateTime<'Y/m/d H:i:s e'>")
     */
    private $updatedAt;

    /**
     * @param int $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return int
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param boolean $admin
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }

    /**
     * @return boolean
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param boolean $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return boolean
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param string $timezone
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }

    /**
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
