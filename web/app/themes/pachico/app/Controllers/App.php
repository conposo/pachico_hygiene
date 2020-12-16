<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{

    public function host()
    {
        $parsedUrl = parse_url($_SERVER['SERVER_NAME']);
        $host = explode('.', $parsedUrl["path"]);
        return $host;
    }
    
    public function ContainerClass()
    {
        return ( is_front_page() || (is_single() && !is_product()) ) ? '' : 'container';
    }

    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Резултати за <i>%s</i>', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }
}
