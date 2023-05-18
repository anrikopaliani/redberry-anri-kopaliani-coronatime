@props(['queryName'])

<a class="pb-1" href="{!! route('countries-list', ['cases=asc', 'search' => request('search')]) !!}">
    <x-sorting-asc queryName="cases" />
</a>
<a href="{!! route('countries-list', ['cases=desc', 'search' => request('search')]) !!}">
    <x-sorting-desc queryName="cases" />
</a>
