<?php

namespace Grossum\CustomEntityManagerBundle\Entity;

class EntityManagerLoader
{
    private $managers = [];

    /**
     * @param ManagedClassNameInterface $manager
     */
    public function addManager(ManagedClassNameInterface $manager)
    {
        if (!in_array($manager, $this->managers, true)) {
            $this->managers[] = $manager;
        }
    }

    /**
     * @param $className
     * @return ManagedClassNameInterface|null
     */
    public function getManagerForClass($className)
    {
        /** @var ManagedClassNameInterface $manager */
        foreach ($this->managers as $manager) {
            if ($manager->getManagedClassName() === $className) {
                return $manager;
            }
        }

        return null;
    }
}
