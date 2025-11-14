@extends('layouts.app')

@section('title', 'My Projects - Portfolio')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="display-4 text-center mb-5">My Projects</h1>
                <p class="lead text-center mb-5">Berikut adalah beberapa project yang telah saya kerjakan selama 2 tahun
                    terakhir.</p>

                @if ($projects->count() > 0)
                    <div class="row">
                        @foreach ($projects as $project)
                            <div class="col-lg-6 mb-4">
                                <div class="card project-card h-100 shadow-sm">
                                    <img src="{{ $project->image_url }}" class="card-img-top" alt="{{ $project->title }}"
                                        style="height: 200px; object-fit: cover;">

                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">{{ $project->title }}</h5>
                                        <p class="card-text flex-grow-1">{{ Str::limit($project->description, 120) }}</p>

                                        <div class="mb-3">
                                            @foreach (explode(',', $project->technologies) as $tech)
                                                <span class="badge bg-secondary me-1 mb-1">{{ trim($tech) }}</span>
                                            @endforeach
                                        </div>

                                        <div class="mt-auto">
                                            <small class="text-muted">
                                                Completed: {{ $project->completed_date->format('M Y') }}
                                                @if ($project->is_featured)
                                                    <span class="badge bg-warning ms-2">Featured</span>
                                                @endif
                                            </small>

                                            <div class="btn-group w-100 mt-2">
                                                <a href="{{ route('projects.show', $project->slug) }}"
                                                    class="btn btn-outline-primary btn-sm">View Details</a>
                                                @if ($project->project_url && $project->project_url != '#')
                                                    <a href="{{ $project->project_url }}"
                                                        class="btn btn-outline-success btn-sm">Live Demo</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-5">
                        <h3>No projects yet</h3>
                        <p>Projects will be added soon!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        .project-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
        }

        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }
    </style>
@endsection
