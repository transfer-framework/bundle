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

License
-------

This bundle is under the MIT license. See the complete license in the bundle.
