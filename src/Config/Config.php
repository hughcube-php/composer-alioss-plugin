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
     * @var array $clients
     */
    private $clients;

    /**
     * Constructor.
     *
     * @param array $config The config
     */
    public function __construct(array $clients)
    {
        $this->clients = $clients;
    }

    /**
     * @param string $url
     * @return string
     */
    public function signUrl($processedUrl)
    {
        $url = Url::instance($processedUrl);

        list($client, $bucket) = $this->getClient($url);
        if (!$client instanceof OssClient) {
            return $processedUrl;
        }

        return $client->signUrl($bucket, ltrim($url->getPath(), "/"));
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
        foreach ($this->clients as $client) {
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

            return [$this->makeClient($client), $client["bucket"]];
        }

        return [null, null];
    }

    /**
     * @param $config
     * @return OssClient
     * @throws \OSS\Core\OssException
     */
    protected function makeClient($config)
    {
        return new OssClient(
            $config["accessKey"],
            $config["accessKeySecret"],
            $config["endpoint"],
            (isset($config["securityToken"]) ? $config["securityToken"] : false),
            (isset($config["proxy"]) ? $config["proxy"] : false)
        );
    }
}
