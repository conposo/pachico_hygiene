<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleProduct extends Controller
{

    protected $acf = true; // ['product_subtitle', '']

    public function __construct()
    {
        // dd(5);
    }

    public function subtitle() {
        return get_field('product_subtitle');
    }

    public function pictograms() {
        // dd( get_field('pictograms') );
        return get_field('pictograms');
    }

    public function the_excerpt() {
        return get_the_excerpt();
    }

    // NEXT section

    public function video() {
        return get_field('video');
    }

    public function files() {
        return get_field('files');
    }

    public function product_description() {
        return get_field('product_description');
    }

}
