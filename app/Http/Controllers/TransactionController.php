<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\TransactionDetails;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        
        
        $items = Transaction::all();

        return view('pages.transaction.index')->with([
            "items" => $items
        ]);
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
    //    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Transaction::with('details.product')->findOrFail($id);
        // dd($items);
        return view('pages.transaction.show')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Transaction::findOrFail($id);
        
        return view('pages.transaction.update')->with([
            'items' => $items
        ]);
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
       
        $data = $request->all();
        
        $items = Transaction::findOrFail($id);
        $items -> update($data);
       
        return redirect()->route('transaction.index')->with('Success Title', 'Success Message');;
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Transaction::findOrFail($id);
        $items->delete();

       

        return redirect()->route('transaction.index')->with('status', 'Data Berhasil Dihapus!');
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:PENDING,SUCCESS,FAILED'
        ]);

        $items = Transaction::findOrFail($id);
        $items->transaction_status = $request->status;

        $items->save();
        return redirect()->route('transaction.index')->with('status', 'Data Berhasil Diupdate!');

    }
}
