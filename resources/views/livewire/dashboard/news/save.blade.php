<section class="pt-32">
    <x-jet-action-message on="created">
        <div class="box-success-action-message">
            {{ __('Created news successfully') }}
        </div>
    </x-jet-action-message>
    <x-jet-action-message on="updated">
        <div class="box-success-action-message">
            {{ __('Updated news successfully') }}
        </div>
    </x-jet-action-message>
    <form wire:submit.prevent="submit">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 dark:gap-9">
            <div class="col-span-1 lg:col-span-2 relative">
                <label
                    class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="background">
                    {{ __('Background') }}
                </label>
                <x-jet-input-error for='background' />
                <div
                    class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2">
                    <x-jet-input type="file" wire:model="background" class="w-full" />
                </div>
                @if ($news && $news->background)
                    <div class="flex justify-center items-center">
                        <img class="w-2/3 mt-5 object-cover object-center rounded-lg"
                            src="{{ $news->getImageUrl() }}" />
                    </div>
                @endif
            </div>
            <div class="col-span-1 relative">
                <label
                    class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="title">
                    {{ __('Title') }}
                </label>
                <x-jet-input-error for='title'  class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input
                    class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="title" type="text">
            </div>
            <div class="col-span-1 relative">
                <label
                    class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="subtitle">
                    {{ __('Subtitle') }}
                </label>
                <x-jet-input-error for='subtitle'  class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input
                    class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="subtitle" type="text">
            </div>
            <div class="col-span-1 lg:col-span-2 relative">
                <label
                    class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="content">
                    {{ __('News content') }}
                </label>
                <div
                    class="z-10 w-full rounded-3xl border-2 text-gray-800 bg-white dark:bg-transparent border-gray-500 dark:border-white px-0.5 py-3">
                    <div wire:ignore>
                        <textarea id="ckcontent" rows="6">
                            {!! $content !!}
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="col-span-1 lg:col-span-2 relative">
                <label
                    class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="content">
                    {{ __('News content HTML view') }}
                </label>
                <x-jet-input-error for='content'  class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <textarea wire:model="content"
                    class="w-full rounded-3xl border-2 text-gray-800 bg-white dark:bg-transparent border-gray-500 dark:border-white px-0.5 py-3"></textarea>
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="posted">
                    {{__('Posted')}}
                </label>
                <x-jet-input-error for='posted' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <select wire:model="posted"
                    class="w-full rounded-full border-2 bg-transparent border-gray-500 dark:border-white px-10 py-2">
                    <option class="bg-transparent dark:bg-slate-800" value="">{{__('Select...')}}</option>
                    <option class="bg-transparent dark:bg-slate-800" value="yes">{{__('Yes')}}</option>
                    <option class="bg-transparent dark:bg-slate-800" value="not">{{__('Not')}}</option>
                </select>
            </div>
            <div class="col-span-1 relative">
                <label
                    class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="date_publish">
                    {{__('Publish date')}}</label>
                <x-jet-input-error for='date_publish' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input
                    class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="date_publish" type="date">
            </div>
            <div class="col-span-1 relative">
                <label
                    class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="posted">
                    {{__('Category')}}
                </label>
                <x-jet-input-error for='category_id' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <select wire:model="category_id"
                    class="w-full rounded-full border-2 bg-transparent border-gray-500 dark:border-white px-10 py-2">
                    <option class="bg-transparent dark:bg-slate-800" value="">{{__('Select...')}}</option>
                    @foreach ($categories as $name => $id)
                        <option class="bg-transparent dark:bg-slate-800" value="{{ $id }}">{{ __($name) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-1 relative">
                <label
                    class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="type">
                    {{__('Type')}}
                </label>
                <x-jet-input-error for='type' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <select name="type" wire:model="type"
                    class="w-full rounded-full border-2 bg-transparent border-gray-500 dark:border-white px-10 py-2">
                    <option class="bg-transparent dark:bg-slate-800" value="">{{__('Select...')}}</option>
                    <option class="bg-transparent dark:bg-slate-800" value="article">{{__('Article')}}</option>
                    <option class="bg-transparent dark:bg-slate-800" value="news">{{__('News')}}</option>
                </select>
            </div>
        </div>
        <div class="mt-6 py-6 w-full flex justify-center items-center">
            <button type="submit" class="rounded-full w-2/3 px-4 py-3 text-white font-bold {{$send_button}} hover:scale-110 transition">Guardar</button>
        </div>
    </form>
</section>

{{-- Importar plugin ckeditor --}}
<script src="{{ asset('js/ckeditor5-build-classic/ckeditor.js') }}"></script>
<script>
    document.addEventListener('livewire:load', function() {
        var ckeditor = null;
        /* Comunicación ckeditor a content */
        var editor = ClassicEditor.create(document.querySelector('#ckcontent')).then(
            editor => {
                ckeditor = editor;
                editor.model.document.on('change:data', () => {
                    @this.content = editor.getData();
                });
            }
        )

        /* Comunicación content a ckeditor */
        Livewire.hook('message.processed', (message, component) => {
            if (message.updateQueue[0].name == 'content') {
                ckeditor.setData(@this.content);
            }
        })
    })
</script>
