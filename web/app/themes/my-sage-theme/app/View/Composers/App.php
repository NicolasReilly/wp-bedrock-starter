<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Retrieve the site name.
     */
    public function siteName(): string
    {
        return get_bloginfo('name', 'display');
    }

    public function with()
    {
        $custom_logo_id = get_theme_mod('custom_logo');
        return [
            'primary_nav' => \Log1x\Navi\Navi::make()->build('primary_navigation'),
            'cta_nav' => \Log1x\Navi\Navi::make()->build('cta_navigation'),
            'footer_nav' => \Log1x\Navi\Navi::make()->build('footer_navigation'),
            'siteName' => get_bloginfo('name', 'display'),
            'site_logo' => $custom_logo_id ? wp_get_attachment_image_url($custom_logo_id, 'full') : null,
        ];
    }
}
