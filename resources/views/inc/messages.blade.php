<div >
				@if (count($errors) > 0)
								@foreach ($errors as $error)
												<div class="alert alert-danger">
																{{ $error }}
												</div>
								@endforeach

				@endif

				@if (session('message'))
								<div class="alert alert-info">
												{{ session('message') }}
								</div>
				@endif

				@if (session('success'))
								<div class="alert alert-success">
												{{ session('success') }}
								</div>
				@endif

				@if (session('error'))
								<div class="alert alert-danger">
												{{ session('error') }}
								</div>
				@endif


</div>
