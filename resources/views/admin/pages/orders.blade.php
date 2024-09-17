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
                        <div class="flex items-center justify-center text-yellow-500 rounded-md size-12 text-15 bg-yellow-50 dark:bg-yellow-500/20 shrink-0"><i data-lucide="loader"></i></div>
                        <div class="grow">
                            <h5 class="mb-1 text-16 counter-value" data-target="{{ $pendingOrders }}">0</h5>
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
                            <h5 class="mb-1 text-16 counter-value" data-target="{{ $shippedOrders }}">0</h5>
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
                            <h5 class="mb-1 text-16 counter-value" data-target="{{ $deliveredOrders }}">0</h5>
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
                            <h5 class="mb-1 text-16 counter-value" data-target="{{ $canceledOrders }}">0</h5>
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
                                <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="order_id">##</th>
                                <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="order_date">Order Date</th>
                                <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="order_date">Shipping Address</th>

                                <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="amount">Amount</th>
                                <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200 sort" data-sort="delivery_status">Delivery Status</th>
                                <th class="px-3.5 py-2.5 font-semibold text-slate-500 border-b border-slate-200 dark:border-zink-500 dark:text-zink-200">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($orders as $order)


                            <tr>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500"><a href="#!" class="transition-all duration-150 ease-linear order_id text-custom-500 hover:text-custom-600">{{ $count++ }}</a></td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 order_date">{{ $order->created_at }}</td>

                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 payment_method">{{ $order->shipping_address }}</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 amount">${{ $order->total }}</td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                    @if ($order->status=='delivered')
                                    <span class="delivery_status px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-green-100 border-green-200 text-green-500 dark:bg-green-500/20 dark:border-green-500/20">Delivered</span>
                                    @elseif ($order->status=='pending')
                                    <span class="delivery_status px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-yellow-100 border-yellow-200 text-yellow-500 dark:bg-yellow-500/20 dark:border-yellow-500/20">Pending</span>
                                    @elseif ($order->status=='shipped')
                                    <span class="delivery_status px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-purple-100 border-purple-200 text-purple-500 dark:bg-purple-500/20 dark:border-purple-500/20">Shipped</span>
                                    @else
                                    <span class="delivery_status px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-red-100 border-red-200 text-red-500 dark:bg-red-500/20 dark:border-red-500/20">Canceled</span>
                                    @endif
                                </td>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                    <a href="{{ route('orders.details', $order->id) }}" class="btn text-custom-400"><i data-lucide="eye"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    {{ $orders->links('components.pagination') }}
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
