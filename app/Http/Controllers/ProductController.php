<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
         $items = Product::all();
      return view ('pages.product.index')->with([
          'items' => $items
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        // nama barang
        // nama-barang
        Product::create($data);
        return redirect()->route('product.index')->with('status', 'Data Berhasil Ditambah!');
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
       $items = Product::findOrFail($id);

       return view('pages.product.update')->with([
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
    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $items = Product::findOrFail($id);
        $items -> update($data);
        return redirect()->route('product.index')->with('status', 'Data Berhasil Ditambah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Product::findOrFail($id);
        $items->delete();

        ProductGallery::where('product_id', $id)->delete();

        return redirect()->route('product.index')->with('status', 'Data Berhasil Dihapus!');
    }

    public function gallery (Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $items = ProductGallery::with('product')
                ->where('product_id',$id)
                ->get();
        return view('pages.product.gallery')->with([
            'items' => $items,
            'product' => $product
        ]);
    }
}
