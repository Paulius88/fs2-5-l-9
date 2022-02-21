<form class="row row-cols-lg-auto g-3 align-items-center mb-3" action="{{ route('products.index') }}" method="GET">
	<div class="col-12">
		<label class="visually-hidden" for="inlineFormSelectPref">Category</label>
		<select class="form-select" id="inlineFormSelectPref" name="category">
			<option selected disabled>Choose...</option>
			@foreach($categories as $category)
			<option value="{{ $category->id }}">{{ $category->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="col-12">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</form>