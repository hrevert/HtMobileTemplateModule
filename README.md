HtMobileTemplateModule
======================

A Zend Framework 2 module to based on [Mobile-Detect](https://github.com/serbanghita/Mobile-Detect) library to easily use different templates for mobiles, tablets etc.

# Requirements
1. [Zend Framework 2](https://github.com/zendframework/zf2)
2. [Mobile-Detect](https://github.com/serbanghita/Mobile-Detect)
3. [zf2-mobile-detect](https://github.com/neilime/zf2-mobile-detect)
 

# Installation
* Add `"hrevert/ht-mobile-template-module": "0.0.*",` to your composer.json and run `php composer.phar update`
* Enable the module in `config/application.config.php`

## Basic Usage
```php
<?php
return [
    'ht_mobile_template' => [
        'path_stack' => [
            'mobile' => [
                __DIR__ . '../view/mobile/',
                __DIR__ . '../../AnotherModule/view/mobile/',
            ],
            'tablet' => [
                __DIR__ . '../view/tablet/',
                __DIR__ . '../../AnotherModule/view/tablet/',              
            ] 
        ],
        'map' => [
            'mobile' => [
                'application/index/index' => __DIR__ . '../view/mobile/application/index/index.phtml',
            ],
            'tablet' => [
                'application/index/index' => __DIR__ . '../view/tablet/application/index/index.phtml',
            ],            
        ]
    ]
];
```
