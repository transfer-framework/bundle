<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Bundle\Tests\DependencyInjection;

use Transfer\Bundle\DependencyInjection\Configuration;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    public function testConfigTreeBuilder()
    {
        $configuration = new Configuration();

        $builder = $configuration->getConfigTreeBuilder();

        $tree = $builder->buildTree();

        $this->assertEquals('transfer', $tree->getName());
    }
}
