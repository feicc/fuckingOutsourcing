<?php

namespace OutSource\Generators;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServerProvider implements ServiceProviderInterface
{
    /**
     * contain
     *
     * @var object
     */
    protected $container = null;

    function register(Container $app)
    {

    }



}