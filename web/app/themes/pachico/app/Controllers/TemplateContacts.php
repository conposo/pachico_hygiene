<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateContacts extends Controller
{

    protected $acf = true; // ['HERO', 'Latest news']

    public function contacts() {
        return get_field('contacts');
    }
    
    public function iframe_embeded_map() {
        return get_field('map');
    }

}
