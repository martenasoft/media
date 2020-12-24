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
            ->arrayNode('images_path')
            ->defaultValue([
                [
                    'name' => null,
                    "real_path" => null,
                    "big_path" => null,
                    "middle_path" => null,
                    "small_path" => null,
                    "big_width" => null,
                    "big_height" => null,
                    "middle_width" => null,
                    "middle_height" => null,
                    "small_width" => null,
                    "small_height" => null,

                    "big_watermark" => null,
                    "big_watermark_path" => null,
                    "big_watermark_top" => null,
                    "big_watermark_left" => null,

                    "middle_watermark" => null,
                    "middle_watermark_path" => null,
                    "middle_watermark_top" => null,
                    "middle_watermark_left" => null,

                    "small_watermark" => null,
                    "small_watermark_path" => null,
                    "small_watermark_top" => null,
                    "small_watermark_left" => null,

                    "cdn_url" => null,
                    "cdn_dev_url" => null
                ]
            ])
            ->prototype("scalar")
            ->end()
            ->end()
            ->end()
            ->end();
        return $treeBuilder;
    }
}
