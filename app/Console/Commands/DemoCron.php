<?php

namespace App\Console\Commands;

use App\Models\Invoice;
use Illuminate\Console\Command;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Sample
        try {
            $invTerbit = Invoice::where('status', 'pending')->whereMonth('tgl_terbit', date('m'))->whereYear('tgl_terbit', date('Y'))->get();
            foreach ($invTerbit as $key => $value) {
                $value->status = 'terbit';
                $value->save();
            }
            \Log::info("Invoice berhasil diterbitkan pada " . date('Y-m-d H:i:s'));
        } catch (\Throwable $th) {
            \Log::info("Invoice gagal diterbitkan karena " . $th->getMessage());
        }
    }
}
