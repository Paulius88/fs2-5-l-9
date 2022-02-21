<nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
	<a class="me-3 py-2 text-dark text-decoration-none" data-page="products" href="{{ route('products.index') }}">Products</a>
	<a class="me-3 py-2 text-dark text-decoration-none" data-page="orders" href="{{ route('orders.index') }}">Orders</a>
	<a class="me-3 py-2 text-dark text-decoration-none" data-page="contacts" href="{{ route('contacts.index') }}">Contacts</a>
</nav>
@push('scripts')
<script>
	const _MENU = '{{ $menu }}';
</script>
@endpush