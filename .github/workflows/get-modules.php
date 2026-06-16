<?php
// phpcs:ignoreFile

require 'vendor/autoload.php';
use Magento\Framework\Component\ComponentRegistrar;
$moduleNames = array_keys((new ComponentRegistrar)->getPaths('module'));
$disableModules = [];

if (in_array('disable-bundled=true', $argv)) {
    foreach ($moduleNames as $moduleName) {
        $matches = ['sampledata', 'paypal', 'swissup', 'newrelic', 'loginascustomer', 'swagger'];
        foreach ($matches as $match) {
            if (stristr($moduleName, $match)) {
                $disableModules[] = $moduleName;
            }
        }
    }
}

if (in_array('disable-adobe=true', $argv)) {
    foreach ($moduleNames as $moduleName) {
        if (stristr($moduleName, 'adobe')) {
            $disableModules[] = $moduleName;
        }
    }
}

if (in_array('disable-graphql=true', $argv)) {
    foreach ($moduleNames as $moduleName) {
        if (stristr($moduleName, 'graphql')) {
            $disableModules[] = $moduleName;
        }
    }
}

if (in_array('disable-inventory=true', $argv)) {
    foreach ($moduleNames as $moduleName) {
        if (stristr($moduleName, '_inventory')) {
            $disableModules[] = $moduleName;
        }
    }
}

echo implode(',', $disableModules).PHP_EOL;

