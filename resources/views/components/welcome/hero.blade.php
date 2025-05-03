<style>
    .gradient-banner {
        /* padding: 75px 0 75px; */
        position: relative;
        overflow: hidden;
        background-image: linear-gradient(45deg, #056780 0%, #063964 20%, #073c64 50%);
    }

    .gradient-banner::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100px;
        /* Height of the curve */
        background: inherit;
        /* Use the gradient background from parent */
        border-top-left-radius: 100% 50px;
        /* Adjust the radius for curve style */
        border-top-right-radius: 100% 50px;
        /* Adjust the radius for curve style */
        transform: translateY(50%);
        /* Adjust to position the curve */
        z-index: -1;
        /* Ensure the curve is behind the content */
    }

    .shapes-container {
        /* position: absolute;
        overflow: hidden; */
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 0;
        /* Ensure it's below the button */
    }

    .shape {
        position: absolute;
    }

    .shape::before {
        content: '';
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(255, 255, 255, .1);
        transform: rotate(-35deg);
        position: absolute;
        border-radius: 50px;
    }

    .shape:nth-child(1) {
        top: 2%;
        left: 11%;
        width: 400px;
        height: 70px;
    }

    .shape:nth-child(2) {
        top: 14%;
        left: 18%;
        width: 200px;
        height: 15px;
    }

    .shape:nth-child(3) {
        top: 80%;
        left: 4%;
        width: 300px;
        height: 60px;
    }

    .shape:nth-child(4) {
        top: 85%;
        left: 15%;
        width: 100px;
        height: 10px;
    }

    .shape:nth-child(5) {
        top: 5%;
        left: 50%;
        width: 300px;
        height: 25px;
    }

    .shape:nth-child(6) {
        top: 4%;
        left: 52%;
        width: 200px;
        height: 5px;
    }

    .shape:nth-child(7) {
        top: 80%;
        left: 70%;
        width: 200px;
        height: 5px;
    }

    .shape:nth-child(8) {
        top: 55%;
        left: 95%;
        width: 200px;
        height: 5px;
    }

    .shape:nth-child(9) {
        top: 50%;
        left: 90%;
        width: 300px;
        height: 50px;
    }

    .shape:nth-child(10) {
        top: 30%;
        left: 60%;
        width: 500px;
        height: 55px;
    }

    .shape:nth-child(11) {
        top: 60%;
        left: 60%;
        width: 200px;
        height: 5px;
    }

    .shape:nth-child(12) {
        top: 35%;
        left: 75%;
        width: 200px;
        height: 5px;
    }

    .shape:nth-child(13) {
        top: 90%;
        left: 40%;
        width: 300px;
        height: 45px;
    }

    .shape:nth-child(14) {
        top: 54%;
        left: 75%;
        width: 200px;
        height: 5px;
    }

    .shape:nth-child(15) {
        top: 50%;
        left: 90%;
        width: 200px;
        height: 5px;
    }

    .shape:nth-child(16) {
        top: 50%;
        left: 81%;
        width: 100px;
        height: 5px;
    }

    .container {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }

    .btn-main-md {
        display: inline-block;
        padding: 17px 38px;
        border-radius: 3px;
        background-color: #f39f86;
        background-image: linear-gradient(315deg, #f39f86 0%, #f9d976 74%);
        text-align: center;
        text-decoration: none;
        /* Remove underline */
        outline: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
        position: relative;
        z-index: 10;
        /* Ensure it's above the shapes container */
    }

    .btn-main-reg {
        display: inline-block;
        padding: 17px 38px;
        border-radius: 3px;
        background-color: #5d7af0;
        /* background-image: linear-gradient(315deg, #f39f86 0%, #f9d976 74%); */
        text-align: center;
        text-decoration: none;
        /* Remove underline */
        outline: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
        position: relative;
        z-index: 10;
        /* Ensure it's above the shapes container */
    }

    /* Responsive adjustments */
    @media (max-width: 767px) {
        .gradient-banner {
            padding: 60px 0 0px;
            /* Adjust the height for smaller screens */
        }

        .btn-main-md {
            padding: 12px 24px;
            /* Adjust button padding for smaller screens */
        }
    }
</style>

<div class="section gradient-banner">
    {{-- <div class=" absolute left-[3%] mx-10">
        <img src="{{ asset('assets/West-Bengal.png') }}" class="h-20" />
    </div> --}}
    <div class="shapes-container">
        <div class="shape aos-init aos-animate" data-aos="fade-down-left" data-aos-duration="1500" data-aos-delay="100">
        </div>
        <div class="shape aos-init aos-animate" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100"></div>
        <div class="shape aos-init aos-animate" data-aos="fade-up-right" data-aos-duration="1000" data-aos-delay="200">
        </div>
        <div class="shape aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200"></div>
        <div class="shape aos-init aos-animate" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100">
        </div>
        <div class="shape aos-init aos-animate" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100">
        </div>
        <div class="shape aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300"></div>
        <div class="shape aos-init aos-animate" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="200">
        </div>
        <div class="shape aos-init aos-animate" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="100">
        </div>
        <div class="shape aos-init aos-animate" data-aos="zoom-out" data-aos-duration="2000" data-aos-delay="500"></div>
        <div class="shape aos-init aos-animate" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="200">
        </div>
        <div class="shape aos-init aos-animate" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="100">
        </div>
        <div class="shape aos-init aos-animate" data-aos="fade-up" data-aos-duration="500" data-aos-delay="0"></div>
        <div class="shape aos-init aos-animate" data-aos="fade-down" data-aos-duration="500" data-aos-delay="0"></div>
        <div class="shape aos-init aos-animate" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="100">
        </div>
        <div class="shape aos-init aos-animate" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="0">
        </div>
    </div>
    <div class="container">
        <div class="container mx-auto mb-20">
            <div class="flex flex-wrap items-center -mx-4">
                <div class="w-full px-4 lg:w-5/12">
                    <div class="flex flex-col justify-center text-center hero-content items-left lg:text-left">
                        <h1
                            class="flex gap-2.5 items-center mb-2 text-xl font-bold !leading-[1.208] text-inherit sm:text-[42px] lg:text-[40px] text-white mr-[100px]">
                            {{ env('APP_NAME') }}
                            <img src="{{ asset('assets/logo.png') }}" class="h-10" alt="upms Logo" />
                        </h1>
                        <h1 class="mb-5 text-lg font-semibold text-white whitespace-nowrap">
                            {{ env('APP_FULL_NAME') }}
                        </h1>
                        <p class="mb-8 max-w-[480px] text-base text-gray-200">
                            The Unified Project Management System (UPMS) enables the Government of West Bengal to manage
                            project estimates and progress seamlessly, improving efficiency and accountability across
                            multiple departments.
                        </p>
                        <ul class="flex flex-wrap items-center justify-center lg:justify-start">
                            <li class="mr-4">
                                <a href="{{ route('login') }}"
                                    class="font-extrabold text-gray-800 rounded shadow-lg btn-main-md lg:mx-0 hover:underline md:my-6 gradient2">
                                    Get Started
                                </a>
                            </li>
                            @if (env('APP_ENV') == 'production')
                                <li>
                                    <a href="{{ route('register') }}"
                                        class="font-extrabold text-gray-800 rounded shadow-lg lg:mx-0 hover:underline md:my-6 btn-main-reg">
                                        Register
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="hidden px-4 lg:block lg:w-1/12"></div>
                <div class="w-full px-4 lg:w-6/12">
                    <div class="lg:ml-auto lg:text-right">
                        <div class="relative z-10 inline-block pt-11 lg:pt-0">
                            <img src="{{ asset('assets/hero.png') }}" alt="hero" class="w-full rounded-sm" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
