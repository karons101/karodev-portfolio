<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DISPLAY CERTIFICATIONS
    |--------------------------------------------------------------------------
    |
    | Shows all certifications in the KaroDev Certification CMS.
    |
    | Supports:
    |
    | • Search by certification name
    | • Search by issuing organization
    | • Pagination
    | • Preserving search parameters during pagination
    |
    */

    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | START QUERY
        |--------------------------------------------------------------------------
        */

        $query = Certification::query();


        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        |
        | Allows the administrator to search certifications by:
        |
        | • Certification name
        | • Issuing organization
        |
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where(
                    'name',
                    'like',
                    '%' . $search . '%'
                )

                    ->orWhere(
                        'issuing_organization',
                        'like',
                        '%' . $search . '%'
                    );

            });
        }


        /*
        |--------------------------------------------------------------------------
        | GET CERTIFICATIONS
        |--------------------------------------------------------------------------
        |
        | sort_order determines the primary display order.
        |
        | issue_date is used as a secondary ordering mechanism.
        |
        */

        $certifications = $query
            ->orderBy('sort_order')
            ->orderByDesc('issue_date')
            ->paginate(10)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | RETURN INDEX VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.certifications.index',
            compact('certifications')
        );
    }



    /*
    |--------------------------------------------------------------------------
    | SHOW CREATE FORM
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view(
            'admin.certifications.create'
        );
    }



    /*
    |--------------------------------------------------------------------------
    | STORE CERTIFICATION
    |--------------------------------------------------------------------------
    |
    | Validates and creates a new certification.
    |
    */

    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            /*
            |--------------------------------------------------------------------------
            | CERTIFICATION NAME
            |--------------------------------------------------------------------------
            */

            'name' => [
                'required',
                'string',
                'max:255',
            ],


            /*
            |--------------------------------------------------------------------------
            | ISSUING ORGANIZATION
            |--------------------------------------------------------------------------
            */

            'issuing_organization' => [
                'required',
                'string',
                'max:255',
            ],


            /*
            |--------------------------------------------------------------------------
            | ISSUE DATE
            |--------------------------------------------------------------------------
            */

            'issue_date' => [
                'required',
                'date',
            ],


            /*
            |--------------------------------------------------------------------------
            | EXPIRATION DATE
            |--------------------------------------------------------------------------
            |
            | Optional because many certifications do not expire.
            |
            */

            'expiration_date' => [
                'nullable',
                'date',
                'after_or_equal:issue_date',
            ],


            /*
            |--------------------------------------------------------------------------
            | CREDENTIAL ID
            |--------------------------------------------------------------------------
            */

            'credential_id' => [
                'nullable',
                'string',
                'max:255',
            ],


            /*
            |--------------------------------------------------------------------------
            | CREDENTIAL / VERIFICATION URL
            |--------------------------------------------------------------------------
            */

            'credential_url' => [
                'nullable',
                'url',
                'max:2048',
            ],


        /*
        |------------------------------------------------------------------------
        | CERTIFICATE FILE
        |--------------------------------------------------------------------------
        |
        | Supported:
        |
        | • PDF
        | • JPEG
        | • JPG
        | • PNG
        | • WebP
        |
        | Maximum size:
        |
        | 5 MB
        |
        */

            'certificate_file' => [
                'nullable',
                'file',
                'mimes:pdf,jpeg,jpg,png,webp',
                'max:5120',
            ],


            /*
            |--------------------------------------------------------------------------
            | FEATURED
            |--------------------------------------------------------------------------
            */

            'featured' => [
                'nullable',
                'boolean',
            ],


            /*
            |--------------------------------------------------------------------------
            | SORT ORDER
            |--------------------------------------------------------------------------
            */

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | HANDLE FEATURED VALUE
        |--------------------------------------------------------------------------
        |
        | HTML checkboxes are only submitted when checked.
        |
        | Therefore:
        |
        | checked   = 1
        | unchecked = absent
        |
        | We explicitly store false when unchecked.
        |
        */

        $validated['featured'] =
            $request->boolean('featured');


        /*
        |--------------------------------------------------------------------------
        | DEFAULT SORT ORDER
        |--------------------------------------------------------------------------
        |
        | If the administrator leaves the field empty,
        | the database default of 0 will be used.
        |
        */

        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;


        /*
        |--------------------------------------------------------------------------
        | HANDLE CERTIFICATE FILE
        |--------------------------------------------------------------------------
        |
        | Stores the uploaded certificate file inside:
        |
        | storage/app/public/certificates
        |
        | Laravel returns the relative storage path.
        |
        */

        if ($request->hasFile('certificate_file')) {

            $validated['certificate_file'] = $request
                ->file('certificate_file')
                ->store(
                    'certificates',
                    'public'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | CREATE DATABASE RECORD
        |--------------------------------------------------------------------------
        */

        Certification::create($validated);


        /*
        |--------------------------------------------------------------------------
        | REDIRECT AFTER SUCCESS
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('certifications.index')
            ->with(
                'success',
                'Certification created successfully.'
            );
    }



    /*
    |--------------------------------------------------------------------------
    | DISPLAY CERTIFICATION
    |--------------------------------------------------------------------------
    */

    public function show(Certification $certification)
    {
        return view(
            'admin.certifications.show',
            compact('certification')
        );
    }



    /*
    |--------------------------------------------------------------------------
    | SHOW EDIT FORM
    |--------------------------------------------------------------------------
    */

    public function edit(Certification $certification)
    {
        return view(
            'admin.certifications.edit',
            compact('certification')
        );
    }



    /*
    |--------------------------------------------------------------------------
    | UPDATE CERTIFICATION
    |--------------------------------------------------------------------------
    |
    | Updates an existing certification.
    |
    */

    public function update(
        Request $request,
        Certification $certification
    ) {

        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'issuing_organization' => [
                'required',
                'string',
                'max:255',
            ],

            'issue_date' => [
                'required',
                'date',
            ],

            'expiration_date' => [
                'nullable',
                'date',
                'after_or_equal:issue_date',
            ],

            'credential_id' => [
                'nullable',
                'string',
                'max:255',
            ],

            'credential_url' => [
                'nullable',
                'url',
                'max:2048',
            ],

            'certificate_file' => [
                'nullable',
                'file',
                'mimes:pdf,jpeg,jpg,png,webp',
                'max:5120',
            ],

            'featured' => [
                'nullable',
                'boolean',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | HANDLE FEATURED VALUE
        |--------------------------------------------------------------------------
        */

        $validated['featured'] =
            $request->boolean('featured');


        /*
        |--------------------------------------------------------------------------
        | DEFAULT SORT ORDER
        |--------------------------------------------------------------------------
        */

        $validated['sort_order'] =
            $validated['sort_order'] ?? 0;


        /*
        |--------------------------------------------------------------------------
        | HANDLE NEW CERTIFICATE FILE
        |--------------------------------------------------------------------------
        |
        | If a new certificate file is uploaded:
        |
        | 1. Delete the previous file.
        | 2. Store the new file.
        |
        */

        if ($request->hasFile('certificate_file')) {

            /*
            |--------------------------------------------------------------------------
            | Delete Previous Certificate File
            |--------------------------------------------------------------------------
            */

            if (
                $certification->certificate_file &&
                Storage::disk('public')->exists(
                    $certification->certificate_file
                )
            ) {

                Storage::disk('public')->delete(
                    $certification->certificate_file
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Store New Certificate File
            |--------------------------------------------------------------------------
            */

            $validated['certificate_file'] = $request
                ->file('certificate_file')
                ->store(
                    'certificates',
                    'public'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE DATABASE RECORD
        |--------------------------------------------------------------------------
        */

        $certification->update($validated);


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'certifications.show',
                $certification
            )
            ->with(
                'success',
                'Certification updated successfully.'
            );
    }



    /*
    |--------------------------------------------------------------------------
    | DELETE CERTIFICATION
    |--------------------------------------------------------------------------
    |
    | Deletes the database record and its associated certificate file.
    |
    */

    public function destroy(
        Certification $certification
    ) {

        /*
        |--------------------------------------------------------------------------
        | DELETE CERTIFICATE FILE
        |--------------------------------------------------------------------------
        */

        if (
            $certification->certificate_file &&
            Storage::disk('public')->exists(
                $certification->certificate_file
            )
        ) {

            Storage::disk('public')->delete(
                $certification->certificate_file
            );
        }


        /*
        |--------------------------------------------------------------------------
        | DELETE DATABASE RECORD
        |--------------------------------------------------------------------------
        */

        $certification->delete();


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('certifications.index')
            ->with(
                'success',
                'Certification deleted successfully.'
            );
    }
}