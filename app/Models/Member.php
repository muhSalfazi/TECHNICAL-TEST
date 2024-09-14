<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members';

    protected $fillable = ['code', 'name', 'penalty_until'];

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
