<?php

namespace App\Exports;

use App\Models\Courses;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class CourseExport implements FromCollection
{
    use Exportable;

    private $year;
    private $idCourse;

    public function __construct(int $year,int $id)
    {
        $this->year = $year;
        $this->idCourse = $id;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $course = Courses::find($this->idCourse)->whereYear('created_at',$this->year);
        return $course;
    }
}
