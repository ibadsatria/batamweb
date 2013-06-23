@layout('master')


@section('nav')
	<h6 class="pagetitle">View Users</h6>
@endsection

@section('main_section')
<div class="message"></div>
 <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
	<colgroup>
		<col class="con0" />
		<col class="con1" />
		<col class="con0" />
		<col class="con1" />
		<col class="con0" />
		<col class="con0" />
	</colgroup>
	<thead>
		<tr>
			<th class="head0">User ID</th>
			<th class="head1">Full Name</th>
			<th class="head0">Card Serial Number</th>
			<th class="head1">Priviledge</th>
			<th class="head1">Status</th>
			<th class="head0"></th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th class="head0">User ID</th>
			<th class="head1">Full Name</th>
			<th class="head0">Card Serial Number</th>
			<th class="head1">Priviledge</th>
			<th class="head1">Status</th>
			<th class="head0"></th>
		</tr>
	</tfoot>
	<tbody>
		@foreach($users as $user)
			<tr class="gradeA">
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->csn }}</td>
				<td>
					@if($user->authority == 1)
						Administrator
					@else
						Common User
					@endif
				</td>
				<td>
					@if($user->active == TRUE)
						ACTIVE
					@else
						INACTIVE
					@endif
				</td>
				<td class="center">
					<a class="btn btn3 btn_black btn_trash delete_button" href="{{ URL::to_action('user@delete', array($user->id)) }}"></a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

<br /><br />

@endsection
