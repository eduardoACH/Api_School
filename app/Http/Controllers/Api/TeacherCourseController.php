<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherCourseRequest;
use App\Models\Courses;
use App\Models\TeachersCourses;
use App\Models\User;
use App\Http\Resources\TeacherCourseResource;

class TeacherCourseController extends Controller
{
    public function store(TeacherCourseRequest $request)
    {
        
        $user = User::findOrFail($request->user_id);
        if(!$user->hasRole('TEACHER')){
            return response(['message','User invalidate'],400);
        }
        $course = new TeachersCourses($request->validated());
        $course->save();
        return new TeacherCourseResource($course);
    }

    public function destroy(TeacherCourseRequest $request)
    {
        $teacherCourse = TeachersCourses::where('courses_id',$request->courses_id)
        ->where('user_id',$request->user_id)->delete();
        return response(['message' => 'Successful Delete'],200);
    }
}
