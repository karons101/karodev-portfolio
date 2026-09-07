@extends('layouts.portfolio')

@section('title', 'Blog')

@section('content')

{{-- ==========================================
     COMPONENT: BLOG SECTION

     Purpose:
     Displays technical articles, software
     engineering insights and project
     case studies.
========================================== --}}

<section class="blog">

    <div class="container">

        <span class="section-tag">
            Technical Blog
        </span>

        <h2>Sharing Knowledge Through Software Engineering</h2>

        <p class="section-description">
            I enjoy documenting my development journey, sharing technical
            knowledge and explaining how modern software solutions are
            designed, built and maintained.
        </p>

        <div class="blog-grid">

            {{-- ==========================================================
                 COMPONENT: DYNAMIC BLOG ARTICLE LIST

                 Purpose:
                 Renders published blog articles retrieved from the
                 BlogPost model and supplied by the public /blog route.

                 Responsibilities:
                 • Display article titles and excerpts from database data.
                 • Render one card for each published BlogPost record.
                 • Avoid hardcoded article content in the public view.
                 • Provide a clear fallback when no published articles exist.

                 Data Source:
                 $posts — Collection of published BlogPost records.

                 Article navigation is handled by the public
                 /blog/{slug} route.
            ========================================================== --}}

            @forelse ($posts as $post)

                <article class="blog-card">

                    <h3>
                        {{ $post->title }}
                    </h3>

                    <p>
                        {{ $post->excerpt }}
                    </p>

                    <a href="{{ route('blog.post', $post->slug) }}" class="btn-primary">
                        Read Article
                    </a>

                </article>

            @empty

                <p class="blog-empty">
                    No blog articles are currently available.
                </p>

            @endforelse
    </div>

</section>

@endsection