<x-layouts.app>
    <title>Дома | Затвор Идризово</title>
    <main class="flex flex-col items-center">
        <section class="box-border w-full flex justify-center mb-12">
            <div style="background-image: url('images/about.jpeg');"
                class="flex flex-col justify-center items-center gap-8 bg-cover w-full bg-center relative py-2">

                <div class="w-[80%] flex flex-col gap-8 my-24">
                    <h1 class="text-6xl md:text-8xl text-[#0E1B2F] font-bold">КПУ</h1>
                    <h1 class="text-6xl md:text-8xl text-[#0E1B2F] font-bold">ИДРИЗОВО</h1>
                    <p class="font-bold text-lg text-[#0E1B2F]">Со отворено одделение Велес</p>
                    <a href="{{ route('about.index') }}">
                        <button
                            class="bg-[#2E589E] font-bold text-white text-lg rounded-lg px-12 py-3 min-w-fit cursor-pointer hover:-translate-y-0.5 hover:shadow-xl transition">
                            Повеќе за нас
                        </button>
                    </a>
                </div>
            </div>
        </section>

        <section class="box-border w-[80%] mx-auto flex flex-col justify-center items-center gap-4 my-12">
            <div class="w-full flex justify-between gap-4 items-center">
                <h1 class="font-bold text-3xl">Активности</h1>
                <a href="{{ route('activities.index') }}">
                    <button
                        class="self-start bg-[#2E589E] font-bold text-white text-lg rounded-xl px-6 py-2 min-w-fit cursor-pointer hover:-translate-y-0.5 hover:shadow-xl transition">
                        Прочитај повеќе
                    </button>
                </a>
            </div>

            <div
                class="w-full flex flex-row lg:grid lg:grid-cols-3 gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth touch-pan-x pb-4 my-10 lg:overflow-visible lg:snap-none">
                @foreach ($activities as $activity)
                    <a href="{{ route('activities.show', ['id' => $activity->id]) }}"
                        class="block min-w-[85%] sm:min-w-[70%] md:min-w-[60%] lg:min-w-0 lg:w-full h-full shrink-0 snap-start">

                        <div class="w-full h-[400px] bg-cover bg-center flex items-end rounded-4xl overflow-hidden"
                            style="background-image: url('{{ $activity->image_url }}');">

                            <div class="p-4 md:p-8 text-white space-y-3 md:space-y-6 w-full"
                                style="background: rgba(0,0,0,0.45); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
                                <div class="space-y-2 md:space-y-3">
                                    <h1 class="text-xl font-bold">{{ $activity->title }}</h1>
                                    @if (strlen($activity->description) > 30)
                                        <p class="text-base text-white">{{ substr($activity->description, 0, 30) }}...
                                        </p>
                                    @else
                                        <p class="text-base text-white">{{ $activity->description }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        <section class="box-border w-[80%] flex flex-col gap-4 my-12">
            <div class="w-full flex justify-between gap-4 items-center">
                <h1 class="font-bold text-3xl">Е-Весник</h1>
                @if ($pdfPath)
                    <a href="{{ $pdfPath }}" download
                        class="self-start bg-[#2E589E] font-bold text-white text-lg rounded-xl px-6 py-2 min-w-fit cursor-pointer hover:-translate-y-0.5 hover:shadow-xl transition">
                        Преземи Е-Весник
                    </a>
                @else
                    <span
                        class="self-start bg-[#9BB1D6] font-bold text-white text-lg rounded-xl px-6 py-2 min-w-fit inline-flex items-center justify-center">
                        Нема достапен е-вестник
                    </span>
                @endif
            </div>

            @if($pageOne || $pageTwo)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-10">
                    @if($pageOne)
                        <img src="{{ $pageOne }}" alt="Е-Весник страница 1" class="w-full rounded-3xl object-cover min-h-[320px] bg-[#f3f3f3]" />
                    @endif
                    @if($pageTwo)
                        <img src="{{ $pageTwo }}" alt="Е-Весник страница 2" class="w-full rounded-3xl object-cover min-h-[320px] bg-[#f3f3f3]" />
                    @endif
                </div>
            @endif
        </section>

        <section class="bg-figma-gradient box-border w-full py-20 my-12">
            <div class="box-border w-[80%] flex flex-col gap-10 mx-auto">

                <div class="w-full flex justify-between gap-4 items-center">
                    <h1 class="font-bold text-3xl">Новости и Соопштенија</h1>
                    <a href="{{ route('news.index') }}">
                        <button
                            class="self-start bg-[#2E589E] font-bold text-white text-lg rounded-xl px-6 py-2 min-w-fit cursor-pointer hover:-translate-y-0.5 hover:shadow-xl transition">
                            Прочитај повеќе
                        </button>
                    </a>
                </div>

                <h1 class="text-center text-2xl font-bold text-white">Нови Соопштенија</h1>

                <div
                    class="w-full flex flex-row lg:grid lg:grid-cols-3 gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth touch-pan-x pb-4 lg:overflow-visible lg:snap-none">
                    @foreach ($newNews as $news)
                        <div
                            class="bg-[#ADC3E7]/80 box-border min-w-[85%] sm:min-w-[70%] md:min-w-[60%] lg:min-w-0 lg:w-full h-100 p-6 flex flex-col gap-4 rounded-2xl backdrop-blur-xl border border-white text-white hover:-translate-y-0.5 hover:shadow-xl transition shrink-0 snap-start">
                            <h1 class="text-2xl font-bold underline">{{ $news->title }}</h1>
                            @if (strlen($news->description) > 30)
                                <p class="text-base text-white">{{ substr($news->description, 0, 30) }}...</p>
                            @else
                                <p class="text-base text-white">{{ $news->description }}</p>
                            @endif
                            <a class="mt-auto" href="{{ route('news.show', ['id' => $news->id]) }}">
                                <button
                                    class="self-start bg-[#0E1B2F] font-bold text-white text-lg rounded-lg px-6 py-2 min-w-fit cursor-pointer hover:-translate-y-0.5 hover:shadow-xl transition">
                                    Види повеќе
                                </button>
                            </a>
                        </div>
                    @endforeach
                </div>

                <h1 class="text-center text-2xl font-bold text-white">Постари Соопштенија</h1>

                <div
                    class="w-full flex flex-row lg:grid lg:grid-cols-3 gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth touch-pan-x pb-4 lg:overflow-visible lg:snap-none">
                    @foreach ($oldNews as $news)
                        <div
                            class="bg-[#ADC3E7]/80 box-border min-w-[85%] sm:min-w-[70%] md:min-w-[60%] lg:min-w-0 lg:w-full h-100 p-6 flex flex-col gap-4 rounded-2xl backdrop-blur-xl border border-white text-white hover:-translate-y-0.5 hover:shadow-xl transition shrink-0 snap-start">
                            <h1 class="text-2xl font-bold underline">{{ $news->title }}</h1>
                            @if (strlen($news->description) > 30)
                                <p class="text-base text-white">{{ substr($news->description, 0, 30) }}...</p>
                            @else
                                <p class="text-base text-white">{{ $news->description }}</p>
                            @endif
                            <a class="mt-auto" href="{{ route('news.show', ['id' => $news->id]) }}">
                                <button
                                    class="self-start bg-[#0E1B2F] font-bold text-white text-lg rounded-lg px-6 py-2 min-w-fit cursor-pointer hover:-translate-y-0.5 hover:shadow-xl transition">
                                    Види повеќе
                                </button>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="box-border w-[80%] flex flex-col gap-4 my-12">
            <div class="w-full flex justify-between gap-4 items-center">
                <h1 class="font-bold text-3xl">Рачни изработки</h1>
                <a href="{{ route('crafts.index') }}">
                    <button
                        class="self-start bg-[#2E589E] font-bold  text-white text-lg rounded-xl px-6 py-2 min-w-fit cursor-pointer hover:-translate-y-0.5 hover:shadow-xl transition">
                        Прочитај повеќе
                    </button>
                </a>
            </div>

            <div
                class="w-full flex flex-row lg:grid lg:grid-cols-3 gap-4 my-10 overflow-x-auto snap-x snap-mandatory scroll-smooth touch-pan-x pb-4 lg:overflow-visible lg:snap-none">
                @foreach ($products as $product)
                    <div class="min-w-[85%] sm:min-w-[70%] md:min-w-[60%] lg:min-w-0 lg:w-full h-100 bg-cover bg-center flex items-end rounded-4xl overflow-hidden md:overflow-visible shrink-0 md:shrink snap-start"
                        style="background-image: url('{{ $product->image_url }}');">
                        <div class="bg-black/50 rounded-4xl p-4 md:p-8 text-white space-y-3 md:space-y-6 w-full"
                            style="background: rgba(0,0,0,0.45); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
                            <div class="space-y-2 md:space-y-3">
                                <h1 class="text-xl font-bold">{{ $product->title }}</h1>
                                @if (strlen($product->description) > 30)
                                    <p class="text-base text-white">{{ substr($product->description, 0, 30) }}...</p>
                                @else
                                    <p class="text-base text-white">{{ $product->description }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

                <section class="box-border w-[80%] flex flex-col gap-4 my-12">
                    <div class="flex flex-col sm:flex-row justify-between gap-4 items-start sm:items-center">
                        <h1 class="font-bold text-3xl">Галерија</h1>
                        <p class="text-sm text-slate-600 max-w-2xl">
                            Избери категорија за да ги видиш најновите слики од нејзината галерија.
                        </p>
                    </div>

                    <div id="gallery-categories" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mt-6">
                        @foreach($galleries as $gallery)
                            @php $preview = $gallery->images->first(); @endphp
                            <button type="button"
                                data-gallery-id="{{ $gallery->id }}"
                                class="gallery-category-card group relative overflow-hidden rounded-[2rem] h-72 shadow-xl transition duration-300 ease-out border border-transparent focus:outline-none focus:ring-2 focus:ring-[#2E589E]"
                                {{ $loop->first ? 'aria-current=true' : '' }}>
                                @if($preview)
                                    <img src="{{ $preview->url }}"
                                        class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105" />
                                @else
                                    <div class="absolute inset-0 bg-slate-200"></div>
                                @endif

                                <div class="absolute inset-0 bg-black/30"></div>
                                <div class="relative z-10 flex h-full items-end p-6">
                                    <span class="w-full text-center text-white text-xl font-bold tracking-wide">
                                        {{ $gallery->title }}
                                    </span>
                                </div>
                            </button>
                        @endforeach
                    </div>

                    <div id="gallery-images" class="grid grid-cols-1 gap-6 mt-10">
                        @foreach($galleries as $gallery)
                            <div class="gallery-images-group" data-gallery-id="{{ $gallery->id }}" @if(! $loop->first) hidden @endif>
                                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
                                    @foreach($gallery->images as $image)
                                        <div class="rounded-[2rem] overflow-hidden bg-slate-100 shadow-lg transition duration-300 transform hover:scale-105">
                                            <div class="h-72 w-full bg-cover bg-center transition duration-500 hover:scale-105"
                                                style="background-image: url('{{ $image->url }}');">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <style>
                        .gallery-category-card {
                            min-height: 18rem;
                        }

                        .gallery-category-card[aria-current="true"] {
                            border-color: rgba(46, 88, 158, 0.8);
                        }
                    </style>

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const categoryButtons = document.querySelectorAll('[data-gallery-id]');
                            const galleryGroups = document.querySelectorAll('.gallery-images-group');

                            function setActiveGallery(id) {
                                categoryButtons.forEach((button) => {
                                    if (button.dataset.galleryId === id) {
                                        button.setAttribute('aria-current', 'true');
                                    } else {
                                        button.removeAttribute('aria-current');
                                    }
                                });

                                galleryGroups.forEach((group) => {
                                    group.hidden = group.dataset.galleryId !== id;
                                });
                            }

                            categoryButtons.forEach((button) => {
                                button.addEventListener('click', () => {
                                    setActiveGallery(button.dataset.galleryId);
                                });
                            });
                        });
                    </script>
                </section>

        <section class="box-border w-[80%] px-6 flex flex-wrap gap-6 justify-center items-center text-white my-12">
            <div class="flex flex-col items-center">
                <img src="{{ asset('icons/Gemini_Generated_Image_mncbfamncbfamncb (1) 1.png') }}"
                    class="size-70 object-cover" />
                <div
                    class="bg-[#6A92D4] box-border w-full h-48 rounded-xl p-6 flex flex-col items-center justify-center">
                    <h1 class="font-bold text-xl uppercase mb-2">
                        Регулатива
                    </h1>
                    <a class="underline cursor-pointer">Закони</a>
                    <a class="underline cursor-pointer">Правилници</a>
                    <a class="underline cursor-pointer">Упатство и протоколи</a>
                </div>
            </div>

            <div class="flex flex-col items-center">
                <img src="{{ asset('icons/Gemini_Generated_Image_2wsngo2wsngo2wsn (2) 1.png') }}"
                    class="size-70 object-cover" />
                <div
                    class="bg-[#6A92D4] box-border w-full h-48 rounded-xl p-6 flex flex-col items-center justify-center">
                    <h1 class="font-bold text-xl uppercase mb-2">
                        Ресурси
                    </h1>
                    <a class="underline cursor-pointer">Јавни набавки</a>
                    <a class="underline cursor-pointer">Буџет</a>
                    <a class="underline cursor-pointer">Извештаи</a>
                </div>
            </div>

            <div class="flex flex-col items-center">
                <img src="{{ asset('icons/Gemini_Generated_Image_g8opq7g8opq7g8op (1) 1.png') }}"
                    class="size-70 object-cover" />
                <div
                    class="bg-[#6A92D4] box-border w-full h-48 rounded-xl p-6 flex flex-col items-center justify-center">
                    <h1 class="font-bold text-xl uppercase mb-2">
                        Односи со јавноста
                    </h1>
                    <a class="underline cursor-pointer">Информации од јавен карактер</a>
                    <a class="underline cursor-pointer">Огласи</a>
                </div>
            </div>
        </section>

        <section class="box-border w-[80%] flex justify-center gap-6 px-6 my-12">
            <div
                class="box-border p-6 rounded-xl bg-[#0E1B2F] text-white font-bold w-90 flex flex-col md:flex-row justify-between items-center text-center">
                <h1 class="">Пријави корупција</h1>
                <h1>02 25 80 312</h1>
            </div>

            <div
                class="box-border p-6 rounded-xl bg-[#0E1B2F] text-white font-bold w-90 flex justify-between items-center text-center">
                <h1 class="">Годишен план за спречување на корупција</h1>
            </div>
        </section>
    </main>
</x-layouts.app>
