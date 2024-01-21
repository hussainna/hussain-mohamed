<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; // Import the Request class


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $products=DB::table('products')->get();

    return view('master',compact('products'));
});

Route::get('/single-product/{id}', function ($id) {
    $product=DB::table('products')->where('id',$id)->first();

    return view('singleProduct',compact('product'));
});

Route::get('/cart', function () {
    if(auth()->check())
    {
        $cart = DB::table('cart')->where('user_id', Auth::id())->get();
        $cartProductIds = $cart->pluck('product_id'); // Get the product IDs from the cart
        
        $products = DB::table('products')->whereIn('id', $cartProductIds)->get();
        return view('cart',compact('cart','products'));

    }else{
        return redirect('/');
    }
});

Route::post('/insert-orders', function (Request $request) {
    if(auth()->check())
    {
        $cart = DB::table('cart')->where('user_id', Auth::id())->get();

        foreach($cart as $c){
                    DB::table('orders')->insert([
            'product_id' => $c->product_id,
            'user_id'=>Auth::id(),
           

        ]);
        DB::table('cart')->where('user_id',Auth::id())->truncate();


        }


        return redirect('/');

    }else{
        return redirect('/');
    }
});




Route::get('/checkout', function () {
    return view('checkout');
});

Route::post('/add-to-cart', function (Request $request) {
    if(auth()->check())
    {
        $productId = $request->input('product_id');
        DB::table('cart')->insert([
            'product_id' => $productId,
            'user_id'=>Auth::id(),
        ]);
        return response()->json(['status'=>200]);

    }else{
        return redirect('/');
    }
});

Route::get('/delete-cart/{id}', function (Request $request,$id) {
    if(auth()->check())
    {
        DB::table('cart')->where('id', $id)->delete();
        return redirect('/cart');

    }else{
        return redirect('/');
    }
});




Route::get('/admin', function () {
    if(auth()->check() && Auth::user()->email === 'admin@gmail.com')
    {
        return view('admin.index');

    }else{
        return redirect('/');
    }
});

Route::get('/admin/products', function () {
    if(auth()->check() && Auth::user()->email === 'admin@gmail.com')
    {
        $products=DB::table('products')->get();
        return view('admin.pages.products.index',compact('products'));

    }else{
        return redirect('/');
    }
});
Route::get('/admin/orders', function () {
    if(auth()->check() && Auth::user()->email === 'admin@gmail.com')
    {
        $orders=DB::table('orders')->get();
        return view('admin.pages.orders.index',compact('orders'));

    }else{
        return redirect('/');
    }
});




Route::get('/admin/create-product', function () {
    if(auth()->check() && Auth::user()->email === 'admin@gmail.com')
    {
        return view('admin.pages.products.createProduct');

    }else{
        return redirect('/');
    }
});


Route::post('insert-product', function (Request $request) {
    if(auth()->check() && Auth::user()->email === 'admin@gmail.com')
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('uploads/image', $fileName);
        
            DB::table('products')->insert([
                'image' => $fileName,
                'name'=>$request->name,
                'price' => $request->price
            ]);
        } 
        return redirect('/admin/products');
        

    }else{
        return redirect('/');
    }
});

Route::get('delete-product/{id}', function (Request $request,$id){
    
    DB::table('products')->where('id', $id)->delete();
    return redirect('/admin/products');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
