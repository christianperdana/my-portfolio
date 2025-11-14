<?php
// app/Http/Controllers/ProjectController.php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Menampilkan semua projects
    public function index()
    {
        $projects = Project::orderBy('completed_date', 'desc')->get();

        return view('projects.index', [
            'projects' => $projects
        ]);
    }

    // Menampilkan detail project
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        return view('projects.show', [
            'project' => $project
        ]);
    }

    // Menampilkan featured projects (untuk home page)
    public function featured()
    {
        $featuredProjects = Project::where('is_featured', true)
            ->orderBy('completed_date', 'desc')
            ->take(3)
            ->get();

        return $featuredProjects;
    }
}
