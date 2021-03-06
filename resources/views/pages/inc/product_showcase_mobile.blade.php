<div class="row px-3 gap-3 flex-nowrap text-start">
    @foreach ($products as $product)
        @if ($product->type == '0')
            @if ($product->bundle == '1')
                @if ($product->bundle_start <= now() && $product->bundle_end >= now())
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
                                <p class="w-100 font-weight-bold font-gotham text-break mb-1">{{ $product->name }}</p>
                            </div>
                            @if ($product->price_discount[0] != 0)
                                <div class="d-flex mb-3">
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
                                <div class="btn-argavell text-center w-100 py-2 cursor-pointer">See Product</div>
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
                                <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!</div>
                            @endif
                        </div>
                    </a>
                    <div class="mb-3">
                        <div class="w-100" style="height: 50px">
                            <p class="w-100 font-weight-bold font-gotham text-break mb-1">{{ $product->name }}</p>
                        </div>
                        @if ($product->price_discount[0] != 0)
                            <div class="d-flex mb-3">
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
                            <div class="btn-argavell text-center w-100 py-2 cursor-pointer">See Product</div>
                        </a>
                    </div>
                </div>
            @endif
        @endif
    @endforeach
</div>
