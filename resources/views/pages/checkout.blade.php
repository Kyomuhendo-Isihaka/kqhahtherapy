@extends('layouts.app')

@section('content')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

        <div
            class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                    <div class="grow">
                        <h5 class="text-16">Checkout</h5>
                    </div>

                </div>

                <form action="{{ route('order.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5">


                        <input type="hidden" name="user_id" value="{{ request('user_id') }}" required>
                        <input type="hidden" name="cart" value="{{ json_encode($cart) }}" required>
                        <input type="hidden" name="total" value="{{ $total }}">
                        <div class="xl:col-span-8">

                            <h6 class="mb-4 text-15">Shipping Information</h6>
                            <div class="card">
                                <div class="card-body">
                                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-12">
                                        <div class="xl:col-span-4">
                                            <label for="firstNameInput"
                                                class="inline-block mb-2 text-base font-medium">Shipping
                                                Address <span class="text-danger">*</span></label>
                                            <input type="text" name="shipping_address"
                                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                placeholder="Enter Shipping Address">
                                        </div><!--end col-->


                                        <div class="xl:col-span-4">
                                            <label for="townCityInput"
                                                class="inline-block mb-2 text-base font-medium">Town/City</label>
                                            <input type="text" name="city" id="townCityInput"
                                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                placeholder="Town/City">
                                        </div><!--end col-->
                                        <div class="xl:col-span-4">
                                            <label for="stateInput"
                                                class="inline-block mb-2 text-base font-medium">State</label>
                                            <input type="text" id="stateInput" name="state"
                                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                placeholder="State">
                                        </div><!--end col-->
                                        <div class="xl:col-span-4">
                                            <label for="zipcodeInput"
                                                class="inline-block mb-2 text-base font-medium">ZipCode</label>
                                            <input type="text" id="zipcodeInput" name="zipcode"
                                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                placeholder="ZipCode">
                                        </div><!--end col-->


                                        <div class="xl:col-span-4">
                                            <label for="alternativeNumberInput"
                                                class="inline-block mb-2 text-base font-medium">Phone
                                                Number <p class="text-secondary">(Optional)</p></label>
                                            <input type="text" name="phone_number" id="alternativeNumberInput"
                                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                placeholder="(012) 345 678 9010">
                                        </div><!--end col-->
                                        <div class="xl:col-span-4">
                                            <label for="emailAddressInput"
                                                class="inline-block mb-2 text-base font-medium">Email
                                                Address <p class="text-secondary">(Optional)</p></label>
                                            <input type="email" name="email" id="emailAddressInput"
                                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                placeholder="Enter email">
                                        </div><!--end col-->

                                    </div><!--end grid-->


                                </div>
                            </div>



                            {{-- <div class="card">
                                <div class="card-body">
                                    <h6 class="mb-4 text-15">Payment Information</h6>
                                    <form action="#!">
                                        <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                                            <div class="xl:col-span-12">
                                                <label for="cardNumberInput"
                                                    class="inline-block mb-2 text-base font-medium">Card
                                                    Number</label>
                                                <input type="text" pattern="\d*" maxlength="16" id="cardNumberInput"
                                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                    placeholder="XXXX XXXX XXXX XXXX">
                                            </div><!--end col-->
                                            <div class="xl:col-span-6">
                                                <label for="expiringInput"
                                                    class="inline-block mb-2 text-base font-medium">Expiring
                                                    (MM/YY)</label>
                                                <input type="text" pattern="\d*" maxlength="4" id="expiringInput"
                                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                    placeholder="MM/YY">
                                            </div><!--end col-->
                                            <div class="xl:col-span-6">
                                                <label for="cvvInput" class="inline-block mb-2 text-base font-medium">CVV
                                                    Code</label>
                                                <input type="text" pattern="\d*" maxlength="3" id="cvvInput"
                                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                    placeholder="000">
                                            </div><!--end col-->
                                        </div><!--end grid-->
                                    </form>


                                </div>
                            </div> --}}

                            <!--end card-->
                        </div><!--end col-->

                        <div class="xl:col-span-4">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="mb-4 text-15">Orders Summary</h6>

                                    <div class="overflow-x-auto">
                                        <table class="w-full">
                                            <tbody>
                                                @foreach ($cart as $ct)
                                                    <tr>
                                                        <td
                                                            class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500">
                                                            <div class="flex items-center gap-3">
                                                                <div
                                                                    class="flex items-center justify-center rounded-md size-12 bg-slate-100 shrink-0">
                                                                    <img src="{{ asset('storage/' . $ct->image_path) }}"
                                                                        alt="" class="h-8">
                                                                </div>
                                                                <div class="grow">
                                                                    <h6 class="mb-1 text-15"><a
                                                                            href="apps-ecommerce-product-overview.html"
                                                                            class="transition-all duration-300 ease-linear hover:text-custom-500">{{ $ct->name }}</a>
                                                                    </h6>
                                                                    <p class="text-slate-500 dark:text-zink-200">
                                                                        x
                                                                        {{ $ct->no_of_items }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500 ltr:text-right rtl:text-left">
                                                            ${{ $ct->pdt_cost }}</td>
                                                    </tr>
                                                @endforeach




                                                <tr>
                                                    <td>
                                                        <hr>
                                                    </td>
                                                    <td>
                                                        <hr>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td
                                                        class="px-3.5 pt-4 pb-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                        Sub Total
                                                    </td>
                                                    <td
                                                        class="px-3.5 pt-4 pb-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">
                                                        ${{ $total }}</td>
                                                </tr>

                                                <tr class="font-semibold">
                                                    <td
                                                        class="px-3.5 pt-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                        Total Amount (USD)
                                                    </td>
                                                    <td
                                                        class="px-3.5 pt-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">
                                                        ${{ $total }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>




                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary" >Confirm Order</button>

                                    </div>


                                </div>
                            </div>
                        </div><!--end col-->


                    </div><!--end grid-->
                </form>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


    </div>
@endsection
