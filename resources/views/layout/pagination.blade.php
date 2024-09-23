@if ($paginator->hasPages())
    <nav class="inline-block w-full h-auto p-0 m-0 bg-white relative dark:bg-charleston-green" role="navigation" aria-label="Pagination navigation">
        <div class="flex justify-between items-center gap-4 w-full h-auto p-0 m-0 sm:hidden">
            @if ($paginator->onFirstPage())
                <div class="inline-block w-auto h-auto p-0 m-0 relative">
                    <span class="block min-w-[64px] w-auto h-9 px-4 py-2 m-0 bg-transparent rounded subtitle-2 text-black/[0.60] text-center border border-solid border-chinese-white align-middle no-underline outline-none cursor-default whitespace-nowrap relative hover:bg-transparent active:bg-transparent focus:bg-transparent dark:text-white/[0.60] dark:border-dark-liver">
                        {{ __('pagination.previous') }}
                    </span>
                </div>
            @else
                <div class="inline-block w-auto h-auto p-0 m-0 relative">
                    <a href="{{ $paginator->previousPageUrl() }}" class="block min-w-[64px] w-auto h-9 px-4 py-2 m-0 bg-transparent rounded subtitle-2 text-black/[0.60] text-center border border-solid border-chinese-white align-middle no-underline outline-none cursor-pointer whitespace-nowrap relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:border-dark-liver dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12]" data-te-ripple-init data-te-ripple-color="light">
                        {{ __('pagination.previous') }}
                    </a>
                </div>
            @endif

            @if ($paginator->hasMorePages())
                <div class="inline-block w-auto h-auto p-0 m-0 relative">
                    <a href="{{ $paginator->nextPageUrl() }}" class="block min-w-[64px] w-auto h-9 px-4 py-2 m-0 bg-transparent rounded subtitle-2 text-black/[0.60] text-center border border-solid border-chinese-white align-middle no-underline outline-none cursor-pointer whitespace-nowrap relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:border-dark-liver dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12]" data-te-ripple-init data-te-ripple-color="light">
                        {{ __('pagination.next') }}
                    </a>
                </div>
            @else
                <div class="inline-block w-auto h-auto p-0 m-0 relative">
                    <span class="block min-w-[64px] w-auto h-9 px-4 py-2 m-0 bg-transparent rounded subtitle-2 text-black/[0.60] text-center border border-solid border-chinese-white align-middle no-underline outline-none cursor-default whitespace-nowrap relative hover:bg-transparent active:bg-transparent focus:bg-transparent dark:text-white/[0.60] dark:border-dark-liver">
                        {{ __('pagination.next') }}
                    </span>
                </div>
            @endif
        </div>

        <div class="hidden justify-between items-center gap-4 w-full h-auto p-0 m-0 sm:flex sm:flex-col sm:my-2 lg:flex-row lg:m-0">
            <div class="inline-block w-auto h-auto p-2 m-0 overflow-hidden relative">
                <p class="block w-auto h-auto body-2 text-black/[0.87] font-normal truncate dark:text-white/[0.87]">
                    {{ __('Showing') }}

                    @if ($paginator->firstItem())
                        <span class="font-medium">
                            {{ $paginator->firstItem() }}
                        </span>

                        {{ __('to') }}

                        <span class="font-medium">
                            {{ $paginator->lastItem() }}
                        </span>
                    @else
                        {{ $paginator->count() }}
                    @endif

                    {{ __('of') }}

                    <span class="font-medium">
                        {{ $paginator->total() }}
                    </span>

                    {{ __('rows') }}
                </p>
            </div>

            <div class="flex w-auto h-auto p-0 m-0 rounded shadow-none -space-x-px isolate" aria-label="Pagination">
                @if ($paginator->onFirstPage())
                    <div class="inline-block w-auto h-auto p-0 m-0 relative">
                        <span class="flex justify-center items-center w-9 h-9 p-2 m-0 bg-transparent border border-solid border-chinese-white rounded-l subtitle-2 text-black/[0.38] text-center no-underline outline-none cursor-default whitespace-nowrap relative hover:bg-transparent active:bg-transparent focus:bg-transparent dark:border-dark-liver dark:text-white/[0.38]" aria-disabled="true" aria-label="First page">
                            <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                <path d="M18.41 16.59L13.82 12l4.59-4.59L17 6l-6 6 6 6zM6 6h2v12H6z" />
                                <path d="M24 24H0V0h24v24z" fill="none" />
                            </svg>
                        </span>
                    </div>

                    <div class="inline-block w-auto h-auto p-0 m-0 relative">
                        <span class="flex justify-center items-center w-9 h-9 p-2 m-0 bg-transparent border border-solid border-chinese-white rounded-none subtitle-2 text-black/[0.38] text-center no-underline outline-none cursor-default whitespace-nowrap relative hover:bg-transparent active:bg-transparent focus:bg-transparent dark:border-dark-liver dark:text-white/[0.38]" aria-disabled="true" aria-label="Previous">
                              <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                  <path d="M0 0h24v24H0z" fill="none" />
                                  <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z" />
                              </svg>
                        </span>
                    </div>
                @else
                    <div class="inline-block w-auto h-auto p-0 m-0 relative">
                        <a href="{{ $paginator->url(1) }}" class="flex justify-center items-center w-9 h-9 p-2 m-0 bg-transparent border border-solid border-chinese-white rounded-l subtitle-2 text-black/[0.60] text-center no-underline outline-none cursor-pointer whitespace-nowrap relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:border-dark-liver dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12]" rel="prev" aria-label="First page" data-te-ripple-init data-te-ripple-color="light">
                            <svg class="pointer-events-none w-full h-full fill-current"
                                 xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                                 fill="#000000">
                                <path d="M18.41 16.59L13.82 12l4.59-4.59L17 6l-6 6 6 6zM6 6h2v12H6z" />
                                <path d="M24 24H0V0h24v24z" fill="none" />
                            </svg>
                        </a>
                    </div>

                    <div class="inline-block w-auto h-auto p-0 m-0 relative">
                        <a href="{{ $paginator->previousPageUrl() }}" class="flex justify-center items-center w-9 h-9 p-2 m-0 bg-transparent border border-solid border-chinese-white rounded-none subtitle-2 text-black/[0.60] text-center no-underline outline-none cursor-pointer whitespace-nowrap relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:border-dark-liver dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12]" rel="prev" aria-label="Previous" data-te-ripple-init data-te-ripple-color="light">
                            <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z" />
                            </svg>
                        </a>
                    </div>
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <div class="inline-block w-auto h-auto p-0 m-0 relative">
                            <span class="flex justify-center items-center min-w-[36px] w-auto h-9 p-2 m-0 bg-transparent border border-solid border-chinese-white rounded-none subtitle-2 text-black/[0.60] text-center no-underline outline-none cursor-default whitespace-nowrap relative hover:bg-transparent active:bg-transparent focus:bg-transparent dark:border-dark-liver dark:text-white/[0.60]" aria-disabled="true">
                                {{ $element }}
                            </span>
                        </div>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <div class="inline-block w-auto h-auto p-0 m-0 relative">
                                    <span class="flex justify-center items-center min-w-[36px] w-auto h-9 p-2 m-0 bg-primary border border-solid border-primary rounded-none subtitle-2 text-white text-center no-underline outline-none cursor-default whitespace-nowrap relative hover:bg-primary active:bg-primary focus:bg-primary dark:text-black" aria-current="page">
                                        {{ $page }}
                                    </span>
                                </div>
                            @else
                                <div class="inline-block w-auto h-auto p-0 m-0 relative">
                                    <a href="{{ $url }}" class="flex justify-center items-center min-w-[36px] w-auto h-9 p-2 m-0 bg-transparent border border-solid border-chinese-white rounded-none subtitle-2 text-black/[0.60] text-center no-underline outline-none cursor-pointer whitespace-nowrap relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:border-dark-liver dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12]" aria-current="page" aria-label="{{ __('Go to page :page', ['page' => $page]) }}" data-te-ripple-init data-te-ripple-color="light">
                                        {{ $page }}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <div class="inline-block w-auto h-auto p-0 m-0 relative">
                        <a href="{{ $paginator->nextPageUrl() }}" class="flex justify-center items-center w-9 h-9 p-2 m-0 bg-transparent border border-solid border-chinese-white rounded-none subtitle-2 text-black/[0.60] text-center no-underline outline-none cursor-pointer whitespace-nowrap relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:border-dark-liver dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12]" rel="next" aria-label="Next" data-te-ripple-init data-te-ripple-color="light">
                            <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z" />
                            </svg>
                        </a>
                    </div>

                    <div class="inline-block w-auto h-auto p-0 m-0 relative">
                        <a href="{{ $paginator->url($paginator->lastPage()) }}" class="flex justify-center items-center w-9 h-9 p-2 m-0 bg-transparent border border-solid border-chinese-white rounded-r subtitle-2 text-black/[0.60] text-center no-underline outline-none cursor-pointer whitespace-nowrap relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:border-dark-liver dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12]" rel="next" aria-label="Last page" data-te-ripple-init data-te-ripple-color="light">
                            <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M5.59 7.41L10.18 12l-4.59 4.59L7 18l6-6-6-6zM16 6h2v12h-2z" />
                            </svg>
                        </a>
                    </div>
                @else
                    <div class="inline-block w-auto h-auto p-0 m-0 relative">
                        <span class="flex justify-center items-center w-9 h-9 p-2 m-0 bg-transparent border border-solid border-chinese-white rounded-none subtitle-2 text-black/[0.38] text-center no-underline outline-none cursor-default whitespace-nowrap relative hover:bg-transparent active:bg-transparent focus:bg-transparent dark:border-dark-liver dark:text-white/[0.38]" aria-disabled="true" aria-label="Next">
                            <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z" />
                            </svg>
                        </span>
                    </div>

                    <div class="inline-block w-auto h-auto p-0 m-0 relative">
                        <span class="flex justify-center items-center w-9 h-9 p-2 m-0 bg-transparent border border-solid border-chinese-white rounded-r subtitle-2 text-black/[0.38] text-center no-underline outline-none cursor-default whitespace-nowrap relative hover:bg-transparent active:bg-transparent focus:bg-transparent dark:border-dark-liver dark:text-white/[0.38]" aria-disabled="true" aria-label="Last page">
                            <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M5.59 7.41L10.18 12l-4.59 4.59L7 18l6-6-6-6zM16 6h2v12h-2z" />
                            </svg>
                        </span>
                    </div>
                @endif
            </div>
        </div>
    </nav>
@endif
