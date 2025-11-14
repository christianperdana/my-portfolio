<?php
// app/Http/Controllers/ContactController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactNotification;

class ContactController extends Controller
{
    // Menampilkan form contact
    public function index()
    {
        return view('contact.index');
    }

    // Menyimpan pesan contact
    public function store(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:100',
            'email' => 'required|email',
            'subject' => 'required|min:5|max:200',
            'message' => 'required|min:10|max:1000'
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.min' => 'Nama minimal 3 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'subject.required' => 'Subject wajib diisi',
            'subject.min' => 'Subject minimal 5 karakter',
            'message.required' => 'Pesan wajib diisi',
            'message.min' => 'Pesan minimal 10 karakter'
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan ke database
        $contactMessage = ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        try {
            Mail::to('your.email@gmail.com')->send(new ContactNotification($contactMessage));
        } catch (\Exception $e) {
            // Log error, but don't show to user
            Log::error('Email failed: ' . $e->getMessage());
        }

        // Redirect dengan success message
        return redirect()->route('contact.index')
            ->with('success', 'Pesan Anda berhasil dikirim! Saya akan membalas secepatnya. 😊');
    }

    // Menampilkan semua messages (untuk admin)
    public function messages()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->get();

        return view('contact.messages', [
            'messages' => $messages
        ]);
    }

    // Mark message as read
    public function markAsRead($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->update(['is_read' => true]);

        return back()->with('success', 'Pesan ditandai sebagai sudah dibaca');
    }
}
