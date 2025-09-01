<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'member_id', 'comment'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

public function member()
{
    return $this->belongsTo(\App\Models\Member::class, 'member_id');
}

}

