<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Bundle\Tests\DependencyInjection\CompilerPass;

use Transfer\Manifest\AbstractManifest;
use Transfer\Procedure\ProcedureBuilder;
use Transfer\Processor\ProcessorInterface;

class ManifestMock extends AbstractManifest
{
    public function getName()
    {
    }

    public function configureProcedureBuilder(ProcedureBuilder $builder)
    {
    }

    public function configureProcessor(ProcessorInterface $processor)
    {
    }
}
