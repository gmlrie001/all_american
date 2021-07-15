<?php

return [

    'account' => [

        'title' => 'Account',
        'page_id' => '0',
        'icon' => 'fa fa-users',
        
        'main_link_database_tables' => [
            'users' => [
                'title' => 'Users',
                'icon' => 'fa fa-user',
                'specific_id' => '',
                'sub_database_tables' => [
                    'user_addresses',
                    'user_wallets',
                    'item_returns', 
                    'store_credits',
                ],
            ],
            'user_groups' => [
                'title' => 'User Groups',
                'icon' => 'fa fa-users',
                'specific_id' => '',
                'sub_database_tables' => [
                    '',
                ],
            ],
            'signups' => [
                'title' => 'Signups',
                'icon' => 'fa fa-user-plus',
                'specific_id' => '',
                'sub_database_tables' => [
                    '',
                ],
            ],
            'wallet_vouchers' => [
                'title' => 'Wallet Vouchers', 
                'icon' => 'fa fa-user-plus', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    '', 
                ]
            ],
        ],

        'tab_database_tables' => [
            'user_addresses',
            'user_wallets',
            'item_returns',
            'store_credits',
        ],

    ],

]['account'];
