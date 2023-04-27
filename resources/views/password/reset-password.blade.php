<x-layout>
    <x-header class="justify-center pt-14 fixed" />
    <form class=" h-screen w-96 mx-auto flex flex-col justify-center" action="{{ route('password.update') }}"
        method="POST">
        @csrf
        <input type="text" name="token" value="{{ $token }}" hidden>
        <input type="text" name="email" hidden value="{{ $email }}">
        <x-input label="{{ __('New password') }}" name="password" type="password"
            placeholder="{{ __('Enter new password') }}" />
        <x-input label="{{ __('Repeat password') }}" name="password_confirmation" type="password"
            placeholder="{{ __('Repeat password') }}" />
        <x-button text="{{ __('SAVE CHANGES') }}" />
    </form>
</x-layout>
