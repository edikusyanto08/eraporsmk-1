<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
class CreateOrReplaceNilaiPengetahuanPerKdViewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'view:CreateOrReplaceNilaiPengetahuanPerKdView';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command CreateOrReplaceNilaiPengetahuanPerKdView';

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
        DB::statement("CREATE OR REPLACE VIEW view_nilai_pengetahuan_perkd AS SELECT pembelajaran_id, anggota_rombel_id, kompetensi_id, kd_id, sum(bobot) AS bobot, sum(nilai) AS jml_nilai, round(sum(nilai_kd_pengetahuan) / sum(bobot)::numeric, 0) AS nilai_kd FROM get_nilai_pengetahuan_siswa_by_kd GROUP BY pembelajaran_id, anggota_rombel_id, kompetensi_id, kd_id;");
    }
}
