<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;

// Models
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $projects=Project::all();

       return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        $formData=$request->validated();
        $slug=str()->slug($formData['title']);

        $project=Project::create([
            'title'=> $formData['title'],
            'slug'=> $slug,
            'description'=> $formData['description'],
        ]);

        // $project=new Project();
        // $project->title=$request->input('title');
        // $project->slug=str()->slug($request->input('title'));
        // $project->description=$request->input('description');
        // $project->save();


        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        

       return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        
        $formData=$request->validated();
        $slug=str()->slug($formData['title']);

        

        $project->update(
            [
                'title'=>$formData['title'],
                'slug'=>$slug,
                'description'=>$formData['description'],

            ]
        );

        // $formData=$request->validated();
        // $slug=str()->slug($request->input('title'));

        // $project= Project::findOrFail($project->id);
        // $project->title=$formData['title'];
        // $project->slug=$slug;
        // $project->description=$formData['description'];
        // $project->save();


        return redirect()->route('admin.projects.index',);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project=Project::destroy($project->id);
        
        return redirect()->route('admin.projects.index');
    }
}
