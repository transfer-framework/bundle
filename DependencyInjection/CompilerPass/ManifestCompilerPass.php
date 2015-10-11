<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Bundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ManifestCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('transfer.manifest.chain')) {
            return;
        }

        $definition = $container->getDefinition(
            'transfer.manifest.chain'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'transfer.manifest'
        );

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall(
                'addManifest',
                array(new Reference($id))
            );
        }
    }
}
