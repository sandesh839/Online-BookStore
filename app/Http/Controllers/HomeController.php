<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Stripe\PaymentIntent;
use Stripe\Stripe;


//hamle 21 ma Auth use gareko xau tei vara facades/auth gareko
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Reply;

// use Session;
// use Stripe;


// hamle 21 line ma user vanni leyeu tesaile models/user create gareko

class HomeController extends Controller
{
    /**
     * Redirect user to dashboard (example behavior).
     */


    public function index()

    //for showing products in home page
    {
        $products = Product::paginate(2);

        //for show last comment on top
         $comments = comment::orderBy('id', 'desc')->get();
         
          $replies = reply::all();
        //paginate le page haru ma divide garxa 3 dexam vane 3 ota product matra dekhaune
        return view('home.userpage', compact('products', 'comments', 'replies'));
    }

    public function redirect()
    {

        //for redirecting users based on usertype
        // return redirect()->route('dashboard');

        $usertype = Auth::user()->usertype;
        //$userype hamle rakheko je rakheni hunxa

        if($usertype=='1') //if usertype is 1 then admin ma janxa
        {
            //calculate total products
            $total_products = Product::all()->count();
            //calculate total orders
            $total_orders = Order::all()->count();
            //calculate total customers
            $total_customers = User::all()->count();

            //calculate total revenue
            $orders=Order::all();
            $total_revenue=0;
            foreach($orders as $order)
            {
                $total_revenue=$total_revenue + $order->price;
            }

            //for delivery status
            $total_delivered=Order::where('delivery_status','=','delivered')->get()->count();
            $total_processing=Order::where('delivery_status','=','processing')->get()->count();
            
            //all le sabai product lina milxa ani count le ginna milxa
            return view('admin.home', compact('total_products', 'total_orders', 'total_customers', 'total_revenue', 'total_delivered', 'total_processing'));
        }
        else
        {
            $products = Product::paginate(10);
            $comments = comment::orderBy('id', 'desc')->get();
            $replies = reply::all();
        //paginate le page haru ma divide garxa 3 dexam vane 3 ota product matra dekhaune
        return view('home.userpage', compact('products', 'comments', 'replies'));

            //yo garyo vane userle login garda dashboard mai janxa
        }
    }
    public function product_details($id)
    {
        //for showing product details
        $products = Product::find($id);
        return view('home.product_details', compact('products'));
    }

    public function add_cart(Request $request, $id)
{

    //for adding products to cart
    if(Auth::id())
    {
        $user = Auth::user();
        $userid = $user->id;
        $product = Product::find($id);
        $product_exist_id = Cart::where('product_id', '=' , $id)->where('user_id','=' , $user->id)->get('id')->first();

if($product_exist_id!=null)
{
    //this means product already exist in cart so we have to update quantity only
$cart = Cart::find($product_exist_id)->first();

$quantity = $cart->quantity;
$cart->quantity = $cart->quantity + $request->quantity;
//yo quantity ka ho vane tyo user le kati ota cart ma rakhne bhanera pathaune value ho hamle name-=quantity gareko xau tesaile add_cart wala ma product.blade.php ma

//yedi vitra yautai saman xa vane tyo saman ko quantity badhaune naya banaune derai cart hudai janna yautama
//end quantity update garne

//price update garne
 if($product->discount_price != null)
        {
            $cart->price = $product->discount_price * $cart->quantity;
        }
        else
        {
            $cart->price = $product->price * $cart->quantity;
        }
//end price update garne

$cart->save();
return redirect()->back()->with('message', 'Product quantity updated in cart successfully');
}

else
{
    $cart = new Cart;

        $cart->name = $user->name;
        $cart->email = $user->email;
        $cart->phone = $user->phone;
        $cart->address = $user->address;
        $cart->user_id = $user->id;

        $cart->product_title = $product->title;

        if($product->discount_price != null)
        {
            $cart->price = $product->discount_price * $request->quantity;
        }
        else
        {
            $cart->price = $product->price * $request->quantity;
        }

        $cart->image = $product->image;
        $cart->product_id = $product->id;
        $cart->quantity = $request->quantity;

        $cart->save();   // ✔ IMPORTANT

        return redirect()->back()->with('message', 'Product added to cart successfully');
    
}

        // $cart = new Cart;

        // $cart->name = $user->name;
        // $cart->email = $user->email;
        // $cart->phone = $user->phone;
        // $cart->address = $user->address;
        // $cart->user_id = $user->id;

        // $cart->product_title = $product->title;

        // if($product->discount_price != null)
        // {
        //     $cart->price = $product->discount_price * $request->quantity;
        // }
        // else
        // {
        //     $cart->price = $product->price * $request->quantity;
        // }

        // $cart->image = $product->image;
        // $cart->product_id = $product->id;
        // $cart->quantity = $request->quantity;

        // $cart->save();   // ✔ IMPORTANT

        // return redirect()->back()->with('message', 'Product added to cart successfully');
    }
    else
    {
        return redirect('login');
    }
}


