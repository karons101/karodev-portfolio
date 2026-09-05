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

            {{-- ==========================================
            BLOG POSTS

            Renders published blog posts from the
            database. Each post links to its own
            article page using its unique slug.
            ========================================== --}}

            <div class="blog-grid">

                @forelse ($posts as $post)

                    {{-- Individual blog post card --}}
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

                    {{-- Fallback shown when no published posts exist --}}
                    <p>
                        No posts yet — check back soon.
                    </p>

                @endforelse

            </div>

        </div>

    </section>

@endsection