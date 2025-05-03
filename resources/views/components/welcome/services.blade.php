<style>
    .single-line {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100%;

    }

    .pb-110 {
        padding-bottom: 110px;
    }

    /* Remove padding-bottom on screens smaller than 768px (or adjust as needed) */
    @media (max-width: 767px) {
        .pb-110 {
            padding-bottom: 0;
        }
    }

    .bg-sky-200 {
        --tw-bg-opacity: 1;
        background-color: rgb(32 79 116 / 88%);
    }

    .bg-blue-600 {
        --tw-bg-opacity: 1;
        background-color: rgb(56 99 133);
    }

    .border-blue-500 {
        --tw-border-opacity: 1;
        border-color: rgb(6 59 100);
    }

    .text-blue-600 {
        color: rgb(56 99 133);
    }
</style>

<section id=services class="sticky top-0 pb-110px pt-[45px] lg:pt-[45px] dark:bg-dark bg-gradient-to-r from-indigo-100 to-cyan-50">
    <div class="container mx-auto wow fadeInDown" data-wow-delay=0.3s>
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4">
                <div class="mx-auto mb-12 text-center lg:mb-20">
                    {{-- <span class="block mb-2 text-lg font-semibold text-blue-600">
                        Our Services
                    </span> --}}
                    <h2
                        class="mb-3 single-line text-3xl font-bold leading-[1.2] text-dark sm:text-4xl md:text-[40px] dark:text-white">
                        Our Services
                    </h2>
                    <p class="text-base text-body-color text-grey-50">
                        Introducing our comprehensive project monitoring portal designed to oversee all projects for
                        both works and non-works departments of GoWB throughout their lifecycle. This unified platform
                        integrates with WB-IFMS for AAFS, HRMS, and e-Billing, and connects with e-Procurement, GEM, and
                        eFile (subject to secure API availability). It features a dynamic workflow tailored for various
                        departments to prepare, execute, and monitor projects effectively. Our solution includes robust
                        vendor and contractor management facilities, milestone setting and evaluation for tracking
                        physical and financial progress, and a mobile app for field-level progress measurement and
                        document uploads. Additionally, it offers detailed MIS reports for diverse functional modules,
                        all built using open-source technology.
                    </p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap -mx-4 text-white">
            <!-- Additional Service Block 3 -->
            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div
                    class="mb-9 rounded-[20px] bg-sky-200 p-10 shadow-2 hover:shadow-lg md:px-7 xl:px-10 dark:bg-dark-2">
                    <div class="mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl bg-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36" height="36"
                            fill="white">
                            <path d="M12 2L2 12h4v8h4v-4h4v4h4v-8h4L12 2z" />
                        </svg>
                    </div>
                    <h4 class="mb-[14px] text-2xl single-line font-semibold text-dark dark:text-white">
                        Centralized Monitoring
                    </h4>
                    <div class="h-40 overflow-y-auto" x-data="{ expanded4: false, fullText: 'Our vendor management service streamlines the process of engaging and managing vendors. It includes vendor registration, performance monitoring, and contract management to ensure a smooth procurement process.', shortenedText: '' }" x-init="shortenedText = fullText.split(' ').slice(0, 25).join(' ') + (fullText.split(' ').length > 25 ? '...' : '')">
                        <p x-show="!expanded4" class="text-body-color dark:text-dark-6">
                            <span x-text="shortenedText">
                                UPMS provides a unified platform for real-time tracking of project progress across
                                different departments, facilitating better coordination and timely decision-making.
                            </span>
                            <button @click="expanded4 = !expanded4" class="ml-2 font-semibold text-slate-400">Read
                                More</button>
                        </p>
                        {{-- <p x-show="expanded4" class="text-body-color dark:text-dark-6">
                            <span x-text="fullText"></span>
                            <button @click="expanded4 = !expanded4" class="ml-2 font-semibold text-slate-400">Read Less</button>
                        </p> --}}
                    </div>
                </div>
            </div>

            <!-- Additional Service Block 4 -->
            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div
                    class="mb-9 rounded-[20px] bg-sky-200 p-10 shadow-2 hover:shadow-lg md:px-7 xl:px-10 dark:bg-dark-2">
                    <div class="mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl bg-teal-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36" height="36"
                            fill="white">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z" />
                        </svg>
                    </div>
                    <h4 class="mb-[14px] text-2xl single-line font-semibold text-dark dark:text-white">
                        Business Process Re-engineering
                    </h4>
                    <div class="h-40 overflow-y-auto" x-data="{ expanded5: false, fullText: 'Our risk management service identifies, assesses, and mitigates risks associated with projects. It includes tools for risk assessment, monitoring, and response planning to ensure that potential issues are addressed proactively.', shortenedText: '' }" x-init="shortenedText = fullText.split(' ').slice(0, 25).join(' ') + (fullText.split(' ').length > 25 ? '...' : '')">
                        <p x-show="!expanded5" class="text-body-color dark:text-dark-6">
                            <span x-text="shortenedText">The system involves re-engineering existing business processes
                                to streamline operations, reduce redundancies, and improve efficiency in project
                                execution.</span>
                            <button @click="expanded5 = !expanded5" class="ml-2 font-semibold text-slate-400">Read
                                More</button>
                        </p>
                        {{-- <p x-show="expanded5" class="text-body-color dark:text-dark-6">
                            <span x-text="fullText"></span>
                            <button @click="expanded5 = !expanded5" class="ml-2 font-semibold text-slate-400">Read Less</button>
                        </p> --}}
                    </div>
                </div>
            </div>

            <!-- Additional Service Block 5 -->
            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div
                    class="mb-9 rounded-[20px] bg-sky-200  p-10 shadow-2 hover:shadow-lg md:px-7 xl:px-10 dark:bg-dark-2">
                    <div class="mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl bg-orange-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36" height="36"
                            fill="white">
                            <path d="M12 2L2 22h20L12 2zm0 3.27L16.82 19H7.18L12 5.27z" />
                        </svg>
                    </div>
                    <h4 class="mb-[14px] text-2xl single-line font-semibold text-dark dark:text-white">
                        Standardization of Forms and Procedures:
                    </h4>
                    <div class="h-40 overflow-y-auto" x-data="{ expanded6: false, fullText: 'Our compliance management service ensures that projects adhere to regulatory requirements and organizational policies. It includes tools for tracking compliance, managing documentation, and reporting on adherence.', shortenedText: '' }" x-init="shortenedText = fullText.split(' ').slice(0, 25).join(' ') + (fullText.split(' ').length > 25 ? '...' : '')">
                        <p x-show="!expanded6" class="text-body-color dark:text-dark-6">
                            <span x-text="shortenedText">By standardizing documentation and procedures, UPMS ensures
                                consistency and clarity in project management practices across various
                                departments.</span>
                            <button @click="expanded6 = !expanded6" class="ml-2 font-semibold text-slate-400">Read
                                More</button>
                        </p>
                        {{-- <p x-show="expanded6" class="text-body-color dark:text-dark-6">
                            <span x-text="fullText"></span>
                            <button @click="expanded6 = !expanded6" class="ml-2 font-semibold text-slate-400">Read Less</button>
                        </p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
