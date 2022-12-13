<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article') }}
        </h2>
    </x-slot>

    @foreach ($articles as $article)
        <div class="bg-amber-300">
            <h2>{{ $article->titre }}</h2>
            <a href="/article/{{ $article->id }}" class="text-indigo-500">Show</a>
        </div>
    @endforeach
</x-app-layout>
