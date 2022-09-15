<div>
    <div class="flex flex-wrap mx-auto w-4/6 shadow-lg">
        <div class="flex flex-wrap w-full rounded-lg bg-white p-4 sm:p-8">
            <form wire:submit.prevent="submit">
                <div class="grid grid-cols-4 sm:grid-cols-8 gap-2 mb-2">
                    <div class="col-span-4 sm:col-span-8">
                        <div class="font-inter font-bold text-lg text-black tracking-tight">Comentarios</div>
                    </div>
                    @if (Auth::user())
                        <div class="col-span-4 sm:col-span-8">
                            <x-jet-action-message on="created">
                                <div class="box-success-action-message">
                                    {{__('Comentario agregado exitosamente.')}}
                                </div>
                            </x-jet-action-message>
                        </div>
                        <div class="col-span-3 sm:col-span-7">
                            <x-jet-input type="text" wire:model="message" class="w-full" placeholder="Comenta aquí..."></x-jet-input>
                        </div>
                        <div class="col-span-1 sm:col-span-1">
                            <button class="w-26 text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                            type="submit">Comentar</button>
                        </div>
                    @endif
                </div>
                @if ($new)
                    @livewire('blog.news.comments.added', ['news_id' => $news_id, 'message' => $message])
                @endif
            </form>

            @livewire('blog.news.comments.all', ['news_id' => $news_id])
        </div>
    </div>
</div>
