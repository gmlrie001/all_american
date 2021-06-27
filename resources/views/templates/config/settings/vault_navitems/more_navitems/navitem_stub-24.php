<?php

  return [
    'information_pages' => [
        'title' => 'Information Pages', 
        'page_id' => '', 
        'icon' => 'fa fa-info', 
        'main_link_database_tables' => [
            'information_pages' => [
                'title' => 'Pages', 
                'icon' => 'fa fa-info', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    'information_page_banners', 
                    'information_page_banner_blocks', 
                    'information_page_articles', 
                    'information_page_article_sub_articles', 
                ]
            ], 
        ], 
        'tab_database_tables' => [
            'information_page_banners', 
            'information_page_banner_blocks', 
            'information_page_articles', 
            'information_page_article_sub_articles', 
        ]
    ],

  ]['information_pages'];
