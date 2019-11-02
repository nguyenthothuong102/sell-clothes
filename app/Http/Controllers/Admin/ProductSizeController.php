<?php

namespace App\Http\Controllers\Admin;

use App\ProductSize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductSizeController extends Controller
{
    public function index()
    {
        return view('admin.productsizes.index', ['productsize' => ProductSize::paginate(10)]);

    }

    public function edit($id)
    {

        return view('admin.productsizes.edit', ['productsizes' => ProductSize::find($id)]);
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
        $productsizes = ProductSize::find($id);

        $productsizes->size= $request->size;
        $productsizes->quantity = $request->quantity;
        $productsizes->product_id = $request->product_id;
        $productsizes->save();

        Session::flash('success','Cập nhật thành công!');
        return redirect()->route('admin.productsize.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
}
