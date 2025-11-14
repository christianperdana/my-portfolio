<?php
// database/seeders/ProjectSeeder.php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Sistem Inventory Toko',
                'slug' => Str::slug('Sistem Inventory Toko'),
                'description' => 'Aplikasi web untuk management stok barang, laporan penjualan, dan supplier management. Dilengkapi dengan fitur multi-user dan reporting.',
                'image_url' => 'https://images.unsplash.com/photo-1556655848-f3a704976850?w=500&h=300&fit=crop',
                'project_url' => '#',
                'github_url' => '#',
                'technologies' => 'Laravel,Bootstrap,MySQL,JavaScript',
                'category' => 'web',
                'is_featured' => true,
                'completed_date' => '2024-01-15',
            ],
            [
                'title' => 'Aplikasi Kasir Restoran',
                'slug' => Str::slug('Aplikasi Kasir Restoran'),
                'description' => 'Point of Sale system untuk restoran dengan fitur order management, kitchen display, dan laporan penjualan harian.',
                'image_url' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=500&h=300&fit=crop',
                'project_url' => '#',
                'github_url' => '#',
                'technologies' => 'PHP Native,Bootstrap,MySQL,jQuery',
                'category' => 'web',
                'is_featured' => true,
                'completed_date' => '2023-11-20',
            ],
            [
                'title' => 'Company Profile Website',
                'slug' => Str::slug('Company Profile Website'),
                'description' => 'Website company profile dengan admin panel untuk update content, gallery, dan blog section.',
                'image_url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=500&h=300&fit=crop',
                'project_url' => '#',
                'github_url' => '#',
                'technologies' => 'HTML,CSS,JavaScript,PHP',
                'category' => 'web',
                'is_featured' => false,
                'completed_date' => '2023-09-10',
            ],
            [
                'title' => 'Task Management App',
                'slug' => Str::slug('Task Management App'),
                'description' => 'Aplikasi manajemen tugas dengan drag-drop interface, deadline tracking, dan collaboration team.',
                'image_url' => 'https://images.unsplash.com/photo-1611224923853-80b023f02d71?w=500&h=300&fit=crop',
                'project_url' => '#',
                'github_url' => '#',
                'technologies' => 'Laravel,Vue.js,MySQL,Tailwind',
                'category' => 'web',
                'is_featured' => true,
                'completed_date' => '2024-02-01',
            ]
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
