<?php
declare(strict_types=1);

namespace Core\Email;


class ServerInfo
{
    /** @var string */
    private $hostName;

    /** @var string */
    private $siteRoot;

    /** @var string */
    private $tplDir;

    public function __construct(string $hostName, string $siteRoot, string $tplDir)
    {
        $this->hostName = $hostName;
        $this->siteRoot = $siteRoot;
        $this->tplDir = $tplDir;
    }

    /**
     * @return string
     */
    public function getHostName(): string
    {
        return $this->hostName;
    }

    /**
     * @return string
     */
    public function getSiteRoot(): string
    {
        return $this->siteRoot;
    }

    /**
     * @return string
     */
    public function getTplDir(): string
    {
        return $this->tplDir;
    }
}
