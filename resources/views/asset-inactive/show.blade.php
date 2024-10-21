@extends('app')

@section('title', 'Aset Non-Aktif')

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
                            <a href="{{ route('asset-inactive.index') }}" class="inline-block w-auto h-auto p-0 m-0 subtitle-1 text-primary no-underline outline-none cursor-pointer hover:underline focus:underline active:underline">
                                {{ __('Aset Non-Aktif') }}
                            </a>
                        </li>

                        <li class="inline-block w-auto h-auto p-0 m-0 relative [&+li::before]:content-['/'] [&+li::before]:mx-1 [&+li::before]:text-black/[0.60] dark:[&+li::before]:text-white/[0.60]">
                            <span class="inline-block w-auto h-auto p-0 m-0 subtitle-1 text-black/[0.60] cursor-default dark:text-white/[0.60]">
                                {{ $asset->name }}
                            </span>
                        </li>
                    </ol>
                </nav>
                {{-- End Breadcrumbs --}}

                {{-- Cards --}}
                <div class="block w-full h-auto p-0 mt-4 bg-white rounded text-black/[0.87] shadow-01dp overflow-hidden dark:bg-charleston-green">

                    <div class="block w-full h-auto p-0 m-0 overflow-hidden">
                        <div class="flex justify-between items-center w-full h-16 p-2 m-0 relative">

                            <div class="flex justify-start items-center gap-2 w-auto h-auto p-0 m-0 overflow-hidden relative">

                                {{-- Icon Button --}}
                                <div class="inline-block w-auto h-auto p-0 m-0 relative">
                                    <a href="{{ route('asset-inactive.index') }}" class="block w-10 h-10 p-2 m-0 bg-transparent rounded-full text-black/[0.60] outline-none cursor-pointer align-middle transition duration-150 ease-in-out hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12]" data-te-toggle="tooltip" title="Kembali" data-te-ripple-init data-te-ripple-color="light">
                                        <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                            <path d="M0 0h24v24H0z" fill="none" />
                                            <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z" />
                                        </svg>
                                    </a>
                                </div>
                                {{-- End Icon Button --}}

                            </div>

                            <div class="flex-1 block w-auto h-auto p-0 m-0 overflow-hidden relative">
                                <div class="block w-full h-auto p-0 m-0 relative">
                                    <h6 class="block w-full h-auto px-2 py-1.5 m-0 headline-6 text-black/[0.87] truncate dark:text-white/[0.87]">
                                        {{ __('Detail') }}
                                    </h6>
                                </div>
                            </div>

                            @ability(App\Enums\RoleEnum::Administrator->value, [
                                App\Enums\PermissionEnum::DeleteAssets->value,
                                App\Enums\PermissionEnum::UnarchivedAssets->value,
                            ])
                                <div class="flex justify-start items-center gap-2 w-auto h-auto p-0 m-0 overflow-hidden relative">
                                    @permission(App\Enums\PermissionEnum::DeleteAssets->value)
                                        <div class="inline-block w-auto h-auto p-0 m-0 relative">
                                            <form class="contents w-auto h-auto p-0 m-0 relative" action="{{ route('asset-inactive.destroy', $asset->id) }}" method="POST" autocomplete="off" autocapitalize="off">
                                                @csrf
                                                @method('DELETE')

                                                {{-- Icon Button --}}
                                                <div class="block w-auto h-auto p-0 m-0 relative">
                                                    <button type="submit" class="block w-10 h-10 p-2 m-0 bg-transparent rounded-full text-black/[0.60] outline-none cursor-pointer align-middle transition duration-150 ease-in-out hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12] disabled:opacity-70 disabled:cursor-not-allowed disabled:hover:!bg-transparent disabled:active:!bg-transparent disabled:focus:!bg-transparent" data-te-toggle="tooltip" title="Hapus" data-te-ripple-init data-te-ripple-color="light">
                                                        <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                                            <path d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                {{-- End Icon Button --}}

                                            </form>
                                        </div>
                                    @endpermission

                                    @permission(App\Enums\PermissionEnum::UnarchivedAssets->value)
                                        <div class="inline-block w-auto h-auto p-0 m-0 relative">
                                            <form class="contents w-auto h-auto p-0 m-0 relative" action="{{ route('asset-inactive.archives.destroy', $asset->id) }}" method="POST" autocomplete="off" autocapitalize="off">
                                                @csrf
                                                @method('DELETE')

                                                {{-- Icon Button --}}
                                                <div class="block w-auto h-auto p-0 m-0 relative">
                                                    <button type="submit" class="block w-10 h-10 p-2 m-0 bg-transparent rounded-full text-black/[0.60] outline-none cursor-pointer align-middle transition duration-150 ease-in-out hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12] disabled:opacity-70 disabled:cursor-not-allowed disabled:hover:!bg-transparent disabled:active:!bg-transparent disabled:focus:!bg-transparent" data-te-toggle="tooltip" title="Batalkan Arsip" data-te-ripple-init data-te-ripple-color="light">
                                                        <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                                            <path d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M20.54 5.23l-1.39-1.68C18.88 3.21 18.47 3 18 3H6c-.47 0-.88.21-1.16.55L3.46 5.23C3.17 5.57 3 6.02 3 6.5V19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V6.5c0-.48-.17-.93-.46-1.27zM12 17.5L6.5 12H10v-2h4v2h3.5L12 17.5zM5.12 5l.81-1h12l.94 1H5.12z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                {{-- End Icon Button --}}

                                            </form>
                                        </div>
                                    @endpermission
                                </div>
                            @endability

                        </div>
                    </div>

                    <div class="block w-full h-auto p-4 m-0 border-y border-solid border-chinese-white overflow-hidden dark:border-dark-liver sm:p-6">
                        <div class="block w-full max-w-3xl h-auto p-0 m-0 relative">

                            <ul class="block w-full p-0 mb-2 mt-6 list-none shadow-none relative first:mt-0 last:mb-0">
                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <span class="block w-auto h-auto p-0 py-2 m-0 caption uppercase tracking-[1.25px] text-black/[0.60] truncate dark:text-white/[0.60]">
                                        {{ __('Umum') }}
                                    </span>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Id') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->id }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Kode Barang') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->code }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Jenis Barang') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->category?->name }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Nama Barang') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->name }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Nomor Register') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->serial_number }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Verifikasi') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            @if ($asset->verified)
                                                <span class="inline-block w-auto h-6 px-2.5 m-0 bg-blue-500/[0.04] text-blue-500 font-Roboto caption font-medium rounded-full align-middle leading-6 select-none">
                                                    {{ __('Sudah Terverifikasi') }}
                                                </span>
                                            @else
                                                <span class="inline-block w-auto h-6 px-2.5 m-0 bg-red-500/[0.04] text-red-500 font-Roboto caption font-medium rounded-full align-middle leading-6 select-none">
                                                    {{ __('Belum Terverifikasi') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <ul class="block w-full p-0 mb-2 mt-6 list-none shadow-none relative first:mt-0 last:mb-0">
                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <span class="block w-auto h-auto p-0 py-2 m-0 caption uppercase tracking-[1.25px] text-black/[0.60] truncate dark:text-white/[0.60]">
                                        {{ __('Status') }}
                                    </span>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Status Barang') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Non-Aktif') }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Tanggal Non-Aktif') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->assetArchive?->inactive_date }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Sebab Non-Aktif') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->assetArchive?->reason->label() }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Keterangan') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->assetArchive?->notes ?? __('-') }}
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <ul class="block w-full p-0 mb-2 mt-6 list-none shadow-none relative first:mt-0 last:mb-0">
                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <span class="block w-auto h-auto p-0 py-2 m-0 caption uppercase tracking-[1.25px] text-black/[0.60] truncate dark:text-white/[0.60]">
                                        {{ __('QR-Code & Foto') }}
                                    </span>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('QR-Code & Foto') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <div class="inline-block w-auto h-auto p-0.5 ml-4 align-top relative first:ml-0" data-te-lightbox-init>
                                                <img class="block min-w-[96px] w-24 h-24 p-0.5 m-0 rounded align-middle text-center text-transparent object-cover indent-[10000px] ring-2 ring-primary cursor-zoom-in data-[te-lightbox-disabled]:cursor-auto" src="{{ $asset->qr_code_url }}" alt="{{ $asset->name }}" data-te-img="{{ $asset->qr_code_url }}" />
                                            </div>

                                            <div class="inline-block w-auto h-auto p-0.5 ml-4 align-top relative first:ml-0" data-te-lightbox-init>
                                                <img class="block min-w-[96px] w-24 h-24 p-0.5 m-0 rounded align-middle text-center text-transparent object-cover indent-[10000px] ring-2 ring-primary cursor-zoom-in data-[te-lightbox-disabled]:cursor-auto" src="{{ $asset->photo_url }}" alt="{{ $asset->name }}" data-te-img="{{ $asset->photo_url }}" />
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <ul class="block w-full p-0 mb-2 mt-6 list-none shadow-none relative first:mt-0 last:mb-0">
                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <span class="block w-auto h-auto p-0 py-2 m-0 caption uppercase tracking-[1.25px] text-black/[0.60] truncate dark:text-white/[0.60]">
                                        {{ __('Detail Aset') }}
                                    </span>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Merk') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->brand?->name }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Tipe') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->type }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Ukuran / CC') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->size }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Bahan') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->material }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Tahun Pembelian') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->purchase_year }}
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <ul class="block w-full p-0 mb-2 mt-6 list-none shadow-none relative first:mt-0 last:mb-0">
                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <span class="block w-auto h-auto p-0 py-2 m-0 caption uppercase tracking-[1.25px] text-black/[0.60] truncate dark:text-white/[0.60]">
                                        {{ __('Nomor') }}
                                    </span>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Pabrik') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->distributor?->name ?? __('-') }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Rangka') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->frame_number ?? __('-') }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Mesin') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->engine_number ?? __('-') }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Polisi') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->police_number ?? __('-') }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('BPKB') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->bpkb_number ?? __('-') }}
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <ul class="block w-full p-0 mb-2 mt-6 list-none shadow-none relative first:mt-0 last:mb-0">
                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <span class="block w-auto h-auto p-0 py-2 m-0 caption uppercase tracking-[1.25px] text-black/[0.60] truncate dark:text-white/[0.60]">
                                        {{ __('Pembelian') }}
                                    </span>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Asal Usul') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->origin }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Harga Satuan') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ Number::currency($asset->unit_price, in: 'IDR', locale: 'id') }}
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <ul class="block w-full p-0 mb-2 mt-6 list-none shadow-none relative first:mt-0 last:mb-0">
                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <span class="block w-auto h-auto p-0 py-2 m-0 caption uppercase tracking-[1.25px] text-black/[0.60] truncate dark:text-white/[0.60]">
                                        {{ __('Catatan Tambahan') }}
                                    </span>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Status Barang') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->status->label() }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Keterangan') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->notes ?? __('-') }}
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <ul class="block w-full p-0 mb-2 mt-6 list-none shadow-none relative first:mt-0 last:mb-0">
                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <span class="block w-auto h-auto p-0 py-2 m-0 caption uppercase tracking-[1.25px] text-black/[0.60] truncate dark:text-white/[0.60]">
                                        {{ __('Lampiran') }}
                                    </span>
                                </li>

                                @forelse($asset->assetAttachments as $attachment)
                                    <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                        <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                            <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                    {{ __('Nama File') }}
                                                </span>
                                            </div>

                                            <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                <a class="inline-block w-auto h-auto p-0 m-0 body-2 text-primary text-left leading-6 no-underline cursor-pointer outline-none hover:underline focus:underline active:underline" href="{{ $attachment->filename_url }}" target="_blank">
                                                    {{ str($attachment->filename)->basename() }}
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                        <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                            <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                    {{ __('Tidak ada data.') }}
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                @endforelse
                            </ul>

                            <ul class="block w-full p-0 mb-2 mt-6 list-none shadow-none relative first:mt-0 last:mb-0">
                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <span class="block w-auto h-auto p-0 py-2 m-0 caption uppercase tracking-[1.25px] text-black/[0.60] truncate dark:text-white/[0.60]">
                                        {{ __('Riwayat') }}
                                    </span>
                                </li>

                                @forelse($asset->assetHistories as $history)
                                    <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                        <div class="block w-full h-auto p-0 m-0 border-b border-solid border-chinese-white relative">
                                            <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-none border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ __('Sejak Tanggal') }}
                                                    </span>
                                                </div>

                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ $history->date_from }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-none border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ __('Penanggung Jawab') }}
                                                    </span>
                                                </div>

                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ $history->responsiblePerson?->name }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-none border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ __('Lokasi') }}
                                                    </span>
                                                </div>

                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ $history->location?->name }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-none border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ __('Jumlah') }}
                                                    </span>
                                                </div>

                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ $history->qty . __(' Unit') }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-none border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ __('Keterangan') }}
                                                    </span>
                                                </div>

                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ $history->notes ?? __('-') }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                        <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                            <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                    {{ __('Tidak ada data.') }}
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                @endforelse
                            </ul>

                            <ul class="block w-full p-0 mb-2 mt-6 list-none shadow-none relative first:mt-0 last:mb-0">
                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <span class="block w-auto h-auto p-0 py-2 m-0 caption uppercase tracking-[1.25px] text-black/[0.60] truncate dark:text-white/[0.60]">
                                        {{ __('Keuangan') }}
                                    </span>
                                </li>

                                @forelse($asset->assetFinances as $finance)
                                    <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                        <div class="block w-full h-auto p-0 m-0 border-b border-solid border-chinese-white relative">
                                            <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-none border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ __('Tipe') }}
                                                    </span>
                                                </div>

                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ $finance->type->label() }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-none border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ __('Tanggal') }}
                                                    </span>
                                                </div>

                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ $finance->date }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-none border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ __('Nominal') }}
                                                    </span>
                                                </div>

                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ Number::currency($finance->amount, in: 'IDR', locale: 'id') }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-none border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ __('Keterangan') }}
                                                    </span>
                                                </div>

                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ $finance->notes ?? __('-') }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                        <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                            <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                    {{ __('Tidak ada data.') }}
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                @endforelse
                            </ul>

                            <ul class="block w-full p-0 mb-2 mt-6 list-none shadow-none relative first:mt-0 last:mb-0">
                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <span class="block w-auto h-auto p-0 py-2 m-0 caption uppercase tracking-[1.25px] text-black/[0.60] truncate dark:text-white/[0.60]">
                                        {{ __('Verifikasi') }}
                                    </span>
                                </li>

                                @forelse($asset->assetVerifications as $verification)
                                    <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                        <div class="block w-full h-auto p-0 m-0 border-b border-solid border-chinese-white relative">
                                            <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-none border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ __('Foto') }}
                                                    </span>
                                                </div>

                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <div class="inline-block w-auto h-auto p-0.5 ml-4 align-top relative first:ml-0" data-te-lightbox-init>
                                                        <img class="block min-w-[96px] w-24 h-24 p-0.5 m-0 rounded align-middle text-center text-transparent object-cover indent-[10000px] ring-2 ring-primary cursor-zoom-in data-[te-lightbox-disabled]:cursor-auto" src="{{ $verification->photo_url }}" alt="" data-te-img="{{ $verification->photo_url }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-none border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ __('Tanggal') }}
                                                    </span>
                                                </div>

                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ $verification->date }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-none border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ __('Kondisi Barang') }}
                                                    </span>
                                                </div>

                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ $verification->condition->label() }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-none border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ __('Keterangan') }}
                                                    </span>
                                                </div>

                                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                    <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                        {{ $verification->notes ?? __('-') }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                        <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                            <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                                <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                    {{ __('Tidak ada data.') }}
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                @endforelse
                            </ul>

                            <ul class="block w-full p-0 mb-2 mt-6 list-none shadow-none relative first:mt-0 last:mb-0">
                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Dibuat Pada') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->created_at }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Diubah Pada') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $asset->updated_at }}
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>

                </div>
                {{-- End Cards --}}

            </div>
        </main>

        @include('layout.footer')

    </div>
@endsection
