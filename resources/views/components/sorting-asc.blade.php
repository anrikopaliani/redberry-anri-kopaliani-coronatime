@props(['queryName'])


@if (request($queryName) === 'asc')
    <img width="12" src="{{ URL::asset('images/up active.svg') }}" alt="">
@else
    <img width="12" src="{{ URL::asset('images/up.svg') }}" alt="">
@endif
