<div class="row gap-3 justify-content-md-center">
    @foreach ($products as $product)
        @if ($product->type == '0')
            <div class="col-sm-12 col-md-3 p-0" style="width: 18vw;">
                <a href="{{ route('product.show', $product->slug) }}">
                    <div class="landing-product position-relative w-100 mb-3"
                        style="background-image: url({{ asset('products/' . $product->img) }})">
                        @if ($product->price_discount != null)
                            <div class="position-absolute top-0 start-0 px-3 py-1 bg-danger sale-alert">Sale!</div>
                        @endif
                    </div>
                </a>
                <div style="height:15%" class="mb-3">
                    <div class="font-weight-bold font-gotham">{{ $product->name }}</div>
                    @if ($product->price_discount != null)
                        <div class="font-gotham"><del class="text-secondary">IDR {{ $product->price }}</del><span
                                class="text-danger font-weight-bold ms-2">IDR
                                {{ $product->price - $product->price_discount }}</span></div>
                    @else
                        <div class="font-gotham">IDR {{ $product->price }}</div>
                    @endif
                </div>
                <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none">
                    <div class="btn-argavell text-center w-100 py-2 cursor-pointer">See Product</div>
                </a>
            </div>
        @endif
    @endforeach
</div>