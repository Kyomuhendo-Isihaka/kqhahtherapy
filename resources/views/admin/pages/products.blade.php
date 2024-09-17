@extends('admin.layouts.app')

@section('content')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <>{{ $category }}

                @if ($category == 'shirts')
                    <div class="card col-md-9" id="productListTable">
                        <div class="card-body">
                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 xl:grid-cols-12">
                                <div class="xl:col-span-3">
                                    <div class="relative">
                                        <input type="text"
                                            class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                            placeholder="Search for ..." autocomplete="off">
                                        <i data-lucide="search"
                                            class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                                    </div>
                                </div><!--end col-->

                                <div class="lg:col-span-2 ltr:lg:text-right rtl:lg:text-left xl:col-span-2 xl:col-start-11">
                                    <a href="{{ route('products.create', $category) }}" type="button"
                                        class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i
                                            data-lucide="plus" class="inline-block size-4"></i> <span
                                            class="align-middle">Add {{ $category }}</span></a>
                                </div>
                            </div><!--end grid-->
                        </div>
                        <div class="!pt-1 card-body">
                            <div class="overflow-x-auto">
                                <table class="w-full whitespace-nowrap" id="productTable">
                                    <thead class="ltr:text-left rtl:text-right bg-slate-100 dark:bg-zink-600">
                                        <tr>
                                            <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort product_code"
                                                data-sort="product_code">#</th>
                                            <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort product_name"
                                                data-sort="product_name">Product Name</th>
                                            <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort price"
                                                data-sort="price">Price</th>

                                            <th
                                                class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 action">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($products as $product)
                                            <tr>
                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                    {{ $count++ }}
                                                </td>
                                                <td
                                                    class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 product_name">
                                                    <a href="apps-ecommerce-product-overview.html"
                                                        class="flex items-center gap-2">
                                                        <img src="{{ asset('storage/' . $product->image_path) }}"
                                                            alt="Product images" class="h-6">
                                                        <h6 class="product_name">{{ $product->name }}</h6>
                                                    </a>
                                                </td>
                                                <td
                                                    class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 price">
                                                    @php
                                                        $prices = json_decode($product->price, true);
                                                    @endphp
                                                    @foreach ($prices as $price)
                                                        <div>
                                                            $ {{ $price }}
                                                        </div>
                                                    @endforeach
                                                </td>

                                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                    <div class="flex gap-2">
                                                        <div class="edit">
                                                            <button data-modal-target="showModal{{ $product->id }}"
                                                                class="text-slate-400"><i data-lucide="eye"></i></button>
                                                        </div>
                                                        <div class="edit">
                                                            <a href="{{ route('products.edit', [$category, $product->id]) }}"
                                                                data-modal-target="showModal{{ $product->id }}"
                                                                class="text-custom-400"><i data-lucide="edit"></i></a>
                                                        </div>
                                                        <div class="remove">
                                                            <button data-modal-target="deleteModal{{ $product->id }}"
                                                                id="delete-record" class="text-red-500"><i
                                                                    data-lucide="trash"></i></button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                                <div class="noresult" style="display: none">
                                    <div class="py-6 text-center">
                                        <i data-lucide="search"
                                            class="w-6 h-6 mx-auto mb-3 text-sky-500 fill-sky-100 dark:fill-sky-500/20"></i>
                                        <h5 class="mt-2 mb-1">Sorry! No Result Found</h5>
                                        <p class="mb-0 text-slate-500 dark:text-zink-200">We've searched more than 199+
                                            product
                                            We did not find any product for you search.</p>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col col-8">
                            <div class="card col-md-9" id="productListTable">
                                <div class="card-body">
                                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 xl:grid-cols-12">
                                        <div class="xl:col-span-3">
                                            <div class="relative">
                                                <input type="text"
                                                    class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                    placeholder="Search for ..." autocomplete="off">
                                                <i data-lucide="search"
                                                    class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                                            </div>
                                        </div><!--end col-->

                                        <div
                                            class="lg:col-span-2 ltr:lg:text-right rtl:lg:text-left xl:col-span-2 xl:col-start-11">
                                            <a href="{{ route('products.create', $category) }}" type="button"
                                                class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i
                                                    data-lucide="plus" class="inline-block size-4"></i> <span
                                                    class="align-middle">Add {{ $category }}</span></a>
                                        </div>
                                    </div><!--end grid-->
                                </div>
                                <div class="!pt-1 card-body">
                                    <div class="overflow-x-auto">
                                        <table class="w-full whitespace-nowrap" id="productTable">
                                            <thead class="ltr:text-left rtl:text-right bg-slate-100 dark:bg-zink-600">
                                                <tr>
                                                    <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort product_code"
                                                        data-sort="product_code">#</th>
                                                    <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort product_name"
                                                        data-sort="product_name">Product Name</th>
                                                    <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 sort price"
                                                        data-sort="price">Price</th>

                                                    <th
                                                        class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 action">
                                                        Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                @php
                                                    $count = 1;
                                                @endphp
                                                @foreach ($products as $product)
                                                    <tr>
                                                        <td
                                                            class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                            {{ $count++ }}
                                                        </td>
                                                        <td
                                                            class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 product_name">
                                                            <a href="apps-ecommerce-product-overview.html"
                                                                class="flex items-center gap-2">
                                                                <img src="{{ asset('storage/' . $product->image_path) }}"
                                                                    alt="Product images" class="h-6">
                                                                <h6 class="product_name">{{ $product->name }}</h6>
                                                            </a>
                                                        </td>
                                                        <td
                                                            class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 price">

                                                            @php
                                                                $pricings = json_decode($product->price, true);
                                                            @endphp
                                                            @if (!empty($pricings) && is_array($pricings))
                                                                @php
                                                                    $pricing = \App\Models\Pricing::findOrFail(
                                                                        $pricings[0],
                                                                    ); // Fetch the first pricing record
                                                                @endphp
                                                                <p>{{ $pricing->milliliters }} - ${{ $pricing->price }}
                                                                </p>
                                                                <!-- Display the fetched price -->
                                                            @else
                                                                <p>No price available</p>
                                                            @endif
                                                        </td>

                                                        <td
                                                            class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                            <div class="flex gap-2">
                                                                <div class="edit">
                                                                    <button
                                                                        data-modal-target="showModal{{ $product->id }}"
                                                                        class="text-slate-400"><i
                                                                            data-lucide="eye"></i></button>
                                                                </div>
                                                                <div class="edit">
                                                                    <a href="{{ route('products.edit', [$category, $product->id]) }}"
                                                                        data-modal-target="showModal{{ $product->id }}"
                                                                        class="text-custom-400"><i
                                                                            data-lucide="edit"></i></a>
                                                                </div>
                                                                <div class="remove">
                                                                    <button
                                                                        data-modal-target="deleteModal{{ $product->id }}"
                                                                        id="delete-record" class="text-red-500"><i
                                                                            data-lucide="trash"></i></button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>


                                        <div class="noresult" style="display: none">
                                            <div class="py-6 text-center">
                                                <i data-lucide="search"
                                                    class="w-6 h-6 mx-auto mb-3 text-sky-500 fill-sky-100 dark:fill-sky-500/20"></i>
                                                <h5 class="mt-2 mb-1">Sorry! No Result Found</h5>
                                                <p class="mb-0 text-slate-500 dark:text-zink-200">We've searched more than
                                                    199+
                                                    product
                                                    We did not find any product for you search.</p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="col col-4">
                            <div class="card " id="customerList">
                                <div class="card-body">
                                    <div class="grid grid-cols-1 gap-5 mb-5 xl:grid-cols-2">

                                        <div class="ltr:md:text-end rtl:md:text-start">
                                            <button type="button" data-modal-target="showModal"
                                                class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 add-btn"
                                                data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i
                                                    class="align-bottom ri-add-line me-1"></i> Add Pricing</button>

                                        </div>
                                    </div>

                                    <div class="overflow-x-auto">
                                        <table class="w-full whitespace-nowrap" id="customerTable">
                                            <thead class="bg-slate-100 dark:bg-zink-600">
                                                <tr>

                                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                                        data-sort="customer_name">Milliliters</th>
                                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                                        data-sort="email">Price</th>

                                                    <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                                        data-sort="action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach ($prices as $p)
                                                    <tr>

                                                        <td
                                                            class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 customer_name">
                                                            {{ $p->milliliters }}</td>
                                                        <td
                                                            class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 email">
                                                            ${{ $p->price }}</td>


                                                        <td
                                                            class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                                            <div class="flex gap-2">
                                                                <div class="edit">
                                                                    <button
                                                                        data-modal-target="editModal{{ $p->id }}"
                                                                        class="text-custom-400"><i
                                                                            data-lucide="edit"></i></button>
                                                                </div>
                                                                <div class="remove">
                                                                    <button
                                                                        data-modal-target="deleteModal{{ $p->id }}"
                                                                        id="delete-record" class="text-red-500"><i
                                                                            data-lucide="trash"></i></button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <div id="editModal{{ $p->id }}" modal-center=""
                                                        class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
                                                        <div
                                                            class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
                                                            <div
                                                                class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
                                                                <h5 class="text-16" id="exampleModalLabel">Edit Price</h5>
                                                                <button data-modal-close="editModal{{ $p->id }}"
                                                                    class="transition-all duration-200 ease-linear text-slate-400 hover:text-slate-500"><i
                                                                        data-lucide="x" class="size-5"></i></button>
                                                            </div>
                                                            <div
                                                                class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto p-4">
                                                                <form
                                                                    action="{{ isset($p) ? route('pricing.update', $p->id) : route('pricing.store') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @if (isset($p))
                                                                        @method('PUT')
                                                                    @endif

                                                                    <div class="mb-3">
                                                                        <label for="milliliters"
                                                                            class="inline-block mb-2 text-base font-medium">Milliliters
                                                                            <span class="text-red-500">*</span></label>
                                                                        <input type="text" id="milliliters"
                                                                            name="milliliters"
                                                                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                                            placeholder="Enter milliliters"
                                                                            value="{{ isset($p) ? $p->milliliters : old('milliliters') }}"
                                                                            required>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="price"
                                                                            class="inline-block mb-2 text-base font-medium">Price
                                                                            <span class="text-red-500">*</span></label>
                                                                        <input type="number" id="price"
                                                                            name="price"
                                                                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                                                            placeholder="Enter price"
                                                                            value="{{ isset($p) ? $p->price : old('price') }}"
                                                                            required>
                                                                    </div>

                                                                    <div class="flex justify-end gap-2">
                                                                        <button type="button"
                                                                            data-modal-close="showModal"
                                                                            class="text-white btn bg-slate-500 border-slate-500 hover:text-white hover:bg-slate-600"
                                                                            data-modal-close="editModal{{ $p->id }}">Close</button>
                                                                        <button type="submit"
                                                                            class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600"
                                                                            id="submit-btn">
                                                                            {{ isset($p) ? 'Update' : 'Submit' }}
                                                                        </button>
                                                                    </div>
                                                                </form>


                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="deleteModal{{ $p->id }}" modal-center=""
                                                        class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
                                                        <div
                                                            class="w-screen md:w-[25rem] bg-white shadow rounded-md dark:bg-zink-600">
                                                            <div
                                                                class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto px-6 py-8">
                                                                <div class="float-right">
                                                                    <button
                                                                        data-modal-close="deleteModal{{ $p->id }}"
                                                                        id="close-removeNotesModal"
                                                                        class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500"><i
                                                                            data-lucide="x" class="size-5"></i></button>
                                                                </div>
                                                                <img src="data:image/png;base64,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"
                                                                    alt="" class="block h-12 mx-auto">
                                                                <div class="mt-5 text-center">
                                                                    <h5 class="mb-1">Are you sure?</h5>
                                                                    <p class="text-slate-500 dark:text-zink-200">Are you
                                                                        certain you want to delete
                                                                        this
                                                                        record?</p>
                                                                    <form action="{{ route('pricing.destroy', $p->id) }}"
                                                                        method="POST">
                                                                        @csrf

                                                                        @if (isset($p))
                                                                            @method('DELETE')
                                                                        @endif
                                                                        <div class="flex justify-center gap-2 mt-6">
                                                                            <button type="button"
                                                                                data-modal-close="deleteModal{{ $p->id }}"
                                                                                class="bg-white text-slate-500 btn hover:text-slate-500 hover:bg-slate-100 focus:text-slate-500 focus:bg-slate-100 active:text-slate-500 active:bg-slate-100 dark:bg-zink-600 dark:hover:bg-slate-500/10 dark:focus:bg-slate-500/10 dark:active:bg-slate-500/10">Cancel</button>
                                                                            <button type="submit" id="remove-notes"
                                                                                class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">Yes,
                                                                                Delete It!</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        <div class="noresult" style="display: none">
                                            <div class="text-center p-7">
                                                <h5 class="mb-2">Sorry! No Result Found</h5>
                                                <p class="mb-0 text-slate-500 dark:text-zink-200">We've searched more than
                                                    150+
                                                    Orders We did not find any orders for you search.</p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div id="showModal" modal-center=""
                                class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
                                <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
                                    <div
                                        class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
                                        <h5 class="text-16" id="exampleModalLabel">Add Price</h5>
                                        <button data-modal-close="showModal"
                                            class="transition-all duration-200 ease-linear text-slate-400 hover:text-slate-500"><i
                                                data-lucide="x" class="size-5"></i></button>
                                    </div>
                                    <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto p-4">
                                        <form class="tablelist-form" action="{{ route('pricing.store') }}"
                                            method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="milliliters-field"
                                                    class="inline-block mb-2 text-base font-medium">Milliliters <span
                                                        class="text-red-500">*</span></label>
                                                <input type="text" id="milliliters-field" name="milliliters"
                                                    class="form-input" placeholder="Enter milliliters" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="price-field"
                                                    class="inline-block mb-2 text-base font-medium">Price <span
                                                        class="text-red-500">*</span></label>
                                                <input type="number" id="price-field" name="price" class="form-input"
                                                    placeholder="Enter price" required>
                                            </div>

                                            <div class="flex justify-end gap-2">
                                                <button type="button" class="text-white btn bg-slate-500">Close</button>
                                                <button type="submit" class="text-white bg-green-500 btn">Submit</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                @endif


                @foreach ($products as $product)
                    <div id="deleteModal{{ $product->id }}" modal-center=""
                        class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
                        <div class="w-screen md:w-[25rem] bg-white shadow rounded-md dark:bg-zink-600">
                            <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto px-6 py-8">
                                <div class="float-right">
                                    <button data-modal-close="deleteModal{{ $product->id }}" id="close-removeNotesModal"
                                        class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500"><i
                                            data-lucide="x" class="size-5"></i></button>
                                </div>
                                <img src="data:image/png;base64,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"
                                    alt="" class="block h-12 mx-auto">
                                <div class="mt-5 text-center">
                                    <h5 class="mb-1">Are you sure?</h5>
                                    <p class="text-slate-500 dark:text-zink-200">Are you
                                        certain you want to delete
                                        this
                                        record?</p>
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                        @csrf

                                        @if (isset($product))
                                            @method('DELETE')
                                        @endif
                                        <div class="flex justify-center gap-2 mt-6">
                                            <button type="button" data-modal-close="deleteModal{{ $product->id }}"
                                                class="bg-white text-slate-500 btn hover:text-slate-500 hover:bg-slate-100 focus:text-slate-500 focus:bg-slate-100 active:text-slate-500 active:bg-slate-100 dark:bg-zink-600 dark:hover:bg-slate-500/10 dark:focus:bg-slate-500/10 dark:active:bg-slate-500/10">Cancel</button>
                                            <button type="submit" id="remove-notes"
                                                class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">Yes,
                                                Delete It!</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="showModal{{ $product->id }}" modal-center=""
                        class="fixed inset-0 flex flex-col hidden transition-all duration-300 ease-in-out z-drawer show">
                        <div class="flex flex-col w-full h-full bg-white dark:bg-zink-600">
                            <div
                                class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
                                <h5 class="text-16">{{ $product->name }}</h5>
                                <button data-modal-close="showModal{{ $product->id }}"
                                    class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500 dark:text-zink-200 dark:hover:text-red-500"><i
                                        data-lucide="x" class="size-5"></i></button>
                            </div>



                            <div class="row p-4">

                                <div class="col col-6">
                                    <div class="card" style="height: 70vh; overflow: hidden;">
                                        <div class="card-body"
                                            style="display: flex; justify-content: center; align-items: center; padding: 0;">
                                            <img src="{{ asset('storage/' . $product->image_path) }}"
                                                style="max-height: 100%; max-width: 100%; object-fit: contain;"
                                                alt="">
                                        </div>
                                    </div>
                                </div>



                                <div class="col col-6">

                                    @if ($product->category == 'shirts')
                                        <h5>Price : <small>$ {{ json_decode($product->price)[0] }}</small></h5>
                                    @else
                                        <h5>Prices: </h5>
                                        @foreach ($prices as $p)
                                            @if (isset($product) && !empty($product->price) && in_array($p->id, json_decode($product->price)))
                                                {{ $p->milliliters }} - ${{ $p->price }} &nbsp; &nbsp; &nbsp;
                                            @endif
                                        @endforeach
                                    @endif


                                    <h6 class="mt-3">Description:</h6>
                                    <hr>
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>


                            <div
                                class="flex items-center justify-between p-4 mt-auto border-t border-slate-200 dark:border-zink-500">
                                <h5 class="text-16">KqhahTherapy</h5>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{ $products->links('components.pagination') }}
        </div>
    </div>
@endsection
