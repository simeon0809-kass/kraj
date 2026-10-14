<x-layouts.app>
    <main>
        <div class="py-20 px-10 md:py-40 md:px-25 flex bg-cover bg-center w-full md:h-screen"
            style="background-image: url('images/crafts_picture.png');">
            <div class="text-center md:text-left w-full md:w-[50%] lg:w-[35%] flex flex-col gap-6">
                <h1 class="font-bold text-5xl md:text-8xl text-white">Рачни</h1>
                <h1 class="font-bold text-5xl md:text-8xl text-white">Изработки</h1>
            </div>
        </div>

        <div class="my-10 md:my-20 border-black border rounded-2xl mx-4 md:mx-25 py-8 md:py-15 px-6 md:px-10">
            <h2 class="text-2xl md:text-4xl font-bold pb-6 md:pb-10">Рачни изработки во КПУ идризово</h2>
            <p>Во рамките на КПД Идризово, осудениците активно учествуваат во работилници каде што изработуваат
                различни рачни предмети како: капи, шалови, слики, декорации, дрворези итн. Овие активности
                придонесуваат
                кон развој на нови вештини, креативности и подготовка на независен живот по издржувањето на казната.
                Работилниците се дел од програмите за ресоцијализација и поддршка во процесот на рехабилитација.
            </p>
        </div>

        <h2 class="mb-16 md:mb-30 text-center text-2xl md:text-4xl px-4">"Секој производ носи своја приказна и
            допринесува за ресоцијализација"</h2>


        @if(!empty($quotes) && count($quotes) > 0)
        <div class="marquee-container overflow-hidden whitespace-nowrap py-6 md:py-10 mx-4 md:mx-25">
            <div class="animate-marquee flex space-x-4 md:space-x-8">
                <div class="flex space-x-4 md:space-x-8">
                    @foreach ($quotes as $quote)
                        <div
                            class="shrink-0 w-64 md:w-80 border border-[#2E589E] rounded-2xl p-4 md:p-6 bg-white shadow-md whitespace-normal">
                            {{ $quote->quote }}
                        </div>
                    @endforeach   
                </div>
            </div>
        </div>
        @else
            <div class="flex items-center justify-center py-20">
                <p class="text-2xl text-gray-500">Моментално нема цитати</p>
            </div>
        @endif

        <div class="my-24">
        @if(!empty($categories) && count($categories) > 0)
        @foreach ($categories as $category)
            <div
                class="mx-4 md:mx-12 lg:mx-25 flex flex-col {{ $loop->even ? 'md:flex-row-reverse' : 'md:flex-row' }} mt-20 md:mt-52 gap-10 md:space-x-10 lg:space-x-20 items-center">

                @php
                    $productsToShow = $products->where('category_id', $category->id)->take(4)->values();
                @endphp

                <div class="flex gap-5 w-full image-gallery">

                    @if (isset($productsToShow[0]))
                        <img src="{{ $productsToShow[0]->image_url }}" alt=""
                            class="gallery-img md:h-200.25 h-[500px] object-cover rounded-3xl cursor-pointer transition-width duration-500 ease-in-out {{ $loop->even ? 'md:w-25' : 'md:w-125 w-125' }}">
                    @endif

                    @if (isset($productsToShow[1]))
                        <img src="{{ $productsToShow[1]->image_url }}" alt=""
                            class="gallery-img md:w-25 md:h-200.25 h-[500px] object-cover rounded-3xl cursor-pointer transition-width duration-500 ease-in-out">
                    @endif

                    @if (isset($productsToShow[2]))
                        <img src="{{ $productsToShow[2]->image_url }}" alt=""
                            class="gallery-img md:w-25 md:h-200.25 h-[500px] object-cover rounded-3xl cursor-pointer transition-width duration-500 ease-in-out">
                    @endif

                    @if (isset($productsToShow[3]))
                        <img src="{{ $productsToShow[3]->image_url }}" alt=""
                            class="gallery-img md:h-200.25 h-[500px] object-cover rounded-3xl cursor-pointer transition-width duration-500 ease-in-out {{ $loop->even ? 'md:w-125 w-125' : 'md:w-25' }}">
                    @endif

                </div>

                <div class="w-full space-y-5">
                    <h2 class="font-bold text-2xl md:text-3xl">{{ $category->title }}</h2>
                    <p>{{ $category->description }}</p>
                    <a href="{{ route('products.index', ['id' => $category->id]) }}" class="bg-[#2E589E] w-full md:w-auto py-4 md:py-2 px-4 rounded-xl text-white md:hover:scale-105 shadow-black hover:shadow-[#9BB1D6] duration-300 transition hover:text-[#1A335C] hover:bg-[#497ACA]">Види
                        Повеќе</a>
                </div>

            </div>
        @endforeach
        @else
            <div class="flex items-center justify-center py-20">
                <p class="text-2xl text-gray-500">Моментално нема изработки</p>
            </div>
        @endif
        </div>

    </main>
</x-layouts.app>
