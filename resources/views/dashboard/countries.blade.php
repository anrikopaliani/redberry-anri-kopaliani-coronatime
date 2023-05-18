<x-dashboard-layout>
    <div class="mt-16 px-4 md:px-0">
        <h2 class="text-xl md:text-2xl font-extrabold">{{ __('messages.Statistics by country') }}</h2>

        <div class="flex pt-10">
            <a class="pb-4 text-sm md:text-base " href="{{ route('worldwide') }}">{{ __('messages.Worldwide') }}</a>
            <a class="ml-16 pb-4 border-solid border-b-2  font-bold  border-black text-sm md:text-base "
                href="{{ route('countries-list') }}">{{ __('messages.By Country') }}</a>
        </div>
    </div>
    <div class="my-10 ">
        <form action="" method="GET">
            <input name="search" class="icon-input md:border h-12 w-full md:w-60 rounded-lg"
                placeholder="Search by country" value="{{ old('search') }}" type="text">
        </form>
    </div>
    <div class="md:w-full bg-table-color rounded-t-lg break-all">
        <div class="flex h-14 items-center ">
            <div class="pl-2 flex items-center relative h-full  text-sm md:text-base  md:pl-10 w-1/4 md:w-1/5">
                <div class=" {{ app()->getLocale() === 'ka' ? 'w-4/5' : '' }}">
                    @if (!request('location'))
                        <a href="{!! route('countries-list', ['location=desc', 'search' => request('search')]) !!}">{{ __('messages.Location') }}</a>
                    @elseif (request('location') === 'asc')
                        <a href="{!! route('countries-list', ['location=desc', 'search' => request('search')]) !!}">{{ __('messages.Location') }}</a>
                    @elseif (request('location') === 'desc')
                        <a href="{!! route('countries-list', ['location=asc', 'search' => request('search')]) !!}">{{ __('messages.Location') }}</a>
                    @endif
                </div>
                <div class="pl-2 flex flex-col ">
                    @if (request('location') === 'asc')
                        <a class="pb-1" href="{{ route('countries-list') }}">
                            <x-sorting-asc queryName="location" />
                        </a>
                    @else
                        <a class="pb-1" href="{!! route('countries-list', ['location=asc', 'search' => request('search')]) !!}">
                            <x-sorting-asc queryName="location" />
                        </a>
                    @endif
                    @if (request('location') === 'desc')
                        <a href="{{ route('countries-list') }}">
                            <x-sorting-desc queryName="location" />
                        </a>
                    @else
                        <a href="{!! route('countries-list', ['location=desc', 'search' => request('search')]) !!}">
                            <x-sorting-desc queryName="location" />
                        </a>
                    @endif
                </div>
            </div>
            <div class="w-1/4 flex  items-center relative h-full  text-sm md:text-base  md:w-1/5">
                <div class=" {{ app()->getLocale() === 'ka' ? 'w-4/5' : '' }}">
                    @if (!request('cases'))
                        <a href="{!! route('countries-list', ['cases=desc', 'search' => request('search')]) !!}">{{ __('messages.New cases') }}</a>
                    @elseif (request('cases') === 'asc')
                        <a href="{!! route('countries-list', ['cases=desc', 'search' => request('search')]) !!}">{{ __('messages.New cases') }}</a>
                    @elseif (request('cases') === 'desc')
                        <a href="{!! route('countries-list', ['cases=asc', 'search' => request('search')]) !!}">{{ __('messages.New cases') }}</a>
                    @endif
                </div>
                <div class="pl-2 flex flex-col ">
                    @if (request('cases') === 'asc')
                        <a class="pb-1" href="{{ route('countries-list') }}">
                            <x-sorting-asc queryName="cases" />
                        </a>
                    @else
                        <a class="pb-1" href="{!! route('countries-list', ['cases=asc', 'search' => request('search')]) !!}">
                            <x-sorting-asc queryName="cases" />
                        </a>
                    @endif

                    @if (request('cases') === 'desc')
                        <a href="{{ route('countries-list') }}">
                            <x-sorting-desc queryName="cases" />
                        </a>
                    @else
                        <a href="{!! route('countries-list', ['cases=desc', 'search' => request('search')]) !!}">
                            <x-sorting-desc queryName="cases" />
                        </a>
                    @endif
                </div>
            </div>
            <div class="w-1/4 flex  items-center h-full relative  text-sm md:text-base  md:w-1/5">
                <div class=" {{ app()->getLocale() === 'ka' ? 'w-4/5' : '' }}">
                    @if (!request('deaths'))
                        <a href="{!! route('countries-list', ['deaths=desc', 'search' => request('search')]) !!}"> {{ __('messages.Deaths') }}</a>
                    @elseif (request('deaths') === 'asc')
                        <a href="{!! route('countries-list', ['deaths=desc', 'search' => request('search')]) !!}"> {{ __('messages.Deaths') }}</a>
                    @elseif (request('deaths') === 'desc')
                        <a href="{!! route('countries-list', ['deaths=asc', 'search' => request('search')]) !!}"> {{ __('messages.Deaths') }}</a>
                    @endif
                </div>
                <div class="pl-2 flex flex-col ">
                    @if (request('deaths') === 'asc')
                        <a class="pb-1" href="{{ route('countries-list') }}">
                            <x-sorting-asc queryName="deaths" />
                        </a>
                    @else
                        <a class="pb-1" href="{!! route('countries-list', ['deaths=asc', 'search' => request('search')]) !!}">
                            <x-sorting-asc queryName="deaths" />
                        </a>
                    @endif
                    @if (request('deaths') === 'desc')
                        <a href="{{ route('countries-list') }}">
                            <x-sorting-desc queryName="deaths" />
                        </a>
                    @else
                        <a href="{!! route('countries-list', ['deaths=desc', 'search' => request('search')]) !!}">
                            <x-sorting-desc queryName="deaths" />
                        </a>
                    @endif
                </div>
            </div>
            <div class="w-1/4 flex  items-center h-full relative  text-sm md:text-base  md:w-1/5">
                <div class=" {{ app()->getLocale() === 'ka' ? 'w-4/5' : '' }}">
                    @if (!request('recovered'))
                        <a href="{!! route('countries-list', ['recovered=desc', 'search' => request('search')]) !!}">{{ __('messages.recovered') }}</a>
                    @elseif (request('recovered') === 'asc')
                        <a href="{!! route('countries-list', ['recovered=desc', 'search' => request('search')]) !!}">{{ __('messages.recovered') }}</a>
                    @elseif (request('recovered') === 'desc')
                        <a href="{!! route('countries-list', ['recovered=asc', 'search' => request('search')]) !!}">{{ __('messages.recovered') }}</a>
                    @endif
                </div>
                <div class="pl-2 flex flex-col ">
                    @if (request('recovered') === 'asc')
                        <a class="pb-1" href="{{ route('countries-list') }}">
                            <x-sorting-asc queryName="recovered" />
                        </a>
                    @else
                        <a class="pb-1" href="{!! route('countries-list', ['recovered=asc', 'search' => request('search')]) !!}">
                            <x-sorting-asc queryName="recovered" />
                        </a>
                    @endif
                    @if (request('recovered') === 'desc')
                        <a href="{{ route('countries-list') }}">
                            <x-sorting-desc queryName="recovered" />
                        </a>
                    @else
                        <a href="{!! route('countries-list', ['recovered=desc', 'search' => request('search')]) !!}">
                            <x-sorting-desc queryName="recovered" />
                        </a>
                    @endif

                </div>
            </div>
        </div>
        <div style="height:547px" class="bg-white overflow-y-scroll  custom-scrollbar">
            <div
                class="flex min-h-49 w-full md:h-12 items-center border border-x-table-color md:border-y-table-color break-words">
                <p class="pl-2 md:pl-10 w-1/4 md:w-1/5 text-sm md:text-base ">
                    {{ __('messages.Worldwide') }}
                </p>
                <p class="w-1/4 pl-1 text-sm md:text-base  md:w-1/5">
                    {{ number_format($countryDetails->sum('confirmed')) }}
                </p>
                <p class="w-1/4 pl-1  text-sm md:text-base  md:w-1/5">
                    {{ number_format($countryDetails->sum('deaths')) }}</p>
                <p class="w-1/4 pl-3  text-sm md:text-base  md:w-1/5">
                    {{ number_format($countryDetails->sum('recovered')) }}
                </p>
            </div>
            @foreach ($list as $country)
                <div
                    class="flex min-h-49 w-full md:h-12 items-center border border-x-table-color md:border-y-table-color break-words">
                    <p class="pl-2 md:pl-10 w-1/4 md:w-1/5 text-sm md:text-base ">
                        {{ $country->getTranslation('name', app()->getLocale()) }}
                    </p>
                    <p class="w-1/4 pl-1  text-sm md:text-base  md:w-1/5">
                        {{ number_format($country->confirmed) }}</p>
                    <p class="w-1/4 pl-1  text-sm md:text-base  md:w-1/5">
                        {{ number_format($country->deaths) }}</p>
                    <p class="w-1/4 pl-3  text-sm md:text-base  md:w-1/5">
                        {{ number_format($country->recovered) }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-dashboard-layout>
