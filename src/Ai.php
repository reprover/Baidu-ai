<?php

namespace Reprover\BaiduAi;

class Ai
{

    private $map
        = [
            'nlp' => AipNlp::class,
        ];

    protected $driver;

    protected $appId;
    protected $apiKey;
    protected $apiSecret;

    public function __construct($config)
    {
        $this->appId = $config['appid'];
        $this->apiKey = $config['apiKey'];
        $this->apiSecret = $config['apiSecret'];
    }

    public function driver($driver)
    {
        $driverClass = $this->map[$driver];
        $this->driver = new $driverClass($this->appId, $this->apiKey, $this->apiSecret);
        return $this->driver;
    }
}