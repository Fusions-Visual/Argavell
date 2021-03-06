<?php
$subtotal = 0;
$discount = 0;
$totalqty = 0;
if (Auth::user()) {
    foreach (Auth::user()->carts->where('transaction_id', null) as $item) {
        $totalqty += $item->qty;
        $subtotal += $item->price * $item->qty;
        $discount += $item->price_discount * $item->qty;
    }
}
?>

{{-- navbar desktop --}}
<nav class="navbar navbar-expand-md fixed-top navbar-light bg-white shadow-sm d-none d-sm-block">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo-argavell.png') }}" alt="" width="50" height="50"
                class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item position-relative mx-4">
                    <button class="btn btn-normalize d-flex p-0" onclick="toggleOurProductMenu()">
                        <span class="text-argavell font-proxima-nova font-weight-bold me-2">
                            Our Products
                        </span>
                        <img class="dropdown-icon my-auto" src="{{ asset('images/icon-chevron-down-brown.png') }}"
                            style="width: 14px; height: 14px;" alt="chevron-down">
                    </button>
                    <div id="OurProductMenu" class="dropdown-content position-absolute shadow overflow-auto"
                        style="background-color: white; width: 200px; top: 32px; left: 0">
                        @foreach ($allProducts as $index => $product)
                            <a class="d-block text-argavell text-decoration-none text-wrap px-3 py-2  @if ($index == 0) pt-3 @elseif($index == count($allProducts) - 1) pb-3 @endif"
                                href="{{ route('product.show', $product->slug) }}">
                                {{ $product->name }}
                            </a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item mx-4">
                    <a class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer"
                        href="{{ route('page.ourproduct') }}">
                        Shop Now
                    </a>
                </li>
                <li class="nav-item mx-4">
                    <a href="{{ route('page.contactus') }}"
                        class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
                        Contact Us
                    </a>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item mx-4">
                            <a class="text-argavell text-decoration-none font-proxima-nova font-weight-bold"
                                href="{{ route('login') }}">
                                <span class="fa fa-fw fa-user me-2"></span>Login
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item mx-4">
                        <a href="{{ route('user.user.index') }}"
                            class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer">
                            <span class="fa fa-fw fa-user me-2"></span>Hi, {{ Auth::user()->first_name }} !
                        </a>
                    </li>
                    @if (Route::current()->getName() != 'user.cart.index')
                        <li class="nav-item mx-4">
                            <a href="#"
                                class="position-relative text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer"
                                data-bs-toggle="modal" data-bs-target="#cartModal">
                                <span class="fa fa-fw fa-shopping-cart"></span>
                                <div class="d-flex position-absolute rounded-circle"
                                    style="top: -3px; right: -3px; min-width: 14px; height: 14px; background: red;">
                                    <span id="cartQuantityLabel" class="m-auto text-white" style="font-size: 8px;">
                                        {{ $totalqty }}
                                    </span>
                                </div>
                            </a>
                        </li>
                    @endif
                @endguest
            </ul>
        </div>
    </div>
</nav>
{{-- navbar mobile --}}
<div id="navbar-mobile" class="vw-100 vh-100 bg-navbar-mobile position-fixed d-none" style="z-index: 20000">
    <div class="col-12 text-center py-5">
        <img src="{{ asset('images/logo-argavell-white.png') }}" width="100px" class="pb-5 mb-5">
    </div>
    <div class="col-12 text-center my-3">
        <a href="{{ route('page.ourproduct') }}" class="text-decoration-none text-white font-gotham"
            style="display: block;height: 3vh;">Our Product</a>
    </div>
    <div class="col-12 text-center my-3">
        <a href="{{ route('page.contactus') }}" class="text-decoration-none text-white font-gotham"
            style="display: block;height: 3vh;">Contact Us</a>
    </div>
    @guest
        @if (Route::has('login'))
            <div class="col-12 text-center my-3">
                <a class="text-decoration-none text-white font-gotham" href="{{ route('login') }}"
                    style="display: block;height: 3vh;">Login</a>
            </div>
        @endif
    @else
        <div class="col-12 text-center my-3">
            <a class="text-decoration-none text-white font-gotham" href="{{ route('user.user.index') }}"
                style="display: block;height: 3vh;">My Account</a>
        </div>
    @endguest
    <span class="fa fa-fw fa-times position-absolute text-white fs-1" style="top:10px; right:10px;"
        onclick="closeNavbarMobile()"></span>
