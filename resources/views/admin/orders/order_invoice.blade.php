<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice Pesanan</h2><h3 class="pull-right">Order # {{ $orderDetails['id'] }}</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Data Pembeli</strong><br>
    					{{ $userDetails['name'] }}<br>
                        {{ $userDetails['address'] }}<br>
                        {{ $userDetails['mobile'] }}<br>    					
    				</address>
    			</div>    			
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Metode Pembayaran:</strong><br>
    					{{ $orderDetails['payment_method'] }}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Tanggal Transaksi:</strong><br>
    					{{ date("d-m-Y", strtotime($orderDetails['created_at'])); }}<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Nama Produk</strong></td>
        							<td class="text-center"><strong>Ukuran</strong></td>
        							<td class="text-center"><strong>Harga</strong></td>
        							<td class="text-center"><strong>Jumlah</strong></td>
                                    <td class="text-center"><strong>Total</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
                                @php $subTotal = 0 @endphp
                                @foreach($orderDetails['orders_detail'] as $product)
    							<tr>
    								<td>{{ $product['product_name'] }}</td>
    								<td class="text-center">{{ $product['product_size'] }}</td>
    								<td class="text-center">{{ formatRupiah($product['product_price']) }}</td>
    								<td class="text-center">{{ $product['product_qty'] }}</td>
                                    <td class="text-center">{{ formatRupiah($product['product_price'] * $product['product_qty']) }}</td>
    							</tr>
                                @php $subTotal = $subTotal + ($product['product_price'] * $product['product_qty']) @endphp
                                @endforeach                               
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-right"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">{{ formatRupiah ($subTotal) }}</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-right"><strong>Biaya Pengiriman</strong></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-right"><strong>Grand Total</strong></td>
    								<td class="no-line text-right"><strong>{{ formatRupiah($orderDetails['grand_total']) }}</strong><br></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>