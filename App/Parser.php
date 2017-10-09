<?php

namespace App;

use App\Models\Result;

class Parser
{
    protected $ch;
    protected $page;
    protected $url;


    public function __construct($url)
    {
        if (!$url) {
            throw new \App\Exceptions\Parser('Невалидный адрес ресурса');
        }

        $this->url = $url;
        $this->ch = curl_init($url);

        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->ch, CURLOPT_HEADER, false);

        $this->page = curl_exec($this->ch);

        curl_close($this->ch);

        if (!$this->page) {
            throw new \App\Exceptions\Parser('Не удалось получить содержимое страницы');
        }
    }

    public function saveElements($type, $text = '') {

        switch ($type) {
            case 'img':
                $pattern = '#(<img[^>]*>)#';
                break;
            case 'a':
                $pattern = '#(<a[^<]*<\/a>)#';
                break;
            case 'text':
                if ('' == $text) throw new \App\Exceptions\Parser('Пустой параметр для поиска текста');
                $pattern = '#('. $text .')\S#';
                break;
            default:
                throw new \App\Exceptions\Parser('Невалидный элемент для поиска');
        }

        $matches = preg_match_all($pattern, $this->page, $out, PREG_SET_ORDER);

        if (false === $matches) {
            throw new \App\Exceptions\Parser('Невалидное регулярное выражение');
        }

        $result = new Result();

        $result->url = $this->url;
        $result->type = $type;
        $result->txt = $text;
        $result->count = $matches;

        $elements = '';
        foreach ($out as $element) {
            $elements .= $element[0];
        }

        $result->elements = $elements;

        $result->insert();
    }

}