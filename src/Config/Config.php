<?php

namespace OutSource\Config;

use OutSource\Kernel\Support\Collection;
use OutSource\Config\CIConfig;

class Config extends Collection
{
    /**
     * 用户的默认驱动框架
     */
    private $dirver = 'CI';

    public function __construct($items)
    {
        //todo 判断用户使用哪种框架驱动 默认CI
        //todo merge 用户传进来的config和CI自身config
        $config = new CIConfig($items);
        $ci_configs = $config->getConfigs();
        parent::__construct( $ci_configs );
    }

}