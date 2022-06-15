<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScoreRequest;
use App\Models\Students;
use App\Models\Courses;
use App\Models\Scores;
use App\Http\Resources\ScoreResource;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ScoreController extends Controller
{
    public function store(ScoreRequest $request)
    {
        $studentDate = new Carbon(Students::find($request->student_id)->created_at);
        $courseDate =  new Carbon(Courses::find($request->course_id)->created_at);
        $countUser = Scores::where('student_id',$request->student_id)->count();
        if(!$studentDate->diffInYears($courseDate) == 0){
            return  response(['message' => 'The year does not match'],400);
        }       
        if($countUser >=5){
            return  response(['message' => 'Grade limit'],400);
        }
        $score = Scores::find(10);
        $score = new Scores($request->validated());
        $score->save();
        
        return new ScoreResource($score);
    }
}
