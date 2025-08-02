<x-mail::message>
# Link for Cost Calculation from Coyle Envronmental 



<x-mail::button :url="$mailData['link']">
Visit Site
</x-mail::button>
# OR
<br>
{{ $mailData['link'] }} <br>
{{ config('app.name') }}
</x-mail::message>

