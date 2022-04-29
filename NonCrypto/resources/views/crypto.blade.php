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

