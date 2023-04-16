<x-form-layout>
    <x-header />
    <h3 class="mt-2 md:mt-6   text-2xl font-bold">{{ __('Welcome to Coronatime') }}</h3>
    <p class="pb-2 pt-4 opacity-50">{{ __('Please enter required info to sign up') }}</p>
    <form action="{{ route('register.post') }}" method="POST" class="md:w-3/4">
        @csrf
        <x-input label="{{ __('Username') }}" name="username" placeholder="{{ __('Enter unique username') }}" />
        <x-input label="{{ __('Email') }}" name="email" placeholder="{{ __('Enter your email') }}" />
        <x-input label="{{ __('Password') }}" name="password" type="password"
            placeholder="{{ __('Fill in password') }}" />
        <div class="flex flex-col">
            <label for="password_confirmation" class=" text-base font-bold pt-1">{{ __('Repeat Password') }}</label>
            <input
                class="mt-2 w-full @error('password') border-red-500 @enderror border border-input-color-default  rounded-lg focus:border-brand-primary focus:outline-none px-6 py-4 placeholder:text-sm"
                type="password" value="{{ old('password_confirmation') }}" id="password_confirmation"
                name="password_confirmation" placeholder="{{ __('Repeat Password') }}">
        </div>
        <button type="submit"
            class="bg-form-btn-color text-white font-black w-full py-5 mt-8 rounded-lg">{{ __('SIGN UP') }}</button>
    </form>
    <p class="text-center pt-4 md:w-3/4 pb-2"><span class="opacity-50">{{ __('Already have an account') }}?</span> <a
            href="{{ route('login.get') }}" class="font-bold">{{ __('Log In') }}</a></p>

</x-form-layout>
