<x-form-layout>
    <x-header />
    <h3 class="mt-2 md:mt-5   text-2xl font-bold">{{ __('messages.Welcome to Coronatime') }}</h3>
    <p class="pb-2 pt-4 md:pt-2 opacity-50">{{ __('messages.Please enter required info to sign up') }}</p>
    <form action="{{ route('register.post') }}" method="POST" class="md:w-3/4">
        @csrf
        <x-input class="mt-9" label="{{ __('messages.Username') }}" name="username"
            placeholder="{{ __('messages.Enter unique username') }}"
            hint="{{ __('messages.Username should be unique, min 3 symbols') }}" />
        <x-input class="mt-9" label="{{ __('messages.Email') }}" name="email"
            placeholder="{{ __('messages.Enter your email') }}" />
        <x-input class="mt-9" label="{{ __('messages.Password') }}" name="password" type="password"
            placeholder="{{ __('messages.Fill in password') }}" />
        <div class="flex flex-col mt-6 relative">
            <label for="password_confirmation"
                class=" text-base font-bold pt-1">{{ __('messages.Repeat Password') }}</label>
            <input
                class="mt-2 w-full md:w-96 @error('password') border-red-500 @enderror border border-input-color-default  rounded-lg focus:border-brand-primary focus:outline-none px-6 py-4 placeholder:text-sm"
                type="password" value="{{ old('password_confirmation') }}" id="password_confirmation"
                name="password_confirmation" placeholder="{{ __('messages.Repeat Password') }}">
            @error('password_confirmation')
                <p class="text-red-500 text-xs absolute top-24 flex items-center"><img class="pr-1" width="20"
                        height="20" src="{{ URL::asset('images/error.png') }}" alt="error">
                    {{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
            class="bg-form-btn-color text-white font-black w-full py-5 mt-8 rounded-lg">{{ __('messages.SIGN UP') }}</button>
    </form>
    <p class="text-center pt-4 md:pt-2 md:w-3/4 pb-2"><span
            class="opacity-50">{{ __('messages.Already have an account') }}?</span> <a href="{{ route('login.get') }}"
            class="font-bold">{{ __('messages.Log In') }}</a></p>

</x-form-layout>
