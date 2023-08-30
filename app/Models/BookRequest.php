<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_name',
        'author',
        'publisher',
        'full_name',
        'email',
        'phone',
        'message',
        'attached_file',
    ];
}
