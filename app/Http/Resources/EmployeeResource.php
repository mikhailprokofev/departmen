<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

// use App\Http\Resources\DepartmentResource;
// use App\Http\Resources\JobTitleResource;

use Illuminate\Support\Facades\Auth;

class EmployeeResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            $this->mergeWhen(!empty(Auth::user()), [
                'age' => $this->age,
                'salary' => $this->salary,
                'adress' => $this->adress,
                'experience' => $this->experience,
                'phone' => $this->phone,
                'jobTitles' => $this->jobTitle,
                'department' => $this->department,
            ]),
        ];
    }
}
