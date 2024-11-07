<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>REPEAT GYM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/no-tailwind.css') }}" />

    @yield('meta-data')


    <!-- Start Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/bg/LOGO For Facebook Profile 02.png') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Moul&family=Poppins:ital&family=Rubik+Doodle+Shadow&display=swap,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Siemreap&display=swap"
        rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.3.0/css/glightbox.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/no-tailwind.css') }}">
    <style>
        @font-face {
            font-family: "Costum1";
            src: url('assets/fonts/Raleway-Black.ttf') format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: "Costum2";
            src: url("assets/fonts/Raleway-BlackItalic.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: "Costum3";
            src: url("assets/fonts/Raleway-Bold.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: "Costum4";
            src: url("assets/fonts/Raleway-Medium.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: "Costum5";
            src: url("assets/fonts/Raleway-ExtraBold.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: "Costum6";
            src: url("assets/fonts/Raleway-ExtraBoldItalic.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: "Costum7";
            src: url("assets/fonts/Raleway-ExtraLight.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: "Costum8";
            src: url("assets/fonts/Raleway-SemiBold.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: "Costum9";
            src: url("assets/fonts/Raleway-Italic.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: "Costum10";
            src: url("assets/fonts/FunlandParkOpenJLRegular.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        .light-color-gradient {
            position: relative;
            background-color: #f5f6f7;
            background-image: linear-gradient(54deg,
                    rgba(255, 131, 122, 0.25),
                    rgba(255, 131, 122, 0) 28%),
                linear-gradient(241deg,
                    rgba(239, 152, 207, 0.25),
                    rgba(239, 152, 207, 0) 36%);
        }

        .gradient-bg {
            background: linear-gradient(to right, #06b6d4, #3b82f6);
        }

        .shadow-custom {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1),
                0 2px 4px rgba(0, 0, 0, 0.06);
        }

        .layer {
            transition: transform 0.5s ease-out;
        }

        .layer:hover {
            transform: scale(1.05);
        }

        .image-container:hover .layer {
            transition: transform 0.1s ease-out;
            /* Manually defining the transition */
        }

        .layer {
            pointer-events: none;
            /* Ensuring the layer does not block cursor events */
        }

        .primary2 {
            background-color: #3a3e67;
        }

        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            background: #eee;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 0;
            padding: 0;
        }

        swiper-container {
            width: 100%;
            height: 100%;
        }

        swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-container {
            position: relative;
            overflow: hidden;
        }

        .layer {
            transition: transform 0.3s ease;
        }
    </style>

    <script>
        tailwind.config = {
            darkMode: "class", // Enables dark mode based on class
            theme: {
                extend: {
                    colors: {
                        clifford: "#da373d",
                        primary1: "#43428d",
                        primary2: "#3a3e67",
                        primary3: "#565c6a",
                        text_color1: "#787e8c",
                        text_color2: "#565c6a",
                        warning: "#fab105",
                        warningHover: "#ffb915",
                    },
                },
                fontFamily: {
                    koluen: ["Koulen"],
                    costum1: ["Costum1", "sans-serif"],
                    costum2: ["Costum2", "sans-serif"],
                    costum3: ["Costum3", "sans-serif"],
                    costum4: ["Costum4", "sans-serif"],
                    costum5: ["Costum5", "sans-serif"],
                    costum6: ["Costum6", "sans-serif"],
                    costum7: ["Costum7", "sans-serif"],
                    costum8: ["Costum8", "sans-serif"],
                    costum9: ["Costum9", "sans-serif"],
                    rubik: ["Rubik Doodle Shadow"],
                    Costum10: ["FunlandParkOpen", "Rubik Doodle Shadow"],
                    poppin: ["Poppins"]
                },
            },
        };
    </script>
</head>

<body
    style="
            background-image: url('assets/images/bg/Background\ Home\ Page.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-position-x: center;
        "
    class="text-white bg-[#151515]">
    <!-- Start Navbar -->
    <nav class="bg-[#0b0b0c] text-white fixed w-full z-40 top-0 start-0 ">
        <div class="max-w-screen-xl flex flex-wrap justify-between items-center mx-auto p-4 border-b border-gray-400">
            <!-- Mobile Menu Toggle -->
            <div class="lg:hidden">
                <button id="mobile-menu-button" aria-controls="mobile-menu" aria-expanded="false"
                    class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>

                </button>
            </div>
            {{-- mobile menu --}}
            <div id="mobile-menu"
                class="border fixed top-0 left-0 z-50 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white  w-64 dark:bg-gray-800"
                tabindex="-1" aria-labelledby="drawer-navigation-label">
                <a id="drawer-navigation-label" href="{{ url('/') }}"
                    class="text-center font-semibold  text-gray-500 uppercase dark:text-gray-400">
                    <img src="{{ asset('assets/images/bg/LOGO For Facebook Profile 02.png') }}" class="w-20 mx-auto">
                </a>

                <button type="button" id="close-menu-button" aria-controls="drawer-navigation"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 right-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>

                <div class="py-4 overflow-y-auto border-t">
                    <ul class="space-y-2 font-costum3">

                        <li>
                            <a href="{{ url('/') }}"
                                class="{{ request()->is('/') ? 'decoration-blue-600 underline underline-offset-8 text-blue-600 bg-gray-200' : 'text-black' }} flex items-center p-2  rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <img src="{{ asset('assets/icons/home.png') }}" class="w-5">
                                <span class="ms-3">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/whyrepeatgym') }}"
                                class="{{ request()->is('whyrepeatgym') ? 'decoration-blue-600 underline underline-offset-8 text-blue-600 bg-gray-200' : 'text-black' }} flex items-center p-2  rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <img src="{{ asset('assets/icons/gym.png') }}" class="w-5">
                                <span class="ms-3">WHy Repeat Gym</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/service') }}"
                                class="{{ request()->is('service') ? 'decoration-blue-600 underline underline-offset-8 text-blue-600 bg-gray-200' : 'text-black' }} flex items-center p-2  rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <img src="{{ asset('assets/icons/servicePage.png') }}" class="w-5">
                                <span class="ms-3">Our Services</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/testimonial') }}"
                                class="{{ request()->is('testimonial') ? 'decoration-blue-600 underline underline-offset-8 text-blue-600 bg-gray-200' : 'text-black' }} flex items-center p-2  rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <img src="{{ asset('assets/icons/peopleGym.png') }}" class="w-5">
                                <span class="ms-3">Testimonials</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/tip') }}"
                                class="{{ request()->is('tip') ? 'decoration-blue-600 underline underline-offset-8 text-blue-600 bg-gray-200' : 'text-black' }} flex items-center p-2  rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <img src="{{ asset('assets/icons/peopleGym.png') }}" class="w-5">
                                <span class="ms-3">tips</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/contact_us') }}"
                                class="{{ request()->is('contact_us') ? 'decoration-blue-600 underline underline-offset-8 text-blue-600 bg-gray-200' : 'text-black' }} flex items-center p-2  rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <img src="{{ asset('assets/icons/contact-page.png') }}" class="w-5">
                                <span class="ms-3">Contact Us</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            <!-- Left Side - Contact Info -->
            <div class="hidden md:flex gap-5 items-center space-x-3 md:flex-row">
                <div class="flex gap-8">
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"
                            fill="none" stroke="#11ace3" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-phone">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                        </svg>
                        <span class="text-sm">{{ $footer->phone_number }}</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"
                            fill="none" stroke="#11ace3" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-clock">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                        <span class="text-sm">{{ $footer->working_hours }}</span>
                    </div>
                </div>

            </div>

            <!-- Right Side - Social Media and Menu Button -->
            <div class="flex items-center lg:order-2 gap-2">
                <!-- Social Media - Mobile -->
                <div class=" flex space-x-2 justify-center items-center">
                    @forelse ($links as $item)
                        <a href="{{ $item->link }}">
                            <img src="{{ asset('assets/images/links/' . $item->image) }}" class="w-7" />
                        </a>

                    @empty
                    @endforelse

                </div>
            </div>
        </div>
        <script>
            const menuButton = document.getElementById('mobile-menu-button');
            const closeButton = document.getElementById('close-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            menuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('-translate-x-full');
            });

            closeButton.addEventListener('click', () => {
                mobileMenu.classList.add('-translate-x-full');
            });
        </script>
    </nav>

    <!-- Strat hero -->
    <div class="hidden mt-28 lg:flex flex-col justify-center items-center">
        <!-- Logo Section -->
        <div>
            <img src="{{ asset('assets/images/bg/LOGO For Facebook Profile 02.png') }}" class="w-28" />
        </div>

        <!-- Navigation Menu -->
        <div class="mt-4 md:mt-0 ">
            <ul class="flex flex-wrap justify-center space-x-4 gap-y-3 text-sm font-costum3">
                <li>
                    <a href="{{ url('/') }}"
                        class="{{ request()->is('/') ? ' text-blue-500 pl-2' : ' hover:text-blue-500 text-white pl-2' }}">HOME</a>
                </li>
                <li class="">
                    <a href="{{ url('whyrepeatgym') }}"
                        class="{{ request()->is('whyrepeatgym') ? ' text-blue-500 pl-2 border-l' : ' text-white hover:text-blue-500 border-l pl-2' }}">
                        WHY REPEAT GYM</a>
                </li>
                <li>
                    <a href="{{ url('service') }}"
                        class="{{ request()->is('service') ? ' text-blue-500 pl-2 border-l' : ' text-white hover:text-blue-500 border-l pl-2' }}">OUR
                        SERVICES</a>
                </li>
                <li>
                    <a href="{{ url('/testimonial') }}"
                        class="{{ request()->is('testimonial') ? ' text-blue-500 pl-2 border-l' : ' text-white hover:text-blue-500 border-l pl-2' }}">TESTIMONIALS</a>
                </li>
                <li>
                    <a href="{{ url('/tip') }}"
                        class="{{ request()->is('tip') ? ' text-blue-500 pl-2 border-l' : ' text-white hover:text-blue-500 border-l pl-2' }}">TIPS</a>
                </li>
                <li>
                    <a href="{{ url('contact_us') }}"
                        class="{{ request()->is('contact_us') ? ' text-blue-500 pl-2 border-l' : ' text-white hover:text-blue-500 border-l pl-2' }}">
                        CONTACT US</a>
                </li>
            </ul>
        </div>

    </div>

    <!-- End hero -->
    @yield('content')
    <footer class="bg-[#0b0b0c] mt-20 md:p-8 ">
        <div class="max-w-screen-xl mx-auto p-4">
            <div class="flex flex-col md:flex-row md:justify-between items-start md:space-y-0">
                <div class="flex items-center space-x-3 rtl:space-x-reverse">
                    <div class="space-y-3">
                        <!-- Phone Number -->
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="#11ace3" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                            </svg>
                            <span class="text-[17px]">{{ $footer->phone_number }}</span>
                        </div>
                        <!-- Email -->
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="#11ace3" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail">
                                <rect width="20" height="16" x="2" y="4" rx="2" />
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                            </svg>
                            <span class="text-[17px] font-costum9">{{ $footer->email }}</span>
                        </div>
                    </div>
                </div>

                <!-- Business Hours and Social Media -->
                <div class="flex flex-col items-center md:items-end mt-3">
                    <div class="flex items-center text-sm space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="#11ace3" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-clock">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                        <span class="text-[17px]">{{ $footer->working_hours }}</span>
                    </div>
                    <div class="hidden md:flex space-x-2 justify-center items-center mt-4">
                        @forelse ($links as $item)
                            <a href="{{ $item->link }}">
                                <img src="{{ asset('assets/images/links/' . $item->image) }}" class="w-7" />
                            </a>

                        @empty
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
        </div>

        <hr class="mb-3 border-gray-700 sm:mx-auto  lg:mb-6" />

        <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row justify-between items-center text-white pb-5">
            <div class="text-center md:text-left">
                <span class="text-sm font-costum9">{{ $footer->copyright }}</span>
            </div>
            <div class="mt-4 md:mt-0">
                <ul class="flex flex-wrap justify-center space-x-4 gap-y-3 text-sm font-costum3">
                    <li>
                        <a href="{{ url('/') }}"
                            class="{{ request()->is('/') ? ' text-blue-500 pl-2' : ' hover:text-blue-500 text-white pl-2' }}">HOME</a>
                    </li>
                    <li class="">
                        <a href="{{ url('whyrepeatgym') }}"
                            class="{{ request()->is('whyrepeatgym') ? ' text-blue-500 pl-2 border-l' : ' text-white hover:text-blue-500 border-l pl-2' }}">
                            WHY REPEAT GYM</a>
                    </li>
                    <li>
                        <a href="{{ url('service') }}"
                            class="{{ request()->is('service') ? ' text-blue-500 pl-2 border-l' : ' text-white hover:text-blue-500 border-l pl-2' }}">OUR
                            SERVICES</a>
                    </li>
                    <li>
                        <a href="{{ url('/testimonial') }}"
                            class="{{ request()->is('testimonial') ? ' text-blue-500 pl-2 border-l' : ' text-white hover:text-blue-500 border-l pl-2' }}">TESTIMONIALS</a>
                    </li>
                    <li>
                        <a href="{{ url('/tip') }}"
                            class="{{ request()->is('tip') ? ' text-blue-500 pl-2 border-l' : ' text-white hover:text-blue-500 border-l pl-2' }}">TIPS</a>
                    </li>
                    <li>
                        <a href="{{ url('contact_us') }}"
                            class="{{ request()->is('contact_us') ? ' text-blue-500 pl-2 border-l' : ' text-white hover:text-blue-500 border-l pl-2' }}">CONTACT
                            US</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.3.0/js/glightbox.min.js"></script>
    <script>
        var lightbox = GLightbox();
        lightbox.on("open", (target) => {
            console.log("lightbox opened");
        });
        var lightboxDescription = GLightbox({
            selector: ".glightbox2",
        });
        var lightboxVideo = GLightbox({
            selector: ".glightbox3",
        });
        lightboxVideo.on("slide_changed", ({
            prev,
            current
        }) => {
            console.log("Prev slide", prev);
            console.log("Current slide", current);

            const {
                slideIndex,
                slideNode,
                slideConfig,
                player
            } = current;

            if (player) {
                if (!player.ready) {
                    // If player is not ready
                    player.on("ready", (event) => {
                        // Do something when video is ready
                    });
                }

                player.on("play", (event) => {
                    console.log("Started play");
                });

                player.on("volumechange", (event) => {
                    console.log("Volume change");
                });

                player.on("ended", (event) => {
                    console.log("Video ended");
                });
            }
        });

        var lightboxInlineIframe = GLightbox({
            selector: ".glightbox4",
        });

        /* var exampleApi = GLightbox({ selector: null });
         exampleApi.insertSlide({
             href: 'https://picsum.photos/1200/800',
         });
         exampleApi.insertSlide({
             width: '500px',
             content: '<p>Example</p>'
         });
         exampleApi.insertSlide({
             href: 'https://www.youtube.com/watch?v=WzqrwPhXmew',
         });
         exampleApi.insertSlide({
             width: '200vw',
             content: document.getElementById('inline-example')
         });
         exampleApi.open(); */
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

</html>
