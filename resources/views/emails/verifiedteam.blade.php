@component('mail::message')

Hallo Tim {{$team_name}},<br>
Selamat tim kamu sudah diverifikasi, silahkan membuka dashboard dan menyelesaikan task yang telah muncul didashboard lomba kamu.

@component('mail::button', ['url' => 'https://www.ifest.uajy.ac.id/dash/masuk'])
Ke Dashboard
@endcomponent

Salam Hangat,<br>
{{ config('app.name') }}
@endcomponent
