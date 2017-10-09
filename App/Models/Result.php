<?php

namespace App\Models;

use App\Model;

class Result
    extends Model
{
    const TABLE = 'results';

    public $url;
    public $elements;
    public $count;
    public $type;
    public $txt;
}
