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

