<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div>
                    <div>
    <p>Modify Your Comment</p>
</div>

<div>
    <form action="{{ route('update-comment', [$comment->id, $comment->article_id]) }}" method="POST">
        @method('PATCH')
        @csrf
        <textarea name="comment">{{ $comment->body }}</textarea>
        <button>MODIFY</button>
    </form>
</div>
</div>
            </div>
        </div>

</x-app-layout>
