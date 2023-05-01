<div x-data="{ show: false }" class="pr-11 md:pr-0">
    <button class="flex justify-between" @click="show = !show">
        {{ app()->getLocale() == 'en' ? 'English' : 'ქართული' }}
        <img width="9.6" height="4.8" class="ml-2"
            src="https://icons.veryicon.com/png/o/miscellaneous/massager/drop-down-arrow-3.png" alt="">
    </button>
    <div x-show="show" class="absolute">
        <a
            href="/language/{{ app()->getLocale() == 'en' ? 'ka' : 'en' }}">{{ app()->getLocale() == 'en' ? 'ქართული' : 'English' }}</a>
    </div>
</div>
