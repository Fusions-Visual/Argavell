@extends('layouts.admin')

@section('content')
    <div class="row mb-3">
        <div class="col-4">
            <h1 class="text-argavell font-weight-bold mb-0">Transactions</h1>
            <h6 class="text-secondary">Pastikan stok Anda selalu tersedia ketika menerima pesanan.</h6>
        </div>
        <div class="col-5 col-xxl-6"></div>
        <div class="col-3 col-xxl-2">
            <img src="{{ asset('images/argan-fruit.png') }}" class="mr-2 d-inline" width="30px" height="30px">
            <h6 class="text-dark d-inline align-middle">Hello, <span
                    class="font-weight-black">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</span></h6>
        </div>
    </div>
    <div class="row justify-content-start mb-3">
        <div class="col-12 text-start">
            <a href="#" class="btn btn-admin-light shadow-sm text-decoration-none" data-bs-toggle="modal"
                data-bs-target="#reportModal">
                <span class="fa fa-fw fa-download me-2"></span>Download Laporan Penjualan
            </a>
        </div>
    </div>
    @include('admin.transaction.inc.modal.report')
    <div class="row mb-3">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-argavell nav-fill" id="detailTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active font-weight-bold" id="semua-pesanan-tab" type="button"
                            data-bs-toggle="tab">SEMUA PESANAN</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link font-weight-bold" id="menunggu-pembayaran-tab" type="button"
                            data-bs-toggle="tab">MENUNGGU PEMBAYARAN <span
                                class="badge-argavell">{{ count($badges->where('status', '0')) }}</span></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link font-weight-bold" id="pesanan-baru-tab" type="button"
                            data-bs-toggle="tab">PESANAN BARU <span
                                class="badge-argavell">{{ count($badges->where('status', '4')) }}</span></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link font-weight-bold" id="siap-dikirim-tab" type="button"
                            data-bs-toggle="tab">SIAP DIKIRIM <span
                                class="badge-argavell">{{ count($badges->where('status', '5')) }}</span></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link font-weight-bold" id="dalam-pengiriman-tab" type="button"
                            data-bs-toggle="tab">DALAM PENGIRIMAN <span
                                class="badge-argavell">{{ count($badges->where('status', '3')) }}</span></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link font-weight-bold" id="dikomplain-tab" type="button"
                            data-bs-toggle="tab">DIKOMPLAIN <span
                                class="badge-argavell">{{ count($refunds->where('status', '0')) }}</span></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link font-weight-bold" id="pesanan-selesai-tab" type="button"
                            data-bs-toggle="tab">PESANAN SELESAI</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link font-weight-bold" id="dibatalkan-tab" type="button"
                            data-bs-toggle="tab">DIBATALKAN</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="semua-pesanan">
                        <div class="row gx-3 mt-3">
                            <div class="col-4 position-relative">
                                <span
                                    class="fa fa-fw fa-search position-absolute top-50 start-0 translate-middle-y ps-4 fs-6 text-secondary"></span>
                                <input type="text" id="input-search" class="form-control ps-5"
                                    onkeyup="fetch_data_by_name();" placeholder="Search by product name">
                            </div>
                            <div class="col-4">
                                <select class="form-select" id="sort" name="sort" onchange="fetch_data_sort();">
                                    <option value="latest" selected>Terbaru</option>
                                    <option value="oldest">Terlama</option>
                                </select>
                            </div>
                            <div class="col-4 position-relative">
                                <span
                                    class="fa fa-fw fa-calendar-day position-absolute top-50 end-0 translate-middle-y pe-5 fs-6 text-secondary"></span>
                                <input type="text" name="daterange" id="filter-date" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-none align-items-center gx-3 mb-3" id="select-all-row">
        <div class="mx-2" id="select-all-checkbox">
            <input type="checkbox" id="check-all" />
            <span class="font-weight-bold ms-2">Select All</span>
        </div>
        <div class="mx-2 d-block" id="select-all-accept">
            <button class="btn btn-admin-light shadow-sm text-decoration-none" data-bs-toggle="modal"
                data-bs-target="#acceptModal">
                Terima Pesanan
            </button>
        </div>
        <div class="mx-2 d-none" id="select-all-label">
            <button class="btn btn-admin-light shadow-sm text-decoration-none" data-bs-toggle="modal"
                data-bs-target="#labelModal">
                Cetak Label
            </button>
        </div>
        {{-- <div class="mx-2 d-none" id="select-all-invoice">
            <button class="btn btn-admin-light shadow-sm text-decoration-none">
                Cetak Invoice
            </button>
        </div> --}}
        <div class="mx-2" id="select-all-download">
            <button class="btn btn-admin-light shadow-sm text-decoration-none" id="button-download-submit" onclick="event.preventDefault();
                                        document.getElementById('download-product-list-form').submit();">
                Download Daftar Produk
            </button>
        </div>
    </div>
    @include('admin.transaction.inc.modal.label')
    @include('admin.transaction.inc.modal.accept_all')
    <div class="row gy-3" id="transaction-container">
        @include('admin.transaction.inc.transaction')
    </div>
    <form action="{{ route('admin.transaction.downloadproductlist') }}" method="post" id="download-product-list-form">
        @csrf
        <input type="hidden" name="transactions[]" id="transaction-download">
    </form>
