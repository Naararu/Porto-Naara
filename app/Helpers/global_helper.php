<?php

use App\Models\skills;

function get_value($key)
{
    $data = skills::where('key', $key)->first();
    if ($data) {
        return $data->value;
    }
}
function set_list_workflow($content)
{
    $content = str_replace("<ul>", '<ul class="fa-ul mb-0>"', $content);
    $content = str_replace("<li>", '<li><span class="fa-li"><i class="fas fa-check"></i></span>', $content);
    return $content;
}
