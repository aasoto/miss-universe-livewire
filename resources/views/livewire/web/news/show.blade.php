<div x-data="show_news()">
    <div class="flex flex-col justify-center items-center w-full min-h-[384px] max-h-screen"
        style="background-image: url('../../../storage/app/public/images/news/fondo-pink.svg'); background-repeat: no-repeat; background-size: cover; background-position: center;">
        <div class="w-full h-20"></div>
        <h1 class="mx-10 my-5 z-10 text-center text-2xl iPhoneSE:text-3xl md:text-5xl font-bold text-white"
            x-text="data_news[0].title">
        </h1>
        <h3 class="mx-10 mt-5 mb-16 z-10 text-center text-2xl iPhoneSE:text-xl md:text-3xl font-bold text-white"
            x-text="data_news[0].subtitle">
        </h3>
    </div>
    <!-- Cuerpo página -->
    <section
        class="mt-0 md:-mt-8 lg:-mt-14 mx-0 md:mx-7 pt-12 md:pt-32 pb-20 backdrop-blur-none md:backdrop-blur-xl bg-white/50 dark:bg-slate-800/70 rounded-none md:rounded-md shadow-none md:shadow-lg md:shadow-gray-400 dark:md:shadow-black/20">
        <div class="grid grid-cols-1 md:grid-cols-6 gap-3 mx-5 md:mx-10">
            <div class="col-span-1">
                <div class="sticky top-10">
                    <div class="flex flex-col items-center">
                        <h2
                            class="text-xl mb-4 font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                            Autor
                        </h2>
                        <div
                            class="rounded-full p-1.5 bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600 w-40 h-40 md:w-32 md:h-32 lg:w-40 lg:h-40">
                            <img class="rounded-full w-full h-full object-cover object-center"
                                :src="`{{ asset('../storage/app/public') }}/${user_editor[0].profile_photo_path}`"
                                alt="">
                        </div>
                        <p class="text-base font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                            x-text="user_editor[0].name">
                        </p>
                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                            x-text="user_editor[0].country.name">
                        </p>
                    </div>
                    <div class="absolute bottom-16 left-32 md:left-6">
                        <span class="w-full h-full"><i
                                :class="`fi fi-${user_editor[0].country.iso3166_1_alpha2} fis rounded-full scale-[2.5]`"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-span-1 md:col-span-5 px-0 md:px-5">
                <div class="relative w-full">
                    <img class="blur-xl w-full h-none md:h-[33vh] lg:h-[66vh] rounded-lg object-cover object-top"
                        :src="`{{ asset('../storage/app/public/images/news/background') }}/${data_news[0].background}`"
                        alt="">
                    <img class="absolute top-0 left-0 z-10 w-full h-none md:h-[33vh] lg:h-[66vh] rounded-lg object-cover object-top"
                        :src="`{{ asset('../storage/app/public/images/news/background') }}/${data_news[0].background}`"
                        alt="">
                </div>
                <div>
                    <h5 class="mt-12 text-sm font-light italic text-gray-800 dark:text-white text-center xl:text-left"
                        x-text="data_news[0].date_publish">
                    </h5>
                </div>
                <div class="info-texto" x-html="`<p>${data_news[0].content}</p>`">
                </div>
            </div>
        </div>
    </section>
