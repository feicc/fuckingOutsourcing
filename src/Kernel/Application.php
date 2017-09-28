<?php

namespace OutSource\Kernel;

use Closure;
use Pimple\Container;
use OutSource\Config\Config;

class Application extends Container
{
    /**
     * 核心启动项目
     *
     * \OutSource\Console\ServerProvider::class  console
     *
     *
     */
    public $base_providers = [
        \OutSource\Console\ServerProvider::class
    ];

    public function __construct(array $config = [])
    {
        parent::__construct();
        $this->registerConfig($config);
        $this->registerProviders();
    }

    /**
     * Register service providers.
     *
     * @return $this
     */
    protected function registerProviders()
    {
        foreach ($this->base_providers as $base_provider) {

            $this->register(new $base_provider());
        }

        return $this;
    }

    /**
     * Register config.
     *
     * @param array $config
     *
     * @return $this
     */
    protected function registerConfig(array $config)
    {
        $this['config'] = function() use($config){
            return new Config($config);
        };

        return $this;
    }

    /**
     * Magic get access.
     *
     * @param string $id
     *
     * @return mixed
     */
    public function __get($id)
    {
        return $this->offsetGet($id);
    }

    /**
     * Magic set access.
     *
     * @param string $id
     * @param mixed  $value
     */
    public function __set($id, $value)
    {
        $this->offsetSet($id, $value);
    }




}