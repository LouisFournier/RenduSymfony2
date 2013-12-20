<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;

//pour vich
$loader->registerNamespaces(array(
    // ...
    'Knp\Bundle'                => __DIR__.'/../vendor/bundles',
    'Gaufrette'                 => __DIR__.'/../vendor/gaufrette/src',
    'Vich' => __DIR__.'/../vendor/bundles'
));

