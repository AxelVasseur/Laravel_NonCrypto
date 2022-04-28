<div>
 ($article as $articles)
    <p>
        
        
    <a href="{{ route('article', $article->id_article) }}">
    {{ $article->name }}
    </a>
    </p>
    

</div>
{{ $articles->links() }}
