@extends('layouts.app')

@section('content')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

        <div
            class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">


                <div class=" row">
                    <div class="col-md-4">
                        <div class="sticky top-[calc(theme('spacing.header')_*_1.3)] mb-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="grid grid-cols-1 gap-5 md:grid-cols-12">
                                        <div class="rounded-md md:col-span-12 md:row-span-2 bg-slate-100 dark:bg-zink-600">
                                            <img src="{{ asset('storage/' . $product->image_path) }}" alt=""
                                                width="100%" style="height: 250px">
                                        </div>


                                    </div>
                                    <div class="text-center">
                                        <p>{{ $product->name }}</p>
                                    </div>

                                    <div class="flex gap-2 mt-4 shrink-0">
                                        <a href="" type="button"
                                            class="w-full bg-dark border-dashed text-white btn border-custom-500 hover:text-custom-500 hover:bg-custom-50 hover:border-custom-600 focus:text-custom-600 focus:bg-custom-50 focus:border-custom-600 active:text-custom-600 active:bg-custom-50 active:border-custom-600 dark:bg-zink-700 dark:ring-custom-400/20 dark:hover:bg-custom-800/20 dark:focus:bg-custom-800/20 dark:active:bg-custom-800/20"><i
                                                data-lucide="shopping-cart"
                                                class="inline-block align-middle size-3 ltr:mr-1 rtl:ml-1"></i> <span
                                                class="align-middle">Add to Cart</span></a>
                                    </div>


                                </div>
                            </div><!--end card-->

                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">



                                <div class="mb-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="mb-1 ">Price</p>

                                            @php
                                                $prices = json_decode($product->price, true); //
                                            @endphp

                                            @if ($product->category == 'shirts')
                                                @foreach ($prices as $price)
                                                    <div>
                                                        <h4>$ {{ $price }}</h4>
                                                    </div>
                                                @endforeach
                                            @else
                                                @if (!empty($prices) && is_array($prices))
                                                    @php
                                                        $pricing = \App\Models\Pricing::findOrFail($prices[0]); // Fetch the first pricing record
                                                    @endphp
                                                    <h4>{{ $pricing->milliliters }} - ${{ $pricing->price }}</h4>
                                                    <!-- Display the fetched price -->
                                                @else
                                                    <p>No price available</p>
                                                @endif
                                            @endif

                                        </div>

                                        @if ($product->category != 'shirts')
                                            <div class="col-md-6">
                                                <p class="mb-1 ">Alternative Price</p>

                                                


                                            </div>
                                        @endif
                                    </div>
                                </div>

                                {{-- @if ($category == 'shirts')
                                    <h6 class="mb-3 text-15">Available Color</h6>
                                    <div class="flex flex-wrap items-center gap-2">
                                        <input id="color1"
                                            class="border rounded-sm appearance-none cursor-pointer size-5 border-custom-500 bg-custom-500 checked:bg-custom-500 checked:border-custom-500 disabled:opacity-75 disabled:cursor-default"
                                            type="radio" name="SelectColor" value="" disabled="">
                                        <input id="color2"
                                            class="bg-red-300 border border-red-300 rounded-sm appearance-none cursor-pointer size-5 checked:bg-red-300 checked:border-red-300 disabled:opacity-75 disabled:cursor-default"
                                            type="radio" name="SelectColor" value="">
                                        <input id="color3"
                                            class="bg-green-300 border border-green-300 rounded-sm appearance-none cursor-pointer size-5 checked:bg-green-300 checked:border-green-300 disabled:opacity-75 disabled:cursor-default"
                                            type="radio" name="SelectColor" value="">
                                        <input id="color4"
                                            class="border rounded-sm appearance-none cursor-pointer size-5 border-slate-500 bg-slate-500 checked:bg-slate-500 checked:border-slate-500 disabled:opacity-75 disabled:cursor-default"
                                            type="radio" name="SelectColor" value="">
                                        <input id="color5"
                                            class="bg-purple-500 border border-purple-500 rounded-sm appearance-none cursor-pointer size-5 checked:bg-purple-500 checked:border-purple-500 disabled:opacity-75 disabled:cursor-default"
                                            type="radio" name="SelectColor" value="">
                                        <input id="color6"
                                            class="border rounded-sm appearance-none cursor-pointer size-5 bg-sky-500 border-sky-500 checked:bg-sky-500 checked:border-sky-500 disabled:opacity-75 disabled:cursor-default"
                                            type="radio" name="SelectColor" value="">
                                        <input id="color7"
                                            class="bg-yellow-500 border border-yellow-500 rounded-sm appearance-none cursor-pointer size-5 checked:bg-yellow-500 checked:border-yellow-500 disabled:opacity-75 disabled:cursor-default"
                                            type="radio" name="SelectColor" value="">
                                        <input id="color7"
                                            class="bg-green-500 border border-green-500 rounded-sm appearance-none cursor-pointer size-5 checked:bg-green-500 checked:border-green-500 disabled:opacity-75 disabled:cursor-default"
                                            type="radio" name="SelectColor" value="">
                                        <input id="color8"
                                            class="border rounded-sm appearance-none cursor-pointer size-5 bg-slate-800 border-slate-800 checked:bg-slate-800 checked:border-slate-800 disabled:opacity-75 disabled:cursor-default"
                                            type="radio" name="SelectColor" value="">
                                        <input id="color9"
                                            class="border rounded-sm appearance-none cursor-pointer size-5 bg-slate-200 border-slate-200 checked:bg-slate-200 checked:border-slate-200 disabled:opacity-75 disabled:cursor-default"
                                            type="radio" name="SelectColor" value="">
                                        <input id="color10"
                                            class="border rounded-sm appearance-none cursor-pointer size-5 bg-emerald-300 border-embg-emerald-300 checked:bg-emerald-300 checked:border-embg-emerald-300 disabled:opacity-75 disabled:cursor-default"
                                            type="radio" name="SelectColor" value="">
                                    </div>

                                    <h6 class="mt-5 mb-3 text-15">Available Size</h6>
                                    <div class="flex flex-wrap items-center gap-2">
                                        <div>
                                            <input id="selectSizeXS" class="hidden peer" type="radio" value="XS"
                                                name="selectSize">
                                            <label for="selectSizeXS"
                                                class="flex items-center justify-center w-8 h-8 text-xs border rounded-md cursor-pointer border-slate-200 dark:border-zink-500 peer-checked:bg-custom-50 dark:peer-checked:bg-custom-500/20 peer-checked:border-custom-300 dark:peer-checked:border-custom-700 peer-disabled:bg-slate-50 dark:peer-disabled:bg-slate-500/20 peer-disabled:border-slate-100 dark:peer-disabled:border-slate-800 peer-disabled:cursor-default peer-disabled:text-slate-500 dark:peer-disabled:text-zink-200">XS</label>
                                        </div>
                                        <div>
                                            <input id="selectSizeS" class="hidden peer" type="radio" value="S"
                                                name="selectSize" checked="">
                                            <label for="selectSizeS"
                                                class="flex items-center justify-center w-8 h-8 text-xs border rounded-md cursor-pointer border-slate-200 dark:border-zink-500 peer-checked:bg-custom-50 dark:peer-checked:bg-custom-500/20 peer-checked:border-custom-300 dark:peer-checked:border-custom-700 peer-disabled:bg-slate-50 dark:peer-disabled:bg-slate-500/20 peer-disabled:border-slate-100 dark:peer-disabled:border-slate-800 peer-disabled:cursor-default peer-disabled:text-slate-500 dark:peer-disabled:text-zink-200">S</label>
                                        </div>
                                        <div>
                                            <input id="selectSizeM" class="hidden peer" type="radio" value="M"
                                                name="selectSize" disabled="">
                                            <label for="selectSizeM"
                                                class="flex items-center justify-center w-8 h-8 text-xs border rounded-md cursor-pointer border-slate-200 dark:border-zink-500 peer-checked:bg-custom-50 dark:peer-checked:bg-custom-500/20 peer-checked:border-custom-300 dark:peer-checked:border-custom-700 peer-disabled:bg-slate-50 dark:peer-disabled:bg-slate-500/20 peer-disabled:border-slate-100 dark:peer-disabled:border-slate-800 peer-disabled:cursor-default peer-disabled:text-slate-500 dark:peer-disabled:text-zink-200">M</label>
                                        </div>
                                        <div>
                                            <input id="selectSizeL" class="hidden peer" type="radio" value="L"
                                                name="selectSize">
                                            <label for="selectSizeL"
                                                class="flex items-center justify-center w-8 h-8 text-xs border rounded-md cursor-pointer border-slate-200 dark:border-zink-500 peer-checked:bg-custom-50 dark:peer-checked:bg-custom-500/20 peer-checked:border-custom-300 dark:peer-checked:border-custom-700 peer-disabled:bg-slate-50 dark:peer-disabled:bg-slate-500/20 peer-disabled:border-slate-100 dark:peer-disabled:border-slate-800 peer-disabled:cursor-default peer-disabled:text-slate-500 dark:peer-disabled:text-zink-200">L</label>
                                        </div>
                                        <div>
                                            <input id="selectSizeXL" class="hidden peer" type="radio" value="XL"
                                                name="selectSize">
                                            <label for="selectSizeXL"
                                                class="flex items-center justify-center w-8 h-8 text-xs border rounded-md cursor-pointer border-slate-200 dark:border-zink-500 peer-checked:bg-custom-50 dark:peer-checked:bg-custom-500/20 peer-checked:border-custom-300 dark:peer-checked:border-custom-700 peer-disabled:bg-slate-50 dark:peer-disabled:bg-slate-500/20 peer-disabled:border-slate-100 dark:peer-disabled:border-slate-800 peer-disabled:cursor-default peer-disabled:text-slate-500 dark:peer-disabled:text-zink-200">XL</label>
                                        </div>
                                        <div>
                                            <input id="selectSize2XL" class="hidden peer" type="radio" value="2XL"
                                                name="selectSize">
                                            <label for="selectSize2XL"
                                                class="flex items-center justify-center w-8 h-8 text-xs border rounded-md cursor-pointer border-slate-200 dark:border-zink-500 peer-checked:bg-custom-50 dark:peer-checked:bg-custom-500/20 peer-checked:border-custom-300 dark:peer-checked:border-custom-700 peer-disabled:bg-slate-50 dark:peer-disabled:bg-slate-500/20 peer-disabled:border-slate-100 dark:peer-disabled:border-slate-800 peer-disabled:cursor-default peer-disabled:text-slate-500 dark:peer-disabled:text-zink-200">2XL</label>
                                        </div>
                                    </div>
                                @endif --}}




                                <div class="mt-5">
                                    <h6 class="mb-3 text-15">Product Description:</h6>
                                    <p class="mb-2 text-slate-500 dark:text-zink-200">{{ $product->description }}</p>
                                </div>

                                @if ($product->category == 'shirts')
                                    <div class="mt-5">
                                        <h6 class="mb-3 text-15">Features:</h6>
                                        <div class="overflow-x-auto">
                                            <table class="w-full">
                                                <tbody>
                                                    <tr>
                                                        <th
                                                            class="px-3.5 py-2.5 font-semibold border-b border-transparent w-64 ltr:text-left rtl:text-right text-slate-500 dark:text-zink-200">
                                                            Color:</th>
                                                        <td class="px-3.5 py-2.5 border-b border-transparent">
                                                            {{ $product->color }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th
                                                            class="px-3.5 py-2.5 font-semibold border-b border-transparent w-64 ltr:text-left rtl:text-right text-slate-500 dark:text-zink-200">
                                                            Size :</th>
                                                        <td class="px-3.5 py-2.5 border-b border-transparent">

                                                            @php
                                                                // Decode sizes from the product or default to an empty array
                                                                $sizes = isset($product)
                                                                    ? json_decode($product->sizes, true)
                                                                    : [];
                                                            @endphp
                                                            <div class="flex flex-wrap gap-2">
                                                                <!-- Container with horizontal flex layout -->
                                                                @foreach (['XS', 'S', 'M', 'L', 'XL', '2XL', '3XL'] as $size)
                                                                    @if (in_array($size, $sizes))
                                                                        <div class="flex items-center">
                                                                            <!-- Each size item -->

                                                                            <label for="selectSize{{ $size }}"
                                                                                class="flex items-center justify-center text-xs border rounded-md cursor-pointer size-10 border-slate-200 dark:border-zink-500 peer-checked:bg-custom-50 dark:peer-checked:bg-custom-500/20 peer-checked:border-custom-300 dark:peer-checked:border-custom-700 peer-disabled:bg-slate-50 dark:peer-disabled:bg-slate-500/15 peer-disabled:border-slate-100 dark:peer-disabled:border-slate-800 peer-disabled:cursor-default peer-disabled:text-slate-500 dark:peer-disabled:text-zink-200">
                                                                                {{ $size }}
                                                                            </label>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                @endif
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

