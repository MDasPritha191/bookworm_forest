<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['member_id', 'name', 'author', 'genre', 'rating', 'comment', 'quote'];

    public function member()
    {
        return $this->belongsTo(\App\Models\Member::class);
    }
}