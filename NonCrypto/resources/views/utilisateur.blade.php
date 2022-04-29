<x-app-layout>
    <x-slot name="header">
        
</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul>
                        @foreach($users as $user)
                        <li>
                        <a href="{{ route('show', ['user' => $user->id]) }}" class="group">
                            <article class="flex group-hover:bg-gray-100 px-4 py-2 rounded">
                                <p class="flex-1 mr-6 group-hover:text-blue-500">
                                {{ $user->name }} <small>by {{ $user->email }}</small> 
                                    
                                </p>
                                <time class="text-gray-700">{{ $user->created_at->diffForHumans() }}</time>
                            </article>
                        </a>
                        </li>
                        @endforeach
                    </ul>  
                    {{$users->links()}}  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
