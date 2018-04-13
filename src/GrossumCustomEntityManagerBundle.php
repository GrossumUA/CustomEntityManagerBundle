<?php

namespace Grossum\CustomEntityManagerBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

use Grossum\CustomEntityManagerBundle\DependencyInjection\CompilerPass\ManagerCompilerPass;

class GrossumCustomEntityManagerBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new ManagerCompilerPass());
    }
}
