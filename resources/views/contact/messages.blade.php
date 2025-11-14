@extends('layouts.app')

@section('title', 'Contact Messages - Admin')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="display-5">Contact Messages</h1>
                    <a href="{{ route('contact.index') }}" class="btn btn-outline-primary">
                        ← Back to Contact Form
                    </a>
                </div>

                <!-- Stats -->
                @php
                    $totalMessages = App\Models\ContactMessage::count();
                    $unreadMessages = App\Models\ContactMessage::unread()->count();
                @endphp

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h5>Total Messages</h5>
                                <h2>{{ $totalMessages }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-warning text-dark">
                            <div class="card-body">
                                <h5>Unread Messages</h5>
                                <h2>{{ $unreadMessages }}</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Messages Table -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        @if ($messages->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($messages as $message)
                                            <tr class="{{ $message->is_read ? '' : 'table-warning' }}">
                                                <td>
                                                    @if ($message->is_read)
                                                        <span class="badge bg-success">Read</span>
                                                    @else
                                                        <span class="badge bg-warning">Unread</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <strong>{{ $message->name }}</strong>
                                                </td>
                                                <td>
                                                    <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                                                </td>
                                                <td>{{ Str::limit($message->subject, 30) }}</td>
                                                <td>{{ Str::limit($message->message, 50) }}</td>
                                                <td>
                                                    <small>{{ $message->formatted_date }}</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button type="button" class="btn btn-outline-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#messageModal{{ $message->id }}">
                                                            View
                                                        </button>
                                                        @if (!$message->is_read)
                                                            <form action="{{ route('contact.markAsRead', $message->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                <button type="submit" class="btn btn-outline-success">
                                                                    Mark Read
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>

                                                    <!-- Modal for Message Details -->
                                                    <div class="modal fade" id="messageModal{{ $message->id }}"
                                                        tabindex="-1">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Message from
                                                                        {{ $message->name }}</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row mb-3">
                                                                        <div class="col-md-6">
                                                                            <strong>Name:</strong> {{ $message->name }}
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <strong>Email:</strong>
                                                                            <a
                                                                                href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="col-12">
                                                                            <strong>Subject:</strong>
                                                                            {{ $message->subject }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <strong>Message:</strong>
                                                                            <div class="border p-3 mt-2 rounded bg-light">
                                                                                {{ $message->message }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}"
                                                                        class="btn btn-primary">
                                                                        <i class="fas fa-reply me-1"></i>Reply
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <h3>No messages yet</h3>
                                <p class="text-muted">No one has contacted you yet.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
