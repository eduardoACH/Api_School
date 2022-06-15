<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class LoginResource extends JsonResource
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
            'id'=> $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => Carbon::create($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::create($this->updated_at)->format('d-m-Y'),
            'access_token' => $this->acceess_token
        ];
    }
}
