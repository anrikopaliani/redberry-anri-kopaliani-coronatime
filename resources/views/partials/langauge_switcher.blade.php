<div class="absolute flex items-center  left-4">
    @if (app()->getLocale() == 'en')
        <a href="/language/ka">ka</a>
    @else
        <a href="/language/en">{{ __('en') }}</a>
    @endif
</div>
