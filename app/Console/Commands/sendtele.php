<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Telegram;
use App\Absen;
use App\Siswa;
use Telegram\Bot\FileUpload\InputFile;
use Carbon\Carbon;


class sendtele extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tele:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending telegram';

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
                $time = Carbon::now()->toDateString();
                $absen = Absen::where('tanggal',  $time)->with('siswa', 'kelas')->get();
                foreach($absen as $data){
                    if($data->keterangan != "hadir"){
                        $text = "Absen Tanggal: {$data->tanggal}\n"
                                ."Nama: {$data->siswa->nama}\n"
                                ."Kelas: {$data->kelas->nama_kelas}\n"
                                ."Keterangan: {$data->keterangan}";
                        Telegram::sendMessage([
                            'chat_id' => -371554893,
                            'parse_mode' => 'HTML',
                            'text' => $text
                        ]);
                    }
                }
    }
}
