<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class currenciesModel extends Model
{

    protected $table="currencies";

    protected $fillable=[
        'id',
        'name',
        'rate',
        'date',
        'created_at',
        'updated_at',
    ];
}
