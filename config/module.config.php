<?php
return [
    'ht_mobile_template' => [
        'path_stack' => [

        ],
        'map' => [

        ]
    ],
    'ht_template_resolver' => [
        'resolvers_plugin_manager' => [
            'factories' => [
                'media_map' => 'HtMobileTemplateModule\View\Resolver\Factory\MapFactory',
                'media_path_stack' => 'HtMobileTemplateModule\View\Resolver\Factory\PathStackResolverFactory',
            ]
        ],
        'resolvers' => [
            'media_map' => 4000,
            'media_path_stack' => 2000
        ]
    ]
];
