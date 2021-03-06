@extends('layouts.app')

@section('content')
    {{-- desktop --}}
    <div class="row w-100 m-0 align-items-center d-none d-sm-flex">
        <div class="col-md-2"></div>
        <div class="col-md-4 pe-5">
            <img src="{{ asset('images/logo-kleanse.png') }}" width="150px">
            <h1 class="text-kleanse font-gotham font-weight-bold text-9xl">hello!</h1>
            <div class="mb-2">We are your partner in daily sanitary solution, especially in the
                hygiene aspect. we take this matter seriously, and our products are
                created with you in mind especially during these pandemic times.
            </div>
            <div>
                Using selected ingredients that are both qualified and good in
                quality. giving you double moisturizing effect each time you use it,
                perfect for your daily companion.
            </div>
        </div>
        <div class="col-md-4 p-0">
            <img src="{{ asset('images/kleanse-detail-1.png') }}" class="w-100">
        </div>
        <div class="col-md-2"></div>
    </div>
    {{-- product showcase desktop --}}
    <div class="container py-5 mb-5 d-none d-sm-block text-center">
        <h1 class="text-kleanse font-gotham font-weight-bold text-center">get yours now!</h1>
        <h5 class="mb-5 text-center text-secondary">Save up to IDR 20.000 for purchasing bundling promo.</h5>
        <div class="row gap-3 justify-content-md-center">
            @foreach ($products as $product)
                @if ($product->type == '1')
                    @if ($product->bundle == '1')
                        @if ($product->bundle_start <= now() && $product->bundle_end >= now())
                            <div class="col-sm-12 col-md-3 p-0" style="width: 18vw;">
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <div class="landing-product position-relative w-100 mb-3"
                                        style="background-image: url({{ asset('uploads/products/' . $product->img) }})">
                                        @if ($product->price_discount[0] != 0)
                                            <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">
                                                Sale!</div>
                                        @endif
                                    </div>
                                </a>
                                <div style="height:10%" class="mb-3">
                                    <div class="font-weight-bold font-gotham mb-1">{{ $product->name }}</div>
                                    @if ($product->price_discount[0] != 0)
                                        <div class="d-flex justify-content-center font-gotham">
                                            <div class="position-relative">
                                                <span class="text-secondary cross">IDR {{ number_format($product->price[0], 0, ',', '.') }}</span>
                                            </div>
                                            <span class="text-danger font-weight-bold ms-2">IDR
                                                {{ number_format(($product->price[0] - $product->price_discount[0]), 0, ',', '.') }}</span>
                                        </div>
                                    @else
                                        <div class="font-gotham">IDR {{ number_format($product->price[0], 0, ',', '.') }}</div>
                                    @endif
                                </div>
                                <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none">
                                    <div class="text-decoration-none btn-kleanse text-center w-100 py-2 cursor-pointer">See
                                        Product
                                    </div>
                                </a>
                            </div>
                        @endif
                    @else
                        <div class="col-sm-12 col-md-3 p-0" style="width: 18vw;">
                            <a href="{{ route('product.show', $product->slug) }}">
                                <div class="landing-product position-relative w-100 mb-3"
                                    style="background-image: url({{ asset('uploads/products/' . $product->img) }})">
                                    @if ($product->price_discount[0] != 0)
                                        <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!
                                        </div>
                                    @endif
                                </div>
                            </a>
                            <div style="height:10%" class="mb-3">
                                <div class="font-weight-bold font-gotham mb-1">{{ $product->name }}</div>
                                @if ($product->price_discount[0] != 0)
                                    <div class="d-flex justify-content-center font-gotham">
                                        <div class="position-relative">
                                            <span class="text-secondary cross">IDR {{ number_format($product->price[0], 0, ',', '.') }}</span>
                                        </div>
                                        <span class="text-danger font-weight-bold ms-2">IDR
                                            {{ number_format(($product->price[0] - $product->price_discount[0]), 0, ',', '.') }}</span>
                                    </div>
                                @else
                                    <div class="font-gotham">IDR {{ number_format($product->price[0], 0, ',', '.') }}</div>
                                @endif
                            </div>
                            <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none">
                                <div class="text-decoration-none btn-kleanse text-center w-100 py-2 cursor-pointer">See
                                    Product
                                </div>
                            </a>
                        </div>
                    @endif
                @endif
            @endforeach
        </div>
    </div>
    {{-- mobile --}}
    <div class="row w-100 m-0 align-items-center pt-5 d-block d-sm-none text-center">
        <div class="col-12 p-0 mt-5">
            <img src="{{ asset('images/logo-kleanse.png') }}" class="w-25">
        </div>
        <div class="col-md-5">
            <h1 class="text-kleanse font-gotham font-weight-bold text-8xl">hello!</h1>
            <img src="{{ asset('images/kleanse-detail-1.png') }}" class="w-100">
            <div class="mb-2 text-start">We are your partner in daily sanitary solution, especially in the
                hygiene aspect. we take this matter seriously, and our products are
                created with you in mind especially during these pandemic times.
            </div>
            <div class="mb-2 text-start">
                Using selected ingredients that are both qualified and good in
                quality. giving you double moisturizing effect each time you use it,
                perfect for your daily companion.
            </div>
        </div>
    </div>
    <div class="row w-100 p-0 m-0 mb-5">
        <img src="{{ asset('images/kleanse-detail-2.jpg') }}" class="w-100 p-0">
    </div>
    {{-- desktop --}}
    <div class="row w-100 p-0 align-items-center py-5 my-5 d-none d-sm-flex">
        <div class="col-md-1"></div>
        <div class="col-md-6 ps-5 ms-5">
            <h1 class="text-kleanse font-gotham font-weight-bold text-5xl mb-2">making your skin feel safe,</h1>
            <h1 class="text-kleanse font-gotham font-weight-bold text-5xl">free from side effects.</h1>
        </div>
        <div class="col-md-4">
            <ul class="list-unstyled">
                <li class="text-kleanse-dark font-gotham fs-4"><span class="fa fa-fw fa-check me-2"></span>No more dry hands
                </li>
                <li class="text-kleanse-dark font-gotham fs-4"><span class="fa fa-fw fa-check me-2"></span>Good quality
                    ingredients</li>
                <li class="text-kleanse-dark font-gotham fs-4"><span class="fa fa-fw fa-check me-2"></span>Does not irritate
                    skin</li>
                <li class="text-kleanse-dark font-gotham fs-4"><span class="fa fa-fw fa-check me-2"></span>Good fragrance
                </li>
            </ul>
        </div>
        <div class="col-md-1"></div>
    </div>
    {{-- mobile --}}
    <div class="row w-100 p-0 align-items-center mb-5 d-block d-sm-none">
        <div class="col-md-1"></div>
        <div class="col-md-6">
            <h1 class="text-kleanse font-gotham font-weight-bold text-5xl mb-2">making your skin feel safe,</h1>
            <h1 class="text-kleanse font-gotham font-weight-bold text-5xl">free from side effects.</h1>
        </div>
        <div class="col-md-4">
            <ul class="list-unstyled">
                <li class="text-kleanse-dark font-gotham fs-4"><span class="fa fa-fw fa-check me-2"></span>No more dry hands
                </li>
                <li class="text-kleanse-dark font-gotham fs-4"><span class="fa fa-fw fa-check me-2"></span>Good quality
                    ingredients</li>
                <li class="text-kleanse-dark font-gotham fs-4"><span class="fa fa-fw fa-check me-2"></span>Does not irritate
                    skin</li>
                <li class="text-kleanse-dark font-gotham fs-4"><span class="fa fa-fw fa-check me-2"></span>Good fragrance
                </li>
            </ul>
        </div>
        <div class="col-md-1"></div>
    </div>
    {{-- product showcase mobile --}}
    <div class="container pt-5 d-block d-sm-none text-center">
        <h1 class="text-kleanse font-gotham font-weight-bold text-center">get yours now!</h1>
        <h5 class="mb-5 text-center text-secondary">Save up to IDR 20.000 for purchasing bundling promo.</h5>
    </div>
    <div class="container pb-5 mb-5 d-block d-sm-none horizontal-scrollable">
        <div class="row px-3 gap-3 flex-nowrap text-start">
            @foreach ($products as $product)
                @if ($product->type == '1')
                    @if ($product->bundle == '1')
                        @if ($product->bundle_start <= now() && $product->bundle_end >= now())
                            <div class="col-10 p-0">
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <div class="landing-product position-relative w-100 mb-3"
                                        style="background-image: url({{ asset('uploads/products/' . $product->img) }})">
                                        @if ($product->price_discount[0] != 0)
                                            <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">
                                                Sale!</div>
                                        @endif
                                    </div>
                                </a>
                                <div class="mb-3">
                                    <div class="w-100" style="height: 50px">
                                        <p class="w-100 font-weight-bold font-gotham text-break mb-1">
                                            {{ $product->name }}</p>
                                    </div>
                                    @if ($product->price_discount[0] != 0)
                                        <div class="d-flex font-gotham mb-3">
                                            <div class="position-relative">
                                                <span class="text-secondary cross">IDR {{ number_format($product->price[0], 0, ',', '.') }}</span>
                                            </div>
                                            <span class="text-danger font-weight-bold ms-2">IDR
                                                {{ number_format(($product->price[0] - $product->price_discount[0]), 0, ',', '.') }}</span>
                                        </div>
                                    @else
                                        <div class="font-gotham mb-3">IDR {{ number_format($product->price[0], 0, ',', '.') }}</div>
                                    @endif
                                    <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none">
                                        <div class="text-decoration-none btn-kleanse text-center w-100 py-2 cursor-pointer">
                                            See Product</div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="col-10 p-0">
                            <a href="{{ route('product.show', $product->slug) }}">
                                <div class="landing-product position-relative w-100 mb-3"
                                    style="background-image: url({{ asset('uploads/products/' . $product->img) }})">
                                    @if ($product->price_discount[0] != 0)
                                        <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!
                                        </div>
                                    @endif
                                </div>
                            </a>
                            <div class="mb-3">
                                <div class="w-100" style="height: 50px">
                                    <p class="w-100 font-weight-bold font-gotham text-break mb-1">{{ $product->name }}
                                    </p>
                                </div>
                                @if ($product->price_discount[0] != 0)
                                    <div class="d-flex font-gotham mb-3">
                                        <div class="position-relative">
                                            <span class="text-secondary cross">IDR {{ number_format($product->price[0], 0, ',', '.') }}</span>
                                        </div>
                                        <span class="text-danger font-weight-bold ms-2">IDR
                                            {{ number_format(($product->price[0] - $product->price_discount[0]), 0, ',', '.') }}</span>
                                    </div>
                                @else
                                    <div class="font-gotham mb-3">IDR {{ number_format($product->price[0], 0, ',', '.') }}</div>
                                @endif
                                <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none">
                                    <div class="text-decoration-none btn-kleanse text-center w-100 py-2 cursor-pointer">See
                                        Product</div>
                                </a>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
        </div>
    </div>
    <div class="row w-100 landing-showcase-background text-center py-5 m-0 position-relative" style="height:45vh;">
        <img src="{{ asset('images/kleanse-detail-3.jpg') }}" class="d-block w-100 position-absolute top-0 p-0"
            style="height: 100%;object-fit: cover;">
        <div class="position-absolute top-50 start-50 translate-middle" style="z-index: 11;">
            <h1 class="font-gotham text-white my-5 font-weight-bold">which kleanse product made you<br>fall in love?</h1>
            {{-- <h1 class="font-gotham text-white my-5 font-weight-bold" style="
            text-shadow: 2px 2px #000;">which kleanse product made you<br>fall in love?</h1> --}}
            <a href="#" class="text-decoration-none d-none d-sm-block">
                <div class="btn-kleanse text-center w-25 py-2 cursor-pointer mx-auto mb-5 font-weight-bold">Browse Products
                </div>
            </a>
            <a href="#" class="text-decoration-none d-block d-sm-none">
                <div class="btn-kleanse text-center w-50 py-2 cursor-pointer mx-auto mb-5 font-weight-bold">Browse Products
                </div>
            </a>
        </div>
    </div>
@endsection
