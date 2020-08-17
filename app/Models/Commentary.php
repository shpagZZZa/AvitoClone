<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;

class Commentary extends Model
{
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    protected $fillable = ['content', 'mark', 'author_id'];
}
