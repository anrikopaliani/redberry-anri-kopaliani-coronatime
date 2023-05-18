<div x-data="{ show: false }" class="w-24 pl-1 pr-12 md:pl-0 md:pr-0">
    <button style="margin-right:20px;"
        class="flex w-20 relative justify-between items-center text-base hover:cursor-pointer" @click="show = !show">
        {{ app()->getLocale() == 'en' ? 'English' : 'ქართული' }}
        <img style="position:absolute; left:70px;" width="9.6" height="4.8" class="ml-2"
            src="https://icons.veryicon.com/png/o/miscellaneous/massager/drop-down-arrow-3.png" alt="">
    </button>
    <div x-show="show" class="absolute">
        <a class="text-base"
            href="/language/{{ app()->getLocale() == 'en' ? 'ka' : 'en' }}">{{ app()->getLocale() == 'en' ? 'ქართული' : 'English' }}</a>
    </div>
</div>
