<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeachersCourses extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'courses_id',
        'user_id'
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function course()
    {
        return $this->belongsTo(Courses::class,'course_id');
    }
}
