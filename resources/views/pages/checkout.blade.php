@extends('layouts.app')

@section('content')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

        <div
            class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

                <div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5">
                    <div class="">
                        <div class="flex items-center gap-3 mb-5">
                            <div class="grow">
                                <a href="{{ route('cart') }}"
                                    class="transition-all duration-300 ease-linear text-custom-500 hover:text-custom-600"><i
                                        data-lucide="chevron-left"
                                        class="inline-block align-middle size-4 ltr:mr-1 rtl:ml-1 rtl:rotate-180"></i> <span
                                        class="align-middle">Back to Cart</span></a>
                            </div>

                        </div>
                        <form action="#!">
                            <div class="xl:col-span-8">
                                <h6 class="mb-4 text-15">Shipping Information</h6>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-12">
                                            <div class="xl:col-span-4">
                                                <label for="firstNameInput"
                                                    class="inline-block mb-2 text-base font-medium">Street Address <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                    placeholder="Enter Street Address">
                                            </div><!--end col-->


                                            <div class="xl:col-span-12">
                                                <label for="townCityInput"
                                                    class="inline-block mb-2 text-base font-medium">Town/City</label>
                                                <input type="text" id="townCityInput"
                                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                    placeholder="Town/City">
                                            </div><!--end col-->
                                            <div class="xl:col-span-4">
                                                <label for="stateInput"
                                                    class="inline-block mb-2 text-base font-medium">State</label>
                                                <input type="text" id="stateInput"
                                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                    placeholder="State">
                                            </div><!--end col-->
                                            <div class="xl:col-span-4">
                                                <label for="zipcodeInput"
                                                    class="inline-block mb-2 text-base font-medium">ZipCode</label>
                                                <input type="text" id="zipcodeInput"
                                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                    placeholder="ZipCode">
                                            </div><!--end col-->


                                            <div class="xl:col-span-4">
                                                <label for="alternativeNumberInput"
                                                    class="inline-block mb-2 text-base font-medium">Phone
                                                    Number <p class="text-secondary">(Optional)</p></label>
                                                <input type="text" id="alternativeNumberInput"
                                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                    placeholder="(012) 345 678 9010">
                                            </div><!--end col-->
                                            <div class="xl:col-span-4">
                                                <label for="emailAddressInput"
                                                    class="inline-block mb-2 text-base font-medium">Email
                                                    Address <p class="text-secondary">(Optional)</p></label>
                                                <input type="email" id="emailAddressInput"
                                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                    placeholder="Enter email">
                                            </div><!--end col-->

                                        </div><!--end grid-->


                                    </div>
                                </div>



                                <div class="card">
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
                                                    <label for="cvvInput"
                                                        class="inline-block mb-2 text-base font-medium">CVV
                                                        Code</label>
                                                    <input type="text" pattern="\d*" maxlength="3" id="cvvInput"
                                                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                        placeholder="000">
                                                </div><!--end col-->
                                            </div><!--end grid-->
                                        </form>


                                    </div>
                                </div>
                            </div>
                            <div class="xl:col-span-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="mb-4 text-15">Orders Summary</h6>

                                        <div class="overflow-x-auto">
                                            <table class="w-full">
                                                <tbody>
                                                    <tr>
                                                        <td
                                                            class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500">
                                                            <div class="flex items-center gap-3">
                                                                <div
                                                                    class="flex items-center justify-center rounded-md size-12 bg-slate-100 shrink-0">
                                                                    <img src="{{ asset('uploads/kqhahtherapy.jpeg') }}"
                                                                        alt="" class="h-8">
                                                                </div>
                                                                <div class="grow">
                                                                    <h6 class="mb-1 text-15"><a
                                                                            href="apps-ecommerce-product-overview.html"
                                                                            class="transition-all duration-300 ease-linear hover:text-custom-500">Hello
                                                                            Oils</a></h6>
                                                                    <p class="text-slate-500 dark:text-zink-200">
                                                                        $149.99 x
                                                                        02
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500 ltr:text-right rtl:text-left">
                                                            $299.98</td>
                                                    </tr>


                                                    <tr>
                                                        <td
                                                            class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500">
                                                            <div class="flex items-center gap-3">
                                                                <div
                                                                    class="flex items-center justify-center rounded-md size-12 bg-slate-100 shrink-0">
                                                                    <img src="{{ asset('uploads/kqhahtherapy.jpeg') }}"
                                                                        alt="" class="h-8">
                                                                </div>
                                                                <div class="grow">
                                                                    <h6 class="mb-1 text-15"><a
                                                                            href="apps-ecommerce-product-overview.html"
                                                                            class="transition-all duration-300 ease-linear hover:text-custom-500">Butters</a>
                                                                    </h6>
                                                                    <p class="text-slate-500 dark:text-zink-200">$89.99
                                                                        x
                                                                        03
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="px-3.5 py-4 border-b border-dashed first:pl-0 last:pr-0 border-slate-200 dark:border-zink-500 ltr:text-right rtl:text-left">
                                                            $269.97</td>
                                                    </tr>
                                                    <tr>
                                                        <td><hr></td>
                                                        <td><hr></td>
                                                    </tr>

                                                    <tr>
                                                        <td
                                                            class="px-3.5 pt-4 pb-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                            Sub Total
                                                        </td>
                                                        <td
                                                            class="px-3.5 pt-4 pb-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">
                                                            $932.16</td>
                                                    </tr>

                                                    <tr class="font-semibold">
                                                        <td
                                                            class="px-3.5 pt-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                                                            Total Amount (USD)
                                                        </td>
                                                        <td
                                                            class="px-3.5 pt-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">
                                                            $988.09</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="mt-4">
                                            <button type="submit"
                                                class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><span
                                                    class="text-white btn bg-primary">Confirm Order</span> <i
                                                    data-lucide="move-right"
                                                    class="inline-block align-middle size-4 ltr:ml-1 rtl:mr-1 rtl:rotate-180"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection







