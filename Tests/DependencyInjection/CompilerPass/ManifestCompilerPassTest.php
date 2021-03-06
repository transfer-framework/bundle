<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Bundle\Tests\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Transfer\Bundle\DependencyInjection\CompilerPass\ManifestCompilerPass;

class ManifestCompilerPassTest extends \PHPUnit_Framework_TestCase
{
    public function testProcess()
    {
        $container = new ContainerBuilder();

        $container
            ->register('transfer.manifest.chain', 'Transfer\Manifest\ManifestChain');

        $container
            ->register('my_manifest', 'Transfer\Bundle\Tests\DependencyInjection\CompilerPass\ManifestMock')
            ->addTag('transfer.manifest');

        $pass = new ManifestCompilerPass();
        $pass->process($container);

        $this->assertCount(1, $container->get('transfer.manifest.chain')->getManifests());
    }

    public function testProcessWithoutManifestChain()
    {
        $container = new ContainerBuilder();

        $pass = new ManifestCompilerPass();
        $pass->process($container);

        $this->assertFalse($container->has('transfer.manifest.chain'));
    }
}
