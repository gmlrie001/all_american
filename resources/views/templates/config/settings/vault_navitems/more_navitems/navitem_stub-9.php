<?php

  return [
    'shop' => [
        'title' => 'Shop', 
        'page_id' => '6', 
        'icon' => 'fa fa-shopping-basket', 
        'main_link_database_tables' => [
//             'pages' => [
//                 'title' => 'Sales Page', 
//                 'icon' => 'fa fa-file', 
//                 'specific_id' => '15', 
//                 'sub_database_tables' => [
//                     '', 
//                 ]
//             ], 
            'filter_option_groups' => [
                'title' => 'Options', 
                'icon' => 'fa fa-filter', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    'filter_options', 
                ]
            ], 
            'product_categories' => [
                'title' => 'Categories', 
                'icon' => 'fa fa-shopping-cart', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    'product_categories', 
                    'product_products', 
                    'product_filter_groups', 
                    'product_filter_options', 
                    'product_filter_galleries', 
                    'product_filter_tabs', 
                    'related_products', 
                    'product_category_banners', 
                    'product_category_banner_blocks', 
                    'product_product_variants', 
                    'product_variants'
                ]
            ], 
            'products' => [
                'title' => 'All Products', 
                'icon' => 'fa fa-shopping-bag', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    'product_products', 
                    'product_filter_groups', 
                    'product_filter_options', 
                    'product_filter_galleries', 
                    'product_filter_tabs', 
                    'related_products', 
                    'product_product_variants', 
                    'product_variants'
                ]
            ], 
        ], 
        'tab_database_tables' => [
            'filter_options', 
            'product_categories', 
            'product_filter_groups', 
            'product_filter_options', 
            'product_filter_galleries', 
            'product_filter_tabs', 
            'related_products', 
            'product_products', 
            'product_category_banners', 
            'product_category_banner_blocks', 
            'product_product_variants', 
            'product_variants'
        ]
    ],

  ]['shop'];
