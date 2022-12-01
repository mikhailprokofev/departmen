<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobTitleRequest;
use App\Http\Requests\UpdateJobTitleRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\JobTitle;

class JobTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return JobTitle::orderByDesc('id')->paginate(20);
        // return JobTitle::orderByDesc('id')->simplePaginate(20);
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
        return redirect()->route('jobtitle.show', $jobtitle);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function show(JobTitle $jobTitle)
    {
        return $jobTitle;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobTitleRequest  $request
     * @param  \App\Models\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobTitleRequest $request, JobTitle $jobTitle)
    {
        $validated = $request->validated();
        $jobTitle->fill($validated);
        $jobTitle->save();
        return redirect()->route('jobTitle.show', $jobTitle);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobTitle $jobTitle)
    {
        if (!empty(Auth::user())) {
            $jobTitle->delete();
            return redirect()->route('jobTitle.index');
        } else {
            return redirect()->route('jobTitle.index');
        }
    }
}
