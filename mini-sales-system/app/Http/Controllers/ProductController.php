<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Sell;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
//use Symfony\Component\HttpFoundation\File\File;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index()
    {
        $user = 1;
        $products = Product::where('user_id', $user)->get();
        $allProducts = array();
        foreach ($products as $p) {
            $sellProducts = Sell::where('product_id', $p->id)->get();
            $total_sellProducts = 0;
            foreach ($sellProducts as $sp) {
                $total_sellProducts = $total_sellProducts + $sp->purchase_quantity;
            }

            $p->quantity_sold = $total_sellProducts;
            $p->total_sell_stock_pr = ($total_sellProducts * $p->sales_price);

            array_push($allProducts, $p);

        }

        return view('home')->with("products", $allProducts);
    }


    public function create()
    {

        return view('product.create');
    }

    public function insertproduct(Request $request)
    {

        $request->validate([

            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|numeric|gt:0',
            'purchase_price' => 'required|numeric|gt:0',
            'sales_price' => 'required|numeric|gt:0',
            'image' => 'required|image',
            'user_id' => 'required|numeric'

        ]);

        $products = new Product();
        $products->name = $request->name;
        $products->description = $request->description;
        $products->quantity = $request->quantity;
        $products->purchase_price = $request->purchase_price;
        $products->sales_price = $request->sales_price;
        if ($request->hasfile('image')) {

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images', $filename);
            $products->image = $filename;
        }
        $products->user_id = $request->user_id;
        $products->save();
        return redirect()->route('index');


    }

    public function editProduct(Request $req)
    {

        $id = $req->id;

        $products = Product::where('id', $id)->first();
        return view('product.edit', compact('products'));

    }

    public function deleteproduct($id)
    { {


            Product::find($id)->delete();
            return redirect()->route('index')->with('success', 'Data Deleted');
        }


    }

    public function updateproduct(Request $request, $id)
    {



        $products = Product::find($id);
        $products->name = $request->name;
        $products->description = $request->description;
        $products->quantity = $request->quantity;
        $products->purchase_price = $request->purchase_price;
        $products->sales_price = $request->sales_price;

        if ($request->hasfile('image')) {
            $destination = 'images' . $products->image;
            if (File::exists($destination)) {
                File::delete($destination);

            }

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images', $filename);
            $products->image = $filename;
        }
        $products->user_id = $request->user_id;
        $products->update();
        return redirect()->route('index');

    }


    public function addquantity(Request $request, $id)
    {


        $request->validate([

            'quantity' => 'required|numeric|gt:0',

        ]);

        $products = Product::find($id);
        $products->quantity = $products->quantity + $request->quantity;
        $products->update();
        return redirect()->route('index');

    }

    public function printlist(){

       //$products=Product::all();

       return view('index'); 

    }

}
