<x-layout>
    <x-header class="justify-center pt-14 fixed" />
    <form class=" h-screen w-96 mx-auto flex flex-col justify-center" action="{{ route('password.email') }}"
        method="POST">
        @csrf
        <x-input label="{{ __('messages.Email') }}" name="email" placeholder="{{ __('messages.Enter your email') }}" />
        <x-button text="{{ __('messages.RESET PASSWORD') }}" />
    </form>
</x-layout>
