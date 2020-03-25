<?php

namespace Laijim\SimpleToast;

use Illuminate\Support\Facades\Session;

class SimpleToast
{

    /**
     * main config
     *
     * @var array
     */
    protected $config = [];

    /**
     * SimpleToast constructor.
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * init
     */
    public function init()
    {
        $this->initConfig();
    }

    /**
     * initialize options
     */
    protected function initConfig()
    {
        $this->config = [
            'duration' => config('simpleToast.duration'),
            'direction' => config('simpleToast.direction'),
        ];
    }

    /**
     * publish a toast
     *
     * @param string $content the message you want to publish
     * @param int $duration duration time (ms)
     * @param string $direction support top and bottom two options.
     * @param string $style extend css class
     * @return $this
     */
    public function toast(string $content, int $duration = 0, string $direction = 'top', string $style = "success")
    {
        $this->config['content'] = $content;
        $direction && $this->config['direction'] = $direction;
        $duration && $this->config['duration'] = $duration;
        $this->config['style'] = $style;

        session()->put('toast', $this->getSerializeConfig());
        return $this;
    }

    /**
     * encode options
     *
     * @return false|string
     */
    public function getSerializeConfig()
    {
        $config = $this->config;
        return json_encode($config);
    }
}