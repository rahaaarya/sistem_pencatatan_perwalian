<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Krs;

class KrsCreated
{
    use Dispatchable, SerializesModels;

    /**
     * Krs model instance.
     *
     * @var Krs
     */
    public $krs;

    /**
     * Create a new event instance.
     *
     * @param  Krs  $krs
     * @return void
     */
    public function __construct(Krs $krs)
    {
        $this->krs = $krs;
    }
}
