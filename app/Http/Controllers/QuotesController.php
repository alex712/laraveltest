<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class QuotesController extends Controller
{
    public function index()
    {
        return view('quotes');
    }
    
    public function thankyou()
    {
        return view('thankyou');
    }
    
    public function save(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'password' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect('quotes')
            ->withErrors($validator)
            ->withInput();
        }
        
        $quote = Quote::create($request->all());
        
        $quote->password = Hash::make($request->input('password'));
        
        if($quote->save()) {
            return redirect('quotes/thankyou');
        }
    }
}
