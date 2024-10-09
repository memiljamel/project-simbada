@extends('app')

@section('title', 'Prints')

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
                            <a href="" class="inline-block w-auto h-auto p-0 m-0 subtitle-1 text-primary no-underline outline-none cursor-pointer hover:underline focus:underline active:underline">
                                {{ __('Dashboard') }}
                            </a>
                        </li>

                        <li class="inline-block w-auto h-auto p-0 m-0 relative [&+li::before]:content-['/'] [&+li::before]:mx-1 [&+li::before]:text-black/[0.60] dark:[&+li::before]:text-white/[0.60]">
                            <span class="inline-block w-auto h-auto p-0 m-0 subtitle-1 text-black/[0.60] cursor-default dark:text-white/[0.60]">
                                {{ __('Prints') }}
                            </span>
                        </li>
                    </ol>
                </nav>
                {{-- End Breadcrumbs --}}

                {{-- Cards --}}
                <div class="block w-full h-auto p-0 mt-4 bg-white rounded text-black/[0.87] shadow-01dp overflow-hidden dark:bg-charleston-green">

                    <form action="{{ route('prints.store') }}" method="POST" autocomplete="off" autocapitalize="off">
                        @csrf
                        @method('POST')

                        <div class="block w-full h-auto p-0 m-0 overflow-hidden">
                            <div class="flex justify-between items-center gap-4 w-full h-16 p-2 m-0 relative">

                                <div class="flex-1 block w-auto h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="block w-full h-auto p-0 m-0 relative">
                                        <h6 class="block w-full h-auto px-2 py-1.5 m-0 headline-6 text-black/[0.87] truncate dark:text-white/[0.87]">
                                            {{ __('Prints') }}
                                        </h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="block w-full h-auto p-4 m-0 border-y border-solid border-chinese-white overflow-hidden dark:border-dark-liver sm:p-6">
                            <div class="block w-full max-w-3xl h-auto p-0 m-0 relative">
                                <div class="flex flex-col flex-grow-0 gap-0 w-full h-auto p-0 m-0 relative">

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-2 mt-2 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-2 relative">

                                                {{-- Select --}}
                                                <div class="block w-full h-auto p-0 m-0 relative">
                                                    <select class="@error('asset_id') is-invalid @enderror" id="asset_id" name="asset_id" data-te-select-init data-te-select-filter="true">
                                                        <option value="" hidden selected></option>

                                                        @foreach ($assets as $asset)
                                                            <option value="{{ $asset->id }}" @selected(old('asset_id') == $asset->id)>
                                                                {{ $asset->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    <label for="asset_id" data-te-select-label-ref>
                                                        {{ __('Asset Name *') }}
                                                    </label>
                                                </div>
                                                {{-- End Select --}}

                                            </div>

                                            @error('asset_id')
                                                <span class="block w-full h-auto p-0 mb-2 text-xs tracking-normal text-error text-left break-words">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-2 mt-2 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-2 relative">

                                                {{-- Input --}}
                                                <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init>
                                                    <input type="number" class="peer caret-primary block min-h-[48px] w-full border-0 bg-transparent pt-3 pb-2 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('qty') is-invalid @enderror" id="qty" name="qty" value="{{ old('qty') }}" autocomplete="off" autocapitalize="off" />

                                                    <label class="pointer-events-none absolute top-0 left-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-3 leading-[1.6] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.25rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.25rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="qty">
                                                        {{ __('Qty *') }}
                                                    </label>
                                                </div>
                                                {{-- End Input --}}

                                            </div>

                                            @error('qty')
                                                <span class="block w-full h-auto p-0 mb-2 text-xs tracking-normal text-error text-left break-words">
                                                    {{ $message}}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-2 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                                        <span class="flex-1 inline-block w-full h-auto p-0 m-0 caption text-black/[0.60] truncate dark:text-white/[0.60]">
                                            {{ __('Size *') }}
                                        </span>
                                    </div>

                                    <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-2 mt-2 relative sm:flex-row first:mt-0 last:mb-0">
                                        <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                            <div class="block w-auto h-auto p-0 mb-2 relative">

                                                <div class="flex flex-wrap justify-start items-start gap-4 w-auto h-auto p-0 m-0 relative">
                                                    @foreach(App\Enums\SizeQrCodeEnum::cases() as $key => $size)
                                                        {{-- Checkbox --}}
                                                        <div class="mb-0 block min-h-[1.5rem] pl-[1.5rem]">
                                                            <input class="peer relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-black/[0.60] outline-none before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-0 after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_theme(colors.primary)] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-white/[0.60] dark:checked:border-primary dark:checked:after:border-black dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_theme(colors.primary)] disabled:opacity-75 disabled:cursor-not-allowed group-has-[.is-invalid]:checked:!border-error group-has-[.is-invalid]:checked:after:!border-error group-has-[.is-invalid]:checked:after:!bg-error group-has-[.is-invalid]:checked:focus:!border-error group-has-[.is-invalid]:checked:focus:before:!shadow-[0px_0px_0px_13px_theme(colors.error)] group-has-[.is-invalid]:dark:checked:!border-error group-has-[.is-invalid]:dark:checked:focus:before:!shadow-[0px_0px_0px_13px_theme(colors.error) @error('size') is-invalid @enderror" type="radio" id="{{ $size->value }}" name="size" value="{{ $size->value }}" autocomplete="off" autocapitalize="off" @checked(old('size', $key === 0) == $size->value) />

                                                            <label class=" inline-block pl-1.5 mt-px subtitle-1 !text-black/[0.87] hover:cursor-pointer dark:!text-white/[0.87] peer-disabled:opacity-75 peer-disabled:cursor-not-allowed" for="{{ $size->value }}">
                                                                {{ $size->label() }}
                                                            </label>
                                                        </div>
                                                        {{-- End Checkbox --}}
                                                    @endforeach
                                                </div>

                                            </div>

                                            @error('size')
                                                <span class="block w-full h-auto p-0 mb-2 text-xs tracking-normal text-error text-left break-words">
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
                                                {{ __('Submit') }}
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
