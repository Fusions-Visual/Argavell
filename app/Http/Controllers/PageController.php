<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function arganoil()
    {
        return view('pages.argan_oil');
    }

    public function arganshampoo()
    {
        return view('pages.argan_shampoo');
    }

    public function kleanse()
    {
        return view('pages.kleanse');
    }

    public function termsconditions()
    {
        return view('pages.terms_conditions');
    }

    public function authorizedreseller()
    {
        return view('pages.authorized_reseller');
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function returnpolicy()
    {
        return view('pages.return_policy');
    }

    public function productdetail()
    {
        return view('pages.product_detail');
    }

    public function checkout()
    {
        return view('pages.checkout');
    }

    public function paymentconfirmation()
    {
        return view('pages.payment_confirmation');
    }

    public function profile()
    {
        return view('pages.profile');
    }

    public function transactions()
    {
        return view('pages.transactions');
    }

    public function address()
    {
        return view('pages.my_address');
    }
}