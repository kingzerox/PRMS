<?php
use App\Models\User;
return [
    'title' =>  '用户',
    'heading' =>  '用户管理',
    'single' => '用户',
    'model' => User::class,
    'columns' => [
        'id' => [
            'title' => 'ID'
        ],
        'sid' => [
            'title' => '学号'
        ],
        'name' => [
            'title' => '用户名',
        ],
        'email' => [
            'title' => 'Email',
        ],
        'created_at',
        'operation' => [
            'title'  => '管理',
            'output' => function ($value, $model) {
                return $value;
            },
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'sid' => [
            'title' => '学号',
            'type' => 'text'
        ],
        'name' => [
            'title' => '用户名',
            'type' => 'text'
        ],
        'email' => [
            'title' => 'Email',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
        'sid' => [
            'title' => '学号',
        ],
        'name' => [
            'title' => '用户名',
        ],
        'email' => [
            'title' => 'Email',
        ],
    ],
];
