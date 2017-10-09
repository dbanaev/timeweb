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
}
