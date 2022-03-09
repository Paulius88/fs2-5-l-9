@extends('layouts.shop', ['menu' => 'orders'])
@section('title', 'Orders')
@section('content')
<div class="text-end mb-2">
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#orderManagement">
		Make
	</button>
</div>
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
@include('orders.save')
@endsection