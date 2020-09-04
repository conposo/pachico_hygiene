<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateAboutus extends Controller
{

    protected $acf = true; // ['', '']


    public function section1() {
        return get_field('section_1');
    }
    public function section2() {
        return get_field('section_2');
    }
    public function section3() {
        return get_field('section_3');
    }
    public function section4() {
        return get_field('section_4');
    }


    public function Timeline() {
        $timeline = get_field('timeline');
        // dd($timeline);
        return $timeline['timeline'];
    }

    public function TimelineHeader() {
        $timeline = get_field('timeline');
        return $timeline['section_header'];
    }
    
    public function TimelineIntorduction() {
        $timeline = get_field('timeline');
        return $timeline['section_introduction'];
    }

}
