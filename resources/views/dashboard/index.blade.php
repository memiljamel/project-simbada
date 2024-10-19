@extends('app')

@section('title', 'Dashboard')

@section('content')
    <div class="flex flex-col w-full h-full p-0 m-0 relative">

        @include('layout.header')

        @include('layout.sidebar')

        <main class="block flex-grow flex-shrink-0 w-auto h-auto p-0 mt-14 ml-0 lg:mt-16 lg:ml-64">
            <div class="block w-full max-w-7xl h-auto p-4 mx-auto overflow-hidden xl:m-0">

                {{-- Breadcrumbs --}}
                <nav class="block w-full h-auto p-0 m-0 list-none rounded whitespace-nowrap overflow-hidden relative">
                    <ol class="block w-full h-auto p-0 m-0 overflow-hidden">
                        <li class="inline-block w-auto h-auto p-0 m-0 relative [&+li::before]:content-['/'] [&+li::before]:mx-1 [&+li::before]:text-black/[0.60] dark:[&+li::before]:text-white/[0.60]">
                            <span class="inline-block w-auto h-auto p-0 m-0 subtitle-1 text-black/[0.60] cursor-default dark:text-white/[0.60]">
                                {{ __('Dashboard') }}
                            </span>
                        </li>
                    </ol>
                </nav>
                {{-- End Breadcrumbs --}}

                <div class="flex justify-start items-stretch flex-wrap gap-4 p-0 mt-4 relative sm:flex-nowrap">

                    {{-- Cards --}}
                    <div class="block min-w-0 w-full h-auto p-0 m-0 relative sm:w-12/12">
                        <div class="block w-full h-auto p-2 m-0 bg-white rounded text-black/[0.87] shadow-01dp overflow-hidden dark:bg-charleston-green">
                            <div class="flex justify-start items-start gap-2 w-full max-w-3xl h-auto p-2 m-0 relative">
                                <div class="block w-6 h-6 p-0 m-1 text-primary relative">
                                    <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                        <path d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
                                    </svg>
                                </div>

                                <div class="flex-1 block w-auto h-auto p-0 m-0 overflow-hidden relative">
                                    <h5 class="block w-full h-auto p-0 m-0 text-black/[0.87] headline-6 text-left relative dark:text-white/[0.87]">
                                        {{ __("Halo, {$user->name}!") }}
                                    </h5>

                                    <p class="block w-auto h-auto pt-2 pb-4 m-0 text-black/[0.60] body-2 text-left relative dark:text-white/[0.60]">
                                        {{ __('Selamat datang di halaman utama aplikasi. Di sini, Anda dapat mengelola dan menyimpan informasi tentang aset yang Anda miliki. Klik tombol di bawah untuk menambahkan aset pertama Anda.') }}
                                    </p>

                                    <a href="{{ route('asset-active.create') }}" class="inline-block min-w-[64px] w-auto h-9 p-2 m-0 bg-transparent rounded button text-primary text-center shadow-none align-middle truncate outline-none cursor-pointer relative hover:bg-primary/[0.04] active:bg-primary/[0.10] focus:bg-primary/[0.12] disabled:opacity-70 disabled:cursor-not-allowed disabled:hover:!bg-transparent disabled:active:!bg-transparent disabled:focus:!bg-transparent" data-te-ripple-init data-te-ripple-color="light">
                                        {{ __('Buat Aset') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Cards --}}

                </div>

            </div>
        </main>

        @include('layout.footer')

    </div>
@endsection
