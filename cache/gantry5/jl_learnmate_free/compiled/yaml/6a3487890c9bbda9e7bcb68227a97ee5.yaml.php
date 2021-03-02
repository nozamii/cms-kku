<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/templates/jl_learnmate_free/custom/config/_offline/layout.yaml',
    'modified' => 1614532188,
    'data' => [
        'version' => 2,
        'preset' => [
            'image' => 'gantry-admin://images/layouts/default.png',
            'name' => 'default',
            'timestamp' => 1483060787
        ],
        'layout' => [
            'header' => [
                
            ],
            'navigation' => [
                
            ],
            '/above-slideshow/' => [
                
            ],
            '/slideshow/' => [
                
            ],
            '/container-main/' => [
                0 => [
                    0 => [
                        'aside 25' => [
                            
                        ]
                    ],
                    1 => [
                        'mainbar 50' => [
                            0 => [
                                0 => 'system-messages-5122'
                            ],
                            1 => [
                                0 => 'system-content-1119'
                            ]
                        ]
                    ],
                    2 => [
                        'sidebar 25' => [
                            
                        ]
                    ]
                ]
            ],
            'footer' => [
                
            ],
            'offcanvas' => [
                
            ]
        ],
        'structure' => [
            'header' => [
                'inherit' => [
                    'outline' => 'default',
                    'include' => [
                        0 => 'attributes',
                        1 => 'children'
                    ]
                ]
            ],
            'navigation' => [
                'type' => 'section',
                'inherit' => [
                    'outline' => 'default',
                    'include' => [
                        0 => 'attributes',
                        1 => 'children'
                    ]
                ]
            ],
            'above-slideshow' => [
                'type' => 'section',
                'attributes' => [
                    'boxed' => '',
                    'class' => 'section-horizontal-paddings'
                ]
            ],
            'slideshow' => [
                'type' => 'section',
                'attributes' => [
                    'boxed' => '',
                    'class' => 'section-horizontal-paddings'
                ]
            ],
            'aside' => [
                'attributes' => [
                    'class' => ''
                ],
                'block' => [
                    'fixed' => '1'
                ]
            ],
            'mainbar' => [
                'type' => 'section',
                'subtype' => 'main',
                'attributes' => [
                    'class' => ''
                ]
            ],
            'sidebar' => [
                'type' => 'section',
                'subtype' => 'aside',
                'attributes' => [
                    'class' => ''
                ],
                'block' => [
                    'fixed' => '1'
                ]
            ],
            'container-main' => [
                'attributes' => [
                    'boxed' => '',
                    'class' => 'section-horizontal-paddings',
                    'extra' => [
                        
                    ]
                ]
            ],
            'footer' => [
                'inherit' => [
                    'outline' => 'default',
                    'include' => [
                        0 => 'attributes',
                        1 => 'children'
                    ]
                ]
            ],
            'offcanvas' => [
                'inherit' => [
                    'outline' => 'default',
                    'include' => [
                        0 => 'attributes',
                        1 => 'children'
                    ]
                ]
            ]
        ]
    ]
];