    public function show_cart()
    {

        // home page ma cart ko button xa tyo click garda 
        // yo function call hunxa yedi user login xaina vane
        // $user = Auth::user();
    if(Auth::id())
    {
       $id=Auth::user()->id;

        $cart = Cart::where('user_id', $id)->get();
        //where le user id milaune ani get le sabai data lina milxa

        return view('home.showcart', compact('cart'));
    }
    else
    {
        return redirect('login');
       
    }
    }

    //for removing cart items
    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        //cart find gareko

        $cart->delete();
        //cart delete gareko

        return redirect()->back();
        //redirect gareko back();
    }


    //for cash on delivery
    public function cash_order()    
    {
        //storelogin user data on $user variable
        $user = Auth::user();

       // $userid is a variable - user id store garxa $userid vitra
        $userid = $user->id;

        //$user _id dexam vane (get) garda tala same name dina parxa
        $data= Cart::where('user_id', '=' ,$userid)->get();

        foreach($data as $cart_item)
        {
            //create new order for each cart item
            $order = new Order;

            $order->name = $cart_item->name;
            $order->email = $cart_item->email;
            $order->phone = $cart_item->phone;
            $order->address = $cart_item->address;
            $order->user_id = $cart_item->user_id;
            $order->product_title = $cart_item->product_title;
            $order->quantity = $cart_item->quantity;
            $order->price = $cart_item->price;
            $order->image = $cart_item->image;
            $order->product_id = $cart_item->product_id;
            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';

            $order->save();

            // after saving order, delete this cart item
            $cart_item->delete();
        }

        return redirect()->back()->with('message', 'We Have Received Your Order. We will contact you soon!');
    }

    //for stripe payment
    public function stripe($totalprice)
{
    return view('home.stripe', compact('totalprice'));
}

public function createPaymentIntent(Request $request)
{
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => $request->amount * 100,      // cents
        'currency' => 'usd',
        'payment_method_types' => ['card'],      // IMPORTANT
    ]);

    //for cart product delete
    $user = Auth::user();

       // $userid is a variable - user id store garxa $userid vitra
        $userid = $user->id;

        //$user _id dexam vane (get) garda tala same name dina parxa
        $data= Cart::where('user_id', '=' ,$userid)->get();

        foreach($data as $cart_item)
        {
            //create new order for each cart item
            $order = new Order;

            $order->name = $cart_item->name;
            $order->email = $cart_item->email;
            $order->phone = $cart_item->phone;
            $order->address = $cart_item->address;
            $order->user_id = $cart_item->user_id;
            $order->product_title = $cart_item->product_title;
            $order->quantity = $cart_item->quantity;
            $order->price = $cart_item->price;
            $order->image = $cart_item->image;
            $order->product_id = $cart_item->product_id;
            $order->payment_status = 'Paid';
            $order->delivery_status = 'processing';

            $order->save();

            // after saving order, delete this cart item
            $cart_item->delete();
        }

    //end cart product delete

    return response()->json([
        'clientSecret' => $paymentIntent->client_secret,
    ]);
}



