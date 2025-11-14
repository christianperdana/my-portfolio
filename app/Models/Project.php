<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    // Field yang boleh diisi (mass assignment)
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image_url',
        'project_url',
        'github_url',
        'technologies',
        'category',
        'is_featured',
        'completed_date'
    ];

    // Cast technologies ke array
    protected $casts = [
        'technologies' => 'array',
        'is_featured' => 'boolean',
        'completed_date' => 'date'
    ];

    // Function untuk format technologies
    public function getTechArrayAttribute()
    {
        if (is_array($this->technologies)) {
            return $this->technologies;
        }

        // Jika disimpan sebagai string, convert ke array
        return explode(',', $this->technologies);
    }
}
