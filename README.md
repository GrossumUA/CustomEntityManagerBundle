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

You need to add tag <b>name</b> to your entity manager service definition:
```yml
tags:
  // ...
  - {name: entity.custom_manager}
```  

Your entity manager classes must implement <a href="https://github.com/GrossumUA/CustomEntityManagerBundle/blob/master/Entity/ManagedClassNameInterface.php" target="_blank">ManagedClassNameInterface</a> interface and provide information about full name of managed class by <b>getManagedClassName</b> method.
