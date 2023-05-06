<x-layout>
    <x-header class="justify-center pt-14 fixed" />
    <form class=" h-screen w-96 mx-auto flex flex-col justify-center" action="{{ route('password.update') }}"
        method="POST">
        @csrf
        <input type="text" name="token" value="{{ $token }}" hidden>
        <input type="text" name="email" hidden value="{{ $email }}">
        <x-input class="mt-6" label="{{ __('messages.New password') }}" name="password" type="password"
            placeholder="{{ __('messages.Enter new password') }}" />
        <x-input class="mt-6" label="{{ __('messages.Repeat password') }}" name="password_confirmation"
            type="password" placeholder="{{ __('messages.Repeat password') }}" />
        <x-button text="{{ __('messages.SAVE CHANGES') }}" />
    </form>
</x-layout>
