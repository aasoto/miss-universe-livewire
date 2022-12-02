<!-- Footer -->
<footer class="mt-0 md:mt-24">
    <div x-data="footer()">
        <div class="w-full bg-gradient-to-t from-gray-300 dark:from-slate-800 to-transparent px-5 py-7">
            <div class="grid grid-cols-4 gap-5">
                <div class="container col-span-4 md:col-span-1 font-delmon-delicate">
                    <img class="block dark:hidden" :src="`{{$redirect}}${logo_footer_modo_diurno}`" alt="">
                    <img class="hidden dark:block" :src="`{{$redirect}}${logo_footer_modo_nocturno}`" alt="">
                    <div class="mt-10 md:mt-4 w-full flex flex-row justify-evenly">
                        <i class="fa-brands fa-facebook text-gray-700 dark:text-white hover:text-gray-900 dark:hover:bg-white dark:hover:text-blue-800 dark:hover:rounded-full scale-[2] md:scale-125 hover:scale-[2.5] md:hover:scale-150 transition duration-200"
                            title="Facebook"></i>
                        <i class="fa-brands fa-twitter-square text-gray-700 dark:text-white hover:text-gray-900 dark:hover:bg-white dark:hover:text-sky-400 scale-[2] md:scale-125 hover:scale-[2.5] md:hover:scale-150 transition duration-200"
                            title="Twitter"></i>
                        <i class="fa-brands fa-instagram text-gray-700 dark:text-white hover:text-gray-900 dark:hover:text-white dark:hover:rounded-sm dark:hover:bg-gradient-to-t dark:hover:from-amber-400 dark:hover:via-red-700 dark:hover:to-violet-900 scale-[2] md:scale-125 hover:scale-[2.5] md:hover:scale-150 transition duration-200"
                            title="Instagram"></i>
                        <i class="fa-brands fa-tiktok text-gray-700 dark:text-white hover:text-gray-900 dark:hover:bg-white dark:hover:text-gray-900 dark:hover:rounded-full dark:hover:p-0.5 scale-[2] md:scale-125 hover:scale-[2.5] md:hover:scale-150 transition duration-200"
                            title="Tiktok"></i>
                    </div>
                </div>
                <div class="col-span-4 md:col-span-1 text-center md:text-left">
                    <h4 class="ml-0 md:-ml-5 mt-5 md:mt-0 mb-3 text-3xl md:text-xl font-bold text-gray-800 dark:text-white">
                        Ediciones</h4>
                    <ul class="list-none md:list-disc">
                        <li>
                            <a href="#">
                                <span
                                    class="text-base font-normal text-gray-800 dark:text-white hover:underline hover:text-rose-800 dark:hover:text-rose-300">Miss
                                    Universo</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span
                                    class="text-base font-normal text-gray-800 dark:text-white hover:underline hover:text-rose-800 dark:hover:text-rose-300">Miss
                                    Mundo</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span
                                    class="text-base font-normal text-gray-800 dark:text-white hover:underline hover:text-rose-800 dark:hover:text-rose-300">Miss
                                    Internacional</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span
                                    class="text-base font-normal text-gray-800 dark:text-white hover:underline hover:text-rose-800 dark:hover:text-rose-300">Miss
                                    Gran International</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span
                                    class="text-base font-normal text-gray-800 dark:text-white hover:underline hover:text-rose-800 dark:hover:text-rose-300">Miss
                                    Tierra</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-span-4 md:col-span-1 text-center md:text-left">
                    <h4 class="ml-0 md:-ml-5 mt-5 md:mt-0 mb-3 text-3xl md:text-xl font-bold text-gray-800 dark:text-white">
                        Noticias</h4>
                    <ul class="list-none md:list-disc">
                        <li>
                            <a href="#">
                                <span
                                    class="text-base font-normal text-gray-800 dark:text-white hover:underline hover:text-rose-800 dark:hover:text-rose-300">Comités
                                    nacionales</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span
                                    class="text-base font-normal text-gray-800 dark:text-white hover:underline hover:text-rose-800 dark:hover:text-rose-300">Elección
                                    de candidatas</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span
                                    class="text-base font-normal text-gray-800 dark:text-white hover:underline hover:text-rose-800 dark:hover:text-rose-300">Gestión
                                    de actuales reinas</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span
                                    class="text-base font-normal text-gray-800 dark:text-white hover:underline hover:text-rose-800 dark:hover:text-rose-300">Rumores</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span
                                    class="text-base font-normal text-gray-800 dark:text-white hover:underline hover:text-rose-800 dark:hover:text-rose-300">Otros</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-span-4 md:col-span-1 text-center md:text-left">
                    <h4 class="ml-0 md:-ml-5 mt-5 md:mt-0 mb-3 text-3xl md:text-xl font-bold text-gray-800 dark:text-white">
                        Estadisticas</h4>
                    <ul class="list-none md:list-disc">
                        <li>
                            <a href="#">
                                <span
                                    class="text-base font-normal text-gray-800 dark:text-white hover:underline hover:text-rose-800 dark:hover:text-rose-300">Records</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span
                                    class="text-base font-normal text-gray-800 dark:text-white hover:underline hover:text-rose-800 dark:hover:text-rose-300">Listado
                                    candidatas</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span
                                    class="text-base font-normal text-gray-800 dark:text-white hover:underline hover:text-rose-800 dark:hover:text-rose-300">Listado
                                    paises</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-5">
                <p class="text-base font-normal text-gray-800 dark:text-white text-center">
                    Todos los derechos reservados. Copyright © 2022 Andrés Soto Suárez.
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- fin Footer -->
<script>
    function footer() {
        return {
            logo_footer_modo_diurno: "../storage/app/public/images/web/footer/logo-BPproject2x1-fuente-negro.svg",
            logo_footer_modo_nocturno: "../storage/app/public/images/web/footer/logo-BPproject2x1-fuente-blanco.svg"
        }
    }
</script>
