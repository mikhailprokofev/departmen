<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\JobTitleResource;
use App\Http\Resources\EmployeeResource;

use Illuminate\Support\Facades\Auth;

class DepartmentResource extends JsonResource
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
            'jobTitlesTitles' => JobTitleResource::collection($this->jobTitle)
                ->map(function ($item) {
                    return $item->title;
                }),
            $this->mergeWhen(!empty(Auth::user()), [
                'jobTitles' => JobTitleResource::collection(
                    $this->whenLoaded('jobTitle')
                ),
                'employee' => EmployeeResource::collection($this->employee)->map(function ($item) {
                    return [
                        'name' => $item->name,
                        'email' => $item->email,
                    ];
                }),
                'numberOfEmployee' => 
                    EmployeeResource::collection(
                        $this->whenLoaded('employee')
                    )->count(),
            ]),
        ];
    }
}
