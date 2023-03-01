<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table = 'history';
    public function products()
    {
        return $this->hasMany(History::class,'product_id');
    }
}
