@component('mail::message')
    # {{$data->email}}

    Subject : {{$data->subject}}
    
    {!! $data->message !!}

    Thanks,
    {{ config('app.name') }}
@endcomponent
