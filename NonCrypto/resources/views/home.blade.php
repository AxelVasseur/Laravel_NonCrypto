
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div>
 @foreach ($article as $one_article)
    <p>
    <a href="{{ route('crypto', $one_article->id) }}">
    {{ $one_article->name }}
    </a>
    <a href="{{ route('tag', $one_article->tag_id) }}">
    {{ $one_article->tag->name }}
    </a>
    </p>
@endforeach 


</div>
{{ $article->links() }}
                   <br><br>
                      
                        @csrf
                    </form>
 
                </div>
            </div>
        </div>

  