</div>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top d-block d-sm-none">
    <div class="container px-0">
        <div class="w-25 text-center">
            <button class="navbar-toggler" type="button" data-toggle="collapse" onclick="openNavbarMobile()"
                data-target="#navbarSupportedContentMobile" aria-controls="navbarSupportedContentMobile"
                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <a class="navbar-brand w-25 text-center" href="{{ url('/') }}">
            <img src="{{ asset('images/logo-argavell.png') }}" alt="" width="50" height="50"
                class="d-inline-block align-text-top">
        </a>
        <div class="d-flex w-25 text-center">
            @guest
                @if (Route::has('login'))
                    <a class="text-argavell text-decoration-none font-proxima-nova font-weight-bold mx-1"
                        href="{{ route('login') }}">
                        <span class="text-argavell fa fa-fw fa-user fs-2"></span>
                    </a>
                @endif
            @else
                <a href="{{ route('user.user.index') }}"
                    class="text-argavell text-decoration-none font-proxima-nova font-weight-bold cursor-pointer mx-1">
                    <span class="text-argavell fa fa-fw fa-user fs-2"></span>
                </a>
                @if (Route::current()->getName() != 'user.cart.index')
                    <div class="position-relative">
                        <span class="text-argavell fa fa-fw fa-shopping-cart fs-2" data-bs-toggle="modal"
                            data-bs-target="#cartModalMobile">
                        </span>
                        <div class="d-flex position-absolute rounded-circle"
                            style="top: -3px; right: -3px; min-width: 14px; height: 14px; background: red;">
                            <span id="cartQuantityLabel" class="m-auto text-white" style="font-size: 8px;">
                                {{ $totalqty }}
                            </span>
                        </div>
                    </div>
                @endif
            @endguest
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContentMobile">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
            </ul>
        </div>
    </div>
</nav>


