<x-layouts.app>
    <main class='overflow-x-hidden'>
        <div style="background-image: url('images/about/about_picture.png');"
            class="flex flex-col justify-center items-center gap-8 bg-cover w-full bg-center relative py-2">
            <div class="w-full text-center md:text-left">
                <h1
                    class="text-4xl md:text-5xl lg:text-8xl text-[#0E1B2F] md:pl-35 pt-16 md:pt-25 text-shadow-lg font-bold">
                    ЗА НАС</h1>
            </div>
            
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 w-full max-w-4xl px-4 pb-4 sm:px-0 md:mt-[25%]">
                <button onclick="switchTab('history')" id="btn-history"
                    class="tab-btn w-full md:w-auto bg-[#497ACA] font-semibold text-white py-2 px-8 sm:px-12 rounded-lg hover:scale-105 hover:bg-[#497ACA] duration-300 transition-all">ИСТОРИЈА</button>
                <button onclick="switchTab('mission')" id="btn-mission"
                    class="tab-btn w-full md:w-auto bg-[#2E589E] font-semibold text-white py-2 px-8 sm:px-12 rounded-lg hover:scale-105 hover:bg-[#497ACA] duration-300 transition-all">МИСИЈА</button>
                <button onclick="switchTab('vision')" id="btn-vision"
                    class="tab-btn w-full md:w-auto bg-[#2E589E] font-semibold text-white py-2 px-8 sm:px-12 rounded-lg hover:scale-105 hover:bg-[#497ACA] duration-300 transition-all">ВИЗИЈА</button>
            </div>
        </div>

        <div id="tab-history" class="tab-content flex flex-col md:flex-row w-full max-w-[1200px] mx-auto items-start mt-10 md:mt-16 gap-10 transition-all duration-500 px-4 sm:px-0">
            <div class="w-full md:w-1/2 flex flex-col gap-6 items-center md:items-start">
                <img src="{{ asset('images/about/history_picture1.png') }}" class="rounded-3xl shadow-2xl w-full sm:w-[90%] max-w-[600px]" alt="ИСТОРИЈА">
                <img id="history-extra-img" src="{{ asset('images/about/history_picture2.png') }}" class="hidden rounded-3xl shadow-2xl w-full sm:w-[90%] max-w-[600px]" alt="ИСТОРИЈА 2">
            </div>
            
            <div class="text-left w-full md:w-1/2">
                <h1 class="text-4xl font-bold">Историја</h1>
                <p class="mt-10 text-sm md:text-base line-clamp-8 md:line-clamp-none">
                    Казнено-Поправниот Дом Идризово е најголемата затворска установа во Република С. Македонија. Таа се
                    наоѓа околу 10 километри југоисточно од Скопје и претставува централна установа за издржување
                    затворски
                    казни.
                </p>
                <p class="hidden md:block mt-3">
                    Историјата на КПД Идризово започнува во текот на Втората светска војна, кога е изграден воен камп од
                    страна на бугарската окупаторска војска. Веднаш по завршувањето на Втората светска војна продолжува
                    да
                    функционира како затвор – работна колонија, каде што затворениците биле ангажирани во земјоделски и
                    градежни работи. Со текот на времето, установата се проширила и станала најголемиот затвор во
                    државата.
                </p>

                <div id="history-extra-text" class="hidden mt-3 space-y-3">
                    <p>Во 1970-тите и 1980-тите години започнало воведување на работилници и програми за
                        ресоцијализација на осудените лица. Тие се обучувале за различни занаети како дрводелство,
                        машинска обработка и земјоделие, со цел полесно вклучување во општеството по издржување на
                        казната.</p>
                    <p>По осамостојувањето на Македонија во 1991 година, КПД Идризово продолжила да функционира како
                        централна установа за лица осудени на подолги казни. Во соработка со Министерството за правда и
                        невладини организации, започнале да се спроведуваат образовни и психо-социјални програми,
                        насочени кон подобра ресоцијализација.</p>
                    <p>Во поновите години, јавноста често укажува на потребата од подобрување на условите за живот во
                        затворот и модернизација на објектите. Државата спроведува реформи за подобри стандарди, хуман
                        третман и професионализација на кадарот.</p>
                    <p>Денес, КПД Идризово има повеќе одделенија — затворено, полуотворено и отворено, како и посебна
                        здравствена служба која нуди и психолошка поддршка. И покрај предизвиците, установата останува
                        клучен дел од системот за извршување на санкции во Република С. Македонија.</p>
                </div>

                <button id="history-read-more-btn" onclick="toggleReadMore('history')"
                    class="font-bold underline text-lg mt-8 block cursor-pointer">Прочитај повеќе</button>
                <button id="history-show-less-btn" onclick="toggleReadMore('history')"
                    class="hidden font-bold underline text-lg mt-8 cursor-pointer">Покажи помалку</button>
            </div>
        </div>

        <div id="tab-mission" class="tab-content hidden flex flex-col md:flex-row w-full max-w-[1200px] mx-auto items-start mt-10 md:mt-16 gap-10 transition-all duration-500 px-4 sm:px-0">
            <div class="w-full md:w-1/2 flex flex-col gap-6 items-center md:items-start">
                <img src="{{ asset('images/about/mission_picture1.png') }}" class="rounded-3xl shadow-2xl w-full sm:w-[90%] max-w-[600px]" alt="МИСИЈА">
                <img id="mission-extra-img" src="{{ asset('images/about/mission_picture2.png') }}" class="hidden rounded-3xl shadow-2xl w-full sm:w-[90%] max-w-[600px]" alt="МИСИЈА 2">
            </div>

            <div class="text-left w-full md:w-1/2">
                <h1 class="text-4xl font-bold mb-6">Мисија</h1>
                <p class="mt-10 text-sm md:text-base line-clamp-8 md:line-clamp-none">Мисијата на Казнено-Поправниот Дом
                    Идризово е да обезбеди законито, безбедно и
                    хумано издржување на казните затвор и да придонесе кон ресоцијализација и успешна реинтеграција на
                    осудените лица во општеството.</p>
                <p class="mt-4 text-lg hidden md:block">Главната цел е осудените лица, преку различни програми, да ја
                    развијат
                    одговорноста, работните навики и почитта кон општествените норми, со што ќе се намали можноста
                    повторно да извршат кривични дела.</p>

                <div id="mission-extra-text" class="hidden mt-6 text-lg">
                    <p class="font-semibold mb-4">Главни задачи и насоки на мисијата:</p>
                    <ol class="list-decimal list-outside ml-6 space-y-4">
                        <li><span class="font-semibold">Безбедност и ред</span>
                            <ul class="list-disc list-outside ml-6 mt-2 space-y-1">
                                <li>Да се обезбеди сигурна и контролирана средина за сите затвореници и вработени.</li>
                                <li>Да се спречи бегство, насилство и недозволени активности.</li>
                            </ul>
                        </li>
                        <li><span class="font-semibold">Хуман третман на осудените</span>
                            <ul class="list-disc list-outside ml-6 mt-2 space-y-1">
                                <li>Почитување на човековите права и достоинството на секое лице.</li>
                                <li>Обезбедување на основни услови за живот, здравствена заштита и исхрана.</li>
                            </ul>
                        </li>
                        <li><span class="font-semibold">Ресоцијализација и рехабилитација</span>
                            <ul class="list-disc list-outside ml-6 mt-2 space-y-1">
                                <li>Преку редовни и специфични програми, образование, обуки и психолошка поддршка да се
                                    помогне на осудените да развијат позитивни ставови.</li>
                                <li>Вклучување во работни активности и образовни програми за стекнување на знаења и
                                    вештини.</li>
                            </ul>
                        </li>
                        <li><span class="font-semibold">Реинтеграција во заедницата</span>
                            <ul class="list-disc list-outside ml-6 mt-2 space-y-1">
                                <li>Подготовка на осудените лица за враќање во општеството и семејството по издржувањето
                                    на казната.</li>
                                <li>Соработка со институции и организации кои овозможуваат поддршка по излегувањето од
                                    затвор.</li>
                            </ul>
                        </li>
                        <li><span class="font-semibold">Професионален кадар</span>
                            <ul class="list-disc list-outside ml-6 mt-2 space-y-1">
                                <li>Обука и континуиран развој на затворскиот персонал за подобра ефикасност и човечка
                                    пристапност.</li>
                            </ul>
                        </li>
                    </ol>
                    <p class="mt-6">Со оваа мисија, КПУ Идризово има задача не само да казнува, туку и да
                        превоспитува, со цел лицата кои ќе излезат од затворот да станат полноправни и одговорни граѓани
                        на општеството.</p>
                </div>

                <button id="mission-read-more-btn" onclick="toggleReadMore('mission')"
                    class="font-bold underline text-lg mt-8 block cursor-pointer">Прочитај повеќе</button>
                <button id="mission-show-less-btn" onclick="toggleReadMore('mission')"
                    class="hidden font-bold underline text-lg mt-8 cursor-pointer">Покажи помалку</button>
            </div>
        </div>

        <div id="tab-vision" class="tab-content hidden flex flex-col md:flex-row w-full max-w-[1200px] mx-auto items-start mt-10 md:mt-16 gap-10 transition-all duration-500 px-4 sm:px-0">
            <div class="w-full md:w-1/2 flex flex-col gap-6 items-center md:items-start">
                <img src="{{ asset('images/about/vision_picture1.png') }}" class="rounded-3xl shadow-2xl w-full sm:w-[90%] max-w-[600px]" alt="ВИЗИЈА">
                <img id="vision-extra-img" src="{{ asset('images/about/vision_picture2.png') }}" class="hidden rounded-3xl shadow-2xl w-full sm:w-[90%] max-w-[600px]" alt="ВИЗИЈА 2">
            </div>

            <div class="text-left w-full md:w-1/2">
                <h1 class="text-4xl font-bold mb-6">Визија</h1>
                <p class="mt-4 text-lg">Визијата на Казнено-поправната установа Идризово е да се развие во современа,
                    хумана и ефикасна установа која обезбедува услови за целосна ресоцијализација и успешна
                    реинтеграција на осудените лица во општеството.</p>
                <p class="mt-4 text-lg">КПД Идризово се стреми да стане пример за модерен пенитенцијарен систем во кој
                    се почитуваат човековите права, достоинството и законитоста, а казната се спроведува на начин што
                    поттикнува промена, одговорност и општествено прифаќање.</p>

                <div id="vision-extra-text" class="hidden mt-6 text-lg">
                    <p class="font-semibold mb-4">Главни цели во визијата:</p>
                    <ol class="list-decimal list-outside ml-6 space-y-4">
                        <li><span class="font-semibold">Модернизација на инфраструктурата</span>
                            <ul class="list-disc list-outside ml-6 mt-2 space-y-1">
                                <li>Подобрување на условите за живот, сместување и здравствена грижа.</li>
                                <li>Изградба и обнова на објекти кои овозможуваат хуман третман и безбедна средина.</li>
                            </ul>
                        </li>
                        <li><span class="font-semibold">Подобрување на ресоцијализацијата</span>
                            <ul class="list-disc list-outside ml-6 mt-2 space-y-1">
                                <li>Развој на психо-социјални, образовни, културни и спортски програми.</li>
                                <li>Поттикнување на трудот и работните навики како дел од личниот развој на осудените.
                                </li>
                            </ul>
                        </li>
                        <li><span class="font-semibold">Професионален и обучен кадар</span>
                            <ul class="list-disc list-outside ml-6 mt-2 space-y-1">
                                <li>Континуирана едукација на вработените во насока на професионализазам, етика и почит
                                    кон човековите права.</li>
                            </ul>
                        </li>
                        <li><span class="font-semibold">Поголема транспарентност и соработка со заедницата</span>
                            <ul class="list-disc list-outside ml-6 mt-2 space-y-1">
                                <li>Воспоставување партнерства со институции, невладини организации и меѓународни
                                    организации за подобри практики и поддршка.</li>
                            </ul>
                        </li>
                        <li><span class="font-semibold">Намалување на рецидивизмот (повторно извршување на дела)</span>
                            <ul class="list-disc list-outside ml-6 mt-2 space-y-1">
                                <li>Со квалитетни програми за рехабилитација и помош по излегувањето од затвор, да се
                                    овозможи вистинска втора шанса.</li>
                            </ul>
                        </li>
                    </ol>
                    <p class="mt-6">Со оваа визија, КПД Идризово се стреми да биде установа која не само што ја
                        спроведува правдата, туку и ја гради човековата вредност и вербата во нов почеток.</p>
                </div>

                <button id="vision-read-more-btn" onclick="toggleReadMore('vision')"
                    class="font-bold underline text-lg mt-8 block cursor-pointer">Прочитај повеќе</button>
                <button id="vision-show-less-btn" onclick="toggleReadMore('vision')"
                    class="hidden font-bold underline text-lg mt-8 cursor-pointer">Покажи помалку</button>
            </div>
        </div>

        <div class="w-full max-w-[1200px] mx-auto mt-20 px-4 sm:px-6">
            <h1 class="text-4xl font-bold">Управа</h1>

            <div class="flex flex-col gap-8 mt-8 md:flex-row md:items-start">
                @foreach ($directors as $director)
                    <div class="w-full md:w-1/2 text-center">
                        <img src="{{ $director->image_url }}" class="w-full max-w-[360px] mx-auto rounded-2xl object-cover">
                        <h1 class="text-xl font-bold mt-4">{{ $director->name }}</h1>
                        <p class="text-sm">{{ $director->job_title }}</p>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-16">
                <h1 class="text-center text-4xl font-bold">Одговорни службени лица</h1>
                <div class="flex flex-wrap justify-center mt-10 gap-6">
                    @foreach ($employees as $employee)
                        <div class="w-full sm:w-[48%] lg:w-[30%] overflow-hidden rounded-2xl {{ isset($employee->image) ? 'bg-[#6A92D4]' : '' }}">
                            @if(isset($employee->image))
                                <img src="{{ $employee->image_url }}" alt="" class="w-full h-[260px] object-cover">
                            @endif
                            <div class="text-center bg-[#6A92D4] rounded-2xl p-5 shadow-lg text-white space-y-3">
                                <h1 class="text-lg font-bold mt-2">{{ $employee->name }}</h1>
                                <p class="text-sm font-semibold">{{ $employee->job_title }}</p>
                                <div class="flex space-x-1 justify-center items-center">
                                    <i class="fa-regular fa-envelope mt-1"></i>
                                    <a href="#" class="text-sm underline">{{ $employee->email }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mt-20 text-center w-full max-w-[1100px] mx-auto px-4 sm:px-6">
            <h1 class="text-4xl font-bold">ПРАВИЛНИК</h1>
            <h1 class="font-bold text-2xl w-full sm:w-3/4 mx-auto mt-5 mb-10">
                за внатрешна организација и работа на Казнено-поправната установа - Казнено-поправен дом Идризово со Отворено одделение во Велес
            </h1>
            <p class="text-lg block mb-12">
                Со овој Правилник се уредува организацијата и работата на Казнено-поправната установа -
                Казнено-поправниот
                дом Идризово - со отворено одделение во Велес (во понатамошниот текст: Установата), се утврдуав
                внатрешната
                организација, видот на организационите единици и нивниот депокруг на работење, раководење во Установата
                и во
                организационите единици, програмирањето и извршувањето на работите и задачите во установата.
            </p>
            <a href="#" class="inline-block font-semibold text-2xl bg-[#0E1B2F] text-white rounded-lg mt-5 py-3 px-10 sm:px-16 hover:-translate-y-0.5 hover:shadow-xl transition duration-300">ПРЕЗЕМИ</a>
        </div>

        <div class="bg-figma-gradient mb-24 pb-32 mt-20">
            <div class="w-full max-w-[1200px] mx-auto pt-16 px-4 sm:px-6">
                <h1 class="text-4xl font-bold text-white">Сектори</h1>

                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-8 mt-12 text-white">
                    <div class="rounded-3xl overflow-hidden bg-white/10 shadow-2xl border-2 border-white/30">
                        <img src="{{ asset('icons/solving a mental health problem.png') }}" class="w-full h-44 object-contain bg-transparent" alt="">
                        <div class="min-h-[18rem] flex flex-col justify-center p-5 bg-white/30 space-y-3">
                            <h1 class="text-2xl font-bold">СЕКТОР ЗА РЕСОЦИЈАЛИЗАЦИЈА</h1>
                            <p>1. Одделение за прием</p>
                            <p>2. Одделение за третман</p>
                            <p>3. Одделение за стручно инструкторски работи</p>
                        </div>
                    </div>
                    <div class="rounded-3xl overflow-hidden bg-white/10 shadow-2xl border-2 border-white/30">
                        <img src="{{ asset('icons/searching for a file in a folder.png') }}" class="w-full h-44 object-contain bg-transparent" alt="">
                        <div class="min-h-[18rem] flex flex-col justify-center p-5 bg-white/30 space-y-3">
                            <h1 class="text-2xl font-bold">СЕКТОР ЗА ОПШТИ-ПРАВНИ РАБОТИ И ЈАВНИ НАБАВКИ</h1>
                            <p>1. Одделение за општи-правни работи</p>
                            <p>2. Одделение за јавни набавки</p>
                        </div>
                    </div>
                    <div class="rounded-3xl overflow-hidden bg-white/10 shadow-2xl border-2 border-white/30">
                        <img src="{{ asset('icons/standardized test as method of assessment.png') }}" class="w-full h-44 object-contain bg-transparent" alt="">
                        <div class="min-h-[18rem] flex flex-col justify-center p-5 bg-white/30 space-y-3">
                            <h1 class="text-2xl font-bold">СЕКТОР ЗА ФИНАНСИСКИ ПРАШАЊА</h1>
                            <p>1. Одделение за буџетска координација и контрола</p>
                            <p>2. Одделение за сметководство и плаќање</p>
                        </div>
                    </div>
                    <div class="rounded-3xl overflow-hidden bg-white/10 shadow-2xl border-2 border-white/30">
                        <img src="{{ asset('icons/Project management, team work and idea generation.png') }}" class="w-full h-44 object-contain bg-transparent" alt="">
                        <div class="min-h-[18rem] flex flex-col justify-center p-5 bg-white/30 space-y-3 text-center">
                            <h1 class="text-2xl font-bold">ОДДЕЛЕНИЕ ЗА УПРАВУВАЊЕ СО ЧОВЕЧКИ РЕСУСРИ</h1>
                        </div>
                    </div>
                    <div class="rounded-3xl overflow-hidden bg-white/10 shadow-2xl border-2 border-white/30">
                        <img src="{{ asset('icons/Money saving with bank building, banknotes and dollar coins.png') }}" class="w-full h-44 object-contain bg-transparent" alt="">
                        <div class="min-h-[18rem] flex flex-col justify-center p-5 bg-white/30 space-y-3 text-center">
                            <h1 class="text-2xl font-bold">ОТВОРЕНО ОДДЕЛЕНИЕ ВЕЛЕС</h1>
                        </div>
                    </div>
                    <div class="rounded-3xl overflow-hidden bg-white/10 shadow-2xl border-2 border-white/30">
                        <img src="{{ asset('icons/Server hardware for data storage and processing.png') }}" class="w-full h-44 object-contain bg-transparent" alt="">
                        <div class="min-h-[18rem] flex flex-col justify-center p-5 bg-white/30 space-y-3 text-center">
                            <h1 class="text-2xl font-bold">СЕКТОР НА ЗАТВОРСКА ПОЛИЦИЈА</h1>
                        </div>
                    </div>







                    
                </div>
            </div>
        </div>
    </main>

    <script>
        // Logic for toggling History / Mission / Vision tabs
        function switchTab(tabName) {
            // 1. Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));

            // 2. Reset all buttons to default color (#2E589E)
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('bg-[#497ACA]');
                btn.classList.add('bg-[#2E589E]');
            });

            // 3. Show selected tab content
            document.getElementById('tab-' + tabName).classList.remove('hidden');

            // 4. Highlight the active button
            document.getElementById('btn-' + tabName).classList.remove('bg-[#2E589E]');
            document.getElementById('btn-' + tabName).classList.add('bg-[#497ACA]');
        }

        // Generic logic for "Прочитај повеќе" (Read more / Show less) mapped by section
        function toggleReadMore(section) {
            const extraText = document.getElementById(section + '-extra-text');
            const readMoreBtn = document.getElementById(section + '-read-more-btn');
            const showLessBtn = document.getElementById(section + '-show-less-btn');

            // Handle the extra image for each section
            const extraImg = document.getElementById(section + '-extra-img');
            if (extraImg) {
                extraImg.classList.toggle('hidden');
            }

            // Toggle text visibility
            extraText.classList.toggle('hidden');

            // Switch buttons
            if (extraText.classList.contains('hidden')) {
                readMoreBtn.classList.remove('hidden');
                showLessBtn.classList.add('hidden');
            } else {
                readMoreBtn.classList.add('hidden');
                showLessBtn.classList.remove('hidden');
            }
        }
    </script>
</x-layouts.app>
