<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
//    use Searchable;

    protected $dates = ['deleted_at'];
}
