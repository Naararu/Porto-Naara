<?php

use App\Models\skills;

function get_value($key)
{
    $data = skills::where('key', $key)->first();
    if ($data) {
        return $data->value;
    }
}