//     public function stripe($totalprice)
//     {
//         return view('home.stripe', compact('totalprice'));

// }
    // {
        // return view('home.stripe', compact('totalprice'));
// }
    

//to show orders
public function show_order()
{
    if(Auth::id())
    {
        $user = Auth::user();
       $id=Auth::user()->id;

        $orders = Order::where('user_id', $id)->get();
        //where le user id milaune ani get le sabai data lina milxa

        return view('home.showorder', compact('orders'));
    }
    else
    {
        return redirect('login');
       
    }
}

//for cancel order
public function cancel_order($id)
{
    $order = Order::find($id);
    $order->delivery_status = 'You Cancelled The Order';
    $order->save();

    return redirect()->back()->with('message', 'Order has been cancelled successfully!');
}

//for adding comment
public function add_comment(Request $request)
{
    if(Auth::id())
    {
      $comments = new comment;

    $comments->name = Auth::user()->name;
    $comments->user_id = Auth::user()->id;
    $comments->comment = $request->comment;
    $comments->save();
    return redirect()->back();
    }

    else
    {
        return redirect('login');
    }   
}

//for replying comment
public function add_reply(Request $request)
{
    if(Auth::id())
    {
      $reply = new reply;

    $reply->name = Auth::user()->name;
    $reply->user_id = Auth::user()->id;
    $reply->reply = $request->reply;
    $reply->comment_id = $request->commentId;
    $reply->save();
    return redirect()->back();
    }

    else
    {
        return redirect('login');
    }
}

// Show Edit Comment Form
public function edit_comment($id)
{
    $comment = comment::find($id);

    if(!$comment){
        return redirect()->back()->with('error', 'Comment not found.');
    }

    return view('home.edit_comment', compact('comment'));
}


// Update Comment
public function update_comment(Request $request, $id)
{
    $comment = comment::find($id);

    $comment->comment = $request->comment;
    $comment->save();

    return redirect('/#comments')->with('success', 'Comment updated successfully!');
}

//for delete comment
public function delete_comment($id)
{
    $comment = comment::find($id);

    if(!$comment){
        return redirect()->back()->with('error', 'Comment not found.');
    }

    $comment->delete();
    return redirect('/#comments')->with('success', 'Comment deleted successfully!');
}



//for search product
public function search_product(Request $request)
{
    $search_text = $request->search;
    $products = Product::where('title', 'LIKE', "%$search_text%")->orWhere('category', 'LIKE', "$search_text")->paginate(10);
  

    $comments = comment::orderBy('id', 'desc')->get();
    $replies = reply::all();

    return view('home.userpage', compact('products', 'comments', 'replies'));   
}

//for books listing
public function books()
{
    
    $products = Product::where('category', 'LIKE', 'book')->paginate(10);

    $comments = comment::orderBy('id', 'desc')->get();
    $replies = reply::all();
return view('home.all_books', compact('products', 'comments', 'replies'));
}



//for editing reply
// Replies
public function edit_reply($id)
{
    $reply = reply::find($id);
    if (!$reply) return redirect()->back()->with('error','Reply not found.');
    return view('home.edit_reply', compact('reply'));
}

//for updating reply
public function update_reply(Request $request, $id)
{
    $reply = reply::find($id);
    $reply->reply = $request->reply;
    $reply->save();
    return redirect('/#comments')->with('success','Reply updated successfully!');
}


//deleteing reply comment by userid
// Delete a reply
public function delete_reply($id)
{
    $reply = reply::find($id);

    if (!$reply) {
        return redirect()->back()->with('error', 'Reply not found.');
    }

    $reply->delete();

    return redirect()->back()->with('success', 'Reply deleted successfully!');
}


//for contact us
public function contact()
{
    return view('home.contact');
}


}