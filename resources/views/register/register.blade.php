<x-form-layout>
    <x-header />
    <h3 class=" mt-4 md:mt-14 text-2xl font-bold">Welcome to Coronatime</h3>
    <p class="pb-2 pt-4 opacity-50">Please enter required info to sign up</p>
    <form class="md:w-96">
        <x-input label="{{ 'Username' }}" name="username" placeholder="Enter unique username" />
        <x-input label="{{ 'Email' }}" name="email" type="email" placeholder="Enter your email" />
        <x-input label="{{ 'Password' }}" name="password" type="password" placeholder="Fill in password" />
        <x-input label="{{ 'Repeat Password' }}" name="repeat_password" type="password" placeholder="Repeat password" />
        <button type="submit" class="bg-form-btn-color text-white font-black w-full py-5 mt-8 rounded-lg">SIGN
            UP</button>
    </form>
    <p class="text-center pt-6 md:w-96"><span class="opacity-50">Already have an account?</span> <a
            href="{{ route('login.get') }}" class="font-bold">Log In</a></p>

</x-form-layout>
