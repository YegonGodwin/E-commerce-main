<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Product_table;

class AdminController extends Controller
{
    public function view_category(){
        $category = Category::all();
        return view('admin.category', compact('category'));
    }
    public function add_category(Request $request){
        $data = new Category;

        $data->category_name = $request -> category;

        $data -> save();

        toastr() -> timeOut(10000)-> closeButton() -> addSuccess('Category added successfully');

        return redirect() -> back();

    }
    public function delete_category($id){

        $category = Category::find($id);

        $category -> delete();

        toastr() -> timeOut(10000) -> closeButton() -> addWarning('Categoy deleted successfully');

 
        return redirect() -> back();
    }
    public function edit_category($id){
        $category_edit = Category::find($id);
        return view('admin.edit_category', compact('category_edit'));
    }
    public function update_category(Request $request, $id){
        $data = Category::find($id);

        $data -> Category_name = $request -> category;

        $data -> save();

        toastr() -> timeOut(10000) -> closeButton() -> addSuccess('Category updated successfully');
        return redirect('/view_category');
    }
    public function add_product(){

        $category = Category::all();

        return view('admin.Add_product', compact('category'));
    }
    public function upload_product(Request $request){
        
        $data = new Product_table;

        $data -> title = $request -> title;

        $data -> description = $request -> description;

        $data -> price = $request -> price;

        $data -> quantity = $request -> quantity;

        $data -> Category = $request -> category;

        $img = $request -> image;

        if($img){

            $imageName = time().'.'.$img -> getClientOriginalExtension();

            $request -> image -> move('products', $imageName);

            $data -> image = $imageName;
        }

        $data -> save();

        toastr() -> timeOut(10000) -> closeButton() -> addSuccess('Product uploaded successfully!');

        return redirect('/view_product');
    }
    public function view_product(){

        $product = Product_table::paginate(2);

        return view('admin.view_product', compact('product'));
    }
    public function delete_product($id){
        
        $myProduct = Product_table::find($id);

        $image_path = public_path('products/' .$myProduct -> image);

        if(file_exists($image_path)){
            
            unlink($image_path);
            
        }

        $myProduct -> delete();
        
        toastr() -> timeOut(10000) -> closeButton() -> addSuccess('Product deleted successfully!');

        return redirect() -> back();
    }
    public function update_product($id){

        $data = Product_table::find($id);

        $category = Category::all();

        return view('admin.update_page', compact('data', 'category'));
    }
    public function edit_product(Request $request, $id){
        $data = Product_table::find($id);

        $data -> title = $request -> title;

        $data -> description = $request -> description;

        $data -> price = $request -> price;

        $data -> quantity = $request -> quantity;

        $data -> Category = $request -> category;

        $image = $request -> image;

        if($image){

            $imageName = time().'.'.$image-> getClientOriginalExtension();

            $request -> image -> move('products', $imageName);

            $data -> image = $imageName;
            
        }

        $data->save();

        toastr() -> timeOut(10000) -> closeButton() -> addInfo('Products Updated successfully!');

        return redirect('/view_product');

    }
    public function search_product(Request $request){

        $search = $request -> search;

        $product = Product_table::where('title', 'LIKE', '%'.$search.'%')-> orwhere('Category', 'LIKE', '%'.$search.'%') ->  paginate(2);

        return view('admin.view_product', compact('product'));

    }
    public function view_orders(){

        $data = Order::all();

        return view('admin.order', compact('data'));
    }
    public function on_the_way($id){

        $data = Order::find($id);

        $data -> status = 'On the way';

        $data -> save();

        return redirect('/view_orders');
    }
    public function delivered($id){

        $data = Order::find($id);

        $data -> status = 'Delivered';

        $data -> save();

        return redirect('/view_orders');
    }
    public function print_pdf($id){

        $data = Order::find($id);

        $pdf = Pdf::loadView('admin.invoice', compact('data'));

        return $pdf -> download('invoice.pdf');
    }
}
