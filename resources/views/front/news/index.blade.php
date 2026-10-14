<x-layouts.app>
    <title>Новости | Затвор Идризово</title>
    <section class="box-border w-full flex justify-center items-center">
        <img src="{{ asset('images/news/news_picture.png') }}"
            class="w-full" />
    </section>
    @if ($newNewsLeft->isNotEmpty() || $newNewsRight->isNotEmpty())
        <section class="bg-figma-gradient box-border w-full flex flex-col gap-10 px-6 pb-20">
            <div class="w-full max-w-300 mx-auto flex flex-col gap-10 my-32">
                <h1 class="font-extrabold text-3xl text-white">Нови соопштенија</h1>
                <div class="w-full flex lg:flex-row flex-col gap-4">
                    <div class="w-full grid grid-cols-2 gap-4">
                        @foreach ($newNewsLeft as $news)
                            @if ($loop->first)
                                <div
                                    class="bg-white/30 col-span-2 box-border p-6 flex flex-col gap-6 rounded-2xl backdrop-blur-xl border border-white/30 text-white hover:-translate-y-0.5 hover:shadow-xl transition">
                                    <h1 class="text-2xl font-bold underline">{{ $news->title }}</h1>
                                    @if (strlen($news->description) > 250)
                                        <p class="text-base text-white">{{ substr($news->description, 0, 250) }}...</p>
                                    @else
                                        <p class="text-base text-white">{{ $news->description }}</p>
                                    @endif
                                    <a href="{{ route('news.show', ['id' => $news->id]) }}">
                                        <button
                                            class="self-start bg-blue-950 text-white text-lg rounded-xl px-6 py-2 min-w-fit cursor-pointer hover:-translate-y-0.5 hover:shadow-xl transition">
                                            Види повеќе
                                        </button>
                                    </a>
                                </div>
                            @else
                                <div
                                    class="bg-white/30 box-border p-6 flex flex-col gap-6 rounded-2xl backdrop-blur-xl border border-white/30 text-white hover:-translate-y-0.5 hover:shadow-xl transition">
                                    <h1 class="text-2xl font-bold underline">{{ $news->title }}</h1>
                                    @if (strlen($news->description) > 250)
                                        <p class="text-base text-white">{{ substr($news->description, 0, 250) }}...</p>
                                    @else
                                        <p class="text-base text-white">{{ $news->description }}</p>
                                    @endif
                                    <a href="{{ route('news.show', ['id' => $news->id]) }}">
                                        <button
                                            class="self-start bg-blue-950 text-white text-lg rounded-xl px-6 py-2 min-w-fit cursor-pointer hover:-translate-y-0.5 hover:shadow-xl transition">
                                            Види повеќе
                                        </button>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>


                    <div class="w-full grid grid-cols-2 gap-4">

                        @foreach ($newNewsRight as $news)
                            @if ($loop->last)
                                <div
                                    class="bg-[#ADC3E7]/80 col-span-2 box-border p-6 flex flex-col gap-6 rounded-2xl backdrop-blur-xl border border-white text-white hover:-translate-y-0.5 hover:shadow-xl transition">
                                    <h1 class="text-2xl font-bold underline">{{ $news->title }}</h1>
                                    @if (strlen($news->description) > 250)
                                        <p class="text-base text-white">{{ substr($news->description, 0, 250) }}...</p>
                                    @else
                                        <p class="text-base text-white">{{ $news->description }}</p>
                                    @endif
                                    <a href="{{ route('news.show', ['id' => $news->id]) }}">
                                        <button
                                            class="self-start bg-blue-950 text-white text-lg rounded-xl px-6 py-2 min-w-fit cursor-pointer hover:-translate-y-0.5 hover:shadow-xl transition">
                                            Види повеќе
                                        </button>
                                    </a>
                                </div>
                            @else
                                <div
                                    class="bg-[#ADC3E7]/80 box-border p-6 flex flex-col gap-6 rounded-2xl backdrop-blur-xl border border-white text-white hover:-translate-y-0.5 hover:shadow-xl transition">
                                    <h1 class="text-2xl font-bold underline">{{ $news->title }}</h1>
                                    @if (strlen($news->description) > 250)
                                        <p class="text-base text-white">{{ substr($news->description, 0, 250) }}...</p>
                                    @else
                                        <p class="text-base text-white">{{ $news->description }}</p>
                                    @endif
                                    <a href="{{ route('news.show', ['id' => $news->id]) }}">
                                        <button
                                            class="self-start bg-blue-950 text-white text-lg rounded-xl px-6 py-2 min-w-fit cursor-pointer hover:-translate-y-0.5 hover:shadow-xl transition">
                                            Види повеќе
                                        </button>
                                    </a>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>

            </div>
        @else
            <div class="flex items-center justify-center py-20">
                <p class="text-2xl text-gray-500">Моментално нема соопштенија</p>
            </div>
    @endif



    @if ($oldNewsLeft->isNotEmpty() || $oldNewsRight->isNotEmpty())
        <div class="w-full max-w-300 mx-auto flex flex-col gap-10">
            <h1 class="font-extrabold text-white text-3xl">Постари соопштенија</h1>

            <div class="w-full flex lg:flex-row flex-col gap-4">
                <div class="w-full grid grid-cols-2 gap-4">
    
                    @foreach ($oldNewsLeft as $news)
                        @if ($loop->first)
                            <div
                                class="bg-[#ADC3E7]/80 col-span-2 box-border p-6 flex flex-col gap-6 rounded-2xl backdrop-blur-xl border border-white text-white hover:-translate-y-0.5 hover:shadow-xl transition">
                                <h1 class="text-2xl font-bold underline">{{ $news->title }}</h1>
                                @if (strlen($news->description) > 250)
                                    <p class="text-base text-white">{{ substr($news->description, 0, 250) }}...</p>
                                @else
                                    <p class="text-base text-white">{{ $news->description }}</p>
                                @endif
                                <a href="{{ route('news.show', ['id' => $news->id]) }}">
                                    <button
                                        class="self-start bg-blue-950 text-white text-lg rounded-xl px-6 py-2 min-w-fit cursor-pointer hover:-translate-y-0.5 hover:shadow-xl transition">
                                        Види повеќе
                                    </button>
                                </a>
                            </div>
                        @else
                            <div
                                class="bg-[#ADC3E7]/80 box-border p-6 flex flex-col gap-6 rounded-2xl backdrop-blur-xl border border-white text-white hover:-translate-y-0.5 hover:shadow-xl transition">
                                <h1 class="text-2xl font-bold underline">{{ $news->title }}</h1>
                                @if (strlen($news->description) > 250)
                                    <p class="text-base text-white">{{ substr($news->description, 0, 250) }}...</p>
                                @else
                                    <p class="text-base text-white">{{ $news->description }}</p>
                                @endif
                                <a href="{{ route('news.show', ['id' => $news->id]) }}">
                                    <button
                                        class="self-start bg-blue-950 text-white text-lg rounded-xl px-6 py-2 min-w-fit cursor-pointer hover:-translate-y-0.5 hover:shadow-xl transition">
                                        Види повеќе
                                    </button>
                                </a>
                            </div>
                        @endif
                    @endforeach

                </div>


                <div class="w-full grid grid-cols-2 gap-4">

                    @foreach ($oldNewsRight as $news)
                        @if ($loop->last)
                            <div
                                class="bg-[#ADC3E7]/80 col-span-2 box-border p-6 flex flex-col gap-6 rounded-2xl backdrop-blur-xl border border-white text-white hover:-translate-y-0.5 hover:shadow-xl transition">
                                <h1 class="text-2xl font-bold underline">{{ $news->title }}</h1>
                                @if (strlen($news->description) > 250)
                                    <p class="text-base text-white">{{ substr($news->description, 0, 250) }}...</p>
                                @else
                                    <p class="text-base text-white">{{ $news->description }}</p>
                                @endif
                                <a href="{{ route('news.show', ['id' => $news->id]) }}">
                                    <button
                                        class="self-start bg-blue-950 text-white text-lg rounded-xl px-6 py-2 min-w-fit cursor-pointer hover:-translate-y-0.5 hover:shadow-xl transition">
                                        Види повеќе
                                    </button>
                                </a>
                            </div>
                        @else
                            <div
                                class="bg-[#ADC3E7]/80 box-border p-6 flex flex-col gap-6 rounded-2xl backdrop-blur-xl border border-white text-white hover:-translate-y-0.5 hover:shadow-xl transition">
                                <h1 class="text-2xl font-bold underline">{{ $news->title }}</h1>
                                @if (strlen($news->description) > 250)
                                    <p class="text-base text-white">{{ substr($news->description, 0, 250) }}...</p>
                                @else
                                    <p class="text-base text-white">{{ $news->description }}</p>
                                @endif
                                <a href="{{ route('news.show', ['id' => $news->id]) }}">
                                    <button
                                        class="self-start bg-blue-950 text-white text-lg rounded-xl px-6 py-2 min-w-fit cursor-pointer hover:-translate-y-0.5 hover:shadow-xl transition">
                                        Види повеќе
                                    </button>
                                </a>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    @endif
    </section>
</x-layouts.app>
