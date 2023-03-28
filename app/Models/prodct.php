<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prodct extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'rate',
        'shortInfo',
        'loungInfo',
        'img',
        'model',
        'user_id',
        'categoury_id'
        ];

        public function Categoury()
        {
            return $this->hasOne(Categoury::class, 'categoury_id');
        }

}