@if (Auth::user())
    {{-- cart modal desktop --}}
    <div class="modal fade p-0" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-cart">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">
                        <span class="text-argavell font-elmessiri fs-3 me-2">Cart</span>
                        <span class="text-secondary fs-6" id="modal-header-qty">{{ $totalqty }}</span>
                        <span class="text-secondary fs-6"> item(s)</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0 pe-0 position-relative" id="cart-body" style="overflow-x: hidden">
                    <div id="cart-loader" class="d-flex d-none justify-content-center">
                        <div class="position-fixed h-100" style="background-color: #fff; opacity: 70%; width: 30vw">
                        </div>
                        <img src="{{ asset('cart-loading.svg') }}" class="position-fixed top-50 translate-middle-y"
                            style="z-index: 100" />
                    </div>
                    @include('inc.cart.product', [
                        'items' => Auth::user()->carts->where('transaction_id', null),
                    ])
                </div>
                <div class="modal-footer ">
                    <div class="col-12 px-3 font-proxima-nova">
                        <div class="d-flex justify-content-between">
                            <div>Subtotal
                                <span class="text-secondary" id="modal-footer-qty">{{ $totalqty }}</span>
                                <span class="text-secondary"> item(s)</span>
                            </div>
                            <div>IDR <span id="cart-subtotal">{{ number_format($subtotal, 0, ',', '.') }}</span></div>
                        </div>
                        <div class="d-flex justify-content-between text-argavell">
                            <div>Discount</div>
                            <div>- IDR <span id="cart-discount">{{ number_format($discount, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between font-weight-bold">
                            <div>Total</div>
                            <div>IDR <span
                                    id="cart-total">{{ number_format($subtotal - $discount, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('user.cart.index') }}" method="get" class="w-100">
                        @csrf
                        <button @if (!count(Auth::user()->carts->where('transaction_id', null)) > 0) disabled @endif
                            class="button-checkout text-decoration-none btn btn-argavell text-center w-100 my-2 py-2 cursor-pointer border-0">
                            Checkout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- cart modal mobile --}}
    <div class="modal fade p-0" id="cartModalMobile" tabindex="-1" aria-labelledby="cartModalMobileLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalMobileLabel">
                        <span class="text-argavell font-elmessiri fs-3 me-2">Cart</span>
                        <span class="text-secondary fs-6" id="modal-header-mobile-qty">{{ $totalqty }}</span>
                        <span class="text-secondary fs-6"> item(s)</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0 pe-0 position-relative" id="cart-mobile-body" style="overflow-x: hidden">
                    <div id="cart-mobile-loader" class="d-flex d-none justify-content-center">
                        <div class="position-fixed start-0 h-100 w-100" style="background-color: #fff; opacity: 70%;">
                        </div>
                        <img src="{{ asset('cart-loading.svg') }}"
                            class="position-fixed top-50 start-50 translate-middle" style="z-index: 100" />
                    </div>
                    @include('inc.cart.product', [
                        'items' => Auth::user()->carts->where('transaction_id', null),
                    ])
                </div>
                <div class="modal-footer ">
                    <div class="col-12 px-3 font-proxima-nova">
                        <div class="d-flex justify-content-between">
                            <div>Subtotal
                                <span class="text-secondary" id="modal-footer-mobile-qty">{{ $totalqty }}</span>
                                <span class="text-secondary">item(s)</span>
                            </div>
                            <div>IDR <span
                                    id="cart-mobile-subtotal">{{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between text-argavell">
                            <div>Discount</div>
                            <div>- IDR <span
                                    id="cart-mobile-discount">{{ number_format($discount, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between font-weight-bold">
                            <div>Total</div>
                            <div>IDR <span
                                    id="cart-mobile-total">{{ number_format($subtotal - $discount, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('user.cart.index') }}" method="get" class="w-100">
                        @csrf
                        <button @if (!count(Auth::user()->carts->where('transaction_id', null)) > 0) disabled @endif
                            class="button-checkout text-decoration-none btn btn-argavell text-center w-100 my-2 py-2 cursor-pointer border-0">
                            Checkout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        Number.prototype.formatMoney = function(decPlaces, thouSeparator, decSeparator) {
            var n = this,
                decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
                decSeparator = decSeparator == undefined ? "." : decSeparator,
                thouSeparator = thouSeparator == undefined ? "," : thouSeparator,
                sign = n < 0 ? "-" : "",
                i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "",
                j = (j = i.length) > 3 ? j % 3 : 0;
            return sign + (j ? i.substr(0, j) + thouSeparator : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" +
                thouSeparator) + (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : "");
        };

        function overQuantity(button) {
            $(button).removeClass('far');
            $(button).addClass('fa');
        }

        function outQuantity(button) {
            $(button).removeClass('fa');
            $(button).addClass('far');
        }

        function deleteItem(id, url) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $('#cart-loader').removeClass('d-none');
            $('#cart-mobile-loader').removeClass('d-none');
            var hostname = "{{ request()->getHost() }}"
            if (hostname.includes('www')) {
                url = "https://" + hostname
            }
            $.post(url + "/cart/" + id, {
                    _token: CSRF_TOKEN,
                    _method: "DELETE",
                    id: id
                })
                .done(function(data) {
                    $('#cartQuantityLabel').html(
                        parseInt($('#cartQuantityLabel').html()) - data['qty']
                    );
                    $('.cart-row' + id).addClass('d-sm-none');
                    $('.cart-mobile-row' + id).addClass('d-none');
                    $('#modal-header-qty').html(parseInt($('#modal-header-qty').html()) - data['qty']);
                    $('#modal-header-mobile-qty').html(parseInt($('#modal-header-mobile-qty').html()) - data['qty']);
                    $('#modal-footer-qty').html(parseInt($('#modal-footer-qty').html()) - data['qty']);
                    $('#modal-footer-mobile-qty').html(parseInt($('#modal-footer-mobile-qty').html()) - data['qty']);
                    subtotal -= parseInt(data['price'] * data['qty']);
                    discount -= parseInt(data['price_discount'] * data['qty']);
                    $('#cart-subtotal').html((subtotal).formatMoney(0, '.', ''));
                    $('#cart-discount').html((discount).formatMoney(0, '.', ''));
                    $('#cart-total').html(parseInt(subtotal - discount).formatMoney(0, '.', ''));
                    $('#cart-mobile-subtotal').html((subtotal).formatMoney(0, '.', ''));
                    $('#cart-mobile-discount').html((discount).formatMoney(0, '.', ''));
                    $('#cart-mobile-total').html(parseInt(subtotal - discount).formatMoney(0, '.', ''));
                    if ($('#cart-total').html() == 0) {
                        $(".button-checkout").prop("disabled", true);
                    } else {
                        $(".button-checkout").prop("disabled", false);
                    }
                })
                .fail(function() {
                    alert('Fail')
                })
                .always(function() {
                    $('#cart-loader').addClass('d-none');
                    $('#cart-mobile-loader').addClass('d-none');
                });
        }

        var subtotal = @json($subtotal);
        var discount = @json($discount);

        function addQuantity(id, url) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $('#cart-loader').removeClass('d-none');
            $('#cart-mobile-loader').removeClass('d-none');
            var hostname = "{{ request()->getHost() }}"
            if (hostname.includes('www')) {
                url = "https://" + hostname
            }
            $.post(url + "/cart/additem", {
                    _token: CSRF_TOKEN,
                    id: id
                })
                .done(function(data) {
                    $('#cartQuantityLabel').html(
                        parseInt($('#cartQuantityLabel').html()) + 1
                    );
                    if (data != 'false') {
                        $('.quantity-counter' + id).html(parseInt($('.quantity-counter' + id).html()) + 1);
                        $('#modal-header-qty').html(parseInt($('#modal-header-qty').html()) + 1);
                        $('#modal-header-mobile-qty').html(parseInt($('#modal-header-mobile-qty').html()) + 1);
                        $('#modal-footer-qty').html(parseInt($('#modal-footer-qty').html()) + 1);
                        $('#modal-footer-mobile-qty').html(parseInt($('#modal-footer-mobile-qty').html()) + 1);
                        subtotal += parseInt(data['price']);
                        discount += parseInt(data['price_discount']);
                        $('#cart-subtotal').html((subtotal).formatMoney(0, '.', ''));
                        $('#cart-discount').html((discount).formatMoney(0, '.', ''));
                        $('#cart-total').html(parseInt(subtotal - discount).formatMoney(0, '.', ''));
                        $('#cart-mobile-subtotal').html((subtotal).formatMoney(0, '.', ''));
                        $('#cart-mobile-discount').html((discount).formatMoney(0, '.', ''));
                        $('#cart-mobile-total').html(parseInt(subtotal - discount).formatMoney(0, '.', ''));
                        if ($('#cart-total').html() == 0) {
                            $(".button-checkout").prop("disabled", true);
                        } else {
                            $(".button-checkout").prop("disabled", false);
                        }
                    }
                })
                .fail(function() {
                    alert('Fail')
                })
                .always(function() {
                    $('#cart-loader').addClass('d-none');
                    $('#cart-mobile-loader').addClass('d-none');
                });
        }

        function subtractQuantity(id, url) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            if (parseInt($('.quantity-counter' + id).html()) > 0) {
                $('#cart-loader').removeClass('d-none');
                $('#cart-mobile-loader').removeClass('d-none');
                var hostname = "{{ request()->getHost() }}"
                if (hostname.includes('www')) {
                    url = "https://" + hostname
                }
                $.post(url + "/cart/subtractitem", {
                        _token: CSRF_TOKEN,
                        id: id
                    })
                    .done(function(data) {
                        $('#cartQuantityLabel').html(
                            parseInt($('#cartQuantityLabel').html()) - 1
                        );
                        $('.quantity-counter' + id).html(parseInt($('.quantity-counter' + id).html()) - 1);
                        $('#modal-header-qty').html(parseInt($('#modal-header-qty').html()) - 1);
                        $('#modal-header-mobile-qty').html(parseInt($('#modal-header-mobile-qty').html()) - 1);
                        $('#modal-footer-qty').html(parseInt($('#modal-footer-qty').html()) - 1);
                        $('#modal-footer-mobile-qty').html(parseInt($('#modal-footer-mobile-qty').html()) - 1);

                        subtotal -= parseInt(data['price']);
                        discount -= parseInt(data['price_discount']);
                        $('#cart-subtotal').html((subtotal).formatMoney(0, '.', ''));
                        $('#cart-discount').html((discount).formatMoney(0, '.', ''));
                        $('#cart-total').html(parseInt(subtotal - discount).formatMoney(0, '.', ''));
                        $('#cart-mobile-subtotal').html((subtotal).formatMoney(0, '.', ''));
                        $('#cart-mobile-discount').html((discount).formatMoney(0, '.', ''));
                        $('#cart-mobile-total').html(parseInt(subtotal - discount).formatMoney(0, '.', ''));
                        if ($('#cart-total').html() == 0) {
                            $(".button-checkout").prop("disabled", true);
                        } else {
                            $(".button-checkout").prop("disabled", false);
                        }
                        if (data['qty'] == 0) {
                            $('.cart-row' + id).addClass('d-sm-none');
                            $('.cart-mobile-row' + id).addClass('d-none');
                        }
                    })
                    .fail(function() {
                        alert('Fail')
                    })
                    .always(function() {
                        $('#cart-loader').addClass('d-none');
                        $('#cart-mobile-loader').addClass('d-none');
                    });
            }
        }

        function addQuantityMobile(id, url) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $('#cart-loader').removeClass('d-none');
            $('#cart-mobile-loader').removeClass('d-none');
            var hostname = "{{ request()->getHost() }}"
            if (hostname.includes('www')) {
                url = "https://" + hostname
            }
            $.post(url + "/cart/additem", {
                    _token: CSRF_TOKEN,
                    id: id
                })
                .done(function(data) {
                    $('#cartQuantityLabel').html(
                        parseInt($('#cartQuantityLabel').html()) + 1
                    );
                    $('.quantity-counter-mobile' + id).html(parseInt($('.quantity-counter-mobile' + id).html()) + 1);
                    $('#modal-header-qty').html(parseInt($('#modal-header-qty').html()) + 1);
                    $('#modal-header-mobile-qty').html(parseInt($('#modal-header-mobile-qty').html()) + 1);
                    $('#modal-footer-qty').html(parseInt($('#modal-footer-qty').html()) + 1);
                    $('#modal-footer-mobile-qty').html(parseInt($('#modal-footer-mobile-qty').html()) + 1);
                    subtotal += parseInt(data['price']);
                    discount += parseInt(data['price_discount']);
                    $('#cart-subtotal').html((subtotal).formatMoney(0, '.', ''));
                    $('#cart-discount').html((discount).formatMoney(0, '.', ''));
                    $('#cart-total').html(parseInt(subtotal - discount).formatMoney(0, '.', ''));
                    $('#cart-mobile-subtotal').html((subtotal).formatMoney(0, '.', ''));
                    $('#cart-mobile-discount').html((discount).formatMoney(0, '.', ''));
                    $('#cart-mobile-total').html(parseInt(subtotal - discount).formatMoney(0, '.', ''));
                    if ($('#cart-total').html() == 0) {
                        $(".button-checkout").prop("disabled", true);
                    } else {
                        $(".button-checkout").prop("disabled", false);
                    }
                })
                .fail(function() {
                    alert('Fail')
                })
                .always(function() {
                    $('#cart-loader').addClass('d-none');
                    $('#cart-mobile-loader').addClass('d-none');
                });
        }

        function subtractQuantityMobile(id, url) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            if (parseInt($('.quantity-counter-mobile' + id).html()) > 0) {
                $('#cart-loader').removeClass('d-none');
                $('#cart-mobile-loader').removeClass('d-none');
                var hostname = "{{ request()->getHost() }}"
                if (hostname.includes('www')) {
                    url = "https://" + hostname
                }
                $.post(url + "/cart/subtractitem", {
                        _token: CSRF_TOKEN,
                        id: id
                    })
                    .done(function(data) {
                        $('#cartQuantityLabel').html(
                            parseInt($('#cartQuantityLabel').html()) - 1
                        );
                        $('.quantity-counter-mobile' + id).html(parseInt($('.quantity-counter-mobile' + id).html()) -
                            1);
                        $('#modal-header-qty').html(parseInt($('#modal-header-qty').html()) - 1);
                        $('#modal-header-mobile-qty').html(parseInt($('#modal-header-mobile-qty').html()) - 1);
                        $('#modal-footer-qty').html(parseInt($('#modal-footer-qty').html()) - 1);
                        $('#modal-footer-mobile-qty').html(parseInt($('#modal-footer-mobile-qty').html()) - 1);

                        subtotal -= parseInt(data['price']);
                        discount -= parseInt(data['price_discount']);
                        $('#cart-subtotal').html((subtotal).formatMoney(0, '.', ''));
                        $('#cart-discount').html((discount).formatMoney(0, '.', ''));
                        $('#cart-total').html(parseInt(subtotal - discount).formatMoney(0, '.', ''));
                        $('#cart-mobile-subtotal').html((subtotal).formatMoney(0, '.', ''));
                        $('#cart-mobile-discount').html((discount).formatMoney(0, '.', ''));
                        $('#cart-mobile-total').html(parseInt(subtotal - discount).formatMoney(0, '.', ''));
                        if ($('#cart-total').html() == 0) {
                            $(".button-checkout").prop("disabled", true);
                        } else {
                            $(".button-checkout").prop("disabled", false);
                        }
                        if (data['qty'] == 0) {
                            $('.cart-row' + id).addClass('d-sm-none');
                            $('.cart-mobile-row' + id).addClass('d-none');
                        }
                    })
                    .fail(function() {
                        alert('Fail')
                    })
                    .always(function() {
                        $('#cart-loader').addClass('d-none');
                        $('#cart-mobile-loader').addClass('d-none');
                    });
            }
        }
    </script>
@endif


<script>
    function openNavbarMobile() {
        $("#navbar-mobile").removeClass('d-none');
        $("#navbar-mobile").addClass('d-block');
    }

    function closeNavbarMobile() {
        $("#navbar-mobile").removeClass('d-block');
        $("#navbar-mobile").addClass('d-none');
    }

    function toggleOurProductMenu() {
        const dropdownContent = $("#OurProductMenu");
        if (dropdownContent.hasClass('active')) {
            $(".dropdown-icon").prop(
                'src',
                '{{ asset('images/icon-chevron-down-brown.png') }}'
            )
            dropdownContent.removeClass('active');
            return;
        }
        $(".dropdown-icon").prop(
            'src',
            '{{ asset('images/icon-chevron-up-brown.png') }}'
        )
        dropdownContent.addClass('active');
    }
</script>
