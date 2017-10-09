<?php

namespace App\Models;

use App\Model;
use App\MultiException;

class Result
    extends Model
{
    const TABLE = 'results';

    public $url;
    public $elements;
    public $count;
    public $type;
    public $txt;


    public function fill($data = []) {
        $e = new MultiException();
        if (true) {
            $e[] = new \Exception('Заголовок неверный');
        }
        if (true) {
            $e[] = new \Exception('Текст неверный');
        }
        throw $e;
    }

}