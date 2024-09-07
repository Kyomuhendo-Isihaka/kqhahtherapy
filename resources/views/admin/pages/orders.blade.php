@extends('admin.layouts.app')

@section('content')

<div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

        <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
            <div class="grow">
                <h5 class="text-16">Order Lists</h5>
            </div>

        </div>
        <div class="grid grid-cols-1 gap-x-5 md:grid-cols-2 2xl:grid-cols-12">
            <div class="2xl:col-span-2 2xl:row-span-1">
                <div class="card">
                    <div class="flex items-center gap-3 card-body">
                        <div class="flex items-center justify-center rounded-md size-12 text-15 bg-custom-50 text-custom-500 dark:bg-custom-500/20 shrink-0"><i data-lucide="boxes"></i></div>
                        <div class="grow">
                            <h5 class="mb-1 text-16 counter-value" data-target="15101">0</h5>
                            <p class="text-slate-500 dark:text-zink-200">Total Orders</p>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            <div class="2xl:col-span-2 2xl:row-span-1">
                <div class="card">
                    <div class="flex items-center gap-3 card-body">
                        <div class="flex items-center justify-center rounded-md size-12 text-15 bg-sky-50 text-sky-500 dark:bg-sky-500/20 shrink-0"><i data-lucide="package-plus"></i></div>
                        <div class="grow">
                            <h5 class="mb-1 text-16 counter-value" data-target="3874"></h5>
                            <p class="text-slate-500 dark:text-zink-200">New Orders</p>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            <div class="2xl:col-span-2 2xl:row-span-1">
                <div class="card">
                    <div class="flex items-center gap-3 card-body">
                        <div class="flex items-center justify-center text-yellow-500 rounded-md size-12 text-15 bg-yellow-50 dark:bg-yellow-500/20 shrink-0"><i data-lucide="loader"></i></div>
                        <div class="grow">
                            <h5 class="mb-1 text-16 counter-value" data-target="1548">0</h5>
                            <p class="text-slate-500 dark:text-zink-200">Pending Orders</p>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            <div class="2xl:col-span-2 2xl:row-span-1">
                <div class="card">
                    <div class="flex items-center gap-3 card-body">
                        <div class="flex items-center justify-center text-purple-500 rounded-md size-12 text-15 bg-purple-50 dark:bg-purple-500/20 shrink-0"><i data-lucide="truck"></i></div>
                        <div class="grow">
                            <h5 class="mb-1 text-16 counter-value" data-target="9543">0</h5>
                            <p class="text-slate-500 dark:text-zink-200">Shipping Orders</p>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            <div class="2xl:col-span-2 2xl:row-span-1">
                <div class="card">
                    <div class="flex items-center gap-3 card-body">
                        <div class="flex items-center justify-center text-green-500 rounded-md size-12 text-15 bg-green-50 dark:bg-green-500/20 shrink-0"><i data-lucide="package-check"></i></div>
                        <div class="grow">
                            <h5 class="mb-1 text-16 counter-value" data-target="30914">0</h5>
                            <p class="text-slate-500 dark:text-zink-200">Delivered Orders</p>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            <div class="2xl:col-span-2 2xl:row-span-1">
                <div class="card">
                    <div class="flex items-center gap-3 card-body">
                        <div class="flex items-center justify-center text-red-500 rounded-md size-12 text-15 bg-red-50 dark:bg-red-500/20 shrink-0"><i data-lucide="package-x"></i></div>
                        <div class="grow">
                            <h5 class="mb-1 text-16 counter-value" data-target="3863">0</h5>
                            <p class="text-slate-500 dark:text-zink-200">Cancelled Orders</p>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end grid-->

        <div class="card" id="ordersTable">
            <div class="card-body">
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-12">

                </div><!--col grid-->


                <div class="mt-5 overflow-x-auto">
                    <table class="w-full whitespace-nowrap">
                        <thead class="ltr:text-left rtl:text-right bg-slate-100 dark:bg-zink-600">
                            <tr>
                                <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="order_id">Order ID</th>
                                <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="order_date">Order Date</th>
                                <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="delivery_date">Delivery Date</th>
                                <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="customer_name">Customer Name</th>
                                <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="payment_method">Payment Method</th>
                                <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="amount">Amount</th>
                                <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="delivery_status">Delivery Status</th>
                                <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500"><a href="#!" class="transition-all duration-150 ease-linear order_id text-custom-500 hover:text-custom-600">#KQH10001</a></td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 order_date">08 Jun, 2023</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 delivery_date">15 Jun, 2023</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 customer_name">Isihaka K</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 payment_method">Credit Card</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 amount">$541.32</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                    <span class="delivery_status px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-green-100 border-green-200 text-green-500 dark:bg-green-500/20 dark:border-green-500/20">Delivered</span>
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                    <div class="relative dropdown">
                                        <button id="orderAction1" data-bs-toggle="dropdown" class="flex items-center justify-center size-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20"><i data-lucide="more-horizontal" class="size-3"></i></button>
                                        <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600" aria-labelledby="orderAction1">
                                            <li>
                                                <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="apps-ecommerce-order-overview.html"><i data-lucide="eye" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Overview</span></a>
                                            </li>
                                            <li>
                                                <a data-modal-target="addOrderModal" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!"><i data-lucide="file-edit" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Edit</span></a>
                                            </li>
                                            <li>
                                                <a data-modal-target="deleteModal" class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200" href="#!"><i data-lucide="trash-2" class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i> <span class="align-middle">Delete</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <div class="noresult" style="display: none">
                        <div class="py-6 text-center">
                            <i data-lucide="search" class="w-6 h-6 mx-auto text-sky-500 fill-sky-100 dark:sky-500/20"></i>
                            <h5 class="mt-2 mb-1">Sorry! No Result Found</h5>
                            <p class="mb-0 text-slate-500 dark:text-zink-200">We've searched more than 299+ orders We did not find any orders for you search.</p>
                        </div>
                    </div>
                </div>


            </div>
        </div><!--end card-->

    </div>
    <!-- container-fluid -->
</div>
@endsection
