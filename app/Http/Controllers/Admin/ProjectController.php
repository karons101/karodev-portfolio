<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    /* ==========================================================
       DISPLAY ALL PROJECTS

       Purpose:
       Retrieves every project from the database
       and displays them in the Projects page.
    ========================================================== */

    public function index()
    {

        $projects = Project::latest()->get();

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
       Saves a newly created project
       into the database.
    ========================================================== */

    public function store(Request $request)
    {

        //
        // We'll build this together later.
        //

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
    ========================================================== */

    public function update(Request $request, Project $project)
    {

        //
        // We'll build this together later.
        //

    }


    /* ==========================================================
       DELETE PROJECT

       Purpose:
       Removes a project
       from the database.
    ========================================================== */

    public function destroy(Project $project)
    {

        //
        // We'll build this together later.
        //

    }

}