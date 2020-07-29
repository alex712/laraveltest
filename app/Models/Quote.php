<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $table = 'quotes';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['name', 'password', 'email', 'phone', 'start_date', 'end_date', 'products', 'total'];
}
