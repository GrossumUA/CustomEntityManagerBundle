Custom Entity Manager Bundle
============================

[![Latest Stable Version](https://poser.pugx.org/grossum/custom-entity-manager/v/stable)](https://packagist.org/packages/grossum/custom-entity-manager) [![Total Downloads](https://poser.pugx.org/grossum/custom-entity-manager/downloads)](https://packagist.org/packages/grossum/custom-entity-manager) [![Latest Unstable Version](https://poser.pugx.org/grossum/custom-entity-manager/v/unstable)](https://packagist.org/packages/grossum/custom-entity-manager) [![License](https://poser.pugx.org/grossum/custom-entity-manager/license)](https://packagist.org/packages/grossum/custom-entity-manager)

Installation
============

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```bash
$ composer require grossum/custom-entity-manager
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding the following line in the `app/AppKernel.php`
file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new Grossum\CustomEntityManagerBundle\GrossumCustomEntityManagerBundle(),
        );

        // ...
    }

    // ...
}
```

Step 3: Services configuration
------------------------------

You need to add tag **name** to your entity manager service definition:
```yml
tags:
  // ...
  - {name: entity.custom_manager}
```  

Your entity manager classes must implement [ManagedClassNameInterface](https://github.com/GrossumUA/CustomEntityManagerBundle/blob/master/Entity/ManagedClassNameInterface.php) interface and provide information about full name of managed class by **getManagedClassName** method.

Step 4: Usage
-------------
```php

// ...
/** @var EntityManagerLoader $entityManagerLoader */
private $entityManagerLoader;

// ...
public function __construct(
    EntityManagerLoader $entityManagerLoader,
    // ...
) {
    $this->entityManagerLoader = $entityManagerLoader;
    // ...
}
// ...

/**
* param string $className
* return ManagedClassNameInterface
*/
public function getEntityManagerByClassName($className)
{
    return $this->entityManagerLoader->getManagerForClass($className);
}
// ...
```
