<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'cover',
        'attach_file',
        'description',
    ];

    // relation
    public function type()
    {
        return $this->hasOne(Type::class, 'id', 'type_id');
    }

    // relation
    public function auth()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
