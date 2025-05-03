<div>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ env('APP_NAME', 'Laravel') }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}">

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

        @livewireStyles
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/css/utils.css'])


        <style>
            /* latin */
            @font-face {
                font-family: 'Figtree';
                font-style: normal;
                font-weight: 400;
                font-stretch: 100%;
                font-display: swap;
                src: url({{ Vite::asset('resources/fonts/figtree-latin-400-normal.woff2') }}) format('woff2');
                unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }

            /* latin-ext */
            @font-face {
                font-family: 'Figtree';
                font-style: normal;
                font-weight: 400;
                font-stretch: 100%;
                font-display: swap;
                src: url({{ Vite::asset('resources/fonts/figtree-latin-ext-400-normal.woff2') }}) format('woff2');
                unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }

            /* latin */
            @font-face {
                font-family: 'Figtree';
                font-style: normal;
                font-weight: 600;
                font-stretch: 100%;
                font-display: swap;
                src: url({{ Vite::asset('resources/fonts/figtree-latin-600-normal.woff2') }}) format('woff2');
                unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }

            /* latin-ext */
            @font-face {
                font-family: 'Figtree';
                font-style: normal;
                font-weight: 600;
                font-stretch: 100%;
                font-display: swap;
                src: url({{ Vite::asset('resources/fonts/figtree-latin-ext-600-normal.woff2') }}) format('woff2');
                unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20C0, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }

            .main-scrollbar::-webkit-scrollbar {
                cursor: pointer;
                height: 0.5rem;
                width: 0.5rem;
            }

            .main-scrollbar::-webkit-scrollbar-track {
                /* background-color: #e2e8f0; */
                cursor: pointer;
            }

            .main-scrollbar::-webkit-scrollbar-thumb {
                background-color: #a1a1aa;
                border-radius: 1rem;
                cursor: pointer;
            }

            .hide-scrollbar::-webkit-scrollbar {
                display: none
            }

            .hide-scrollbar {
                -ms-overflow-style: none;
                scrollbar-width: none
            }

            .soft-scrollbar::-webkit-scrollbar {
                cursor: pointer;
                height: 4px;
                width: 4px
            }

            .soft-scrollbar::-webkit-scrollbar-track {
                background-color: #e2e8f0;
                cursor: pointer
            }

            .soft-scrollbar::-webkit-scrollbar-thumb {
                background-color: #94a3b8;
                cursor: pointer
            }

            .bg-pattern {
                @apply bg-slate-300;
                background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M54.627 0l.83.828-1.415 1.415L51.8 0h2.827zM5.373 0l-.83.828L5.96 2.243 8.2 0H5.374zM48.97 0l3.657 3.657-1.414 1.414L46.143 0h2.828zM11.03 0L7.372 3.657 8.787 5.07 13.857 0H11.03zm32.284 0L49.8 6.485 48.384 7.9l-7.9-7.9h2.83zM16.686 0L10.2 6.485 11.616 7.9l7.9-7.9h-2.83zm20.97 0l9.315 9.314-1.414 1.414L34.828 0h2.83zM22.344 0L13.03 9.314l1.414 1.414L25.172 0h-2.83zM32 0l12.142 12.142-1.414 1.414L30 .828 17.272 13.556l-1.414-1.414L28 0h4zM.284 0l28 28-1.414 1.414L0 2.544V0h.284zM0 5.373l25.456 25.455-1.414 1.415L0 8.2V5.374zm0 5.656l22.627 22.627-1.414 1.414L0 13.86v-2.83zm0 5.656l19.8 19.8-1.415 1.413L0 19.514v-2.83zm0 5.657l16.97 16.97-1.414 1.415L0 25.172v-2.83zM0 28l14.142 14.142-1.414 1.414L0 30.828V28zm0 5.657L11.314 44.97 9.9 46.386l-9.9-9.9v-2.828zm0 5.657L8.485 47.8 7.07 49.212 0 42.143v-2.83zm0 5.657l5.657 5.657-1.414 1.415L0 47.8v-2.83zm0 5.657l2.828 2.83-1.414 1.413L0 53.456v-2.83zM54.627 60L30 35.373 5.373 60H8.2L30 38.2 51.8 60h2.827zm-5.656 0L30 41.03 11.03 60h2.828L30 43.858 46.142 60h2.83zm-5.656 0L30 46.686 16.686 60h2.83L30 49.515 40.485 60h2.83zm-5.657 0L30 52.343 22.343 60h2.83L30 55.172 34.828 60h2.83zM32 60l-2-2-2 2h4zM59.716 0l-28 28 1.414 1.414L60 2.544V0h-.284zM60 5.373L34.544 30.828l1.414 1.415L60 8.2V5.374zm0 5.656L37.373 33.656l1.414 1.414L60 13.86v-2.83zm0 5.656l-19.8 19.8 1.415 1.413L60 19.514v-2.83zm0 5.657l-16.97 16.97 1.414 1.415L60 25.172v-2.83zM60 28L45.858 42.142l1.414 1.414L60 30.828V28zm0 5.657L48.686 44.97l1.415 1.415 9.9-9.9v-2.828zm0 5.657L51.515 47.8l1.414 1.413 7.07-7.07v-2.83zm0 5.657l-5.657 5.657 1.414 1.415L60 47.8v-2.83zm0 5.657l-2.828 2.83 1.414 1.413L60 53.456v-2.83zM39.9 16.385l1.414-1.414L30 3.658 18.686 14.97l1.415 1.415 9.9-9.9 9.9 9.9zm-2.83 2.828l1.415-1.414L30 9.313 21.515 17.8l1.414 1.413 7.07-7.07 7.07 7.07zm-2.827 2.83l1.414-1.416L30 14.97l-5.657 5.657 1.414 1.415L30 17.8l4.243 4.242zm-2.83 2.827l1.415-1.414L30 20.626l-2.828 2.83 1.414 1.414L30 23.456l1.414 1.414zM56.87 59.414L58.284 58 30 29.716 1.716 58l1.414 1.414L30 32.544l26.87 26.87z' fill='%23cacaca' fill-opacity='0.2' fill-rule='evenodd'/%3E%3C/svg%3E");
            }

            .bg-img {
                position: relative;
                background-image: url("{{ asset('assets/background.min.svg') }}");
                background-repeat: no-repeat;
                background-size: cover;
                min-height: 90vh;
            }

            .bg-img::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                z-index: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(255, 255, 255, 0.9);
                /* Change 0.7 to your desired transparency level */
            }

            [x-cloak] {
                display: none !important;
            }
        </style>
    </head>

    <body class="font-sans antialiased bg-gray-50 bg-img">
        @include('layouts.top-navigation')
        <div class="relative flex-grow min-h-screen overflow-y-hidden dark:bg-gray-800">
            {{-- Top Navigation --}}
            {{-- <div class="bg-img"> --}}
            <div class="h-full px-4 mt-1">
                <header>
                    <div
                        class="px-4 mt-5 mb-4 dark:bg-gray-800 relative dark:border-[#444444] flex-wrap z-[1]  dark:text-white h-14">
                        {{ $header }}
                    </div>

                </header>
                <main class="px-4 mt-4">

                    <div class="pt-2 mb-6">
                        <div class="max-w-full ">
                            {{ $slot }}
                        </div>
                    </div>
                </main>
            </div>
        </div>
</div>
{{-- App Scripts --}}
@vite(['resources/js/app.js'])
@livewireScripts
@stack('scripts')
</body>

</html>

</div>
