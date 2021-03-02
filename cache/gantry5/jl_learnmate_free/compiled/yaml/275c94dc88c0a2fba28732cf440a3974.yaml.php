<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/templates/jl_learnmate_free/blueprints/styles/accent.yaml',
    'modified' => 1614532187,
    'data' => [
        'name' => 'Accent Colors',
        'description' => 'Accent colors for the Learnmate theme',
        'type' => 'core',
        'form' => [
            'fields' => [
                'color-1' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Accent Color 1',
                    'default' => '#253b80'
                ],
                'color-2' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Accent Color 2',
                    'default' => '#8ec549'
                ],
                'color-3' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Accent Color 2',
                    'default' => '#46a5e5'
                ]
            ]
        ]
    ]
];
