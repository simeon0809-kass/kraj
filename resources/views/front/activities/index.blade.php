<x-layouts.app>
    @if (!empty($newestActivity) && count($newestActivity) > 0)
        <main id="main" class="py-20 px-10 md:py-40 md:px-25 flex items-center bg-cover bg-center w-full"
            style="background-image: url('{{ $newestActivity->first()->image_url }}');">
            <div class="text-center md:text-left md:w-[50%] lg:w-[40%] space-y-10">
                <div class="space-y-2">
                    <h2 class="font-bold text-white text-xl">Најнова активност</h2>
                    <div class="space-y-8">
                        <h1 class="font-bold text-8xl text-white">{{ $newestActivity->first()->title }}</h1>
                        @if (strlen($newestActivity->first()->description) > 150)
                            <p class="text-base text-white">
                                {{ substr($newestActivity->first()->description, 0, 150) }}...</p>
                        @else
                            <p class="text-base text-white">{{ $newestActivity->first()->description }}</p>
                        @endif
                    </div>
                </div>
                <a href="{{ route('activities.show', ['id' => $newestActivity->first()->id]) }}"
                    class="bg-[#2E589E] text-white py-2 px-5 font-bold rounded-lg hover:scale-110 md:hover:scale-120 shadow-black hover:shadow-[#9BB1D6] duration-300 transition hover:text-[#1A335C] hover:bg-[#ABC5F1]">
                    Прочитај повеќе
                </a>
            </div>
        </main>
    @else
        <div class="flex items-center justify-center py-20">
            <p class="text-2xl text-gray-500">Моментално нема активности</p>
        </div>
    @endif

    <section id="most-read" class="w-full px-10 md:px-25 py-15 space-y-10">
        <h1 class="text-3xl font-bold">Најчитани активности</h1>

        @if (!empty($mostReadActivities) && count($mostReadActivities) > 0)
            <div class="flex flex-col md:flex-row gap-8 md:gap-5">
                <div class="hidden md:flex md:w-[50%] bg-cover bg-center h-96 md:h-150 items-end rounded-4xl shrink-0 md:shrink overflow-hidden md:overflow-visible"
                    style="background-image: url('{{ $mostReadActivities->first()->image_url }}');">
                    <div class="bg-black/50 rounded-4xl p-4 md:p-8 text-white space-y-3 md:space-y-6 w-full"
                        style="background: rgba(0,0,0,0.45); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
                        <div class="space-y-2 md:space-y-3">
                            <h1 class="text-xl font-bold underline">{{ $mostReadActivities->first()->title }}</h1>
                            @if (strlen($mostReadActivities->first()->description) > 150)
                                <p class="text-base text-white">
                                    {{ substr($mostReadActivities->first()->description, 0, 150) }}...</p>
                            @else
                                <p class="text-base text-white">{{ $mostReadActivities->first()->description }}</p>
                            @endif
                        </div>
                        <a href="{{ route('activities.show', ['id' => $mostReadActivities->first()->id]) }}"
                            class="text-sm underline">Прочитај повеќе</a>
                    </div>
                </div>

                <div id="carousel-most-read"
                    class="md:w-[50%] md:h-150 h-full flex flex-row md:grid md:grid-cols-2 md:auto-rows-fr gap-8 md:gap-5 shrink-0 md:shrink overflow-x-auto md:overflow-visible pb-2 md:pb-0 snap-x snap-mandatory md:snap-none scroll-smooth overscroll-x-contain md:overscroll-auto"
                    style="scrollbar-width: none;">
                    <div class="md:hidden w-[85%] sm:w-[70%] h-96 bg-cover bg-center flex items-end rounded-4xl overflow-hidden shrink-0 snap-center"
                        style="background-image: url('{{ $mostReadActivities->first()->image_url }}');">
                        <div class="bg-black/50 rounded-4xl p-4 text-white space-y-3 w-full"
                            style="background: rgba(0,0,0,0.45); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
                            <div class="space-y-2">
                                <h1 class="text-xl font-bold underline">{{ $mostReadActivities->first()->title }}</h1>
                                @if (strlen($mostReadActivities->first()->description) > 150)
                                    <p class="text-xs leading-snug">
                                        {{ substr($mostReadActivities->first()->description, 0, 150) }}...</p>
                                @else
                                    <p class="text-xs leading-snug">{{ $mostReadActivities->first()->description }}</p>
                                @endif
                            </div>
                            <a href="{{ route('activities.show', ['id' => $mostReadActivities->first()->id]) }}"
                                class="text-sm underline">Прочитај повеќе</a>
                        </div>
                    </div>

                    @foreach ($mostReadActivities->slice(1) as $activity)
                        <div class="w-[85%] sm:w-[70%] md:w-auto h-96 md:h-auto bg-cover bg-center flex items-end rounded-4xl overflow-hidden md:overflow-visible shrink-0 md:shrink snap-center"
                            style="background-image: url('{{ $activity->image_url }}');">
                            <div class="bg-black/50 rounded-4xl p-4 md:p-8 text-white space-y-3 md:space-y-6 w-full"
                                style="background: rgba(0,0,0,0.45); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
                                <div class="space-y-2 md:space-y-3">
                                    <h1 class="text-xl font-bold">{{ $activity->title }}</h1>
                                    @if (strlen($activity->description) > 150)
                                        <p class="text-base text-white">{{ substr($activity->description, 0, 150) }}...
                                        </p>
                                    @else
                                        <p class="text-base text-white">{{ $activity->description }}</p>
                                    @endif
                                </div>
                                <a href="{{ route('activities.show', ['id' => $activity->id]) }}"
                                    class="text-sm underline">Прочитај повеќе</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="dots-most-read" class="dot-indicator flex">
                <div class="dot active"></div>
                @for ($i = 1; $i < count($mostReadActivities); $i++)
                    <div class="dot"></div>
                @endfor
            </div>
        @else
            <div class="flex items-center justify-center py-20">
                <p class="text-2xl text-gray-500">Моментално нема активности</p>
            </div>
        @endif
    </section>

    <section id="other" class="w-full px-10 md:px-25 py-15 space-y-10">
        <h1 class="text-3xl font-bold">Останати активности</h1>

        @if (!empty($otherActivities) && count($otherActivities) > 0)
            <div class="flex flex-col md:flex-row-reverse gap-8 md:gap-5">
                <div class="hidden md:flex md:w-[50%] bg-cover bg-center h-96 md:h-150 items-end rounded-4xl shrink-0 md:shrink overflow-hidden md:overflow-visible"
                    style="background-image: url('{{ $otherActivities->first()->image_url }}');">
                    <div class="bg-black/50 rounded-4xl p-4 md:p-8 text-white space-y-3 md:space-y-6 w-full"
                        style="background: rgba(0,0,0,0.45); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
                        <div class="space-y-2 md:space-y-3">
                            <h1 class="text-xl font-bold underline">{{ $otherActivities->first()->title }}</h1>
                            @if (strlen($otherActivities->first()->description) > 150)
                                <p class="text-base text-white">
                                    {{ substr($otherActivities->first()->description, 0, 150) }}...</p>
                            @else
                                <p class="text-base text-white">{{ $otherActivities->first()->description }}</p>
                            @endif
                        </div>
                        <a href="{{ route('activities.show', ['id' => $otherActivities->first()->id]) }}"
                            class="text-sm underline">Прочитај повеќе</a>
                    </div>
                </div>

                <div id="carousel-other"
                    class="md:w-[50%] md:h-150 h-full flex flex-row md:grid md:grid-cols-2 md:auto-rows-fr gap-8 md:gap-5 shrink-0 md:shrink overflow-x-auto md:overflow-visible pb-2 md:pb-0 snap-x snap-mandatory md:snap-none scroll-smooth overscroll-x-contain md:overscroll-auto"
                    style="scrollbar-width: none;">
                    <div class="md:hidden w-[85%] sm:w-[70%] h-96 bg-cover bg-center flex items-end rounded-4xl overflow-hidden shrink-0 snap-center"
                        style="background-image: url('{{ $otherActivities->first()->image_url }}');">
                        <div class="bg-black/50 rounded-4xl p-4 text-white space-y-3 w-full"
                            style="background: rgba(0,0,0,0.45); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
                            <div class="space-y-2">
                                <h1 class="text-xl font-bold underline">{{ $otherActivities->first()->title }}</h1>
                                @if (strlen($otherActivities->first()->description) > 150)
                                    <p class="text-base text-white">
                                        {{ substr($otherActivities->first()->description, 0, 150) }}...</p>
                                @else
                                    <p class="text-base text-white">{{ $otherActivities->first()->description }}</p>
                                @endif
                            </div>
                            <a href="{{ route('activities.show', ['id' => $otherActivities->first()->id]) }}"
                                class="text-sm underline">Прочитај повеќе</a>
                        </div>
                    </div>

                    @foreach ($otherActivities->slice(1) as $activity)
                        <div class="w-[85%] sm:w-[70%] md:w-auto h-96 md:h-auto bg-cover bg-center flex items-end rounded-4xl overflow-hidden md:overflow-visible shrink-0 md:shrink snap-center"
                            style="background-image: url('{{ $activity->image_url }}');">
                            <div class="bg-black/50 rounded-4xl p-4 md:p-8 text-white space-y-3 md:space-y-6 w-full"
                                style="background: rgba(0,0,0,0.45); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);">
                                <div class="space-y-2 md:space-y-3">
                                    <h1 class="text-xl font-bold">{{ $activity->title }}</h1>
                                    @if (strlen($activity->description) > 150)
                                        <p class="text-base text-white">{{ substr($activity->description, 0, 150) }}...</p>
                                    @else
                                        <p class="text-base text-white">{{ $activity->description }}</p>
                                    @endif
                                </div>
                                <a href="{{ route('activities.show', ['id' => $activity->id]) }}"
                                    class="text-sm underline">Прочитај повеќе</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div id="dots-other" class="dot-indicator flex">
                <div class="dot active"></div>
                @for ($i = 1; $i < count($otherActivities); $i++)
                    <div class="dot"></div>
                @endfor
            </div>
        @else
            <div class="flex items-center justify-center py-20">
                <p class="text-2xl text-gray-500">Моментално нема активности</p>
            </div>
        @endif
    </section>
</x-layouts.app>
