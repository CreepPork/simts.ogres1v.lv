@component('mail::message')
# Ieteikums izveidots

Paldies, ka izveidojāt ieteikumu!

Mēs noteikti ņemsim vērā un apspriedīsim vai ir iespējams jūsu ideju realizēt.

**Jūsu ieteikums**:

## {{ $title }}
{{ $body }}

Paldies,<br>
{{ config('app.name') }}
@endcomponent
