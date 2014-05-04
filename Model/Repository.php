<?php

namespace Beanstalk\Model;

use JMS\Serializer\Annotation\Type;

class Repository
{
    /**
     * File-system name.
     *
     * @var string
     * @Type("string")
     */
    private $name;

    /**
     * Time when the repository was first added to the system.
     *
     * @var \DateTime
     * @Type("DateTime<'Y/m/d H:i:s e'>")
     */
    private $createdAt;

    /**
     * Human-readable name.
     *
     * @var string
     * @Type("string")
     */
    private $title;

    /**
     * @var int
     * @Type("integer")
     */
    private $storageUsedBytes;

    /**
     * Time when the repository was last updated.
     *
     * @var \DateTime
     * @Type("DateTime<'Y/m/d H:i:s e'>")
     */
    private $updatedAt;

    /**
     * Name of the specified color label.
     *
     * @var string
     * @Type("string")
     */
    private $colorLabel;

    /**
     * ID of the associated account.
     *
     * @var int
     * @Type("integer")
     */
    private $accountId;

    /**
     * Unique ID.
     *
     * @var int
     * @Type("integer")
     */
    private $id;

    /**
     * Type of the repository. (git / subversion)
     *
     * @var string
     * @Type("string")
     */
    private $type;

    /**
     * Time of the last commit.
     *
     * @var \DateTime
     * @Type("DateTime<'Y/m/d H:i:s e'>")
     */
    private $lastCommitAt;

    /**
     * Name of a version control system the repoistory is using. (git / subversion)
     *
     * @var string
     * @Type("string")
     */
    private $vcs;

    /**
     * A URL that can be used to checkout or clone the repository.
     *
     * @var string
     * @Type("string")
     */
    private $repositoryUrl;

    /**
     * @var string
     * @Type("string")
     */
    private $repositoryUrlHttps;

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
     * @param string $colorLabel
     */
    public function setColorLabel($colorLabel)
    {
        $this->colorLabel = $colorLabel;
    }

    /**
     * @return string
     */
    public function getColorLabel()
    {
        return $this->colorLabel;
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
     * @param \DateTime $lastCommitAt
     */
    public function setLastCommitAt($lastCommitAt)
    {
        $this->lastCommitAt = $lastCommitAt;
    }

    /**
     * @return \DateTime
     */
    public function getLastCommitAt()
    {
        return $this->lastCommitAt;
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
     * @param string $repositoryUrl
     */
    public function setRepositoryUrl($repositoryUrl)
    {
        $this->repositoryUrl = $repositoryUrl;
    }

    /**
     * @return string
     */
    public function getRepositoryUrl()
    {
        return $this->repositoryUrl;
    }

    /**
     * @param int $storageUsedBytes
     */
    public function setStorageUsedBytes($storageUsedBytes)
    {
        $this->storageUsedBytes = $storageUsedBytes;
    }

    /**
     * @return int
     */
    public function getStorageUsedBytes()
    {
        return $this->storageUsedBytes;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
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

    /**
     * @param string $vcs
     */
    public function setVcs($vcs)
    {
        $this->vcs = $vcs;
    }

    /**
     * @return string
     */
    public function getVcs()
    {
        return $this->vcs;
    }

    /**
     * @param string $repositoryUrlHttps
     */
    public function setRepositoryUrlHttps($repositoryUrlHttps)
    {
        $this->repositoryUrlHttps = $repositoryUrlHttps;
    }

    /**
     * @return string
     */
    public function getRepositoryUrlHttps()
    {
        return $this->repositoryUrlHttps;
    }
}
