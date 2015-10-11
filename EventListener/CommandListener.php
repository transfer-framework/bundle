<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Bundle\EventListener;

use Symfony\Component\Console\Event\ConsoleCommandEvent;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Transfer\Console\Command\Manifest\ManifestCommand;
use Transfer\Console\Command\Manifest\RunCommand;
use Transfer\Manifest\ManifestChain;

class CommandListener
{
    /**
     * @var ManifestChain Manifest chain
     */
    protected $chain;

    /**
     * @var EventDispatcher Event dispatcher
     */
    private $dispatcher;

    /**
     * @param ManifestChain   $chain      Manifest chain
     * @param EventDispatcher $dispatcher Event dispatcher
     */
    public function __construct(ManifestChain $chain, EventDispatcher $dispatcher)
    {
        $this->chain = $chain;
        $this->dispatcher = $dispatcher;
    }

    /**
     * Returns an array of supported commands.
     *
     * @return array Support commands
     */
    public function getSupportedCommands()
    {
        return array(
            'transfer:manifest:list',
            'transfer:manifest:describe',
            'transfer:manifest:run',
        );
    }

    /**
     * Analyzes and modifies command.
     *
     * @param ConsoleCommandEvent $event Command event
     */
    public function command(ConsoleCommandEvent $event)
    {
        /** @var ManifestCommand $command */
        $command = $event->getCommand();

        if (!in_array($command->getName(), $this->getSupportedCommands())) {
            return;
        }

        $command->setChain($this->chain);

        if ($command instanceof RunCommand) {
            $command->setEventDispatcher($this->dispatcher);
        }
    }
}
