<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Display All Skills
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $skills = Skill::query()

            ->when($request->search, function ($query) use ($request) {

                $query->where('name', 'like', "%{$request->search}%")
                    ->orWhere('category', 'like', "%{$request->search}%");

            })

            ->orderBy('sort_order')
            ->latest()

            ->paginate(10)

            ->withQueryString();

        return view('admin.skills.index', compact('skills'));
    }

    /*
    |--------------------------------------------------------------------------
    | Show Create Form
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('admin.skills.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Store Skill
    |--------------------------------------------------------------------------
    */

    public function store(StoreSkillRequest $request)
    {
        $validated = $request->validated();

        $validated['featured'] = $request->boolean('featured');

        Skill::create($validated);

        return redirect()
            ->route('skills.index')
            ->with('success', 'Skill created successfully.');
    }
    /*
|--------------------------------------------------------------------------
| View Skill
|--------------------------------------------------------------------------
*/

    public function show(Skill $skill)
    {
        return view('admin.skills.show', compact('skill'));
    }

    /*
    |--------------------------------------------------------------------------
    | Show Edit Form
    |--------------------------------------------------------------------------
    */

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    /*
    |--------------------------------------------------------------------------
    | Update Skill
    |--------------------------------------------------------------------------
    */

    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        $validated = $request->validated();

        $validated['featured'] = $request->boolean('featured');

        $skill->update($validated);

        return redirect()
            ->route('skills.index')
            ->with('success', 'Skill updated successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Skill
    |--------------------------------------------------------------------------
    */

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()

            ->route('skills.index')

            ->with('success', 'Skill deleted successfully.');
    }
}