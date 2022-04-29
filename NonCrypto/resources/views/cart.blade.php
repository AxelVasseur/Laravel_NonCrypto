<x-app-layout>
    <x-slot name="header">
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div>
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
                </div>
            </div>
        </div>

</x-app-layout>

