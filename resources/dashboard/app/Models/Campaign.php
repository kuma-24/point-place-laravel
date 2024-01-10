<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'administrator_id',
        'title',
        'category',
        'explanation',
        'point',
        'thumbnail',
        'activated',
        'deactivated',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function administrator()
    {
        return $this->belongsTo(Administrator::class, 'administrator_id');
    }
}
