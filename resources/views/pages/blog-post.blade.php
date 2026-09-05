@extends('layouts.portfolio')

@section('title', $post->title)

@section('content')

    {{-- ==========================================
    COMPONENT: BLOG ARTICLE

    Purpose:
    Displays the complete content of a single
    published blog post retrieved from the database.
    ========================================== --}}

    <section class="blog-post">

        <div class="container">

            {{-- Back navigation to the blog listing --}}
            <a href="{{ route('blog') }}" class="btn-primary">
                ← Back to Blog
            </a>

            {{-- Blog post heading and metadata --}}
            <article class="blog-post-content">

                <span class="section-tag">
                    {{ $post->category }}
                </span>

                <h1>
                    {{ $post->title }}
                </h1>

                <p class="section-description">
                    {{ $post->excerpt }}
                </p>

                {{-- Stored content is trusted HTML from the single-author portfolio --}}
                <div class="blog-post-body">
                    {!! $post->content !!}
                </div>

            </article>

        </div>

    </section>

@endsection
