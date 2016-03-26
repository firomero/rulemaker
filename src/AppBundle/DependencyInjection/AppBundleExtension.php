<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 26/03/2016
 * Time: 2:53 PM
 */

namespace AppBundle\DependencyInjection;



use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\Routing\Loader\YamlFileLoader;

class AppBundleExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader(new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}