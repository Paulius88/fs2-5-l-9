<form class="row row-cols-lg-auto g-3 align-items-center mb-3" action="{{ route('products.index') }}" method="GET">
	<div class="col-12">
		<label class="visually-hidden" for="category">Category</label>
		<select class="form-select" id="category" name="category">
			<option value="">Choose...</option>
			@foreach($categories as $category)
			<option value="{{ $category->id }}" {{ $category->id == $category_id ? ' selected' : '' }}>{{ $category->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="col-12">
		<div class="input-group">
			<span class="input-group-text" id="basic-addon1">Search</span>
			<input type="text" class="form-control" placeholder="Enter something..." aria-describedby="basic-addon1" name="search" value="{{ request('search') }}">
		</div>
	</div>
	<div class="col-12">
		<label class="visually-hidden" for="order_by">Order By</label>
		<select class="form-select" id="order_by" name="order_by">
			@foreach($ordering as $key => $value)
			<option value="{{ $key }}" {{ $key == request('order_by') ? ' selected' : '' }}>{{ $value }}</option>
			@endforeach
		</select>
	</div>
	<div class="col-12">
		<button type="submit" class="btn btn-primary">Submit</button>
		<a href="{{ route('products.index') }}" class="btn btn-warning">Clear</a>
	</div>
</form>