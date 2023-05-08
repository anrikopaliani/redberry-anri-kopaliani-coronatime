<x-layout>
    <x-header class="pl-4 justify-start md:justify-center pt-14 fixed" />
    <div class=" h-screen flex flex-col items-center justify-center">
        <img src="{{ URL::asset('images/icons8-checkmark.gif') }}" alt="checkmark">
        <p>{{ __('messages.Your account is confirmed, you can sign in') }}</p>

        <a type="button" class="bg-form-btn-color mt-24 px-32 py-5 md:px-56 md:py-5 text-white font-bold rounded-xl"
            href="{{ route('login.get') }}">
            {{ __('messages.SIGN IN') }}
        </a>
    </div>
</x-layout>
