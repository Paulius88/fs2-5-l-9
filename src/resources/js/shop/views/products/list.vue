<script setup>
import { ref } from 'vue'

const products = ref([]);

fetch('/api/v1/products').then(response => response.json()).then(data => {
	products.value = data.products;
});
</script>

<template>
	<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
		<div class="col" v-for="(product, i) in products" :key="i">
			<div class="card mb-4 rounded-3 shadow-sm">
				<div class="card-header py-3">
					<h4 class="my-0 fw-normal">{{ product.name }}</h4>
				</div>
				<div class="card-body">
					<h3>{{ product.description }}</h3>
					<a href="PRODUCT_ROUTE" type="button" class="w-100 btn btn-lg btn-outline-primary">View</a>
				</div>
			</div>
		</div>
	</div>
</template>