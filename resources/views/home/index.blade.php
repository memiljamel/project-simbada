@extends('app')

@section('title', 'Home')

@section('content')
    <div class="flex flex-col w-full h-full p-0 m-0 relative">

        <header class="block w-full h-auto p-0 m-0 fixed top-0 right-0 z-20 lg:pl-0 lg:left-auto">
            <nav class="flex justify-between items-center flex-wrap w-full min-h-[56px] p-2 m-0 bg-primary shadow-04dp lg:h-16 dark:bg-charleston-green">

                <div class="flex justify-start items-center gap-2 w-auto h-auto p-0 m-0 overflow-hidden relative">
                    <div class="inline-block w-auto h-auto p-0 m-0 relative">
                        <div class="block w-auto h-auto p-0 m-0 relative">
                            <button type="button" class="inline-block w-10 h-10 p-2 m-0 bg-transparent rounded-full text-white outline-none cursor-pointer align-middle transition duration-150 ease-in-out hover:bg-white/[0.04] active:bg-white/[0.10] focus:bg-white/[0.12] lg:hidden" data-te-collapse-init data-te-target="#nav-menu" data-te-toggle="tooltip" title="Open menu" data-te-ripple-init data-te-ripple-color="light" aria-expanded="false" aria-controls="nav-menu">
                                <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex-1 block w-auto h-auto p-0 m-0 overflow-hidden relative lg:flex-none">
                    <div class="block w-auto h-auto p-0 m-0 relative">
                        <a href="{{ route('home.index') }}" class="block w-auto max-w-full h-10 px-2 py-1.5 m-0 headline-6 text-white no-underline truncate dark:text-white">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                </div>

                <div class="hidden flex-grow basis-full items-center p-0 m-0 visible lg:flex lg:justify-between lg:basis-auto lg:ml-6" id="nav-menu" data-te-collapse-item>
                    <ul class="flex flex-col justify-start items-center w-auto h-auto p-0 my-4 relative lg:flex-row lg:m-0" data-te-navbar-nav-ref>
                        <li class="block w-full h-auto p-0 m0 overflow-hidden relative lg:inline-block lg:w-auto" data-te-nav-item-ref>
                            <a class="block w-auto h-auto p-2 m-0 text-white/[0.60] subtitle-1 no-underline outline-none align-middle hover:text-white hover:underline focus:text-white focus:underline active:text-white active:underline [&[class$='active']]:text-white active" href="#home" data-te-nav-link-ref>
                                {{ __('Home') }}
                            </a>
                        </li>

                        <li class="block w-full h-auto p-0 m0 overflow-hidden relative lg:inline-block lg:w-auto" data-te-nav-item-ref>
                            <a class="block w-auto h-auto p-2 m-0 text-white/[0.60] subtitle-1 no-underline outline-none align-middle hover:text-white hover:underline focus:text-white focus:underline active:text-white active:underline [&[class$='active']]:text-white" href="#benefits" data-te-nav-link-ref>
                                {{ __('Benefits') }}
                            </a>
                        </li>

                        <li class="block w-full h-auto p-0 m0 overflow-hidden relative lg:inline-block lg:w-auto" data-te-nav-item-ref>
                            <a class="block w-auto h-auto p-2 m-0 text-white/[0.60] subtitle-1 no-underline outline-none align-middle hover:text-white hover:underline focus:text-white focus:underline active:text-white active:underline [&[class$='active']]:text-white" href="#features" data-te-nav-link-ref>
                                {{ __('Features') }}
                            </a>
                        </li>

                        <li class="block w-full h-auto p-0 m0 overflow-hidden relative lg:inline-block lg:w-auto" data-te-nav-item-ref>
                            <a class="block w-auto h-auto p-2 m-0 text-white/[0.60] subtitle-1 no-underline outline-none align-middle hover:text-white hover:underline focus:text-white focus:underline active:text-white active:underline [&[class$='active']]:text-white" href="#about-us" data-te-nav-link-ref>
                                {{ __('About Us') }}
                            </a>
                        </li>
                    </ul>

                    <div class="inline-block w-full h-auto p-0 my-1 relative lg:w-auto lg:m-0">
                        @auth
                            <div class="block w-auto h-auto p-0 m-0 relative">
                                <a href="" class="inline-block min-w-[64px] w-full h-9 p-2 m-0 bg-transparent rounded button text-white text-center shadow-none align-middle truncate outline-none cursor-pointer transition duration-150 ease-in-out relative hover:bg-white/[0.04] active:bg-white/[0.10] focus:bg-white/[0.12] disabled:opacity-70 disabled:cursor-not-allowed disabled:hover:!bg-transparent disabled:active:!bg-transparent disabled:focus:!bg-transparent" data-te-ripple-init data-te-ripple-color="light">
                                    {{ __('Dashboard') }}
                                </a>
                            </div>
                        @else
                            <div class="block w-auto h-auto p-0 m-0 relative">
                                <a href="{{ route('login.index') }}" class="inline-block min-w-[64px] w-full h-9 p-2 m-0 bg-transparent rounded button text-white text-center shadow-none align-middle truncate outline-none cursor-pointer transition duration-150 ease-in-out relative hover:bg-white/[0.04] active:bg-white/[0.10] focus:bg-white/[0.12] disabled:opacity-70 disabled:cursor-not-allowed disabled:hover:!bg-transparent disabled:active:!bg-transparent disabled:focus:!bg-transparent" data-te-ripple-init data-te-ripple-color="light">
                                    {{ __('Login') }}
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>

            </nav>
        </header>



    </div>

@endsection
