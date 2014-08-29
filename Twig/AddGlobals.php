<?php

namespace Potogan\TwigBundle\Twig;

use Twig_Extension;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AddGlobals extends Twig_Extension
{
    protected $container;
    protected $conf;

    public function __construct(ContainerInterface $container, array $conf)
    {
        $this->container = $container;
        $this->conf = $conf;
    }

    public function getGlobals()
    {
        $res = array();
        foreach ($this->conf as $key => $value) {
            $res[$key] = $this->container->get($value);
        }

        return $res;
    }

    public function getName()
    {
        return 'addglobals';
    }
}
