<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExperienceRequest;
use App\Http\Requests\UpdateExperienceRequest;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Display All Experience Records
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $experiences = Experience::query()

            ->when($request->search, function ($query) use ($request) {

                $query->where('company', 'like', "%{$request->search}%")
                    ->orWhere('position', 'like', "%{$request->search}%");

            })

            ->orderBy('sort_order')

            ->latest()

            ->paginate(10)

            ->withQueryString();

        return view('admin.experiences.index', compact('experiences'));
    }

    /*
    |--------------------------------------------------------------------------
    | Show Create Form
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('admin.experiences.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Store Experience
    |--------------------------------------------------------------------------
    */

    public function store(StoreExperienceRequest $request)
    {
        Experience::create($request->validated());

        return redirect()

            ->route('experiences.index')

            ->with('success', 'Experience created successfully.');
    }
    
    /*
    |--------------------------------------------------------------------------
    | View Experience
    |--------------------------------------------------------------------------
    */

    public function show(Experience $experience)
    {
        return view('admin.experiences.show', compact('experience'));
    }

    /*
    |--------------------------------------------------------------------------
    | Show Edit Form
    |--------------------------------------------------------------------------
    */

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    /*
    |--------------------------------------------------------------------------
    | Update Experience
    |--------------------------------------------------------------------------
    */

    public function update(UpdateExperienceRequest $request, Experience $experience)
    {
        $experience->update($request->validated());

        return redirect()

            ->route('experiences.index')

            ->with('success', 'Experience updated successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Experience
    |--------------------------------------------------------------------------
    */

    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()

            ->route('experiences.index')

            ->with('success', 'Experience deleted successfully.');
    }
}