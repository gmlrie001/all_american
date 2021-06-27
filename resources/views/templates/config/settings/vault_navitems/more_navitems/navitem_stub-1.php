<?php

  return [
    'site_settings' => [
        'title' => 'Site Settings', 
        'page_id' => '0', 
        'icon' => 'fa fa-desktop', 
        'main_link_database_tables' => [
            'sites' => [
                'title' => 'Site', 
                'icon' => 'fa fa-cogs', 
                'specific_id' => '1', 
                'sub_database_tables' => [
                    'site_tracking_codes', 
                ]
            ], 
            'social_media' => [
                'title' => 'Social Media', 
                'icon' => 'fa fa-share-alt', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    '', 
                ]
            ], 
            // 'quick_links' => [
            //     'title' => 'Quick Links', 
            //     'icon' => 'fa fa-link', 
            //     'specific_id' => '', 
            //     'sub_database_tables' => [
            //         '', 
            //     ]
            // ], 
            // 'selling_points' => [
            //     'title' => 'Selling Points', 
            //     'icon' => 'fa fa-shopping-cart', 
            //     'specific_id' => '', 
            //     'sub_database_tables' => [
            //         '', 
            //     ]
            // ],
            'links' => [
                'title' => 'Menu Links', 
                'icon' => 'fa fa-link', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    '', 
                ]
            ], 
            'footer_links' => [
                'title' => 'Footer Links', 
                'icon' => 'fa fa-link', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    '', 
                ]
            ]
        ], 
        'tab_database_tables' => [
            'site_tracking_codes', 
        ]
    ],
  ]['site_settings'];
