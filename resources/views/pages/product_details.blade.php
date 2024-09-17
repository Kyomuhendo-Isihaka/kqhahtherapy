@extends('layouts.app')

@php
    $user_id = request()->cookie('user_id')
@endphp
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

                                </div>
                            </div><!--end card-->

                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">

                                <h4><b>{{ $product->name }}</b></h4>
                                <hr>
                                <div class="mt-5">
                                    <h6 class="mb-3 text-15">Product Description:</h6>
                                    <p class="mb-2 text-slate-500 dark:text-zink-200">{{ $product->description }}</p>
                                </div>

                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input hidden type="number" name="product_id" value="{{ $product->id }}">
                                    <input hidden  type="number" name="user_id" value="{{  $user_id}}">


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

                                    <div class="mb-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="mb-1 ">Price</p>

                                                @php
                                                    $prices = json_decode($product->price, true); //
                                                @endphp

                                                @if ($product->category == 'shirts')
                                                    @foreach ($prices as $price)
                                                        <div>
                                                            <h4>$ {{ $price }}</h4>
                                                            <input hidden type="number" name="price" value="{{ $price }}" id="">
                                                        </div>
                                                    @endforeach
                                                @else
                                                    @if (!empty($prices) && is_array($prices))
                                                        <table class="table table-bordered">
                                                            <thead>

                                                            </thead>
                                                            <tbody>
                                                                @foreach ($prices as $priceId)
                                                                    @php
                                                                        $pricing = \App\Models\Pricing::findOrFail(
                                                                            $priceId,
                                                                        ); // Fetch each pricing record
                                                                    @endphp
                                                                    <tr>
                                                                        <td>
                                                                            <input  type="radio" name="price"
                                                                                value="{{ $pricing->price }}" required>
                                                                        </td>
                                                                        <td>{{ $pricing->milliliters }}</td>
                                                                        <td>${{ $pricing->price }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <p>No price available</p>
                                                    @endif

                                                @endif

                                            </div>

                                        </div>
                                    </div>


                                    <div class="row ">
                                        <div class="col-md-4">
                                            <div class="flex items-center gap-2 mt-auto">
                                                <div
                                                    class="inline-flex p-2 text-center border rounded input-step border-slate-200 dark:border-zink-500">
                                                    <button type="button"
                                                        class="border w-7 leading-[15px] minus-value bg-slate-200 dark:bg-zink-600 dark:border-zink-600 rounded transition-all duration-200 ease-linear border-slate-200 text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i
                                                            data-lucide="minus" class="inline-block w-4 h-4"></i></button>
                                                    <input type="number" name="qtybutton"
                                                        class="text-center ltr:pl-2 rtl:pr-2 w-15 h-7 products-quantity dark:bg-zink-700 focus:shadow-none"
                                                        value="1" min="0" max="100" readonly="">

                                                    <button type="button"
                                                        class="transition-all duration-200 ease-linear border rounded border-slate-200 bg-slate-200 dark:bg-zink-600 dark:border-zink-600 w-7 plus-value text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i
                                                            data-lucide="plus" class="inline-block w-4 h-4"></i></button>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-8">

                                            <div class="flex shrink-0">
                                                <button  type="submit"
                                                    class="w-full bg-dark border-dashed text-white btn border-custom-500 hover:text-custom-500 hover:bg-custom-50 hover:border-custom-600 focus:text-custom-600 focus:bg-custom-50 focus:border-custom-600 active:text-custom-600 active:bg-custom-50 active:border-custom-600 dark:bg-zink-700 dark:ring-custom-400/20 dark:hover:bg-custom-800/20 dark:focus:bg-custom-800/20 dark:active:bg-custom-800/20"><i
                                                        data-lucide="shopping-cart"
                                                        class="inline-block align-middle size-3 ltr:mr-1 rtl:ml-1"></i>
                                                    <span class="align-middle">Add to Cart</span></button>
                                            </div>

                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
