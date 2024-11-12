<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/no-tailwind.css') }}" />
    <script defer src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Moul&family=Poppins:ital&family=Rubik+Doodle+Shadow&display=swap,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Siemreap&display=swap"
        rel="stylesheet" />
    <title>Koha Wiki</title>
    {{-- <link rel="icon" type="image/x-icon" href="{{ asset('assets/icons/koha.png') }}"> --}}
    {{-- <link rel="icon" type="image/x-icon" href="{{ asset('assets/icons/koha.png') }}"> --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/icons/koha.png') }}">

    <style>
        .primary1 {
            background: #3d3c3c;
        }

        .primary2 {
            background: #4a9b32;
        }

        .primary3 {
            background: #473d3d;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans antialiased ">
    <div class="antialiased bg-gray-50 overflow-hidden">
        <nav class="primary2 border-b border-gray-200 px-4 py-2.5  fixed  left-0 right-0 top-0 z-50 md:hidden">
            <div class="flex flex-nowrap justify-between items-center">
                <div class="flex items-center justify-between">
                    <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                        aria-controls="drawer-navigation"
                        class="p-1 mr-4 text-white rounded-lg cursor-pointer md:hidden hover:text-white hover:primary3 focus:bg-gray-900 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400  dark:hover:text-white">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                        {{-- <span class="sr-only">Toggle sidebar</span> --}}
                    </button>
                    <form action="#" method="GET"
                        class="text-center text-2xl font-semibold text-white  md:hidden">

                        <button id="dropdownBottomButton" data-dropdown-toggle="dropdownBottom1"
                            data-dropdown-placement="bottom"
                            class="space-x-4 text-center  text-xl md:mb-0 text-white font-medium rounded-lg  py-2.5 inline-flex items-center justify-between"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-house">
                                <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                                <path
                                    d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            </svg>

                            @if ($categorySelected)
                                <p>{{ $categorySelected->name }}</p>
                            @else
                                <p>No category</p>
                            @endif
                            <!-- Show the first category or 'No category' -->

                            <svg class="w-3 h-3 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 1.5">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownBottom1"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownBottomButton">
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ url('?categoryId=' . $category->id) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </form>
                </div>
                <button type="button" data-dropdown-toggle="language-dropdown"
                    class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer dark:hover:text-white dark:text-gray-400 hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
                    <svg aria-hidden="true" class="h-5 w-5 rounded-full mt-0.5" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3900 3900">
                        <path fill="#b22234" d="M0 0h7410v3900H0z" />
                        <path d="M0 450h7410m0 600H0m0 600h7410m0 600H0m0 600h7410m0 600H0" stroke="#fff"
                            stroke-width="300" />
                        <path fill="#3c3b6e" d="M0 0h2964v2100H0z" />
                        <g fill="#fff">
                            <g id="d">
                                <g id="c">
                                    <g id="e">
                                        <g id="b">
                                            <path id="a"
                                                d="M247 90l70.534 217.082-184.66-134.164h228.253L176.466 307.082z" />
                                            <use xlink:href="#a" y="420" />
                                            <use xlink:href="#a" y="840" />
                                            <use xlink:href="#a" y="1260" />
                                        </g>
                                        <use xlink:href="#a" y="1680" />
                                    </g>
                                    <use xlink:href="#b" x="247" y="210" />
                                </g>
                                <use xlink:href="#c" x="494" />
                            </g>
                            <use xlink:href="#d" x="988" />
                            <use xlink:href="#c" x="1976" />
                            <use xlink:href="#e" x="2470" />
                        </g>
                    </svg>
                </button>
                <div class="hidden my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 "
                    id="language-dropdown">
                    <ul class="py-1 " role="none">
                        <li>
                            <a href="#"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:text-white dark:text-gray-300 dark:hover:bg-gray-600"
                                role="menuitem">
                                <div class="inline-flex items-center">
                                    <svg aria-hidden="true" class="h-3.5 w-3.5 rounded-full mr-2"
                                        xmlns="http://www.w3.org/2000/svg" id="flag-icon-css-us"
                                        viewBox="0 0 512 512">
                                        <g fill-rule="evenodd">
                                            <g stroke-width="1pt">
                                                <path fill="#bd3d44"
                                                    d="M0 0h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                                                    transform="scale(3.9385)" />
                                                <path fill="#fff"
                                                    d="M0 10h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                                                    transform="scale(3.9385)" />
                                            </g>
                                            <path fill="#192f5d" d="M0 0h98.8v70H0z" transform="scale(3.9385)" />
                                            <path fill="#fff"
                                                d="M8.2 3l1 2.8H12L9.7 7.5l.9 2.7-2.4-1.7L6 10.2l.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7L74 8.5l-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 7.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 24.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 21.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 38.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 35.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 52.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 49.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 66.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 63.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9z"
                                                transform="scale(3.9385)" />
                                        </g>
                                    </svg>
                                    English (US)
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-600"
                                role="menuitem">
                                <div class="inline-flex items-center ">

                                    <img src="{{ asset('assets/icons/cambodiaFlag.png') }}" alt=""
                                        class="w-3.5 mr-2">
                                    Cambodia
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- Sidebar -->

        <aside
            class="fixed md:top-0 top-16 left-0 z-40 w-72 h-screen transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 "
            aria-label="Sidenav" id="drawer-navigation">
            <form action="{{ url('/') }}" method="GET"
                class=" primary2 p-4 text-center text-2xl font-semibold text-white  hidden md:grid">

                <button id="dropdownBottomButton" data-dropdown-toggle="dropdownBottom"
                    data-dropdown-placement="bottom"
                    class=" text-center text-2xl md:mb-0 text-white font-medium rounded-lg  py-2.5 inline-flex items-center justify-between"
                    type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-house">
                        <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                        <path
                            d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                    </svg>

                    @if ($categorySelected)
                        <p>{{ $categorySelected->name }}</p>
                    @else
                        <p>No category</p>
                    @endif
                    <!-- Show the first category or 'No category' -->

                    <svg class="w-3 h-3 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 1.5">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownBottom"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownBottomButton">
                        @foreach ($categories as $category)
                            <li>

                                <a href="{{ url('?categoryId=' . $category->id) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="relative ">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                            </path>
                        </svg>
                    </div>
                    <input type="hidden" name="categoryId" value="{{ $categorySelected->id }}">
                    <input type="hidden" name="pageId" value="{{ $page->id }}">
                    <input type="text" name="search" id="sidebar-search"
                        class="bg-gray-50  text-black text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                        placeholder="Search" value="{{ request('search') }}" />
                </div>
            </form>
            <div class="overflow-y-auto py-5  h-full primary1 dark:bg-gray-800">

                <ul class="">
                    @forelse ($pages as $item)
                        <li
                            class="{{ $item->id == request('pageId') || collect($item->pages)->contains('id', request('pageId')) || collect($item->pages)->contains('id', $page->parent?->id) ? 'bg-white text-black text-[17px] py-2' : 'text-white text-[17px]' }} ">
                            @if (count($item->pages) > 0)
                                <div class="  w-full grid grid-cols-4 items-center space-x-8 ">
                                    <div class="col-span-3 mx-4">
                                        <a href="{{ url('?categoryId=' . $categorySelected->id . '&pageId=' . $item->id) }}"
                                            class="{{ $categorySelected->id . '&pageId=' . $item->id == request('categoryId') . '&pageId=' . request('pageId') ? '  underline underline-offset-4 ' : '' }}">
                                            {{ $item->name }}
                                        </a>
                                    </div>

                                    <button type="button"
                                        class="{{ $categorySelected->id . '&pageId=' . $item->id == request('categoryId') . '&pageId=' . request('pageId') ? ' ' : '' }} col-span-1 py-2 justify-end w-full text-base transition duration-75 group "
                                        aria-controls="dropdown-pages{{ $item->id }}"
                                        data-collapse-toggle="dropdown-pages{{ $item->id }}">


                                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    </button>
                                </div>

                                <ul id="dropdown-pages{{ $item->id }}"
                                    class="{{ $item->id == request('pageId') || collect($item->pages)->contains('id', request('pageId')) || collect($item->pages)->contains('id', $page->parent?->id) ? '' : 'hidden' }}">

                                    @forelse ($item->pages as $subPage)
                                        <li>
                                            <div class="flex justify-center items-center pl-7">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="#0033ff"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-corner-down-right">
                                                    <polyline points="15 10 20 15 15 20" />
                                                    <path d="M4 4v7a4 4 0 0 0 4 4h12" />
                                                </svg>
                                                <a href="{{ url('?categoryId=' . $categorySelected->id . '&pageId=' . $subPage->id) }}"
                                                    class="{{ $categorySelected->id == request('categoryId') && $subPage->id == request('pageId') ? 'underline underline-offset-4' : '' }} items-center py-1  w-full text-base group rounded-lg transition duration-75 group hover:primary3 ">
                                                    {{ $subPage->name }}
                                                </a>
                                            </div>

                                            {{-- SubSubPages --}}
                                            @if (count($subPage->pages))
                                                <ul id="dropdown-subpages{{ $subPage->id }}"
                                                    class="{{ $subPage->id == request('pageId') || collect($subPage->pages)->contains('id', request('pageId')) ? '' : 'hidden' }}">
                                                    @foreach ($subPage->pages as $subSubPage)
                                                        <li class="flex justify-center items-center pl-10">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="#EF0107" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="lucide lucide-corner-down-right">
                                                                <polyline points="15 10 20 15 15 20" />
                                                                <path d="M4 4v7a4 4 0 0 0 4 4h12" />
                                                            </svg>
                                                            <a href="{{ url('?categoryId=' . $categorySelected->id . '&pageId=' . $subSubPage->id) }}"
                                                                class="{{ $categorySelected->id == request('categoryId') && $subSubPage->id == request('pageId') ? 'underline underline-offset-4' : '' }} items-center py-1  w-full text-sm group rounded-lg transition duration-75 hover:primary3 ">
                                                                {{ $subSubPage->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            {{-- End SubSubPages --}}

                                        </li>
                                    @empty
                                        <li class="text-gray-500 py-1 pl-7">No pages available</li>
                                    @endforelse
                                </ul>
                            @else
                                <a href="{{ url('?categoryId=' . $categorySelected->id . '&pageId=' . $item->id) }}"
                                    class=" {{ $item->id == request('pageId') ? 'bg-white text-black text-[17px] underline ' : 'text-white text-[17px]' }}
                                    flex items-center py-2 mx-1 w-full
                                    transition duration-75 group ">

                                    <span class="flex-1 ml-3 text-left w-40">{{ $item->name }}</span>

                                </a>
                            @endif
                        </li>
                    @empty
                    @endforelse
                </ul>

            </div>
            <button type="button" data-dropdown-toggle="language-dropdown-lg"
                class="absolute bottom-0  inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer dark:hover:text-white dark:text-gray-400 hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600">
                <svg aria-hidden="true" class="h-5 w-5 rounded-full mt-0.5" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3900 3900">
                    <path fill="#b22234" d="M0 0h7410v3900H0z" />
                    <path d="M0 450h7410m0 600H0m0 600h7410m0 600H0m0 600h7410m0 600H0" stroke="#fff"
                        stroke-width="300" />
                    <path fill="#3c3b6e" d="M0 0h2964v2100H0z" />
                    <g fill="#fff">
                        <g id="d">
                            <g id="c">
                                <g id="e">
                                    <g id="b">
                                        <path id="a"
                                            d="M247 90l70.534 217.082-184.66-134.164h228.253L176.466 307.082z" />
                                        <use xlink:href="#a" y="420" />
                                        <use xlink:href="#a" y="840" />
                                        <use xlink:href="#a" y="1260" />
                                    </g>
                                    <use xlink:href="#a" y="1680" />
                                </g>
                                <use xlink:href="#b" x="247" y="210" />
                            </g>
                            <use xlink:href="#c" x="494" />
                        </g>
                        <use xlink:href="#d" x="988" />
                        <use xlink:href="#c" x="1976" />
                        <use xlink:href="#e" x="2470" />
                    </g>
                </svg>
            </button>
            <div>
                <div class="my-4 hidden text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 "
                    id="language-dropdown-lg">
                    <ul class="py-1 " role="none">
                        <li>
                            <a href="#"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:text-white dark:text-gray-300 dark:hover:bg-gray-600"
                                role="menuitem">
                                <div class="inline-flex items-center">
                                    <svg aria-hidden="true" class="h-3.5 w-3.5 rounded-full mr-2"
                                        xmlns="http://www.w3.org/2000/svg" id="flag-icon-css-us"
                                        viewBox="0 0 512 512">
                                        <g fill-rule="evenodd">
                                            <g stroke-width="1pt">
                                                <path fill="#bd3d44"
                                                    d="M0 0h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                                                    transform="scale(3.9385)" />
                                                <path fill="#fff"
                                                    d="M0 10h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z"
                                                    transform="scale(3.9385)" />
                                            </g>
                                            <path fill="#192f5d" d="M0 0h98.8v70H0z" transform="scale(3.9385)" />
                                            <path fill="#fff"
                                                d="M8.2 3l1 2.8H12L9.7 7.5l.9 2.7-2.4-1.7L6 10.2l.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7L74 8.5l-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 7.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 24.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 21.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 38.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 35.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 52.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 49.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 66.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 63.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9z"
                                                transform="scale(3.9385)" />
                                        </g>
                                    </svg>
                                    English (US)
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-600"
                                role="menuitem">
                                <div class="inline-flex items-center ">

                                    <img src="{{ asset('assets/icons/cambodiaFlag.png') }}" alt=""
                                        class="w-3.5 mr-2">
                                    Cambodia
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

        </aside>

        <main class="p-4 mt-12 md:mt-0 md:ml-72 h-auto no-tailwind min-h-[80vh]">
            @if ($page)
                {!! $page->description !!}
            @else
                <p>No Data...</p>
            @endif
        </main>
    </div>

    <footer class="sm:text-center md:ml-72 ">
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm mb-5 text-gray-500 sm:text-center dark:text-gray-400">© Copyright 2022-23, Koha
            Community. Last updated on 2024-11-03 01:02:36. <a href="https://flowbite.com/"
                class="hover:underline"></a></span>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the categoryId and pageId from the URL
            const categoryId = new URLSearchParams(window.location.search).get('categoryId');
            const pageId = new URLSearchParams(window.location.search).get('pageId');

            // Show the dropdown that corresponds to the categoryId in the URL
            const dropdowns = document.querySelectorAll('[id^="dropdown-pages"]');
            dropdowns.forEach(dropdown => {
                const dropdownCategoryId = dropdown.id.split('-')[
                    1]; // Extract item ID from the dropdown ID

                // If categoryId matches the dropdown's categoryId, show the dropdown
                if (categoryId && categoryId === dropdownCategoryId) {
                    dropdown.classList.remove('hidden'); // Show dropdown
                }
            });

            // Open the dropdown when clicking on a parent link
            const toggleButtons = document.querySelectorAll('[data-collapse-toggle]');
            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetDropdown = document.getElementById(button.getAttribute(
                        'aria-controls'));
                    targetDropdown.classList.toggle('hidden'); // Toggle the dropdown visibility
                });
            });

            // Keep the dropdown open when clicking a subPage
            const links = document.querySelectorAll('a[href*="pageId"]');
            links.forEach(link => {
                link.addEventListener('click', function(event) {
                    const parentDropdown = link.closest('ul'); // Find the parent dropdown
                    parentDropdown.classList.remove('hidden'); // Keep the dropdown open
                });
            });
        });
    </script>
</body>

</html>
