<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateJobs extends Controller
{

    protected $acf = true; // ['HERO', 'Latest news']

    public function Jobs() {
        // get jobs
        $args = array( 
            'post_type' => 'jobs',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'ASC',
        );

        $loop = new \WP_Query( $args ); 
        $jobs = [];
        // dd($loop);
        return $loop;
    }

}
