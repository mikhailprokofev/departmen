<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobTitleRequest;
use App\Http\Requests\UpdateJobTitleRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\JobTitle;
use App\Http\Resources\JobTitleResource;

use Illuminate\Support\Facades\Log;

class JobTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return JobTitleResource::collection(
            JobTitle::orderBy('id')->paginate(20)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobTitleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobTitleRequest $request)
    {
        $validated = $request->validated();
        $jobtitle = JobTitle::create($validated);
        Log::info($jobtitle);
        return redirect()->route('jobtitle.show', $jobtitle);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobTitle  $jobtitle
     * @return \Illuminate\Http\Response
     */
    public function show(JobTitle $jobtitle)
    {
        Log::info($jobtitle);
        return new JobTitleResource($jobtitle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobTitleRequest  $request
     * @param  \App\Models\JobTitle  $jobtitle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobTitleRequest $request, JobTitle $jobtitle)
    {
        $validated = $request->validated();
        $jobtitle->fill($validated);
        $jobtitle->save();
        return redirect()->route('jobTitle.show', $jobtitle);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobTitle  $jobtitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobTitle $jobtitle)
    {
        if (!empty(Auth::user())) {
            $jobtitle->delete();
            return redirect()->route('jobTitle.index');
        } else {
            return redirect()->route('jobTitle.index');
        }
    }
}
