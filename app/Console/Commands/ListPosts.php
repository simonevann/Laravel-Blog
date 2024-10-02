<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Posts;

class ListPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:list-posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all posts';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->table(
            ['ID','Title', 'Slug', 'Creato', 'Status'],
            Posts::all(['id','title', 'slug', 'created_at', 'status'])->toArray()
        );
    }
}
