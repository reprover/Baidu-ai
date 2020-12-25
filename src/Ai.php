<?php

namespace Reprover\BaiduAi;

use AipFace;
use AipImageCensor;
use AipImageClassify;
use AipImageSearch;
use AipKg;
use AipNlp;
use AipOcr;
use AipSpeech;

class Ai
{

    const MAP
        = [
            'Nlp' => AipNlp::class,
            'Speech' => AipSpeech::class,
            'Face' => AipFace::class,
            'ImageCensor' => AipImageCensor::class,
            'ImageClassify' => AipImageClassify::class,
            'Kg' => AipKg::class,
            'ImageSearch' => AipImageSearch::class,
            'Ocr' => AipOcr::class,
        ];

    protected $driver;

    protected $appId;
    protected $apiKey;
    protected $apiSecret;

    public function __construct()
    {
        $config = config('ai');
        $this->appId = $config['appId'];
        $this->apiKey = $config['apiKey'];
        $this->apiSecret = $config['apiSecret'];
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return mixed
     * @throws \Exception
     */
    public function __call($name, $arguments)
    {
        if (!key_exists($name, self::MAP)) {
            throw new \Exception('driver does not exists.');
        }
        $driver = self::MAP[$name];

        return new $driver($this->appId, $this->apiKey, $this->apiSecret);
    }
}