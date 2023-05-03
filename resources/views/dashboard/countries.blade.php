<x-dashboard-layout>
    <div class="mt-16 px-4 md:px-0">
        <h2 class="text-xl md:text-2xl font-extrabold">{{ __('messages.Statistics by country') }}</h2>

        <div class="flex pt-10">
            <a class="pb-4 " href="{{ route('worldwide') }}">{{ __('messages.Worldwide') }}</a>
            <a class="ml-16 pb-4 border-solid border-b-2    border-black"
                href="{{ route('countries-list') }}">{{ __('messages.By Country') }}</a>
        </div>
    </div>
    <div class="my-10 ">
        <form action="" method="GET">
            <input name="search" class="icon-input md:border h-12 w-full md:w-60 rounded-lg"
                placeholder="Search by country" type="text">
        </form>
    </div>
    <div class="md:w-full bg-table-color rounded-t-lg ">
        <div class="flex h-14 items-center ">
            <p class="pl-2 md:pl-10 w-1/4 md:w-1/5">Location</p>
            <p class="w-1/4 md:w-1/5">New cases</p>
            <p class="w-1/4 md:w-1/5">Deaths</p>
            <p class="w-1/4 md:w-1/5">recovered</p>
        </div>
        <div style="height:547px" class="bg-white overflow-scroll">
            @foreach ($list as $country)
                <div
                    class="flex min-h-49 md:h-12 items-center border border-x-table-color md:border-y-table-color break-words">
                    <p class="pl-2 md:pl-10 w-1/4 md:w-1/5 ">
                        {{ $country->getTranslation('name', app()->getLocale()) }}
                    </p>
                    <p class="w-1/4 md:w-1/5">{{ number_format($country->confirmed) }}</p>
                    <p class="w-1/4 md:w-1/5">{{ number_format($country->deaths) }}</p>
                    <p class="w-1/4 md:w-1/5">{{ number_format($country->recovered) }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-dashboard-layout>
