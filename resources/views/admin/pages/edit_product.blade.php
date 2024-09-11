@extends('admin.layouts.app')

@section('content')
    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Edit {{ $product->name }}</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li
                        class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="#!" class="text-slate-400 dark:text-zink-200">Products</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        {{ $category }}
                    </li>
                </ul>
            </div>
            <div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5">
                <div class="xl:col-span-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- <h6 class="mb-4 text-15">Create Product</h6> --}}

                            <form action="{{ route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if (isset($product))
                                    @method('PUT')
                                @endif
                                <input type="hidden" name="category" value="{{ $category }}" id="">
                                <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                                    <div class="xl:col-span-6">
                                        <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Product Name</label>
                                        <input type="text" name="name" id="productNameInput"
                                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                            placeholder="Product name" value="{{ isset($product) ? $product->name : old('name') }}" required>
                                    </div>

                                    @if ($category == 'shirts')
                                        <div class="xl:col-span-6">
                                            <label for="qualityInput" class="inline-block mb-2 text-base font-medium">Colors</label>
                                            <input name="color" type="text" id="productNameInput"
                                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                placeholder="Color" value="{{ isset($product) ? $product->color : old('color') }}">
                                        </div>
                                        <div class="xl:col-span-6">
                                            <div class="inline-block mb-2 text-base font-medium">Size</div>
                                            <div class="flex flex-wrap items-center gap-2">
                                                @php
                                                    $sizes = isset($product) ? json_decode($product->sizes, true) : [];
                                                @endphp
                                                @foreach (['XS', 'S', 'M', 'L', 'XL', '2XL', '3XL'] as $size)
                                                    <div>
                                                        <input id="selectSize{{ $size }}" class="hidden peer" type="checkbox" value="{{ $size }}" name="size[]" {{ in_array($size, $sizes) ? 'checked' : '' }}>
                                                        <label for="selectSize{{ $size }}"
                                                            class="flex items-center justify-center text-xs border rounded-md cursor-pointer size-10 border-slate-200 dark:border-zink-500 peer-checked:bg-custom-50 dark:peer-checked:bg-custom-500/20 peer-checked:border-custom-300 dark:peer-checked:border-custom-700 peer-disabled:bg-slate-50 dark:peer-disabled:bg-slate-500/15 peer-disabled:border-slate-100 dark:peer-disabled:border-slate-800 peer-disabled:cursor-default peer-disabled:text-slate-500 dark:peer-disabled:text-zink-200">{{ $size }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    <div class="lg:col-span-2 xl:col-span-12">
                                        <label for="productImage" class="inline-block mb-2 text-base font-medium">Product Images</label>
                                        <div class="flex items-center justify-center bg-white border border-dashed rounded-md cursor-pointer dropzone border-slate-300 dark:bg-zink-700 dark:border-zink-500 dropzone2">
                                            <div class="fallback">
                                                <input type="file" name="image">
                                            </div>
                                        </div>
                                        @if (isset($product) && $product->image_path)
                                            <div class="mt-3">
                                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="Product Image" class="h-24">
                                            </div>
                                        @endif
                                    </div>

                                    <div class="lg:col-span-2 xl:col-span-12">
                                        <div>
                                            <label for="productDescription" class="inline-block mb-2 text-base font-medium">Description</label>
                                            <textarea name="description"
                                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                id="productDescription" placeholder="Enter Description" rows="5">{{ isset($product) ? $product->description : old('description') }}</textarea>
                                        </div>
                                    </div>

                                    @if ($category == 'shirts')
                                        <div class="xl:col-span-4">
                                            <label for="productPrice" class="inline-block mb-2 text-base font-medium">Price</label>
                                            <input name="productPrices[]" type="number" id="productPrice"
                                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                placeholder="$0.00" value="{{ isset($product) ? json_decode($product->price)[0] : old('productPrices') }}" required>
                                        </div>
                                    @else
                                        <div class="xl:col-span-4">
                                            <label for="productPrice" class="inline-block mb-2 text-base font-medium">Choose Prices</label><br>
                                            @foreach ($prices as $p)
                                                <input name="productPrices[]" type="checkbox" id="productPrice" value="{{ $p->id }}" {{ isset($product) && in_array($p->id, json_decode($product->price)) ? 'checked' : '' }}> {{ $p->milliliters }}-${{ $p->price }} &nbsp; &nbsp; &nbsp;
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <div class="flex justify-end gap-2 mt-4">
                                    <button type="submit"
                                        class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                        {{ isset($product) ? 'Update Product' : 'Create Product' }}
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
