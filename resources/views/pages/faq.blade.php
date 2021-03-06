@extends('layouts.app')

@section('content')
    {{-- desktop header --}}
    <div class="row w-100 m-0 align-items-center d-none d-sm-flex">
        <div class="col-md-2"></div>
        <div class="col-md-5 pe-5">
            <img src="{{ asset('images/argan-fruit.png') }}" width="150px">
            <h1 class="text-argavell font-elmessiri font-weight-bold">Frequently Asked Questions</h1>
            <div class="pe-4">You can find answers to some of the most frequently asked questions.
            </div>
        </div>
        <div class="col-md-5 p-0">
            <img src="{{ asset('images/faq.jpg') }}" class="w-100">
        </div>
    </div>
    {{-- mobile header --}}
    <div class="row w-100 m-0 align-items-center pt-5 d-block d-sm-none text-center">
        <div class="col-12 p-0 py-4">
            <img src="{{ asset('images/faq.jpg') }}" class="w-100">
        </div>
        <div class="col-md-5">
            <img src="{{ asset('images/argan-fruit.png') }}" width="100px">
            <h1 class="text-argavell font-elmessiri font-weight-bold text-4xl">Frequently Asked Questions</h1>
            <div class="px-2 text-start">You can find answers to some of the most frequently asked questions.</div>
        </div>
    </div>
    <div class="row py-4 align-items-center justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">
            @foreach ($faqs as $faq)
                <div class="card-body pt-2 pb-0">
                    <div class="card card-sm card-body border border-argavell rounded mb-2 pb-2">
                        <div data-bs-toggle="collapse" data-bs-target="#panel-{{ $loop->iteration }}" role="button"
                            aria-expanded="false" aria-controls="panel-{{ $loop->iteration }}"
                            class="d-flex justify-content-between text-argavell" onclick="faqToggle(this)">
                            <span class="h6"><span class="fa fa-fw fa-tint me-2"></span>{{ $faq->question }}</span>
                            <span class="fa fa-fw fa-plus faq-icon"></span>
                        </div>
                        <div class="collapse" id="panel-{{ $loop->iteration }}">
                            <p class="ms-4 mb-0">{{ $faq->answer }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row w-100 landing-showcase-background text-center py-5 m-0 position-relative" style="height:45vh;">
        <img src="{{ asset('images/landing-argan-oil.jpg') }}" class="d-block w-100 position-absolute top-0 p-0"
            style="height: 100%;object-fit: cover;">
        <div class="position-absolute top-50 start-50 translate-middle" style="z-index: 11;">
            <h1 class="font-elmessiri text-white mt-5">Which Argavell Product Made<br>You Fall In Love?</h1>
            <a href="#" class="text-decoration-none d-none d-sm-block">
                <div class="btn-argavell-light text-center w-25 py-2 cursor-pointer mx-auto mb-5 font-weight-bold">Browse Products</div>
            </a>
            <a href="#" class="text-decoration-none d-block d-sm-none">
                <div class="btn-argavell-light text-center w-50 py-2 cursor-pointer mx-auto mb-5 font-weight-bold">Browse Products</div>
            </a>
        </div>
    </div>
    <script>
        function faqToggle(panel) {
            if ($(panel).find(".faq-icon").hasClass('fa-plus')) {
                $(panel).find(".faq-icon").removeClass('fa-plus');
                $(panel).find(".faq-icon").addClass('fa-minus');
            } else {
                $(panel).find(".faq-icon").removeClass('fa-minus');
                $(panel).find(".faq-icon").addClass('fa-plus');
            }
        }

    </script>
@endsection
