<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Payment;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::where('user_id', Auth::id())->get();

        $cities = Http::withHeaders([
            'key' => config('services.rajaongkir.token'),
        ])->get('https://api.rajaongkir.com/starter/city')
            ->json()['rajaongkir']['results'];

        $provinces = Http::withHeaders([
            'key' => config('services.rajaongkir.token'),
        ])->get('https://api.rajaongkir.com/starter/province')
            ->json()['rajaongkir']['results'];

        $payments = Payment::where('id', '!=', 1001)->get();

        $items = Cart::where('transaction_id', null)->where('user_id', Auth::id())->get();
        $weight = 0;
        foreach ($items as $item) {
            $weight += $item->product->weight;
        }
        foreach ($cities as $city) {
            if (Auth::user()->address_id) {
                //! ini buat ngecek city_id
                // if ($city['city_name'] == 'Surabaya') {
                //     dd($city['city_id']);
                // }
                if ($city['city_name'] == Auth::user()->address->city) {
                    $useraddress = $city['city_id'];
                    $shipments = Http::withHeaders([
                        'key' => config('services.rajaongkir.token'),
                    ])->post('https://api.rajaongkir.com/starter/cost', [
                        'origin' => 444, //ini id Surabaya
                        'destination' => $useraddress,
                        'weight' => $weight,
                        'courier' => 'jne',
                    ])->json()['rajaongkir']['results'][0];
                }
            } else {
                $shipments = null;
            }
        }

        return view('user.Checkout.index', compact('addresses', 'cities', 'provinces', 'payments', 'shipments', 'weight'));
    }
    public function get_shipment(Request $request)
    {
        $shipments = Http::withHeaders([
            'key' => config('services.rajaongkir.token'),
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => 444, //@marshall ini perlu dirubah ke asal pengirim
            'destination' => $request->city_id,
            'weight' => $request->weight,
            'courier' => 'jne',
        ])->json()['rajaongkir']['results'][0];
        return view('user.Checkout.inc.shipment_list', compact('shipments'));
    }
    public function get_city(Request $request)
    {
        $cities = Http::withHeaders([
            'key' => config('services.rajaongkir.token'),
        ])->get('https://api.rajaongkir.com/starter/city')
            ->json()['rajaongkir']['results'];
        $cities = collect($cities)->where('province', $request->province);
        return $cities;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::find($request->id);
        $cart = Auth::user()->carts->where('transaction_id', null)->where('product_id', $product->id)->where('size', '=', $product['size'][$request->size] . "ml")->first();
        if ($cart) {
            if ($product['stock'][$request->size] > $request->quantity) {
                $cart->update([
                    'qty' => $cart->qty + $request->quantity
                ]);
            } else {
                $cart->update([
                    'qty' => $product['stock'][$request->size],
                ]);
            }
        } else {
            if ($product['stock'][$request->size] > $request->quantity) {
                $cart = Cart::create([
                    'qty' => $request->quantity,
                    'size' => $product['size'][$request->size] . "ml",
                    'key' => $request->size,
                    'price' => $product['price'][$request->size],
                    'price_discount' => $product['price_discount'][$request->size],
                    'product_id' => $request->id,
                    'user_id' => Auth::id(),
                    'transaction_id' => null
                ]);
            } else {
                $cart = Cart::create([
                    'qty' => $product['stock'][$request->size],
                    'size' => $product['size'][$request->size] . "ml",
                    'key' => $request->size,
                    'price' => $product['price'][$request->size],
                    'price_discount' => $product['price_discount'][$request->size],
                    'product_id' => $request->id,
                    'user_id' => Auth::id(),
                    'transaction_id' => null
                ]);
            }
        }
        $items = Cart::where('transaction_id', null)->where('user_id', Auth::id())->get();
        return view('inc.cart.product', compact('items'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Cart::find($id);
        $item->delete();
        return response()->json($item);
    }

    public function add_item(Request $request)
    {
        $item = Cart::find($request->id);
        if ($item->product->stock[$item->key] >= $item['qty'] + 1) {
            $item->update([
                'qty' => $item['qty'] + 1
            ]);
            return response()->json($item);
        } else {
            return 'false';
        }
    }

    public function subtract_item(Request $request)
    {
        $item = Cart::find($request->id);
        $item->update([
            'qty' => $item['qty'] - 1
        ]);
        if ($item->qty == 0) {
            $item->delete();
        }
        return response()->json($item);
    }
}
