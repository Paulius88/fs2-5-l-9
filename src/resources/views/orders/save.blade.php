<div class="modal fade" id="orderManagement" tabindex="-1" aria-labelledby="orderManagementLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="orderManagementLabel">Order Management</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row mb-3">
					<label for="product" class="col-sm-2 col-form-label">Product</label>
					<div class="col-sm-10">
						<input name="product_id" id="product" class="form-control" type="number" value="5">
					</div>
				</div>
				<div class="row mb-3">
					<label for="user" class="col-sm-2 col-form-label">User</label>
					<div class="col-sm-10">
						<input name="user_id" id="user" class="form-control" type="number" value="5">
					</div>
				</div>
				<div class="row mb-3">
					<label for="comment" class="col-sm-2 col-form-label">Comment</label>
					<div class="col-sm-10">
						<textarea name="comment" id="comment" class="form-control">Com</textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="orderSave">Save changes</button>
			</div>
		</div>
	</div>
</div>