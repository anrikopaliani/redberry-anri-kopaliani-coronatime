<x-form-layout>
    <x-header />
    <h3 class=" mt-2 md:mt-14 text-2xl font-bold">{{ __('Welcome to Coronatime') }}</h3>
    <p class="pb-2 pt-4 opacity-50">{{ __('Please enter required info to sign up') }}</p>
    <form class="md:w-96">
        <x-input label="{{ __('Username') }}" name="username" placeholder="{{ __('Enter unique username') }}" />
        <x-input label="{{ __('Email') }}" name="email" type="email" placeholder="{{ __('Enter your email') }}" />
        <x-input label="{{ __('Password') }}" name="password" type="password"
            placeholder="{{ __('Fill in password') }}" />
        <x-input label="{{ __('Repeat Password') }}" name="repeat_password" type="password"
            placeholder="{{ __('Repeat Password') }}" />
        <button type="submit"
            class="bg-form-btn-color text-white font-black w-full py-5 mt-8 rounded-lg">{{ __('SIGN UP') }}</button>
    </form>
    <p class="text-center pt-6 md:w-96 pb-2"><span class="opacity-50">{{ __('Already have an account') }}?</span> <a
            href="{{ route('login.get') }}" class="font-bold">{{ __('Log In') }}</a></p>

</x-form-layout>
