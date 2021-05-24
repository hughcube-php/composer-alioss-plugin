<?php

/*
 * This file is part of the Composer Proxy Plugin package.
 *
 * (c) hugh.li <hugh.li@foxmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HughCube\Composer\AliOSSPlugin\Config;

use HughCube\PUrl\Url;
use OSS\OssClient;

/**
 * Helper of package config.
 *
 * @author hugh.li <hugh.li@foxmail.com>
 */
final class Config
{
    /**
     * @var OssClient[]
     */
    private $clients;

    /**
     * @var array
     */
    private $config;

    /**
     * Constructor.
     *
     * @param array $config The config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $processedUrl
     *
     * @return string
     */
    public function signUrl($processedUrl)
    {
        $url = Url::instance($processedUrl);

        list($client, $bucket) = $this->getClient($url);
        if (!$client instanceof OssClient) {
            return $processedUrl;
        }

        return $client->signUrl($bucket, ltrim($url->getPath(), '/'));
    }

    /**
     * Get the client config of url.
     *
     * @param Url $url
     *
     * @return null|array
     */
    public function getClient(Url $url)
    {
        foreach ($this->config as $client) {
            if (isset($client['active']) && !$client['active']) {
                continue;
            }

            $nonHosts = isset($client['nonHosts']) ? $client['nonHosts'] : null;
            if (null != $nonHosts && $url->matchHost($nonHosts)) {
                continue;
            }

            $hosts = isset($client['hosts']) ? $client['hosts'] : null;
            if (null != $hosts && !$url->matchHost($hosts)) {
                continue;
            }

            return [$this->makeClient($client), $client['bucket']];
        }

        return [null, null];
    }

    /**
     * @param array $config
     *
     * @throws \OSS\Core\OssException
     *
     * @return OssClient
     */
    protected function makeClient($config)
    {
        $clientKey = md5(serialize($config));
        if (!isset($this->clients[$clientKey])) {
            $this->clients[$clientKey] = new OssClient(
                $config['accessKey'],
                $config['accessKeySecret'],
                $config['endpoint'],
                (isset($config['securityToken']) ? $config['securityToken'] : null),
                (isset($config['proxy']) ? $config['proxy'] : null)
            );
        }

        return $this->clients[$clientKey];
    }
}