</div>
<div x-data="comments()" x-init="verify_owner()">
    <section
        class="mt-5 mx-0 md:mx-7 py-5 backdrop-blur-none md:backdrop-blur-xl bg-white/50 dark:bg-slate-800/70 rounded-none md:rounded-md shadow-none md:shadow-lg md:shadow-gray-400 dark:md:shadow-black/20">
        <div class="grid grid-cols-1 md:grid-cols-6 gap-3 mx-5 md:mx-10">
            <div class="col-span-1">
                <div class="sticky top-20">
                    <h1
                        class="text-2xl md:text-lg lg:text-3xl mb-4 font-semibold text-left text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                        Comentarios
                    </h1>
                </div>
            </div>
            <div class="col-span-1 md:col-span-5">
                <div x-show="auth_user_id">
                    <div x-show="!new_comment">
                        <div class="flex flex-row w-full gap-4 mt-0 dark:mt-5 mb-5">
                            <div class="basis-5/6">
                                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                                    for="comment_text">
                                    Comenta aquí</label>
                                <input @keyup.enter="add()" x-model="message"
                                    class="w-full rounded-full border bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                                    name="comment_text" type="text">
                            </div>
                            <div class="basis-1/6">
                                <button @click="add()"
                                    class="rounded-full w-full px-5 py-2 text-white text-base font-bold bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-400 dark:to-rose-700 hover:scale-110 transition">
                                    Comentar
                                </button>
                            </div>
                        </div>
                    </div>
                    <div x-show="new_comment">
                        <div class="flex flex-row w-full gap-4 mt-0 dark:mt-5 mb-5">
                            <div class="basis-5/6">
                                <label
                                    class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                                    for="comment_text">
                                    Comenta aquí</label>
                                <input
                                    class="w-full rounded-full border bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                                    name="comment_text" type="text" disabled>
                            </div>
                            <div class="basis-1/6">
                                <button
                                    class="opacity-50 cursor-not-allowed rounded-full w-full px-5 py-2 text-white text-base font-bold bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-400 dark:to-rose-700 hover:scale-110 transition">
                                    Comentar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full border border-gray-500 rounded-3xl">
                    <div x-show="comments[0].id">
                        <div x-show="new_comment">
                            <template x-if="new_comment">
                                <div x-init="no_comments = false"></div>
                            </template>
                            <div class="px-5 py-2.5">
                                <div class="flex flex-row py-2.5 group">
                                    <div class="basis-1/6 group-hover:basis-2/12 flex justify-center items-center">
                                        <template x-if="auth_user_profile_photo_path">
                                            <img class="rounded-full w-10 md:w-16 h-10 md:h-16"
                                                :src="`{{ asset('../storage/app/public') }}/${auth_user_profile_photo_path}`"
                                                alt="">
                                        </template>
                                        <template x-if="!auth_user_profile_photo_path">
                                            <img class="rounded-full w-10 md:w-16 h-10 md:h-16"
                                                :src="`{{ asset('../storage/app/public/profile-photos/user.png') }}`"
                                                alt="">
                                        </template>
                                    </div>
                                    <div
                                        class="basis-5/6 group-hover:basis-8/12 flex flex-col justify-center items-start">
                                        <h4 class="text-base font-medium text-gray-800 dark:text-white selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="auth_user_name">
                                        </h4>
                                        <p class="ml-5 text-base font-light text-gray-800 dark:text-white text-left selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="new_comment">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <template x-for="comment in comments_verified">
                            <div class="px-5 py-2.5" x-init="no_comments = false">
                                <div class="flex flex-row py-2.5 group">
                                    <div class="basis-1/6 group-hover:basis-2/12 flex justify-center items-center">
                                        <template x-if="comment.profile_photo_path">
                                            <img class="rounded-full w-10 md:w-16 h-10 md:h-16"
                                                :src="`{{ asset('../storage/app/public') }}/${comment.profile_photo_path}`"
                                                alt="">
                                        </template>
                                        <template x-if="!comment.profile_photo_path">
                                            <img class="rounded-full w-10 md:w-16 h-10 md:h-16"
                                                :src="`{{ asset('../storage/app/public/profile-photos/user.png') }}`"
                                                alt="">
                                        </template>
                                    </div>
                                    <div class="basis-5/6 group-hover:basis-8/12 flex flex-col justify-center items-start">
                                        <h4 class="text-base font-medium text-gray-800 dark:text-white selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="comment.name">
                                        </h4>
                                        <div x-show="comment.plus">
                                            <p class="ml-5 text-base font-light text-gray-800 dark:text-white text-left selection:bg-rose-300 dark:selection:bg-rose-700"
                                                x-text="comment.message" x-show="!comment.editMode"
                                                @click="comment.editMode = true"></p>
                                            <input x-model="comment.message" x-show="comment.editMode" type="text"
                                                @keyup.enter="comment.editMode=false; update_comment(comment.id, comment.message)"
                                                class="w-full rounded-full border bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2 selection:bg-rose-300 dark:selection:bg-rose-700">
                                        </div>
                                        <div x-show="!comment.plus">
                                            <p class="ml-5 text-base font-light text-gray-800 dark:text-white text-left selection:bg-rose-300 dark:selection:bg-rose-700"
                                                x-text="comment.message"></p>
                                        </div>
                                    </div>
                                    <template x-if="comment.plus">
                                        <div class="hidden group-hover:block basis-2/12">
                                            <div class="flex flex-row gap-2 justify-center items-center">
                                                <button @click="delete_comment(comment.id)"
                                                    class="rounded-full px-3 py-2 bg-gradient-to-r from-red-400 to-red-900 text-white">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </template>
                    </div>
                    <template x-if="no_comments">
                        <div class="my-5">
                            <p class="ml-5 text-gray-800 font-bold text-xl">Sin comentarios</p>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>
    <template x-if="deleted_comment">
        <div x-init="deleted_comment_alert()"></div>
    </template>


    {{-- <div
        class="w-full md:w-11/12 mx-0 mt-4 md:mx-8 lg:mx-11 xl:mx-14 2xl:mx-16 md:rounded-md bg-white/70 dark:bg-gray-800 backdrop-blur-lg shadow-sm shadow-gray-700">
        <div class="pt-5 ml-12 mb-5">
            <h3 class="text-xl font-bold justify-left text-rose-500 dark:text-rose-300">Comentarios</h3>
        </div>
        <div x-show="auth_user_id">
            <div x-show="!new_comment">
                <div class="ml-12 pb-5 mr-12 flex flex-row gap-3">
                    <div class="basis-5/6">
                        <input @keyup.enter="add()" x-model="message" type="text" placeholder="Comenta aquí..."
                            class="w-full py-2 bg-white dark:bg-gray-800 rounded border border-rose-500 hover:border-rose-800 hover:shadow-sm hover:shadow-rose-400 hover:dark:shadow-white focus:shadow-sm focus:shadow-rose-400 dark:focus:shadow-gray-600 focus:border-2 focus:border-rose-800 placeholder:text-gray-500 dark:placeholder:text-gray-200">
                    </div>
                    <div class="basis-1/6">
                        <button @click="add()"
                            class="w-full h-full bg-rose-500 hover:bg-rose-700 text-white text-semibold rounded">Enviar</button>
                    </div>
                </div>
            </div>
            <div x-show="new_comment">
                <div class="ml-12 pb-5 mr-12 flex flex-row gap-3">
                    <div class="basis-5/6">
                        <input type="text" placeholder="Comenta aquí..."
                            class="w-full py-2 bg-white dark:bg-gray-800 rounded border border-rose-500 hover:border-rose-800 hover:shadow-sm hover:shadow-rose-400 hover:dark:shadow-white focus:shadow-sm focus:shadow-rose-400 dark:focus:shadow-gray-600 focus:border-2 focus:border-rose-800 placeholder:text-gray-500 dark:placeholder:text-gray-200"
                            disabled>
                    </div>
                    <div class="basis-1/6">
                        <button
                            class="opacity-50 cursor-not-allowed w-full h-full bg-rose-500 hover:bg-rose-700 text-white text-semibold rounded">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="ml-12 mr-12 rounded-lg border border-rose-500">
            <div x-show="comments[0].id">
                <div x-show="new_comment">
                    <template x-if="new_comment">
                        <div x-init="no_comments = false"></div>
                    </template>
                    <div class="border-b border-rose-500">
                        <div class="flex flex-row gap-3">
                            <div class="w-11/12">
                                <div class="ml-4 mt-4 flex flex-row gap-3">
                                    <template x-if="auth_user_profile_photo_path">
                                        <img class="h-7 w-7 rounded-full"
                                            :src="`{{ asset('../storage/app/public') }}/${auth_user_profile_photo_path}`"
                                            alt="" />
                                    </template>
                                    <template x-if="!auth_user_profile_photo_path">
                                        <img class="h-7 w-7 rounded-full"
                                            :src="`{{ asset('../storage/app/public/profile-photos/user.png') }}`"
                                            alt="" />
                                    </template>
                                    <h4 class="text-lg font-bold text-gray-800 dark:text-white text-left"
                                        x-text="auth_user_name"></h4>
                                </div>
                                <p class="w-11/12 text-justify mx-4 mb-4 text-gray-800 text-lg font-light dark:text-white text-left"
                                    x-text="new_comment"></p>
                            </div>
                            <div class="w-1/12 my-auto mx-auto">
                                <button class="rounded text-white bg-rose-500 px-4 h-10">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <template x-for="comment in comments_verified">
                    <div class="border-b border-rose-500" x-init="no_comments = false">
                        <div class="flex flex-row gap-3">
                            <div class="w-11/12">
                                <div class="ml-4 mt-4 flex flex-row gap-3">
                                    <template x-if="comment.profile_photo_path">
                                        <img class="h-7 w-7 rounded-full"
                                            :src="`{{ asset('../storage/app/public') }}/${comment.profile_photo_path}`"
                                            alt="" />
                                    </template>
                                    <template x-if="!comment.profile_photo_path">
                                        <img class="h-7 w-7 rounded-full"
                                            :src="`{{ asset('../storage/app/public/profile-photos/user.png') }}`"
                                            alt="" />
                                    </template>
                                    <h4 class="text-lg font-bold text-gray-800 dark:text-white text-left"
                                        x-text="comment.name"></h4>
                                </div>
                                <div x-show="comment.plus">
                                    <p class="w-11/12 text-justify mx-4 mb-4 text-gray-800 text-lg font-light dark:text-white text-left"
                                        x-text="comment.message" x-show="!comment.editMode"
                                        @click="comment.editMode = true"></p>
                                    <input x-model="comment.message" x-show="comment.editMode" type="text"
                                        @keyup.enter="comment.editMode=false; update_comment(comment.id, comment.message)"
                                        class="w-11/12 ml-4 my-4 py-2 bg-white dark:bg-gray-800 rounded border border-rose-500 hover:border-rose-800 hover:shadow-sm hover:shadow-rose-400 hover:dark:shadow-white focus:shadow-sm focus:shadow-rose-400 dark:focus:shadow-gray-600 focus:border-2 focus:border-rose-800 placeholder:text-gray-500 dark:placeholder:text-gray-200">
                                </div>
                                <div x-show="!comment.plus">
                                    <p class="w-11/12 text-justify mx-4 mb-4 text-gray-800 text-lg font-light dark:text-white text-left"
                                        x-text="comment.message"></p>
                                </div>
                            </div>
                            <div class="w-1/12 my-auto mx-auto">
                                <template x-if="comment.plus">
                                    <button @click="delete_comment(comment.id)"
                                        class="rounded text-white bg-rose-500 px-4 h-10">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            <template x-if="no_comments">
                <div class="my-5">
                    <p class="ml-5 text-gray-800 font-bold text-xl">Sin comentarios</p>
                </div>
            </template>
        </div>
        <br>
    </div>
    <template x-if="deleted_comment">
        <div x-init="deleted_comment_alert()"></div>
    </template> --}}
