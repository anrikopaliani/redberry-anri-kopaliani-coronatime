<div class="absolute md:left-4 left-3/4">
    @if (app()->getLocale() == 'en')
        <a href="/language/ka">ka</a>
    @else
        <a href="/language/en">{{ __('en') }}</a>
    @endif
</div>
