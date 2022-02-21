@extends('layouts.shop', ['menu' => 'contacts'])
@section('title', 'Contacts')
@section('content')
<div class="mb-3 text-center">
	<form id="contactForm">

		<!-- Name input -->
		<div class="mb-3">
			<label class="form-label" for="name">Name</label>
			<input class="form-control" id="name" type="text" placeholder="Name" />
		</div>

		<!-- Email address input -->
		<div class="mb-3">
			<label class="form-label" for="emailAddress">Email Address</label>
			<input class="form-control" id="emailAddress" type="email" placeholder="Email Address" />
		</div>

		<!-- Message input -->
		<div class="mb-3">
			<label class="form-label" for="message">Message</label>
			<textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;"></textarea>
		</div>

		<!-- Form submit button -->
		<div class="d-grid">
			<button class="btn btn-primary btn-lg" type="submit">Submit</button>
		</div>

	</form>

	<div id="map"></div>
</div>
@endsection
@push('styles')
<style>
	#map {
		height: 100%;
	}
</style>
@endpush
@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly&channel=2" async></script>
<script>
	let map;

	function initMap() {
		map = new google.maps.Map(document.getElementById("map"), {
			center: { lat: -34.397, lng: 150.644 },
			zoom: 8,
		});
	}
</script>
@endpush