<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manufacturer extends Model
{
    use HasFactory;

    protected $fillable = ['name','address','phone'];

    public function manufacturer(){
       return $this->belongsTo(manufacturer::class);
    }
}
