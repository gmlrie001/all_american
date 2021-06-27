<?php

  return [
    'directions' => [
        'title' => 'Directions', 
        'page_id' => '11', 
        'icon' => 'fa fa-map-marker', 
        'main_link_database_tables' => [
            'direction_regions' => [
                'title' => 'Regions', 
                'icon' => 'fa fa-map-marker', 
                'specific_id' => '', 
                'sub_database_tables' => [
                    'directions'
                ]
            ],
        ], 
        'tab_database_tables' => [
            'directions'
        ]
    ],

  ]['directions'];
