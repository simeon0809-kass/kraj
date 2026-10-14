<x-layouts.app>
    <main class="w-full bg-figma-gradient flex flex-col justify-center items-center font-montserrat my-24">
        <div class="w-[95%] md:w-[73%] flex flex-row items-center gap-10 text-center md:text-left mb-12 md:mb-24">
            <a href="{{ route('crafts.index') }}" class="transition-transform duration-300 hover:-translate-x-4"><i class="fa-solid fa-arrow-left text-3xl"></i></a>
            <h1 class="font-bold text-3xl md:text-4xl">Уметност со игла и конец</h1>
        </div>
        <div class="w-[90%] lg:w-[73%] flex flex-row flex-wrap gap-14">

            @foreach ($products as $product)
                <div
                    class="w-full lg:w-[46%] bg-white/30 flex flex-col items-left rounded-3xl overflow-hidden gap-y-6 pb-8 border-b border-white/30">
                    <img src="{{ $product->image_url }}" alt="" class="w-full h-100">
                    <h3 class="text-2xl text-white font-bold px-8">{{ $product->title }}</h3>
                    <p class="text-sm text-white px-8">{{ $product->description }}</p>
                    <button
                        class="reserve-btn md:w-[33%] text-base font-bold text-white bg-[#0E1B2F] px-4 py-2 rounded-xl mx-8 hover:scale-105 transition-transform">Резервирај</button>
                </div>
            @endforeach

        </div>

        <div id="reserve-modal"
            class="fixed inset-0 bg-black/40 hidden justify-center items-center z-50 backdrop-blur-sm px-4">
            <div id="modal-box"
                class="bg-[#8CABDD] w-full max-w-2xl rounded-2xl p-8 md:p-12 relative flex flex-col items-center text-center shadow-2xl">

                <button id="close-modal"
                    class="absolute top-4 right-6 text-black hover:text-gray-700 transition-colors">
                    <i class="fa-solid fa-xmark text-4xl"></i>
                </button>

                <h2 class="text-[#1A1A2E] text-2xl md:text-3xl font-bold mt-6 mb-8 leading-relaxed">
                    На бројот 07X XXX XXX јавете се за да ја
                    резервирате вашата нарачка.
                </h2>
                <p class="text-[#1A1A2E] text-2xl md:text-3xl font-bold mb-4">
                    Ви Благодариме.
                </p>
            </div>
        </div>

    </main>
</x-layouts.app>
