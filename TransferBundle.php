<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Bundle;

use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\EventDispatcher\DependencyInjection\RegisterListenersPass;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Transfer\Bundle\DependencyInjection\CompilerPass\ManifestCompilerPass;

class TransferBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new ManifestCompilerPass());

        $container->addCompilerPass(
            new RegisterListenersPass(
                'transfer.event_dispatcher',
                'transfer.event_listener',
                'transfer.event_subscriber'
            ),
            PassConfig::TYPE_BEFORE_REMOVING
        );
    }
}
