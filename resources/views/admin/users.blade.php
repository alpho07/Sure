@extends('layouts.admin')
@section('content')
	<h4>Users</h4>
	<div class="datatables" >
		<table id="users_table" class="table table-striped">
			<thead class="thead-inverse">
				<tr>
					<th>		
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
		 $('#users_table').DataTable({
				"bJQueryUI":false,
				"serverSide":true,
				"processing":true,
				"aoColumns": [
					{"title": "Name", "mData":"Name"},
				],
				"ajax":{
					"url":"{{url('api/users')}}",
					"dataSrc": ""
				}
				
			})
		})
</script>
@endsection

