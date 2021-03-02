<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/templates/jl_learnmate_free/blueprints/styles/footer.yaml',
    'modified' => 1614532187,
    'data' => [
        'name' => 'Footer Styles',
        'description' => 'Footer section styles for the Learnmate theme',
        'type' => 'section',
        'form' => [
            'fields' => [
                'background' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Background',
                    'default' => '#141415'
                ],
                'text-color' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Text',
                    'default' => '#838486'
                ]
            ]
        ]
    ]
];
