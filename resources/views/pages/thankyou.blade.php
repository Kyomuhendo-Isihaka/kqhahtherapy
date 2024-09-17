@extends('layouts.app')

@section('content')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

        <div
            class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

                <div class="row justify-content-center align-items-center">
                    <div class="col-md-8 text-center">
                        <div class="inner_complated">
                            <div class="text-center">
                                <img class="mx-auto" src="{{ asset('uploads/thankyou.png') }}" alt=""
                                    style="height: 200px" width="">
                                </div>
                            <p class="text-centeer">Thank you for ordering with Kqhahtherapy .</p>
                            <div class="btn_cmpted">
                                <a href="{{ route('home') }}" class="btn btn-dark" title="Go To Shop">Continue Shopping
                                </a>
                            </div>
                        </div>
                        <div class="mt-5 ">
                            <h3 class="title">Call Us for Quick Order</h3>
                            <div class="cntct typewriter-effect"><span class="text-red-500"><a href="tel:+96596750535"
                                        id="typewriter_num">+96596750535</a></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
