<?php

namespace Grossum\CustomEntityManagerBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ManagerCompilerPass implements CompilerPassInterface
{
    const LOADER_SERVICE = 'grossum.entity_manager_loader';
    const CUSTOM_MANAGER_TAG = 'entity.custom_manager';
    
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->has(self::LOADER_SERVICE)) {
            return;
        }

        $taggedServices = $container->findTaggedServiceIds(self::CUSTOM_MANAGER_TAG);
        
        if (empty($taggedServices)) {
            return;
        }
        
        $loaderDefinition = $container->findDefinition(self::LOADER_SERVICE);
        
        foreach (array_keys($taggedServices) as $id) {
            $loaderDefinition->addMethodCall(
                'addManager',
                [new Reference($id)]
            );
        }
    }
}
