@extends('app')

@section('title', 'Pabrik')

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
                            <a href="{{ route('dashboard.index') }}" class="inline-block w-auto h-auto p-0 m-0 subtitle-1 text-primary no-underline outline-none cursor-pointer hover:underline focus:underline active:underline">
                                {{ __('Dashboard') }}
                            </a>
                        </li>

                        <li class="inline-block w-auto h-auto p-0 m-0 relative [&+li::before]:content-['/'] [&+li::before]:mx-1 [&+li::before]:text-black/[0.60] dark:[&+li::before]:text-white/[0.60]">
                            <span class="inline-block w-auto h-auto p-0 m-0 subtitle-1 text-black/[0.60] cursor-default dark:text-white/[0.60]">
                                {{ __('Pabrik') }}
                            </span>
                        </li>
                    </ol>
                </nav>
                {{-- End Breadcrumbs --}}

                @if (session()->has('message'))
                    {{-- Toast --}}
                    <div class="hidden invisible w-auto max-w-[344px] h-auto px-4 py-2 mx-auto bg-dark-charcoal border-none  rounded-full shadow-md overflow-hidden animate-toast fixed bottom-8 left-1/2 -translate-x-1/2 z-[9999] data-[te-toast-show]:block data-[te-toast-show]:visible data-[te-toast-hide]:hidden data-[te-toast-hide]:invisible dark:bg-lotion" role="alert" aria-live="assertive" aria-atomic="true" data-te-toast-init>
                        <span class="block w-full h-auto p-0 m-0 body-2 text-center text-white truncate dark:text-black">
                            {{ session()->get('message') }}
                        </span>
                    </div>
                    {{-- End Toast --}}
                @endif

                {{-- Cards --}}
                <div class="block w-full h-auto p-0 mt-4 bg-white rounded text-black/[0.87] shadow-01dp overflow-hidden dark:bg-charleston-green">

                    <div class="block w-full h-auto p-0 m-0 overflow-hidden">
                        <div class="flex justify-between items-center flex-wrap gap-2 w-full min-h-[64px] h-auto p-2 my-2 break-all relative sm:m-0">

                            <div class="flex-1 block w-auto h-auto p-0 m-0 overflow-hidden relative basis-auto order-1 sm:order-none">
                                <div class="block w-full h-auto p-0 m-0 relative">
                                    <h6 class="block w-full h-auto px-2 py-1.5 m-0 headline-6 text-black/[0.87] truncate dark:text-white/[0.87]">
                                        {{ __('Daftar Pabrik') }}
                                    </h6>
                                </div>
                            </div>

                            <div class="block w-auto h-auto px-2 py-0.5 m-0 overflow-hidden relative basis-full order-3 sm:basis-auto sm:order-none">
                                <form class="contents w-auto h-auto p-0 m-0 relative" action="{{ route('distributors.index') }}" method="GET" autocomplete="off" autocapitalize="off">

                                    {{-- Search --}}
                                    <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init>
                                        <input type="search" class="peer caret-primary block min-h-[32px] w-full border-0 bg-transparent pl-10 pr-2 py-1.5 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 disabled:opacity-60 disabled:cursor-not-allowed" id="search" name="search" value="{{ $search }}" placeholder="Cari..." autocomplete="off" spellcheck="false" autocapitalize="off" aria-label="Cari" aria-describedby="button-search" />

                                        <button type="submit" class="block w-6 h-6 p-0 m-0 bg-transparent text-black/[0.60] rounded-full align-middle cursor-pointer outline-none transition duration-150 ease-in-out absolute left-2 top-1/2 -translate-y-1/2 z-0 dark:text-white/[0.60] peer-disabled:opacity-70 peer-disabled:cursor-not-allowed peer-disabled:hover:!bg-transparent peer-disabled:active:!bg-transparent peer-disabled:focus:!bg-transparent" id="button-search">
                                            <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                                <path d="M0 0h24v24H0z" fill="none" />
                                                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                                            </svg>
                                        </button>
                                    </div>
                                    {{-- End Search --}}

                                </form>
                            </div>

                            <div class="flex justify-start items-center gap-2 w-auto h-auto p-0 m-0 overflow-hidden relative basis-auto order-2 sm:order-none">
                                <div class="inline-block w-auto h-auto p-0 m-0 relative">

                                    {{-- Icon Link --}}
                                    <div class="block w-auto h-auto p-0 m-0 relative">
                                        <a href="{{ route('distributors.create') }}" class="block w-10 h-10 p-2 m-0 bg-transparent rounded-full text-black/[0.60] outline-none cursor-pointer align-middle transition duration-150 ease-in-out hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12]" data-te-toggle="tooltip" title="Buat" data-te-ripple-init data-te-ripple-color="light">
                                            <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                                <path d="M0 0h24v24H0z" fill="none" />
                                                <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
                                            </svg>
                                        </a>
                                    </div>
                                    {{-- End Icon Link --}}

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="block w-full h-auto p-0 m-0 overflow-hidden">

                        {{-- Perfect Scrollbar --}}
                        <div class="flex flex-col w-full h-full p-0 m-0 whitespace-nowrap overflow-hidden relative" data-te-perfect-scrollbar-init data-te-wheel-propagation="true">
                            <div class="block w-full h-full p-0 m-0 relative">

                                {{-- Table --}}
                                <table class="table table-auto w-full h-auto p-0 m-0 border-collapse border-spacing-0 relative">
                                    <thead class="table-header-group border-b border-solid border-chinese-white dark:border-dark-liver">
                                        <tr class="table-row text-inherit align-middle outline-none relative">
                                            <th class="table-cell w-auto h-14 px-4 m-0 subtitle-2 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
                                                {{ __('#') }}
                                            </th>
                                            <th class="table-cell w-auto h-14 px-4 m-0 subtitle-2 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
                                                {{ __('Pabrik') }}
                                            </th>
                                            <th class="table-cell w-auto h-14 px-4 m-0 subtitle-2 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
                                                {{ __('Alamat') }}
                                            </th>
                                            <th class="table-cell w-auto h-14 px-4 m-0 subtitle-2 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
                                                {{ __('Telepon') }}
                                            </th>
                                            <th class="table-cell w-auto h-14 px-4 m-0 subtitle-2 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
                                                {{ __('Email') }}
                                            </th>
                                            <th class="table-cell w-auto h-14 px-4 m-0 subtitle-2 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
                                                {{ __('Petugas') }}
                                            </th>
                                            <th class="table-cell w-auto h-14 px-4 m-0 subtitle-2 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
                                                {{ __('Deskripsi') }}
                                            </th>
                                            <th class="table-cell w-auto h-14 px-4 m-0 subtitle-2 text-black/[0.87] text-right truncate dark:text-white/[0.87]">
                                                {{ __('Jumlah Aset') }}
                                            </th>
                                            <th class="table-cell w-auto h-14 px-4 m-0 subtitle-2 text-black/[0.87] text-center truncate dark:text-white/[0.87]">
                                                {{ __('Aksi') }}
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="table-row-group *:border-b *:border-solid *:border-chinese-white *:transition *:ease-in-out *:duration-300 *:motion-reduce:transition-none hover:*:bg-black/[0.04] dark:*:border-dark-liver dark:hover:*:bg-white/[0.04]">
                                        @forelse($distributors as $distributor)
                                            <tr class="table-row text-inherit align-middle outline-none relative">
                                                <td class="table-cell w-auto h-[52px] px-4 m-0 body-2 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
                                                    {{ $loop->iteration + ($distributors->currentPage() - 1) * $distributors->perPage() }}
                                                </td>
                                                <td class="table-cell w-auto h-[52px] px-4 m-0 body-2 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
                                                    {{ $distributor->name }}
                                                </td>
                                                <td class="table-cell w-auto h-[52px] px-4 m-0 body-2 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
                                                    {{ $distributor->address ?? __('-') }}
                                                </td>
                                                <td class="table-cell w-auto h-[52px] px-4 m-0 body-2 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
                                                    {{ $distributor->telephone ?? __('-') }}
                                                </td>
                                                <td class="table-cell w-auto h-[52px] px-4 m-0 body-2 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
                                                    {{ $distributor->email ?? __('-') }}
                                                </td>
                                                <td class="table-cell w-auto h-[52px] px-4 m-0 body-2 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
                                                    {{ $distributor->officer ?? __('-') }}
                                                </td>
                                                <td class="table-cell w-auto h-[52px] px-4 m-0 body-2 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
                                                    {{ $distributor->description ?? __('-') }}
                                                </td>
                                                <td class="table-cell w-auto h-[52px] px-4 m-0 body-2 text-black/[0.87] text-right truncate dark:text-white/[0.87]">
                                                    {{ $distributor->assets->count() }}
                                                </td>
                                                <td class="table-cell w-auto h-[52px] px-4 m-0 body-2 text-black/[0.87] text-center truncate dark:text-white/[0.87]">
                                                    <div class="inline-block w-auto h-auto p-0 m-0 relative">

                                                        {{-- Dropdown --}}
                                                        <div class="block w-auto h-auto p-0 m-0 relative" data-te-dropdown-ref>
                                                            <button type="button" class="inline-block w-9 h-9 p-1.5 m-0 bg-transparent rounded-full text-black/[0.60] outline-none cursor-pointer align-middle transition duration-150 ease-in-out hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12]" data-te-dropdown-toggle-ref data-te-dropdown-animation="off" data-te-ripple-init data-te-ripple-color="light">
                                                                <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                                                    <path d="M0 0h24v24H0z" fill="none" />
                                                                    <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                                                                </svg>
                                                            </button>

                                                            <ul class="hidden min-w-[128px] w-auto max-w-[280px] h-auto py-2 m-0 list-none rounded bg-white shadow-08dp absolute top-full right-0 z-10 [&[data-te-dropdown-show]]:block dark:bg-charleston-green" data-te-dropdown-menu-ref>
                                                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                                    <a href="{{ route('distributors.show', $distributor->id) }}" class="flex justify-between items-center gap-4 w-full h-10 py-2 px-4 m-0 body-2 text-black/[0.60] no-underline outline-none truncate select-none hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12]" data-te-dropdown-item-ref data-te-ripple-init data-te-ripple-color="light">
                                                                        <div class="inline-block w-auto h-auto p-0 m-0 relative">
                                                                            <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                                                                <path d="M0 0h24v24H0z" fill="none" />
                                                                                <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z" />
                                                                            </svg>
                                                                        </div>

                                                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                                            <span class="block w-full h-auto p-0 m-0 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
                                                                                {{ __('Detail') }}
                                                                            </span>
                                                                        </div>
                                                                    </a>
                                                                </li>

                                                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                                    <a href="{{ route('distributors.edit', $distributor->id) }}" class="flex justify-between items-center gap-4 w-full h-10 py-2 px-4 m-0 body-2 text-black/[0.60] no-underline outline-none truncate select-none hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12]" data-te-dropdown-item-ref data-te-ripple-init data-te-ripple-color="light">
                                                                        <div class="inline-block w-auto h-auto p-0 m-0 relative">
                                                                            <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                                                                <path d="M0 0h24v24H0z" fill="none" />
                                                                                <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
                                                                            </svg>
                                                                        </div>

                                                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                                            <span class="block w-full h-auto p-0 m-0 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
                                                                                {{ __('Ubah') }}
                                                                            </span>
                                                                        </div>
                                                                    </a>
                                                                </li>

                                                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                                    <form class="contents w-auto h-auto p-0 m-0 relative" action="{{ route('distributors.destroy', $distributor->id) }}" method="POST" autocomplete="off" autocapitalize="off">
                                                                        @csrf
                                                                        @method('DELETE')

                                                                        <button type="submit" class="flex justify-between items-center gap-4 w-full h-10 py-2 px-4 m-0 body-2 text-black/[0.60] no-underline outline-none whitespace-nowrap overflow-hidden select-none hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12] disabled:opacity-70 disabled:cursor-not-allowed disabled:hover:!bg-transparent disabled:active:!bg-transparent disabled:focus:!bg-transparent" data-te-dropdown-item-ref data-te-ripple-init data-te-ripple-color="light">
                                                                            <div class="inline-block w-auto h-auto p-0 m-0 relative">
                                                                                <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                                                                    <path d="M0 0h24v24H0z" fill="none" />
                                                                                    <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                                                                                </svg>
                                                                            </div>

                                                                            <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                                                <span class="block w-full h-auto p-0 m-0 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
                                                                                    {{ __('Hapus') }}
                                                                                </span>
                                                                            </div>
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        {{-- End Dropdown --}}

                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="table-row text-inherit align-middle outline-none relative">
                                                <td class="table-cell w-auto h-[52px] px-4 m-0 body-2 text-black/[0.87] text-center truncate dark:text-white/[0.87]" colspan="9">
                                                    {{ __('Tidak ada data.') }}
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{-- End Table --}}

                            </div>
                        </div>
                        {{-- End Perfect Scrollbar --}}

                    </div>

                    <div class="block w-full h-auto p-0 m-0 overflow-hidden">
                        <div class="flex justify-start items-center w-full h-auto p-2 m-0 relative">

                            {{-- Pagination --}}
                            <div class="flex-1 block w-full min-h-[36px] h-auto p-0 m-0 relative">
                                {{ $distributors->onEachSide(2)->links() }}
                            </div>
                            {{-- End Pagination --}}

                        </div>
                    </div>

                </div>
                {{-- End Cards --}}

            </div>
        </main>

        @include('layout.footer')

    </div>
@endsection
