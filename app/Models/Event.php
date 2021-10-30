<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'decription',
        'event_date',
        'category',
        'calendar_id',
        'owner_id',
        'color'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function calendar()
    {
        return $this->belongsTo(Calendar::class);
    }
}
