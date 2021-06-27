<?php

  return [
    'blog' => [
        'title' => 'Blog', 
        'page_id' => '3', 
        'icon' => 'fa fa-rss', 
        'main_link_database_tables' => [
            'blog_categories' => [
                'title' => 'Categories', 
                'icon' => 'fa fa-rss', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    '', 
                ]
            ], 
            'blog_posts' => [
                'title' => 'Posts', 
                'icon' => 'fa fa-rss', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    'blog_galleries', 
                    'blog_post_sub_article_galleries', 
                    'blog_post_sub_articles', 
                    'blog_products', 
                ]
            ], 
        ], 
        'tab_database_tables' => [
            'blog_galleries', 
            'blog_post_sub_article_galleries', 
            'blog_post_sub_articles', 
            'blog_products', 
        ]
    ],

  ]['blog'];
