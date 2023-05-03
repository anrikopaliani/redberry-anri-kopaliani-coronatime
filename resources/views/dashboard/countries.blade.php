<x-dashboard-layout>
    <div class="mt-16">
        <h2 class="text-xl md:text-2xl font-extrabold">{{ __('messages.Statistics by country') }}</h2>

        <div class="flex pt-10">
            <a class="pb-4 " href="{{ route('worldwide') }}">{{ __('messages.Worldwide') }}</a>
            <a class="ml-16 pb-4 border-solid border-b-2    border-black"
                href="{{ route('countries-list') }}">{{ __('messages.By Country') }}</a>
        </div>

        <div class="my-10 ">
            <form action="" method="GET">
                <input name="search" class="icon-input border h-12 w-60 rounded-lg" placeholder="Search by country"
                    type="text">
            </form>
        </div>

        <div class="w-full bg-table-color rounded-t-lg ">
            <div class="flex h-14 items-center ">
                <p class="md:pl-10 md:w-1/5">Location</p>
                <p class="md:w-1/5">New cases</p>
                <p class="md:w-1/5">Deaths</p>
                <p class="md:w-1/5">recovered</p>
            </div>
            <div style="height:547px" class="bg-white overflow-scroll">
                @foreach ($list as $country)
                    <div class="flex h-12 items-center border border-table-color">
                        <p class="md:pl-10  md:w-1/5">{{ $country->getTranslation('name', app()->getLocale()) }}</p>
                        <p class="md:w-1/5">{{ number_format($country->confirmed) }}</p>
                        <p class="md:w-1/5">{{ number_format($country->deaths) }}</p>
                        <p class="md:w-1/5">{{ number_format($country->recovered) }}</p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</x-dashboard-layout>
