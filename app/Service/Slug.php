<?php

namespace App\Service;

class Slug
{
    public static function createSlug($string)
    {
        $slug = strtolower(str_replace(' ', '-', $string));

        return $slug;
    }
}
