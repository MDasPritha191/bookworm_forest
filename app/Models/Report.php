<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['book_id', 'member_id', 'reason'];

    public function book() {
        return $this->belongsTo(Book::class);
    }

    public function member() {
        return $this->belongsTo(\App\Models\Member::class);
    }
}
