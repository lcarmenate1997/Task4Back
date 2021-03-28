<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return Job::orderBy('id', 'desc')->with('category')->get();
    }

    public function show($id)
    {
        return Job::find($id);
    }

    public function store(Request $request)
    {
        return Job::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->update($request->all());

        return $job;
    }

    public function delete(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return 204;
    }
}
