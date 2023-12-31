<x-dashboard-layout>
    <div class="mt-16 px-4 md:px-0">
        <h2 class="text-xl md:text-2xl font-extrabold">{{ __('messages.Worldwide Statistics') }}</h2>
        <div class="flex pt-10">
            <a class="pb-4 border-solid border-b-2  font-bold  border-black text-sm md:text-base "
                href="{{ route('worldwide') }}">{{ __('messages.Worldwide') }}</a>
            <a class="ml-16 pb-4 text-sm md:text-base "
                href="{{ route('countries-list') }}">{{ __('messages.By Country') }}</a>
        </div>
        <div class="grid grid-cols-6 gap-6 mt-10">
            <div class="h-64 col-span-6 md:col-span-2 bg-brand-primary bg-opacity-0.08 rounded-2xl">
                <div class="h-full flex flex-col items-center justify-center">
                    <img class="opacity-100 pb-6" src="{{ URL::asset('images/new-cases-logo.png') }}" alt="">
                    <p class="text-sm md:text-xl leading-10 pb-4">{{ __('messages.New cases') }}</p>
                    <p class="text-brand-primary text-2xl md:text-4xl font-black">{{ number_format($newCases) }}</p>
                </div>
            </div>
            <div class="h-64 col-span-3 md:col-span-2 bg-form-btn-color bg-opacity-0.08 rounded-2xl">
                <div class="h-full flex flex-col items-center justify-center">
                    <img class="opacity-100 pb-6" src="{{ URL::asset('images/recovered-logo.png') }}" alt="">
                    <p class="text-sm md:text-xl leading-10 pb-4">{{ __('messages.Recovered') }}</p>
                    <p class="text-brand-primary text-2xl md:text-4xl font-black">{{ number_format($recovered) }}</p>
                </div>
            </div>
            <div class="h-64 col-span-3 md:col-span-2 bg-brand-tertiary  bg-opacity-0.08  rounded-2xl">
                <div class="h-full flex flex-col items-center justify-center">
                    <img class="opacity-100 pb-6" src="{{ URL::asset('images/deaths-logo.png') }}" alt="">
                    <p class="text-sm md:text-xl leading-10 pb-4">{{ __('messages.Deaths') }}</p>
                    <p class="text-brand-primary text-2xl md:text-4xl font-black">{{ number_format($deaths) }}</p>
                </div>
            </div>

        </div>
    </div>
</x-dashboard-layout>
