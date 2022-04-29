<x-app-layout>
    <x-slot name="header">
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
    <p>
        {{ $tag->name }}


    </p>
    <div>
        @foreach ($tag->article as $one_article)
            <p>
                <a href="{{ route('crypto', $one_article->id) }}">
                    {{ $one_article->name }}
                </a>
        
            </p>
        @endforeach
    </div>
</div>
</div>
            </div>
        </div>

</x-app-layout>