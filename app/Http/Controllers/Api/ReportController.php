<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Exports\CourseExport;
use App\Models\Courses;

class ReportController extends Controller
{
    public function reportStudentCurse()
    {
        dd('report');
    }
}
