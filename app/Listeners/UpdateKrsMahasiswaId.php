<?php

namespace App\Listeners;

use App\Events\KrsCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class UpdateKrsMahasiswaId
{
    /**
     * Handle the event.
     *
     * @param  KrsCreated  $event
     * @return void
     */
    public function handle(KrsCreated $event)
    {
        // Lakukan tindakan yang diperlukan setelah KRS berhasil dibuat
        Log::info('KRS berhasil dibuat oleh mahasiswa dengan ID: ' . $event->krs->mahasiswa_id);
    }
}
