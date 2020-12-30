<?php

namespace MartenaSoft\Media\DependencyInjection;

use MartenaSoft\Media\MartenaSoftMediaBundle;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(MartenaSoftMediaBundle::getConfigName());

        $treeBuilder->getRootNode()
            ->children()
            ->scalarNode('tmp_dir')->defaultValue('var/cache/uploader')
            ->end();
        return $treeBuilder;
    }
}
