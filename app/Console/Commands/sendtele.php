<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Telegram;
use App\Absen;
use Telegram\Bot\FileUpload\InputFile;


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
            $time = "2019-08-29";
            $absen = Absen::where('tanggal',$time)->with('siswa', 'kelas')->get();
            foreach($absen as $data){
                if($data->keterangan != "hadir"){
                    $text = "Absen Tanggal: {$data->tanggal}\n"
                            ."Nama: {$data->siswa->nama}\n"
                            ."Kelas: {$data->kelas->nama_kelas}\n"
                            ."Keterangan: {$data->keterangan}";
                    Telegram::sendMessage([
                        'chat_id' => -1001323023342,
                        'parse_mode' => 'HTML',
                        'text' => $text
                    ]);
                }
        }

    }
}
