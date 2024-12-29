<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'nationality', 'dob', 'team_id'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

