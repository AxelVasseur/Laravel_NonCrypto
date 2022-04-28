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