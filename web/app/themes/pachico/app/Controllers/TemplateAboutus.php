<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateAboutus extends Controller
{

    protected $acf = true; // ['', '']

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
