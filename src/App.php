<?php

namespace xframe\Router;

class App {

    function get_url():array {

        $unparsed = $_SERVER['REQUEST_URI'] ?? '/';

        if($unparsed === '/') {

            $parsed = array('/');

        } else {

            $parsed = $unparsed;

        }

        return $parsed;

    }

}
