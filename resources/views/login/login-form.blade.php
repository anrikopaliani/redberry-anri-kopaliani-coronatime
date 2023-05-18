<x-form-layout>
    <x-header />
    <h3 class="mt-2 md:mt-7 text-2xl font-bold">{{ __('Welcome back') }}</h3>
    <p class="pb-16 pt-4 opacity-50">{{ __('Please enter your details') }}</p>
    <form class="[&>*:nth-child(2)]:pt-6   md:w-3/4 w-full " action="{{ route('login.post') }}" method="POST">
        @csrf
        <x-input label="{{ __('messages.Username') }}" name="username"
            placeholder="{{ __('messages.Enter unique username or email') }}" />
        <x-input class="mt-6" label="{{ __('messages.Password') }}" name="password" type="password"
            placeholder="{{ __('messages.Fill in password') }}" />
        <div class="w-full md:w-392 flex justify-between py-6 items-center unstyled centered">
            <div>
                <input type="checkbox" class="mt-5 styled-checkbox" name="remember_me" value="1" id="remember_me">
                <label for="remember_me" class=" font-semibold  md:text-base text-xs">
                    {{ __('messages.Remember this device') }}
                </label>
            </div>
            <a href="{{ route('password.request') }}"
                class="text-brand-primary font-semibold  md:text-base text-xs">{{ __('messages.Forgot password') }}
                ?</a>
        </div>
        <button type="submit"
            class="bg-form-btn-color mx-auto text-white font-black w-full md:w-392 py-5 rounded-lg">{{ __('LOG IN') }}</button>
        <p class="text-center pt-4 md:w-392">
            <span class="opacity-50">{{ __('messages.Don’t have an account') }}?</span>
            <a href="{{ route('register.get') }}" class="font-bold">{{ __('messages.Sign up for free') }}</a>
        </p>
    </form>
</x-form-layout>
