@extends('app')

@section('title', 'Aset Aktif')

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
                            <a href="{{ route('asset-active.index') }}" class="inline-block w-auto h-auto p-0 m-0 subtitle-1 text-primary no-underline outline-none cursor-pointer hover:underline focus:underline active:underline">
                                {{ __('Aset Aktif') }}
                            </a>
                        </li>

                        <li class="inline-block w-auto h-auto p-0 m-0 relative [&+li::before]:content-['/'] [&+li::before]:mx-1 [&+li::before]:text-black/[0.60] dark:[&+li::before]:text-white/[0.60]">
                            <a href="{{ route('asset-active.show', $asset->id) }}" class="inline-block w-auto h-auto p-0 m-0 subtitle-1 text-primary no-underline outline-none cursor-pointer hover:underline focus:underline active:underline">
                                {{ $asset->name }}
                            </a>
                        </li>

                        <li class="inline-block w-auto h-auto p-0 m-0 relative [&+li::before]:content-['/'] [&+li::before]:mx-1 [&+li::before]:text-black/[0.60] dark:[&+li::before]:text-white/[0.60]">
                            <span class="inline-block w-auto h-auto p-0 m-0 subtitle-1 text-black/[0.60] cursor-default dark:text-white/[0.60]">
                                {{ __('Ubah') }}
                            </span>
                        </li>
                    </ol>
                </nav>
                {{-- End Breadcrumbs --}}

                {{-- Cards --}}
                <div class="block w-full h-auto p-0 mt-4 bg-white rounded text-black/[0.87] shadow-01dp overflow-hidden dark:bg-charleston-green">

                    <form class="contents w-auto h-auto p-0 m-0 relative" action="{{ route('asset-active.update', $asset->id) }}" method="POST" autocomplete="off" autocapitalize="off" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="block w-full h-auto p-0 m-0 overflow-hidden">
                            <div class="flex justify-between items-center gap-4 w-full h-16 p-2 m-0 relative">

                                <div class="flex justify-start items-center gap-2 w-auto h-auto p-0 m-0 overflow-hidden relative">

                                    {{-- Icon Link --}}
                                    <div class="inline-block w-auto h-auto p-0 m-0 relative">
                                        <a href="{{ route('asset-active.index') }}" class="block w-10 h-10 p-2 m-0 bg-transparent rounded-full text-black/[0.60] outline-none cursor-pointer align-middle transition duration-150 ease-in-out hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12]" data-te-toggle="tooltip" title="Kembali" data-te-ripple-init data-te-ripple-color="light">
                                            <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                                <path d="M0 0h24v24H0z" fill="none" />
                                                <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z" />
                                            </svg>
                                        </a>
                                    </div>
                                    {{-- End Icon Link --}}

                                </div>

                                <div class="flex-1 block w-auto h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="block w-full h-auto p-0 m-0 relative">
                                        <h6 class="block w-full h-auto px-2 py-1.5 m-0 headline-6 text-black/[0.87] truncate dark:text-white/[0.87]">
                                            {{ __('Ubah') }}
                                        </h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="block w-full h-auto p-4 m-0 border-y border-solid border-chinese-white overflow-hidden dark:border-dark-liver sm:p-6">
                            <div class="block w-full max-w-3xl h-auto p-0 m-0 relative">
                                <div class="flex flex-col flex-grow-0 gap-0 w-full h-auto p-0 m-0 relative">

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-4 relative sm:flex-row first:mt-0 last:mb-0">
                                        <span class="flex-1 inline-block w-full h-auto p-0 m-0 caption uppercase tracking-[1.25px] text-black/[0.60] truncate dark:text-white/[0.60]">
                                            {{ __('Umum') }}
                                        </span>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-0 relative">

                                                {{-- Input --}}
                                                <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init>
                                                    <input type="text" class="peer caret-primary block min-h-[48px] w-full rounded border-0 bg-transparent px-3 py-3 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code', $asset->code) }}" autocomplete="off" autocapitalize="off" autofocus />

                                                    <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="code">
                                                        {{ __('Kode Barang *') }}
                                                    </label>
                                                </div>
                                                {{-- End Input --}}

                                            </div>

                                            @error('code')
                                                <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-0 relative">

                                                {{-- Input --}}
                                                <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init>
                                                    <input type="text" class="peer caret-primary block min-h-[48px] w-full rounded border-0 bg-transparent px-3 py-3 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $asset->name) }}" autocomplete="off" autocapitalize="off" />

                                                    <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="name">
                                                        {{ __('Nama Barang *') }}
                                                    </label>
                                                </div>
                                                {{-- End Input --}}

                                            </div>

                                            @error('name')
                                                <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                                    {{ $message}}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-0 relative">

                                                {{-- Select --}}
                                                <div class="block w-full h-auto p-0 m-0 relative">
                                                    <select class="@error('category') is-invalid @enderror" id="category" name="category" data-te-select-init>
                                                        <option value="None" @selected(old('category', $asset->category?->name) == "None")>
                                                            {{ __('None') }}
                                                        </option>

                                                        @foreach ($categories as $key => $category)
                                                            <option value="{{ $category->name }}" @selected(old('category', $asset->category?->name) == $category->name)>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    <label for="category" data-te-select-label-ref>
                                                        {{ __('Category *') }}
                                                    </label>
                                                </div>
                                                {{-- End Select --}}

                                            </div>

                                            @error('category')
                                                <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-0 relative">

                                                {{-- Input --}}
                                                <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init>
                                                    <input type="text" class="peer caret-primary block min-h-[48px] w-full rounded border-0 bg-transparent px-3 py-3 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('serial_number') is-invalid @enderror" id="serial_number" name="serial_number" value="{{ old('serial_number', $asset->serial_number) }}" autocomplete="off" autocapitalize="off" />

                                                    <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="serial_number">
                                                        {{ __('Nomor Register *') }}
                                                    </label>
                                                </div>
                                                {{-- End Input --}}

                                            </div>

                                            @error('serial_number')
                                                <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-4 relative sm:flex-row first:mt-0 last:mb-0">
                                        <span class="flex-1 inline-block w-full h-auto p-0 m-0 caption uppercase tracking-[1.25px] text-black/[0.60] truncate dark:text-white/[0.60]">
                                            {{ __('Foto') }}
                                        </span>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-0 relative">

                                                {{-- Input --}}
                                                <div class="block w-full h-auto p-0 m-0 relative">
                                                    <label class="block w-full h-auto p-0 mb-2 caption text-black/[0.60] truncate dark:text-white/[0.60]" for="photo">
                                                        {{ __('Pilih Foto') }}
                                                    </label>

                                                    <input type="file" class="relative m-0 block w-full min-w-0 h-auto flex-auto cursor-pointer rounded border border-solid border-black/[0.24] bg-transparent bg-clip-padding px-3 py-[0.32rem] leading-[2.25] subtitle-1 transition-none duration-0 ease-in-out file:-mx-3 file:-my-[0.32rem] file:me-3 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-e file:border-solid file:border-inherit file:bg-transparent file:px-3 file:py-[0.32rem] file:text-surface focus:border-primary focus:text-gray-700 focus:shadow-[0_0_0_1px_theme(colors.primary)] focus:outline-none dark:border-white/[0.24] dark:text-white/[0.87] file:dark:text-white/[0.87] group-has-[.is-invalid]:!border-error group-has-[.is-invalid]:focus:!shadow-[0_0_0_1px_theme(colors.error)] @error('photo') is-invalid @enderror" id="photo" name="photo" autocomplete="off" autocapitalize="off" accept="image/jpeg, image/png" />
                                                </div>
                                                {{-- End Input --}}

                                            </div>

                                            @error('photo')
                                                <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-4 relative sm:flex-row first:mt-0 last:mb-0">
                                        <span class="flex-1 inline-block w-full h-auto p-0 m-0 caption uppercase tracking-[1.25px] text-black/[0.60] truncate dark:text-white/[0.60]">
                                            {{ __('Detail Aset') }}
                                        </span>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-0 relative">

                                                {{-- Input --}}
                                                <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init data-autocomplete data-autocomplete-items="{{ Js::from($brands) }}">
                                                    <input type="text" class="peer caret-primary block min-h-[48px] w-full rounded border-0 bg-transparent px-3 py-3 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{ old('brand', $asset->brand?->name) }}" autocomplete="off" autocapitalize="off" />

                                                    <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="brand">
                                                        {{ __('Merk *') }}
                                                    </label>
                                                </div>
                                                {{-- End Input --}}

                                            </div>

                                            @error('brand')
                                                <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-0 relative">

                                                {{-- Input --}}
                                                <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init>
                                                    <input type="text" class="peer caret-primary block min-h-[48px] w-full rounded border-0 bg-transparent px-3 py-3 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('type') is-invalid @enderror" id="type" name="type" value="{{ old('type', $asset->type) }}" autocomplete="off" autocapitalize="off" />

                                                    <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="type">
                                                        {{ __('Tipe *') }}
                                                    </label>
                                                </div>
                                                {{-- End Input --}}

                                            </div>

                                            @error('type')
                                                <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-0 relative">

                                                {{-- Input --}}
                                                <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init>
                                                    <input type="text" class="peer caret-primary block min-h-[48px] w-full rounded border-0 bg-transparent px-3 py-3 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('size') is-invalid @enderror" id="size" name="size" value="{{ old('size', $asset->size) }}" autocomplete="off" autocapitalize="off" />

                                                    <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="size">
                                                        {{ __('Ukuran / CC *') }}
                                                    </label>
                                                </div>
                                                {{-- End Input --}}

                                            </div>

                                            @error('size')
                                                <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-0 relative">

                                                {{-- Input --}}
                                                <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init>
                                                    <input type="text" class="peer caret-primary block min-h-[48px] w-full rounded border-0 bg-transparent px-3 py-3 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('material') is-invalid @enderror" id="material" name="material" value="{{ old('material', $asset->material) }}" autocomplete="off" autocapitalize="off" />

                                                    <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="material">
                                                        {{ __('Bahan *') }}
                                                    </label>
                                                </div>
                                                {{-- End Input --}}

                                            </div>

                                            @error('material')
                                                <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-0 relative">

                                                {{-- Input --}}
                                                <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init>
                                                    <input type="number" class="peer caret-primary block min-h-[48px] w-full rounded border-0 bg-transparent px-3 py-3 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('purchase_year') is-invalid @enderror" id="purchase_year" name="purchase_year" value="{{ old('purchase_year', $asset->purchase_year) }}" autocomplete="off" autocapitalize="off" />

                                                    <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="purchase_year">
                                                        {{ __('Tahun Pembelian *') }}
                                                    </label>
                                                </div>
                                                {{-- End Input --}}

                                            </div>

                                            @error('purchase_year')
                                                <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-4 relative sm:flex-row first:mt-0 last:mb-0">
                                        <span class="flex-1 inline-block w-full h-auto p-0 m-0 caption uppercase tracking-[1.25px] text-black/[0.60] truncate dark:text-white/[0.60]">
                                            {{ __('Nomor') }}
                                        </span>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-0 relative">

                                                {{-- Input --}}
                                                <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init data-autocomplete data-autocomplete-items="{{ Js::from($distributors) }}">
                                                    <input type="text" class="peer caret-primary block min-h-[48px] w-full rounded border-0 bg-transparent px-3 py-3 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('distributor') is-invalid @enderror" id="distributor" name="distributor" value="{{ old('distributor', $asset->distributor?->name) }}" autocomplete="off" autocapitalize="off" />

                                                    <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="distributor">
                                                        {{ __('Pabrik') }}
                                                    </label>
                                                </div>
                                                {{-- End Input --}}

                                            </div>

                                            @error('distributor')
                                                <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-0 relative">

                                                {{-- Input --}}
                                                <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init>
                                                    <input type="text" class="peer caret-primary block min-h-[48px] w-full rounded border-0 bg-transparent px-3 py-3 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('frame_number') is-invalid @enderror" id="frame_number" name="frame_number" value="{{ old('frame_number', $asset->frame_number) }}" autocomplete="off" autocapitalize="off" />

                                                    <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="frame_number">
                                                        {{ __('Rangka') }}
                                                    </label>
                                                </div>
                                                {{-- End Input --}}

                                            </div>

                                            @error('frame_number')
                                                <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-0 relative">

                                                {{-- Input --}}
                                                <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init>
                                                    <input type="text" class="peer caret-primary block min-h-[48px] w-full rounded border-0 bg-transparent px-3 py-3 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('engine_number') is-invalid @enderror" id="engine_number" name="engine_number" value="{{ old('engine_number', $asset->engine_number) }}" autocomplete="off" autocapitalize="off" />

                                                    <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="engine_number">
                                                        {{ __('Mesin') }}
                                                    </label>
                                                </div>
                                                {{-- End Input --}}

                                            </div>

                                            @error('engine_number')
                                                <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-0 relative">

                                                {{-- Input --}}
                                                <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init>
                                                    <input type="text" class="peer caret-primary block min-h-[48px] w-full rounded border-0 bg-transparent px-3 py-3 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('police_number') is-invalid @enderror" id="police_number" name="police_number" value="{{ old('police_number', $asset->police_number) }}" autocomplete="off" autocapitalize="off" />

                                                    <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="police_number">
                                                        {{ __('Polisi') }}
                                                    </label>
                                                </div>
                                                {{-- End Input --}}

                                            </div>

                                            @error('police_number')
                                                <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-0 relative">

                                                {{-- Input --}}
                                                <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init>
                                                    <input type="text" class="peer caret-primary block min-h-[48px] w-full rounded border-0 bg-transparent px-3 py-3 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('bpkb_number') is-invalid @enderror" id="bpkb_number" name="bpkb_number" value="{{ old('bpkb_number', $asset->bpkb_number) }}" autocomplete="off" autocapitalize="off" />

                                                    <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="bpkb_number">
                                                        {{ __('BPKB') }}
                                                    </label>
                                                </div>
                                                {{-- End Input --}}

                                            </div>

                                            @error('bpkb_number')
                                                <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-4 relative sm:flex-row first:mt-0 last:mb-0">
                                        <span class="flex-1 inline-block w-full h-auto p-0 m-0 caption uppercase tracking-[1.25px] text-black/[0.60] truncate dark:text-white/[0.60]">
                                            {{ __('Pembelian') }}
                                        </span>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-0 relative">

                                                {{-- Input --}}
                                                <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init>
                                                    <textarea class="peer caret-primary block min-h-[48px] w-full rounded border-0 bg-transparent px-3 py-3 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('origin') is-invalid @enderror" rows="1" id="origin" name="origin" autocomplete="off" autocapitalize="off" spellcheck="false">{{ old('origin', $asset->origin) }}</textarea>

                                                    <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="origin">
                                                        {{ __('Asal Usul *') }}
                                                    </label>
                                                </div>
                                                {{-- End Input --}}

                                            </div>

                                            @error('origin')
                                                <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-0 relative">

                                                {{-- Input --}}
                                                <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init>
                                                    <input type="number" class="peer caret-primary block min-h-[48px] w-full rounded border-0 bg-transparent px-3 py-3 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('unit_price') is-invalid @enderror" id="unit_price" name="unit_price" value="{{ old('unit_price', $asset->unit_price) }}" autocomplete="off" autocapitalize="off" />

                                                    <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="unit_price">
                                                        {{ __('Harga Satuan (Rp) *') }}
                                                    </label>
                                                </div>
                                                {{-- End Input --}}

                                            </div>

                                            @error('unit_price')
                                                <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-4 relative sm:flex-row first:mt-0 last:mb-0">
                                        <span class="flex-1 inline-block w-full h-auto p-0 m-0 caption uppercase tracking-[1.25px] text-black/[0.60] truncate dark:text-white/[0.60]">
                                            {{ __('Lampiran') }}
                                        </span>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-0 relative">

                                                {{-- Input --}}
                                                <div class="block w-full h-auto p-0 m-0 relative">
                                                    <label class="block w-full h-auto p-0 mb-2 caption text-black/[0.60] truncate dark:text-white/[0.60]" for="attachments">
                                                        {{ __('Pilih Lampiran (Maks: 5 file)') }}
                                                    </label>

                                                    <input type="file" class="relative m-0 block w-full min-w-0 h-auto flex-auto cursor-pointer rounded border border-solid border-black/[0.24] bg-transparent bg-clip-padding px-3 py-[0.32rem] leading-[2.25] subtitle-1 transition-none duration-0 ease-in-out file:-mx-3 file:-my-[0.32rem] file:me-3 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-e file:border-solid file:border-inherit file:bg-transparent file:px-3 file:py-[0.32rem] file:text-surface focus:border-primary focus:text-gray-700 focus:shadow-[0_0_0_1px_theme(colors.primary)] focus:outline-none dark:border-white/[0.24] dark:text-white/[0.87] file:dark:text-white/[0.87] group-has-[.is-invalid]:!border-error group-has-[.is-invalid]:focus:!shadow-[0_0_0_1px_theme(colors.error)] @error('attachments') is-invalid @enderror" id="attachments" name="attachments[]" autocomplete="off" autocapitalize="off" multiple />
                                                </div>
                                                {{-- End Input --}}

                                            </div>

                                            @error('attachments')
                                                <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-4 relative sm:flex-row first:mt-0 last:mb-0">
                                        <span class="flex-1 inline-block w-full h-auto p-0 m-0 caption uppercase tracking-[1.25px] text-black/[0.60] truncate dark:text-white/[0.60]">
                                            {{ __('Catatan Tambahan') }}
                                        </span>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-2 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <span class="flex-1 inline-block w-full h-auto p-0 m-0 caption text-black/[0.60] truncate dark:text-white/[0.60]">
                                            {{ __('Status Barang *') }}
                                        </span>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-6 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-0 relative">

                                                <div class="flex flex-wrap justify-start items-start gap-4 w-auto h-auto p-0 m-0 relative">
                                                    @foreach(App\Enums\AssetStatusEnum::cases() as $key => $status)
                                                        {{-- Checkbox --}}
                                                        <div class="mb-0 block min-h-[1.5rem] pl-[1.5rem]">
                                                            <input class="peer relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-black/[0.60] outline-none before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-0 after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_theme(colors.primary)] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-white/[0.60] dark:checked:border-primary dark:checked:after:border-black dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_theme(colors.primary)] disabled:opacity-75 disabled:cursor-not-allowed group-has-[.is-invalid]:checked:!border-error group-has-[.is-invalid]:checked:after:!border-error group-has-[.is-invalid]:checked:after:!bg-error group-has-[.is-invalid]:checked:focus:!border-error group-has-[.is-invalid]:checked:focus:before:!shadow-[0px_0px_0px_13px_theme(colors.error)] group-has-[.is-invalid]:dark:checked:!border-error group-has-[.is-invalid]:dark:checked:focus:before:!shadow-[0px_0px_0px_13px_theme(colors.error)] @error('status') is-invalid @enderror" type="radio" id="{{ $status->value }}" name="status" value="{{ $status->value }}" autocomplete="off" autocapitalize="off" @checked(old('status', $status->value === $asset->status->value ?: $key === 0) == $status->value) />

                                                            <label class="inline-block pl-1.5 mt-px subtitle-1 !text-black/[0.87] hover:cursor-pointer dark:!text-white/[0.87] peer-disabled:opacity-75 peer-disabled:cursor-not-allowed" for="{{ $status->value }}">
                                                                {{ $status->label() }}
                                                            </label>
                                                        </div>
                                                        {{-- End Checkbox --}}
                                                    @endforeach
                                                </div>

                                            </div>

                                            @error('status')
                                                <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                                  {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-0 relative">

                                                {{-- Input --}}
                                                <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init>
                                                    <textarea class="peer caret-primary block min-h-[48px] w-full rounded border-0 bg-transparent px-3 py-3 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('notes') is-invalid @enderror" rows="1" id="notes" name="notes" autocomplete="off" autocapitalize="off" spellcheck="false">{{ old('notes', $asset->notes) }}</textarea>

                                                    <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="notes">
                                                        {{ __('Keterangan') }}
                                                    </label>
                                                </div>
                                                {{-- End Input --}}

                                            </div>

                                            @error('notes')
                                                <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="block w-full h-auto p-0 m-0 overflow-hidden">
                            <div class="flex justify-start items-center w-full h-auto p-2 m-0 relative">

                                <div class="flex-1 block w-full min-h-[36px] h-auto p-0 m-0 relative">
                                    <div class="flex justify-end items-center gap-4 w-full h-auto p-0 m-0 relative">

                                        {{-- Button --}}
                                        <div class="block w-auto h-auto p-0 m-0 relative">
                                            <button type="reset" class="inline-block min-w-[64px] w-auto h-9 p-2 m-0 bg-transparent rounded button text-primary text-center shadow-none align-middle truncate outline-none cursor-pointer relative hover:bg-primary/[0.04] active:bg-primary/[0.10] focus:bg-primary/[0.12] disabled:opacity-70 disabled:cursor-not-allowed disabled:hover:!bg-transparent disabled:active:!bg-transparent disabled:focus:!bg-transparent" data-te-ripple-init data-te-ripple-color="light">
                                                {{ __('Reset') }}
                                            </button>
                                        </div>
                                        {{-- End Button --}}

                                        {{-- Button --}}
                                        <div class="block w-auto h-auto p-0 m-0 relative">
                                            <button type="submit" class="inline-block min-w-[64px] w-auto h-9 p-2 m-0 bg-transparent rounded button text-primary text-center shadow-none align-middle truncate outline-none cursor-pointer relative hover:bg-primary/[0.04] active:bg-primary/[0.10] focus:bg-primary/[0.12] disabled:opacity-70 disabled:cursor-not-allowed disabled:hover:!bg-transparent disabled:active:!bg-transparent disabled:focus:!bg-transparent" data-te-ripple-init data-te-ripple-color="light">
                                                {{ __('Kirim') }}
                                            </button>
                                        </div>
                                        {{-- End Button --}}

                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </main>

        @include('layout.footer')

    </div>
@endsection
