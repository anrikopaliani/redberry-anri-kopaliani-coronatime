@props(['queryName'])


@if (request($queryName) === 'desc')
    <img width="12" src="{{ URL::asset('images/down active.svg') }}" alt="">
@else
    <img width="12" src="{{ URL::asset('images/down.svg') }}" alt="">
@endif
