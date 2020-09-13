<?php

namespace App\Http\Controllers;

use App\Mail\OrderSummary;
use App\Order;
use App\Product;
use App\ProductOrder;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class BuyerController extends Controller
{
    public function front()
    {
        $products = Product::paginate(10);

        return view('buyers.index', compact('products'));
    }

    public function detail($id)
    {
        $product  = Product::where('id', $id)->first();
        $order    = Order::where('id', $id)->first();

        return view('buyers.detail', compact('product','order'));
    }

    public function addToCart(Request $request, $id)
    {
        if (Gate::allows('manage-buyer')) {
            $product    = Product::where('id', $id)->first();
            $user_id    = Auth::user()->id;

            $order_cek = Order::where('user_id', $user_id)->where('status', "CART")->first();
            if (empty($order_cek)) {
                $order                  = new Order();
                $order->user_id         = $user_id;
                $order->total_price     = 0;
                $order->invoice_number  = 'T'.mt_rand(00000, 99999).date('y').date('m').str_pad($product->id,3,'0',STR_PAD_LEFT);
                $order->status          = "CART";
                $order->save();
            }

            $new_order = Order::where('user_id', $user_id)->where('status', "CART")->first();

            $product_order_cek = ProductOrder::where('product_id', $product->id)->where('order_id', $new_order->id)->first();
            if (empty($product_order_cek)) {
                $product_order                 = new ProductOrder();
                $product_order->product_id     = $product->id;
                $product_order->order_id       = $new_order->id;
                $product_order->quantity       = $request->get('jumlah_pesan');
                $product_order->total_price    = $product->price * $request->get('jumlah_pesan');
                $product_order->save();
            } else {
                $product_order = ProductOrder::where('product_id', $product->id)->where('order_id', $new_order->id)->first();
                $product_order->quantity    = $product_order->quantity + $request->get('jumlah_pesan');
                $total                      = $product->price * $request->get('jumlah_pesan');
                $product_order->total_price = $product_order->total_price + $total;
                $product_order->update();
            }

            $order = Order::where('user_id', $user_id)->where('status', "CART")->first();
            $order->total_price = $order->total_price + $product->price * $request->get('jumlah_pesan');
            $order->update();

            return redirect()->route('cart')->with('warning', 'Added Product to Cart');
        }

        abort(403, "You do not have access to this page, Please Login or Register.");
    }

    public function cart()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status', 'CART')->first();
        if (!empty($order)) {
            $product_order = ProductOrder::where('order_id', $order->id)->get();
        } else {
            return view('buyers.cart', compact('order'));
        }

        return view('buyers.cart', compact('order', 'product_order'));
    }

    public function delete($id)
    {
        $product_order = ProductOrder::where('id', $id)->first();
        $product_order->delete();

        $order = Order::where('id', $product_order->order_id)->first();
        $order->total_price = $order->total_price - $product_order->total_price;
        if ($order->total_price == 0) {
            $order->delete();
        }
        $order->update();

        return redirect()->back();
    }

    public function checkout()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status', 'CART')->first();
        if (!empty($order)) {
            $product_order = ProductOrder::where('order_id', $order->id)->get();
        } else {
            return redirect('cart');
        }

        return view('buyers.checkout', compact('order', 'product_order'));
    }

    public function confirm(Request $request)
    {
        $this->validate($request, [
            'address' => 'required|min:5'
        ]);

        $userOrder = Auth::user();

        $order = Order::where('user_id', $userOrder->id)->where('status', 'CART')->first();
        $order->status = "PENDING";
        $order->address = $request->get('address');
        $order->update();

        $admin = User::where('role', 'ADMIN')->first();

        $details = [
            'body' => "Pesanan telah masuk dari
                        Nama : $userOrder->name,
                        Email : $userOrder->email,
                        Invoice : $order->invoice_number,
                        Total Price : $order->total_price,
                        Status : $order->status",
            'order_id' => $order->id
        ];

        $order_summary = [
            'id' => $order->id,
            'name' => $userOrder->name,
            'email' => $userOrder->email,
            'invoice' => $order->invoice_number,
            'total' => $order->total_price,
            'status' => $order->status,
            'date' => $order->updated_at,
        ];

        Notification::send($admin, new \App\Notifications\OrdersNotification($details));

        $product_order = ProductOrder::where('order_id', $order->id)->get();

        Mail::send(new OrderSummary($order_summary, $product_order));

        return redirect('ordered/'. $order->id)->with('status', "Pesanan, $order->invoice Berhasil Dibuat. Transfer sebesar Rp. " .number_format($order->total_price, 2, ',', '.') . " ke Rekening BRI: 12131313131 atas nama Maman Jaya. Terima kasih sudah membeli.");
    }

    public function ordered()
    {
        $order = Order::where('user_id', Auth::user()->id)->whereIn('status', ['PENDING', 'DELIVERED'])->get();

        return view('buyers.ordered', compact('order'));
    }

    public function orderedDetail($id)
    {
        $order = Order::where('id', $id)->first();
        $product_order = ProductOrder::where('order_id', $order->id)->get();

        return view('buyers.ordered-detail', compact('order', 'product_order'));
    }

    public function upload(Request $request, $id)
    {
        $this->validate($request, [
            'address' => 'required|min:5',
            'payslip' => 'required|file|mimes:png,jpg,jpeg'
        ]);

        $order = Order::findOrFail($id);
        if ($request->hasFile('payslip')) {
            if ($order->payslip && file_exists(storage_path('app/public/' . $order->payslip))) {
                Storage::delete('public/' . $order->payslip);
            }
            $order->payslip  = $request->file('payslip')->store('payslip', 'public');
        }
        $order->address = $request->get('address');
        $order->save();

        $userOrder = Auth::user();
        $admin = User::where('role', 'ADMIN')->first();

        $details = [
            'body' => "Konfirmasi Bukti Transfer dari
                        Nama : $userOrder->name,
                        Email : $userOrder->email,
                        Invoice : $order->invoice_number,
                        Total Price : $order->total_price,
                        Status : $order->status",
            'order_id' => $order->id
        ];

        Notification::send($admin, new \App\Notifications\OrdersNotification($details));

        return redirect()->back()->with('status', 'Terima kasih atas konfirmasi bukti transfernya. Bukti akan kami cek terlebih dahulu sebelum produk dikirim.');
    }
}
