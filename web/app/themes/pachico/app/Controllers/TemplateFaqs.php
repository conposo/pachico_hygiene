<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateFaqs extends Controller
{

    protected $acf = true; // ['HERO', 'Latest news']

    public function Faqs() {

        $faqs = get_field('groups');
        // dd($faqs);
        return $faqs;
    }

}
