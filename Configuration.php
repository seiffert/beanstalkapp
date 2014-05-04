<?php

namespace Beanstalk;

use Beanstalk\Exception\ConfigurationException;
use Psr\Log\LoggerInterface;

class Configuration
{
    /** @var string */
    private $username;

    /** @var string */
    private $accessToken;

    /** @var string */
    private $account;

    /** @var string */
    private $descriptionPath;

    /** @var string */
    private $appName;

    /** @var object */
    private $logger;

    /** @var bool */
    private $debug;

    /** @var string */
    private $cacheDir;

    /** @var array */
    private $mandatoryOptions = ['username', 'accessToken', 'account'];

    /**
     * @param array $config
     * @throws ConfigurationException
     */
    public function __construct(array $config)
    {
        $config = array_merge($this->getDefaultOptions(), $config);
        $missingOptions = array_diff_key(array_flip($this->mandatoryOptions), $config);

        if (!empty($missingOptions)) {
            throw new ConfigurationException(
                sprintf('Please provide the following configuration option(s): %s', implode(', ', $missingOptions))
            );
        }

        foreach ($config as $key => $value) {
            $this->{$key} = $value;
        }

        $this->validate();
    }

    private function validate()
    {
        $descriptionPath = $this->getDescriptionPath();

        if (!is_readable($descriptionPath)) {
            throw new ConfigurationException(sprintf('Description Path %s is not readable', $descriptionPath));
        }

        if (null !== $this->logger && !($this->logger instanceof LoggerInterface)) {
            throw new ConfigurationException('Logger must be an instance of Psr\Log\LoggerInterface.');
        }
    }

    /**
     * @return array
     */
    private function getDefaultOptions()
    {
        return [
            'descriptionPath' => __DIR__ . '/api_description.json',
            'appName' => 'seiffert/beanstalkapp',
            'cacheDir' => __DIR__ . '/cache'
        ];
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getDescriptionPath()
    {
        return $this->descriptionPath;
    }

    /**
     * @return string
     */
    public function getAppName()
    {
        return $this->appName;
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * @return bool
     */
    public function isDebugModeEnabled()
    {
        return $this->debug;
    }

    /**
     * @return string
     */
    public function getCacheDir()
    {
        return $this->cacheDir;
    }
}
