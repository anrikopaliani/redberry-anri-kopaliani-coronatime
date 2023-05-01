<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="md:w-full md:border-l-2 md:pl-4 font-medium" type="submit">{{ __('messages.Log Out') }}</button>
</form>
