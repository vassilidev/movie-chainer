<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\JobRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $jobs = Job::all();

        return view('jobs.jobsIndex', compact('jobs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param JobRequest $request
     * @return RedirectResponse
     */
    public function store(JobRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        Job::create($validatedData);

        smilify('success', __('Job successfully created !'));

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Job $job
     * @return View
     */
    public function edit(Job $job): View
    {
        return view('jobs.jobsEdit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Job $job
     * @return RedirectResponse
     */
    public function update(JobRequest $request, Job $job): RedirectResponse
    {
        $validatedData = $request->validated();

        $job->update($validatedData);
        $job->save();

        smilify('success', 'Job successfully modified !');

        return redirect()->route('jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Job $job
     * @return RedirectResponse
     */
    public function destroy(Job $job): RedirectResponse
    {
        $job->delete();

        smilify('success', 'Job successfully deleted !');

        return redirect()->back();
    }
}
