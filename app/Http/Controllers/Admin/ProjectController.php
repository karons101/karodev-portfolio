<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * ==========================================================
     * PROJECT CMS CONTROLLER
     * ==========================================================
     *
     * File:
     * app/Http/Controllers/Admin/ProjectController.php
     *
     * Purpose:
     * Handles all administrative operations for portfolio projects.
     *
     * Responsibilities:
     * - List projects
     * - Search projects
     * - Create projects
     * - Validate project data
     * - Upload project images
     * - Display project details
     * - Edit projects
     * - Replace project images
     * - Manage Featured status
     * - Manage Published / Draft status
     * - Manage project sort order
     * - Delete projects
     *
     * Database table:
     * projects
     *
     * Model:
     * App\Models\Project
     *
     * Storage disk:
     * public
     *
     * Image directory:
     * storage/app/public/projects
     *
     * ==========================================================
     */


    /**
     * ==========================================================
     * DISPLAY PROJECT MANAGEMENT PAGE
     * ==========================================================
     *
     * Loads all portfolio projects for the administrator.
     *
     * Features:
     * - Search by title
     * - Search by technology
     * - Search by category
     * - Sort by sort_order
     * - Use project ID as secondary ordering
     * - Paginate results
     * - Preserve search parameters during pagination
     *
     * Route:
     * GET /admin/projects
     *
     * Route name:
     * projects.index
     *
     * View:
     * resources/views/admin/projects/index.blade.php
     *
     * ==========================================================
     */
    public function index(Request $request)
    {
        /*
        |----------------------------------------------------------
        | START PROJECT QUERY
        |----------------------------------------------------------
        |
        | Begin with all projects stored in the database.
        |
        */

        $query = Project::query();


        /*
        |----------------------------------------------------------
        | PROJECT SEARCH
        |----------------------------------------------------------
        |
        | The administrator can search projects by:
        |
        | - Project title
        | - Technology
        | - Category
        |
        */

        if ($request->filled('search')) {

            $search = trim($request->input('search'));

            $query->where(function ($q) use ($search) {

                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('technology', 'like', '%' . $search . '%')
                    ->orWhere('category', 'like', '%' . $search . '%');
            });
        }


        /*
        |----------------------------------------------------------
        | PROJECT ORDERING
        |----------------------------------------------------------
        |
        | Projects with a lower sort_order appear first.
        |
        | The project ID is used as a secondary ordering rule
        | so projects with the same sort order remain predictable.
        |
        */

        $projects = $query
            ->orderBy('sort_order', 'asc')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();


        /*
        |----------------------------------------------------------
        | RETURN PROJECT CMS INDEX VIEW
        |----------------------------------------------------------
        */

        return view('admin.projects.index', compact('projects'));
    }


    /**
     * ==========================================================
     * SHOW CREATE PROJECT FORM
     * ==========================================================
     *
     * Displays the form used by administrators to create a
     * new KaroDev portfolio project.
     *
     * Route:
     * GET /admin/projects/create
     *
     * Route name:
     * projects.create
     *
     * View:
     * resources/views/admin/projects/create.blade.php
     *
     * ==========================================================
     */
    public function create()
    {
        return view('admin.projects.create');
    }


    /**
     * ==========================================================
     * STORE NEW PROJECT
     * ==========================================================
     *
     * Creates a new portfolio project.
     *
     * Responsibilities:
     * - Validate project information
     * - Validate optional URLs
     * - Validate project image
     * - Upload project image
     * - Set Featured status
     * - Set Published status
     * - Assign automatic sort order when necessary
     * - Create the database record
     *
     * Route:
     * POST /admin/projects
     *
     * Route name:
     * projects.store
     *
     * ==========================================================
     */
    public function store(Request $request)
    {
        /*
        |----------------------------------------------------------
        | VALIDATE PROJECT DATA
        |----------------------------------------------------------
        */

        $validated = $request->validate([

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:projects,slug',
            ],

            'technology' => [
                'required',
                'string',
                'max:255',
            ],

            'category' => [
                'required',
                'string',
                'max:255',
            ],

            'github_url' => [
                'nullable',
                'url',
                'max:255',
            ],

            'live_demo_url' => [
                'nullable',
                'url',
                'max:255',
            ],

            'short_description' => [
                'required',
                'string',
            ],

            'description' => [
                'required',
                'string',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ]);

                /*
        |----------------------------------------------------------
        | HANDLE PROJECT IMAGE
        |----------------------------------------------------------
        |
        | Uploaded images are stored on Laravel's public disk.
        |
        | Physical location:
        | storage/app/public/projects
        |
        | Public URL:
        | /storage/projects/filename
        |
        */

        if ($request->hasFile('image')) {

            $validated['image'] = $request
                ->file('image')
                ->store('projects', 'public');
        }


        /*
        |----------------------------------------------------------
        | HANDLE FEATURED STATUS
        |----------------------------------------------------------
        |
        | HTML checkboxes are only submitted when checked.
        |
        | Request::boolean() safely converts the submitted value
        | into true or false.
        |
        */

        $validated['featured'] = $request->boolean('featured');


        /*
        |----------------------------------------------------------
        | HANDLE PUBLISHED STATUS
        |----------------------------------------------------------
        |
        | Published = true  → Project is published.
        | Published = false → Project remains a draft.
        |
        */

        $validated['published'] = $request->boolean('published');


        /*
        |----------------------------------------------------------
        | AUTOMATIC SORT ORDER
        |----------------------------------------------------------
        |
        | If the administrator does not provide a sort order,
        | automatically place the new project after the existing
        | projects.
        |
        | Example:
        |
        | Existing highest order = 5
        | New project order      = 6
        |
        */

        if (!isset($validated['sort_order'])) {

            $validated['sort_order'] =
                (Project::max('sort_order') ?? 0) + 1;
        }


        /*
        |----------------------------------------------------------
        | CREATE PROJECT
        |----------------------------------------------------------
        |
        | Project::$fillable allows these validated fields to be
        | mass assigned safely.
        |
        */

        Project::create($validated);


        /*
        |----------------------------------------------------------
        | REDIRECT TO PROJECT MANAGEMENT
        |----------------------------------------------------------
        */

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project created successfully.');
    }


    /**
     * ==========================================================
     * DISPLAY SINGLE PROJECT
     * ==========================================================
     *
     * Displays one project inside the administrative CMS.
     *
     * Route:
     * GET /admin/projects/{project}
     *
     * Route name:
     * projects.show
     *
     * View:
     * resources/views/admin/projects/show.blade.php
     *
     * Laravel automatically resolves the Project model through
     * route model binding.
     *
     * ==========================================================
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }


    /**
     * ==========================================================
     * SHOW EDIT PROJECT FORM
     * ==========================================================
     *
     * Displays the form used to edit an existing project.
     *
     * Route:
     * GET /admin/projects/{project}/edit
     *
     * Route name:
     * projects.edit
     *
     * View:
     * resources/views/admin/projects/edit.blade.php
     *
     * ==========================================================
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }


    /**
     * ==========================================================
     * UPDATE EXISTING PROJECT
     * ==========================================================
     *
     * Updates an existing portfolio project.
     *
     * Responsibilities:
     * - Validate updated project information
     * - Validate unique slug
     * - Preserve existing image when no new image is uploaded
     * - Safely replace existing image
     * - Update Featured status
     * - Update Published status
     * - Update sort order
     * - Save the updated project
     *
     * Route:
     * PUT/PATCH /admin/projects/{project}
     *
     * Route name:
     * projects.update
     *
     * ==========================================================
     */
    public function update(Request $request, Project $project)
    {
        /*
        |----------------------------------------------------------
        | VALIDATE PROJECT DATA
        |----------------------------------------------------------
        */

        $validated = $request->validate([

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:projects,slug,' . $project->id,
            ],

            'technology' => [
                'required',
                'string',
                'max:255',
            ],

            'category' => [
                'required',
                'string',
                'max:255',
            ],

            'github_url' => [
                'nullable',
                'url',
                'max:255',
            ],

            'live_demo_url' => [
                'nullable',
                'url',
                'max:255',
            ],

            'short_description' => [
                'required',
                'string',
            ],

            'description' => [
                'required',
                'string',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ]);


        /*
        |----------------------------------------------------------
        | REMEMBER EXISTING IMAGE
        |----------------------------------------------------------
        |
        | We keep the old image path temporarily.
        |
        | This allows us to safely delete the old physical file
        | only after the project has been successfully updated.
        |
        */

        $oldImage = $project->image;


        /*
        |----------------------------------------------------------
        | HANDLE NEW IMAGE
        |----------------------------------------------------------
        |
        | Store the replacement image first.
        |
        | This is safer than deleting the existing image before
        | the new image has been successfully stored.
        |
        */

        if ($request->hasFile('image')) {

            $validated['image'] = $request
                ->file('image')
                ->store('projects', 'public');
        }

        
        /*
        |----------------------------------------------------------
        | HANDLE FEATURED STATUS
        |----------------------------------------------------------
        */

        $validated['featured'] = $request->boolean('featured');


        /*
        |----------------------------------------------------------
        | HANDLE PUBLISHED STATUS
        |----------------------------------------------------------
        */

        $validated['published'] = $request->boolean('published');


        /*
        |----------------------------------------------------------
        | PRESERVE EXISTING SORT ORDER
        |----------------------------------------------------------
        |
        | If the edit form does not submit sort_order,
        | Laravel will leave the existing database value unchanged.
        |
        | We therefore do not need to invent a new sort order here.
        |
        */

        if (!array_key_exists('sort_order', $validated)) {

            unset($validated['sort_order']);
        }


        /*
        |----------------------------------------------------------
        | UPDATE PROJECT RECORD
        |----------------------------------------------------------
        */

        $project->update($validated);


        /*
        |----------------------------------------------------------
        | DELETE OLD IMAGE AFTER SUCCESSFUL UPDATE
        |----------------------------------------------------------
        |
        | Only remove the previous image if:
        |
        | 1. A new image was uploaded.
        | 2. The old image actually existed.
        | 3. The old and new paths are different.
        |
        */

        if (
            $request->hasFile('image')
            && $oldImage
            && $oldImage !== $project->image
        ) {

            Storage::disk('public')->delete($oldImage);
        }


        /*
        |----------------------------------------------------------
        | REDIRECT TO PROJECT MANAGEMENT
        |----------------------------------------------------------
        */

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project updated successfully.');
    }


    /**
     * ==========================================================
     * DELETE PROJECT
     * ==========================================================
     *
     * Permanently removes a project.
     *
     * Responsibilities:
     * - Delete the stored project image
     * - Delete the database record
     * - Return administrator to Project CMS
     *
     * Route:
     * DELETE /admin/projects/{project}
     *
     * Route name:
     * projects.destroy
     *
     * ==========================================================
     */
    public function destroy(Project $project)
    {
        /*
        |----------------------------------------------------------
        | DELETE PROJECT IMAGE
        |----------------------------------------------------------
        |
        | Remove the physical image from the public storage disk
        | before deleting the database record.
        |
        */

        if ($project->image) {

            Storage::disk('public')->delete($project->image);
        }


        /*
        |----------------------------------------------------------
        | DELETE PROJECT DATABASE RECORD
        |----------------------------------------------------------
        */

        $project->delete();


        /*
        |----------------------------------------------------------
        | REDIRECT TO PROJECT MANAGEMENT
        |----------------------------------------------------------
        */

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}

/*
|--------------------------------------------------------------------------
| CONTROLLER END
|--------------------------------------------------------------------------
|
| ProjectController now provides the complete CRUD workflow:
|
| INDEX
|   GET /admin/projects
|   projects.index
|
| CREATE
|   GET /admin/projects/create
|   projects.create
|
| STORE
|   POST /admin/projects
|   projects.store
|
| SHOW
|   GET /admin/projects/{project}
|   projects.show
|
| EDIT
|   GET /admin/projects/{project}/edit
|   projects.edit
|
| UPDATE
|   PUT/PATCH /admin/projects/{project}
|   projects.update
|
| DESTROY
|   DELETE /admin/projects/{project}
|   projects.destroy
|
| Supported project fields:
|
| • title
| • slug
| • technology
| • category
| • github_url
| • live_demo_url
| • short_description
| • description
| • image
| • featured
| • published
| • sort_order
|
|--------------------------------------------------------------------------
*/