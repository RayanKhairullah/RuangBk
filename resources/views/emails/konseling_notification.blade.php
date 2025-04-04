{{-- filepath: d:\xampp\htdocs\RuangBk\resources\views\emails\konseling_notification.blade.php --}}
@component('mail::message')
# Jadwal Konseling

Halo **{{ $jadwal->penerima->name }}**,

Berikut adalah detail jadwal konseling Anda:

- **Nama Pengirim:** {{ $jadwal->pengirim->name }}
- **Email Pengirim:** {{ $jadwal->pengirim->email }}
- **Lokasi:** {{ $jadwal->lokasi }}
- **Tanggal:** {{ $jadwal->tanggal }}
- **Topik Dibahas:** {{ $jadwal->topik_dibahas }}

Terima kasih telah menggunakan layanan kami.

@php
    $googleCalendarUrl = 'https://www.google.com/calendar/render?action=TEMPLATE' .
        '&text=' . urlencode('Jadwal Konseling: ' . $jadwal->topik_dibahas) .
        '&dates=' . \Carbon\Carbon::parse($jadwal->tanggal)->format('Ymd\THis\Z') . '/' .
        \Carbon\Carbon::parse($jadwal->tanggal)->addHour()->format('Ymd\THis\Z') .
        '&details=' . urlencode('Lokasi: ' . $jadwal->lokasi . "\nTopik Dibahas: " . $jadwal->topik_dibahas) .
        '&location=' . urlencode($jadwal->lokasi) .
        '&sf=true&output=xml';
@endphp

@component('mail::button', ['url' => $googleCalendarUrl])
Add Jadwal
@endcomponent

Salam,<br>
{{ config('app.name') }}
@endcomponent