@extends('app')

@section('title', 'Reset Password')

@section('content')
    <div class="flex flex-col w-full h-full p-0 m-0 relative sm:before:block sm:before:h-6 sm:before:min-h-[24px] sm:before:flex-grow sm:after:block sm:after:h-6 sm:after:min-h-[24px] sm:after:flex-grow">
        <div class="flex flex-col flex-shrink-0 w-full max-w-md min-h-screen h-auto p-0 mx-auto my-0 bg-white shadow-none rounded-none relative sm:block sm:min-h-0 sm:shadow-02dp sm:rounded-lg dark:bg-charleston-green">
            <div class="flex flex-col w-full h-full min-h-0 p-0 m-0 overflow-x-hidden overflow-y-auto outline-none relative sm:h-auto sm:min-h-[500px]">

                <form class="contents w-auto h-auto p-0 m-0 relative" action="{{ route('reset.recovery') }}" method="POST" autocomplete="off" autocapitalize="off">
                    @csrf
                    @method('POST')

                    <div class="flex flex-col flex-grow-0 w-full h-auto p-4 m-0 relative lg:px-6">
                        <div class="inline-block p-0 my-4 overflow-hidden relative">
                            <img class="block w-12 h-auto p-0 mx-auto align-middle" src="" alt="Logo" />

                            <span class="block w-full h-auto p-0 mt-3 headline-5 text-black/[0.87] text-center truncate dark:text-white">
                                {{ __('Reset your password') }}
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-col flex-grow-0 w-full h-auto p-4 m-0 relative lg:px-6">

                        <input type="hidden" name="token" value="{{ $token }}" />

                        <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                            <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                <div class="block w-auto h-auto p-0 mb-0 relative">

                                    {{-- Input --}}
                                    <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init>
                                        <input type="email" class="peer caret-primary block min-h-[48px] w-full rounded border-0 bg-transparent px-3 py-3 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="off" autocapitalize="off" autofocus />

                                        <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="email">
                                            {{ __('Email *') }}
                                        </label>
                                    </div>
                                    {{-- End Input --}}

                                </div>

                                @error('email')
                                    <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                        {{ $message}}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                            <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                <div class="block w-auto h-auto p-0 mb-0 relative">

                                    {{-- Input --}}
                                    <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init>
                                        <input type="password" class="peer caret-primary block min-h-[48px] w-full rounded border-0 bg-transparent px-3 py-3 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('password') is-invalid @enderror" id="password" name="password" value="" autocomplete="off" autocapitalize="off" />

                                        <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="password">
                                            {{ __('Password *') }}
                                        </label>
                                    </div>
                                    {{-- End Input --}}

                                </div>

                                @error('password')
                                    <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                        {{ $message}}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-4 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                            <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                <div class="block w-auto h-auto p-0 mb-0 relative">

                                    {{-- Input --}}
                                    <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init>
                                        <input type="password" class="peer caret-primary block min-h-[48px] w-full rounded border-0 bg-transparent px-3 py-3 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" value="" autocomplete="off" autocapitalize="off" />

                                        <label class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="password_confirmation">
                                            {{ __('Password Confirmation *') }}
                                        </label>
                                    </div>
                                    {{-- End Input --}}

                                </div>

                                @error('password_confirmation')
                                    <span class="block w-full h-auto p-0 mt-2 text-xs tracking-normal text-error text-left break-words">
                                        {{ $message}}
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="flex flex-col flex-grow-0 w-full h-auto px-4 my-2 relative lg:px-6">

                        {{-- Button --}}
                        <div class="block w-full max-w-3xl h-auto p-0 my-0 relative">
                            <button type="submit" class="inline-block min-w-[64px] w-full h-9 px-4 py-2 m-0 rounded button text-black/[0.87] text-center align-middle truncate outline-none cursor-pointer relative disabled:opacity-70 disabled:cursor-not-allowed border-none text-white bg-primary shadow-[0_3px_1px_-2px_rgba(0,0,0,0.2),_0_2px_2px_0_rgba(0,0,0,0.14),_0_1px_5px_0_rgba(0,0,0,0.12)] transition-all hover:shadow-[0_2px_4px_-1px_rgba(0,0,0,0.2),_0_4px_5px_0_rgba(0,0,0,0.14),_0_1px_10px_0_rgba(0,0,0,0.12)] focus:shadow-[0_2px_4px_-1px_rgba(0,0,0,0.2),_0_4px_5px_0_rgba(0,0,0,0.14),_0_1px_10px_0_rgba(0,0,0,0.12)] active:shadow-[0_5px_5px_-3px_rgba(0,0,0,0.2),_0_8px_10px_1px_rgba(0,0,0,0.14),_0_3px_14px_2px_rgba(0,0,0,0.12)] disabled:!shadow-[0_3px_1px_-2px_rgba(0,0,0,0.2),_0_2px_2px_0_rgba(0,0,0,0.14),_0_1px_5px_0_rgba(0,0,0,0.12)]" data-te-ripple-init data-te-ripple-color="light">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                        {{-- End Button --}}

                    </div>

                    <div class="flex flex-col flex-grow w-full min-h-[56px] h-auto p-4 m-0 relative lg:px-6">
                        <div class="block w-auto h-auto p-0 m-0 absolute left-1/2 bottom-4 -translate-x-1/2 z-auto">
                            <span class="inline-block w-auto h-auto p-0 m-0 caption text-black/[0.60] align-middle whitespace-nowrap dark:text-white/[0.60]">
                                &copy {{ config('app.name', 'Laravel') }} {{ now()->year }}, All rights reserved.
                            </span>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
