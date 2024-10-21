@extends('app')

@section('title', 'Home')

@section('content')
    <div class="flex flex-col w-full h-full p-0 m-0 relative">

        <header class="block w-full h-auto p-0 m-0 fixed top-0 right-0 z-20 lg:pl-0 lg:left-auto">
            <nav class="flex justify-between items-center flex-wrap w-full min-h-[56px] p-2 m-0 bg-primary shadow-04dp lg:h-16 dark:bg-charleston-green">

                <div class="flex justify-start items-center gap-2 w-auto h-auto p-0 m-0 overflow-hidden relative">
                    <div class="inline-block w-auto h-auto p-0 m-0 relative">
                        <div class="block w-auto h-auto p-0 m-0 relative">
                            <button type="button" class="inline-block w-10 h-10 p-2 m-0 bg-transparent rounded-full text-white outline-none cursor-pointer align-middle transition duration-150 ease-in-out hover:bg-white/[0.04] active:bg-white/[0.10] focus:bg-white/[0.12] lg:hidden" data-te-collapse-init data-te-target="#nav-menu" data-te-toggle="tooltip" title="Open menu" data-te-ripple-init data-te-ripple-color="light" aria-expanded="false" aria-controls="nav-menu">
                                <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex-1 block w-auto h-auto p-0 m-0 overflow-hidden relative lg:flex-none">
                    <div class="block w-auto h-auto p-0 m-0 relative">
                        <a href="{{ route('home.index') }}" class="block w-auto max-w-full h-10 px-2 py-1.5 m-0 headline-6 text-white no-underline truncate dark:text-white">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                </div>

                <div class="hidden flex-grow basis-full items-center p-0 m-0 visible lg:flex lg:justify-between lg:basis-auto lg:ml-6" id="nav-menu" data-te-collapse-item>
                    <ul class="flex flex-col justify-start items-center w-auto h-auto p-0 my-4 relative lg:flex-row lg:m-0" data-te-navbar-nav-ref>
                        <li class="block w-full h-auto p-0 m0 overflow-hidden relative lg:inline-block lg:w-auto" data-te-nav-item-ref>
                            <a href="#home" class="block w-auto h-auto p-2 m-0 text-white/[0.60] subtitle-1 no-underline outline-none align-middle hover:text-white hover:underline focus:text-white focus:underline active:text-white active:underline [&[class$='active']]:text-white active" data-te-nav-link-ref>
                                {{ __('Beranda') }}
                            </a>
                        </li>

                        <li class="block w-full h-auto p-0 m0 overflow-hidden relative lg:inline-block lg:w-auto" data-te-nav-item-ref>
                            <a href="#features" class="block w-auto h-auto p-2 m-0 text-white/[0.60] subtitle-1 no-underline outline-none align-middle hover:text-white hover:underline focus:text-white focus:underline active:text-white active:underline [&[class$='active']]:text-white" data-te-nav-link-ref>
                                {{ __('Fitur') }}
                            </a>
                        </li>

                        <li class="block w-full h-auto p-0 m0 overflow-hidden relative lg:inline-block lg:w-auto" data-te-nav-item-ref>
                            <a href="#testimonials" class="block w-auto h-auto p-2 m-0 text-white/[0.60] subtitle-1 no-underline outline-none align-middle hover:text-white hover:underline focus:text-white focus:underline active:text-white active:underline [&[class$='active']]:text-white" data-te-nav-link-ref>
                                {{ __('Testimoni') }}
                            </a>
                        </li>
                    </ul>

                    <div class="inline-block w-full h-auto p-0 my-1 relative lg:w-auto lg:m-0">
                        @auth
                            <div class="block w-auto h-auto p-0 m-0 relative">
                                <a href="{{ route('dashboard.index') }}" class="inline-block min-w-[64px] w-full h-9 p-2 m-0 bg-transparent rounded button text-white text-center shadow-none align-middle truncate outline-none cursor-pointer transition duration-150 ease-in-out relative hover:bg-white/[0.04] active:bg-white/[0.10] focus:bg-white/[0.12] disabled:opacity-70 disabled:cursor-not-allowed disabled:hover:!bg-transparent disabled:active:!bg-transparent disabled:focus:!bg-transparent" data-te-ripple-init data-te-ripple-color="light">
                                    {{ __('Dashboard') }}
                                </a>
                            </div>
                        @else
                            <div class="block w-auto h-auto p-0 m-0 relative">
                                <a href="{{ route('login.index') }}" class="inline-block min-w-[64px] w-full h-9 p-2 m-0 bg-transparent rounded button text-white text-center shadow-none align-middle truncate outline-none cursor-pointer transition duration-150 ease-in-out relative hover:bg-white/[0.04] active:bg-white/[0.10] focus:bg-white/[0.12] disabled:opacity-70 disabled:cursor-not-allowed disabled:hover:!bg-transparent disabled:active:!bg-transparent disabled:focus:!bg-transparent" data-te-ripple-init data-te-ripple-color="light">
                                    {{ __('Masuk') }}
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>

            </nav>
        </header>

        <main class="block flex-grow flex-shrink-0 w-auto h-auto p-0 mt-14 ml-0 lg:mt-16 lg:ml-0">
            <section class="block w-full h-auto p-0 m-0 bg-center bg-no-repeat bg-[url('../images/banner.png')] bg-cover bg-black/[0.60] bg-blend-multiply overflow-hidden relative dark:bg-white/[0.60]" id="home">
                <div class="block w-full max-w-5xl h-auto py-[60px] mx-auto border-t border-none border-chinese-white shadow-none sm:py-[90px] dark:border-dark-liver">

                    <div class="block w-full h-auto px-4 py-[120px] m-0 relative lg:py-[140px] lg:px-0">
                        <h1 class="block w-full h-auto p-0 m-0 headline-4 text-center text-white relative md:headline-3 dark:text-white">
                            {{ __('Sistem Informasi Manajemen Barang Milik Daerah (SIMBADA)') }}
                        </h1>

                        <p class="block w-full h-auto p-0 mt-8 body-2 text-center text-white/[0.87] line-clamp-5 text-ellipsis relative md:text-xl dark:text-white/[0.87]">
                            {{ __('Membantu pengelolaan, pemantauan, dan pelacakan aset dengan efisien.') }}
                        </p>
                    </div>

                </div>
            </section>

            <section class="block w-full h-auto p-0 m-0 bg-white overflow-hidden relative dark:bg-chinese-black" id="features">
                <div class="block w-full max-w-5xl h-auto py-[60px] mx-auto border-t border-none border-chinese-white shadow-none sm:py-[90px] dark:border-dark-liver">

                    <div class="block w-full h-auto p-0 mb-[30px] overflow-hidden relative">
                        <h2 class="block w-full h-auto p-0 m-0 headline-4 text-center text-black/[0.87] truncate relative dark:text-white/[0.87]">
                            {{ __('Fitur') }}
                        </h2>
                    </div>

                    <div class="flex justify-start items-stretch flex-wrap gap-0 w-full h-auto p-0 m-0 relative">
                        <div class="block min-w-0 w-full h-auto p-3 m-0 bg-transparent rounded-none shadow-none relative md:w-4/12 md:p-3 md:mb-10">
                            <div class="block w-20 h-20 p-[22px] mx-auto mb-8 rounded-full text-white bg-primary dark:text-black">
                                <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 2l-5.5 9h11z"/><circle cx="17.5" cy="17.5" r="4.5" />
                                    <path d="M3 13.5h8v8H3z" />
                                </svg>
                            </div>

                            <div class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <h3 class="block w-full h-auto p-0 mb-4 subtitle-2 text-lg text-center text-black/[0.87] truncate relative dark:text-white/[0.87]">
                                    {{ __('Multi Kategori') }}
                                </h3>

                                <p class="block w-full h-auto p-0 m-0 body-2 text-center text-black/[0.60] line-clamp-5 text-ellipsis relative dark:text-white/[0.60]">
                                    {{ __('Fitur ini memungkinkan pengelompokan aset ke dalam berbagai kategori. Dengan adanya multi kategori, pengguna dapat dengan mudah mengatur dan mencari aset berdasarkan jenis atau fungsinya.') }}
                                </p>
                            </div>
                        </div>

                        <div class="block min-w-0 w-full h-auto p-3 m-0 bg-transparent rounded-none shadow-none relative md:w-4/12 md:p-3 md:mb-10">
                            <div class="block w-20 h-20 p-[22px] mx-auto mb-8 rounded-full text-white bg-primary dark:text-black">
                                <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                    <g><rect fill="none" height="24" width="24"/></g>
                                    <path d="M15,21h-2v-2h2V21z M13,14h-2v5h2V14z M21,12h-2v4h2V12z M19,10h-2v2h2V10z M7,12H5v2h2V12z M5,10H3v2h2V10z M12,5h2V3h-2V5 z M4.5,4.5v3h3v-3H4.5z M9,9H3V3h6V9z M4.5,16.5v3h3v-3H4.5z M9,21H3v-6h6V21z M16.5,4.5v3h3v-3H16.5z M21,9h-6V3h6V9z M19,19v-3 l-4,0v2h2v3h4v-2H19z M17,12l-4,0v2h4V12z M13,10H7v2h2v2h2v-2h2V10z M14,9V7h-2V5h-2v4L14,9z M6.75,5.25h-1.5v1.5h1.5V5.25z M6.75,17.25h-1.5v1.5h1.5V17.25z M18.75,5.25h-1.5v1.5h1.5V5.25z" />
                                </svg>
                            </div>

                            <div class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <h3 class="block w-full h-auto p-0 mb-4 subtitle-2 text-lg text-center text-black/[0.87] truncate relative dark:text-white/[0.87]">
                                    {{ __('QR-Code Aset') }}
                                </h3>

                                <p class="block w-full h-auto p-0 m-0 body-2 text-center text-black/[0.60] line-clamp-5 text-ellipsis relative dark:text-white/[0.60]">
                                    {{ __('Setiap aset yang terdaftar di sistem akan mendapatkan kode QR yang unik. Pengguna hanya perlu memindai QR-Code untuk mendapatkan informasi lengkap tentang aset, termasuk lokasi, kondisi, dan detail riwayatnya.') }}
                                </p>
                            </div>
                        </div>

                        <div class="block min-w-0 w-full h-auto p-3 m-0 bg-transparent rounded-none shadow-none relative md:w-4/12 md:p-3 md:mb-10">
                            <div class="block w-20 h-20 p-[22px] mx-auto mb-8 rounded-full text-white bg-primary dark:text-black">
                                <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z" />
                                </svg>
                            </div>

                            <div class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <h3 class="block w-full h-auto p-0 mb-4 subtitle-2 text-lg text-center text-black/[0.87] truncate relative dark:text-white/[0.87]">
                                    {{ __('Riwayat Aset') }}
                                </h3>

                                <p class="block w-full h-auto p-0 m-0 body-2 text-center text-black/[0.60] line-clamp-5 text-ellipsis relative dark:text-white/[0.60]">
                                    {{ __('Fitur riwayat aset mencatat semua perubahan kepemilikan aset dari waktu ke waktu. Riwayat ini meliputi informasi detail seperti siapa yang memiliki aset, kapan aset berpindah tangan, serta dimana lokasi aset berada.') }}
                                </p>
                            </div>
                        </div>

                        <div class="block min-w-0 w-full h-auto p-3 m-0 bg-transparent rounded-none shadow-none relative md:w-4/12 md:p-3 md:mb-10">
                            <div class="block w-20 h-20 p-[22px] mx-auto mb-8 rounded-full text-white bg-primary dark:text-black">
                                <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path d="M21 18v1c0 1.1-.9 2-2 2H5c-1.11 0-2-.9-2-2V5c0-1.1.89-2 2-2h14c1.1 0 2 .9 2 2v1h-9c-1.11 0-2 .9-2 2v8c0 1.1.89 2 2 2h9zm-9-2h10V8H12v8zm4-2.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z" />
                                </svg>
                            </div>

                            <div class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <h3 class="block w-full h-auto p-0 mb-4 subtitle-2 text-lg text-center text-black/[0.87] truncate relative dark:text-white/[0.87]">
                                    {{ __('Keuangan Aset') }}
                                </h3>

                                <p class="block w-full h-auto p-0 m-0 body-2 text-center text-black/[0.60] line-clamp-5 text-ellipsis relative dark:text-white/[0.60]">
                                    {{ __('Fitur ini mencatat seluruh transaksi keuangan yang berkaitan dengan aset, baik itu pengeluaran untuk perbaikan atau pemeliharaan, maupun pemasukan yang diperoleh dari penggunaan aset tersebut. ') }}
                                </p>
                            </div>
                        </div>

                        <div class="block min-w-0 w-full h-auto p-3 m-0 bg-transparent rounded-none shadow-none relative md:w-4/12 md:p-3 md:mb-10">
                            <div class="block w-20 h-20 p-[22px] mx-auto mb-8 rounded-full text-white bg-primary dark:text-black">
                                <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path d="M16.5 6v11.5c0 2.21-1.79 4-4 4s-4-1.79-4-4V5c0-1.38 1.12-2.5 2.5-2.5s2.5 1.12 2.5 2.5v10.5c0 .55-.45 1-1 1s-1-.45-1-1V6H10v9.5c0 1.38 1.12 2.5 2.5 2.5s2.5-1.12 2.5-2.5V5c0-2.21-1.79-4-4-4S7 2.79 7 5v12.5c0 3.04 2.46 5.5 5.5 5.5s5.5-2.46 5.5-5.5V6h-1.5z" />
                                </svg>
                            </div>

                            <div class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <h3 class="block w-full h-auto p-0 mb-4 subtitle-2 text-lg text-center text-black/[0.87] truncate relative dark:text-white/[0.87]">
                                    {{ __('Foto & Lampiran') }}
                                </h3>

                                <p class="block w-full h-auto p-0 m-0 body-2 text-center text-black/[0.60] line-clamp-5 text-ellipsis relative dark:text-white/[0.60]">
                                    {{ __('Setiap aset dapat dilengkapi dengan foto dan lampiran dokumen pendukung, seperti sertifikat atau nota pembelian. Fitur ini memastikan bahwa semua informasi visual dan administratif terkait aset dapat diakses dengan mudah.') }}
                                </p>
                            </div>
                        </div>

                        <div class="block min-w-0 w-full h-auto p-3 m-0 bg-transparent rounded-none shadow-none relative md:w-4/12 md:p-3 md:mb-10">
                            <div class="block w-20 h-20 p-[22px] mx-auto mb-8 rounded-full text-white bg-primary dark:text-black">
                                <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                    <rect fill="none" height="24" width="24" />
                                    <path d="M9.5,6.5v3h-3v-3H9.5 M11,5H5v6h6V5L11,5z M9.5,14.5v3h-3v-3H9.5 M11,13H5v6h6V13L11,13z M17.5,6.5v3h-3v-3H17.5 M19,5h-6v6 h6V5L19,5z M13,13h1.5v1.5H13V13z M14.5,14.5H16V16h-1.5V14.5z M16,13h1.5v1.5H16V13z M13,16h1.5v1.5H13V16z M14.5,17.5H16V19h-1.5 V17.5z M16,16h1.5v1.5H16V16z M17.5,14.5H19V16h-1.5V14.5z M17.5,17.5H19V19h-1.5V17.5z M22,7h-2V4h-3V2h5V7z M22,22v-5h-2v3h-3v2 H22z M2,22h5v-2H4v-3H2V22z M2,2v5h2V4h3V2H2z" />
                                </svg>
                            </div>

                            <div class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <h3 class="block w-full h-auto p-0 mb-4 subtitle-2 text-lg text-center text-black/[0.87] truncate relative dark:text-white/[0.87]">
                                    {{ __('Verifikator') }}
                                </h3>

                                <p class="block w-full h-auto p-0 m-0 body-2 text-center text-black/[0.60] line-clamp-5 text-ellipsis relative dark:text-white/[0.60]">
                                    {{ __('Fitur ini memungkinkan proses verifikasi aset dilakukan oleh petugas yang berwenang. Setiap aset akan melalui proses validasi untuk memastikan bahwa data yang tercatat sesuai dengan kondisi aset di lapangan.') }}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <section class="block w-full h-auto p-0 m-0 bg-primary overflow-hidden relative dark:bg-primary" id="testimonials">
                <div class="block w-full max-w-5xl h-auto py-[60px] mx-auto border-t border-none border-chinese-white shadow-none sm:py-[90px] dark:border-dark-liver">

                    <div class="block w-full h-auto p-0 mb-[30px] overflow-hidden relative">
                        <h2 class="block w-full h-auto p-0 m-0 headline-4 text-center text-white truncate relative dark:text-black">
                            {{ __('Testimoni') }}
                        </h2>
                    </div>

                    <div class="block w-full h-auto px-4 m-0 overflow-hidden relative md:px-0" id="carousel">
                        <div class="flex touch-pan-y touch-pinch-zoom ml-[calc(1rem_*_-1)]">
                            <div class="flex-[0_0_100%] min-w-0 pl-4 md:flex-[0_0_50%]">
                                <div class="block min-w-0 w-full h-full pt-16 pb-10 px-10 m-0 bg-white rounded shadow-none relative md:w-12/12 dark:bg-chinese-black">
                                    <div class="block w-16 h-16 p-0 m-0 rounded-full text-primary/[0.12] bg-transparent absolute left-10 top-10 z-0">
                                        <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path d="M0 216C0 149.7 53.7 96 120 96h8c17.7 0 32 14.3 32 32s-14.3 32-32 32h-8c-30.9 0-56 25.1-56 56v8h64c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V320 288 216zm256 0c0-66.3 53.7-120 120-120h8c17.7 0 32 14.3 32 32s-14.3 32-32 32h-8c-30.9 0-56 25.1-56 56v8h64c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64H320c-35.3 0-64-28.7-64-64V320 288 216z" />
                                        </svg>
                                    </div>

                                    <div class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                        <p class="block w-full h-auto p-0 m-0 body-2 text-left text-black/[0.60] line-clamp-5 text-ellipsis relative dark:text-white/[0.60]">
                                            {{ __('Aplikasi pengelolaan Barang Milik Daerah sangat membantu dalam mengatur dan memantau aset dengan lebih efisien, sehingga proses pengelolaan menjadi lebih terstruktur.') }}
                                        </p>

                                        <h5 class="block w-full h-auto p-0 mt-4 subtitle-2 text-lg text-left text-primary truncate relative dark:text-primary">
                                            {{ __('Dila Fahriyanti - Panata TK. I/IIId') }}
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-[0_0_100%] min-w-0 pl-4 md:flex-[0_0_50%]">
                                <div class="block min-w-0 w-full h-full pt-16 pb-10 px-10 m-0 bg-white rounded shadow-none relative md:w-12/12 dark:bg-chinese-black">
                                    <div class="block w-16 h-16 p-0 m-0 rounded-full text-primary/[0.12] bg-transparent absolute left-10 top-10 z-0">
                                        <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path d="M0 216C0 149.7 53.7 96 120 96h8c17.7 0 32 14.3 32 32s-14.3 32-32 32h-8c-30.9 0-56 25.1-56 56v8h64c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V320 288 216zm256 0c0-66.3 53.7-120 120-120h8c17.7 0 32 14.3 32 32s-14.3 32-32 32h-8c-30.9 0-56 25.1-56 56v8h64c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64H320c-35.3 0-64-28.7-64-64V320 288 216z" />
                                        </svg>
                                    </div>

                                    <div class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                        <p class="block w-full h-auto p-0 m-0 body-2 text-left text-black/[0.60] line-clamp-5 text-ellipsis relative dark:text-white/[0.60]">
                                            {{ __('Fitur QR-Code di aplikasi ini benar-benar mempercepat proses pelacakan barang. Hanya dengan memindai kode, semua informasi barang langsung terlihat, menghemat waktu dan tenaga.') }}
                                        </p>

                                        <h5 class="block w-full h-auto p-0 mt-4 subtitle-2 text-lg text-left text-primary truncate relative dark:text-primary">
                                            {{ __('Diva Seprisna - Penata Tk. I/IIId') }}
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-[0_0_100%] min-w-0 pl-4 md:flex-[0_0_50%]">
                                <div class="block min-w-0 w-full h-full pt-16 pb-10 px-10 m-0 bg-white rounded shadow-none relative md:w-12/12 dark:bg-chinese-black">
                                    <div class="block w-16 h-16 p-0 m-0 rounded-full text-primary/[0.12] bg-transparent absolute left-10 top-10 z-0">
                                        <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path d="M0 216C0 149.7 53.7 96 120 96h8c17.7 0 32 14.3 32 32s-14.3 32-32 32h-8c-30.9 0-56 25.1-56 56v8h64c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V320 288 216zm256 0c0-66.3 53.7-120 120-120h8c17.7 0 32 14.3 32 32s-14.3 32-32 32h-8c-30.9 0-56 25.1-56 56v8h64c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64H320c-35.3 0-64-28.7-64-64V320 288 216z" />
                                        </svg>
                                    </div>

                                    <div class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                        <p class="block w-full h-auto p-0 m-0 body-2 text-left text-black/[0.60] line-clamp-5 text-ellipsis relative dark:text-white/[0.60]">
                                            {{ __('Sistem ini sangat membantu dalam mempermudah proses pengelolaan dan pencatatan aset secara lebih terstruktur dan efisien.') }}
                                        </p>

                                        <h5 class="block w-full h-auto p-0 mt-4 subtitle-2 text-lg text-left text-primary truncate relative dark:text-primary">
                                            {{ __('T. Fauzi, S. Sos - Penata Muda Tk. I/IIIb') }}
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-[0_0_100%] min-w-0 pl-4 md:flex-[0_0_50%]">
                                <div class="block min-w-0 w-full h-full pt-16 pb-10 px-10 m-0 bg-white rounded shadow-none relative md:w-12/12 dark:bg-chinese-black">
                                    <div class="block w-16 h-16 p-0 m-0 rounded-full text-primary/[0.12] bg-transparent absolute left-10 top-10 z-0">
                                        <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path d="M0 216C0 149.7 53.7 96 120 96h8c17.7 0 32 14.3 32 32s-14.3 32-32 32h-8c-30.9 0-56 25.1-56 56v8h64c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V320 288 216zm256 0c0-66.3 53.7-120 120-120h8c17.7 0 32 14.3 32 32s-14.3 32-32 32h-8c-30.9 0-56 25.1-56 56v8h64c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64H320c-35.3 0-64-28.7-64-64V320 288 216z" />
                                        </svg>
                                    </div>

                                    <div class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                        <p class="block w-full h-auto p-0 m-0 body-2 text-left text-black/[0.60] line-clamp-5 text-ellipsis relative dark:text-white/[0.60]">
                                            {{ __('Aplikasi pengelolaan Barang Milik Daerah secara signifikan mengurangi kesalahan dalam pencatatan aset. Sistemnya sangat membantu dalam menjaga data tetap akurat.') }}
                                        </p>

                                        <h5 class="block w-full h-auto p-0 mt-4 subtitle-2 text-lg text-left text-primary truncate relative dark:text-primary">
                                            {{ __('Siska Umaira - Panata TK. I/IIIc') }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center items-center flex-wrap gap-0 w-full h-auto px-4 mt-[30px] relative" id="dots"></div>

                </div>
            </section>
        </main>

        <footer class="block flex-shrink-0 w-auto h-auto p-0 m-0 relative">
            <div class="block w-full h-auto p-0 m-0 bg-white overflow-hidden relative dark:bg-chinese-black">
                <div class="block w-full max-w-5xl h-auto py-[60px] mx-auto border-t border-none border-chinese-white shadow-none sm:py-[90px] dark:border-dark-liver">

                    <div class="flex justify-start items-stretch flex-wrap gap-0 w-full h-auto p-0 m-0 relative">
                        <div class="block min-w-0 w-full h-auto p-3 m-0 bg-transparent rounded-none shadow-none relative md:w-4/12 md:p-0 md:mb-0">
                            <div class="block w-20 h-20 p-[22px] mx-auto mb-8 rounded-full text-white bg-primary dark:text-black">
                                <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                                </svg>
                            </div>

                            <div class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <h3 class="block w-full h-auto p-0 mb-4 subtitle-2 text-lg text-center text-black/[0.87] truncate relative dark:text-white/[0.87]">
                                    {{ __('Telepon') }}
                                </h3>

                                <p class="block w-full h-auto p-0 m-0 body-2 text-center text-black/[0.60] line-clamp-5 text-ellipsis relative dark:text-white/[0.60]">
                                    {{ __('(0766) 2620260') }}
                                </p>
                            </div>
                        </div>

                        <div class="block min-w-0 w-full h-auto p-3 m-0 bg-transparent rounded-none shadow-none relative md:w-4/12 md:p-0 md:mb-0">
                            <div class="block w-20 h-20 p-[22px] mx-auto mb-8 rounded-full text-white bg-primary dark:text-black">
                                <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                    <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                                </svg>
                            </div>

                            <div class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <h3 class="block w-full h-auto p-0 mb-4 subtitle-2 text-lg text-center text-black/[0.87] truncate relative dark:text-white/[0.87]">
                                    {{ __('Alamat') }}
                                </h3>

                                <p class="block w-full h-auto p-0 m-0 body-2 text-center text-black/[0.60] line-clamp-5 text-ellipsis relative dark:text-white/[0.60]">
                                    {{ __('Jl. Pertanian No. 4 - Bengkalis') }}
                                </p>
                            </div>
                        </div>

                        <div class="block min-w-0 w-full h-auto p-3 m-0 bg-transparent rounded-none shadow-none relative md:w-4/12 md:p-0 md:mb-0">
                            <div class="block w-20 h-20 p-[22px] mx-auto mb-8 rounded-full text-white bg-primary dark:text-black">
                                <svg class="pointer-events-none w-full h-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                </svg>
                            </div>

                            <div class="block w-full h-auto p-0 m-0 overflow-hidden relative">
                                <h3 class="block w-full h-auto p-0 mb-4 subtitle-2 text-lg text-center text-black/[0.87] truncate relative dark:text-white/[0.87]">
                                    {{ __('Jam Buka') }}
                                </h3>

                                <p class="block w-full h-auto p-0 m-0 body-2 text-center text-black/[0.60] line-clamp-5 text-ellipsis relative dark:text-white/[0.60]">
                                    {{ __('Senin - Jum\'at, 07.00 - 16.00 WIB') }}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="block w-full max-w-5xl h-auto py-2 mx-auto border-t border-solid border-chinese-white shadow-none sm:py-2 dark:border-dark-liver">
                    <div class="block py-1 m-0 text-center overflow-hidden relative lg:text-left">
                        <span class="inline-block w-auto h-auto p-0 m-0 caption text-black/[0.60] align-middle whitespace-nowrap dark:text-white/[0.60]">
                            &copy {{ config('app.name', 'Laravel') }} {{ now()->year }}, All rights reserved.
                        </span>
                    </div>
                </div>
            </div>
        </footer>

    </div>
@endsection

@push('scripts')
    @vite(['resources/js/active-menu-link.js', 'resources/js/embla-carousel.js'])
@endpush
