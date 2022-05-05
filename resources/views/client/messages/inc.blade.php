@if (session()->has('message'))
				<div class="container-fluid alert alert-danger">
								{{ session()->get('message') }}
				</div>
@endif

@if (session()->has('success'))
				<div class="container-fluid alert alert-success">
								{{ session()->get('success') }}
				</div>
@endif
