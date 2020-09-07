<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Archive extends Controller
{

    protected $acf = true; // ['', '']

    public function __construct()
    {
        // dd();
    }

    public function categories() {
        $categories = get_field('categories', wc_get_page_id('shop'));
        // dd($categories, get_the_id());
        return $categories;
    }
}
