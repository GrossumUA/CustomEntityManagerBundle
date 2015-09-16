<?php

namespace Grossum\CustomEntityManagerBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ManagerCompilerPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     *
     * @SuppressWarnings(PHPMD.UnusedLocalVariable)
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->has('grossum.entity_manager_loader')) {
            return;
        }

        $definition = $container->findDefinition(
            'grossum.entity_manager_loader'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'entity.custom_manager'
        );

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall(
                'addManager',
                [new Reference($id)]
            );
        }
    }
}
