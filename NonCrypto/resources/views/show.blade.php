<x-app-layout>
    <x-slot name="header"></x-slot>

    
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
          <a href="{{ route('utilisateur') }}">⬅️ Retourne voir la liste de t'est Non-amis</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200 flex">
                  <p class="flex-1 mr-6 group-hover:text-blue-500">

                    {{$user->name}} <small> email = {{ $user->email }}</small>

                  </p>
                  
                  <time class="text-gray-700"> Non-utilisateur depuis {{ $user->created_at->diffForHumans() }}</time>
              </div>
              <div class="p-6 bg-white border-b border-gray-200 flex">
              @foreach ($user->comments as $comments)
                  <p class="flex-1 mr-6 group-hover:text-blue-500">
                    {{$comments->body}}
                  </p>
                  @endforeach
                  </div>
          </div>
      </div>
    </div>
</x-app-layout>