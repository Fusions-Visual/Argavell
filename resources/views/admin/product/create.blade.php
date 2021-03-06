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
    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data" id="create-product-form">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Nama Produk</label>
                            <div class="col-12">
                                <input id="name" type="text" class="form-control" name="name" required
                                    placeholder="Nama Produk" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">SKU Produk</label>
                            <div class="col-12">
                                <input id="sku" type="text" class="form-control" name="sku" required
                                    placeholder="SKU" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Detail Produk</label>
                            <div class="col-12">
                                <textarea id="detail" type="textarea" class="form-control" name="detail" required autocomplete="detail"
                                    placeholder="Detail Produk" style="resize: none;"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-6 text-start font-weight-bold">Jenis Produk</label>
                            <label class="col-6 text-start font-weight-bold">Berat (gram)</label>
                            <div class="col-6">
                                <select name="type" id="type" class="form-select">
                                    <option value="0" selected>Argavell</option>
                                    <option value="1">Kleanse</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <input type="number" name="weight" id="weight" class="form-control" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Tipe Produk</label>
                            <div class="col-12">
                                <select name="bundle" id="bundle" class="form-select">
                                    <option value="0" selected>Single</option>
                                    <option value="1">Bundle</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 d-none" id="product-bundle-date">
                            <label class="col-12 text-start font-weight-bold">Jangka Waktu</label>
                            <div class="col-12">
                                <input type="text" name="date" id="date" class="form-control" required />
                                <input type="hidden" name="date_start" id="date-start" value="{{ \Carbon\Carbon::now() }}">
                                <input type="hidden" name="date_end" id="date-end" value="{{ \Carbon\Carbon::now() }}">
                            </div>
                        </div>
                        {{-- <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Link Video Produk</label>
                            <div class="col-12">
                                <input id="link_video" type="text" class="form-control" name="link_video"
                                    placeholder="Link Video Produk" required>
                            </div>
                        </div> --}}
                        <div class="row mb-3">
                            <label class="col-12 text-start font-weight-bold">Ingredients</label>
                            <div class="col-12">
                                <textarea id="ingredients" type="text" class="form-control" name="ingredients" required></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-4 text-start font-weight-bold">Gambar
                                <div style="color: red;" id="alert-image" class="d-none">Required</div>
                            </label>
                            <label class="col-4 text-start font-weight-bold">Banner
                                <div style="color: red;" id="alert-banner" class="d-none">Required</div>
                            </label>
                            <label class="col-4 text-start font-weight-bold">Video
                            </label>
                            <div class="col-4 text-argavell">
                                <div id="image-upload-preview" class="cursor-pointer d-none"
                                    style="text-decoration: underline;" data-bs-toggle="modal"
                                    data-bs-target="#productimageModal"><span
                                        class="fas fa-fw fa-paperclip me-2"></span>Lihat Gambar</div>
                            </div>
                            <div class="col-4 text-argavell">
                                <div id="banner-upload-preview" class="cursor-pointer d-none"
                                    style="text-decoration: underline;" data-bs-toggle="modal"
                                    data-bs-target="#productbannerModal"><span
                                        class="fas fa-fw fa-paperclip me-2"></span>Lihat Gambar</div>
                            </div>
                            <div class="col-4 text-argavell">
                                <div id="video-upload-preview" class="cursor-pointer d-none"
                                    style="text-decoration: underline;" data-bs-toggle="modal"
                                    data-bs-target="#productvideoModal"><span
                                        class="fas fa-fw fa-paperclip me-2"></span>Lihat Video</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4 d-block" id="image-upload-button">
                                <div class="btn btn-admin-argavell" id="image-act-button">
                                    <label for="image" class="cursor-pointer">Upload Gambar</label>
                                    <input type="file" name="image" id="image" class="d-none" accept="image/*"
                                        required onchange="loadFile(event, 'image')">
                                </div>
                            </div>
                            <div class="col-4 d-block" id="banner-upload-button">
                                <div class="btn btn-admin-argavell" id="banner-act-button">
                                    <label for="banner" class="cursor-pointer">Upload Gambar</label>
                                    <input type="file" name="banner" id="banner" class="d-none" accept="image/*"
                                        required onchange="loadFile(event, 'banner')">
                                </div>
                            </div>
                            <div class="col-4 d-block" id="video-upload-button">
                                <div class="btn btn-admin-argavell" id="video-act-button">
                                    <label for="video" class="cursor-pointer">Upload Video</label>
                                    <input type="file" name="video" id="video" class="d-none" accept="video/*"
                                        onchange="loadVideo(event, 'video')">
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
                                <div id="benefiticon-upload-preview" class="cursor-pointer d-none"
                                    style="text-decoration: underline;" data-bs-toggle="modal"
                                    data-bs-target="#productbenefiticonModal"><span
                                        class="fas fa-fw fa-paperclip me-2"></span>Lihat Gambar</div>
                            </div>
                            <div class="col-6 text-argavell">
                                <div id="benefitimage-upload-preview" class="cursor-pointer d-none"
                                    style="text-decoration: underline;" data-bs-toggle="modal"
                                    data-bs-target="#productbenefitimageModal"><span
                                        class="fas fa-fw fa-paperclip me-2"></span>Lihat Gambar</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 d-block" id="benefiticon-upload-button">
                                <div class="btn btn-admin-argavell" id="benefiticon-act-button">
                                    <label for="benefiticon" class="cursor-pointer">Upload Gambar</label>
                                    <input type="file" name="benefiticon" id="benefiticon" class="d-none" accept="image/*"
                                        required onchange="loadFile(event, 'benefiticon')">
                                </div>
                            </div>
                            <div class="col-6 d-block" id="benefitimage-upload-button">
                                <div class="btn btn-admin-argavell" id="banner-act-button">
                                    <label for="benefitimage" class="cursor-pointer">Upload Gambar</label>
                                    <input type="file" name="benefitimage" id="benefitimage" class="d-none" accept="image/*"
                                        required onchange="loadFile(event, 'benefitimage')">
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
                        <div id="bundle-table" class="d-none">
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
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mb-3">
                                <label class="col-12 text-start font-weight-bold">Stok</label>
                                <div class="col-12">
                                    <input type="number" name="stock" id="stock" class="form-control" value=0 />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-12 text-start font-weight-bold">Harga Produk</label>
                                <div class="col-12">
                                    <input type="number" name="price" id="price" class="form-control" value=0 />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-12 text-start font-weight-bold">Diskon</label>
                                <div class="col-12">
                                    <input type="number" name="price_discount" id="price_discount" class="form-control"
                                        placeholder="Kosongkan apabila tidak ada diskon" />
                                </div>
                            </div>
                        </div>
                        <div id="non-bundle-table" class="d-block">
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
                                <label class="col-3 text-start font-weight-bold">Harga Produk</label>
                                <div class="col-1"></div>
                            </div>
                            <div class="row mb-3" id="product-info-sizes">
                                <div id="product-size-1" class="row">
                                    <div class="col-1">1.</div>
                                    <div class="col-3">
                                        <input type="number" id="size-00" class="form-control" value=0
                                            onkeyup="changeSize(0, 0);" />
                                    </div>
                                    <div class="col-3">
                                        <input type="number" id="size-10" class="form-control" value=0
                                            onkeyup="changeSize(1, 0);" />
                                    </div>
                                    <div class="col-4">
                                        <input type="number" id="size-20" class="form-control" value=0
                                            onkeyup="changeSize(2, 0);" />
                                    </div>
                                    <div class="col-1">
                                        <span class="fa fa-fw fa-trash-alt cursor-pointer"
                                            onclick="deleteSize(0);"></span>
                                    </div>
                                </div>
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
                                <h6 class="text-argavell font-weight-black cursor-pointer" data-bs-toggle="modal"
                                    data-bs-target="#guideModal">+Add</h6>
                            </div>
                            <div class="row">
                                <label class="col-2 text-start font-weight-bold">Gambar</label>
                                <label class="col-2 text-start font-weight-bold">Judul</label>
                                <label class="col-7 text-start font-weight-bold">Deskripsi</label>
                                <div class="col-1"></div>
                            </div>
                            <div class="row mb-3" id="product-info-guides">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm border-0 mb-2">
                    <div class="card-body">
                        <div id="benefit-table" class="d-block">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="font-weight-black">Keunggulan Produk</h6>
                                <input type="hidden" name="item_benefit_titles" id="item-benefit-titles">
                                <input type="hidden" name="item_benefit_images" id="item-benefit-images">
                                <input type="hidden" name="item_benefit_banners" id="item-benefit-banners">
                                <input type="hidden" name="item_benefit_descriptions" id="item-benefit-descriptions">
                                <h6 class="text-argavell font-weight-black cursor-pointer" data-bs-toggle="modal"
                                    data-bs-target="#benefitModal">+Add</h6>
                            </div>
                            <div class="row">
                                <label class="col-2 text-start font-weight-bold">Gambar</label>
                                <label class="col-2 text-start font-weight-bold">Logo</label>
                                <label class="col-2 text-start font-weight-bold">Judul</label>
                                <label class="col-5 text-start font-weight-bold">Deskripsi</label>
                                <div class="col-1"></div>
                            </div>
                            <div class="row mb-3" id="product-info-benefits">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm border-0 mb-2">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <button type="submit" class="btn btn-admin-gray w-100" disabled>Hapus</button>
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
@endsection

