<?php

namespace xframe\Router;

class App {

    /** 
     * get requested url
     * 
     * @return array, array of url parameters
     * 
    */

    function get_url() {

        $unparsed = $_SERVER['REQUEST_URI'] ?? '/';

        if($unparsed === '/') {
            $parsed = array('/');
        } else {
            $unparsed = explode("/", $unparsed);
            array_shift($unparsed);
            $parsed = $unparsed;
        }

        return $parsed;

    }

    /** 
     * get requested application
     * 
     * @return string, name of the requested application
     * 
    */

    function get_request_app($home_app = 'index') {

        $url = $this->get_url();

        if($url[0] == '/') {
            return $home_app;
        }
        
        return $url[0];
        
    }

    /** 
     * check if application exists
     * 
     * @param string, app name
     * 
     * @return bool
     * 
    */

    function app_exists($app) {

        if(file_exists(str_replace('\\', '/', __DIR__)) . '/src/apps/' . $this->get_request_app() . '/App.php') {
            return true;
        }

        return false;

    }

    /** 
     * get requested action
     * 
     * @return string, name of the action
     * 
    */

}
