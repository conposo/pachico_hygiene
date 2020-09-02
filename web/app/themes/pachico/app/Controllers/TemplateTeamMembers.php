<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateTeamMembers extends Controller
{

    protected $acf = true; // ['HERO', 'Latest news']

    public function TeamMembers() {
        // get jobs
        $args = array( 
            'post_type' => 'team_members',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'ASC',
        );

        $loop = new \WP_Query( $args ); 
        // dd($loop);
        return $loop;
    }

}
