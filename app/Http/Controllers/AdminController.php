<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;//for pdf
use App\Notifications\SendEmailNotification;//for email notification
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Notification;//for email notification
use Illuminate\Support\Facades\DB;//for charts
use App\Models\User;//for charts


class AdminController extends Controller
{
    //
    public function view_category()
    {
        if(Auth::id())
        {
            $data = Category::all();
        
        return view('admin.category', compact('data'));
        
    
}else{
    return redirect('login');
}
    }

    public function add_category(Request $request)
    // data post garni vaye request garna parxa
    {
        
        // Logic to add category
        $data = new Category;
        $data->category_name = $request->category;
        $data->save();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    public function view_product()
    {
        if(Auth::id())
        {  
            // $data = Category::find($id);
        $category = Category::all();
        // $categories = $category->all();
        return view('admin.product', compact('category')); 
        }
        else{
            return redirect('login');
        }   
        
    }

    public function add_product(Request $request)
    {
        //
        $product= new Product;
        $product->title= $request->title;
        $product->description= $request->description;
        $product->category= $request->category;
        $product->quantity= $request->quantity;
        $product->price= $request->price;
        $product->discount_price= $request->discount_price;
        // $product->image= $request->image;
        $image= $request->image;
        $imagename= time().'.'.$image->getClientOriginalExtension();
        $request->image->move('productimage', $imagename);
        $product->image= $imagename;
        $product->save();
        return redirect()->back()->with('message', 'Product Added Successfully');

    }


    public function show_product()
    {
        if(Auth::id())
        {
        $products= Product::all();
        return view('admin.show_product', compact('products'));
        }
        else{
            return redirect('login');
        }
    }

    public function edit_product($id)
    {
        $product= Product::find($id);
        $categories= Category::all();
        return view('admin.edit_product', compact('product', 'categories'));
    }   


    public function delete_product($id)
    {
        $product= Product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }

    public function edit_product_confirm(Request $request, $id)
    {
        $product= Product::find($id);
        $product->title= $request->title;
        $product->description= $request->description;
        $product->category= $request->category;
        $product->quantity= $request->quantity;
        $product->price= $request->price;
        $product->discount_price= $request->discount_price;

        $image= $request->image;

        if($image)
        {
            $imagename= time().'.'.$image->getClientOriginalExtension();
            $request->image->move('productimage', $imagename);
            $product->image= $imagename;
        }

        $product->save();
        return redirect()->back()->with('message', 'Product Updated Successfully');
    }

    //for order details
    public function order()
    {
        if(Auth::id())
        {
            $orders = Order::all();
        return view('admin.order', compact('orders'));  
        }
        else{
            return redirect('login');
        }
          
}


//for delivered
    public function delivered($id)
    {
        $orders = Order::find($id);
        $orders->delivery_status = "delivered";
        $orders->payment_status = "paid";
        $orders->save();
        return redirect()->back();
    }

    //for pdf
    public function print_pdf($id)
    {
        $orders = Order::find($id);
        $pdf = PDF::loadView('admin.pdf', compact('orders'));
                return $pdf->download('order_details.pdf');
    }

    //for email
    public function send_email($id)
    {
        $orders = Order::find($id);
        return view('admin.email_info', compact('orders'));
    }

    //for sending email
    public function send_user_email(Request $request, $id)
    {
        $orders = Order::find($id);
        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            // 'body' => 'if we write like this that sentences will be added automatucally',
            'button' => $request->button,
            'url' => $request->url,
            'closing' => $request->closing,
        ];

        Notification::send($orders, new SendEmailNotification($details));

        return redirect()->back()->with('message', 'Email Sent Successfully');
    }

    //for searching orders
    public function search_orders(Request $request)
    {
        $searchText = $request->search;
        $orders = Order::where('name', 'LIKE', "%$searchText%")
            ->orWhere('phone', 'LIKE', "%$searchText%")
            ->orWhere('email', 'LIKE', "%$searchText%")
            ->orWhere('product_title', 'LIKE', "%$searchText%")
            ->get();
        return view('admin.order', compact('orders'));
           }


           //for show charts
           public function showCharts() {
    // You can fetch real data from DB later
    return view('admin.charts'); // the blade file for charts
}



//for charts
public function charts()
{
    $books = Product::count();      // total books
    $orders = Order::count();       // total orders
    $users = User::count();         // total users

    return view('admin.charts', compact('books', 'orders', 'users'));
}


}