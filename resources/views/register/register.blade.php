<x-form-layout>
    <x-header />
    <h3 class="mt-2 md:mt-6   text-2xl font-bold">{{ __('Welcome to Coronatime') }}</h3>
    <p class="pb-2 pt-4 opacity-50">{{ __('Please enter required info to sign up') }}</p>
    <form action="{{ route('register.post') }}" method="POST" class="md:w-3/4">
        @csrf
        <x-input class="mt-1" label="{{ __('Username') }}" name="username" placeholder="{{ __('Enter unique username') }}"
            hint="{{ __('messages.Username should be unique, min 3 symbols') }}" />
        <x-input class="mt-9" label="{{ __('Email') }}" name="email" placeholder="{{ __('Enter your email') }}" />
        <x-input class="mt-9" label="{{ __('Password') }}" name="password" type="password"
            placeholder="{{ __('Fill in password') }}" />
        <div class="flex flex-col mt-6 relative">
            <label for="password_confirmation" class=" text-base font-bold pt-1">{{ __('Repeat Password') }}</label>
            <input
                class="mt-2 w-full md:w-96 @error('password') border-red-500 @enderror border border-input-color-default  rounded-lg focus:border-brand-primary focus:outline-none px-6 py-4 placeholder:text-sm"
                type="password" value="{{ old('password_confirmation') }}" id="password_confirmation"
                name="password_confirmation" placeholder="{{ __('Repeat Password') }}">
            @error('password_confirmation')
                <p class="text-red-500 text-xs absolute top-24 flex items-center"><img class="pr-1" width="20"
                        height="20" src="{{ URL::asset('images/error.png') }}" alt="error">
                    {{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
            class="bg-form-btn-color text-white font-black w-full md:w-392 py-5 mt-8 rounded-lg">{{ __('SIGN UP') }}</button>
    </form>
    <p class="text-center pt-4 md:w-392 pb-2"><span class="opacity-50">{{ __('Already have an account') }}?</span> <a
            href="{{ route('login.get') }}" class="font-bold">{{ __('Log In') }}</a></p>

</x-form-layout>
