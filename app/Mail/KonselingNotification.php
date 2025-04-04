<?php

namespace App\Mail;

use App\Models\PenjadwalanKonseling;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KonselingNotification extends Mailable
{
    use Queueable, SerializesModels;

    public PenjadwalanKonseling $jadwal;

    /**
     * Create a new message instance.
     */
    public function __construct(PenjadwalanKonseling $jadwal)
    {
        $this->jadwal = $jadwal;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Jadwal Konseling')
                    ->markdown('emails.konseling_notification')
                    ->with([
                        'jadwal' => $this->jadwal,
                    ]);
    }
}