<?php

/* ==========================================================
   CONTROLLER: PROJECT CONTROLLER

   File:
   app/Http/Controllers/Admin/ProjectController.php

   Purpose:
   Handles all CRUD operations for portfolio projects.

   Responsibilities:
   • Display all projects
   • Display the create form
   • Store new projects
   • Display a single project
   • Display the edit form
   • Update existing projects
   • Delete projects

   NOTE:
   Database saving will be implemented
   step-by-step as we build the CMS.

========================================================== */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{

    /* ==========================================================
   DISPLAY ALL PROJECTS

   Purpose:
   Retrieves projects from the database.

   Features:
   • Search by title
   • Search by technology
   • Search by category
   • Latest projects first
   • Pagination (10 projects per page)
========================================================== */

    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Search Keyword
        |--------------------------------------------------------------------------
        |
        | Retrieve the user's search keyword from
        | the URL query string.
        |
        */

        $search = request('search');

        /*
        |--------------------------------------------------------------------------
        | Build Project Query
        |--------------------------------------------------------------------------
        |
        | Search multiple project fields if a
        | search keyword is provided.
        |
        */

        $projects = Project::query()

            ->when($search, function ($query, $search) {

                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('technology', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%");

            })

            ->latest()

            ->paginate(10)

            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | Return View
        |--------------------------------------------------------------------------
        */

        return view('admin.projects.index', compact('projects'));
    }


    /* ==========================================================
       SHOW CREATE PROJECT FORM

       Purpose:
       Displays the page used for adding
       a brand-new project.
    ========================================================== */

    public function create()
    {
        return view('admin.projects.create');
    }



    /* ==========================================================
       STORE NEW PROJECT

       Purpose:
       Validates incoming data,
       uploads the project image,
       creates a new project record,
       and redirects back to the
       Projects page.



           Workflow:

           Create Project Form
                    │
                    ▼
           StoreProjectRequest validates data
                    │
                    ▼
           Controller receives validated data
                    │
                    ▼
           Project Model
                    │
                    ▼
           Database

           NOTE:
           We are only testing validation for now.

           Database saving will be added
           in the next lesson.
    ========================================================== */

    public function store(StoreProjectRequest $request)
    {

        /*
        |--------------------------------------------------------------------------
        | STEP 1
        |--------------------------------------------------------------------------
        |
        | Retrieve all validated data.
        |
        */

        $validated = $request->validated();



        /*
        |--------------------------------------------------------------------------
        | STEP 2
        |--------------------------------------------------------------------------
        |
        | Upload the project image if
        | the user selected one.
        |
        */

        if ($request->hasFile('image')) {

            $validated['image'] = $request
                ->file('image')
                ->store('projects', 'public');

        }



        /*
        |--------------------------------------------------------------------------
        | STEP 3
        |--------------------------------------------------------------------------
        |
        | Save the project into
        | the database.
        |
        */

        Project::create($validated);



        /*
        |--------------------------------------------------------------------------
        | STEP 4
        |--------------------------------------------------------------------------
        |
        | Redirect back to the Projects
        | page with a success message.
        |
        */

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project created successfully!');

    }


    /* ==========================================================
       DISPLAY SINGLE PROJECT

       Purpose:
       Displays one project's details.
    ========================================================== */

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }



    /* ==========================================================
       SHOW EDIT FORM

       Purpose:
       Displays the edit page
       for an existing project.
    ========================================================== */

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }



    /* ==========================================================
       UPDATE PROJECT

       Purpose:
       Saves changes made to
       an existing project.

       NOTE:
       Implementation will be added later.
    ========================================================== */

    public function update(UpdateProjectRequest $request, Project $project)
    {

        /*
|--------------------------------------------------------------------------
| STEP 1
|--------------------------------------------------------------------------
|
| Retrieve all validated data.
|
*/

        $validated = $request->validated();



        /*
|--------------------------------------------------------------------------
| STEP 2
|--------------------------------------------------------------------------
|
| Upload a new project image.
|
| If the project already has an image,
| remove the old image from storage first
| to avoid leaving unused files behind.
|
*/

        if ($request->hasFile('image')) {

            /*
            |--------------------------------------------------------------------------
            | Delete Existing Image
            |--------------------------------------------------------------------------
            */

            if ($project->image && Storage::disk('public')->exists($project->image)) {

                Storage::disk('public')->delete($project->image);

            }

            /*
            |--------------------------------------------------------------------------
            | Store New Image
            |--------------------------------------------------------------------------
            */

            $validated['image'] = $request
                ->file('image')
                ->store('projects', 'public');

        }


        /*
        |--------------------------------------------------------------------------
        | STEP 3
        |--------------------------------------------------------------------------
        |
        | Update the project.
        |
        */

        $project->update($validated);



        /*
        |--------------------------------------------------------------------------
        | STEP 4
        |--------------------------------------------------------------------------
        |
        | Redirect back to the
        | Projects page.
        |
        */

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project updated successfully!');

    }



    /* ==========================================================
       DELETE PROJECT

       Purpose:
       Removes a project from the database.

       Workflow:
       • Delete the project's image (if it exists)
       • Delete the database record
       • Redirect back to the Projects page
    ========================================================== */

    public function destroy(Project $project)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete Project Image
        |--------------------------------------------------------------------------
        |
        | Remove the project's image from storage if it exists.
        |
        */

        if ($project->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Project Record
        |--------------------------------------------------------------------------
        */

        $project->delete();

        /*
        |--------------------------------------------------------------------------
        | Redirect Back
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project deleted successfully!');
    }
}