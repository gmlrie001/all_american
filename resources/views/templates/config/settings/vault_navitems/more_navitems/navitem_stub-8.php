<?php

  return [
    'checkout' => [
        'title' => 'Orders', 
        'page_id' => '13', 
        'icon' => 'fa fa-money', 
        'main_link_database_tables' => [
            'orders' => [
                'title' => 'Orders', 
                'icon' => 'fa fa-shopping-basket', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    'basket_products', 
                ]
            ], 
            'abandons' => [
                'title' => 'Abandoned Carts', 
                'icon' => 'fa fa-shopping-basket', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    'basket_products', 
                ]
            ], 
            // 'quotes' => [
            //     'title' => 'Quotes', 
            //     'icon' => 'fa fa-shopping-basket', 
            //     'specific_id' => '', 
            //     'sub_database_tables' => [
            //         'basket_products', 
            //     ]
            // ], 
            // 'laybyes' => [
            //     'title' => 'Laybyes', 
            //     'icon' => 'fa fa-shopping-basket', 
            //     'specific_id' => '', 
            //     'sub_database_tables' => [
            //         'basket_products', 
            //     ]
            // ], 
            'payment_options' => [
                'title' => 'Payment Options', 
                'icon' => 'fa fa-dollar', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    '', 
                ]
            ],  
            // 'item_returns' => [
            //     'title' => 'Returns', 
            //     'icon' => 'fa fa-arrow-circle-o-left ', 
            //     'specific_id' => '', 
            //     'sub_database_tables' => [
            //         '', 
            //     ]
            // ], 
            'shipping_options' => [
                'title' => 'Shipping Options', 
                'icon' => 'fa fa-ship', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    'shipping_option_rates', 
                ]
            ], 
            'coupons' => [
                'title' => 'Coupons', 
                'icon' => 'fa fa-ticket', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    'coupon_options', 
                    'coupon_uses'
                ]
            ], 
            'delivery_areas' => [
                'title' => 'Delivery Areas', 
                'icon' => 'fa fa-map-signs', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    'delivery_area_options', 
                ]
            ],  
            // 'gifts' => [
            //     'title' => 'Gifts', 
            //     'icon' => 'fa fa-gift', 
            //     'specific_id' => '', 
            //     'sub_database_tables' => [
            //         '', 
            //     ]
            // ],  
            'collection_points' => [
                'title' => 'Collection Points', 
                'icon' => 'fa fa-car', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    '', 
                ]
            ],  
        ], 
        'tab_database_tables' => [
            'basket_products', 
            'coupon_options', 
            'delivery_area_options', 
            'shipping_option_rates', 
            'coupon_uses'
        ]
    ],

  ]['checkout'];
