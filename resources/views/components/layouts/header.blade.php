<button id="backToTop"
    class="z-50 fixed bottom-10 right-10 w-14 h-14 bg-[#2b5a97] text-white rounded-full flex items-center justify-center shadow-lg hover:bg-[#497ACA] duration-300 transition-all"
    aria-label="Back to top">
    <i class="fas fa-arrow-up text-3xl"></i>
</button>

<div class="bg-[#2E589E] px-10 md:px-25 font-extralight">

    {{-- TOP INFO BAR --}}
    <div class="lg:flex hidden h-10 items-center justify-between text-white">
        <div class="flex items-center space-x-2">
            <i class="fa-solid fa-phone-volume text-sm"></i>
            <p>02 25 80 312</p>
        </div>
        <div class="flex items-center space-x-2">
            <i class="fa-regular fa-envelope"></i>
            <p>kpuidrizovo@kpuidrizovo.gov.mk</p>
        </div>
        <div class="flex items-center space-x-2">
            <i class="fa-solid fa-location-dot"></i>
            <p>ул.1 колонија Идризово бр.4А</p>
        </div>

        {{-- ===== DESKTOP LANGUAGE SWITCHER ===== --}}
        <div class="relative notranslate" id="langDropdown" translate="no">
            <button type="button" onclick="toggleLangMenu()"
                class="flex items-center space-x-2 hover:text-white/80 transition duration-200 focus:outline-none notranslate" translate="no">
                <img id="currentFlag" src="https://flagcdn.com/w20/mk.png" alt="MK" width="20" height="15"
                    class="rounded-sm inline-block">
                <span class="text-sm font-semibold" id="currentCode">MK</span>
                <i class="fa-solid fa-angle-down text-xs transition-transform duration-200" id="langChevron"></i>
            </button>

            <div id="langMenu"
                class="absolute right-0 top-8 bg-[#2E589E] border border-white/20 rounded-lg shadow-xl overflow-hidden z-50 hidden min-w-[140px]">
                <button type="button" onclick="translateTo('mk'); toggleLangMenu()"
                    class="notranslate flex items-center space-x-2 px-4 py-2 hover:bg-[#214072] transition duration-200 text-sm text-white/80 w-full text-left"
                    translate="no">
                    <img src="https://flagcdn.com/w20/mk.png" width="20" height="15" alt="MK"
                        class="rounded-sm">
                    <span>Македонски</span>
                </button>
                <button type="button" onclick="translateTo('sq'); toggleLangMenu()"
                    class="notranslate flex items-center space-x-2 px-4 py-2 hover:bg-[#214072] transition duration-200 text-sm text-white/80 w-full text-left"
                    translate="no">
                    <img src="https://flagcdn.com/w20/al.png" width="20" height="15" alt="SQ"
                        class="rounded-sm">
                    <span>Shqip</span>
                </button>
                <button type="button" onclick="translateTo('en'); toggleLangMenu()"
                    class="notranslate flex items-center space-x-2 px-4 py-2 hover:bg-[#214072] transition duration-200 text-sm text-white/80 w-full text-left"
                    translate="no">
                    <img src="https://flagcdn.com/w20/gb.png" width="20" height="15" alt="EN"
                        class="rounded-sm">
                    <span>English</span>
                </button>
            </div>
        </div>
        {{-- ===== END DESKTOP LANGUAGE SWITCHER ===== --}}
    </div>

    {{-- MAIN NAV --}}
    <div class="flex h-15 items-center justify-between text-white/70">
        <img class="w-10" src="{{ asset('icons/logo.png') }}" alt="">

        <a href="{{ route('home.index') }}"
            class="{{ request()->routeIs('home.index') ? 'text-white' : 'text-white/70' }} hidden relative lg:inline-block before:absolute before:h-0.5 before:-bottom-1 before:duration-300 hover:before:w-full before:bg-white before:w-0 hover:text-white transition duration-300">Дома</a>

        <a href="{{ route('about.index') }}"
            class="{{ request()->routeIs('about.index') ? 'text-white' : 'text-white/70' }} hidden relative lg:inline-block before:absolute before:h-0.5 before:-bottom-1 before:duration-300 hover:before:w-full before:bg-white before:w-0 hover:text-white transition duration-300">За
            нас</a>

        <a href="{{ route('news.index') }}"
            class="{{ request()->routeIs('news.index') ? 'text-white' : 'text-white/70' }} hidden relative lg:inline-block before:absolute before:h-0.5 before:-bottom-1 before:duration-300 hover:before:w-full before:bg-white before:w-0 hover:text-white transition duration-300">Новости
            и соопштенија
        </a>

        <a href="{{ route('crafts.index') }}"
            class="{{ request()->routeIs('crafts.index') ? 'text-white' : 'text-white/70' }} hidden relative lg:inline-block before:absolute before:h-0.5 before:-bottom-1 before:duration-300 hover:before:w-full before:bg-white before:w-0 hover:text-white transition duration-300">Изработки</a>

        <a href="{{ route('contact.index') }}"
            class="{{ request()->routeIs('contact.index') ? 'text-white' : 'text-white/70' }} hidden relative lg:inline-block before:absolute before:h-0.5 before:-bottom-1 before:duration-300 hover:before:w-full before:bg-white before:w-0 hover:text-white transition duration-300">Контакт</a>

        <div class="space-x-5 flex items-center">
            <div
                class="relative inline-flex h-10 items-center text-center justify-between overflow-hidden rounded-full border border-white/20 bg-white/10 pr-10 shadow-sm backdrop-blur-sm transition duration-300 hover:bg-white/15">
                <input type="text" placeholder="Пребарувај..."
                    class="w-0 px-0 h-full opacity-0 bg-transparent text-white placeholder:text-white/70 text-sm leading-none transition-all duration-300 focus:outline-none">
                <i class="fa-solid fa-magnifying-glass absolute right-0 top-6/7 flex h-10 w-10 -translate-y-1/2 items-center justify-center text-base leading-none text-white/80 hover:text-white transition duration-300 cursor-pointer"
                    onclick="const i=this.previousElementSibling;i.classList.toggle('w-0');i.classList.toggle('px-0');i.classList.toggle('w-36');i.classList.toggle('px-3');i.classList.toggle('opacity-0');i.classList.toggle('opacity-100')"></i>
            </div>
            <i class="fa-solid fa-bars text-lg text-white lg:hidden! cursor-pointer" onclick="toggleMobileMenu()"></i>
        </div>

        <style>
            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes slideUp {
                from {
                    opacity: 1;
                    transform: translateY(0);
                }

                to {
                    opacity: 0;
                    transform: translateY(-10px);
                }
            }

            @keyframes expandDown {
                from {
                    max-height: 0;
                    opacity: 0;
                }

                to {
                    max-height: 300px;
                    opacity: 1;
                }
            }

            #mobileMenu.open {
                animation: slideDown 0.3s ease-out forwards;
            }

            #mobileMenu.close {
                animation: slideUp 0.3s ease-in forwards;
            }

            #mobileMenu a {
                animation: slideDown 0.4s ease-out backwards;
            }

            #mobileMenu.close a {
                animation: slideUp 0.3s ease-in forwards;
            }

            #mobileMenu a:nth-child(1) {
                animation-delay: 0.05s;
            }

            #mobileMenu a:nth-child(2) {
                animation-delay: 0.1s;
            }

            #mobileMenu a:nth-child(3) {
                animation-delay: 0.15s;
            }

            #mobileMenu a:nth-child(4) {
                animation-delay: 0.2s;
            }

            #mobileMenu a:nth-child(5) {
                animation-delay: 0.25s;
            }

            #mobileMenu a:nth-child(6) {
                animation-delay: 0.3s;
            }

            .group>div {
                max-height: 0;
                overflow: hidden;
                opacity: 0;
            }

            .group:hover>div {
                animation: expandDown 0.55s ease-out forwards;
            }

            .group>div a {
                opacity: 1;
            }

            .group:hover>div a {
                opacity: 1;
            }

            /* Hide Google Translate toolbar */
            body {
                top: 0px !important;
                position: static !important;
            }

            .goog-te-banner-frame.skiptranslate {
                display: none !important;
            }

            .skiptranslate {
                display: none !important;
            }

            .goog-te-banner-frame {
                display: none !important;
            }
        </style>

        {{-- MOBILE MENU --}}
        <div id="mobileMenu"
            class="md:hidden absolute top-15 left-0 right-0 bg-[#2E589E] text-white flex flex-col space-y-1 pb-4 z-50 hidden">
            <a href="{{ route('home.index') }}"
                class="{{ request()->routeIs('home.index') ? 'text-white' : 'text-white/70' }} px-10 py-2 hover:bg-[#214072] transition duration-200">Дома</a>
            <a href="{{ route('about.index') }}"
                class="{{ request()->routeIs('about.index') ? 'text-white' : 'text-white/70' }} px-10 py-2 hover:bg-[#214072] transition duration-200">За
                нас</a>
            <a href="{{ route('news.index') }}"
                class="{{ request()->routeIs('news.index') ? 'text-white' : 'text-white/70' }} px-10 py-2 hover:bg-[#214072] transition duration-200">Новости
                и соопштенија</a>
            <a href="{{ route('crafts.index') }}"
                class="{{ request()->routeIs('crafts.index') ? 'text-white' : 'text-white/70' }} px-10 py-2 hover:bg-[#214072] transition duration-200">Изработки</a>
            <a href="{{ route('contact.index') }}"
                class="{{ request()->routeIs('contact.index') ? 'text-white' : 'text-white/70' }} px-10 py-2 hover:bg-[#214072] transition duration-200">Контакт</a>
            <a href="{{ route('contact.index') }}"
                class="{{ request()->routeIs('contact.index') ? 'text-white' : 'text-white/70' }} px-10 py-2 hover:bg-[#214072] transition duration-200">Контакт</a>

            {{-- ===== MOBILE LANGUAGE SWITCHER ===== --}}
            <div class="px-10 py-2 notranslate" translate="no">
                <p class="text-white/50 text-xs mb-2 uppercase tracking-wider">Јазик</p>
                <div class="flex space-x-3">
                    <button type="button" onclick="translateTo('mk')"
                        class="notranslate flex items-center space-x-1 px-3 py-1.5 rounded-lg text-sm text-white/60 hover:text-white hover:bg-white/10 transition duration-200"
                        translate="no">
                        <img src="https://flagcdn.com/w20/mk.png" width="20" height="15" alt="MK"
                            class="rounded-sm">
                        <span>MK</span>
                    </button>
                    <button type="button" onclick="translateTo('sq')"
                        class="notranslate flex items-center space-x-1 px-3 py-1.5 rounded-lg text-sm text-white/60 hover:text-white hover:bg-white/10 transition duration-200"
                        translate="no">
                        <img src="https://flagcdn.com/w20/al.png" width="20" height="15" alt="SQ"
                            class="rounded-sm">
                        <span>SQ</span>
                    </button>
                    <button type="button" onclick="translateTo('en')"
                        class="notranslate flex items-center space-x-1 px-3 py-1.5 rounded-lg text-sm text-white/60 hover:text-white hover:bg-white/10 transition duration-200"
                        translate="no">
                        <img src="https://flagcdn.com/w20/gb.png" width="20" height="15" alt="EN"
                            class="rounded-sm">
                        <span>EN</span>
                    </button>
                </div>
            </div>
            {{-- ===== END MOBILE LANGUAGE SWITCHER ===== --}}

            <div class="w-full flex justify-center items-center">
                <a href="{{ route('contact.index') }}"
                    class="w-[90%] hover:bg-[#214072] transition duration-200 inline-block bg-[#0E1B2F] font-semibold px-8 py-2 rounded-lg">Закажи
                    посета</a>
            </div>
        </div>

        <a href="{{ route('contact.index') }}"
            class="hidden lg:inline-block bg-[#0E1B2F] font-semibold px-8 py-2 rounded-lg text-white">Закажи посета</a>
    </div>
