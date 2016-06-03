<?php

namespace App\Controllers;

use Twig_Loader_Filesystem;
use Twig_Environment;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

class App
{
    protected $config = [];

    protected $routing = [];

    protected $twigLoader;

    protected $twig;

    public function __construct($config, $routing, $twigLoader, $twig)
    {
        $this->setConfig($config);
        $this->setRouting($routing);
        $this->setTwigLoader($twigLoader);
        $this->setTwig($twig);
    }

    public function generateRouting()
    {

    }

    public static function getYamlConfig($file)
    {
        try {
            $config = Yaml::parse($file);
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
            exit();
        }

        return $config;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param array $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @return array
     */
    public function getRouting()
    {
        return $this->routing;
    }

    /**
     * @param array $routing
     */
    public function setRouting($routing)
    {
        $this->routing = $routing;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTwigLoader()
    {
        return $this->twigLoader;
    }

    /**
     * @param mixed $twigLoader
     */
    public function setTwigLoader($twigLoader)
    {
        $this->twigLoader = $twigLoader;
    }

    /**
     * @return mixed
     */
    public function getTwig()
    {
        return $this->twig;
    }

    /**
     * @param mixed $twig
     */
    public function setTwig($twig)
    {
        $this->twig = $twig;
    }
}