<script setup>
import { ref, reactive } from 'vue';

const state = reactive({
	products: [],
	removableProductIndex: null
});

const products = ref([]);
// const orders = ref([]);
// const users = ref([]);

function loadProducts() {
	// show preload

	fetch('/api/v1/products').then(response => response.json()).then(data => {
		// products.value = data.products;
		state.products = data.products;

		// hide preload
	});
}

function removeProducts() {
	state.products = [];
}

function removeSpecificProducts(productId = null) {
	let productIndex = state.products.findIndex(p => p.id == productId);

	if (productIndex >= 0) {
		state.products.splice(productIndex, 1);
	}
}

// function filterProducts() {
// 	state.products = state.products.sort((a, b) => a.id > b.id ? 1 : -1);
// }
</script>

<template>
	<div class="mb-2 text-center">
		<button class="btn btn-success me-5" @click="loadProducts">Load</button>
		<button class="btn btn-warning me-5" @click="loadProducts">Filter</button>
		<button class="btn btn-danger me-5" @click="removeProducts">Delete</button>

		<div class="input-group mb-3" style="display: inline-flex; width: auto;">
			<input type="number" class="form-control" v-model="state.removableProductIndex">
			<button class="btn btn-outline-danger" type="button" @click="removeSpecificProducts(state.removableProductIndex)">Delete</button>
		</div>
	</div>

	<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
		<div class="col" v-for="(product, i) in state.products" :key="i">
			<div class="card mb-4 rounded-3 shadow-sm">
				<div class="card-header py-3">
					<h4 class="my-0 fw-normal">{{ product.name }} - {{ product.id }}</h4>
				</div>
				<div class="card-body">
					<h3>{{ product.description }}</h3>
					<a :href="product.url" type="button" class="w-100 btn btn-lg btn-outline-primary mb-2">View</a>
					<button class="w-100 btn btn-outline-danger" type="button" @click="removeSpecificProducts(product.id)">Delete</button>
				</div>
			</div>
		</div>
	</div>
</template>