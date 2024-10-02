<?php

namespace App\Console\Commands;

use App\Models\PostCategories;
use Illuminate\Console\Command;

class ListCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:list-categories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all post categories';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->table(
            ['ID', 'Name'],
            PostCategories::all(['id','name'])->toArray()
        );
    }
}