</div>

{{-- ===== GOOGLE TRANSLATE ===== --}}
<div id="google_translate_element" class="hidden"></div>
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'mk',
            includedLanguages: 'mk,sq,en',
            autoDisplay: false
        }, 'google_translate_element');
    }
</script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
{{-- ===== END GOOGLE TRANSLATE ===== --}}

<script>
    const languageSettings = {
        mk: { flag: 'mk', locale: 'mk', display: 'MK' },
        sq: { flag: 'al', locale: 'sq', display: 'SQ' },
        en: { flag: 'gb', locale: 'en', display: 'EN' }
    };

    function toggleLangMenu() {
        const menu = document.getElementById('langMenu');
        const chevron = document.getElementById('langChevron');

        if (!menu) {
            return;
        }

        menu.classList.toggle('hidden');

        if (chevron) {
            chevron.classList.toggle('rotate-180');
        }
    }

    function createChangeEvent() {
        if (typeof Event === 'function') {
            return new Event('change', { bubbles: true });
        }

        const event = document.createEvent('HTMLEvents');
        event.initEvent('change', true, true);
        return event;
    }

    function setPersistentLanguage(languageCode) {
        localStorage.setItem('selectedTranslateLanguage', languageCode);
        document.cookie = `googtrans=/mk/${languageCode};path=/;`; 
    }

    function getPersistentLanguage() {
        const stored = localStorage.getItem('selectedTranslateLanguage');
        if (stored && languageSettings[stored]) {
            return stored;
        }

        const cookieMatch = document.cookie.match(/(?:^|;\s*)googtrans=\/mk\/([^;]+)/);
        if (cookieMatch && languageSettings[cookieMatch[1]]) {
            return cookieMatch[1];
        }

        return 'mk';
    }

    function applyGoogleTranslate(languageCode) {
        setPersistentLanguage(languageCode);

        waitForTranslateSelect(select => {
            select.value = languageCode;
            select.dispatchEvent(createChangeEvent());
        });
    }

    function waitForTranslateSelect(callback, attempt = 0) {
        const select = document.querySelector('.goog-te-combo');

        if (select) {
            callback(select);
            return;
        }

        if (attempt >= 30) {
            return;
        }

        setTimeout(() => waitForTranslateSelect(callback, attempt + 1), 150);
    }

    function translateTo(languageCode) {
        if (!languageSettings[languageCode]) {
            return;
        }

        setActiveLang(languageCode);

        if (languageCode === 'mk') {
            setPersistentLanguage(languageCode);
            document.cookie = 'googtrans=/mk/mk;path=/;';
            setTimeout(() => {
                window.location.reload();
            }, 100);
            return;
        }

        applyGoogleTranslate(languageCode);
    }

    function setActiveLang(languageCodeOrFlag, maybeLanguageCode = null, maybeDisplayCode = null) {
        let languageCode;
        let settings;

        if (maybeLanguageCode && maybeDisplayCode) {
            languageCode = maybeLanguageCode;
            settings = {
                flag: languageCodeOrFlag,
                locale: maybeLanguageCode,
                display: maybeDisplayCode
            };
        } else {
            languageCode = languageCodeOrFlag;
            settings = languageSettings[languageCode] || languageSettings.mk;
        }

        const currentFlag = document.getElementById('currentFlag');
        const currentCode = document.getElementById('currentCode');

        if (currentFlag) {
            currentFlag.src = `https://flagcdn.com/w20/${settings.flag}.png`;
            currentFlag.alt = settings.display;
        }

        if (currentCode) {
            currentCode.textContent = settings.display;
        }

        document.documentElement.lang = settings.locale;
        setPersistentLanguage(languageCode);
    }

    function initializeLanguageSwitcher() {
        const selectedLanguage = getPersistentLanguage();
        setActiveLang(selectedLanguage);

        if (selectedLanguage !== 'mk') {
            applyGoogleTranslate(selectedLanguage);
        }
    }

    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
            menu.classList.remove('close');
            menu.classList.add('open');
        } else {
            menu.classList.remove('open');
            menu.classList.add('close');
            setTimeout(() => {
                menu.classList.add('hidden');
            }, 300);
        }
    }

    document.addEventListener('click', function(event) {
        const menu = document.getElementById('mobileMenu');
        const bars = document.querySelector('.fa-bars');
        if (menu && bars && !menu.contains(event.target) && !bars.contains(event.target) && !menu.classList.contains('hidden')) {
            menu.classList.remove('open');
            menu.classList.add('close');
            setTimeout(() => {
                menu.classList.add('hidden');
            }, 300);
        }
    });

    document.querySelectorAll('#mobileMenu a').forEach(link => {
        link.addEventListener('click', function() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.remove('open');
            menu.classList.add('close');
            setTimeout(() => {
                menu.classList.add('hidden');
            }, 300);
        });
    });

    window.addEventListener('DOMContentLoaded', initializeLanguageSwitcher);
</script>
