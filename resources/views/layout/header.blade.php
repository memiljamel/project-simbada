<header class="block w-full h-auto p-0 m-0 fixed top-0 right-0 z-20 lg:pl-64 lg:left-auto">
    <nav class="flex justify-between items-center w-full h-14 p-2 m-0 bg-primary shadow-04dp lg:h-16 dark:bg-charleston-green">

        <div class="flex justify-start items-center gap-2 w-auto h-auto p-0 m-0 overflow-hidden relative">
            <div class="inline-block w-auto h-auto p-0 m-0 relative">
                <div class="block w-auto h-auto p-0 m-0 relative">
                    <button type="button" class="inline-block w-10 h-10 p-2 m-0 bg-transparent rounded-full text-white outline-none cursor-pointer align-middle transition duration-150 ease-in-out hover:bg-white/[0.04] active:bg-white/[0.10] focus:bg-white/[0.12] lg:hidden" data-te-offcanvas-toggle data-te-target="#offcanvas" data-te-toggle="tooltip" title="Open menu" data-te-ripple-init data-te-ripple-color="light">
                        <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="flex-1 block w-auto h-auto p-0 m-0 overflow-hidden relative">
            <div class="block w-auto h-auto p-0 m-0 relative">
                <h6 class="block w-full h-auto px-2 py-1.5 m-0 headline-6 text-white truncate">
                    @yield('title')
                </h6>
            </div>
        </div>

        <div class="flex justify-start items-center gap-2 w-auto h-auto p-0 m-0 overflow-hidden relative">
            <div class="inline-block w-auto h-auto p-0 m-0 relative">

                <form class="block w-auto h-auto p-0 m-0 relative" action="" method="POST">
                    @csrf
                    @method('DELETE')

                    {{-- Dropdown --}}
                    <div class="block w-auto h-auto p-0 m-0 relative" data-te-dropdown-ref>
                        <button type="button" class="inline-block w-10 h-10 p-2 m-0 bg-transparent rounded-full text-white outline-none cursor-pointer align-middle transition duration-150 ease-in-out hover:bg-white/[0.04] active:bg-white/[0.10] focus:bg-white/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12]" data-te-dropdown-toggle-ref data-te-dropdown-animation="off" data-te-toggle="tooltip" title="More options" data-te-ripple-init data-te-ripple-color="light">
                            <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                            </svg>
                        </button>

                        <ul class="hidden min-w-[192px] w-auto max-w-[280px] h-auto py-2 m-0 list-none rounded bg-white shadow-04dp absolute top-full right-0 z-10 [&[data-te-dropdown-show]]:block dark:bg-charleston-green" data-te-dropdown-menu-ref>
                            <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <a href="" class="flex justify-between items-center gap-4 w-full h-12 py-2 px-4 m-0 body-2 text-base text-black/[0.60] no-underline outline-none truncate select-none hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12]" data-te-dropdown-item-ref data-te-ripple-init data-te-ripple-color="light">
                                    <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
										<span class="block w-full h-auto p-0 m-0 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
											{{ __('Home') }}
										</span>
                                    </div>
                                </a>
                            </li>

                            <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <a href="" class="flex justify-between items-center gap-4 w-full h-12 py-2 px-4 m-0 body-2 text-base text-black/[0.60] no-underline outline-none truncate select-none hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12]" data-te-dropdown-item-ref data-te-ripple-init data-te-ripple-color="light">
                                    <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
										<span class="block w-full h-auto p-0 m-0 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
											{{ __('Edit Profile') }}
										</span>
                                    </div>
                                </a>
                            </li>

                            <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <button type="submit" class="flex justify-between items-center gap-4 w-full h-12 py-2 px-4 m-0 body-2 text-base text-black/[0.60] no-underline outline-none whitespace-nowrap overflow-hidden select-none hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12] disabled:opacity-70 disabled:cursor-not-allowed disabled:hover:!bg-transparent disabled:active:!bg-transparent disabled:focus:!bg-transparent" data-te-dropdown-item-ref data-te-ripple-init data-te-ripple-color="light">
                                    <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
										<span class="block w-full h-auto p-0 m-0 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
											{{ __('Logout') }}
										</span>
                                    </div>
                                </button>
                            </li>
                        </ul>
                    </div>
                    {{-- End Dropdown --}}

                </form>

            </div>
        </div>

    </nav>
</header>
