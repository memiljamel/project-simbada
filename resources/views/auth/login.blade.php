@extends('app')

@section('title', 'Login')

@section('content')
    <div class="flex flex-col w-full h-full p-0 m-0 relative sm:before:block sm:before:h-6 sm:before:min-h-[24px] sm:before:flex-grow sm:after:block sm:after:h-6 sm:after:min-h-[24px] sm:after:flex-grow">
        <div class="flex flex-col flex-shrink-0 w-full max-w-md min-h-screen h-auto p-0 mx-auto my-0 bg-white shadow-none rounded-none relative sm:block sm:min-h-0 sm:shadow-02dp sm:rounded-lg dark:bg-charleston-green">
            <div class="flex flex-col w-full h-full min-h-0 p-0 m-0 overflow-x-hidden overflow-y-auto outline-none relative sm:h-auto sm:min-h-[500px]">

                <form class="contents w-auto h-auto p-0 m-0 relative" action="{{ route('login.authenticate') }}" method="POST" autocomplete="off" autocapitalize="off">
                    @csrf
                    @method('POST')

                    <div class="flex flex-col flex-grow-0 w-full h-auto p-4 m-0 relative lg:px-6">
                        <div class="inline-block p-0 my-4 overflow-hidden relative">
                            <img class="block w-12 h-auto p-0 mx-auto align-middle" src="" alt="Logo" />

                            <span class="block w-full h-auto p-0 mt-3 headline-5 text-black/[0.87] text-center truncate dark:text-white">
                                {{ __('Login to your account') }}
                            </span>
                        </div>
                    </div>

                    @if (session()->has('message'))
                        {{-- Toast --}}
                        <div class="hidden invisible w-auto max-w-[344px] h-auto px-4 py-2 mx-auto bg-dark-charcoal border-none  rounded-full shadow-md overflow-hidden animate-toast fixed bottom-8 left-1/2 -translate-x-1/2 z-[9999] data-[te-toast-show]:block data-[te-toast-show]:visible data-[te-toast-hide]:hidden data-[te-toast-hide]:invisible dark:bg-lotion" role="alert" aria-live="assertive" aria-atomic="true" data-te-toast-init>
                            <span class="block w-full h-auto p-0 m-0 body-2 text-center text-white truncate dark:text-black">
                                {{ session()->get('message') }}
                            </span>
                        </div>
                        {{-- End Toast --}}
                    @endif

                    <div class="flex flex-col flex-grow-0 w-full h-auto p-4 m-0 relative lg:px-6">

                        <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-2 mt-2 relative sm:flex-row first:mt-0 last:mb-0">
                            <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                <div class="block w-auto h-auto p-0 mb-2 relative">

                                    {{-- Input --}}
                                    <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init>
                                        <input type="email" class="peer caret-primary block min-h-[48px] w-full border-0 bg-transparent pt-3 pb-2 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="off" autocapitalize="off" autofocus />

                                        <label class="pointer-events-none absolute top-0 left-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-3 leading-[1.6] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.25rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.25rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="email">
                                            {{ __('Email *') }}
                                        </label>
                                    </div>
                                    {{-- End Input --}}

                                </div>

                                @error('email')
                                    <span class="block w-full h-auto p-0 mb-2 text-xs tracking-normal text-error text-left break-words">
                                        {{ $message}}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-2 mt-2 relative sm:flex-row first:mt-0 last:mb-0">
                            <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-full">
                                <div class="block w-auto h-auto p-0 mb-2 relative">

                                    {{-- Input --}}
                                    <div class="block w-full h-auto p-0 m-0 relative" data-te-input-wrapper-init>
                                        <input type="password" class="peer caret-primary block min-h-[48px] w-full border-0 bg-transparent pt-3 pb-2 subtitle-1 text-black/[0.87] outline-none transition-none duration-0 ease-linear focus:placeholder:opacity-100 file:hidden file:w-0 file:opacity-0 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white/[0.87] dark:placeholder:text-white/[0.87] [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0 [&[type='file']]:opacity-0 group-data-[te-validation-state='invalid']:!caret-error disabled:!opacity-60 disabled:cursor-not-allowed group-has-[[data-te-input-state-active]]:opacity-100 group-has-[.is-invalid]:!caret-error @error('password') is-invalid @enderror" id="password" name="password" value="" autocomplete="off" autocapitalize="off" />

                                        <label class="pointer-events-none absolute top-0 left-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-3 leading-[1.6] text-black/[0.60] transition-all duration-200 ease-out peer-focus:-translate-y-[1.25rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.25rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-white/[0.60] dark:peer-focus:text-primary group-data-[te-validation-state='invalid']:!text-error group-data-[te-validation-state='invalid']:peer-focus:!text-error peer-disabled:opacity-60 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="password">
                                            {{ __('Password *') }}
                                        </label>
                                    </div>
                                    {{-- End Input --}}

                                </div>

                                @error('password')
                                    <span class="block w-full h-auto p-0 mb-2 text-xs tracking-normal text-error text-left break-words">
                                        {{ $message}}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-col justify-between item-center gap-4 w-full h-auto p-0 mb-2 mt-0 relative sm:flex-row first:mt-0 last:mb-0">
                            <div class="group flex-1 inline-block w-full h-auto p-0 m-0 relative sm:basis-6/12">
                                <div class="block w-auto h-auto p-0 mb-2 relative">
                                    <div class="flex flex-wrap justify-start items-start gap-4 w-auto h-auto p-0 m-0 relative">

                                        {{-- Checkbox --}}
                                        <div class="mb-0 block min-h-[1.5rem] pl-[1.5rem]">
                                            <input class="peer relative float-left -ml-[1.5rem] mr-[6px] mt-0.5 h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-black/[0.60] outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_theme(colors.primary)] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-white/[0.60] dark:checked:border-primary dark:checked:bg-primary dark:checked:after:border-black dark:checked:focus:after:border-black dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_theme(colors.primary)] disabled:opacity-75 disabled:cursor-not-allowed group-has-[.is-invalid]:checked:!border-error group-has-[.is-invalid]:checked:!bg-error group-has-[.is-invalid]:checked:focus:before:!shadow-[0px_0px_0px_13px_theme(colors.error)] group-has-[.is-invalid]:dark:checked:!border-error group-has-[.is-invalid]:dark:checked:!bg-error group-has-[.is-invalid]:dark:checked:focus:before:!shadow-[0px_0px_0px_13px_theme(colors.error)] @error('remember') is-invalid @enderror" type="checkbox" id="remember" name="remember" value="1" autocomplete="off" autocapitalize="off" @checked(old('remember', true)) />

                                            <label class="inline-block pl-[0.15rem] subtitle-1 !text-black/[0.87] hover:cursor-pointer dark:!text-white/[0.87] peer-disabled:opacity-75 peer-disabled:cursor-not-allowed group-has-[.is-invalid]:!text-error" for="remember">
                                                {{ __('Remember me?') }}
                                            </label>
                                        </div>
                                        {{-- End Checkbox --}}

                                    </div>
                                </div>

                                @error('remember')
                                    <span class="block w-full h-auto p-0 mb-2 text-xs tracking-normal text-error text-left break-words">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="flex-1 inline-block w-full h-auto p-0 m-0 text-right relative sm:basis-6/12">
                                <a href="{{ route('forgot.index') }}" class="inline-block w-auto h-auto p-0 m-0 subtitle-1 text-primary no-underline outline-none cursor-pointer hover:underline focus:underline active:underline">
                                    {{ __('Forgot password?') }}
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="flex flex-col flex-grow-0 w-full h-auto px-4 my-2 relative lg:px-6">

                        {{-- Button --}}
                        <div class="block w-full max-w-3xl h-auto p-0 my-0 relative">
                            <button type="submit" class="inline-block min-w-[64px] w-full h-9 px-4 py-2 m-0 rounded button text-black/[0.87] text-center align-middle truncate outline-none cursor-pointer relative disabled:opacity-70 disabled:cursor-not-allowed border-none text-white bg-primary shadow-[0_3px_1px_-2px_rgba(0,0,0,0.2),_0_2px_2px_0_rgba(0,0,0,0.14),_0_1px_5px_0_rgba(0,0,0,0.12)] transition-all hover:shadow-[0_2px_4px_-1px_rgba(0,0,0,0.2),_0_4px_5px_0_rgba(0,0,0,0.14),_0_1px_10px_0_rgba(0,0,0,0.12)] focus:shadow-[0_2px_4px_-1px_rgba(0,0,0,0.2),_0_4px_5px_0_rgba(0,0,0,0.14),_0_1px_10px_0_rgba(0,0,0,0.12)] active:shadow-[0_5px_5px_-3px_rgba(0,0,0,0.2),_0_8px_10px_1px_rgba(0,0,0,0.14),_0_3px_14px_2px_rgba(0,0,0,0.12)] disabled:!shadow-[0_3px_1px_-2px_rgba(0,0,0,0.2),_0_2px_2px_0_rgba(0,0,0,0.14),_0_1px_5px_0_rgba(0,0,0,0.12)]" data-te-ripple-init data-te-ripple-color="light">
                                {{ __('Submit') }}
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
