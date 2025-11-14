@extends('layouts.app')

@section('title', 'Tentang Saya')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-4">Tentang Saya</h1>
                <p class="lead">Halo! Saya seorang developer dengan pengalaman 2 tahun dalam pengembangan web menggunakan
                    PHP native, Bootstrap, dan JavaScript.</p>

                <div class="card mt-4">
                    <div class="card-body">
                        <h5>🛠 Tech Stack</h5>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">PHP</span>
                            <span class="badge bg-success me-2">Laravel</span>
                            <span class="badge bg-info me-2">MySQL</span>
                            <span class="badge bg-warning me-2">JavaScript</span>
                            <span class="badge bg-danger me-2">Bootstrap</span>
                            <span class="badge bg-dark me-2">Git</span>
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <h5>🎯 Sedang Dipelajari</h5>
                        <ul>
                            <li>Laravel Framework</li>
                            <li>Modern PHP Development</li>
                            <li>API Development</li>
                            <li>Deployment & DevOps</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
