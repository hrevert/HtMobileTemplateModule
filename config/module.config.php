<?php
return [
    'ht_mobile_template' => [
        'path_stack' => [

        ],
        'map' => [

        ]
    ],
    'service_manager' => [
        'factories' => [
            'HtMobileTemplateModule\View\Resolver\Map' => 'HtMobileTemplateModule\View\Resolver\Factory\MapFactory',
            'HtMobileTemplateModule\View\Resolver\PathStack' => 'HtMobileTemplateModule\View\Resolver\Factory\PathStackFactory',
        ],
        'delegators' => [
            'ViewResolver' => [
                'HtMobileTemplateModule\View\Resolver\Factory\ViewResolverDelegatorFactory',
            ],
        ],
    ]
];
