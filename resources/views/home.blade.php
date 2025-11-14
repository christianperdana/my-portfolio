@extends('layouts.app')

@section('title', 'Home - Portfolio Saya')

@section('content')
    <!-- Hero Section -->
    <div class="hero-bg text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold">Halo, Saya [Nama Anda]</h1>
                    <p class="lead">Full-Stack Developer dengan passion untuk membuat aplikasi web yang useful dan
                        efficient.</p>
                    <a href="{{ route('projects.index') }}" class="btn btn-light btn-lg me-3">Lihat Project Saya</a>
                    <a href="/kontak" class="btn btn-outline-light btn-lg">Hubungi Saya</a>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center"
                        style="width: 300px; height: 300px;">
                        <span class="text-dark">[Foto Profile]</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Skills Section -->
    <div class="container py-5">
        <h2 class="text-center mb-5">🛠 Tech Stack & Skills</h2>
        <div class="row text-center">
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <i class="fab fa-php fa-3x text-primary mb-3"></i>
                        <h5>Backend</h5>
                        <p>PHP, Laravel, MySQL, REST API</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <i class="fab fa-js-square fa-3x text-warning mb-3"></i>
                        <h5>Frontend</h5>
                        <p>JavaScript, jQuery, Bootstrap</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-database fa-3x text-info mb-3"></i>
                        <h5>Database</h5>
                        <p>MySQL, Database Design</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-tools fa-3x text-success mb-3"></i>
                        <h5>Tools</h5>
                        <p>Git, Composer, VS Code</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Projects Section -->
    @if (isset($featuredProjects) && $featuredProjects->count() > 0)
        <div class="bg-light py-5">
            <div class="container">
                <h2 class="text-center mb-5">⭐ Featured Projects</h2>
                <div class="row">
                    @foreach ($featuredProjects as $project)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100 shadow-sm project-card">
                                <img src="{{ $project->image_url }}" class="card-img-top" alt="{{ $project->title }}"
                                    style="height: 200px; object-fit: cover;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $project->title }}</h5>
                                    <p class="card-text flex-grow-1">{{ Str::limit($project->description, 80) }}</p>

                                    <div class="mb-2">
                                        @foreach (explode(',', $project->technologies) as $tech)
                                            <span class="badge bg-secondary me-1 mb-1">{{ trim($tech) }}</span>
                                        @endforeach
                                    </div>

                                    <div class="mt-auto">
                                        <a href="{{ route('projects.show', $project->slug) }}"
                                            class="btn btn-primary btn-sm w-100">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('projects.index') }}" class="btn btn-outline-primary btn-lg">View All Projects</a>
                </div>
            </div>
        </div>
    @endif

    <style>
        .hero-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .project-card {
            transition: transform 0.3s ease;
        }

        .project-card:hover {
            transform: translateY(-5px);
        }
    </style>
@endsection
