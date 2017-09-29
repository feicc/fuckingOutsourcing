<?php

namespace OutSource\Config;

use InvalidArgumentException;
use OutSource\Config\Contracts\ConfigInterface;

class CIConfig implements ConfigInterface
{
    protected $basePath = "";
    /**
     * 项目名称
     *
     */
    protected $rootPath = "application";
    /**
     * 默认的CI路径
     *
     */
    protected $ciPath = [
        "controller" => "controllers/",
        "model" => "models/",
        "library" => "libraries/",
        "views" => "views/",
    ];

    public function __construct(array $items)
    {
        $this->setSystemPath($items);
        $this->setBasePath($this->getBaseUrl($items));
    }

    protected function getBaseUrl($item)
    {
        if( empty($item) || !isset($item['basePath']) || ( isset($item['basePath']) && empty($item['basePath']))){
            throw new InvalidArgumentException("baseUrl must exist");
        }

        return realpath($item['basePath']);
    }

    protected function setBasePath($basePath)
    {
        return $this->basePath = $basePath;
    }

    protected function setSystemPath($item)
    {
        $this->ciPath =  array_merge($this->ciPath,$item);
    }

    public function getConfigs()
    {
        return [
            "namespace" => "application",
            "controller" =>  $this->rootPaths($this->ciPath['controller']),
            "model" => $this->rootPaths($this->ciPath['model']),
            "library" => $this->rootPaths($this->ciPath['library']),
            "views" => $this->rootPaths($this->ciPath['views']),
            "router" => "",
        ];
    }

    protected function rootPaths($path)
    {
        return $this->basePath . DIRECTORY_SEPARATOR . $this->rootPath . DIRECTORY_SEPARATOR. $path;
    }

}