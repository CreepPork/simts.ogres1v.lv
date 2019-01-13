@component('mail::message')
# Ieteikums izveidots

Paldies, ka izveidojāt ieteikumu!

Mēs noteikti ņemsim vērā un apspriedīsim vai ir iespējams jūsu ideju realizēt.

**Jūsu ieteikums**:

## {{ $recommendation->title }}
{{ $recommendation->body }}

Paldies,<br>
{{ config('app.name') }}
@endcomponent
