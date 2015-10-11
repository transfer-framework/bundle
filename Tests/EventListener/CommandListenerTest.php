<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Bundle\Tests\EventListener;

use Prophecy\Argument;
use Symfony\Component\Console\Event\ConsoleCommandEvent;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Transfer\Bundle\EventListener\CommandListener;
use Transfer\Manifest\ManifestChain;

class CommandListenerTest extends \PHPUnit_Framework_TestCase
{
    public function testListener()
    {
        $chain = new ManifestChain();
        $dispatcher = new EventDispatcher();

        $listener = new CommandListener($chain, $dispatcher);

        $dispatcher->addListener('console.command', array($listener, 'command'));

        $commandProphecy = $this->prophesize('Transfer\Console\Command\Manifest\RunCommand');
        $commandProphecy->getName()->willReturn('transfer:manifest:run');
        $commandProphecy->setChain(Argument::exact($chain))->shouldBeCalled();
        $commandProphecy->setEventDispatcher(Argument::exact($dispatcher))->shouldBeCalled();

        $runCommand = $commandProphecy->reveal();

        $dispatcher->dispatch('console.command', new ConsoleCommandEvent(
            $runCommand,
            $this->getMock('Symfony\Component\Console\Input\InputInterface'),
            $this->getMock('Symfony\Component\Console\Output\OutputInterface')
        ));

        $commandProphecy->getName()->willReturn('unknown-command');

        $unknownCommand = $commandProphecy->reveal();

        $dispatcher->dispatch('console.command', new ConsoleCommandEvent(
            $unknownCommand,
            $this->getMock('Symfony\Component\Console\Input\InputInterface'),
            $this->getMock('Symfony\Component\Console\Output\OutputInterface')
        ));
    }
}
