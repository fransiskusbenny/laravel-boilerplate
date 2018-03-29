<?php

if (!function_exists('get_gravatar')) {
    /**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     *
     * @param string $email The email address
     * @param int $s Size in pixels, defaults to 80px [ 1 - 2048 ]
     * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
     * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
     * @param bool $img True to return a complete IMG tag False for just the URL
     * @param array $atts Optional, additional key/value attributes to include in the IMG tag
     * @return string containing either just a URL or a complete image tag
     */
    function get_gravatar ($email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = [])
    {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5(strtolower(trim($email)));
        $url .= "?s=$s&d=$d&r=$r";
        if ($img) {
            $url = '<img src="' . $url . '"';
            foreach ($atts as $key => $val)
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }
}

if (!function_exists('flash')) {
    /**
     * @param string $message
     * @param string $type
     * @param null $style
     * @return \App\Helpers\Flash\FlashNotifier
     */
    function flash ($message = '', $type = 'info', $style = null)
    {
        $flash = new \App\Helpers\Flash\FlashNotifier(app('session.store'));

        if (is_null($message)) {
            return $flash;
        }

        return $flash->message($message, $type, $style);
    }
}

if (!function_exists('menu_active')) {
    function menu_active ($menu, $activeClass = 'active')
    {
        $path = get_url_menu_active($menu);

        return request()->is($path) ? $activeClass : null;
    }

    function get_url_menu_active ($menu)
    {
        $url = [];
        if ($menu->childs()->exists()) {
            foreach ($menu->childs as $child) {
                $url[] = get_url_menu_active($child);
            }
        } else {
            $url = "$menu->url*";
        }

        return collect($url)->flatten()->all();
    }
}