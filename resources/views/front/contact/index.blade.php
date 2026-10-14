<x-layouts.app>
    <style>
        /* Custom Scrollbar for the Time Slots */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(30, 41, 59, 0.3);
            /* Transparent slate-800 */
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(71, 85, 105, 0.8);
            /* Slate-600 */
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(148, 163, 184, 1);
            /* Slate-400 on hover */
        }
    </style>

    <main>
        <div class="bg-figma-gradient flex items-center justify-center lg:p-4">
            <div
                class="w-full overflow-hidden px-2 py-4 md:py-0 md:p-10 lg:p-16 flex flex-col lg:flex-row gap-16 lg:gap-36">
                <div class="lg:w-2/4 flex flex-col text-center md:text-left pt-4 lg:pt-0 gap-6">
                    <h1 class="text-5xl text-center font-bold text-slate-800">Контакт</h1>

                    <p class="text-white leading-relaxed text-[19px]">
                        Доколку имате прашања, потреба од дополнителни информации или сакате
                        да закажете официјална посета, нашиот тим е тука за вас. Секогаш сме
                        достапни за да ви помогнеме околу процедурите, програмите за
                        ресоцијализација или административни прашања.
                    </p>

                    <div class="flex flex-col gap-5">
                        <a href="tel:+38922580312" class="hover:-translate-y-0.5 transition">
                            <p class="bg-white font-bold border border-white rounded-xl p-2 md:p-4">
                                <i class="fa-solid fa-phone-volume"></i> Телефонски број: 02 25 80 312
                            </p>
                        </a>
                        <a href="mailto:kpuidrizovo@kpuidrizovo.gov.mk" class="hover:-translate-y-0.5 transition">
                            <p class="bg-white font-bold border border-white rounded-xl p-2 md:p-4">
                                <i class="fa-solid fa-envelope"></i> Email: kpuidrizovo@kpuidrizovo.gov.mk
                            </p>
                        </a>
                        <p class="bg-white font-bold border border-white rounded-xl p-2 md:p-4">
                            <i class="fa-solid fa-location-dot"></i> Ул.1 Колонија Идризово бр. 4А
                        </p>
                    </div>

                    <div
                        class="mt-4 text-[20px] h-full bg-white backdrop-blur-sm p-8 rounded-2xl border border-white/40 shadow-inner">
                        <h3 class="text-center font-bold text-slate-800 my-4">Работно време</h3>
                        <ul class="text-center space-y-6">
                            <li>Lorem ipsum sed urna sapien ac quam.</li>
                            <li>Lorem ipsum sed urna sapien ac quam.</li>
                            <li>Lorem ipsum sed urna sapien ac quam.</li>
                            <li>Lorem ipsum sed urna sapien ac quam.</li>
                        </ul>
                    </div>
                </div>

                <div class="lg:w-1/2 bg-white rounded-[2.5rem] p-4 md:p-8 lg:p-6 shadow-xl">
                    <h2 class="text-2xl font-bold text-center text-slate-800 mb-8">Испрати порака</h2>

                    <form class="space-y-4" method="POST" action="{{ route('contact.submit') }}">
                        <input name="nameSurname" type="text" placeholder="Име и презиме"
                            class="w-full px-5 py-3 rounded-full placeholder-black border border-black focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-slate-300" />
                        <input type="tel" name="phone" placeholder="Телефонски број:"
                            class="w-full px-5 py-3 rounded-full placeholder-black border border-black focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-slate-300" />
                        <input type="email" name="email" placeholder="Email:"
                            class="w-full px-5 py-3 rounded-full placeholder-black border border-black focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-slate-300" />
                        <input type="text" name="relationship" placeholder="Family Relationship (семејна врска):"
                            class="w-full px-5 py-3 rounded-full placeholder-black border border-black focus:outline-none focus:ring-2 focus:ring-blue-400" />
                        <textarea name="message" placeholder="Остави порака.." rows="10"
                            class="w-full px-5 py-4 rounded-2xl placeholder-black border border-black focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-slate-300 resize-none"></textarea>

                        <div class="pt-2 flex justify-center">
                            <button type="submit"
                                class="bg-[#0f1c30] text-[19px] text-white px-16 py-3 rounded-xl font-bold hover:bg-slate-800 transition-colors">
                                Испрати
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @php
            // Check session for active visit
            $activeVisit = null;
            if (session()->has('active_visit_id')) {
                $activeVisit = \App\Models\Visit::find(session('active_visit_id'));
                // If visit was deleted by admin from db, clear the session
                if (!$activeVisit) {
                    session()->forget('active_visit_id');
                }
            }
        @endphp

        @if (!$activeVisit)
            <div>
                <h1 class="text-3xl md:text-5xl font-bold text-[#1a2b3c] text-center my-12 md:my-24">Закажи посета</h1>

                <div class="w-full mx-auto">
                    <div class="flex flex-wrap justify-center gap-6 lg:gap-8">
                        <div
                            class="w-[90%] lg:w-[30%] bg-[#7198d4] rounded-[2rem] p-6 lg:p-8 text-white flex flex-col items-center text-center shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <h2 class="text-xl lg:text-2xl font-bold mb-6 lg:mb-8">Преку телефон</h2>
                            <p class="text-base lg:text-lg opacity-90 mb-3 lg:mb-4">Понеделник-Четврток</p>
                            <div class="flex w-full mb-6 lg:mb-8">
                                <div class="flex-1">
                                    <p class="font-semibold mb-1 text-sm lg:text-base">Прва смена</p>
                                    <p class="text-sm lg:text-lg">08:30-10:30</p>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold mb-1 text-sm lg:text-base">Втора смена</p>
                                    <p class="text-sm lg:text-lg">14:00-18:00</p>
                                </div>
                            </div>
                            <p class="text-base lg:text-lg opacity-90 mb-2">Петок</p>
                            <p class="text-base lg:text-lg mb-6 lg:mb-12">8:30-18:00</p>
                            <div class="mt-auto w-full">
                                <a href="tel:022580365"
                                    class="bg-[#0f1c2e] text-base lg:text-lg hover:bg-black transition-colors py-3 px-4 lg:px-6 rounded-lg font-bold block w-full">
                                    02 25 80365
                                </a>
                            </div>
                        </div>

                        <div id="step-cards"
                            class="w-[90%] lg:w-[30%] bg-[#7198d4] rounded-[2rem] p-6 lg:p-8 text-white flex flex-col items-center text-center shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <h2 class="text-xl lg:text-2xl font-bold mb-6 lg:mb-8">Закажи Online</h2>
                            <p class="text-sm leading-relaxed mb-8 lg:mb-12 max-w-[200px]">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione est veniam similique
                                dolore dolor sunt, labore doloribus?
                            </p>
                            <div class="mt-auto w-full">
                                <button onclick="goToStep('calendar')"
                                    class="bg-[#0f1c2e] text-base lg:text-lg hover:bg-black transition-colors py-3 px-4 lg:px-6 rounded-lg font-bold block w-full">
                                    Кликни за календар
                                </button>
                            </div>
                        </div>

                        <div
                            class="w-[90%] lg:w-[30%] bg-[#7198d4] rounded-[2rem] p-6 lg:p-8 text-white flex flex-col items-center text-center shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <h2 class="text-xl lg:text-2xl font-bold mb-6 lg:mb-8 leading-tight">Преку<br />портирница
                            </h2>
                            <p class="text-base lg:text-lg opacity-90 mb-2">Понеделник-Четврток</p>
                            <p class="text-base lg:text-lg mb-6 lg:mb-8">13:00-14:00 часот</p>
                            <p class="text-base lg:text-lg opacity-90 mb-3 lg:mb-4">Сабота и недела</p>
                            <ul class="text-base lg:text-lg space-y-2 mb-6 lg:mb-8">
                                <li>1 Група: 08:30-09:30</li>
                                <li>2 Група: 10:30-11:30</li>
                                <li>3 Група: 12:30-13:30</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="step-calendar"
                    class="hidden-step max-w-2xl my-10 mx-auto bg-gray-200 rounded-[2.5rem] p-4 lg:p-12 shadow-inner fade-in">
                    <div class="bg-white rounded-3xl p-8 border-4 border-[#7198d4]">
                        <div class="flex justify-between items-center mb-8">
                            <button type="button" onclick="changeMonth(-1)"
                                class="text-2xl text-blue-900 hover:scale-110 transition-transform">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <h2 id="month-title"
                                class="text-3xl font-bold text-blue-900 border-b-4 border-blue-100 pb-2">
                                Јануари
                            </h2>
                            <button type="button" onclick="changeMonth(1)"
                                class="text-2xl text-blue-900 hover:scale-110 transition-transform">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                        <div class="grid grid-cols-7 gap-2 text-center" id="calendar-grid"></div>
                    </div>
                    <div class="mt-8 flex justify-end">
                        <button onclick="goToStep('cards')" class="text-slate-600 font-bold underline px-6 py-2">
                            Откажи
                        </button>
                    </div>
                </div>

                <div id="step-form"
                    class="hidden-step max-w-5xl my-12 mx-auto bg-slate-50 rounded-[2.5rem] border border-slate-200 shadow-2xl overflow-hidden fade-in font-sans">
                    <form class="flex flex-col lg:flex-row min-h-[550px]" method="POST"
                        action="{{ route('visits.store') }}">
                        @csrf
                        <input type="hidden" name="date" id="selected_date" value="">
                        <input type="hidden" name="time" id="selected_time" value="">

                        <div class="flex-1 p-8 lg:p-12 bg-white flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-100">
                                    <div>
                                        <h3 class="text-2xl font-extrabold text-slate-800">Податоци за посета</h3>
                                    </div>
                                    <button type="button" onclick="goToStep('calendar')"
                                        class="flex items-center gap-2 px-4 py-2 text-sm font-bold text-slate-600 bg-slate-100 hover:bg-blue-50 hover:text-blue-700 rounded-xl transition-all group">
                                        <i
                                            class="fas fa-arrow-left transition-transform group-hover:-translate-x-1"></i>
                                        Назад
                                    </button>
                                </div>

                                <div class="space-y-6">
                                    <div
                                        class="bg-blue-50 rounded-2xl p-4 border border-blue-200 flex items-center gap-3 shadow-sm">
                                        <input type="checkbox" id="has_children" name="has_children" value="1"
                                            class="w-6 h-6 rounded text-[#7198d4] focus:ring-blue-500 border-blue-300 cursor-pointer accent-[#7198d4]">
                                        <label for="has_children"
                                            class="font-bold text-blue-900 cursor-pointer select-none text-[17px]">
                                            Дали ќе присуствуваат деца?
                                        </label>
                                    </div>

                                    <div id="children-names-container"
                                        class="hidden group relative bg-white rounded-2xl p-4 border border-blue-300 focus-within:border-blue-500 focus-within:ring-4 focus-within:ring-blue-100 transition-all duration-300 shadow-sm">
                                        <label
                                            class="block text-xs font-black uppercase tracking-wider text-[#7198d4] mb-2">
                                            <i class="fas fa-child text-sm mr-1"></i> Име, презиме и возраст на децата
                                        </label>
                                        <textarea name="children_names" id="children_names_input" rows="2"
                                            placeholder="Внесете ги имињата и возраста (на пр. Марко 8, Ана 5)"
                                            class="w-full bg-transparent outline-none text-slate-800 placeholder-slate-400 font-medium resize-none text-[16px]"></textarea>
                                    </div>

                                    <div
                                        class="group relative bg-slate-50 hover:bg-white rounded-2xl p-4 border border-slate-200 hover:border-blue-400 focus-within:border-blue-500 focus-within:ring-4 focus-within:ring-blue-100 transition-all duration-300">
                                        <label
                                            class="block text-xs font-black uppercase tracking-wider text-slate-500 group-focus-within:text-[#7198d4] mb-2">
                                            <i class="fas fa-users text-sm mr-1"></i> Име и презиме на посетител(и)
                                        </label>
                                        <textarea name="visitors" rows="3" placeholder="Внесете целосни имиња (на пр. Петар Петровски...)"
                                            class="w-full bg-transparent outline-none text-slate-800 placeholder-slate-400 font-medium resize-none text-[16px]"
                                            required></textarea>
                                    </div>

                                    <div
                                        class="group relative bg-slate-50 hover:bg-white rounded-2xl p-4 border border-slate-200 hover:border-blue-400 focus-within:border-blue-500 focus-within:ring-4 focus-within:ring-blue-100 transition-all duration-300">
                                        <label
                                            class="block text-xs font-black uppercase tracking-wider text-slate-500 group-focus-within:text-blue-600 mb-2">
                                            <i class="fas fa-phone text-sm mr-1"></i> Телефонски број
                                        </label>
                                        <input type="tel" name="phone"
                                            placeholder="Внесете телефонски број (на пр. 070 123 456)"
                                            class="w-full bg-transparent outline-none text-slate-800 placeholder-slate-400 font-medium text-[16px]"
                                            required />
                                    </div>

                                    <div
                                        class="group relative bg-slate-50 hover:bg-white rounded-2xl p-4 border border-slate-200 hover:border-blue-400 focus-within:border-blue-500 focus-within:ring-4 focus-within:ring-blue-100 transition-all duration-300">
                                        <label
                                            class="block text-xs font-black uppercase tracking-wider text-slate-500 group-focus-within:text-[#7198d4] mb-2">
                                            <i class="fas fa-id-card text-sm mr-1"></i> Број на затвореник
                                        </label>
                                        <input type="text" name="prisoner_num"
                                            placeholder="Внесете ID број на затвореникот (на пр. 12345)"
                                            class="w-full bg-transparent outline-none text-slate-800 placeholder-slate-400 font-medium text-[16px]"
                                            required />
                                    </div>
                                    <div
                                        class="bg-slate-50 hover:bg-white rounded-2xl p-5 border border-slate-200 transition-all duration-300">
                                        <label
                                            class="block text-xs font-black uppercase tracking-wider text-slate-500 mb-3">
                                            <i class="fas fa-box-open text-sm mr-1"></i> Пријава на предмети (Што
                                            носите со вас?)
                                        </label>
                                        <p class="text-xs text-slate-400 mb-4">Означете ги работите кои планирате да ги
                                            внесете. Ова го забрзува процесот на безбедносна проверка.</p>

                                        <div class="grid grid-cols-2 lg:grid-cols-3 gap-3">
                                            <label
                                                class="flex items-center gap-3 p-3 bg-white border border-slate-200 rounded-xl cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition-all">
                                                <input type="checkbox" name="declared_items[]"
                                                    value="Облека (Clothing)"
                                                    class="w-5 h-5 text-[#7198d4] rounded border-slate-300 focus:ring-blue-500 accent-[#7198d4]">
                                                <span class="text-sm font-bold text-slate-700">Облека</span>
                                            </label>

                                            <label
                                                class="flex items-center gap-3 p-3 bg-white border border-slate-200 rounded-xl cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition-all">
                                                <input type="checkbox" name="declared_items[]" value="Храна (Food)"
                                                    class="w-5 h-5 text-[#7198d4] rounded border-slate-300 focus:ring-blue-500 accent-[#7198d4]">
                                                <span class="text-sm font-bold text-slate-700">Храна</span>
                                            </label>

                                            <label
                                                class="flex items-center gap-3 p-3 bg-white border border-slate-200 rounded-xl cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition-all">
                                                <input type="checkbox" name="declared_items[]" value="Пари (Money)"
                                                    class="w-5 h-5 text-[#7198d4] rounded border-slate-300 focus:ring-blue-500 accent-[#7198d4]">
                                                <span class="text-sm font-bold text-slate-700">Пари</span>
                                            </label>

                                            <label
                                                class="flex items-center gap-3 p-3 bg-white border border-slate-200 rounded-xl cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition-all">
                                                <input type="checkbox" name="declared_items[]"
                                                    value="Лекови (Medication)"
                                                    class="w-5 h-5 text-[#7198d4] rounded border-slate-300 focus:ring-blue-500 accent-[#7198d4]">
                                                <span class="text-sm font-bold text-slate-700">Лекови <br><span
                                                        class="text-[10px] font-normal text-red-500">со
                                                        потврда</span></span>
                                            </label>

                                            <label
                                                class="flex items-center gap-3 p-3 bg-white border border-slate-200 rounded-xl cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition-all">
                                                <input type="checkbox" name="declared_items[]"
                                                    value="Книги/Списанија"
                                                    class="w-5 h-5 text-[#7198d4] rounded border-slate-300 focus:ring-blue-500 accent-[#7198d4]">
                                                <span class="text-sm font-bold text-slate-700">Книги</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="text-xs text-slate-400 mt-6 lg:mt-0">
                                <i class="fas fa-info-circle mr-1 text-blue-500"></i> Ве молиме проверете ги внесените
                                податоци пред да го потврдите терминот.
                            </p>
                        </div>

                        <div
                            class="flex-1 p-8 lg:p-12 bg-slate-900 text-white flex flex-col justify-between border-t lg:border-t-0 lg:border-l border-slate-800">

                            <div class="flex flex-col flex-1 min-h-0">
                                <div>
                                    <span
                                        class="text-xs font-bold uppercase tracking-wider text-blue-400 block mb-1">Достапни
                                        часови</span>
                                    <h3 class="text-2xl font-extrabold text-white mb-6">Изберете термин</h3>
                                </div>

                                <div id="dynamic-slots-container"
                                    class="flex flex-col gap-3 flex-1 overflow-y-auto pr-2 custom-scrollbar pb-4">
                                    <div class="col-span-full py-8 text-center text-slate-400">
                                        <i class="far fa-calendar-alt text-3xl mb-2 block text-slate-600"></i>
                                        Изберете датум од календарот за да се прикажат термини.
                                    </div>
                                </div>
                            </div>

                            <div
                                class="mt-4 pt-6 border-t border-slate-800 flex flex-col sm:flex-row gap-4 items-center justify-between">
                                <button type="button" onclick="goToStep('calendar')"
                                    class="w-full sm:w-auto text-sm text-slate-400 hover:text-white font-bold underline transition-colors order-2 sm:order-1">
                                    <i class="fas fa-chevron-left mr-1"></i> Избери друг датум
                                </button>
                                <button type="submit"
                                    class="w-full sm:w-auto bg-[#7198d4] hover:bg-[#2E589E] active:scale-95 text-white py-4 px-8 rounded-2xl font-bold text-lg shadow-lg shadow-blue-900/30 transition-all order-1 sm:order-2 flex items-center justify-center gap-2">
                                    Закажи термин <i class="fas fa-check-circle"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div
                class="max-w-2xl mx-auto my-24 bg-white rounded-3xl shadow-xl border-t-8 border-[#7198d4] p-8 lg:p-12 text-center">
                <div
                    class="w-20 h-20 bg-green-100 text-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-check text-4xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-slate-800 mb-2">Имате закажано посета</h2>
                <p class="text-slate-500 mb-8">Вашиот термин е успешно зачуван во нашиот систем.</p>

                <div class="bg-slate-50 rounded-2xl p-6 text-left mb-8 space-y-4 border border-slate-100">
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-slate-500 font-bold">Датум:</span>
                        <span
                            class="text-slate-800 font-bold">{{ \Carbon\Carbon::parse($activeVisit->date)->format('d.m.Y') }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-slate-500 font-bold">Време:</span>
                        <span class="text-slate-800 font-bold">{{ $activeVisit->time }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-slate-500 font-bold">Код за потврда:</span>
                        <span
                            class="text-[#7198d4] font-extrabold text-xl tracking-widest">{{ $activeVisit->visit_code }}</span>
                    </div>
                </div>

                @php
                    $canCancel = \Carbon\Carbon::parse($activeVisit->date)
                        ->startOfDay()
                        ->greaterThan(\Carbon\Carbon::now()->startOfDay());
                @endphp

                @if ($canCancel)
                    <form id="cancel-visit-form" method="POST" action="{{ route('visits.cancel') }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="openConfirmCancelModal()"
                            class="text-red-500 hover:text-red-700 font-bold underline transition-colors">
                            Откажи ја посетата
                        </button>
                    </form>
                @else
                    <p class="text-xs text-slate-400">
                        <i class="fas fa-info-circle"></i> Посетата повеќе не може да се откаже (дозволено е само до
                        ден пред терминот).
                    </p>
                @endif
            </div>
        @endif

        <div class="mb-12 md:mb-60">
            <h1 class="text-5xl font-bold text-[#1a2b3c] text-center my-12 md:my-24">Мапа</h1>
            <div class="flex justify-center">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2966.9824089331755!2d21.5638037982921!3d41.95771288930311!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13543f300cf6f5ab%3A0xc775d2423b8cd12c!2z0JrQn9CjINCY0LTRgNC40LfQvtCy0L4gLSDQodC60L7Qv9GY0LU!5e0!3m2!1smk!2smk!4v1777500128529!5m2!1smk!2smk"
                    width="1620" height="900" style="border: 0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <button
            class="fixed bottom-10 right-10 w-14 h-14 bg-[#2b5a97] text-white rounded-full flex items-center justify-center shadow-lg hover:bg-blue-800 transition-all">
            <i class="fas fa-arrow-up text-xl"></i>
        </button>

        @if (session('success_booking'))
            <div id="success-modal"
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm p-4">
                <div
                    class="bg-[#7198d4] w-full max-w-2xl rounded-3xl p-8 lg:p-12 shadow-2xl relative text-white text-center transform transition-all scale-100">
                    <h2 class="text-3xl lg:text-4xl font-bold mb-4">Успешно закажавте термин за посета</h2>
                    <p class="text-lg opacity-90 mb-8">Ве молиме зачувајте го вашиот единствен 5-цифрен код. Ќе ви биде
                        потребен при посетата.</p>

                    <div class="bg-white/20 backdrop-blur-md rounded-2xl py-6 mb-8 border border-white/30">
                        <p class="text-sm uppercase tracking-widest font-bold opacity-80 mb-2">Вашиот код</p>
                        <p class="text-6xl font-black tracking-[0.2em]">{{ session('visit_code') }}</p>
                    </div>

                    <div class="flex items-center justify-center gap-3 mb-8 text-left bg-black/10 p-4 rounded-xl">
                        <input type="checkbox" id="saved-code-checkbox"
                            class="w-6 h-6 rounded text-blue-900 focus:ring-blue-900 border-white cursor-pointer accent-[#0f1c2e]">
                        <label for="saved-code-checkbox" class="font-bold cursor-pointer text-lg">
                            Го запишав / зачував кодот
                        </label>
                    </div>

                    <button id="close-modal-btn" disabled
                        class="bg-slate-300 text-slate-500 py-4 px-12 rounded-xl font-bold text-xl cursor-not-allowed transition-all duration-300 w-full lg:w-auto">
                        Затвори
                    </button>
                </div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const checkbox = document.getElementById("saved-code-checkbox");
                    const closeBtn = document.getElementById("close-modal-btn");
                    const modal = document.getElementById("success-modal");

                    checkbox.addEventListener("change", function() {
                        if (this.checked) {
                            closeBtn.disabled = false;
                            closeBtn.classList.remove("bg-slate-300", "text-slate-500", "cursor-not-allowed");
                            closeBtn.classList.add("bg-[#0f1c2e]", "text-white", "hover:bg-black",
                                "cursor-pointer");
                        } else {
                            closeBtn.disabled = true;
                            closeBtn.classList.add("bg-slate-300", "text-slate-500", "cursor-not-allowed");
                            closeBtn.classList.remove("bg-[#0f1c2e]", "text-white", "hover:bg-black",
                                "cursor-pointer");
                        }
                    });

                    closeBtn.addEventListener("click", function() {
                        if (!this.disabled) {
                            modal.style.opacity = "0";
                            setTimeout(() => {
                                modal.remove();
                            }, 300);
                        }
                    });
                });
            </script>
        @endif

        @if (session('cancel_success'))
            <div id="cancel-success-modal"
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm p-4">
                <div
                    class="bg-[#7198d4] w-full max-w-2xl rounded-3xl p-8 lg:p-12 shadow-2xl relative text-white text-center transform transition-all scale-100 border-4 border-white/20">
                    <div
                        class="w-24 h-24 bg-white/20 text-white rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-calendar-times text-5xl"></i>
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-bold mb-4">Посетата е откажана</h2>
                    <p class="text-lg opacity-90 mb-8">{{ session('cancel_success') }}</p>

                    <button onclick="document.getElementById('cancel-success-modal').remove()"
                        class="bg-[#0f1c2e] text-white hover:bg-black py-4 px-12 rounded-xl font-bold text-xl transition-all duration-300 w-full lg:w-auto">
                        Во ред
                    </button>
                </div>
            </div>
        @endif

        @if ($activeVisit)
            <div id="confirm-cancel-modal"
                class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm p-4">
                <div
                    class="bg-[#7198d4] w-full max-w-lg rounded-3xl p-8 lg:p-10 shadow-2xl relative text-white text-center transform transition-all scale-100 border-4 border-white/20">
                    <div
                        class="w-24 h-24 bg-white/20 text-white rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-question text-5xl"></i>
                    </div>

                    <h2 class="text-3xl font-bold mb-4">Потврда</h2>
                    <p class="text-lg opacity-90 mb-8">Дали сте сигурни дека сакате да ја откажете вашата посета? Оваа
                        акција е неповратна.</p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <button onclick="closeConfirmCancelModal()"
                            class="bg-slate-300 text-slate-700 hover:bg-white py-3 px-8 rounded-xl font-bold text-lg transition-all w-full sm:w-auto">
                            Назад
                        </button>
                        <button onclick="submitCancelForm()"
                            class="bg-[#0f1c2e] text-white hover:bg-black py-3 px-8 rounded-xl font-bold text-lg shadow-lg transition-all w-full sm:w-auto">
                            Да, откажи
                        </button>
                    </div>
                </div>
            </div>
        @endif

        <script>
            // --- Modal Functions ---
            function openConfirmCancelModal() {
                const modal = document.getElementById("confirm-cancel-modal");
                if (modal) modal.classList.remove("hidden");
            }

            function closeConfirmCancelModal() {
                const modal = document.getElementById("confirm-cancel-modal");
                if (modal) modal.classList.add("hidden");
            }

            function submitCancelForm() {
                const form = document.getElementById("cancel-visit-form");
                if (form) form.submit();
            }

            // --- Calendar Navigation ---
            function goToStep(stepId) {
                document.getElementById("step-calendar").classList.add("hidden-step");
                document.getElementById("step-form").classList.add("hidden-step");

                const targetElement = document.getElementById("step-" + stepId);
                if (targetElement) {
                    targetElement.classList.remove("hidden-step");
                    setTimeout(() => {
                        targetElement.scrollIntoView({
                            behavior: "smooth",
                            block: "center"
                        });
                    }, 50);
                }
            }

            // --- Core Calendar Logic ---
            const grid = document.getElementById("calendar-grid");

            if (grid) {
                const monthTitle = document.getElementById("month-title");
                const days = ["Пон", "Вто", "Сре", "Чет", "Пет", "Саб", "Нед"];
                const months = [
                    "Јануари", "Февруари", "Март", "Април", "Мај", "Јуни",
                    "Јули", "Август", "Септември", "Октомври", "Ноември", "Декември"
                ];

                let currentDate = new Date();

                window.changeMonth = function(offset) {
                    currentDate.setMonth(currentDate.getMonth() + offset);
                    renderCalendar(currentDate);
                }

                function renderCalendar(date) {
                    grid.innerHTML = "";

                    const year = date.getFullYear();
                    const month = date.getMonth();
                    monthTitle.innerText = `${months[month]} ${year}`;

                    const today = new Date();
                    today.setHours(0, 0, 0, 0);

                    days.forEach((d) => {
                        const el = document.createElement("div");
                        el.className = "text-xs font-bold text-gray-400 mb-4";
                        el.innerText = d;
                        grid.appendChild(el);
                    });

                    let firstDay = new Date(year, month, 1).getDay();
                    firstDay = firstDay === 0 ? 6 : firstDay - 1;

                    const daysInMonth = new Date(year, month + 1, 0).getDate();

                    for (let i = 0; i < firstDay; i++) {
                        grid.appendChild(document.createElement("div"));
                    }

                    for (let i = 1; i <= daysInMonth; i++) {
                        const btn = document.createElement("button");
                        btn.type = "button";

                        const buttonDate = new Date(year, month, i);
                        buttonDate.setHours(0, 0, 0, 0);

                        if (buttonDate <= today) {
                            btn.className =
                                "aspect-square flex items-center justify-center text-xl font-semibold rounded-xl bg-gray-200 text-gray-400 cursor-not-allowed opacity-50";
                            btn.innerText = i;
                        } else {
                            btn.className =
                                "aspect-square flex items-center justify-center text-xl font-semibold rounded-xl hover:bg-blue-100 transition-all text-slate-700 cursor-pointer";
                            btn.innerText = i;

                            const fullDateString =
                                `${year}-${String(month + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
                            btn.onclick = () => selectDate(fullDateString);
                        }

                        grid.appendChild(btn);
                    }
                }

                window.selectDate = async function(dateString) {
                    goToStep("form");

                    document.getElementById('selected_date').value = dateString;
                    document.getElementById('selected_time').value = "";

                    const slotsContainer = document.getElementById("dynamic-slots-container");
                    slotsContainer.innerHTML = "<p>Се вчитуваат термини...</p>";

                    try {
                        const response = await fetch(`/api/available-slots?date=${dateString}`);
                        const slots = await response.json();

                        slotsContainer.innerHTML = "";

                        if (slots.length === 0) {
                            slotsContainer.innerHTML =
                                "<p class='text-red-500'>Нема слободни термини за овој датум.</p>";
                            return;
                        }

                        slots.forEach(slot => {
                            const wrapper = document.createElement("div");
                            wrapper.className = "relative group";

                            const btn = document.createElement("button");
                            btn.type = "button";
                            btn.className =
                                "time-slot w-full text-left p-4 rounded-2xl bg-slate-800/60 hover:bg-slate-800 border-2 border-slate-700/50 hover:border-blue-500 transition-all duration-200 flex flex-col justify-between h-24";

                            const timeInfo = document.createElement("span");
                            timeInfo.className = "text-lg font-bold text-white tracking-wide";
                            timeInfo.innerHTML =
                                `<i class="far fa-clock text-blue-400 mr-1.5 text-sm"></i>${slot.time}`;

                            const spotsInfo = document.createElement("span");
                            spotsInfo.className =
                                "text-xs px-2.5 py-1 rounded-lg font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 inline-block mt-1";
                            spotsInfo.innerText = `${slot.available_spots} слободни`;

                            btn.appendChild(timeInfo);
                            btn.appendChild(spotsInfo);

                            btn.onclick = function(e) {
                                e.preventDefault();
                                document.querySelectorAll(".time-slot").forEach((b) => {
                                    b.classList.remove("border-blue-500", "bg-[#7198d4]/20",
                                        "ring-4", "ring-blue-500/20");
                                    b.classList.add("border-slate-700/50", "bg-slate-800/60");
                                });

                                this.classList.remove("border-slate-700/50", "bg-slate-800/60");
                                this.classList.add("border-blue-500", "bg-[#7198d4]/20", "ring-4",
                                    "ring-blue-500/20");

                                document.getElementById('selected_time').value = slot.time;
                            };

                            wrapper.appendChild(btn);
                            slotsContainer.appendChild(wrapper);
                        });
                    } catch (error) {
                        console.error("Error fetching slots:", error);
                        slotsContainer.innerHTML = "<p class='text-red-500'>Грешка при вчитување на термините.</p>";
                    }
                }

                renderCalendar(currentDate);
            }

            // --- Children Checkbox Toggle Logic ---
            document.addEventListener("DOMContentLoaded", function() {
                const hasChildrenCheckbox = document.getElementById("has_children");
                const childrenNamesContainer = document.getElementById("children-names-container");
                const childrenNamesInput = document.getElementById("children_names_input");

                if (hasChildrenCheckbox && childrenNamesContainer && childrenNamesInput) {
                    hasChildrenCheckbox.addEventListener("change", function() {
                        if (this.checked) {
                            // Show the box and make it required
                            childrenNamesContainer.classList.remove("hidden");
                            childrenNamesInput.required = true;
                        } else {
                            // Hide the box, remove requirement, and clear the text
                            childrenNamesContainer.classList.add("hidden");
                            childrenNamesInput.required = false;
                            childrenNamesInput.value = "";
                        }
                    });
                }
            });
        </script>
    </main>
</x-layouts.app>
