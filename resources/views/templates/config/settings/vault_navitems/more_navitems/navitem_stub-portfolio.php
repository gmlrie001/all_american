<?php

  return [
    'portfolio' => [
        'title' => 'Portfolio', 
        'page_id' => '33', 
        'icon' => 'fa fa-rss', 
        'main_link_database_tables' => [
            'portfolio_categories' => [
                'title' => 'Categories', 
                'icon' => 'fa fa-sitemap', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    'portfolios', 
                ]
            ], 
            'portfolios' => [
                'title' => 'Posts', 
                'icon' => 'fa fa-rss', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    'portfolio_galleries', 
                    'portfolio_subarticles', 
                    'portfolio_subarticle_galleries', 
                ]
            ], 
        ], 
        'tab_database_tables' => [
            'portfolios', 
            'portfolio_galleries', 
            'portfolio_subarticles', 
            'portfolio_subarticle_galleries', 
        ]
    ],

  ]['portfolio'];
