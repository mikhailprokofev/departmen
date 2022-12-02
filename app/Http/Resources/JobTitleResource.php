<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

// use App\Http\Resources\DepartmentResource;
use App\Http\Resources\EmployeeResource;

use Illuminate\Support\Facades\Auth;

class JobTitleResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'department' => $this->department,
            $this->mergeWhen(!empty(Auth::user()), [
                'job_description' => $this->job_description,
                'base_salary' => $this->base_salary,
                'employee' => EmployeeResource::collection($this->employee),
                'numberOfEmployee' => 
                    EmployeeResource::collection(
                        $this->whenLoaded('employee')
                    )->count(),
            ]),
        ];
    }
}
