Transfer Bundle
================

[![Build Status](https://travis-ci.org/transfer-framework/bundle.svg?branch=1.0)](https://travis-ci.org/transfer-framework/bundle)
[![Code Coverage](https://scrutinizer-ci.com/g/transfer-framework/bundle/badges/coverage.png?b=1.0)](https://scrutinizer-ci.com/g/transfer-framework/bundle/?branch=1.0)

Installation
------------

Open a command console, enter your project directory and execute the following command to download the latest stable version of this bundle:

    $ composer require transfer/bundle

This requires [Composer](https://getcomposer.org/download/) to be installed globally in your system.

Enable the Bundle
-----------------

Then, enable the bundle by adding the following line in the app/AppKernel.php file of your project:

```php    
// app/AppKernel.php
class AppKernel extends Kernel
{
  public function registerBundles()
  {
      $bundles = array(
          // ...
          new Transfer\Bundle\TransferBundle(),
      );

      // ...
  }
}
```

Registering manifests
---------------------

To register a manifest, create a new service tagged with the manifest tag:

    manifest.test:
        class: Acme\Manifest\TestManifest
        tags:
            - { name: transfer.manifest }
            
Listing registered manifests
----------------------------

To list the registered manifests, run the following command:

    php app/console transfer:manifest:list

Running manifests
-----------------

To run a manifest, run the `transfer:manifest:run` command and pass the manifest name as the first argument:

    php app/console transfer:manifest:run test_manifest

License
-------

This bundle is under the MIT license. See the complete license in the bundle.
