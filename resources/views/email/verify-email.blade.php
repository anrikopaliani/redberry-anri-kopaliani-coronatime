<x-layout>
    <x-header class="justify-center pt-14 fixed" />
    <div class=" h-screen flex flex-col items-center justify-center">
        <img src="{{ URL::asset('images/icons8-checkmark.gif') }}" alt="checkmark">
        <p>{{ __('We have sent you a confirmation email') }}</p>
    </div>
</x-layout>
