@extends('layouts.shop', ['menu' => 'orders'])
@section('title', 'Orders')
@section('content')
<div class="mb-3 text-center">
	<table class="table">
		<thead>
			<tr>
				<th>Product</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			@foreach($orders as $order)
			<tr>
				<td>{{ $order['product']['name'] }}</td>
				<td>{{ $order['price'] }}</td>
				<td></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection