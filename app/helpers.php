<?php

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}
//导航条
function category_nav_active($category_id)
{
    return active_class((if_route('categories.show') && if_route_param('category', $category_id)));
}
//Topic 模型保存时触发的 saving 事件中，对 excerpt 字段进行赋值
function make_excerpt($value, $length = 200)
{
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
    return str_limit($excerpt, $length);
}
