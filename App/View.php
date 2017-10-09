<?php

namespace App;

class View
{
    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function render($template)
    {
        ob_start();
        include __DIR__ . '/templates/header.php';
        extract($this->data);
        include $template;
        include __DIR__ . '/templates/footer.php';
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display($template)
    {
        echo $this->render($template);
    }

    public function json()
    {
        echo json_encode($this->data);
    }
}