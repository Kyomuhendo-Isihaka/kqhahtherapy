@extends('admin.layouts.app')

@section('content')
<div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">


        <div class="grid grid-cols-12 2xl:grid-cols-12 gap-x-5 mt-5">

            <div class="col-span-12 card md:col-span-6 lg:col-span-3 2xl:col-span-2">
                <div class="text-center card-body">
                    <div class="flex items-center justify-center mx-auto rounded-full size-14 bg-custom-100 text-custom-500 dark:bg-custom-500/20">
                        <i data-lucide="wallet-2"></i>
                    </div>
                    <h5 class="mt-4 mb-2">$<span class="counter-value" data-target="{{ $totalRevenue }}">0</span></h5>
                    <p class="text-slate-500 dark:text-zink-200">Total Revenue</p>
                </div>
            </div><!--end col-->
            <div class="col-span-12 card md:col-span-6 lg:col-span-3 2xl:col-span-2">
                <div class="text-center card-body">
                    <div class="flex items-center justify-center mx-auto text-purple-500 bg-purple-100 rounded-full size-14 dark:bg-purple-500/20">
                        <i data-lucide="package"></i>
                    </div>

                    <h5 class="mt-4 mb-2"><span class="counter-value" data-target="{{ $totalOrders }}">0</span></h5>
                    <p class="text-slate-500 dark:text-zink-200">Total Orders</p>
                </div>
            </div><!--end col-->
            <div class="col-span-12 card md:col-span-6 lg:col-span-3 2xl:col-span-2">
                <div class="text-center card-body">
                    <div class="flex items-center justify-center mx-auto text-green-500 bg-green-100 rounded-full size-14 dark:bg-green-500/20">
                        <i data-lucide="truck"></i>
                    </div>
                    <h5 class="mt-4 mb-2"><span class="counter-value" data-target="{{ $deliveredOrders }}">0</span></h5>
                    <p class="text-slate-500 dark:text-zink-200">Delivered</p>
                </div>
            </div><!--end col-->
            <div class="col-span-12 card md:col-span-6 lg:col-span-3 2xl:col-span-2">
                <div class="text-center card-body">
                    <div class="flex items-center justify-center mx-auto text-red-500 bg-red-100 rounded-full size-14 dark:bg-red-500/20">
                        <i data-lucide="package-x"></i>
                    </div>
                    <h5 class="mt-4 mb-2"><span class="counter-value" data-target="{{ $canceledOrders }}">0</span></h5>
                    <p class="text-slate-500 dark:text-zink-200">Cancelled</p>
                </div>
            </div><!--end col-->


            <div class="col-span-12 card 2xl:col-span-12">
                <div class="card-body">
                    <div class="grid items-center grid-cols-1 gap-3 mb-5 2xl:grid-cols-12">
                        <div class="2xl:col-span-3">
                            <h6 class="text-15">Recent Product Orders</h6>
                        </div><!--end col-->

                    </div><!--end grid-->
                    <div class="overflow-x-auto">
                        <table class="w-full whitespace-nowrap">
                            <thead class="ltr:text-left rtl:text-right bg-slate-100 text-slate-500 dark:text-zink-200 dark:bg-zink-600">
                                <tr>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                        #
                                    </th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                        Product Image
                                    </th>

                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">Product Name</th>

                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">Quantity</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">Price</th>
                                    <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">Total Amount</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count=1;
                                @endphp
                                @foreach ($recentOrderItems as $item)
                                <tr>
                                    <td
                                        class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                        {{ $count++ }}
                                    </td>
                                    <td
                                        class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                        <img src="{{ asset('storage/' . $item->product->image_path) }}"
                                            style="max-height: 40px; max-width: 40px; object-fit: contain;"
                                            alt="">
                                    </td>

                                    <td
                                        class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                        {{ $item->product->name }}</td>

                                    <td
                                        class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                        {{ $item->quantity }}</td>
                                    <td
                                        class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                        ${{ $item->price / $item->quantity }}</td>
                                    <td
                                        class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                        ${{ $item->price }}</td>


                                </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>

                </div>
            </div><!--end col-->

        </div><!--end grid-->
    </div>
    <!-- container-fluid -->
</div>
@endsection
