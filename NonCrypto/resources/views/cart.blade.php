<div>
    <p>Cart of {{ Auth::user()->name }}</p>
</div>

<div>
    <table>
        <thead>
            <tr>
                <th>Article</th><th>Tag</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart_article as $line)
            <tr>
                <td>{{ $line->article->name }}</td>
                <td>{{ $line->article->tag->name }}</td>
                <td>
                    <form action="{{ route('remove-cart-article', $line->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button>X</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

