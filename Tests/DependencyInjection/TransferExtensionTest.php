<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Bundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Transfer\Bundle\DependencyInjection\TransferExtension;

class TransferExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testLoad()
    {
        $extension = new TransferExtension();

        $builder = new ContainerBuilder();

        $extension->load(array(), $builder);

        $this->assertTrue($builder->has('transfer.manifest.chain'));
    }
}
