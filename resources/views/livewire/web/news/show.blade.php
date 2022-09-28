<div x-data="show_news()">
    <div class="h-full"
        style="background-image: url('../../../storage/app/public/images/news/cover-1.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center center;">
        <div class="mx-10 md:mx-20 pt-24 lg:pt-32">
            <h1 class="text-center font-bold text-white drop-shadow-lg shadow-black text-2xl md:text-3xl lg:text-5xl"
                x-text="data_news[0].title"></h1>
            <h3 class="mt-6 text-center font-semibold md:font-bold text-white drop-shadow-lg shadow-black text-lg md:text-xl lg:text-3xl"
                x-text="data_news[0].subtitle"></h3>
            <div class="invisible">
                <h1 class="text-left font-bold text-white shadow-lg shadow-gray-800 text-xs md:text-base lg:text-3xl">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem deleniti in ad, maxime, dolorum
                    odit dicta blanditiis error similique, magni voluptatum inventore et eum minus consequatur
                    cupiditate facilis delectus est!</h1>
            </div>
        </div>
    </div>
    <div
        class="w-full md:w-11/12 mx-0 mt-0 md:mt-4 lg:-mt-20 md:mx-8 lg:mx-11 xl:mx-14 2xl:mx-16 md:rounded-md bg-white/70 dark:bg-gray-800 backdrop-blur-lg shadow-sm shadow-gray-700">
        <div class="flex flex-col md:flex-row ml-8 mr-8 md:mr-12 pt-5 lg:pt-32">
            <div class="basis-1/4">
                <div class="ml-0 xl:ml-6 sticky top-24 grid grid-cols-1 xl:grid-cols-3">
                    <div class="col-span-1 mx-auto md:mx-0 pb-10">
                        <img class="h-20 w-20 md:h-full md:w-full scale-100 md:scale-50 xl:scale-100 rounded-full"
                            :src="`{{ asset('../storage/app/public') }}/${user_editor[0].profile_photo_path}`"
                            alt="" />
                    </div>
                    <div class="col-span-1 xl:col-span-2 -mt-10 xl:mt-0 mb-3 md:mb-0">
                        <div class="ml-0 xl:ml-3 mt-1 xl:mt-6">
                            <h4 class="text-lg font-bold text-gray-800 dark:text-white text-center xl:text-left"
                                x-text="user_editor[0].name"></h4>
                            <h5 class="text-sm font-light italic text-gray-800 dark:text-white text-center xl:text-left"
                                x-text="data_news[0].date_publish">2022-02-20</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="basis-3/4">
                <img class="rounded-lg"
                    :src="`{{ asset('../storage/app/public/images/news/background') }}/${data_news[0].background}`"
                    alt="">
                <p class="mt-8 text-justify font-medium text-gray-800 text-base lg:text-xl"
                    x-text="`${data_news[0].content}`"></p>
                <p class="mt-8 text-justify font-medium text-gray-800 text-base lg:text-xl"
                    x-text="`${data_news[0].content}`"></p>
                <p class="mt-8 text-justify font-medium text-gray-800 text-base lg:text-xl"
                    x-text="`${data_news[0].content}`"></p>
                <p class="mt-8 text-justify font-medium text-gray-800 text-base lg:text-xl"
                    x-text="`${data_news[0].content}`"></p>
                <p class="mt-8 text-justify font-medium text-gray-800 text-base lg:text-xl"
                    x-text="`${data_news[0].content}`"></p>
            </div>
        </div>
    </div>
</div>
<div x-data="comments()" x-init="verify_owner()">
    <div
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
                                        x-text="comment.message" x-show="!comment.editMode" @click="comment.editMode = true"></p>
                                    <input x-model="comment.message" x-show="comment.editMode" type="text" @keyup.enter="comment.editMode=false; update_comment(comment.id, comment.message)" class="w-11/12 ml-4 my-4 py-2 bg-white dark:bg-gray-800 rounded border border-rose-500 hover:border-rose-800 hover:shadow-sm hover:shadow-rose-400 hover:dark:shadow-white focus:shadow-sm focus:shadow-rose-400 dark:focus:shadow-gray-600 focus:border-2 focus:border-rose-800 placeholder:text-gray-500 dark:placeholder:text-gray-200">
                                </div>
                                <div x-show="!comment.plus">
                                    <p class="w-11/12 text-justify mx-4 mb-4 text-gray-800 text-lg font-light dark:text-white text-left"
                                        x-text="comment.message"></p>
                                </div>
                            </div>
                            <div class="w-1/12 my-auto mx-auto">
                                <template x-if="comment.plus">
                                    <button @click="delete_comment(comment.id)" class="rounded text-white bg-rose-500 px-4 h-10">
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
    </template>
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
            deleted_comment_alert () {
                Swal.fire('¡Comentario eliminado correctamente!', '', 'success');
                this.verify_owner();
                Livewire.emit('confirm_alert_deleted');
            },
            update_comment (comment_id, message) {
                Livewire.emit('update_comment', comment_id, message);
            }
        }
    }
</script>
