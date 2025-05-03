<style>
    .bg-blue-900 {
        --tw-bg-opacity: 1;
        background-color: rgb(7 60 100);
    }
</style>
<header class="sticky top-0 z-20 flex h-16 shadow bg-slate-100 ">
    <div class="container flex items-center justify-between h-full py-2 mx-auto sm:flex-row">
        <div class="flex items-center justify-between w-full sm:justify-start">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('assets/West-Bengal.png') }}" class="h-14" alt="upms Logo" />
                <span class="p-0 leading-[1.208] bg-clip-text text-transparent bg-blue-900">
                    {{ env('APP_GOV_NAME') ?? 'Government of West Bengal' }}
                </span>
            </div>
            <button class="block px-4 py-2 text-blue-900 sm:hidden" id="hamburger-button">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>
        <nav class="items-center hidden space-x-4 text-blue-900 sm:flex" id="nav-menu">
            <a class="px-4 py-2 hover:bg-blue-900 hover:text-white page-scroll" href="#services">Services</a>
            <a class="px-4 py-2 hover:bg-blue-900 hover:text-white" href="#features">Features</a>
            <a class="px-4 py-2 hover:bg-blue-900 hover:text-white no-wrap inline-block min-w-[120px]"
                href="#contact">Contact Us</a>
            <div class="relative cursor-pointer nav-item" x-data="{ show: false, toggle() { this.show = !this.show }, close() { this.show = false } }" x-on:click.away="close">
                <span class="flex items-center select-none page-scroll" x-on:click="toggle">
                    Documentation
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9"
                        stroke="currentColor"
                        class="inline-block w-4 h-4 ml-1 align-middle transition-transform duration-300"
                        :class="{ 'rotate-180': show }">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </span>

                <!-- Dropdown Content -->
                <div x-show="show" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute left-0 z-30 w-56 mt-2 origin-top-left bg-white border border-gray-200 rounded-lg shadow-lg"
                    style="display: none;">
                    <div class="relative p-2 overflow-auto rounded-lg max-h-60 soft-scrollbar">
                        <a href="{{ asset('documentation/UPMS_Project_Documentation_&_User_Manual.pdf') }}"
                            class="flex items-center px-4 py-2 text-sm transition-colors duration-150 rounded-md hover:bg-blue-100 hover:text-blue-900">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-5 h-5 mr-2">
                                <path
                                    d="M10.75 2.75a.75.75 0 00-1.5 0v8.614L6.295 8.235a.75.75 0 10-1.09 1.03l4.25 4.5a.75.75 0 001.09 0l4.25-4.5a.75.75 0 00-1.09-1.03l-2.955 3.129V2.75z" />
                                <path
                                    d="M3.5 12.75a.75.75 0 00-1.5 0v2.5A2.75 2.75 0 004.75 18h10.5A2.75 2.75 0 0018 15.25v-2.5a.75.75 0 00-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5z" />
                            </svg>
                            User Manual
                        </a>
                        <a href="{{ asset('documentation/UPMS_SOR_PREPARATION.pdf') }}"
                            class="flex items-center px-4 py-2 text-sm transition-colors duration-150 rounded-md hover:bg-blue-100 hover:text-blue-900">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-5 h-5 mr-2">
                                <path
                                    d="M10.75 2.75a.75.75 0 00-1.5 0v8.614L6.295 8.235a.75.75 0 10-1.09 1.03l4.25 4.5a.75.75 0 001.09 0l4.25-4.5a.75.75 0 00-1.09-1.03l-2.955 3.129V2.75z" />
                                <path
                                    d="M3.5 12.75a.75.75 0 00-1.5 0v2.5A2.75 2.75 0 004.75 18h10.5A2.75 2.75 0 0018 15.25v-2.5a.75.75 0 00-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5z" />
                            </svg>
                            SOR Preparation
                        </a>
                        {{-- <a href="{{ asset('documentation/PROJECT_CREATION_&_ESTIMATE_MANUAL.pdf') }}"
                            class="flex items-center px-4 py-2 text-sm transition-colors duration-150 rounded-md hover:bg-blue-100 hover:text-blue-900">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-5 h-5 mr-2">
                                <path
                                    d="M10.75 2.75a.75.75 0 00-1.5 0v8.614L6.295 8.235a.75.75 0 10-1.09 1.03l4.25 4.5a.75.75 0 001.09 0l4.25-4.5a.75.75 0 00-1.09-1.03l-2.955 3.129V2.75z" />
                                <path
                                    d="M3.5 12.75a.75.75 0 00-1.5 0v2.5A2.75 2.75 0 004.75 18h10.5A2.75 2.75 0 0018 15.25v-2.5a.75.75 0 00-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5z" />
                            </svg>
                            Project & Estimate
                        </a> --}}
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="absolute right-0 hidden w-48 shadow-lg top-full bg-slate-100 sm:hidden" id="nav-menu-mobile">
        <nav class="flex flex-col items-start text-blue-900">
            <a class="block px-4 py-2 hover:bg-blue-900 hover:text-white" href="#features">Features</a>
            <a class="block px-4 py-2 hover:bg-blue-900 hover:text-white" href="#services">Services</a>
            <a class="px-4 py-2 hover:bg-blue-900 hover:text-white no-wrap inline-block min-w-[120px]"
                href="#stats">About Us</a>
            <a class="px-4 py-2 hover:bg-blue-900 hover:text-white no-wrap inline-block min-w-[120px]"
                href="#stats">Documentation</a>


        </nav>
    </div>
</header>

<script>
    document.getElementById('hamburger-button').addEventListener('click', function() {
        const menuMobile = document.getElementById('nav-menu-mobile');
        menuMobile.classList.toggle('hidden');
    });
</script>
