<?php

  return [
    'promo_pages' => [
        'title' => 'Promo Pages', 
        'page_id' => '', 
        'icon' => 'fa fa-birthday-cake', 
        'main_link_database_tables' => [
            'promo_pages' => [
                'title' => 'Pages', 
                'icon' => 'fa fa-birthday-cake', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    'promo_page_animation_images', 
                    'promo_page_contacts', 
                ]
            ], 
        ], 
        'tab_database_tables' => [
            'promo_page_animation_images', 
            'promo_page_contacts', 
        ]
    ],

  ]['promo_pages'];
