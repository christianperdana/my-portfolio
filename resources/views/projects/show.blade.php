@extends('layouts.app')

@section('title', $project->title . ' - Portfolio')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Projects</a></li>
                        <li class="breadcrumb-item active">{{ $project->title }}</li>
                    </ol>
                </nav>

                <div class="card border-0 shadow-lg">
                    <img src="{{ $project->image_url }}" class="card-img-top" alt="{{ $project->title }}"
                        style="height: 400px; object-fit: cover;">

                    <div class="card-body p-5">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h1 class="card-title display-5">{{ $project->title }}</h1>
                            @if ($project->is_featured)
                                <span class="badge bg-warning fs-6">Featured Project</span>
                            @endif
                        </div>

                        <div class="mb-4">
                            @foreach (explode(',', $project->technologies) as $tech)
                                <span class="badge bg-primary me-1 mb-1 fs-6">{{ trim($tech) }}</span>
                            @endforeach
                        </div>

                        <p class="card-text lead">{{ $project->description }}</p>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <strong>Category:</strong>
                                <span class="badge bg-info text-dark">{{ ucfirst($project->category) }}</span>
                            </div>
                            <div class="col-md-6">
                                <strong>Completed:</strong>
                                {{ $project->completed_date->format('F Y') }}
                            </div>
                        </div>

                        <div class="mt-5">
                            <h5>Project Links</h5>
                            <div class="btn-group">
                                @if ($project->project_url && $project->project_url != '#')
                                    <a href="{{ $project->project_url }}" class="btn btn-success me-2" target="_blank">
                                        🌐 Live Demo
                                    </a>
                                @endif

                                @if ($project->github_url && $project->github_url != '#')
                                    <a href="{{ $project->github_url }}" class="btn btn-dark" target="_blank">
                                        <i class="fab fa-github"></i> Source Code
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('projects.index') }}" class="btn btn-outline-primary">
                        ← Back to All Projects
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
