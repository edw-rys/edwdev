<?php
return [
    'title' => 'Edw Dev',
    'description'   => 'Edw Dev, Desarrollo de aplicativos web, Técnología',
    'emails'    => [
        'send' => 'edw-toni@hotmail.com'
    ],
    /**
     * Social media
     */
    'social-media'  => [
        (object) [
            'name'  => 'Facebook',
            'url'   => 'https://www.facebook.com/edw.rysv/',
            'icon'  => 'fab fa-facebook-f'
        ],
        (object) [
            'name'  => 'Instagram',
            'url'   => 'https://www.instagram.com/ed.rys/',
            'icon'  => 'fab fa-instagram'
        ],
        (object) [
            'name'  => 'Linkedin',
            'url'   => 'https://ec.linkedin.com/',
            'icon'  => 'fab fa-linkedin-in'
        ],
        (object) [
            'name'  => 'Twitter',
            'url'   => 'https://www.twitter.com/edw.rysv/',
            'icon'  => 'fab fa-twitter'
        ],
        (object) [
            'name'  => 'Pinterest',
            'url'   => 'https://www.pinterest.com/edw.rysv/',
            'icon'  => 'fab fa-pinterest-p'
        ],
    ],
    /**
     * Habilities
     */
    'habilities'    => [
        'global.habilities.development_front',
        'global.habilities.development_back',
        'global.habilities.development_mobile',
    ],
    /**
     * Name
     */
    'name'  => 'Edw Rys',
    /**
     * About
     */
    'about'     => 'global.about.content',
    /**
     * More
     */
    'more'      => [
        (object) [
            'total'         => 6,
            'icon'          => 'icon icon-fire',
            'description'    => 'Proyectos completados.'
        ],
        (object) [
            'total'         => 5,
            'icon'          => 'icon icon-graduation',
            'description'    => 'Aplicaciones Web'
        ],
        (object) [
            'total'         => 200,
            'icon'          => 'icon icon-cup',
            'description'    => 'Cup of coffee.'
        ],
        (object) [
            'total'         => 0,
            'icon'          => 'icon icon-badge',
            'description'    => 'Premios ganados.'
        ]
    ],
    'percentage_habilities' => [
        (object) [
            'name'  => 'Desarrollador Web',
            'total' => 60,
            'color' => '#FFD15C'
        ],
        (object) [
            'name'  => 'Desarrollador móvil',
            'total' => 20,
            'color' => '#FFD15C'
        ],
        (object) [
            'name'  => 'DBA',
            'total' => 15,
            'color' => '#FF4C60'
        ],
        (object) [
            'name'  => 'Photshop',
            'total' => 5,
            'color' => '#6C6CE5'
        ],
    ],
    /**
     * Services
     */
    'services'      => [
        (object) [
            'title'         => 'Desarrollo Web a Medida',
            'image'         => 'front/images/services/photo-1542744095-291d1f67b221.jpg',
            'description'   => 'Dele a sus clientes una mejor experiencia mediante un aplicativo web.',
            'color'         => '#6C6CE5',
        ],
        (object) [
            'title'         => 'Desarrollo de aplicaciones móvile (android)',
            'image'         => 'front/images/services/photo-1555774698-0b77e0d5fac6.jpg',
            'description'   => 'Dele a sus clientes una mejor experiencia mediante un aplicativo móvil.',
            'color'         => '#F9D74C',
        ],
        (object) [
            'title'         => 'Desarrollo de APIs',
            'image'         => 'front/images/services/photo-1523800503107-5bc3ba2a6f81.jpg',
            'description'   => 'Desarrollo de interfaces de conexión entre una aplicación cliente y servidor..',
            'color'         => '#F97B8B',
        ],
    ],
];