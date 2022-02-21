@php
$items = [
	[
		'route' => route('products.index'),
		'title' => 'Products',
		'type'  => 'products'
	],
	[
		'route' => route('orders.index'),
		'title' => 'Orders',
		'type'  => 'orders'
	],
	[
		'route' => route('contacts.index'),
		'title' => 'Contacts',
		'type'  => 'contacts'
	]
];
@endphp
<nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
	@foreach($items as $item)
	<!-- {{ $menu }} -->
	<a @class([
	    'me-3',
	    'py-2',
	    'text-dark',
	    'text-decoration-none',
	    'fw-bold' => $menu == $item['type']
	]) href="{{ $item['route'] }}">{{ $item['title'] }}</a>
	@endforeach
</nav>