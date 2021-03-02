<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/templates/jl_learnmate_free/blueprints/styles/header.yaml',
    'modified' => 1614532187,
    'data' => [
        'name' => 'Header Styles',
        'description' => 'Header section styles for the Learnmate theme',
        'type' => 'section',
        'form' => [
            'fields' => [
                'background' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Background',
                    'default' => '#8f4dae'
                ],
                'text-color' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Text',
                    'default' => '#eceeef'
                ]
            ]
        ]
    ]
];