@endsection

@section('scripts')
    <script>
        var loadFile = function(event, order) {
            $('#file-bukti').attr('href', URL.createObjectURL(event.target.files[0]));
            $('#file-bukti').html(event.target.files[0].name);
            $('#no-bukti').removeClass('d-block').addClass('d-none');
            $('#yes-bukti').removeClass('d-none').addClass('d-block');
            $('#transaction-button-' + order).prop("disabled", false);
        };
    </script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(function() {
            $('#filter-date').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                var hostname = "{{ request()->getHost() }}"
                var url = ""
                if (hostname.includes('www')) {
                    url = "https://" + hostname
                } else {
                    url = "{{ config('app.url') }}"
                }
                $.post(url + "/admin/transaction/fetch_data_" + method, {
                        _token: CSRF_TOKEN,
                        start: start.format('YYYY-MM-DD'),
                        end: end.format('YYYY-MM-DD')
                    })
                    .done(function(data) {
                        $('#transaction-container').html(data);
                    })
                    .fail(function(error) {
                        console.log(error);
                    });
            });
        });
    </script>
    <script>
        $(function() {
            $('#report-date').daterangepicker({
                "alwaysShowCalendars": true,
                ranges: {
                    'Hari Ini': [moment(), moment()],
                    'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
                    '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
                    'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
                    'Bulan Kemarin': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                opens: 'right'
            }, function(start, end, label) {
                $('#report-date-start').val(start.format('YYYY-MM-DD'))
                $('#report-date-end').val(end.format('YYYY-MM-DD'))
            });
        });
    </script>
    <script>
        var method = 'all'
        var page = 1

        $('#semua-pesanan-tab').click(function() {
            method = 'all'
            page = 1
            $('#sort').val('latest');
            fetch_data(page, method);
        });

        $('#menunggu-pembayaran-tab').click(function() {
            method = 'waiting'
            page = 1
            $('#sort').val('latest');
            fetch_data(page, method);
        });

        $('#pesanan-baru-tab').click(function() {
            method = 'new'
            page = 1
            $('#sort').val('latest');
            fetch_data(page, method);
        });

        $('#siap-dikirim-tab').click(function() {
            method = 'ready'
            page = 1
            $('#sort').val('latest');
            fetch_data(page, method);
        });

        $('#dalam-pengiriman-tab').click(function() {
            method = 'ondelivery'
            page = 1
            $('#sort').val('latest');
            fetch_data(page, method);
        });

        $('#dikomplain-tab').click(function() {
            method = 'complain'
            page = 1
            $('#sort').val('latest');
            fetch_data(page, method);
        });

        $('#pesanan-selesai-tab').click(function() {
            method = 'delivered'
            page = 1
            $('#sort').val('latest');
            fetch_data(page, method);
        });

        $('#dibatalkan-tab').click(function() {
            method = 'canceled'
            page = 1
            $('#sort').val('latest');
            fetch_data(page, method);
        });

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            page = $(this).attr('href').split('page=')[1];
            fetch_data(page, method);
        });

        function fetch_data(page, method) {
            changePageMenu();
            $.ajax({
                    url: "transaction/pagination/fetch_data_" + method + "?page=" + page,
                    success: function(data) {
                        $('#transaction-container').html(data);
                    }
                })
                .fail(function(error) {
                    console.log(error);
                });
        }

        function fetch_data_by_name() {
            changePageMenu();
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $.post(url + "/admin/transaction/fetch_data_" + method, {
                    _token: CSRF_TOKEN,
                    data: $('#input-search').val(),
                    sort: $('#sort').val()
                })
                .done(function(data) {
                    $('#transaction-container').html(data);
                })
                .fail(function(error) {
                    console.log(error);
                });
        }

        function fetch_data_sort() {
            changePageMenu();
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $.post(url + "/admin/transaction/fetch_data_" + method, {
                    _token: CSRF_TOKEN,
                    data: $('#input-search').val(),
                    sort: $('#sort').val()
                })
                .done(function(data) {
                    $('#transaction-container').html(data);
                })
                .fail(function(error) {
                    console.log(error);
                });
        }

        function changePageMenu() {
            $('#check-all').prop('checked', false);
            emptyAcceptArray();
            emptyDownloadArray();
            emptyLabelArray();
            refreshTransactionListOnAcceptModal();
            if (method == 'all' || method == 'waiting') {
                $('#select-all-row').removeClass('d-flex').addClass('d-none')
            } else {
                $('#select-all-row').removeClass('d-none').addClass('d-flex')
            }
            if (method == 'new') {
                $('#select-all-accept').removeClass('d-none').addClass('d-block')
            } else {
                $('#select-all-accept').removeClass('d-block').addClass('d-none')
            }
            if (method == 'ready') {
                $('#select-all-label').removeClass('d-none').addClass('d-block')
            } else {
                $('#select-all-label').removeClass('d-block').addClass('d-none')
            }
            if (method == 'delivered') {
                $('#select-all-invoice').removeClass('d-none').addClass('d-block')
            } else {
                $('#select-all-invoice').removeClass('d-block').addClass('d-none')
            }
        }
    </script>
    <script>
        // checkall
        var label_array = []
        var accept_array = []
        var download_array = []

        $("#check-all").click(function() {
            if (!$("#check-all").is(":checked")) {
                //kalau ada yang kecentang dari semua checkbox dia ngilangin semuanya dulu
                if (method == 'ready') {
                    $('.checkbox-transaction-label').each(function() {
                        this.checked = false;
                    });
                    emptyLabelArray();
                    emptyDownloadArray();
                } else if (method == 'new') {
                    $('.checkbox-transaction-accept').each(function() {
                        this.checked = false;
                    });
                    emptyAcceptArray();
                    emptyDownloadArray();
                    refreshTransactionListOnAcceptModal()
                } else {
                    $('.checkbox-transaction-download').each(function() {
                        this.checked = false;
                    });
                    emptyDownloadArray();
                }
            } else {
                if (method == 'ready') {
                    $('.checkbox-transaction-label').each(function() {
                        if (!this.checked) {
                            this.checked = true;
                            label_array.push($(this).val());
                            download_array.push($(this).val());
                            $('#transaction-label').val(label_array);
                            $('#transaction-download').val(download_array);
                            $('#label-description').text('Anda akan mencetak label untuk ' + label_array
                                .length +
                                ' pesanan sekaligus')
                            if (label_array.length > 0) {
                                $('#button-label-submit').prop("disabled", false);
                            } else {
                                $('#button-label-submit').prop("disabled", true);
                            }
                            if (download_array.length > 0) {
                                $('#button-download-submit').prop("disabled", false);
                            } else {
                                $('#button-download-submit').prop("disabled", true);
                            }
                        }
                    });
                } else if (method == 'new') {
                    $('.checkbox-transaction-accept').each(function() {
                        if (!this.checked) {
                            this.checked = true;
                            accept_array.push($(this).val());
                            download_array.push($(this).val());
                            $('#transaction-accept').val(accept_array);
                            $('#transaction-download').val(download_array);
                            if (accept_array.length > 0) {
                                $('#button-accept-submit').prop("disabled", false);
                            } else {
                                $('#button-accept-submit').prop("disabled", true);
                            }
                            if (download_array.length > 0) {
                                $('#button-download-submit').prop("disabled", false);
                            } else {
                                $('#button-download-submit').prop("disabled", true);
                            }
                        }
                    });
                    refreshTransactionListOnAcceptModal()
                } else {
                    $('.checkbox-transaction-download').each(function() {
                        if (!this.checked) {
                            this.checked = true;
                            download_array.push($(this).val());
                            $('#transaction-download').val(download_array);
                            if (download_array.length > 0) {
                                $('#button-download-submit').prop("disabled", false);
                            } else {
                                $('#button-download-submit').prop("disabled", true);
                            }
                        }
                    });
                }
            }
        });

        function emptyLabelArray() {
            label_array = []
            $('#transaction-label').val(label_array);
            $('#label-description').text('Anda akan mencetak label untuk ' + label_array.length +
                ' pesanan sekaligus')
            $('#button-label-submit').prop("disabled", true);
        }

        function emptyAcceptArray() {
            accept_array = []
            $('#transaction-accept').val(accept_array);
            $('#button-accept-submit').prop("disabled", true);
        }

        function emptyDownloadArray() {
            download_array = []
            $('#transaction-download').val(download_array);
            $('#button-download-submit').prop("disabled", true);
        }

        function addLabelToArray(id) {
            if ($('#checkbox-transaction-label' + id).is(":checked")) {
                label_array.push($('#checkbox-transaction-label' + id).val());
                download_array.push($('#checkbox-transaction-label' + id).val());
                $('#transaction-label').val(label_array);
                $('#transaction-download').val(download_array);
                $('#label-description').text('Anda akan mencetak label untuk ' + label_array
                    .length +
                    ' pesanan sekaligus')
                if (label_array.length > 0) {
                    $('#button-label-submit').prop("disabled", false);
                } else {
                    $('#button-label-submit').prop("disabled", true);
                }
                if (download_array.length > 0) {
                    $('#button-download-submit').prop("disabled", false);
                } else {
                    $('#button-download-submit').prop("disabled", true);
                }
            } else {
                const index = label_array.indexOf($('#checkbox-transaction-label' + id).val());
                label_array.splice(index, 1);
                download_array.splice(index, 1);
                $('#transaction-label').val(label_array);
                $('#transaction-download').val(download_array);
                $('#label-description').text('Anda akan mencetak label untuk ' + label_array
                    .length +
                    ' pesanan sekaligus')
                if (label_array.length > 0) {
                    $('#button-label-submit').prop("disabled", false);
                } else {
                    $('#button-label-submit').prop("disabled", true);
                }
                if (download_array.length > 0) {
                    $('#button-download-submit').prop("disabled", false);
                } else {
                    $('#button-download-submit').prop("disabled", true);
                }
            }
        }

        function addAcceptToArray(id) {
            if ($('#checkbox-transaction-accept' + id).is(":checked")) {
                accept_array.push($('#checkbox-transaction-accept' + id).val());
                download_array.push($('#checkbox-transaction-accept' + id).val());
                $('#transaction-accept').val(accept_array);
                $('#transaction-download').val(download_array);
                if (accept_array.length > 0) {
                    $('#button-accept-submit').prop("disabled", false);
                } else {
                    $('#button-accept-submit').prop("disabled", true);
                }
                if (download_array.length > 0) {
                    $('#button-download-submit').prop("disabled", false);
                } else {
                    $('#button-download-submit').prop("disabled", true);
                }
            } else {
                const index = accept_array.indexOf($('#checkbox-transaction-accept' + id).val());
                accept_array.splice(index, 1);
                download_array.splice(index, 1);
                $('#transaction-accept').val(accept_array);
                $('#transaction-download').val(download_array);
                if (accept_array.length > 0) {
                    $('#button-accept-submit').prop("disabled", false);
                } else {
                    $('#button-accept-submit').prop("disabled", true);
                }
                if (download_array.length > 0) {
                    $('#button-download-submit').prop("disabled", false);
                } else {
                    $('#button-download-submit').prop("disabled", true);
                }
            }
            refreshTransactionListOnAcceptModal()
        }

        function addDownloadToArray(id) {
            if ($('#checkbox-transaction-download' + id).is(":checked")) {
                download_array.push($('#checkbox-transaction-download' + id).val());
                $('#transaction-download').val(download_array);
                if (download_array.length > 0) {
                    $('#button-download-submit').prop("disabled", false);
                } else {
                    $('#button-download-submit').prop("disabled", true);
                }
            } else {
                const index = download_array.indexOf($('#checkbox-transaction-download' + id).val());
                download_array.splice(index, 1);
                $('#transaction-download').val(download_array);
                if (download_array.length > 0) {
                    $('#button-download-submit').prop("disabled", false);
                } else {
                    $('#button-download-submit').prop("disabled", true);
                }
            }
        }

        function refreshTransactionListOnAcceptModal() {
            var hostname = "{{ request()->getHost() }}"
            var url = ""
            if (hostname.includes('www')) {
                url = "https://" + hostname
            } else {
                url = "{{ config('app.url') }}"
            }
            $.post(url + "/admin/transaction/refresh_transaction_list_on_accept_modal", {
                    _token: CSRF_TOKEN,
                    data: accept_array,
                })
                .done(function(data) {
                    $('#accept-modal-transaction-list').html(data);
                })
                .fail(function(error) {
                    console.log(error);
                });
        }
    </script>
@endsection
