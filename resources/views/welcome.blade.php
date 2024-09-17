@extends('layouts.app')


@section('content')

    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
        <img src="{{ asset('uploads/kqha_baner.jpg') }}" alt=""
        style=" width: 100%;
    background-size: cover;
    background-position: center; margin-top:100px;">
        <div
            class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">

            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">


                <div class="grid grid-cols-1 2xl:grid-cols-12 gap-x-5 ">


<div class="2xl:col-span-9">
                        <div class="flex flex-wrap items-center gap-2">
                            <h4 class="grow text-center">Explore Our Products</h4>

                        </div>


                        <div class="grid grid-cols-1 mt-5 md:grid-cols-4 [&.gridView]:grid-cols-1 xl:grid-cols-4 group [&.gridView]:xl:grid-cols-1 gap-x-5"
                            id="cardGridView">

                            @foreach ($products as $product)
                                <div class="card md:group-[.gridView]:flex relative">

                                    <img src="{{ asset('storage/' . $product->image_path) }}" alt=""
                                        style="height: 200px">

                                    <div
                                        class="card-body !pt-0 md:group-[.gridView]:flex group-[.gridView]:!p-3 group-[.gridView]:gap-3 group-[.gridView]:grow">
                                        <div class="group-[.gridView]:grow text-center">
                                            <h6
                                                class="mb-1 truncate transition-all duration-200 ease-linear text-15 hover:text-custom-500">
                                                <a href="{{ route('product.details', $product->id) }}"
                                                    class="nav-link">{{ $product->name }}</a>
                                            </h6>

                                            @php
                                                $prices = json_decode($product->price, true); //
                                            @endphp

                                            @if ($product->category == 'shirts')
                                                @foreach ($prices as $price)
                                                    <div>
                                                        $ {{ $price }}
                                                    </div>
                                                @endforeach
                                            @else
                                                <div>
                                                    @if (!empty($prices) && is_array($prices))
                                                        @php
                                                            $pricing = \App\Models\Pricing::findOrFail($prices[0]); // Fetch the first pricing record
                                                        @endphp
                                                        <p>{{ $pricing->milliliters }} - ${{ $pricing->price }}</p>
                                                        <!-- Display the fetched price -->
                                                    @else
                                                        <p>No price available</p>
                                                    @endif
                                                </div>
                                            @endif

                                        </div>


                                    </div>
                                </div>
                            @endforeach

                            {{ $products->links('components.pagination') }}

                        </div>

                    </div>
                </div>
                <!--end grid-->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
@endsection
