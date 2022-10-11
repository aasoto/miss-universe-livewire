@props(['id' => null, 'maxWidth' => null])

<x-jet-modal class="mt-24" :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:flex-col sm:items-start">
            <div class="mx-auto">
                <div class="mx-auto shrink-0 flex items-center justify-center h-32 w-32 rounded-full bg-red-100 sm:mx-0 sm:h-32 sm:w-32">
                    <i class="h-24 w-24 text-red-600 fa-regular fa-circle-xmark"></i>
                </div>
            </div>

            <div class="w-full mt-4 pt-4 sm:mt-0">
                <h3 class="text-xl font-bold text-center">
                    {{ $title }}
                </h3>

                <div class="mt-2 text-lg font-medium text-center">
                    {{ $content }}
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-row justify-center px-6 py-4 bg-gray-100 text-right">
        {{ $footer }}
    </div>
</x-jet-modal>
