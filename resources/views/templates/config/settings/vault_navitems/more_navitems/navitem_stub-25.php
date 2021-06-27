<?php

return [

  'Recipes' => [

    'title' => 'Recipes',
    'page_id' => '18',
    'icon' => 'fa fa-newspaper-o',
  
    'main_link_database_tables' => [
      'recipes' => [
        'title' => 'Posts',
        'icon' => 'fa fa-pizza-slice',
        'specific_id' => '',
        'sub_database_tables' => [
          'recipe_products',
          'recipe_subarticles',
          'recipe_galleries'
        ]
      ],
    // 'food_groups' => [
    //     'title' => 'Food Group',
    //     'icon' => 'fa fa-filter',
    //     'specific_id' => '',
    //     'sub_database_tables' => [
    //     ]
    // ],
    // 'meal_types' => [
    //     'title' => 'Meal Type',
    //     'icon' => 'fa fa-filter',
    //     'specific_id' => '',
    //     'sub_database_tables' => [
    //     ]
    // ],
    ],
    'tab_database_tables' => [
      'recipe_products',
      'recipe_subarticles',
      'recipe_galleries'
    ],
  ]

]['Recipes'];
