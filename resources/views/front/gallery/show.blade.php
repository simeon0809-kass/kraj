<x-layouts.app>
    <title>{{ $gallery->title }} | Галерија</title>

    <main class="flex flex-col items-center py-12">
        <section class="box-border w-[80%]">
            <h1 class="font-bold text-3xl mb-6">{{ $gallery->title }}</h1>

            <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-center py-6">
                @foreach($gallery->images as $image)
                    <div class="pt-40 flex items-end relative cursor-pointer hover:-translate-y-0.5 hover:shadow-xl transition rounded-3xl overflow-hidden">
                        <img src="{{ $image->url }}" class="absolute w-full h-full top-0 left-0 rounded-3xl object-cover" />

                        <div class="box-border w-full p-6 flex flex-col gap-4 rounded-xl backdrop-blur-xs border border-white text-white">
                            <h1 class="text-xl font-bold text-center">&nbsp;</h1>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
</x-layouts.app>
