<header class="bg-white shadow-sm fixed-top">
    <div class="container-fluid p-1 w3-black">
        kqhahTherapy
        <div class="float-right">
            <span><a href="https://wa.me/+96596750535" class="text-white"><i class="fab fa-whatsapp mr-3"
                        style="font-size:20px"></i></a></span>
            <span><a href="mailto:kqhatherapy9@gmail.com" class="text-white"><i class="fas fa-envelope mr-3"
                        style="font-size:20px"></i></a></span>
            <span><a href="https://www.instagram.com/kqhah_therapy?igsh=ZmJxOXZoYTA2NjQ3" class="text-white"><i
                        class="fab fa-instagram mr-3" style="font-size:20px"></i></a></span>
            <span><a class="text-white" href="https://www.facebook.com/profile.php?id=61559937748097&mibextid=LQQJ4d"><i
                        class="fab fa-facebook mr-2" style="font-size:20px"></i></a></span>

        </div>
    </div>


    @php
        $pricings = \App\Models\Pricing::all();
        $oils = \App\Models\Product::where('category', 'oils')->get();
        $butters = \App\Models\Product::where('category', 'butters')->get();
    @endphp
    <div class="container d-flex justify-content-between align-items-center py-3">
        <a href="{{ route('home') }}" class="d-flex align-items-center text-decoration-none">
            <img src="{{ asset('uploads/kqhahtherapy.jpeg') }}" width="40" class="mr-2" alt="hakateq Logo">
            <span class="font-weight-bold text-app"></span>
        </a>

        <div
            class="relative hidden ltr:ml-3 rtl:mr-3 lg:block group-data-[layout=horizontal]:hidden  group-data-[layout=horizontal]:lg:block">
            <input type="text"
                class="py-2 pl-4 text-sm text-topbar-item bg-topbar border border-topbar-border rounded pl-8 placeholder:text-slate-400 form-control focus-visible:outline-0 min-w-[300px] focus:border-blue-400 group-data-[topbar=dark]:bg-topbar-dark group-data-[topbar=dark]:border-topbar-border-dark group-data-[topbar=dark]:placeholder:text-slate-500 group-data-[topbar=dark]:text-topbar-item-dark group-data-[topbar=brand]:bg-topbar-brand group-data-[topbar=brand]:border-topbar-border-brand group-data-[topbar=brand]:placeholder:text-blue-300 group-data-[topbar=brand]:text-topbar-item-brand group-data-[topbar=dark]:dark:bg-zink-700 group-data-[topbar=dark]:dark:border-zink-500 group-data-[topbar=dark]:dark:text-zink-100"
                placeholder="Search for ..." autocomplete="off">
            <i data-lucide="search"
                class="inline-block size-4 absolute left-2.5 top-2.5 text-topbar-item fill-slate-100 group-data-[topbar=dark]:fill-topbar-item-bg-hover-dark group-data-[topbar=dark]:text-topbar-item-dark group-data-[topbar=brand]:fill-topbar-item-bg-hover-brand group-data-[topbar=brand]:text-topbar-item-brand group-data-[topbar=dark]:dark:text-zink-200 group-data-[topbar=dark]:dark:fill-zink-600"></i>
        </div>

        <!-- For larger devices -->
        <nav class="d-none d-md-flex">
            <a href="{{ route('home') }}" class="nav-link text-dark mx-2">Home</a>


            <ul class="nav">
                <li class="dropdown nav-item">

                    <a href="{{ route('products.category', 'oils') }}" class="nav-link text-dark mx-2" role="button"
                        aria-haspopup="true" aria-expanded="false">Oils</a>
                    <ul class="dropdown-menu mx-auto ml-auto" style="width: 60vw">
                        <div class="container p-1">
                            <h6 class="text-center">Oils</h6>
                            <div class="bg-light p-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p>Price filters</p>
                                        @foreach ($pricings as $p)
                                            <a href="" class="text-dark">{{ $p->milliliters }}-
                                                ${{ $p->price }}</a><br>
                                        @endforeach

                                    </div>
                                    <div class="col-md-9">
                                        <p>Available oils</p>
                                        @foreach ($oils as $ol)
                                            <a href="{{ route('product.details', $ol->id) }}"
                                                class="text-dark"><small>{{ $ol->name }}</small></a>&nbsp;
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </li>

                <li class="dropdown nav-item">

                    <a href="{{ route('products.category', 'butters') }}" class="nav-link text-dark mx-2" role="button"
                        aria-haspopup="true" aria-expanded="false">Butters</a>
                    <ul class="dropdown-menu mx-auto ml-auto" style="width: 60vw">
                        <div class="container p-1">
                            <h6 class="text-center">Butters</h6>
                            <div class="bg-light p-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p>Price filters</p>
                                        @foreach ($pricings as $p)
                                            <a href="" class="text-dark">{{ $p->milliliters }}-
                                                ${{ $p->price }}</a><br>
                                        @endforeach
                                    </div>
                                    <div class="col-md-9">
                                        <p>Available Butters</p>
                                        @foreach ($butters as $bt)
                                            <a href="{{ route('product.details', $bt->id) }}"
                                                class="text-dark"><small>{{ $bt->name }}</small></a>&nbsp;
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </li>

                <li class="dropdown nav-item">

                    <a href="{{ route('products.category', 'shirts') }}" class="nav-link text-dark mx-2" role="button"
                        aria-haspopup="true" aria-expanded="false">Shirts</a>
                    {{-- <ul class="dropdown-menu mx-auto ml-auto" style="width: 60vw">
                        <div class="container p-1">
                            <h6 class="text-center">Shirts</h6>
                        </div>
                    </ul> --}}
                </li>

                <li>

                    <a href="{{ route('cart') }}"
                        class="inline-flex relative justify-center items-center p-0 text-topbar-item transition-all w-[37.5px] h-[37.5px] duration-200 ease-linear bg-topbar rounded-md btn hover:bg-topbar-item-bg-hover hover:text-topbar-item-hover group-data-[topbar=dark]:bg-topbar-dark group-data-[topbar=dark]:hover:bg-topbar-item-bg-hover-dark group-data-[topbar=dark]:hover:text-topbar-item-hover-dark group-data-[topbar=brand]:bg-topbar-brand group-data-[topbar=brand]:hover:bg-topbar-item-bg-hover-brand group-data-[topbar=brand]:hover:text-topbar-item-hover-brand group-data-[topbar=dark]:dark:bg-zink-700 group-data-[topbar=dark]:dark:hover:bg-zink-600 group-data-[topbar=brand]:text-topbar-item-brand group-data-[topbar=dark]:dark:hover:text-zink-50 group-data-[topbar=dark]:dark:text-zink-200 group-data-[topbar=dark]:text-topbar-item-dark">
                        <i data-lucide="shopping-cart"
                            class="inline-block w-5 h-5 stroke-1 fill-slate-100 group-data-[topbar=dark]:fill-topbar-item-bg-hover-dark group-data-[topbar=brand]:fill-topbar-item-bg-hover-brand"></i>
                        <span
                            class="absolute flex items-center justify-center w-[16px] h-[16px] text-xs text-white bg-red-500 border-white rounded-full -top-1 -right-1">3</span>
                    </a>

                </li>
            </ul>


        </nav>






        <!-- For small devices -->


        <a href="{{ route('products.category', 'oils') }}" class="nav-link d-md-none text-dark"
            aria-controls="mobileMenu">Oils</a>
        <a href="{{ route('products.category', 'butters') }}" class="nav-link d-md-none text-dark"
            aria-controls="mobileMenu">Butters</a>
        <a href="{{ route('products.category', 'shirts') }}" class="nav-link d-md-none text-dark"
            aria-controls="mobileMenu">Shirts</a>

        <a href="{{ route('cart') }}"
            class="d-md-none inline-flex relative justify-center items-center p-0 text-topbar-item transition-all w-[37.5px] h-[37.5px] duration-200 ease-linear bg-topbar rounded-md btn hover:bg-topbar-item-bg-hover hover:text-topbar-item-hover group-data-[topbar=dark]:bg-topbar-dark group-data-[topbar=dark]:hover:bg-topbar-item-bg-hover-dark group-data-[topbar=dark]:hover:text-topbar-item-hover-dark group-data-[topbar=brand]:bg-topbar-brand group-data-[topbar=brand]:hover:bg-topbar-item-bg-hover-brand group-data-[topbar=brand]:hover:text-topbar-item-hover-brand group-data-[topbar=dark]:dark:bg-zink-700 group-data-[topbar=dark]:dark:hover:bg-zink-600 group-data-[topbar=brand]:text-topbar-item-brand group-data-[topbar=dark]:dark:hover:text-zink-50 group-data-[topbar=dark]:dark:text-zink-200 group-data-[topbar=dark]:text-topbar-item-dark">
            <i data-lucide="shopping-cart"
                class="inline-block w-5 h-5 stroke-1 fill-slate-100 group-data-[topbar=dark]:fill-topbar-item-bg-hover-dark group-data-[topbar=brand]:fill-topbar-item-bg-hover-brand"></i>
            <span
                class="absolute flex items-center justify-center w-[16px] h-[16px] text-xs text-white bg-red-500 border-white rounded-full -top-1 -right-1">3</span>
        </a>


        {{-- <button class="navbar-toggler d-md-none" type="button" data-toggle="collapse" data-target="#mobileMenu"
            aria-controls="mobileMenu" aria-expanded="false" >
            <i class="fas fa-bars"></i>
        </button> --}}
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="collapse navbar-collapse">
        <div class="container py-3">
            <a href="" class="nav-link text-dark">Home</a>
            <a href="" class="nav-link text-dark">Home</a>
            <a href="" class="nav-link text-dark">Home</a>
            <a href="" class="nav-link text-dark">Home</a>
        </div>
    </div>
</header>
