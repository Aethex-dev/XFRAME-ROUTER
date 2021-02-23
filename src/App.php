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
     * @return bool, returns if the application name exists
     * 
    */

    function app_exists($app) {

        if(file_exists(str_replace('\\', '/', __DIR__)) . '/src/apps/' . $this->get_request_app() . '/App.php') {
            return true;
        }

        return false;

    }

    /** 
     * check if the url action parameter was set
     * 
     * @return bool, returns if the action url parameter was set
     * 
    */

    function action_isset() {

        $url = $this->get_url();

        if(strlen($url) > 1) {
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

    function get_request_action() {

        $url = $this->get_request_url();

        if($this->action_isset($url[1])) {
            return $url[1];
        }

        return 'Main';

    }

}
