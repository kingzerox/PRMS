<?php

use App\Models\Device;

return [
    'title'   => '设备',
    'single'  => '设备',
    'model'   => Device::class,

    'columns' => [

        'id' => [
            'title' => 'ID',
        ],
        'title' => [
            'title'    => '名称',
            'sortable' => false,
            'output'   => function ($value, $model) {
                return '<div style="max-width:260px">' . model_link($value, $model) . '</div>';
            },
        ],
        'devcategory' => [
            'title'    => '设备分类',
            'sortable' => false,
            'output'   => function ($value, $model) {
                return model_admin_link($model->devcategory->name, $model->devcategory);
            },
        ],
        'status' => [
            'title'    => '设备状态',
            'sortable' => false,
            'output'   => function ($value, $model) {
                return model_admin_link($model->status->name, $model->status);
            },
        ],
        'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'title' => [
            'title'    => '名称',
        ],
        'devcategory' => [
            'title'              => '设备分类',
            'type'               => 'relationship',
            'name_field'         => 'name',
            'search_fields'      => ["CONCAT(id, ' ', name)"],
            'options_sort_field' => 'id',
        ],
        'status' => [
            'title'              => '设备状态',
            'type'               => 'relationship',
            'name_field'         => 'name',
            'search_fields'      => ["CONCAT(id, ' ', name)"],
            'options_sort_field' => 'id',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => '内容 ID',
        ],
        'title' => [
            'title'    => '名称',
        ],
        'devcategory' => [
            'title'              => '设备分类',
            'type'               => 'relationship',
            'name_field'         => 'name',
            'search_fields'      => array("CONCAT(id, ' ', name)"),
            'options_sort_field' => 'id',
        ],
        'status' => [
            'title'              => '设备状态',
            'type'               => 'relationship',
            'name_field'         => 'name',
            'search_fields'      => array("CONCAT(id, ' ', name)"),
            'options_sort_field' => 'id',
        ],
    ],
    'rules'   => [
        'title' => 'required'
    ],
    'messages' => [
        'title.required' => '请填写标题',
    ],
];
