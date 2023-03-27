<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'tittle',
    ];

    public function user()
    {
        return $this->belongsTo(Post::class);
    }
}
