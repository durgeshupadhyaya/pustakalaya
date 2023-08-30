<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'link',
        'position',
        'status',
        'dimension',
        'category'
    ];

    public const position = [
        'Top First' => 'Top First',
        'Top Second' => 'Top Second',
        'Center' => 'Center',
        'Bottom 1' => 'Bottom 1',
        'Bottom 2' => 'Bottom 2',
        'Bottom 3' => 'Bottom 3',
        'Bottom 4' => 'Bottom 4',
        'Bottom 5' => 'Bottom 5',
    ];
}
