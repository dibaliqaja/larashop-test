@component('mail::message')
<h1>Order Summary</h1>

Thank you for your order.

**Invoice Number:** {{ $order_summary['invoice'] }}<br>
**Email:** {{ $order_summary['email'] }}<br>
**Name:** {{ $order_summary['name'] }}<br>
**Total Price:** Rp. {{ $order_summary['total'] }}<br>
**Status:** {{ $order_summary['status'] }}<br>
**Order Date:** {{ $order_summary['date'] }}<br>

<table class="table table-invoice" style="width: 100%">
    <thead>
        <th>No</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total Price</th>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($product_order as $item)
            <tr align="center">
                <td>{{ $no++ }}</td>
                <td>{{ $item->products->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>Rp. {{ number_format($item->products->price, 2, ',', '.') }}</td>
                <td>Rp. {{ number_format($item->total_price, 2, ',', '.') }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4" align="left"><strong>Total Price :</strong></td>
            <td align="center">Rp. {{ number_format($order_summary['total'], 2, ',', '.') }}</td>
        </tr>
    </tbody>
</table>
<br>
<b>Pesanan dengan Nomor {{ $order_summary['invoice'] }} Berhasil Dibuat. Transfer sebesar Rp. {{ number_format($order_summary['total'], 2, ',', '.') }} ke Rekening BRI: 12131313131 atas nama Maman Jaya."</b>
<br><br>
Anda bisa mendapatkan detail lebih lanjut tentang pesanan Anda dengan masuk ke situs web kami.

@component('mail::button', ['url' => url('ordered/'. $order_summary['id']), 'color' => 'green'])
Go to Website
@endcomponent

Terima kasih telah memilih kami. :)

Regards,<br>
{{ config('app.name') }}
@endcomponent
