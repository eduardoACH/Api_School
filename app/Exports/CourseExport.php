<?php

namespace App\Exports;

use App\Models\Courses;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;

class CourseExport implements FromView
{
    use Exportable;

    private $year;
    private $course_id;

    public function __construct(int $year,int $id)
    {
        $this->year = $year;
        $this->course_id = $id;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
   
    public function view(): View
    {
        $course = Courses::join('scores','courses.id','=','scores.course_id' )
        ->join('students','scores.student_id','=','students.id')
        ->join('users as alum','students.user_id','=','alum.id')
        ->join('teachers_courses','courses.id','=','teachers_courses.courses_id')
        ->join('users as teacher','teachers_courses.user_id','=','teacher.id')
        ->whereYear('courses.created_at',$this->year)
        ->where('courses.id',$this->course_id)
        ->select('courses.name as curso','alum.name as alumno','teacher.name as maestro')
        ->groupBy('courses.id','courses.name','alum.name','teacher.name')->get();
        return view('report', [
            'datas' => $course
        ]);
    }
}
