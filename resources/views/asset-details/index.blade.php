@extends('app')

@section('title', 'Detail')

@section('content')
    <div class="flex flex-col w-full h-full p-0 m-0 relative">

        <header class="block w-full h-auto p-0 m-0 fixed top-0 right-0 z-20 lg:pl-0 lg:left-auto">
            <nav class="flex justify-between items-center w-full h-14 p-2 m-0 bg-primary shadow-04dp lg:h-16 dark:bg-charleston-green">

                <div class="flex-1 block w-auto h-auto p-0 m-0 overflow-hidden relative">
                    <div class="block w-auto h-auto p-0 m-0 relative">
                        <a href="{{ route('home.index') }}" class="block w-auto max-w-full h-10 px-2 py-1.5 m-0 headline-6 text-white no-underline truncate dark:text-white">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                </div>

            </nav>
        </header>

        <main class="block flex-grow flex-shrink-0 w-auto h-auto p-0 mt-14 ml-0 lg:mt-16 lg:ml-0">
            <div class="block w-full max-w-5xl h-auto p-4 mx-auto overflow-hidden xl:mx-auto">

                {{-- Breadcrumbs --}}
                <nav class="block w-full h-auto p-0 m-0 list-none rounded whitespace-nowrap overflow-hidden relative">
                    <ol class="block w-full h-auto p-0 m-0 overflow-hidden">
                        <li class="inline-block w-auto h-auto p-0 m-0 relative [&+li::before]:content-['/'] [&+li::before]:mx-1 [&+li::before]:text-black/[0.60] dark:[&+li::before]:text-white/[0.60]">
                            <a href="{{ route('home.index') }}" class="inline-block w-auto h-auto p-0 m-0 subtitle-1 text-primary no-underline outline-none cursor-pointer hover:underline focus:underline active:underline">
                                {{ __('Beranda') }}
                            </a>
                        </li>

                        <li class="inline-block w-auto h-auto p-0 m-0 relative [&+li::before]:content-['/'] [&+li::before]:mx-1 [&+li::before]:text-black/[0.60] dark:[&+li::before]:text-white/[0.60]">
                            <span class="inline-block w-auto h-auto p-0 m-0 subtitle-1 text-black/[0.60] cursor-default dark:text-white/[0.60]">
                                {{ __('Detail') }}
                            </span>
                        </li>
                    </ol>
                </nav>
                {{-- End Breadcrumbs --}}

                {{-- Cards --}}
                <div class="block w-full h-auto p-0 mt-4 bg-white rounded text-black/[0.87] shadow-01dp overflow-hidden dark:bg-charleston-green">

                    <div class="block w-full h-auto p-0 m-0 overflow-hidden">
                        <div class="flex justify-between items-center w-full h-16 p-2 m-0 relative">

                            <div class="flex-1 block w-auto h-auto p-0 m-0 overflow-hidden relative">
                                <div class="block w-full h-auto p-0 m-0 relative">
                                    <h6 class="block w-full h-auto px-2 py-1.5 m-0 headline-6 text-black/[0.87] truncate dark:text-white/[0.87]">
                                        {{ __('Detail') }}
                                    </h6>
                                </div>
                            </div>

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
                                                {{ __('Penanggung Jawab') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                @if($asset->latestHistory)
                                                    {{ $asset->latestHistory?->responsiblePerson?->name }}
                                                @else
                                                    {{ __('-') }}
                                                @endif
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
                            </ul>

                        </div>
                    </div>

                </div>
                {{-- End Cards --}}

            </div>
        </main>

        <footer class="block flex-shrink-0 w-auto h-auto px-4 mt-4 ml-0 lg:ml-0">
            <div class="block w-full h-auto py-2 m-0 border-t border-solid border-chinese-white shadow-none dark:border-dark-liver">
                <div class="block py-1 m-0 text-center overflow-hidden relative lg:text-left">
                    <span class="inline-block w-auto h-auto p-0 m-0 caption text-black/[0.60] align-middle whitespace-nowrap dark:text-white/[0.60]">
                        &copy {{ config('app.name', 'Laravel') }} {{ now()->year }}, All rights reserved.
                    </span>
                </div>
            </div>
        </footer>

    </div>
@endsection
