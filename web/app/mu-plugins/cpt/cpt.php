<?php
/**
 * Plugin Name: Custom Post Types
 * Description: A plugin that set needed theme Custom Post Types
 * Version: 0.1
 * Author: NUXT
 * Author URI: http://nuxt.co
 * License: GPL2
 */

/*  Copyright 2019  I.Sholekov  (email : sholeka@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


function cmpso_custom_post_types() {

    // $labels = array(
    //     'name'               => 'Faq',
    //     'singular_name'      => 'Faq',
    //     'menu_name'          => 'Faq',
    //     'name_admin_bar'     => 'Faq',
    //     'add_new'            => 'Add New',
    //     'add_new_item'       => 'Add New Faq',
    //     'new_item'           => 'New Faq',
    //     'edit_item'          => 'Edit Faq',
    //     'view_item'          => 'View Faq',
    //     'all_items'          => 'All Faqs',
    //     'search_items'       => 'Search Faqs',
    //     'parent_item_colon'  => 'Parent Faqs:',
    //     'not_found'          => 'No Faqs found.',
    //     'not_found_in_trash' => 'No Faqs found in Trash.',
    // );
    // $faqs_args = array(
    //     'labels'             => $labels,
    //     'public'             => true,
    //     'publicly_queryable' => true,
    //     'show_in_rest'       => true,
    //     'show_ui'            => true,
    //     'show_in_menu'       => true,
    //     'menu_icon'          => 'dashicons-list-view',
    //     'query_var'          => true,
    //     'rewrite'            => array( 'slug' => 'authors' ),
    //     'capability_type'    => 'post',
    //     'has_archive'        => true,
    //     'hierarchical'       => false,
    //     'menu_position'      => 16,
    //     'map_meta_cap'       => true,
    //     'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
    // );
	// register_post_type( 'faq', $faqs_args );

    $labels = array(
        'name'               => 'Team members',
        'singular_name'      => 'Team member',
        'menu_name'          => 'Team',
        'name_admin_bar'     => 'Team member',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Team member',
        'new_item'           => 'New Team member',
        'edit_item'          => 'Edit Team member',
        'view_item'          => 'View Team member',
        'all_items'          => 'All Team members',
        'search_items'       => 'Search Team members',
        'parent_item_colon'  => 'Parent Team members:',
        'not_found'          => 'No Team members found.',
        'not_found_in_trash' => 'No Team members found in Trash.',
    );
    $team_args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_in_rest'       => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-groups',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'authors' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 16,
        'map_meta_cap'       => true,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
    );
	// register_post_type( 'team_members', $team_args );

    $labels = array(
        'name'               => 'Jobs',
        'singular_name'      => 'Job',
        'menu_name'          => 'Jobs',
        'name_admin_bar'     => 'Jobs',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Job',
        'new_item'           => 'New Job',
        'edit_item'          => 'Edit Job',
        'view_item'          => 'View Job',
        'all_items'          => 'All Jobs',
        'search_items'       => 'Search Jobs',
        'parent_item_colon'  => 'Parent Jobs:',
        'not_found'          => 'No Jobs found.',
        'not_found_in_trash' => 'No Jobs found in Trash.',
    );
    $jobs_args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_in_rest'       => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-businessperson',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'authors' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 16,
        'map_meta_cap'       => true,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
    );
	// register_post_type( 'jobs', $jobs_args );

    $labels = array(
        'name'               => 'Certificates',
        'singular_name'      => 'Certificate',
        'menu_name'          => 'Certificates',
        'name_admin_bar'     => 'Certificate',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Certificate',
        'new_item'           => 'New Certificate',
        'edit_item'          => 'Edit Certificate',
        'view_item'          => 'View Certificate',
        'all_items'          => 'All Certificates',
        'search_items'       => 'Search Certificates',
        'parent_item_colon'  => 'Parent Certificates:',
        'not_found'          => 'No Certificates found.',
        'not_found_in_trash' => 'No Certificates found in Trash.',
    );
    $certificate_args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_in_rest'       => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-awards',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'authors' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 16,
        'map_meta_cap'       => true,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
    );
	// register_post_type( 'certificates', $certificate_args );

}
add_action( 'init', 'cmpso_custom_post_types' );
