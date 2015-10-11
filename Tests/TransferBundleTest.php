<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Bundle\Tests;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Transfer\Bundle\TransferBundle;

class TransferBundleTest extends \PHPUnit_Framework_TestCase
{
    public function testBuild()
    {
        $builder = new ContainerBuilder();

        $bundle = new TransferBundle();

        $bundle->build($builder);

        $passes = array();
        foreach ($builder->getCompiler()->getPassConfig()->getPasses() as $pass) {
            $passes[] = get_class($pass);
        }

        $this->assertContains(
            'Transfer\Bundle\DependencyInjection\CompilerPass\ManifestCompilerPass',
            $passes
        );

        $this->assertContains(
            'Symfony\Component\EventDispatcher\DependencyInjection\RegisterListenersPass',
            $passes
        );
    }
}
