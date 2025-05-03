<footer class="relative z-10 bg-gradient-to-r bg-blue-600 pb-10 pt-20 lg:pb-20 lg:pt-[120px] dark:bg-dark">
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-between -mx-4">
            <div class="w-full px-4 sm:w-2/3 lg:w-3/12">
                <div class="mb-10">
                    <div class="flex items-center space-x-2 text-2xl">
                        <img src="{{ asset('assets/logo.png') }}" class="h-10 mb-4" alt="upms Logo" />
                        <span class="text-3xl mb-4 font-semibold leading-[1.208] bg-clip-text text-white">
                            {{ env('APP_NAME') }}
                        </span>
                    </div>
                    <p class="text-base text-white mb-7 text-body-color">
                        For monitoring projects throughout the life cycle,
                        as part of the ADB-assisted West Bengal Public Finance Management Reforms Program.
                    </p>
                    {{-- <p class="flex items-center text-sm font-medium text-white text-dark">
                        <span class="mr-3 text-primary">
                            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 3l-6 6m0 0V4m0 5h5M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z"></path>
                            </svg>
                        </span>
                        <span></span>
                    </p> --}}
                </div>

            </div>

            <div class="w-full px-4 sm:w-1/2 lg:w-2/12">
                <div class="w-full mb-10">
                    <h4 class="mb-5 text-lg font-semibold text-white ">
                        Quick Links
                    </h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="javascript:void(0)"
                                class="inline-block text-base leading-loose text-white text-body-color hover:text-primary">
                                Features
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"
                                class="inline-block text-base leading-loose text-white text-body-color hover:text-primary">
                                Our Services
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"
                                class="inline-block text-base leading-loose text-white text-body-color hover:text-primary">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"
                                class="inline-block text-base leading-loose text-white text-body-color hover:text-primary">
                                Testimonials
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="w-full px-4 sm:w-1/2 lg:w-3/12">
                <div class="flex gap-4 mb-4">
                    <img src="{{ asset('assets/ifms.jpeg') }}" class="w-auto h-12" alt="IFMS Logo" />
                    <img src="{{ asset('assets/nics1.png') }}" class="w-12 h-auto p-1 bg-sky-600" alt="NICS Logo" />
                </div><br>
                <p class="text-base text-white text-body-color">
                    &copy; Copyright @ West Bengal State Centre , Developed and hosted by National Informatics Centre
                    kolkata,
                    Ministry of Electronics & Information Technology, Government of India
                </p>
            </div>
        </div>
    </div>
    </div>
</footer>
