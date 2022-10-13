<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function index() {
        return view('quotation');
    }

    public function calQuotation(Request $request) {
        $data = $request->validate([
            'totalProductPrice' => 'required',
            'totalDiscount' => 'required',
            'vat' => 'required'
        ]);

        $response['totalPrice'] = $data['totalProductPrice'] - $data['totalDiscount'];
        $response['totalVat'] = ($response['totalPrice'] * $data['vat']) / 100;
        $response['amount'] = $response['totalPrice'] + $response['totalVat'];

        return response()->json($response);
    }
}
