<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class categoury extends Model
{
    use HasFactory;
    protected $fillable = [

        'name',
        'img',
        'info',
        'user_id'
    ];


    /**
     * Get all of the comments for the categoury
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

}
