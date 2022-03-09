@extends('layouts.shop', ['menu' => 'products'])
@section('title', 'Products - Create')
@section('content')
<div class="card">
	<div class="card-header">
		Product edit
	</div>
	<div class="card-body">
		<form action="{{ route('products.update', $product->id) }}" method="POST">
			@csrf
			@method('PATCH')
			<div class="row mb-3">
				<label for="categories" class="col-sm-2 col-form-label">Category</label>
				<div class="col-sm-10">
					<select name="category_id" id="categories" class="form-control @error('category_id') is-invalid @enderror">
						<option selected="selected" disabled="disabled">Select Category</option>
						@foreach($categories as $category)
						<option value="{{ $category->id }}"{!! $category->id == $product->category_id ? ' selected="selected"' : '' !!}>{{ trans($category->name) }}</option>
						@endforeach
					</select>
					@error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
			</div>
			<div class="row mb-3">
				<label for="name" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name) }}">
					@error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
			</div>
			<div class="row mb-3">
				<label for="description" class="col-sm-2 col-form-label">Description</label>
				<div class="col-sm-10">
					<textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
					@error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-primary w-100">Submit</button>
			</div>
		</form>
	</div>
</div>
@endsection