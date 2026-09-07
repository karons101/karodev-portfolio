@extends('layouts.portfolio')

@section('title', $post->meta_title ?: $post->title)

@section('content')

{{-- ==========================================================
     COMPONENT: BLOG ARTICLE

     Purpose:
     Displays a single published blog article retrieved from
     the BlogPost model.

     Responsibilities:
     • Display the article title and category.
     • Display the published date when available.
     • Render the article's stored HTML content.
     • Provide a navigation link back to the Blog listing.

     Data Source:
     $post — The published BlogPost record resolved by its slug.

     Content Format:
     The BlogPost content is stored as trusted HTML and is
     intentionally rendered without escaping for the single-author
     portfolio workflow.
========================================================== --}}

<section class="blog-post">

    <div class="container">

        @if ($post->category)

            <span class="section-tag">
                {{ $post->category }}
            </span>

        @endif

        <h1>
            {{ $post->title }}
        </h1>

        @if ($post->published_at)

            <p class="blog-post-date">
                {{ $post->published_at->format('F j, Y') }}
            </p>

        @endif

        @if ($post->excerpt)

            <p class="blog-post-excerpt">
                {{ $post->excerpt }}
            </p>

        @endif

        <div class="blog-post-content">

            {!! $post->content !!}

        </div>

        <a href="{{ route('blog') }}" class="btn-secondary">
            Back to Blog
        </a>

    </div>

</section>

@endsection