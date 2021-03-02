<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/templates/jl_learnmate_free/layouts/default.yaml',
    'modified' => 1614532191,
    'data' => [
        'version' => 2,
        'preset' => [
            'image' => 'gantry-admin://images/layouts/default.png',
            'name' => 'default',
            'timestamp' => 1503409966
        ],
        'layout' => [
            '/header/' => [
                0 => [
                    0 => 'logo-9608 20',
                    1 => 'spacer-7683 30',
                    2 => 'custom-2399 50'
                ]
            ],
            '/navigation/' => [
                0 => [
                    0 => 'menu-6409'
                ]
            ],
            '/above-slideshow/' => [
                
            ],
            '/slideshow/' => [
                
            ],
            '/container-main/' => [
                0 => [
                    0 => [
                        'aside 25' => [
                            0 => [
                                0 => 'position-position-4734'
                            ]
                        ]
                    ],
                    1 => [
                        'mainbar 50' => [
                            0 => [
                                0 => 'system-messages-7152'
                            ],
                            1 => [
                                0 => 'system-content-1587'
                            ]
                        ]
                    ],
                    2 => [
                        'sidebar 25' => [
                            0 => [
                                0 => 'position-position-3949'
                            ]
                        ]
                    ]
                ]
            ],
            '/footer/' => [
                0 => [
                    0 => 'custom-9609 25',
                    1 => 'custom-2410 17',
                    2 => 'custom-6963 17',
                    3 => 'custom-1285 17',
                    4 => 'custom-5076 24'
                ],
                1 => [
                    0 => 'branding-2819 70',
                    1 => 'social-3954 30'
                ]
            ],
            '/offcanvas/' => [
                0 => [
                    0 => 'mobile-menu-5697'
                ]
            ]
        ],
        'structure' => [
            'header' => [
                'attributes' => [
                    'boxed' => '',
                    'class' => 'section-horizontal-paddings'
                ]
            ],
            'navigation' => [
                'type' => 'section',
                'attributes' => [
                    'boxed' => '',
                    'class' => 'section-horizontal-paddings'
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
                'subtype' => 'main'
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
                'attributes' => [
                    'boxed' => '',
                    'class' => 'section-horizontal-paddings section-vertical-paddings'
                ]
            ],
            'offcanvas' => [
                'attributes' => [
                    'boxed' => ''
                ]
            ]
        ],
        'content' => [
            'logo-9608' => [
                'title' => 'Logo / Image'
            ],
            'custom-2399' => [
                'title' => 'Top Menu',
                'attributes' => [
                    'html' => '<div class="top-menu">
    <ul class="nav menu">
        <li><a href="#">TRANDING</a></li>
        <li><a href="#">ONLINE</a></li>
        <li><a href="#">BOOK</a></li>
        <li><a href="#">EVENTS</a></li>
        <li><a href="#">ALUMNI</a></li>
    </ul>
</div>
'
                ]
            ],
            'position-position-4734' => [
                'title' => 'Aside',
                'attributes' => [
                    'key' => 'aside'
                ]
            ],
            'position-position-3949' => [
                'title' => 'Sidebar',
                'attributes' => [
                    'key' => 'sidebar'
                ]
            ],
            'custom-9609' => [
                'title' => 'Logo',
                'attributes' => [
                    'html' => '<div class="jl-ft-about" style="text-align: left">
	<div class="jl-heading">
      <img src="gantry-media://logo/logo.png" alt="" />
  </div>
</div>'
                ]
            ],
            'custom-2410' => [
                'title' => 'Information',
                'attributes' => [
                    'html' => '<div class="jl-custom-ft uk-grid">
  <div class="jl-custom-title uk-width-1-1">
    <h3>Information</h3>
  </div>

    <div class="jl-custom-link uk-width-1-1">
      <a href="#">Who we are </a>
    </div>
    <div class="jl-custom-link uk-width-1-1">
      <a href="#">History </a>
    </div>
    <div class="jl-custom-link uk-width-1-1">
      <a href="#">Facts & Figures </a>
    </div>
    <div class="jl-custom-link uk-width-1-1">
      <a href="#">Programs </a>
    </div>
    <div class="jl-custom-link uk-width-1-1">
      <a href="#">Mission / Vision </a>
    </div>

</div>'
                ]
            ],
            'custom-6963' => [
                'title' => 'Quick Link',
                'attributes' => [
                    'html' => '<div class="jl-custom-ft uk-grid">
  <div class="jl-custom-title uk-width-1-1">
    <h3>QUICK LINK</h3>
  </div>

    <div class="jl-custom-link uk-width-1-1">
      <a href="#">Falcuties & Department </a>
    </div>
    <div class="jl-custom-link uk-width-1-1">
      <a href="#">Business & Corporation </a>
    </div>
    <div class="jl-custom-link uk-width-1-1">
      <a href="#">Events </a>
    </div>
    <div class="jl-custom-link uk-width-1-1">
      <a href="#">Charity </a>
    </div>
    <div class="jl-custom-link uk-width-1-1">
      <a href="#">Alumni </a>
    </div>
</div>'
                ]
            ],
            'custom-1285' => [
                'title' => 'Extra Link',
                'attributes' => [
                    'html' => '<div class="jl-custom-ft uk-grid">
  <div class="jl-custom-title uk-width-1-1">
    <h3>EXTRA LINK</h3>
  </div>

    <div class="jl-custom-link uk-width-1-1">
      <a href="#">Accessibility </a>
    </div>
    <div class="jl-custom-link uk-width-1-1">
      <a href="#">Legal </a>
    </div>
    <div class="jl-custom-link uk-width-1-1">
      <a href="#">Sitemap </a>
    </div>
    <div class="jl-custom-link uk-width-1-1">
      <a href="#">Terms of use </a>
    </div>
    <div class="jl-custom-link uk-width-1-1">
      <a href="#">Privacy </a>
    </div>
</div>'
                ]
            ],
            'custom-5076' => [
                'title' => 'Contact Information',
                'attributes' => [
                    'html' => '<div class="jl-custom-ft uk-grid">
  <div class="jl-custom-title uk-width-1-1">
    <h3>CONTACT INFORMATION</h3>
  </div>

    <div class="jl-custom-link uk-width-1-1">
      <a href="#">Senate House, Tyndall
Avenue, Bristol, BS8 1TH, UK. </a>
    </div>
    <div class="jl-custom-link uk-width-1-1">
      <a href="#">Tel: +44 (0)117 928 9000 </a>
    </div>
    <div class="jl-custom-link uk-width-1-1">
      <a href="#">Email: demo@joomlead.com </a>
    </div>

</div>'
                ]
            ],
            'branding-2819' => [
                'attributes' => [
                    'content' => 'Copyright © 2017. Powered by <a href="https://www.joomlead.com/" title="JoomLead" class="g-powered-by">JoomLead<span class="hidden-tablet"> </span></a>.All rights reserved.'
                ]
            ],
            'social-3954' => [
                'attributes' => [
                    'items' => [
                        0 => [
                            'icon' => 'fa fa-twitter fa-fw',
                            'text' => '',
                            'link' => 'http://www.twitter.com/joomlead',
                            'name' => 'Twitter'
                        ],
                        1 => [
                            'icon' => 'fa fa-facebook fa-fw',
                            'text' => '',
                            'link' => 'http://www.facebook.com/joomlead',
                            'name' => 'Facebook'
                        ],
                        2 => [
                            'icon' => 'fa fa-google-plus fa-fw',
                            'text' => '',
                            'link' => 'https://plus.google.com/+joomlead',
                            'name' => 'Google+'
                        ],
                        3 => [
                            'icon' => 'fa fa-instagram',
                            'text' => '',
                            'link' => '#',
                            'name' => 'Instagram'
                        ]
                    ]
                ]
            ]
        ]
    ]
];
