<?php

namespace Reprover\BaiduAi;

class Ai
{

    protected $appId;
    protected $apiKey;
    protected $apiSecret;

    public function __construct($config)
    {
        $this->appId = $config['appid'];
    }
}