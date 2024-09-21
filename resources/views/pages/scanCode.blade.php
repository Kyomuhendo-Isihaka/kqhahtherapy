@extends('layouts.app')

@section('content')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">

        <div
            class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
            <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">                        
                        <iframe style="width:100%;height:500px" src="https://cash.app/$TLewis25"></iframe>
                    </div>
                    <div class="col-md-4">
                        <form action="{{ route('customer.transactionID') }}" method="post">
                            @csrf
                            <h4>Confirm your transaction here</h4>
                            <input type="text" name="order_id" value="{{ $orderId }}" hidden>
                            <label for="">Enter the last five digits of transaction ID</label>
                            <input type="text" name="transaction_id" placeholder="**********56455" minlength="5" maxlength="5" class="form-control" reqiured>
                            <input type="submit" class="btn btn-dark mt-2 w-100" name="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
