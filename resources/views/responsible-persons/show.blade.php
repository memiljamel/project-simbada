@extends('app')

@section('title', 'Responsible Persons')

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
                            <a href="{{ route('responsible-persons.index') }}" class="inline-block w-auto h-auto p-0 m-0 subtitle-1 text-primary no-underline outline-none cursor-pointer hover:underline focus:underline active:underline">
                                {{ __('Responsible Persons') }}
                            </a>
                        </li>

                        <li class="inline-block w-auto h-auto p-0 m-0 relative [&+li::before]:content-['/'] [&+li::before]:mx-1 [&+li::before]:text-black/[0.60] dark:[&+li::before]:text-white/[0.60]">
                            <span class="inline-block w-auto h-auto p-0 m-0 subtitle-1 text-black/[0.60] cursor-default dark:text-white/[0.60]">
                                {{ $person->name }}
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
                                    <a href="{{ route('responsible-persons.index') }}" class="block w-10 h-10 p-2 m-0 bg-transparent rounded-full text-black/[0.60] outline-none cursor-pointer align-middle transition duration-150 ease-in-out hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12]" data-te-toggle="tooltip" title="Back" data-te-ripple-init data-te-ripple-color="light">
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
                                        {{ __('Details') }}
                                    </h6>
                                </div>
                            </div>

                            <div class="flex justify-start items-center gap-2 w-auto h-auto p-0 m-0 overflow-hidden relative">
                                <form class="contents w-auto h-auto p-0 m-0 relative" action="{{ route('responsible-persons.destroy', $person->id) }}" method="POST" autocomplete="off" autocapitalize="off">
                                    @csrf
                                    @method('DELETE')

                                    <div class="inline-block w-auto h-auto p-0 m-0 relative">

                                        {{-- Icon Link --}}
                                        <div class="block w-auto h-auto p-0 m-0 relative">
                                            <a href="{{ route('responsible-persons.edit', $person->id) }}" class="block w-10 h-10 p-2 m-0 bg-transparent rounded-full text-black/[0.60] outline-none cursor-pointer align-middle transition duration-150 ease-in-out hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12]" data-te-toggle="tooltip" title="Edit" data-te-ripple-init data-te-ripple-color="light">
                                                <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                                    <path d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
                                                </svg>
                                            </a>
                                        </div>
                                        {{-- End Icon Link --}}

                                    </div>

                                    <div class="inline-block w-auto h-auto p-0 m-0 relative">

                                        {{-- Icon Button --}}
                                        <div class="block w-auto h-auto p-0 m-0 relative">
                                            <button type="submit" class="block w-10 h-10 p-2 m-0 bg-transparent rounded-full text-black/[0.60] outline-none cursor-pointer align-middle transition duration-150 ease-in-out hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12] disabled:opacity-70 disabled:cursor-not-allowed disabled:hover:!bg-transparent disabled:active:!bg-transparent disabled:focus:!bg-transparent" data-te-toggle="tooltip" title="Delete" data-te-ripple-init data-te-ripple-color="light">
                                                <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                                    <path d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                                                </svg>
                                            </button>
                                        </div>
                                        {{-- End Icon Button --}}

                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>

                    <div class="block w-full h-auto p-4 m-0 border-y border-solid border-chinese-white overflow-hidden dark:border-dark-liver sm:p-6">
                        <div class="block w-full max-w-3xl h-auto p-0 m-0 relative">

                            <ul class="block w-full p-0 mb-2 mt-6 list-none shadow-none relative first:mt-0 last:mb-0">
                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Id') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $person->id }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Name') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $person->name }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Position') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $person->position }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Address') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $person->address }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Telephone') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $person->telephone }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Email') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $person->email }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Description') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $person->description }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Total Assets') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $person->assetHistories->count() }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Created At') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $person->created_at }}
                                            </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <div class="flex flex-col justify-between items-stretch !gap-1 w-full h-auto !px-0 py-4 m-0 border-b border-solid border-chinese-white text-black/[0.60] no-underline outline-none whitespace-normal overflow-auto select-text dark:border-dark-liver lg:flex-row lg:!gap-8 lg:min-h-[52px] lg:py-3.5">
                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 subtitle-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ __('Updated At') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                            <span class="block w-full h-auto p-0 m-0 body-2 text-black/[0.87] text-left leading-6 dark:text-white/[0.87]">
                                                {{ $person->updated_at }}
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
