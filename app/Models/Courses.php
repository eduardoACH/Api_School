<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courses extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'code'
    ];

    public function teachers()
    {
        return $this->belongsToMany(User::class,'teachers_courses')->wherePivot('deleted_at',NULL);
    }

    public function scores()
    {
        return $this->hasMany(Scores::class,'course_id');
    }
}
