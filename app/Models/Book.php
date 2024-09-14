<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $tablle = 'Books';
    protected $fillable = ['code', 'title', 'author', 'stock', 'borrowed_by'];

    public function borrowedBy()
    {
        return $this->belongsTo(Member::class, 'borrowed_by');
    }

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
