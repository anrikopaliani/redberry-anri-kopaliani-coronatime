<x-form-layout>
    <x-header />
    <h3 class="mt-2 md:mt-7 text-2xl font-bold">{{ __('Welcome back') }}</h3>
    <p class="pb-16 pt-4 opacity-50">{{ __('Please enter your details') }}</p>
    <form class="[&>*:nth-child(2)]:pt-6   md:w-3/4 w-full " action="">
        <x-input label="{{ __('Username') }}" name="username" placeholder="{{ __('Enter unique username or email') }}" />
        <x-input label="{{ __('Password') }}" name="password" placeholder="{{ __('Fill in password') }}" />
        <div class=" w-full flex justify-between py-6 items-center">
            <div>
                <input type="checkbox" class="focus:accent-form-btn-color active:accent-form-btn-colo text-white"
                    name="remember_device" id="remember_device">
                <label for="remember_device"
                    class=" font-semibold  md:text-base text-xs">{{ __('Remember this device') }}</label>
            </div>
            <a href="#" class="text-brand-primary font-semibold  md:text-base text-xs">{{ __('Forgot password') }}
                ?</a>
        </div>
        <button type="submit"
            class="bg-form-btn-color mx-auto text-white font-black w-full py-5 rounded-lg">{{ __('LOG
                                                                                                            IN') }}</button>
    </form>
    <p class="text-center pt-4 md:w-3/4"><span class="opacity-50">{{ __('Don’t have an account') }}?</span> <a
            href="{{ route('register.get') }}" class="font-bold">{{ __('Sign up for free') }}</a></p>

</x-form-layout>
