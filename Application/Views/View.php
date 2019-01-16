<?php

namespace Application\Views;

class View
{
    protected $data;

    function render($template = 'template') {
        ob_start();
        // you can access $this->data in template
        require "Application/Views/".$template.".php";
        $str = ob_get_contents();
        ob_end_clean();
        return $str;
    }

    function setVar($key, $val) {
        $this->data[$key] = $val;
    }
}