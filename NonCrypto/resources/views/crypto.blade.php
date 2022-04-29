<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div>
<div>

    <p>
           
    <a href="{{ route('crypto', $article->id) }}">
    {{ $article->name }}
    </a>
  
    <a href="{{ route('tag', $article->tag_id) }}">
    {{ $article->tag->name }}
    </a>


    </p>
    <p>Created at: {{ $article->created_at}}</p>

    

</div>

<div>
    <p>Description:</p>
    <p>{{$article->description}}</p>
    @if(count(Auth::user()->cart_article->where('article_id', $article->id)) == 0)
        <form action="{{ route('add-to-cart', $article->id) }}" method="POST">
            @csrf
            <button>Add to !Cart</button>
        </form>
    @else
        <button onclick="alert('Sorry, it\'s a !Button.');">Already have one in cart</button>
    @endif
</div>

<div>
    <p>Comments:</p>
    <ul>
        @if(count($article->comment) != 0)
            @foreach($article->comment as $comment)
                <li>
                    <article>
                        @if(Auth::id() == $comment->user->id)
                            <p>
                                {{ $comment->body }} 
                                <small>by {{ $comment->user->name }}</small> 
                                <time>{{ $comment->created_at->diffForHumans() }}</time> 
                                @if($comment->updated_at != $comment->created_at)
                                    <i>Edited</i>
                                @endif
                            </p>
                            <form action="{{ route('modify-comment', $comment->id) }}" method="POST">
                                @csrf
                                <button>Edit</button>
                            </form>
                            <form action="{{ route('delete-comment', [$comment->id, $comment->article_id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button>Delete</button>
                            </form>
                        @else
                            <p>
                                {{ $comment->body }} 
                                <small>by {{ $comment->user->name }}</small> 
                                <time>{{ $comment->created_at->diffForHumans() }}</time> 
                                @if($comment->updated_at != $comment->created_at)
                                    <i>Edited</i>
                                @endif
                            </p>
                        @endif
                    </article>
                </li>
            @endforeach
        @else
            <li>
                <article>
                    <p>Be the first to put a comment!</p>
                </article>
            </li>
        @endif
        <li>
            <form action="{{ route('post-comment', $article->id) }}" method="POST">
                @csrf
                <textarea name="comment" placeholder="Do you want to comment something?"></textarea>
                <button>COMMENT</button>
            </form>
        </li>
    </ul>
</div>
</div>
            </div>
        </div>

</x-app-layout>


