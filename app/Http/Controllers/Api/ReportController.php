<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Exports\CourseExport;
use App\Models\Courses;

class ReportController extends Controller
{
    public function reportStudentCurse(Request $request)
    {
        return (new CourseExport($request->year,$request->course_id))->download('course.xlsx', Excel::XLSX);
    }
}
