<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplatePartners extends Controller
{

    protected $acf = true; // ['Partners']

    public function Partners() {
        return get_field('partners');
    }

}
