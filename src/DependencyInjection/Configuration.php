<?php

namespace MartenaSoft\Media\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('martena_media');
        $treeBuilder->getRootNode()
            ->children()
            ->scalarNode('images_path')->defaultValue('sdsd')
            ->end()
        ;
        return $treeBuilder;
    }
}
