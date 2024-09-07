@extends('layouts.app')

@section('content')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

        <div
            class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">


                <div class="grid grid-cols-1 2xl:grid-cols-12 gap-x-5 ">

                    <div class="2xl:col-span-9">
                        <div class="flex flex-wrap items-center gap-2">
                            <p class="grow">Products</p>
                            <div class="flex gap-2 shrink-0 items-cente">

                                <p>>{{ $category }}</p>
                            </div>
                        </div>


                        @if ($category == 'oils' || $category=='butters')
                            <div class="row">
                                <div class="col-md-2 bg-light p-2 bg-white fixed-left">
                                    <h6 class="text-center">Filter Oils</h6>
                                    <hr>
                                    <form action="" class="text-center">
                                       <div class="form-group py-1">
                                        <input type="checkbox" name="" id="" > 2oz-$35
                                       </div>
                                       <div class="form-group py-1">
                                        <input type="checkbox" name="" id="" > 3oz-$40
                                       </div>
                                       <div class="form-group py-1">
                                        <input type="checkbox" name="" id="" > 5oz-$55
                                       </div>

                                    </form>
                                </div>
                                <div class="col-md-10">
                                    <div class="grid grid-cols-1 mt-5 md:grid-cols-4 [&.gridView]:grid-cols-1 xl:grid-cols-4 group [&.gridView]:xl:grid-cols-1 gap-x-5"
                                        id="cardGridView">

                                        <div class="card md:group-[.gridView]:flex relative">
                                            <div class="relative group-[.gridView]:static p-8 group-[.gridView]:p-5">
                                                <a href="#!"
                                                    class="absolute group/item toggle-button top-6 ltr:right-6 rtl:left-6"><i
                                                        data-lucide="heart"
                                                        class="size-5 text-slate-400 fill-slate-200 transition-all duration-150 ease-linear dark:text-zink-200 dark:fill-zink-600 group-[.active]/item:text-red-500 dark:group-[.active]/item:text-red-500 group-[.active]/item:fill-red-200 dark:group-[.active]/item:fill-red-500/20 group-hover/item:text-red-500 dark:group-hover/item:text-red-500 group-hover/item:fill-red-200 dark:group-hover/item:fill-red-500/20"></i></a>
                                                <div
                                                    class="group-[.gridView]:p-3 group-[.gridView]:bg-slate-100 dark:group-[.gridView]:bg-zink-600 group-[.gridView]:inline-block rounded-md">
                                                    <img src="{{ asset('uploads/kqhahtherapy.jpeg') }}" alt=""
                                                        class="group-[.gridView]:h-16">
                                                </div>
                                            </div>
                                            <div
                                                class="card-body !pt-0 md:group-[.gridView]:flex group-[.gridView]:!p-5 group-[.gridView]:gap-3 group-[.gridView]:grow">
                                                <div class="group-[.gridView]:grow">
                                                    <h6
                                                        class="mb-1 truncate transition-all duration-200 ease-linear text-15 hover:text-custom-500">
                                                        <a href="{{ route('product.details', 1) }}" class="nav-link">Gucii Oil</a>
                                                    </h6>

                                                    <h5 class="mt-4 text-16">$362.21 </h5>
                                                </div>

                                                <div
                                                    class="flex items-center gap-2 mt-4 group-[.gridView]:mt-0 group-[.gridView]:self-end">
                                                    <button type="button"
                                                        class="w-full bg-dark border-dashed text-white btn border-slate-500 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-600 focus:text-slate-600 focus:bg-slate-50 focus:border-slate-600 active:text-slate-600 active:bg-slate-50 active:border-slate-600 dark:bg-zink-700 dark:text-zink-200 dark:border-zink-400 dark:ring-zink-400/20 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:focus:bg-zink-600 dark:focus:text-zink-100 dark:active:bg-zink-600 dark:active:text-zink-100"><i
                                                            data-lucide="shopping-cart"
                                                            class="inline-block w-3 h-3 leading-none"></i>
                                                        <span class="align-middle">Add to Cart</span></button>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card md:group-[.gridView]:flex relative">
                                            <div class="relative group-[.gridView]:static p-8 group-[.gridView]:p-5">
                                                <a href="#!"
                                                    class="absolute group/item toggle-button top-6 ltr:right-6 rtl:left-6"><i
                                                        data-lucide="heart"
                                                        class="size-5 text-slate-400 fill-slate-200 transition-all duration-150 ease-linear dark:text-zink-200 dark:fill-zink-600 group-[.active]/item:text-red-500 dark:group-[.active]/item:text-red-500 group-[.active]/item:fill-red-200 dark:group-[.active]/item:fill-red-500/20 group-hover/item:text-red-500 dark:group-hover/item:text-red-500 group-hover/item:fill-red-200 dark:group-hover/item:fill-red-500/20"></i></a>
                                                <div
                                                    class="group-[.gridView]:p-3 group-[.gridView]:bg-slate-100 dark:group-[.gridView]:bg-zink-600 group-[.gridView]:inline-block rounded-md">
                                                    <img src="{{ asset('uploads/kqhahtherapy.jpeg') }}" alt=""
                                                        class="group-[.gridView]:h-16">
                                                </div>
                                            </div>
                                            <div
                                                class="card-body !pt-0 md:group-[.gridView]:flex group-[.gridView]:!p-5 group-[.gridView]:gap-3 group-[.gridView]:grow">
                                                <div class="group-[.gridView]:grow">
                                                    <h6
                                                        class="mb-1 truncate transition-all duration-200 ease-linear text-15 hover:text-custom-500">
                                                        <a href="{{ route('product.details', 1) }}" class="nav-link">Gucii Oil</a>
                                                    </h6>

                                                    <h5 class="mt-4 text-16">$362.21 </h5>
                                                </div>

                                                <div
                                                    class="flex items-center gap-2 mt-4 group-[.gridView]:mt-0 group-[.gridView]:self-end">
                                                    <button type="button"
                                                        class="w-full bg-dark border-dashed text-white btn border-slate-500 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-600 focus:text-slate-600 focus:bg-slate-50 focus:border-slate-600 active:text-slate-600 active:bg-slate-50 active:border-slate-600 dark:bg-zink-700 dark:text-zink-200 dark:border-zink-400 dark:ring-zink-400/20 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:focus:bg-zink-600 dark:focus:text-zink-100 dark:active:bg-zink-600 dark:active:text-zink-100"><i
                                                            data-lucide="shopping-cart"
                                                            class="inline-block w-3 h-3 leading-none"></i>
                                                        <span class="align-middle">Add to Cart</span></button>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card md:group-[.gridView]:flex relative">
                                            <div class="relative group-[.gridView]:static p-8 group-[.gridView]:p-5">
                                                <a href="#!"
                                                    class="absolute group/item toggle-button top-6 ltr:right-6 rtl:left-6"><i
                                                        data-lucide="heart"
                                                        class="size-5 text-slate-400 fill-slate-200 transition-all duration-150 ease-linear dark:text-zink-200 dark:fill-zink-600 group-[.active]/item:text-red-500 dark:group-[.active]/item:text-red-500 group-[.active]/item:fill-red-200 dark:group-[.active]/item:fill-red-500/20 group-hover/item:text-red-500 dark:group-hover/item:text-red-500 group-hover/item:fill-red-200 dark:group-hover/item:fill-red-500/20"></i></a>
                                                <div
                                                    class="group-[.gridView]:p-3 group-[.gridView]:bg-slate-100 dark:group-[.gridView]:bg-zink-600 group-[.gridView]:inline-block rounded-md">
                                                    <img src="{{ asset('uploads/kqhahtherapy.jpeg') }}" alt=""
                                                        class="group-[.gridView]:h-16">
                                                </div>
                                            </div>
                                            <div
                                                class="card-body !pt-0 md:group-[.gridView]:flex group-[.gridView]:!p-5 group-[.gridView]:gap-3 group-[.gridView]:grow">
                                                <div class="group-[.gridView]:grow">
                                                    <h6
                                                        class="mb-1 truncate transition-all duration-200 ease-linear text-15 hover:text-custom-500">
                                                        <a href="" class="nav-link">Gucii Oil</a>
                                                    </h6>

                                                    <h5 class="mt-4 text-16">$362.21 </h5>
                                                </div>

                                                <div
                                                    class="flex items-center gap-2 mt-4 group-[.gridView]:mt-0 group-[.gridView]:self-end">
                                                    <button type="button"
                                                        class="w-full bg-dark border-dashed text-white btn border-slate-500 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-600 focus:text-slate-600 focus:bg-slate-50 focus:border-slate-600 active:text-slate-600 active:bg-slate-50 active:border-slate-600 dark:bg-zink-700 dark:text-zink-200 dark:border-zink-400 dark:ring-zink-400/20 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:focus:bg-zink-600 dark:focus:text-zink-100 dark:active:bg-zink-600 dark:active:text-zink-100"><i
                                                            data-lucide="shopping-cart"
                                                            class="inline-block w-3 h-3 leading-none"></i>
                                                        <span class="align-middle">Add to Cart</span></button>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card md:group-[.gridView]:flex relative">
                                            <div class="relative group-[.gridView]:static p-8 group-[.gridView]:p-5">
                                                <a href="#!"
                                                    class="absolute group/item toggle-button top-6 ltr:right-6 rtl:left-6"><i
                                                        data-lucide="heart"
                                                        class="size-5 text-slate-400 fill-slate-200 transition-all duration-150 ease-linear dark:text-zink-200 dark:fill-zink-600 group-[.active]/item:text-red-500 dark:group-[.active]/item:text-red-500 group-[.active]/item:fill-red-200 dark:group-[.active]/item:fill-red-500/20 group-hover/item:text-red-500 dark:group-hover/item:text-red-500 group-hover/item:fill-red-200 dark:group-hover/item:fill-red-500/20"></i></a>
                                                <div
                                                    class="group-[.gridView]:p-3 group-[.gridView]:bg-slate-100 dark:group-[.gridView]:bg-zink-600 group-[.gridView]:inline-block rounded-md">
                                                    <img src="{{ asset('uploads/kqhahtherapy.jpeg') }}" alt=""
                                                        class="group-[.gridView]:h-16">
                                                </div>
                                            </div>
                                            <div
                                                class="card-body !pt-0 md:group-[.gridView]:flex group-[.gridView]:!p-5 group-[.gridView]:gap-3 group-[.gridView]:grow">
                                                <div class="group-[.gridView]:grow">
                                                    <h6
                                                        class="mb-1 truncate transition-all duration-200 ease-linear text-15 hover:text-custom-500">
                                                        <a href="{{ route('product.details', 1) }}" class="nav-link">Gucii Oil</a>
                                                    </h6>

                                                    <h5 class="mt-4 text-16">$362.21 </h5>
                                                </div>

                                                <div
                                                    class="flex items-center gap-2 mt-4 group-[.gridView]:mt-0 group-[.gridView]:self-end">
                                                    <button type="button"
                                                        class="w-full bg-dark border-dashed text-white btn border-slate-500 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-600 focus:text-slate-600 focus:bg-slate-50 focus:border-slate-600 active:text-slate-600 active:bg-slate-50 active:border-slate-600 dark:bg-zink-700 dark:text-zink-200 dark:border-zink-400 dark:ring-zink-400/20 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:focus:bg-zink-600 dark:focus:text-zink-100 dark:active:bg-zink-600 dark:active:text-zink-100"><i
                                                            data-lucide="shopping-cart"
                                                            class="inline-block w-3 h-3 leading-none"></i>
                                                        <span class="align-middle">Add to Cart</span></button>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card md:group-[.gridView]:flex relative">
                                            <div class="relative group-[.gridView]:static p-8 group-[.gridView]:p-5">
                                                <a href="#!"
                                                    class="absolute group/item toggle-button top-6 ltr:right-6 rtl:left-6"><i
                                                        data-lucide="heart"
                                                        class="size-5 text-slate-400 fill-slate-200 transition-all duration-150 ease-linear dark:text-zink-200 dark:fill-zink-600 group-[.active]/item:text-red-500 dark:group-[.active]/item:text-red-500 group-[.active]/item:fill-red-200 dark:group-[.active]/item:fill-red-500/20 group-hover/item:text-red-500 dark:group-hover/item:text-red-500 group-hover/item:fill-red-200 dark:group-hover/item:fill-red-500/20"></i></a>
                                                <div
                                                    class="group-[.gridView]:p-3 group-[.gridView]:bg-slate-100 dark:group-[.gridView]:bg-zink-600 group-[.gridView]:inline-block rounded-md">
                                                    <img src="{{ asset('uploads/kqhahtherapy.jpeg') }}" alt=""
                                                        class="group-[.gridView]:h-16">
                                                </div>
                                            </div>
                                            <div
                                                class="card-body !pt-0 md:group-[.gridView]:flex group-[.gridView]:!p-5 group-[.gridView]:gap-3 group-[.gridView]:grow">
                                                <div class="group-[.gridView]:grow">
                                                    <h6
                                                        class="mb-1 truncate transition-all duration-200 ease-linear text-15 hover:text-custom-500">
                                                        <a href="{{ route('product.details', 1) }}" class="nav-link">Gucii Oil</a>
                                                    </h6>

                                                    <h5 class="mt-4 text-16">$362.21 </h5>
                                                </div>

                                                <div
                                                    class="flex items-center gap-2 mt-4 group-[.gridView]:mt-0 group-[.gridView]:self-end">
                                                    <button type="button"
                                                        class="w-full bg-dark border-dashed text-white btn border-slate-500 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-600 focus:text-slate-600 focus:bg-slate-50 focus:border-slate-600 active:text-slate-600 active:bg-slate-50 active:border-slate-600 dark:bg-zink-700 dark:text-zink-200 dark:border-zink-400 dark:ring-zink-400/20 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:focus:bg-zink-600 dark:focus:text-zink-100 dark:active:bg-zink-600 dark:active:text-zink-100"><i
                                                            data-lucide="shopping-cart"
                                                            class="inline-block w-3 h-3 leading-none"></i>
                                                        <span class="align-middle">Add to Cart</span></button>

                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="grid grid-cols-1 mt-5 md:grid-cols-4 [&.gridView]:grid-cols-1 xl:grid-cols-4 group [&.gridView]:xl:grid-cols-1 gap-x-5"
                                id="cardGridView">

                                <div class="card md:group-[.gridView]:flex relative">
                                    <div class="relative group-[.gridView]:static p-8 group-[.gridView]:p-5">
                                        <a href="#!"
                                            class="absolute group/item toggle-button top-6 ltr:right-6 rtl:left-6"><i
                                                data-lucide="heart"
                                                class="size-5 text-slate-400 fill-slate-200 transition-all duration-150 ease-linear dark:text-zink-200 dark:fill-zink-600 group-[.active]/item:text-red-500 dark:group-[.active]/item:text-red-500 group-[.active]/item:fill-red-200 dark:group-[.active]/item:fill-red-500/20 group-hover/item:text-red-500 dark:group-hover/item:text-red-500 group-hover/item:fill-red-200 dark:group-hover/item:fill-red-500/20"></i></a>
                                        <div
                                            class="group-[.gridView]:p-3 group-[.gridView]:bg-slate-100 dark:group-[.gridView]:bg-zink-600 group-[.gridView]:inline-block rounded-md">
                                            <img src="{{ asset('uploads/kqhahtherapy.jpeg') }}" alt=""
                                                class="group-[.gridView]:h-16">
                                        </div>
                                    </div>
                                    <div
                                        class="card-body !pt-0 md:group-[.gridView]:flex group-[.gridView]:!p-5 group-[.gridView]:gap-3 group-[.gridView]:grow">
                                        <div class="group-[.gridView]:grow">
                                            <h6
                                                class="mb-1 truncate transition-all duration-200 ease-linear text-15 hover:text-custom-500">
                                                <a href="{{ route('product.details', 1) }}" class="nav-link">Gucii Oil</a>
                                            </h6>

                                            <h5 class="mt-4 text-16">$362.21 </h5>
                                        </div>

                                        <div
                                            class="flex items-center gap-2 mt-4 group-[.gridView]:mt-0 group-[.gridView]:self-end">
                                            <button type="button"
                                                class="w-full bg-dark border-dashed text-white btn border-slate-500 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-600 focus:text-slate-600 focus:bg-slate-50 focus:border-slate-600 active:text-slate-600 active:bg-slate-50 active:border-slate-600 dark:bg-zink-700 dark:text-zink-200 dark:border-zink-400 dark:ring-zink-400/20 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:focus:bg-zink-600 dark:focus:text-zink-100 dark:active:bg-zink-600 dark:active:text-zink-100"><i
                                                    data-lucide="shopping-cart"
                                                    class="inline-block w-3 h-3 leading-none"></i>
                                                <span class="align-middle">Add to Cart</span></button>

                                        </div>
                                    </div>
                                </div>

                                <div class="card md:group-[.gridView]:flex relative">
                                    <div class="relative group-[.gridView]:static p-8 group-[.gridView]:p-5">
                                        <a href="#!"
                                            class="absolute group/item toggle-button top-6 ltr:right-6 rtl:left-6"><i
                                                data-lucide="heart"
                                                class="size-5 text-slate-400 fill-slate-200 transition-all duration-150 ease-linear dark:text-zink-200 dark:fill-zink-600 group-[.active]/item:text-red-500 dark:group-[.active]/item:text-red-500 group-[.active]/item:fill-red-200 dark:group-[.active]/item:fill-red-500/20 group-hover/item:text-red-500 dark:group-hover/item:text-red-500 group-hover/item:fill-red-200 dark:group-hover/item:fill-red-500/20"></i></a>
                                        <div
                                            class="group-[.gridView]:p-3 group-[.gridView]:bg-slate-100 dark:group-[.gridView]:bg-zink-600 group-[.gridView]:inline-block rounded-md">
                                            <img src="{{ asset('uploads/kqhahtherapy.jpeg') }}" alt=""
                                                class="group-[.gridView]:h-16">
                                        </div>
                                    </div>
                                    <div
                                        class="card-body !pt-0 md:group-[.gridView]:flex group-[.gridView]:!p-5 group-[.gridView]:gap-3 group-[.gridView]:grow">
                                        <div class="group-[.gridView]:grow">
                                            <h6
                                                class="mb-1 truncate transition-all duration-200 ease-linear text-15 hover:text-custom-500">
                                                <a href="{{ route('product.details', 1) }}" class="nav-link">Gucii Oil</a>
                                            </h6>

                                            <h5 class="mt-4 text-16">$362.21 </h5>
                                        </div>

                                        <div
                                            class="flex items-center gap-2 mt-4 group-[.gridView]:mt-0 group-[.gridView]:self-end">
                                            <button type="button"
                                                class="w-full bg-dark border-dashed text-white btn border-slate-500 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-600 focus:text-slate-600 focus:bg-slate-50 focus:border-slate-600 active:text-slate-600 active:bg-slate-50 active:border-slate-600 dark:bg-zink-700 dark:text-zink-200 dark:border-zink-400 dark:ring-zink-400/20 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:focus:bg-zink-600 dark:focus:text-zink-100 dark:active:bg-zink-600 dark:active:text-zink-100"><i
                                                    data-lucide="shopping-cart"
                                                    class="inline-block w-3 h-3 leading-none"></i>
                                                <span class="align-middle">Add to Cart</span></button>

                                        </div>
                                    </div>
                                </div>

                                <div class="card md:group-[.gridView]:flex relative">
                                    <div class="relative group-[.gridView]:static p-8 group-[.gridView]:p-5">
                                        <a href="#!"
                                            class="absolute group/item toggle-button top-6 ltr:right-6 rtl:left-6"><i
                                                data-lucide="heart"
                                                class="size-5 text-slate-400 fill-slate-200 transition-all duration-150 ease-linear dark:text-zink-200 dark:fill-zink-600 group-[.active]/item:text-red-500 dark:group-[.active]/item:text-red-500 group-[.active]/item:fill-red-200 dark:group-[.active]/item:fill-red-500/20 group-hover/item:text-red-500 dark:group-hover/item:text-red-500 group-hover/item:fill-red-200 dark:group-hover/item:fill-red-500/20"></i></a>
                                        <div
                                            class="group-[.gridView]:p-3 group-[.gridView]:bg-slate-100 dark:group-[.gridView]:bg-zink-600 group-[.gridView]:inline-block rounded-md">
                                            <img src="{{ asset('uploads/kqhahtherapy.jpeg') }}" alt=""
                                                class="group-[.gridView]:h-16">
                                        </div>
                                    </div>
                                    <div
                                        class="card-body !pt-0 md:group-[.gridView]:flex group-[.gridView]:!p-5 group-[.gridView]:gap-3 group-[.gridView]:grow">
                                        <div class="group-[.gridView]:grow">
                                            <h6
                                                class="mb-1 truncate transition-all duration-200 ease-linear text-15 hover:text-custom-500">
                                                <a href="{{ route('product.details', 1) }}" class="nav-link">Gucii Oil</a>
                                            </h6>

                                            <h5 class="mt-4 text-16">$362.21 </h5>
                                        </div>

                                        <div
                                            class="flex items-center gap-2 mt-4 group-[.gridView]:mt-0 group-[.gridView]:self-end">
                                            <button type="button"
                                                class="w-full bg-dark border-dashed text-white btn border-slate-500 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-600 focus:text-slate-600 focus:bg-slate-50 focus:border-slate-600 active:text-slate-600 active:bg-slate-50 active:border-slate-600 dark:bg-zink-700 dark:text-zink-200 dark:border-zink-400 dark:ring-zink-400/20 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:focus:bg-zink-600 dark:focus:text-zink-100 dark:active:bg-zink-600 dark:active:text-zink-100"><i
                                                    data-lucide="shopping-cart"
                                                    class="inline-block w-3 h-3 leading-none"></i>
                                                <span class="align-middle">Add to Cart</span></button>

                                        </div>
                                    </div>
                                </div>

                                <div class="card md:group-[.gridView]:flex relative">
                                    <div class="relative group-[.gridView]:static p-8 group-[.gridView]:p-5">
                                        <a href="#!"
                                            class="absolute group/item toggle-button top-6 ltr:right-6 rtl:left-6"><i
                                                data-lucide="heart"
                                                class="size-5 text-slate-400 fill-slate-200 transition-all duration-150 ease-linear dark:text-zink-200 dark:fill-zink-600 group-[.active]/item:text-red-500 dark:group-[.active]/item:text-red-500 group-[.active]/item:fill-red-200 dark:group-[.active]/item:fill-red-500/20 group-hover/item:text-red-500 dark:group-hover/item:text-red-500 group-hover/item:fill-red-200 dark:group-hover/item:fill-red-500/20"></i></a>
                                        <div
                                            class="group-[.gridView]:p-3 group-[.gridView]:bg-slate-100 dark:group-[.gridView]:bg-zink-600 group-[.gridView]:inline-block rounded-md">
                                            <img src="{{ asset('uploads/kqhahtherapy.jpeg') }}" alt=""
                                                class="group-[.gridView]:h-16">
                                        </div>
                                    </div>
                                    <div
                                        class="card-body !pt-0 md:group-[.gridView]:flex group-[.gridView]:!p-5 group-[.gridView]:gap-3 group-[.gridView]:grow">
                                        <div class="group-[.gridView]:grow">
                                            <h6
                                                class="mb-1 truncate transition-all duration-200 ease-linear text-15 hover:text-custom-500">
                                                <a href="{{ route('product.details', 1) }}" class="nav-link">Gucii Oil</a>
                                            </h6>

                                            <h5 class="mt-4 text-16">$362.21 </h5>
                                        </div>

                                        <div
                                            class="flex items-center gap-2 mt-4 group-[.gridView]:mt-0 group-[.gridView]:self-end">
                                            <button type="button"
                                                class="w-full bg-dark border-dashed text-white btn border-slate-500 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-600 focus:text-slate-600 focus:bg-slate-50 focus:border-slate-600 active:text-slate-600 active:bg-slate-50 active:border-slate-600 dark:bg-zink-700 dark:text-zink-200 dark:border-zink-400 dark:ring-zink-400/20 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:focus:bg-zink-600 dark:focus:text-zink-100 dark:active:bg-zink-600 dark:active:text-zink-100"><i
                                                    data-lucide="shopping-cart"
                                                    class="inline-block w-3 h-3 leading-none"></i>
                                                <span class="align-middle">Add to Cart</span></button>

                                        </div>
                                    </div>
                                </div>

                                <div class="card md:group-[.gridView]:flex relative">
                                    <div class="relative group-[.gridView]:static p-8 group-[.gridView]:p-5">
                                        <a href="#!"
                                            class="absolute group/item toggle-button top-6 ltr:right-6 rtl:left-6"><i
                                                data-lucide="heart"
                                                class="size-5 text-slate-400 fill-slate-200 transition-all duration-150 ease-linear dark:text-zink-200 dark:fill-zink-600 group-[.active]/item:text-red-500 dark:group-[.active]/item:text-red-500 group-[.active]/item:fill-red-200 dark:group-[.active]/item:fill-red-500/20 group-hover/item:text-red-500 dark:group-hover/item:text-red-500 group-hover/item:fill-red-200 dark:group-hover/item:fill-red-500/20"></i></a>
                                        <div
                                            class="group-[.gridView]:p-3 group-[.gridView]:bg-slate-100 dark:group-[.gridView]:bg-zink-600 group-[.gridView]:inline-block rounded-md">
                                            <img src="{{ asset('uploads/kqhahtherapy.jpeg') }}" alt=""
                                                class="group-[.gridView]:h-16">
                                        </div>
                                    </div>
                                    <div
                                        class="card-body !pt-0 md:group-[.gridView]:flex group-[.gridView]:!p-5 group-[.gridView]:gap-3 group-[.gridView]:grow">
                                        <div class="group-[.gridView]:grow">
                                            <h6
                                                class="mb-1 truncate transition-all duration-200 ease-linear text-15 hover:text-custom-500">
                                                <a href="{{ route('product.details', 1) }}" class="nav-link">Gucii Oil</a>
                                            </h6>

                                            <h5 class="mt-4 text-16">$362.21 </h5>
                                        </div>

                                        <div
                                            class="flex items-center gap-2 mt-4 group-[.gridView]:mt-0 group-[.gridView]:self-end">
                                            <button type="button"
                                                class="w-full bg-dark border-dashed text-white btn border-slate-500 hover:text-slate-500 hover:bg-slate-50 hover:border-slate-600 focus:text-slate-600 focus:bg-slate-50 focus:border-slate-600 active:text-slate-600 active:bg-slate-50 active:border-slate-600 dark:bg-zink-700 dark:text-zink-200 dark:border-zink-400 dark:ring-zink-400/20 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:focus:bg-zink-600 dark:focus:text-zink-100 dark:active:bg-zink-600 dark:active:text-zink-100"><i
                                                    data-lucide="shopping-cart"
                                                    class="inline-block w-3 h-3 leading-none"></i>
                                                <span class="align-middle">Add to Cart</span></button>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif

                    </div>
                </div><!--end grid-->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
@endsection
