<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kqhah-therapy</title>
    <link rel="icon" href="{{ asset('uploads/kqhahtherapy.jpeg') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/w3-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <script src="{{ asset('assets/js/layout.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/starcode2.css') }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body
    class="text-base bg-body-bg text-body font-public dark:text-zink-100 dark:bg-zink-800 group-data-[skin=bordered]:bg-body-bordered group-data-[skin=bordered]:dark:bg-zink-700">


    @include('layouts.header')

    <div class="group-data-[sidebar-size=sm]:min-h-sm group-data-[sidebar-size=sm]:relative">

        <div class="bg-white" style="margin-top: 50px">

            @yield('content')
        </div>


    </div>
    <div class="floating-icons">
        <a href="https://wa.me/+96596750535" target="_blank" class="whatsapp-icon">
            <img src="{{ asset('uploads/whatsapp.png') }}" alt="WhatsApp Icon">
        </a>
        <a href="mailto:kqhatherapy9@gmail.com" class="email-icon">
            <img src="{{ asset('uploads/email.png') }}" alt="Email Icon">
        </a>
    </div>


    @include('layouts.footer')

    {{-- <div id="cartSidePenal" drawer-end="" class="fixed inset-y-0 flex flex-col w-full transition-transform duration-300 ease-in-out transform bg-white shadow dark:bg-zink-600 ltr:right-0 rtl:left-0 md:w-96 z-drawer show">
        <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
            <div class="grow">
                <h5 class="mb-0 text-16">Shopping Cart <span class="inline-flex items-center justify-center w-5 h-5 ml-1 text-[11px] font-medium border rounded-full text-white bg-custom-500 border-custom-500">3</span></h5>
            </div>
            <div class="shrink-0">
                <button data-drawer-close="cartSidePenal" class="transition-all duration-150 ease-linear text-slate-500 hover:text-slate-800"><i data-lucide="x" class="size-4"></i></button>
            </div>
        </div>

        <div>
            <div class="h-[calc(150vh_-_370px)] p-4 overflow-y-auto product-list">
                <div class="flex flex-col gap-4">
                    <div class="flex gap-2 product">
                        <div class="flex items-center justify-center w-12 h-12 rounded-md bg-slate-100 shrink-0 dark:bg-zink-500">
                            <img src="{{ asset('uploads/kqhahtherapy.jpeg') }}" alt="" class="h-8">
                        </div>
                        <div class="overflow-hidden grow">
                            <div class="ltr:float-right rtl:float-left">
                                <button class="transition-all duration-150 ease-linear text-slate-500 dark:text-zink-200 hover:text-red-500 dark:hover:text-red-500"><i data-lucide="x" class="size-4"></i></button>
                            </div>
                            <a href="{{ route('product.details', 1) }}" class="transition-all duration-200 ease-linear hover:text-custom-500">
                                <h6 class="mb-1 text-15">Gucii Oils</h6>
                            </a>
                            <div class="flex items-center mb-3">
                                <h5 class="text-base product-price"> $<span>35.5</span></h5>

                            </div>
                            <div class="flex items-center justify-between gap-3">
                                <div class="inline-flex text-center input-step">
                                    <button type="button" class="border w-9 h-9 leading-[15px] minus bg-white dark:bg-zink-700 dark:border-zink-500 ltr:rounded-l rtl:rounded-r transition-all duration-200 ease-linear border-slate-200 text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="minus" class="inline-block size-4"></i></button>
                                    <input type="number" class="w-12 text-center h-9 border-y product-quantity dark:bg-zink-700 focus:shadow-none dark:border-zink-500" value="2" min="0" max="100" readonly="">
                                    <button type="button" class="transition-all duration-200 ease-linear bg-white border dark:bg-zink-700 dark:border-zink-500 ltr:rounded-r rtl:rounded-l w-9 h-9 border-slate-200 plus text-slate-500 dark:text-zink-200 hover:bg-custom-500 dark:hover:bg-custom-500 hover:text-custom-50 dark:hover:text-custom-50 hover:border-custom-500 dark:hover:border-custom-500 focus:bg-custom-500 dark:focus:bg-custom-500 focus:border-custom-500 dark:focus:border-custom-500 focus:text-custom-50 dark:focus:text-custom-50"><i data-lucide="plus" class="inline-block size-4"></i></button>
                                </div>
                                <h6 class="product-line-price">310.64</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="p-4 border-t border-slate-200 dark:border-zink-500">

                <table class="w-full mb-3 ">
                    <tbody class="table-total">
                        <tr>
                            <td class="py-2">Sub Total :</td>
                            <td class="text-right cart-subtotal">$2,847.55</td>
                        </tr>

                        <tr class="font-semibold">
                            <td class="py-2">Total : </td>
                            <td class="text-right cart-total">$2,531.17</td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex items-center justify-between gap-3">
                    <a href="{{ route('home') }}" class="btn btn-dark">Continue Shopping</a>
                    <a href="{{ route('cart') }}" class="btn btn-primary">Proceed to Cart</a>
                </div>
            </div>
        </div>
    </div> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        var navLinks = document.getElementById("navLinks");

        function showMenu() {
            navLinks.style.right = "0";
        }

        function hideMenu() {
            navLinks.style.right = "-200px";
        }
    </script>

    <script src='{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}'></script>
    <script src="{{ asset('assets/libs/%40popperjs/core/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/tippy.js/tippy-bundle.umd.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets/libs/lucide/umd/lucide.js') }}"></script>
    <script src="{{ asset('assets/js/starcode.bundle.js') }}"></script>
    <!--product Grid init js-->
    <script src="{{ asset('assets/js/pages/apps-ecommerce-product-grid.init.js') }}"></script>
    <script src="{{ asset('assets/js/pages/apps-ecommerce-cart.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>



    <script>
        // Function to format date as 'DD - DD MMM, YYYY'
        function formatDateRange(startDate, endDate) {
            const options = {
                day: '2-digit',
                month: 'short',
                year: 'numeric'
            };
            const startDay = startDate.toLocaleDateString('en-US', {
                day: '2-digit'
            });
            const endDay = endDate.toLocaleDateString('en-US', {
                day: '2-digit'
            });
            const monthYear = startDate.toLocaleDateString('en-US', {
                month: 'short',
                year: 'numeric'
            });
            return `${startDay} - ${endDay} ${monthYear}`;
        }

        // Get today's date and calculate start and end dates
        const today = new Date();
        const startDate = new Date(today);
        startDate.setDate(today.getDate() + 3); // Start date 3 days from today
        const endDate = new Date(startDate);
        endDate.setDate(startDate.getDate() + 6); // 7-day range

        // Display the formatted date range
        document.getElementById('event-date').textContent = formatDateRange(startDate, endDate);
    </script>

    {{-- <script>
        // Function to generate a unique integer user ID
        function generateUserId() {
            return Math.floor(Math.random() * 900000) + 100000; // Random 6-digit integer
        }

        // Set cookie
        function setCookie(name, value, days) {
            let expires = "";
            if (days) {
                const date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        // Get cookie
        function getCookie(name) {
            const nameEQ = name + "=";
            const ca = document.cookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        // Check if `user_id` exists in the cookie; if not, create a new one
        function setupUserId() {
            let userId = getCookie('user_id');

            if (!userId) {
                userId = generateUserId();
                setCookie('user_id', userId, 365); // Store for 1 year
            }

            console.log('User ID:', userId);

            // Add the userId to form inputs (if any forms exist)
            let userInput = document.querySelector('input[name="user_id"]');
            if (userInput) {
                userInput.value = userId;
            }
        }

        // Run this function when the page loads
        window.onload = setupUserId;
    </script> --}}




</body>

</html>
