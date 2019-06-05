<?php

namespace Reprover\BaiduAi;

class Ai
{

    const MAP
        = [
            'BodyAnalysis'=> \AipBodyAnalysis::class,
            'ContentCensor' => \AipContentCensor::class,
            'ImageCensor' => \AipImageCensor::class,
            'ImageClassify' => \AipImageClassify::class,
            'ImageSearch' => \AipImageSearch::class,
            'Kg' => \AipKg::class,
            'Nlp' => \AipNlp::class,
            'Ocr' => \AipOcr::class,
            'Speech' => \AipSpeech::class,
            'Face' => \AipFace::class,
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