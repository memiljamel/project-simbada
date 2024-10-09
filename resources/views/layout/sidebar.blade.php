<aside class="block w-auto h-full p-0 m-0 !visible overflow-hidden outline-none transition-transform fixed top-0 left-0 z-[1045] -translate-x-full lg:translate-x-0 lg:z-30 [&[data-te-offcanvas-show]]:transform-none [&[data-te-offcanvas-show]]:shadow-16dp" id="offcanvas" data-te-offcanvas-init tabindex="-1">
    <div class="flex flex-col w-64 h-full bg-white border-r border-solid border-chinese-white shadow-none overflow-hidden dark:bg-charleston-green dark:border-dark-liver">

        <div class="block w-full h-14 p-2 m-0 relative lg:h-16 lg:py-3">
            <a href="" class="inline-block w-auto max-w-full h-10 px-2 py-1.5 m-0 headline-6 text-black/[0.87] no-underline truncate dark:text-white/[0.87]" id="sidebar-label">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        {{-- Perfect Scrollbar --}}
        <div class="flex-1 block w-full h-full p-0 m-0 whitespace-nowrap overflow-hidden relative" data-te-perfect-scrollbar-init data-te-wheel-propagation="false">
            <div class="block w-full h-full p-0 m-0 relative">

                <ul class="block w-full py-2 pr-2 m-0 list-none shadow-none border-t border-solid border-chinese-white dark:border-dark-liver relative">
                    <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                        <a href="" class="group flex justify-between items-center gap-4 w-full h-12 py-3 px-5 m-0 text-black/[0.60] rounded-r-full no-underline outline-none whitespace-nowrap overflow-hidden select-none relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12] open:bg-primary/[0.04] open:text-primary open:hover:bg-primary/[0.04] open:active:bg-primary/[0.10] open:focus:bg-primary/[0.12] dark:open:bg-primary dark:open:text-black dark:open:hover:bg-primary dark:open:active:bg-primary dark:open:focus:bg-primary" data-te-ripple-init data-te-ripple-color="light">
                            <div class="inline-block min-w-[24px] w-auto h-auto p-0 m-0 relative">
                                <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
                                </svg>
                            </div>

                            <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <span class="block w-full h-auto p-0 m-0 subtitle-1 text-black/[0.87] text-left truncate dark:text-white/[0.87] group-open:text-primary dark:group-open:text-black">
                                    {{ __('Dashboard') }}
                                </span>
                            </div>
                        </a>
                    </li>
                </ul>

                @ability(App\Enums\RoleEnum::Administrator->value, [
                    App\Enums\PermissionEnum::ReadAssets->value,
                    App\Enums\PermissionEnum::ReadAssetHistories->value,
                    App\Enums\PermissionEnum::ReadAssetFinances->value,
                ])
                    <ul class="block w-full py-2 pr-2 m-0 list-none shadow-none border-t border-solid border-chinese-white dark:border-dark-liver relative" id="accordion-asset">
                        <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                            <span class="block w-auto h-auto px-5 py-2 m-0 caption text-black/[0.60] truncate dark:text-white/[0.60]">
                                {{ __('Asset') }}
                            </span>
                        </li>

                        <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                            <a role="button" class="group flex justify-between items-center gap-4 w-full h-12 py-3 px-5 m-0 text-black/[0.60] rounded-r-full no-underline outline-none whitespace-nowrap overflow-hidden select-none relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12] open:bg-primary/[0.04] open:text-primary open:hover:bg-primary/[0.04] open:active:bg-primary/[0.10] open:focus:bg-primary/[0.12] dark:open:bg-primary dark:open:text-black dark:open:hover:bg-primary dark:open:active:bg-primary dark:open:focus:bg-primary" data-te-collapse-init data-te-target="#collapse-active-asset" data-te-ripple-init data-te-ripple-color="light" @if (!request()->routeIs(['asset-active.*', 'asset-histories.*', 'asset-finances.*'])) data-te-collapse-collapsed @endif>
                                <div class="inline-block min-w-[24px] w-auto h-auto p-0 m-0 rotate-[90deg] transition-transform duration-200 ease-in-out group-data-[te-collapse-collapsed]:me-0 group-data-[te-collapse-collapsed]:rotate-0 motion-reduce:transition-none absolute left-0 top-1/2 z-0 -translate-y-1/2">
                                    <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                        <path d="M10 17l5-5-5-5v10z" />
                                        <path d="M0 24V0h24v24H0z" fill="none" />
                                    </svg>
                                </div>

                                <div class="inline-block min-w-[24px] w-auto h-auto p-0 m-0 relative">
                                    <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path d="M20 2H4c-1 0-2 .9-2 2v3.01c0 .72.43 1.34 1 1.69V20c0 1.1 1.1 2 2 2h14c.9 0 2-.9 2-2V8.7c.57-.35 1-.97 1-1.69V4c0-1.1-1-2-2-2zm-5 12H9v-2h6v2zm5-7H4V4l16-.02V7z" />
                                    </svg>
                                </div>

                                <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                    <span class="block w-full h-auto p-0 m-0 subtitle-1 text-black/[0.87] text-left truncate dark:text-white/[0.87] group-open:text-primary dark:group-open:text-black">
                                        {{ __('Active') }}
                                    </span>
                                </div>
                            </a>

                            <ul class="!visible hidden data-[te-collapse-show]:block" id="collapse-active-asset" data-te-collapse-item data-te-parent="#accordion-asset" @if(request()->routeIs(['asset-active.*', 'asset-histories.*', 'asset-finances.*'])) data-te-collapse-show @endif>
                                @permission(App\Enums\PermissionEnum::ReadAssets->value)
                                    <li class="block w-full h-auto p-0 m-0 overflow-hidden relative first:mt-2 last:mb-2">
                                        <a href="{{ route('asset-active.index') }}" class="group flex justify-between items-center gap-4 w-full h-12 py-3 px-5 m-0 text-black/[0.60] rounded-r-full no-underline outline-none whitespace-nowrap overflow-hidden select-none relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12] open:bg-primary/[0.04] open:text-primary open:hover:bg-primary/[0.04] open:active:bg-primary/[0.10] open:focus:bg-primary/[0.12] dark:open:bg-primary dark:open:text-black dark:open:hover:bg-primary dark:open:active:bg-primary dark:open:focus:bg-primary" data-te-ripple-init data-te-ripple-color="light" @if (request()->routeIs('asset-active.*')) open @endif>
                                            <div class="flex-1 inline-block w-full h-auto p-0 ml-10 overflow-hidden relative">
                                                <span class="block w-full h-auto p-0 m-0 subtitle-1 text-black/[0.87] text-left truncate dark:text-white/[0.87] group-open:text-primary dark:group-open:text-black">
                                                    {{ __('Assets') }}
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                @endpermission

                                @permission(App\Enums\PermissionEnum::ReadAssetHistories->value)
                                    <li class="block w-full h-auto p-0 m-0 overflow-hidden relative first:mt-2 last:mb-2">
                                        <a href="{{ route('asset-histories.index') }}" class="group flex justify-between items-center gap-4 w-full h-12 py-3 px-5 m-0 text-black/[0.60] rounded-r-full no-underline outline-none whitespace-nowrap overflow-hidden select-none relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12] open:bg-primary/[0.04] open:text-primary open:hover:bg-primary/[0.04] open:active:bg-primary/[0.10] open:focus:bg-primary/[0.12] dark:open:bg-primary dark:open:text-black dark:open:hover:bg-primary dark:open:active:bg-primary dark:open:focus:bg-primary" data-te-ripple-init data-te-ripple-color="light" @if (request()->routeIs('asset-histories.*')) open @endif>
                                            <div class="flex-1 inline-block w-full h-auto p-0 ml-10 overflow-hidden relative">
                                                <span class="block w-full h-auto p-0 m-0 subtitle-1 text-black/[0.87] text-left truncate dark:text-white/[0.87] group-open:text-primary dark:group-open:text-black">
                                                    {{ __('Histories') }}
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                @endpermission

                                @permission(App\Enums\PermissionEnum::ReadAssetFinances->value)
                                    <li class="block w-full h-auto p-0 m-0 overflow-hidden relative first:mt-2 last:mb-2">
                                        <a href="{{ route('asset-finances.index') }}" class="group flex justify-between items-center gap-4 w-full h-12 py-3 px-5 m-0 text-black/[0.60] rounded-r-full no-underline outline-none whitespace-nowrap overflow-hidden select-none relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12] open:bg-primary/[0.04] open:text-primary open:hover:bg-primary/[0.04] open:active:bg-primary/[0.10] open:focus:bg-primary/[0.12] dark:open:bg-primary dark:open:text-black dark:open:hover:bg-primary dark:open:active:bg-primary dark:open:focus:bg-primary" data-te-ripple-init data-te-ripple-color="light" @if (request()->routeIs('asset-finances.*')) open @endif>
                                            <div class="flex-1 inline-block w-full h-auto p-0 ml-10 overflow-hidden relative">
                                                <span class="block w-full h-auto p-0 m-0 subtitle-1 text-black/[0.87] text-left truncate dark:text-white/[0.87] group-open:text-primary dark:group-open:text-black">
                                                    {{ __('Finances') }}
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                @endpermission
                            </ul>
                        </li>

                        @permission(App\Enums\PermissionEnum::ReadAssets->value)
                            <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <a href="{{ route('asset-inactive.index') }}" class="group flex justify-between items-center gap-4 w-full h-12 py-3 px-5 m-0 text-black/[0.60] rounded-r-full no-underline outline-none whitespace-nowrap overflow-hidden select-none relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12] open:bg-primary/[0.04] open:text-primary open:hover:bg-primary/[0.04] open:active:bg-primary/[0.10] open:focus:bg-primary/[0.12] dark:open:bg-primary dark:open:text-black dark:open:hover:bg-primary dark:open:active:bg-primary dark:open:focus:bg-primary" data-te-ripple-init data-te-ripple-color="light" @if (request()->routeIs('asset-inactive.*')) open @endif>
                                    <div class="inline-block min-w-[24px] w-auto h-auto p-0 m-0 relative">
                                        <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                            <path d="M0 0h24v24H0V0z" fill="none" />
                                            <path d="M20 2H4c-1 0-2 .9-2 2v3.01c0 .72.43 1.34 1 1.69V20c0 1.1 1.1 2 2 2h14c.9 0 2-.9 2-2V8.7c.57-.35 1-.97 1-1.69V4c0-1.1-1-2-2-2zm-5 12H9v-2h6v2zm5-7H4V4l16-.02V7z" />
                                        </svg>
                                    </div>

                                    <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                        <span class="block w-full h-auto p-0 m-0 subtitle-1 text-black/[0.87] text-left truncate dark:text-white/[0.87] group-open:text-primary dark:group-open:text-black">
                                            {{ __('Inactive') }}
                                        </span>
                                    </div>
                                </a>
                            </li>
                        @endpermission
                    </ul>
                @endability

                @ability(App\Enums\RoleEnum::Administrator->value, [
                    App\Enums\PermissionEnum::CrudCategories->value,
                    App\Enums\PermissionEnum::CrudBrands->value,
                    App\Enums\PermissionEnum::CrudDistributors->value,
                    App\Enums\PermissionEnum::CrudResponsiblePersons->value,
                    App\Enums\PermissionEnum::CrudLocations->value,
                ])
                    <ul class="block w-full py-2 pr-2 m-0 list-none shadow-none border-t border-solid border-chinese-white dark:border-dark-liver relative">
                        <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                            <span class="block w-auto h-auto px-5 py-2 m-0 caption text-black/[0.60] truncate dark:text-white/[0.60]">
                                {{ __('Master Data') }}
                            </span>
                        </li>

                        @permission(App\Enums\PermissionEnum::CrudCategories->value)
                            <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <a href="{{ route('categories.index') }}" class="group flex justify-between items-center gap-4 w-full h-12 py-3 px-5 m-0 text-black/[0.60] rounded-r-full no-underline outline-none whitespace-nowrap overflow-hidden select-none relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12] open:bg-primary/[0.04] open:text-primary open:hover:bg-primary/[0.04] open:active:bg-primary/[0.10] open:focus:bg-primary/[0.12] dark:open:bg-primary dark:open:text-black dark:open:hover:bg-primary dark:open:active:bg-primary dark:open:focus:bg-primary" data-te-ripple-init data-te-ripple-color="light" @if (request()->routeIs('categories.*')) open @endif>
                                    <div class="inline-block min-w-[24px] w-auto h-auto p-0 m-0 relative">
                                        <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                            <path d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 2l-5.5 9h11z"/><circle cx="17.5" cy="17.5" r="4.5" />
                                            <path d="M3 13.5h8v8H3z" />
                                        </svg>
                                    </div>

                                    <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                        <span class="block w-full h-auto p-0 m-0 subtitle-1 text-black/[0.87] text-left truncate dark:text-white/[0.87] group-open:text-primary dark:group-open:text-black">
                                            {{ __('Categories') }}
                                        </span>
                                    </div>
                                </a>
                            </li>
                        @endpermission

                        @permission(App\Enums\PermissionEnum::CrudBrands->value)
                            <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <a href="{{ route('brands.index') }}" class="group flex justify-between items-center gap-4 w-full h-12 py-3 px-5 m-0 text-black/[0.60] rounded-r-full no-underline outline-none whitespace-nowrap overflow-hidden select-none relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12] open:bg-primary/[0.04] open:text-primary open:hover:bg-primary/[0.04] open:active:bg-primary/[0.10] open:focus:bg-primary/[0.12] dark:open:bg-primary dark:open:text-black dark:open:hover:bg-primary dark:open:active:bg-primary dark:open:focus:bg-primary" data-te-ripple-init data-te-ripple-color="light" @if (request()->routeIs('brands.*')) open @endif>
                                    <div class="inline-block min-w-[24px] w-auto h-auto p-0 m-0 relative">
                                        <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                            <path d="M0 0h24v24H0z" fill="none" />
                                            <path d="m21.41 11.58-9-9C12.05 2.22 11.55 2 11 2H4c-1.1 0-2 .9-2 2v7c0 .55.22 1.05.59 1.42l9 9c.36.36.86.58 1.41.58.55 0 1.05-.22 1.41-.59l7-7c.37-.36.59-.86.59-1.41 0-.55-.23-1.06-.59-1.42zM5.5 7C4.67 7 4 6.33 4 5.5S4.67 4 5.5 4 7 4.67 7 5.5 6.33 7 5.5 7z" />
                                        </svg>
                                    </div>

                                    <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                        <span class="block w-full h-auto p-0 m-0 subtitle-1 text-black/[0.87] text-left truncate dark:text-white/[0.87] group-open:text-primary dark:group-open:text-black">
                                            {{ __('Brands') }}
                                        </span>
                                    </div>
                                </a>
                            </li>
                        @endpermission

                        @permission(App\Enums\PermissionEnum::CrudDistributors->value)
                            <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <a href="{{ route('distributors.index') }}" class="group flex justify-between items-center gap-4 w-full h-12 py-3 px-5 m-0 text-black/[0.60] rounded-r-full no-underline outline-none whitespace-nowrap overflow-hidden select-none relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12] open:bg-primary/[0.04] open:text-primary open:hover:bg-primary/[0.04] open:active:bg-primary/[0.10] open:focus:bg-primary/[0.12] dark:open:bg-primary dark:open:text-black dark:open:hover:bg-primary dark:open:active:bg-primary dark:open:focus:bg-primary" data-te-ripple-init data-te-ripple-color="light" @if (request()->routeIs('distributors.*')) open @endif>
                                    <div class="inline-block min-w-[24px] w-auto h-auto p-0 m-0 relative">
                                        <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                            <path d="M0 0h24v24H0z" fill="none" />
                                            <path d="M20 4H4v2h16V4zm1 10v-2l-1-5H4l-1 5v2h1v6h10v-6h4v6h2v-6h1zm-9 4H6v-4h6v4z" />
                                        </svg>
                                    </div>

                                    <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                        <span class="block w-full h-auto p-0 m-0 subtitle-1 text-black/[0.87] text-left truncate dark:text-white/[0.87] group-open:text-primary dark:group-open:text-black">
                                            {{ __('Distributors') }}
                                        </span>
                                    </div>
                                </a>
                            </li>
                        @endpermission

                        @permission(App\Enums\PermissionEnum::CrudResponsiblePersons->value)
                            <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <a href="{{ route('responsible-persons.index') }}" class="group flex justify-between items-center gap-4 w-full h-12 py-3 px-5 m-0 text-black/[0.60] rounded-r-full no-underline outline-none whitespace-nowrap overflow-hidden select-none relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12] open:bg-primary/[0.04] open:text-primary open:hover:bg-primary/[0.04] open:active:bg-primary/[0.10] open:focus:bg-primary/[0.12] dark:open:bg-primary dark:open:text-black dark:open:hover:bg-primary dark:open:active:bg-primary dark:open:focus:bg-primary" data-te-ripple-init data-te-ripple-color="light" @if (request()->routeIs('responsible-persons.*')) open @endif>
                                    <div class="inline-block min-w-[24px] w-auto h-auto p-0 m-0 relative">
                                        <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                            <path d="M0 0h24v24H0z" fill="none" />
                                            <path d="M16.5 12c1.38 0 2.49-1.12 2.49-2.5S17.88 7 16.5 7C15.12 7 14 8.12 14 9.5s1.12 2.5 2.5 2.5zM9 11c1.66 0 2.99-1.34 2.99-3S10.66 5 9 5C7.34 5 6 6.34 6 8s1.34 3 3 3zm7.5 3c-1.83 0-5.5.92-5.5 2.75V19h11v-2.25c0-1.83-3.67-2.75-5.5-2.75zM9 13c-2.33 0-7 1.17-7 3.5V19h7v-2.25c0-.85.33-2.34 2.37-3.47C10.5 13.1 9.66 13 9 13z" />
                                        </svg>
                                    </div>

                                    <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                        <span class="block w-full h-auto p-0 m-0 subtitle-1 text-black/[0.87] text-left truncate dark:text-white/[0.87] group-open:text-primary dark:group-open:text-black">
                                            {{ __('Responsible Persons') }}
                                        </span>
                                    </div>
                                </a>
                            </li>
                        @endpermission

                        @permission(App\Enums\PermissionEnum::CrudLocations->value)
                            <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <a href="{{ route('locations.index') }}" class="group flex justify-between items-center gap-4 w-full h-12 py-3 px-5 m-0 text-black/[0.60] rounded-r-full no-underline outline-none whitespace-nowrap overflow-hidden select-none relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12] open:bg-primary/[0.04] open:text-primary open:hover:bg-primary/[0.04] open:active:bg-primary/[0.10] open:focus:bg-primary/[0.12] dark:open:bg-primary dark:open:text-black dark:open:hover:bg-primary dark:open:active:bg-primary dark:open:focus:bg-primary" data-te-ripple-init data-te-ripple-color="light" @if (request()->routeIs('locations.*')) open @endif>
                                    <div class="inline-block min-w-[24px] w-auto h-auto p-0 m-0 relative">
                                        <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                            <path d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                        </svg>
                                    </div>

                                    <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                        <span class="block w-full h-auto p-0 m-0 subtitle-1 text-black/[0.87] text-left truncate dark:text-white/[0.87] group-open:text-primary dark:group-open:text-black">
                                            {{ __('Locations') }}
                                        </span>
                                    </div>
                                </a>
                            </li>
                        @endpermission
                    </ul>
                @endability

                @ability(App\Enums\RoleEnum::Administrator->value, App\Enums\PermissionEnum::CreatePrints->value)
                    <ul class="block w-full py-2 pr-2 m-0 list-none shadow-none border-t border-solid border-chinese-white dark:border-dark-liver relative">
                        @role(App\Enums\RoleEnum::Administrator->value)
                            <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <a href="{{ route('users.index') }}" class="group flex justify-between items-center gap-4 w-full h-12 py-3 px-5 m-0 text-black/[0.60] rounded-r-full no-underline outline-none whitespace-nowrap overflow-hidden select-none relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12] open:bg-primary/[0.04] open:text-primary open:hover:bg-primary/[0.04] open:active:bg-primary/[0.10] open:focus:bg-primary/[0.12] dark:open:bg-primary dark:open:text-black dark:open:hover:bg-primary dark:open:active:bg-primary dark:open:focus:bg-primary" data-te-ripple-init data-te-ripple-color="light" @if (request()->routeIs('users.*')) open @endif>
                                    <div class="inline-block min-w-[24px] w-auto h-auto p-0 m-0 relative">
                                        <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                            <g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><g><circle cx="10" cy="8" r="4"/><path d="M10.67,13.02C10.45,13.01,10.23,13,10,13c-2.42,0-4.68,0.67-6.61,1.82C2.51,15.34,2,16.32,2,17.35V20h9.26 C10.47,18.87,10,17.49,10,16C10,14.93,10.25,13.93,10.67,13.02z"/><path d="M20.75,16c0-0.22-0.03-0.42-0.06-0.63l1.14-1.01l-1-1.73l-1.45,0.49c-0.32-0.27-0.68-0.48-1.08-0.63L18,11h-2l-0.3,1.49 c-0.4,0.15-0.76,0.36-1.08,0.63l-1.45-0.49l-1,1.73l1.14,1.01c-0.03,0.21-0.06,0.41-0.06,0.63s0.03,0.42,0.06,0.63l-1.14,1.01 l1,1.73l1.45-0.49c0.32,0.27,0.68,0.48,1.08,0.63L16,21h2l0.3-1.49c0.4-0.15,0.76-0.36,1.08-0.63l1.45,0.49l1-1.73l-1.14-1.01 C20.72,16.42,20.75,16.22,20.75,16z M17,18c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S18.1,18,17,18z"/></g></g>
                                        </svg>
                                    </div>

                                    <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                        <span class="block w-full h-auto p-0 m-0 subtitle-1 text-black/[0.87] text-left truncate dark:text-white/[0.87] group-open:text-primary dark:group-open:text-black">
                                            {{ __('Users') }}
                                        </span>
                                    </div>
                                </a>
                            </li>
                        @endrole
                    </ul>
                @endability

                <ul class="block w-full py-2 pr-2 m-0 list-none shadow-none border-t border-solid border-chinese-white dark:border-dark-liver relative">
                    <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                        <a href="" class="group flex justify-between items-center gap-4 w-full h-12 py-3 px-5 m-0 text-black/[0.60] rounded-r-full no-underline outline-none whitespace-nowrap overflow-hidden select-none relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12]" data-te-ripple-init data-te-ripple-color="light" target="_blank">
                            <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <span class="block w-full h-auto p-0 m-0 subtitle-1 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
                                    {{ __('Help Center') }}
                                </span>
                            </div>
                        </a>
                    </li>

                    <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                        <a href="" class="group flex justify-between items-center gap-4 w-full h-12 py-3 px-5 m-0 text-black/[0.60] rounded-r-full no-underline outline-none whitespace-nowrap overflow-hidden select-none relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12]" data-te-ripple-init data-te-ripple-color="light" target="_blank">
                            <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <span class="block w-full h-auto p-0 m-0 subtitle-1 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
                                    {{ __('Terms of Service') }}
                                </span>
                            </div>
                        </a>
                    </li>

                    <li class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                        <a href="" class="group flex justify-between items-center gap-4 w-full h-12 py-3 px-5 m-0 text-black/[0.60] rounded-r-full no-underline outline-none whitespace-nowrap overflow-hidden select-none relative hover:bg-black/[0.04] active:bg-black/[0.10] focus:bg-black/[0.12] dark:text-white/[0.60] dark:hover:bg-white/[0.04] dark:active:bg-white/[0.10] dark:focus:bg-white/[0.12]" data-te-ripple-init data-te-ripple-color="light" target="_blank">
                            <div class="flex-1 inline-block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <span class="block w-full h-auto p-0 m-0 subtitle-1 text-black/[0.87] text-left truncate dark:text-white/[0.87]">
                                    {{ __('Privacy Policy') }}
                                </span>
                            </div>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
        {{-- End Perfect Scrollbar --}}

    </div>
</aside>
