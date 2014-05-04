<?php

namespace Beanstalk\Model;

use JMS\Serializer\Annotation\Type;

class PublicKey
{
    /**
     * Unique ID of the PublicKey.
     *
     * @var int
     * @Type("integer")
     */
    private $id;

    /**
     * ID of the associated Account.
     *
     * @var int
     * @Type("integer")
     */
    private $accountId;

    /**
     * ID of the User who owns the key.
     *
     * @var int
     * @Type("integer")
     */
    private $userId;

    /**
     * Human-readable name of the key.
     *
     * @var string
     * @Type("string")
     */
    private $name;

    /**
     * Public SSH key.
     *
     * @var string
     * @Type("string")
     */
    private $content;

    /**
     * Time when the key was first added to the system.
     *
     * @var \DateTime
     * @Type("DateTime<'Y/m/d H:i:s e'>")
     */
    private $createdAt;

    /**
     * Time when the key was last updated.
     *
     * @var \DateTime
     * @Type("DateTime<'Y/m/d H:i:s e'>")
     */
    private $updatedAt;

    /**
     * @return int
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }
}
