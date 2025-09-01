<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['member_id', 'name', 'genre', 'rating', 'comment', 'quote'];


    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
