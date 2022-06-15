<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeacherCourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'courses_id' => $this->courses_id,
            'user_id' => $this->user_id,
            'teacher' => new UserResource($this->teacher),
            'course' => new CourseResource($this->course)
        ];
    }
}
