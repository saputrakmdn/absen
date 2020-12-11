<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Siswa;

class UpdateSiswa extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:siswa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Siswa Update';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \Log::info("Cron is working fine!");
        Siswa::query()->update(['status' => false]);
    }
}
