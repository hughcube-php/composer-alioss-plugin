<h1 align="center">composer alioss plugin</h1>


<p>
    <a href="https://github.com/hughcube-php/composer-alioss-plugin/actions?query=workflow%3ATest">
        <img src="https://github.com/hughcube-php/composer-alioss-plugin/workflows/Test/badge.svg" alt="Test Actions status">
    </a>
    <a href="https://github.com/hughcube-php/composer-alioss-plugin/actions?query=workflow%3ALint">
        <img src="https://github.com/hughcube-php/composer-alioss-plugin/workflows/Lint/badge.svg" alt="Lint Actions status">
    </a>
    <a href="https://github.styleci.io/repos/346598049">
        <img src="https://github.styleci.io/repos/346598049/shield?branch=master" alt="StyleCI">
    </a>
    <a href="https://scrutinizer-ci.com/g/hughcube-php/composer-alioss-plugin/?branch=master">
        <img src="https://scrutinizer-ci.com/g/hughcube-php/composer-alioss-plugin/badges/coverage.png?b=master" alt="Code Coverage">
    </a>
    <a href="https://scrutinizer-ci.com/g/hughcube-php/composer-alioss-plugin/?branch=master">
        <img src="https://scrutinizer-ci.com/g/hughcube-php/composer-alioss-plugin/badges/quality-score.png?b=master" alt="Scrutinizer Code Quality">
    </a> 
    <a href="https://scrutinizer-ci.com/g/hughcube-php/composer-alioss-plugin/?branch=master">
        <img src="https://scrutinizer-ci.com/g/hughcube-php/composer-alioss-plugin/badges/code-intelligence.svg?b=master" alt="Code Intelligence Status">
    </a>        
    <a href="https://github.com/hughcube-php/composer-alioss-plugin">
        <img src="https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg" alt="PHP Versions Supported">
    </a>
    <a href="https://packagist.org/packages/hughcube/composer-alioss-plugin">
        <img src="https://poser.pugx.org/hughcube/composer-alioss-plugin/version" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/hughcube/composer-alioss-plugin">
        <img src="https://poser.pugx.org/hughcube/composer-alioss-plugin/downloads" alt="Total Downloads">
    </a>
    <a href="https://github.com/hughcube-php/composer-alioss-plugin/blob/master/LICENSE">
        <img src="https://img.shields.io/badge/license-MIT-428f7e.svg" alt="License">
    </a>
    <a href="https://packagist.org/packages/hughcube/composer-alioss-plugin">
        <img src="https://poser.pugx.org/hughcube/composer-alioss-plugin/v/unstable" alt="Latest Unstable Version">
    </a>
    <a href="https://packagist.org/packages/hughcube/composer-alioss-plugin">
        <img src="https://poser.pugx.org/hughcube/composer-alioss-plugin/composerlock" alt="composer.lock available">
    </a>
</p>

## Installing

``` shell
$ composer global require hughcube/composer-alioss-plugin -vvv
```

## Set config in composer.json   or   ~/.composer/config.json

```json
{
    "config": {
        "alioss": [
            {
                "active": true,
                "nonHosts": null,
                "hosts": "packagist.phpcomposer.com|repo.packagist.org",
                "accessKey": "<yourAccessKeyId>",
                "accessKeySecret": "<yourAccessKeySecret>",
                "endpoint": "http://oss-cn-hangzhou.aliyuncs.com",
                "securityToken": "<yourSecurityToken>",
                "bucket" : "<yourBucket>"
            }
        ]
    }
}

```
