<?php

/* ==========================================================
CONTROLLER: BLOG POST CONTROLLER

File:
app/Http/Controllers/Admin/BlogPostController.php

Purpose:
Handles all CRUD operations for Blog Posts
inside the KaroDev Admin CMS.

Responsibilities:
• Display all blog posts
• Create new blog posts
• Store blog posts
• Display single blog posts
• Edit blog posts
• Update blog posts
• Delete blog posts

Additional Features:
• Featured image upload
• Featured image replacement
• Featured image deletion
• Search
• Pagination
• Flash messages

========================================================== */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;

use App\Models\BlogPost;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{

    /* ==========================================================
       DISPLAY ALL BLOG POSTS

       Purpose:
       Displays every blog article stored in
       the database.

       Features:
       • Search
       • Pagination
       • Latest articles first
    ========================================================== */

    public function index(Request $request)
    {

        /*
        |--------------------------------------------------------------------------
        | Search Keyword
        |--------------------------------------------------------------------------
        */

        $search = $request->search;

        /*
        |--------------------------------------------------------------------------
        | Retrieve Blog Posts
        |--------------------------------------------------------------------------
        */

        $blogPosts = BlogPost::query()

            ->when($search, function ($query) use ($search) {

                $query->where('title', 'like', "%{$search}%")

                    ->orWhere('category', 'like', "%{$search}%")

                    ->orWhere('tags', 'like', "%{$search}%");

            })

            ->latest()

            ->paginate(10)

            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | Return View
        |--------------------------------------------------------------------------
        */

        return view('admin.blog.index', compact(

            'blogPosts'

        ));

    }

    /* ==========================================================
       SHOW CREATE PAGE

       Purpose:
       Displays the Create Blog Post page.
    ========================================================== */

    public function create()
    {

        return view('admin.blog.create');

    }
    /* ==========================================================
       STORE NEW BLOG POST

       Purpose:
       Validates incoming data,
       uploads the featured image,
       creates a new blog post,
       and redirects back to the
       Blog Management page.
    ========================================================== */

    public function store(StoreBlogPostRequest $request)
    {

        /*
        |--------------------------------------------------------------------------
        | STEP 1
        |--------------------------------------------------------------------------
        | Retrieve validated data.
        */

        $validated = $request->validated();

        /*
        |--------------------------------------------------------------------------
        | STEP 2
        |--------------------------------------------------------------------------
        | Upload featured image.
        */

        if ($request->hasFile('featured_image')) {

            $validated['featured_image'] = $request
                ->file('featured_image')
                ->store('blog', 'public');

        }

        /*
        |--------------------------------------------------------------------------
        | STEP 3
        |--------------------------------------------------------------------------
        | Create blog post.
        */

        BlogPost::create($validated);

        /*
        |--------------------------------------------------------------------------
        | STEP 4
        |--------------------------------------------------------------------------
        | Redirect.
        */

        return redirect()

            ->route('blog-posts.index')

            ->with('success', 'Blog post created successfully!');

    }

    /* ==========================================================
       DISPLAY SINGLE BLOG POST

       Purpose:
       Displays one complete blog article.
    ========================================================== */

    public function show(BlogPost $blogPost)
    {

        return view(

            'admin.blog.show',

            compact('blogPost')

        );

    }

    /* ==========================================================
       SHOW EDIT PAGE

       Purpose:
       Displays the Edit Blog Post page.
    ========================================================== */

    public function edit(BlogPost $blogPost)
    {

        return view(

            'admin.blog.edit',

            compact('blogPost')

        );

    }

    /* ==========================================================
   UPDATE BLOG POST

   Purpose:
   Updates an existing blog article.

   Workflow:
   • Validate incoming data
   • Replace featured image (if supplied)
   • Delete old image
   • Update database
   • Redirect with success message

========================================================== */

    public function update(UpdateBlogPostRequest $request, BlogPost $blogPost)
    {

        /*
        |--------------------------------------------------------------------------
        | STEP 1
        |--------------------------------------------------------------------------
        | Retrieve validated data.
        |
        */

        $validated = $request->validated();



        /*
        |--------------------------------------------------------------------------
        | STEP 2
        |--------------------------------------------------------------------------
        | Upload a new featured image.
        |
        | If the blog post already has an image,
        | remove the old image from storage first.
        |
        */

        if ($request->hasFile('featured_image')) {

            /*
            |--------------------------------------------------------------------------
            | Delete Existing Image
            |--------------------------------------------------------------------------
            */

            if (

                $blogPost->featured_image &&

                Storage::disk('public')->exists($blogPost->featured_image)

            ) {

                Storage::disk('public')->delete(

                    $blogPost->featured_image

                );

            }

            /*
            |--------------------------------------------------------------------------
            | Store New Image
            |--------------------------------------------------------------------------
            */

            $validated['featured_image'] =

                $request

                    ->file('featured_image')

                    ->store('blog', 'public');

        }



        /*
        |--------------------------------------------------------------------------
        | STEP 3
        |--------------------------------------------------------------------------
        | Update Blog Post
        |
        */

        $blogPost->update($validated);



        /*
        |--------------------------------------------------------------------------
        | STEP 4
        |--------------------------------------------------------------------------
        | Redirect
        |
        */

        return redirect()

            ->route('blog-posts.index')

            ->with(

                'success',

                'Blog post updated successfully!'

            );

    }



    /* ==========================================================
       DELETE BLOG POST

       Purpose:
       Removes a blog article from the database.

       Workflow:
       • Delete featured image
       • Delete database record
       • Redirect with success message

    ========================================================== */

    public function destroy(BlogPost $blogPost)
    {

        /*
        |--------------------------------------------------------------------------
        | Delete Featured Image
        |--------------------------------------------------------------------------
        */

        if (

            $blogPost->featured_image &&

            Storage::disk('public')->exists($blogPost->featured_image)

        ) {

            Storage::disk('public')->delete(

                $blogPost->featured_image

            );

        }



        /*
        |--------------------------------------------------------------------------
        | Delete Blog Post
        |--------------------------------------------------------------------------
        */

        $blogPost->delete();



        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()

            ->route('blog-posts.index')

            ->with(

                'success',

                'Blog post deleted successfully!'

            );

    }

}