<?php

namespace App\Models;

use App\Models\Commentary;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function comments()
    {
        return $this->hasMany(Commentary::class);
    }

    protected $fillable = ['image_path', 'description', 'phone'];
}
