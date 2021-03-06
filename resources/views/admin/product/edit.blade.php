@extends('layouts.admin')

@section('content')
    <div class="row justify-content-between mb-4">
        <div class="col-2">
            <a href="{{ route('admin.product.index') }}" class="btn btn-argavell-light"><span
                    class="fa fa-fw fa-arrow-left mr-2"></span>Kembali</a>
        </div>
        <div class="col-8 text-center align-middle">
            <h4 class="text-argavell font-weight-black">Detail Produk</h4>
        </div>
        <div class="col-2"></div>
    </div>
    @include('admin.product.inc.modal.add_bundle')
    @include('admin.product.inc.modal.add_guide')
    @include('admin.product.inc.modal.add_benefit')
    <form action="{{ route('admin.product.update', $product->slug) }}" method="post" enctype="multipart/form-data"
        id="edit-product-form">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-6">
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Nama Produk</label>
                            <div class="col-12">
                                <input id="name" type="text" class="form-control" name="name" required
                                    placeholder="Nama Produk" required value="{{ $product->name }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">SKU Produk</label>
                            <div class="col-12">
                                <input id="sku" type="text" class="form-control" name="sku" required
                                    placeholder="SKU" required value="{{ $product->sku }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Detail Produk</label>
                            <div class="col-12">
                                <textarea id="detail" type="textarea" class="form-control" name="detail" required autocomplete="detail"
                                    placeholder="Detail Produk" style="resize: none;">{{ $product->description }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-6 text-start font-weight-bold">Jenis Produk</label>
                            <label class="col-6 text-start font-weight-bold">Berat (gram)</label>
                            <div class="col-6">
                                <select name="type" id="type" class="form-select">
                                    <option value="0" @if ($product->type == '0') selected @endif>Argavell
                                    </option>
                                    <option value="1" @if ($product->type == '1') selected @endif>Kleanse
                                    </option>
                                </select>
                            </div>
                            <div class="col-6">
                                <input type="number" name="weight" id="weight" class="form-control"
                                    value="{{ $product->weight }}" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Tipe Produk</label>
                            <div class="col-12">
                                <select name="bundle" id="bundle" class="form-select">
                                    <option value="0" @if ($product->bundle == '0') selected @endif>Single</option>
                                    <option value="1" @if ($product->bundle == '1') selected @endif>Bundle</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 @if ($product->bundle == '0') d-none @endif" id="product-bundle-date">
                            <label class="col-12 text-start font-weight-bold">Jangka Waktu</label>
                            <div class="col-12">
                                <input type="text" name="date" id="date" class="form-control" required />
                                <input type="hidden" name="date_start" id="date-start"
                                    value="{{ $product->bundle_start }}">
                                <input type="hidden" name="date_end" id="date-end" value="{{ $product->bundle_end }}">
                            </div>
                        </div>
                        {{-- <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Link Video Produk</label>
                            <div class="col-12">
                                <input id="link_video" type="text" class="form-control" name="link_video" required
                                    placeholder="Link Video Produk" value="{{ $product->link_video }}" required>
                            </div>
                        </div> --}}
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Ingredients</label>
                            <div class="col-12">
                                <textarea id="ingredients" type="text" class="form-control" name="ingredients" required>{{ $product->ingredients }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-4 text-start font-weight-bold">Gambar
                                <div style="color: red;" id="alert-image" class="d-none">Required</div>
                            </label>
                            <label class="col-4 text-start font-weight-bold">Banner
                                <div style="color: red;" id="alert-banner" class="d-none">Required</div>
                            </label>
                            <label class="col-4 text-start font-weight-bold">Video</label>
                            <div class="col-4 text-argavell">
                                @if ($product->img)
                                    <div id="image-upload-preview" class="cursor-pointer"
                                        style="text-decoration: underline;" data-bs-toggle="modal"
                                        data-bs-target="#productimageModal">
                                        <span class="fas fa-fw fa-paperclip me-2"></span>Lihat Gambar
                                    </div>
                                @else
                                    <div id="image-upload-preview" class="cursor-pointer"
                                        style="text-decoration: underline; display:none;" data-bs-toggle="modal"
                                        data-bs-target="#productimageModal">
                                        <span class="fas fa-fw fa-paperclip me-2"></span>Lihat Gambar
                                    </div>
                                @endif
                            </div>
                            <div class="col-4 text-argavell">
                                @if ($product->banner)
                                    <div id="banner-upload-preview" class="cursor-pointer"
                                        style="text-decoration: underline;" data-bs-toggle="modal"
                                        data-bs-target="#productbannerModal">
                                        <span class="fas fa-fw fa-paperclip me-2"></span>Lihat Gambar
                                    </div>
                                @else
                                    <div id="banner-upload-preview" class="cursor-pointer"
                                        style="text-decoration: underline; display: none;" data-bs-toggle="modal"
                                        data-bs-target="#productbannerModal">
                                        <span class="fas fa-fw fa-paperclip me-2"></span>Lihat Gambar
                                    </div>
                                @endif
                            </div>
                            <div class="col-4 text-argavell">
                                @if ($product->link_video)
                                    <div id="video-upload-preview" class="cursor-pointer"
                                        style="text-decoration: underline;" data-bs-toggle="modal"
                                        data-bs-target="#productvideoModal">
                                        <span class="fas fa-fw fa-paperclip me-2"></span>Lihat Video
                                    </div>
                                @else
                                    <div id="video-upload-preview" class="cursor-pointer"
                                        style="text-decoration: underline; display: none;" data-bs-toggle="modal"
                                        data-bs-target="#productvideoModal">
                                        <span class="fas fa-fw fa-paperclip me-2"></span>Lihat Video
                                    </div>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="image_delete" id="image-delete" value='0'>
                        <input type="hidden" name="banner_delete" id="banner-delete" value='0'>
                        <input type="hidden" name="video_delete" id="video-delete" value='0'>
                        <div class="row mb-3">
                            <div class="col-4 d-block" id="image-upload-button">
                                <div class="btn btn-admin-argavell" id="image-act-button"
                                    @if ($product->img) style="display:none;" @endif>
                                    <label for="image" class="cursor-pointer">Upload Gambar</label>
                                    <input type="file" name="image" id="image" class="d-none" accept="image/*"
                                        onchange="loadFile(event, 'image')">
                                </div>
                                <div class="btn btn-admin-argavell-red" id="image-delete-button"
                                    onclick="deleteMedia('image');"
                                    @if (!$product->img) style="display:none;" @endif>
                                    <label class="cursor-pointer">Hapus Gambar</label>
                                </div>
                            </div>
                            <div class="col-4 d-block" id="banner-upload-button">
                                <div class="btn btn-admin-argavell" id="banner-act-button"
                                    @if ($product->banner) style="display:none;" @endif>
                                    <label for="banner" class="cursor-pointer">Upload Gambar</label>
                                    <input type="file" name="banner" id="banner" class="d-none" accept="image/*"
                                        onchange="loadFile(event, 'banner')">
                                </div>
                                <div class="btn btn-admin-argavell-red" id="banner-delete-button"
                                    onclick="deleteMedia('banner');"
                                    @if (!$product->banner) style="display:none;" @endif>
                                    <label class="cursor-pointer">Hapus Gambar</label>
                                </div>
                            </div>
                            <div class="col-4 d-block" id="video-upload-button">
                                <div class="btn btn-admin-argavell" id="video-act-button"
                                    @if ($product->link_video) style="display:none;" @endif>
                                    <label for="video" class="cursor-pointer">Upload Video</label>
                                    <input type="file" name="video" id="video" class="d-none" accept="video/*"
                                        onchange="loadVideo(event, 'video')">
                                </div>
                                <div class="btn btn-admin-argavell-red" id="video-delete-button"
                                    onclick="deleteMedia('video');"
                                    @if (!$product->link_video) style="display:none;" @endif>
                                    <label class="cursor-pointer">Hapus Video</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('admin.product.inc.modal.product_image_preview')
                @include('admin.product.inc.modal.product_banner_preview')
                @include('admin.product.inc.modal.product_video_preview')
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Benefit</label>
                            <div class="col-12">
                                <textarea id="benefit_desc" type="text" class="form-control" name="benefit_desc" required></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-6 text-start font-weight-bold">Icon
                                <div style="color: red;" id="alert-benefiticon" class="d-none">Required</div>
                            </label>
                            <label class="col-6 text-start font-weight-bold">Gambar
                                <div style="color: red;" id="alert-benefitimage" class="d-none">Required</div>
                            </label>
                            <div class="col-6 text-argavell">
                                @if ($product->benefit_icon)
                                    <div id="benefiticon-upload-preview" class="cursor-pointer"
                                        style="text-decoration: underline;" data-bs-toggle="modal"
                                        data-bs-target="#productbenefiticonModal"><span
                                            class="fas fa-fw fa-paperclip me-2"></span>Lihat Gambar</div>
                                @else
                                    <div id="benefiticon-upload-preview" class="cursor-pointer"
                                        style="text-decoration: underline; display:none;" data-bs-toggle="modal"
                                        data-bs-target="#productbenefiticonModal"><span
                                            class="fas fa-fw fa-paperclip me-2"></span>Lihat Gambar</div>
                                @endif
                            </div>
                            <div class="col-6 text-argavell">
                                @if ($product->benefit_image)
                                    <div id="benefitimage-upload-preview" class="cursor-pointer"
                                        style="text-decoration: underline;" data-bs-toggle="modal"
                                        data-bs-target="#productbenefitimageModal"><span
                                            class="fas fa-fw fa-paperclip me-2"></span>Lihat Gambar</div>
                                @else
                                    <div id="benefitimage-upload-preview" class="cursor-pointer"
                                        style="text-decoration: underline; display:none;" data-bs-toggle="modal"
                                        data-bs-target="#productbenefitimageModal"><span
                                            class="fas fa-fw fa-paperclip me-2"></span>Lihat Gambar</div>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="benefitimage_delete" id="benefitimage-delete" value='0'>
                        <input type="hidden" name="benefiticon_delete" id="benefiticon-delete" value='0'>
                        <div class="row mb-3">
                            <div class="col-6 d-block" id="benefiticon-upload-button">
                                <div class="btn btn-admin-argavell" id="benefiticon-act-button"
                                    @if ($product->benefit_icon) style="display:none;" @endif>
                                    <label for="benefiticon" class="cursor-pointer">Upload Gambar</label>
                                    <input type="file" name="benefiticon" id="benefiticon" class="d-none"
                                        accept="image/*" required onchange="loadFile(event, 'benefiticon')">
                                </div>
                                <div class="btn btn-admin-argavell-red" id="benefiticon-delete-button"
                                    onclick="deleteMedia('benefiticon');"
                                    @if (!$product->benefit_icon) style="display:none;" @endif>
                                    <label class="cursor-pointer">Hapus Gambar</label>
                                </div>
                            </div>
                            <div class="col-6 d-block" id="benefitimage-upload-button">
                                <div class="btn btn-admin-argavell" id="benefitimage-act-button"
                                    @if ($product->benefit_image) style="display:none;" @endif>
                                    <label for="benefitimage" class="cursor-pointer">Upload Gambar</label>
                                    <input type="file" name="benefitimage" id="benefitimage" class="d-none"
                                        accept="image/*" required onchange="loadFile(event, 'benefitimage')">
                                </div>
                                <div class="btn btn-admin-argavell-red" id="benefitimage-delete-button"
                                    onclick="deleteMedia('benefitimage');"
                                    @if (!$product->benefit_image) style="display:none;" @endif>
                                    <label class="cursor-pointer">Hapus Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('admin.product.inc.modal.product_benefiticon_preview')
                @include('admin.product.inc.modal.product_benefitimage_preview')
            </div>
            <div class="col-6">
                <div class="card shadow-sm border-0 mb-2">
                    <div class="card-body">
                        <div id="bundle-table" @if ($product->bundle == '0') class="d-none" @endif>
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="font-weight-black">Produk Bundle</h6>
                                <input type="hidden" name="bundle_items" id="bundle-items">
                                <input type="hidden" name="bundle_item_sizes" id="bundle-item-sizes">
                                <input type="hidden" name="bundle_item_keys" id="bundle-item-keys">
                                <h6 class="text-argavell font-weight-black cursor-pointer" data-bs-toggle="modal"
                                    data-bs-target="#bundleModal">+Add Item</h6>
                            </div>
                            <div id="bundle-item-table" class="mb-3">
                                <table id="table_id" class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th width="25px">NO</th>
                                            <th>NAMA PRODUK</th>
                                            <th>HARGA SATUAN</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product->bundles as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->product->name }} ({{ $item->product->size[$item->key] }}
                                                    ml)</td>
                                                <td>{{ $item->product->price[$item->key] }}</td>
                                                <td>
                                                    <div class="btn btn-admin-gray"
                                                        onclick="deleteItem({{ $item->id }})">Hapus</div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mb-3">
                                <label class="col-12 text-start font-weight-bold">Stok</label>
                                <div class="col-12">
                                    <input type="number" name="stock" id="stock" class="form-control"
                                        value="{{ $product->stock[0] }}" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-12 text-start font-weight-bold">Harga Produk</label>
                                <div class="col-12">
                                    <input type="number" name="price" id="price" class="form-control"
                                        value="{{ $product->price[0] }}" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-12 text-start font-weight-bold">Diskon</label>
                                <div class="col-12">
                                    <input type="number" name="price_discount" id="price_discount" class="form-control"
                                        value="{{ $product->price_discount[0] }}"
                                        placeholder="Kosongkan apabila tidak ada diskon" />
                                </div>
                            </div>
                        </div>
                        <div id="non-bundle-table" @if ($product->bundle == '1') class="d-none" @endif>
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="font-weight-black">Info Produk</h6>
                                <input type="hidden" name="item_sizes" id="item-sizes">
                                <h6 class="text-argavell font-weight-black cursor-pointer" onclick="addSize();">+Add Size
                                </h6>
                            </div>
                            <div class="row">
                                <div class="col-1"></div>
                                <label class="col-3 text-start font-weight-bold">Stok</label>
                                <label class="col-3 text-start font-weight-bold">Size (ml)</label>
                                <label class="col-4 text-start font-weight-bold">Harga Produk</label>
                                <div class="col-1"></div>
                            </div>
                            <div class="row mb-3" id="product-info-sizes">
                                @foreach ($product->size as $key => $size)
                                    <div id="product-size-{{ $key }}" class="row">
                                        <div class="col-1 mb-2">{{ $loop->iteration }}.</div>
                                        <div class="col-3 mb-2">
                                            <input type="number" id="size-0{{ $key }}" class="form-control"
                                                value={{ $product->stock[$key] }}
                                                onkeyup="changeSize(0, {{ $key }});" />
                                        </div>
                                        <div class="col-3 mb-2">
                                            <input type="number" id="size-1{{ $key }}" class="form-control"
                                                value={{ $product->size[$key] }}
                                                onkeyup="changeSize(1, {{ $key }});" />
                                        </div>
                                        <div class="col-4 mb-2">
                                            <input type="number" id="size-2{{ $key }}" class="form-control"
                                                value={{ $product->price[$key] }}
                                                onkeyup="changeSize(2, {{ $key }});" />
                                        </div>
                                        <div class="col-1 mb-2">
                                            <span class="fa fa-fw fa-trash-alt cursor-pointer"
                                                onclick="deleteSize({{ $key }});"></span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm border-0 mb-2">
                    <div class="card-body">
                        <div id="guide-table" class="d-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="font-weight-black">Petunjuk Pemakaian</h6>
                                <input type="hidden" name="item_guide_titles" id="item-guide-titles">
                                <input type="hidden" name="item_guide_images" id="item-guide-images">
                                <input type="hidden" name="item_guide_descriptions" id="item-guide-descriptions">
                                <h6 class="text-argavell font-weight-black cursor-pointer" onclick="addGuideClicked();"
                                    data-bs-toggle="modal" data-bs-target="#guideModal">+Add</h6>
                            </div>
                            <div class="row">
                                <label class="col-2 text-start font-weight-bold">Gambar</label>
                                <label class="col-2 text-start font-weight-bold">Judul</label>
                                <label class="col-7 text-start font-weight-bold">Deskripsi</label>
                                <div class="col-1"></div>
                            </div>
                            <div class="row mb-3" id="product-info-guides">
                                @foreach ($product->guides as $key => $guide)
                                    <div id="product-guide-{{ $key }}" class="row">
                                        <div class="col-2 mb-2">
                                            <a target="_blank" href="{{ asset('uploads/guides') . '/' . $guide->logo }}"
                                                class="text-argavell" style="text-decoration: underline;">Lihat Gambar</a>
                                        </div>
                                        <div class="col-2 mb-2">
                                            {{ $guide->title }}
                                        </div>
                                        <div class="col-7 mb-2">
                                            {!! $guide->description !!}
                                        </div>
                                        <div class="col-1 mb-2">
                                            <span class="fa fa-fw fa-edit cursor-pointer" data-bs-toggle="modal"
                                                data-bs-target="#guideModal"
                                                onclick="editGuide({{ $key }});"></span>
                                            <span class="fa fa-fw fa-trash-alt cursor-pointer"
                                                onclick="deleteGuide({{ $key }});"></span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm border-0 mb-2">
                    <div class="card-body">
                        <div id="guide-table" class="d-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="font-weight-black">Keunggulan Produk</h6>
                                <input type="hidden" name="item_benefit_titles" id="item-benefit-titles">
                                <input type="hidden" name="item_benefit_images" id="item-benefit-images">
                                <input type="hidden" name="item_benefit_banners" id="item-benefit-banners">
                                <input type="hidden" name="item_benefit_descriptions" id="item-benefit-descriptions">
                                <h6 class="text-argavell font-weight-black cursor-pointer" data-bs-toggle="modal"
                                    onclick="addBenefitClicked();" data-bs-target="#benefitModal">+Add</h6>
                            </div>
                            <div class="row">
                                <label class="col-2 text-start font-weight-bold">Gambar</label>
                                <label class="col-2 text-start font-weight-bold">Logo</label>
                                <label class="col-2 text-start font-weight-bold">Judul</label>
                                <label class="col-5 text-start font-weight-bold">Deskripsi</label>
                                <div class="col-1"></div>
                            </div>
                            <div class="row mb-3" id="product-info-benefits">
                                @foreach ($product->benefits as $key => $benefit)
                                    <div id="product-benefit-{{ $key }}" class="row">
                                        <div class="col-2 mb-2">
                                            <a target="_blank"
                                                href="{{ asset('uploads/benefits') . '/' . $benefit->banner }}"
                                                class="text-argavell" style="text-decoration: underline;">Lihat Gambar</a>
                                        </div>
                                        <div class="col-2 mb-2">
                                            <a target="_blank"
                                                href="{{ asset('uploads/benefits') . '/' . $benefit->icon }}"
                                                class="text-argavell" style="text-decoration: underline;">Lihat Gambar</a>
                                        </div>
                                        <div class="col-2 mb-2">
                                            {{ $benefit->title }}
                                        </div>
                                        <div class="col-5 mb-2">
                                            {!! $benefit->content !!}
                                        </div>
                                        <div class="col-1 mb-2">
                                            <span class="fa fa-fw fa-edit cursor-pointer" data-bs-toggle="modal"
                                                data-bs-target="#benefitModal"
                                                onclick="editBenefit({{ $key }});"></span>
                                            <span class="fa fa-fw fa-trash-alt cursor-pointer"
                                                onclick="deleteBenefit({{ $key }});"></span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm border-0 mb-2">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <button type="submit" class="btn btn-admin-gray w-100"
                                    onclick="event.preventDefault();
                                    document.getElementById('delete-product-form').submit();">Hapus</button>
                            </div>
                            <div class="col-6">
                                <div onclick="onSubmit();" class="btn btn-admin-argavell w-100">Simpan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="{{ route('admin.product.destroy', $product->slug) }}" id="delete-product-form" method="post">
        @csrf
        <input name="_method" type="hidden" value="DELETE">
    </form>