@section('scripts')
    <script>
        function onSubmit() {
            if ($('#image').get(0).files.length === 0) {
                $('#image-act-button').addClass('empty-input')
                $('#alert-image').removeClass('d-none').addClass('d-block');
            }
            if ($('#banner').get(0).files.length === 0) {
                $('#banner-act-button').addClass('empty-input')
                $('#alert-banner').removeClass('d-none').addClass('d-block');
            }
            if ($('#image').get(0).files.length === 1 &&
                $('#banner').get(0).files.length === 1) {
                $('#create-product-form').submit();
            }
        }
    </script>
    <script>
        var sizes = [
            [0, 0, 0, 0]
        ]
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
                opens: 'left'
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
                $(`#${type}-upload-preview`).removeClass('d-none').addClass('d-block');
                $('#alert-' + type).removeClass('d-block').addClass('d-none');
                $('#' + type + '-act-button').removeClass('empty-input');
            }
        };
        var loadVideo = function(event, type) {
            let file = event.target.files[0];
            let blobURL = URL.createObjectURL(file);
            document.querySelector("video").src = blobURL;
            $(`#${type}-upload-preview`).removeClass('d-none').addClass('d-block');
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
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function setPrice() {
            $('#bundle-item-price').val($('#bundle-item').find(":selected").data("price"))
        }
        var bundleItems = [];
        var bundleItemSizes = [];
        var bundleItemKeys = [];

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
        var guidetitles = []
        var guidedescriptions = []
        var guideimages = []
        var guideIndex = 0;

        function addGuide() {
            guidetitles[guideIndex] = $('#guide_title').val()
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
            guideIndex--;
        }
    </script>
    <script src="{{ asset('js/ckeditor.js') }}"></script>
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
            config.height = '350px';
        };
    </script>
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
        var benefittitles = []
        var benefitbanners = []
        var benefitdescriptions = []
        var benefitimages = []
        var benefitIndex = 0;

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
            benefitIndex--;
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
