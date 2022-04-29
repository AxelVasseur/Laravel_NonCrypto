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
