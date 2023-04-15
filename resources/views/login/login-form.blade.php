<x-form-layout>
    <x-header />
    <h3 class=" mt-14 text-2xl font-bold">Welcome back</h3>
    <p class="pb-16 pt-4 opacity-50">Welcome back! Please enter your details</p>
    <form class="[&>*:nth-child(2)]:pt-6  md:w-96 w-full " action="">
        <x-input label="{{ 'Username' }}" name="username" placeholder="Enter unique username or email" />
        <x-input label="{{ 'Password' }}" name="password" placeholder="Fill in password" />
        <div class="flex justify-between py-6 items-center">
            <div class=" ">
                <input type="checkbox" class="focus:accent-form-btn-color active:accent-form-btn-colo text-white"
                    name="remember_device" id="remember_device">
                <label for="remember_device" class=" font-semibold text-sm md:text-lg">Remember this device</label>
            </div>
            <a href="#" class="text-brand-primary font-semibold text-sm md:text-lg">Forgot password ?</a>
        </div>
        <button type="submit" class="bg-form-btn-color mx-auto text-white font-black w-full py-5 rounded-lg">LOG
            IN</button>
    </form>
    <p class="text-center pt-6"><span class="opacity-50">Don’t have an account?</span> <a
            href="{{ route('register.get') }}" class="font-bold">Sign up for
            free</a></p>

</x-form-layout>
