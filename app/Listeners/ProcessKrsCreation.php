<?php

namespace App\Listeners;

use App\Events\KrsCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class ProcessKrsCreation
{
    /**
     * Handle the event.
     *
     * @param  KrsCreated  $event
     * @return void
     */
    public function handle(KrsCreated $event)
    {
        // Akses properti KRS yang dibuat dari event
        $krs = $event->krs;

        // Lakukan log atau tindakan lain yang sesuai
        Log::info('KRS baru telah dibuat: ' . $krs->id);
    }
}
