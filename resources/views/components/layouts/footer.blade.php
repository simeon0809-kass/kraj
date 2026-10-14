<footer
    class="rounded-4xl rounded-b-none lg:rounded-none bg-[#2E589E] font-light px-25 lg:flex lg:text-left text-center text-xl lg:text-base space-y-5 lg:justify-between py-6">
    <div>
        <img class="h-17 mx-auto lg:mx-0" src="{{ asset('icons/logo.png') }}" alt="">
    </div>
    <div class="text-white/80 hover:text-white transition duration-300">
        <a href="{{ route('home.index') }}" class="{{ request()->routeIs('home.index') ? 'text-white' : 'text-white/70' }}">Дома</a>
    </div>
    <div class="space-y-2 flex flex-col">
        <a href="{{ route('about.index') }}" class="{{ request()->routeIs('about.index') ? 'text-white' : 'text-white/70' }} text-white/80 hover:text-white transition duration-300">За нас</a>
        <a href="#" class="text-white/80 hover:text-white transition duration-300">Историја</a>
        <a href="#" class="text-white/80 hover:text-white transition duration-300">Визија</a>
        <a href="#" class="text-white/80 hover:text-white transition duration-300">Мисија</a>

    </div>
    <div class="space-y-2 flex flex-col">
        <a href="{{ route('news.index') }}" class="{{ request()->routeIs('news.index') ? 'text-white' : 'text-white/70' }} text-white/80 hover:text-white transition duration-300">Новости и соопштенија</a>
        <a href="{{ route('activities.index') }}" class="{{ request()->routeIs('activities.index') ? 'text-white' : 'text-white/70' }} text-white/80 hover:text-white transition duration-300">Активности</a>

    </div>
    <div class="space-y-2">
        <a href="{{ route('crafts.index') }}" class="{{ request()->routeIs('crafts.index') ? 'text-white' : 'text-white/70' }} text-white/80 hover:text-white transition duration-300">Изработки</a>

    </div>
    <div class="space-y-2.5 text-center lg:text-left text-white">
        <a href="{{ route('contact.index') }}" class="{{ request()->routeIs('contact.index') ? 'text-white' : 'text-white/70' }} text-white/80 hover:text-white transition duration-300">Контакт</a>
        <div class="flex items-center justify-center lg:justify-start space-x-2">
            <i class="fa-solid fa-phone-volume text-sm"></i>
            <p>02 25 80 312</p>
        </div>
        <div class="flex items-center justify-center lg:justify-start space-x-2">
            <i class="fa-regular fa-envelope"></i>
            <p>kpuidrizovo@kpuidrizovo.gov.mk</p>
        </div>
        <div class="flex items-center justify-center lg:justify-start space-x-2">
            <i class=" fa-solid fa-location-dot"></i>
            <p>ул.1 колонија Идризово бр.4А</p>
        </div>

    </div>
    <div class="mt-5 mb-3">
        <a href="{{ route('contact.index') }}" class="bg-[#0E1B2F] font-semibold px-8 py-2 rounded-lg text-white cursor-pointer hover:bg-[#214072] transition duration-300">Закажи посета</a>
    </div>
</footer>
