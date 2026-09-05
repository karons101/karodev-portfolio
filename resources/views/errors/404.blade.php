@extends('layouts.portfolio')

@section('title', 'Post not found')

@section('content')

    {{-- ==========================================
    COMPONENT: BLOG 404

    Purpose:
    Provides a clear fallback when a requested
    blog post cannot be found.
    ========================================== --}}

    <section class="blog">

        <div class="container">

            <div class="blog-card">

                <span class="section-tag">
                    404
                </span>

                <h1>
                    Post not found
                </h1>

                <p>
                    The blog post you are looking for could not be found.
                </p>

                {{-- Return to the public blog listing --}}
                <a href="{{ route('blog') }}" class="btn-primary">
                    ← Back to Blog
                </a>

            </div>

        </div>

    </section>

@endsection
