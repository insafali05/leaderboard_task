<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Activity;
use App\Models\UserPoint;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['full_name'];


    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
    public function userPoint()
    {
        return $this->hasOne(UserPoint::class);
    }
}