@endsection

@section('scripts')
    <script>
        function onSubmit() {
            if ($('#image-delete').val() === '1') {
                $('#image-act-button').addClass('empty-input')
                $('#alert-image').removeClass('d-none').addClass('d-block');
            }
            if ($('#banner-delete').val() === '1') {
                $('#banner-act-button').addClass('empty-input')
                $('#alert-banner').removeClass('d-none').addClass('d-block');
            }
            if ($('#image-delete').val() === '0' &&
                $('#banner-delete').val() === '0') {
                $('#edit-product-form').submit();
            }
        }
    </script>
    <script>
        var sizes = []
        var sizestemparray = []
        var the_product = @json($product);
        the_product.size.forEach(function(value, i) {
            sizestemparray.push(the_product.stock[i]);
            sizestemparray.push(the_product.size[i]);
            sizestemparray.push(the_product.price[i]);
            sizestemparray.push(the_product.price_discount[i]);
            sizes.push(sizestemparray);
            sizestemparray = [];
        });
        $('#item-sizes').val(sizes);

        function changeSize(index, order) {
            sizes[order][index] = parseInt($('#size-' + index + order).val());
            $('#item-sizes').val(sizes);
        }

        function addSize() {
            sizes.push([0, 0, 0, 0]);
            $('#item-sizes').val(sizes);
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $.post(url + "/admin/product/add_sizes", {
                    _token: CSRF_TOKEN,
                    sizes: sizes
                })
                .done(function(data) {
                    $('#product-info-sizes').html(data);
                })
                .fail(function(error) {
                    console.log(error);
                });
        }

        function deleteSize(index) {
            if (sizes.length > 1) {
                $('#product-size-' + index).remove();
                sizes.splice(index, 1);
                $('#item-sizes').val(sizes);
                var hostname = "{{ request()->getHost() }}"
                var url = ""
                if (hostname.includes('www')) {
                    url = "https://" + hostname
                } else {
                    url = "{{ config('app.url') }}"
                }
                $.post(url + "/admin/product/add_sizes", {
                        _token: CSRF_TOKEN,
                        sizes: sizes
                    })
                    .done(function(data) {
                        $('#product-info-sizes').html(data);
                    })
                    .fail(function(error) {
                        console.log(error);
                    });
            }
        }
    </script>
    <script>
        $(function() {
            $('#date').daterangepicker({
                opens: 'left',
                startDate: "{{ date('Y-m-d', strtotime($product->bundle_start)) }}",
                endDate: "{{ date('Y-m-d', strtotime($product->bundle_end)) }}",
                locale: {
                    format: 'YYYY-MM-DD',
                },
            }, function(start, end, label) {
                $('#date-start').val(start.format('YYYY-MM-DD'))
                $('#date-end').val(end.format('YYYY-MM-DD'))
            });
        });
    </script>
    <script>
        var loadFile = function(event, type) {
            if ($(`#${type}`)[0].files[0].size > 1048576) {
                alert("Ukuran gambar tidak bisa melebihi 1MB!");
                $(`#${type}`).val(null);
            } else {
                $(`.product-${type}-preview`).attr('src', URL.createObjectURL(event.target.files[0]));
                // $(`#${type}-upload-preview`).html('<span class="fas fa-fw fa-paperclip me-2"></span>' + event.target
                //     .files[0][
                //         'name'
                //     ])
                // $(`#${type}-upload-button`).removeClass('d-block').addClass('d-none');
                $(`#${type}-upload-preview`).removeClass('d-none').addClass('d-block');
                $('#' + type + '-delete').val('0')
                $('#' + type + '-act-button').removeClass('d-block').addClass('d-none');
                $('#' + type + '-delete-button').removeClass('d-none').addClass('d-block');
                $('#alert-' + type).removeClass('d-block').addClass('d-none');
                $('#' + type + '-act-button').removeClass('empty-input');
            }
        };
        var loadVideo = function(event, type) {
            let file = event.target.files[0];
            let blobURL = URL.createObjectURL(file);
            document.querySelector("video").src = blobURL;
            // $(`#${type}-upload-preview`).html('<span class="fas fa-fw fa-paperclip me-2"></span>' + event.target
            //     .files[0][
            //         'name'
            //     ])
            // $(`#${type}-upload-button`).removeClass('d-block').addClass('d-none');
            $(`#${type}-upload-preview`).removeClass('d-none').addClass('d-block');
            $('#' + type + '-delete').val('0')
            $('#' + type + '-act-button').removeClass('d-block').addClass('d-none');
            $('#' + type + '-delete-button').removeClass('d-none').addClass('d-block');
        };
    </script>
    <script>
        $('#bundle').on('change', function(e) {
            if ($('#bundle').val() == '0') {
                $('#product-bundle-date').removeClass('d-block').addClass('d-none');
                $('#bundle-table').removeClass('d-block').addClass('d-none');
                $('#non-bundle-table').removeClass('d-none').addClass('d-block');
            } else if ($('#bundle').val() == '1') {
                $('#product-bundle-date').removeClass('d-none').addClass('d-block');
                $('#bundle-table').removeClass('d-none').addClass('d-block');
                $('#non-bundle-table').removeClass('d-block').addClass('d-none');
            }
        });
    </script>
    <script>
        var bundleItemsTemp = @json($product->bundles);
        var bundleItems = []
        var bundleItemSizes = [];
        var bundleItemKeys = [];
        bundleItemsTemp.forEach(element => {
            bundleItems.push(element.product_id)
            bundleItemSizes.push(element.size)
            bundleItemKeys.push(element.key)
        });
        $('#bundle-items').val(bundleItems);
        $('#bundle-item-sizes').val(bundleItemSizes);
        $('#bundle-item-keys').val(bundleItemKeys);
    </script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function setPrice() {
            $('#bundle-item-price').val($('#bundle-item').find(":selected").data("price"))
        }

        function addItem() {
            bundleItems.push($('#bundle-item').find(":selected").val());
            bundleItemSizes.push($('#bundle-item').find(":selected").data("size"));
            bundleItemKeys.push($('#bundle-item').find(":selected").data("key"));
            $('#bundle-items').val(bundleItems);
            $('#bundle-item-sizes').val(bundleItemSizes);
            $('#bundle-item-keys').val(bundleItemKeys);
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $.post(url + "/admin/product/add_bundle_item", {
                    _token: CSRF_TOKEN,
                    items: bundleItems,
                    keys: bundleItemKeys
                })
                .done(function(data) {
                    $('#bundle-item-table').html(data);
                    $('#table_id').DataTable().ajax.reload();
                })
                .fail(function(error) {
                    console.log(error);
                });
        }

        function deleteItem(id) {
            const index = bundleItems.indexOf(id);
            bundleItems.splice(index, 1);
            bundleItemSizes.splice(index, 1);
            bundleItemKeys.splice(index, 1);
            $('#bundle-items').val(bundleItems);
            $('#bundle-item-sizes').val(bundleItemSizes);
            $('#bundle-item-keys').val(bundleItemKeys);
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $.post(url + "/admin/product/add_bundle_item", {
                    _token: CSRF_TOKEN,
                    items: bundleItems,
                    keys: bundleItemKeys
                })
                .done(function(data) {
                    $('#bundle-item-table').html(data);
                    $('#table_id').DataTable().ajax.reload();
                })
                .fail(function(error) {
                    console.log(error);
                });
        }
    </script>
    <script>
        var loadModalFile = function(event, type) {
            if ($(`#${type}`)[0].files[0].size > 1048576) {
                alert("Ukuran gambar tidak bisa melebihi 1MB!");
                $(`#${type}`).val(null);
            } else {
                guideimages[guideIndex] = event.target.files[0]['name'];
                $('#guide-image').val(guideimages)
                $(`#${type}-imaged`).attr('src', URL.createObjectURL(event.target.files[0]));
            }
        };
        var loadBenefitImage = function(event, type) {
            if ($(`#${type}`)[0].files[0].size > 1048576) {
                alert("Ukuran gambar tidak bisa melebihi 1MB!");
                $(`#${type}`).val(null);
            } else {
                benefitimages[benefitIndex] = event.target.files[0]['name'];
                $('#benefit-image').val(benefitimages)
                $(`#${type}-imaged`).attr('src', URL.createObjectURL(event.target.files[0]));
            }
        };
        var loadBenefitBanner = function(event, type) {
            if ($(`#${type}`)[0].files[0].size > 1048576) {
                alert("Ukuran gambar tidak bisa melebihi 1MB!");
                $(`#${type}`).val(null);
            } else {
                benefitbanners[benefitIndex] = event.target.files[0]['name'];
                $('#benefit-banner').val(benefitbanners)
                $(`#${type}-imaged`).attr('src', URL.createObjectURL(event.target.files[0]));
            }
        };
    </script>
    <script>
        var productGuides = @json($product->guides);
        var guidetitles = []
        var guidedescriptions = []
        var guideimages = []
        var guideIndex = productGuides.length;
        productGuides.forEach(setGuides)

        function setGuides(item, index, arr) {
            guidetitles.push(item.title)
            guidedescriptions.push(item.description)
            guideimages.push(item.logo)
        }
        $('#item-guide-titles').val(guidetitles)
        $('#item-guide-descriptions').val(JSON.stringify(guidedescriptions))
        $('#item-guide-images').val(guideimages)
        $('#guide-title').val(guidetitles)
        $('#guide-description').val(JSON.stringify(guidedescriptions))
        $('#guide-image').val(guideimages)


        function addGuide() {
            guidetitles[guideIndex] = $('#guide_title').val()
            // guidedescriptions[guideIndex] = $('#guide_description').val()
            $('#guide-title').val(guidetitles)
            $('#guide-description').val(JSON.stringify(guidedescriptions))
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $.ajax({
                url: url + "/admin/product/add_guides",
                type: 'POST',
                _token: CSRF_TOKEN,
                data: new FormData($('#add-guide')[0]),
                processData: false,
                contentType: false
            }).done(function(data) {
                $('#item-guide-titles').val(guidetitles)
                $('#item-guide-descriptions').val(JSON.stringify(guidedescriptions))
                $('#item-guide-images').val(guideimages)
                guideIndex++;
                $('#guide_title').val(null)
                editoreds.setData('')
                $('#guide').val(null)
                $('#guide-imaged').attr('src', @json(asset('images/argan-fruit.png')));
                $('#product-info-guides').html(data);
            }).fail(function(error) {
                console.log(error)
            });
        }

        function deleteGuide(index) {
            $('#product-guide-' + index).remove();
            guidetitles.splice(index, 1);
            guidedescriptions.splice(index, 1);
            guideimages.splice(index, 1);
            $('#item-guide-titles').val(guidetitles)
            $('#item-guide-descriptions').val(JSON.stringify(guidedescriptions))
            $('#item-guide-images').val(guideimages)
            $('#guide-title').val(guidetitles)
            $('#guide-description').val(JSON.stringify(guidedescriptions))
            $('#guide-image').val(guideimages)
            guideIndex--;
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $.ajax({
                url: url + "/admin/product/add_guides",
                type: 'POST',
                _token: CSRF_TOKEN,
                data: new FormData($('#add-guide')[0]),
                processData: false,
                contentType: false
            }).done(function(data) {
                $('#product-info-guides').html(data);
            }).fail(function(error) {
                console.log(error)
            });
        }
    </script>
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script>
        var editoreds;
        ClassicEditor.create(document.querySelector('#guide_description'), {
                mediaEmbed: {
                    previewsInData: true
                },
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle',
                    'ImageToolbar', 'ImageUpload', 'MediaEmbed', 'Table'
                ],
            }).then(editore => {
                editoreds = editore
                editore.model.document.on('change:data', () => {
                    guidedescriptions[guideIndex] = editore.getData()
                });
            })
            .catch(error => {
                console.error(error);
                console.error(error.stack);
            });
        ClassicEditor.editorConfig = function(config) {
            // misc options
            config.height = '350px';
        };
    </script>
    <script>
        var editored;
        ClassicEditor.create(document.querySelector('#benefit_description'), {
                mediaEmbed: {
                    previewsInData: true
                },
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle',
                    'ImageToolbar', 'ImageUpload', 'MediaEmbed', 'Table'
                ],
            }).then(editor => {
                editored = editor
                editor.model.document.on('change:data', () => {
                    benefitdescriptions[benefitIndex] = editor.getData()
                });
            })
            .catch(error => {
                console.error(error);
                console.error(error.stack);
            });
        ClassicEditor.editorConfig = function(config) {
            // misc options
            config.height = '350px';
        };
    </script>
    <script>
        var productBenefits = @json($product->benefits);
        var benefittitles = []
        var benefitbanners = []
        var benefitdescriptions = []
        var benefitimages = []
        var benefitIndex = productBenefits.length;
        productBenefits.forEach(setBenefits)

        function setBenefits(item, index, arr) {
            benefittitles.push(item.title)
            benefitdescriptions.push(item.content)
            benefitimages.push(item.icon)
            benefitbanners.push(item.banner)

            $('#item-benefit-titles').val(benefittitles)
            $('#item-benefit-descriptions').val(JSON.stringify(benefitdescriptions))
            $('#item-benefit-images').val(benefitimages)
            $('#item-benefit-banners').val(benefitbanners)
            $('#benefit-title').val(benefittitles)
            $('#benefit-description').val(JSON.stringify(benefitdescriptions))
            $('#benefit-banner').val(benefitbanners)
            $('#benefit-image').val(benefitimages)
        }

        function addBenefit() {
            benefittitles[benefitIndex] = $('#benefit_title').val()
            $('#benefit-title').val(benefittitles)
            $('#benefit-description').val(JSON.stringify(benefitdescriptions))
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $.ajax({
                url: url + "/admin/product/add_benefits",
                type: 'POST',
                _token: CSRF_TOKEN,
                data: new FormData($('#add-benefit')[0]),
                processData: false,
                contentType: false
            }).done(function(data) {
                $('#item-benefit-titles').val(benefittitles)
                $('#item-benefit-descriptions').val(JSON.stringify(benefitdescriptions))
                $('#item-benefit-images').val(benefitimages)
                $('#item-benefit-banners').val(benefitbanners)
                benefitIndex++;
                $('#benefit_title').val(null)
                editored.setData('')
                $('#benefit').val(null)
                $('#benefit-imaged').attr('src', @json(asset('images/argan-fruit.png')));
                $('#benefitbanner').val(null)
                $('#benefitbanner-imaged').attr('src', @json(asset('images/argan-oil-detail-3.jpg')));
                $('#product-info-benefits').html(data);
            }).fail(function(error) {
                console.log(error)
            });
        }

        function deleteBenefit(index) {
            $('#product-benefit-' + index).remove();
            benefittitles.splice(index, 1);
            benefitdescriptions.splice(index, 1);
            benefitimages.splice(index, 1);
            benefitbanners.splice(index, 1);
            $('#item-benefit-titles').val(benefittitles)
            $('#item-benefit-descriptions').val(JSON.stringify(benefitdescriptions))
            $('#item-benefit-images').val(benefitimages)
            $('#item-benefit-banners').val(benefitbanners)
            $('#benefit-title').val(benefittitles)
            $('#benefit-description').val(JSON.stringify(benefitdescriptions))
            $('#benefit-image').val(benefitimages)
            $('#benefit-banner').val(benefitbanners)
            benefitIndex--;
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $.ajax({
                url: url + "/admin/product/add_benefits",
                type: 'POST',
                _token: CSRF_TOKEN,
                data: new FormData($('#add-benefit')[0]),
                processData: false,
                contentType: false
            }).done(function(data) {
                $('#product-info-benefits').html(data);
            }).fail(function(error) {
                console.log(error)
            });
        }
    </script>
    <script>
        function deleteMedia(media) {
            $('#' + media + '-act-button').removeClass('d-none').addClass('d-block');
            $('#' + media + '-delete-button').removeClass('d-block').addClass('d-none');
            $('#' + media + '-upload-preview').removeClass('d-block').addClass('d-none');
            $('#' + media + '-delete').val('1')
            $(`#${media}`).val(null)
        }
    </script>
    <script>
        function editGuide(index) {
            guideIndex = index
            $('#modal-guide-title').html('Edit Guide');
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $('#guide_title').val(guidetitles[index])
            editoreds.setData(guidedescriptions[index])
            $('#guide-imaged').attr('src', url + '/uploads/guides/' + guideimages[index]);
        }
    </script>
    <script>
        function addGuideClicked() {
            guideIndex = productGuides.length;
            $('#modal-guide-title').html('Add New Guide');
            $('#guide_title').val(null)
            editoreds.setData('')
            $('#guide').val(null)
            $('#guide-imaged').attr('src', @json(asset('images/argan-fruit.png')));
        }
    </script>
    <script>
        function editBenefit(index) {
            benefitIndex = index
            $('#modal-benefit-title').html('Edit Benefit');
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $('#benefit_title').val(benefittitles[index])
            editored.setData(benefitdescriptions[index])
            $('#benefit-imaged').attr('src', url + '/uploads/benefits/' + benefitimages[index]);
            $('#benefitbanner-imaged').attr('src', url + '/uploads/benefits/' + benefitbanners[index]);
        }
    </script>
    <script>
        function addBenefitClicked() {
            benefitIndex = productBenefits.length;
            $('#modal-benefit-title').html('Add New Benefit');
            $('#benefit_title').val(null)
            editored.setData('')
            $('#benefit').val(null)
            $('#benefit-imaged').attr('src', @json(asset('images/argan-fruit.png')));
            $('#benefitbanner').val(null)
            $('#benefitbanner-imaged').attr('src', @json(asset('images/argan-oil-detail-3.jpg')));
        }
    </script>
    <script>
        var editort;
        ClassicEditor.create(document.querySelector('#benefit_desc'), {
                mediaEmbed: {
                    previewsInData: true
                },
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle',
                    'ImageToolbar', 'ImageUpload', 'MediaEmbed', 'Table'
                ],
            }).then(editor => {
                editort = editor;
                editort.setData(@json($product->benefit))
            })
            .catch(error => {
                console.error(error);
                console.error(error.stack);
            });
        ClassicEditor.editorConfig = function(config) {
            config.height = '350px';
        };
    </script>
@endsection
