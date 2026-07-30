@extends('layouts.portfolio')

@section('title', 'Admin Dashboard')

@section('content')

<section class="admin-dashboard">

    <div class="container">

        <span class="section-tag">
            Admin Panel
        </span>

        <h1>Portfolio Dashboard</h1>

        <p class="section-description">
            Welcome to your Portfolio Content Management System.
            From here you'll be able to manage projects, blog posts,
            skills, certifications, experience and contact messages.
        </p>

        <div class="dashboard-grid">

            <a href="#" class="dashboard-card">
                <h3>Projects</h3>
                <p>Manage portfolio projects.</p>
            </a>

            <a href="#" class="dashboard-card">
                <h3>Blog</h3>
                <p>Create and edit blog articles.</p>
            </a>

            <a href="#" class="dashboard-card">
                <h3>Skills</h3>
                <p>Update technical skills.</p>
            </a>

            <a href="#" class="dashboard-card">
                <h3>Experience</h3>
                <p>Manage work experience.</p>
            </a>

            <a href="#" class="dashboard-card">
                <h3>Certifications</h3>
                <p>Manage certifications.</p>
            </a>

            <a href="#" class="dashboard-card">
                <h3>Messages</h3>
                <p>View contact form submissions.</p>
            </a>

        </div>

    </div>

</section>

@endsection