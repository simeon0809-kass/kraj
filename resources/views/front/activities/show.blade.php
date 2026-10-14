<x-layouts.app>
    <section class="relative box-border w-full min-h-screen px-6 flex justify-center items-start py-20">
        <img src="{{ $activity->image_url }}"
            class="w-full h-full top-0 left-0 object-cover absolute -z-1 opacity-50" />
        <div class="w-full max-w-300 flex flex-col items-start gap-6">
            <p class="text-white font-bold text-lg bg-default px-6 py-2 rounded-full">Активност</p>
            <h1 class="text-6xl md:text-8xl font-extrabold">{{ $activity->title }}</h1>
            <p class="font-bold text-lg">{{ $activity->description }}</p>
            <a href="{{ route('activities.index') }}">
                <button
                    class="self-start bg-blue-950 text-white text-lg rounded-xl px-6 py-2 min-w-fit cursor-pointer hover:-translate-y-0.5 hover:shadow-xl transition">
                    <i class="fa-solid fa-arrow-left"></i> Назад
                </button>
            </a>
        </div>
    </section>
</x-layouts.app>
