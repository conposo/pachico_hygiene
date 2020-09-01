<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{

    protected $acf = true; // ['HERO', 'Latest news']

    public function hero() {

        $hero = get_field('hero');
        
        // dd($hero['images']);
        
        $headings = array_map(function($title){
            return array_values( $title )[0];
        }, array_values($hero['headings']));
        $headings = implode(", ", $headings);

        return [
            'images' => $hero['images'],
            'static_text' => $hero['static_text'],
            'headings' => $headings,
        ];
    }

    public function about_us() {
        $about_us = get_field('about_us');
        // dd($about_us);
        return [
            'image' => $about_us['image'],
            'header' => $about_us['header'],
            'text' => $about_us['text'],
        ];
    }

    public function product_groups() {
        $products = get_field('products');
        $products = array_values($products)[0];
        $products = array_map(function($group){
            return $group['group'];
        }, $products);
        // dd( $products );
        return $products;
    }


}
