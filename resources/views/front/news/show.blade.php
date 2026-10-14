<x-layouts.app>
<section class="box-border w-full min-h-screen px-6 py-20 flex justify-center items-start bg-2">

  <div class="w-full max-w-300 flex flex-col items-start gap-6">
    <p class="font-bold text-blue-950 text-4xl bg-default py-2 rounded-full">Соопштение</p>
    <h1 class="text-3xl font-extrabold">{{ $news->title }}</h1>
    <time>
      <i class="fa-regular fa-clock"></i> {{ \Carbon\Carbon::parse($news->created_at)->format('F j, Y \a\t H:i') }}
    </time>
    <p class="font-bold text-lg">{{ $news->description }}</p>
    <a href="{{ route('news.index') }}">
      <button class="self-start bg-blue-950 text-white text-lg rounded-xl px-6 py-2 min-w-fit cursor-pointer hover:-translate-y-0.5 hover:shadow-xl transition">
        <i class="fa-solid fa-arrow-left"></i> Назад
      </button>
    </a>
  </div>

</section>
</x-layouts.app>