</div>

<script>
    function show_news() {
        return {
            data_news: @entangle('data_news'),
            user_editor: @entangle('user_editor')
        }
    }

    function comments() {
        return {
            comments: @entangle('comments'),
            comments_verified: [],
            message: '',
            user_editor: @entangle('user_editor'),
            auth_user_id: @entangle('auth_user_id'),
            auth_user_name: @entangle('auth_user_name'),
            auth_user_profile_photo_path: @entangle('auth_user_profile_photo_path'),
            data_news: @entangle('data_news'),
            new_comment: @entangle('new_comment'),
            deleted_comment: @entangle('deleted_comment'),
            edit_comment: false,
            no_comments: true,
            add() {
                Livewire.emit('add_comment', this.message, this.data_news[0].id);
                this.message = '';
            },
            verify_owner() {
                for (let index = 0; index < this.comments.length; index++) {
                    if (this.comments[index].user_id == this.auth_user_id) {
                        this.comments[index].plus = true;
                        this.comments[index].editModel = false;
                    } else {
                        this.comments[index].plus = false;
                    }
                }
                this.comments_verified = this.comments;
                console.log('comments verified: ', this.comments_verified);
            },
            delete_comment(comment_id) {
                Swal.fire({
                    icon: 'question',
                    title: '¿Desea eliminar este comentario?',
                    confirmButtonText: 'Cancelar acción',
                    showDenyButton: true,
                    denyButtonText: 'Eliminar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire('Eliminación cancelada.', '', 'info')
                    } else if (result.isDenied) {
                        Livewire.emit('delete_comment', comment_id);
                    }
                })
            },
            deleted_comment_alert() {
                Swal.fire('¡Comentario eliminado correctamente!', '', 'success');
                this.verify_owner();
                Livewire.emit('confirm_alert_deleted');
            },
            update_comment(comment_id, message) {
                Livewire.emit('update_comment', comment_id, message);
            }
        }
    }
</script>
