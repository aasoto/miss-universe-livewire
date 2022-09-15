<div class="w-full rounded-lg border-solid border-2 border-gray-300">
    <div class="grid grid-cols-8 gap-2 mb-2">
        @if (!isset($comments[0]['message']))
            <div class="col-span-8">
                <p class="ml-10 my-4 text-lg font-bold text-gray-700">Sin comentarios</p>
            </div>
        @endif
        @php
            $border = false;
        @endphp
        @foreach ($comments as $comment)
            @if ($border) <div class="col-span-8 border-b-2 border-gray-300"></div> @endif
            @php $border = true; @endphp
            <div class="col-span-1">
                <button class="sm:mx-8 my-2 text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ $comment->getProfileImageUrl() }}" alt="{{ $comment->user->name }}" />
                </button>
            </div>
            <div class="col-span-6">
                <p class="text-sm font-bold text-gray-700">{{$comment->user->name}}</p>
                <p class="text-base text-gray-900">{{$comment->message}}</p>
            </div>
            <div class="col-span-1">
                @if (isset(Auth::user()->id) && ($comment->user_id == Auth::user()->id))
                <button wire:click="update({{$comment->id}})" title="Editar comentario" class="relative inline-flex items-center justify-center p-0.5 sm:mt-3 sm:ml-5 overflow-hidden text-sm font-medium text-gray-900 font-bold rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-gray-900 dark:font-bold focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
                    <span class="relative px-1.5 py-0.5 transition-all ease-in duration-75 bg-white dark:bg-white rounded-md group-hover:bg-opacity-0">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </span>
                </button>
                <button wire:click="delete({{$comment->id}})" title="Eliminar comentario" class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 font-bold rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-gray-900 dark:font-bold focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
                    <span class="relative px-1.5 py-0.5 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
                        <i class="fa-solid fa-square-xmark"></i>
                    </span>
                </button>
                @endif
            </div>
        @endforeach
    </div>
</div>

