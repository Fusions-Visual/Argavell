<div class="modal fade" id="acceptModal{{ $transaction->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('admin.transaction.store') }}" method="post">
                @csrf
                <div class="modal-header border-0 d-block justify-content-center position-relative">
                    <h5 class="modal-title text-center text-argavell text-4xl font-weight-bold">Terima Pesanan</h5>
                    <h6 class="text-center text-secondary">Mohon pastikan semua stok tersedia</h6>
                    <span class="fa fa-fw fa-times position-absolute cursor-pointer fs-2"
                        style="top: 20px; right: 20px; z-index: 20000;" data-bs-dismiss="modal"
                        aria-label="Close"></span>
                </div>
                <div class="modal-body font-proxima-nova px-5">
                    <input type="hidden" name="transaction_id[]" id="input-transaction-accept-{{ $transaction->id }}"
                        value="{{ $transaction->id }}">
                    <input type="hidden" name="input_method" value="new">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{ asset('uploads/products/' . $transaction->carts[0]->product->img) }}"
                                        class="rounded" width="75px">
                                </div>
                                <div class="col-9">
                                    <div class="row">
                                        @foreach ($transaction->carts as $item)
                                            <div class="col-6">
                                                <h6 class="font-weight-black">{{ $item->product->name }} ({{ $item->size }})</h6>
                                                <h6>{{ $item->qty }}x Rp. {{ number_format($item->price - $item->price_discount, 0, ',', '.') }}</h6>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"
                        class="btn-admin-argavell text-center w-100 my-2 py-2 cursor-pointer border-0">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
