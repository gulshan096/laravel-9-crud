<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>laravel 9 crud operation</title>
		<link rel="stylesheet" href="">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" >
	</head>
	<body>

		<div class="bg-info text-center py-3">
			<h4 class=" text-white">CRUD OPERATION LARAVEL 9 </h4>
		</div>
		@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
		@endif

		@if(Session::has('error'))
		<div class="alert alert-danger">{{ Session::get('error') }}</div>
		@endif
		<div class="container jumbotron my-2">
			<form action="@if(!empty($contact_get_one)) {{ url('contact/update') }} @else {{ url('contact/store') }} @endif " method="post">
				<input type="hidden" name="id"  value="@if(!empty($contact_get_one)) {{ $contact_get_one['id'] }} @endif">
				@csrf
				<div class="form-group">
					<label>User Name </label>
					<input type="tetx" name="name" placeholder="enter name" class="form-control" value="@if(!empty($contact_get_one)) {{ $contact_get_one['name'] }} @endif">
				</div>
				
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" placeholder="enter email" class="form-control" value="@if(!empty($contact_get_one)) {{ $contact_get_one['email'] }} @endif">
				</div>
				<button type="submit" class="btn btn-success">@if(!empty($contact_get_one))  Update @else Submit @endif</button>
				
			</form>
		</div>
		
		<div class="container table-responsive">
			<table class="table table-bordered ">
				<thead class="text-center">
					<tr>
						<th>name</th>
						<th>email</th>
						<th>action</th>
					</tr>
				</thead>
				<tbody class="text-center">
			

					@foreach($contact_list as $item)

					<tr>
						<td>{{ $item['name'] }}</td>
						<td>{{ $item['email'] }}</td>
						<td>
							<a href="{{ url('contact/edit') }}/{{ $item['id'] }}" class="badge badge-pill badge-info">edit</a>
							<a href="{{ url('contact/delete') }}/{{ $item['id'] }}" class="badge badge-pill badge-danger">delete</a>
						</td>
					</tr>

					@endforeach

				
				</tbody>
			</table>
		</div>
	</body>
</html>