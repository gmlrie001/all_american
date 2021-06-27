<?php

  return [
    'inspiration' => [
        'title' => 'Inspiration', 
        'page_id' => '12', 
        'icon' => 'fa fa-paint-brush', 
        'main_link_database_tables' => [
            'inspiration_categories' => [
                'title' => 'Categories', 
                'icon' => 'fa fa-paint-brush', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    'inspiration_articles', 
                    'inspiration_products'
                ]
            ], 
        ], 
        'tab_database_tables' => [
            'inspiration_articles', 
            'inspiration_products'
        ]
    ],


  ]['inspiration'];
