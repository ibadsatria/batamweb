@layout('master')

@section('nav')
	<h6 class="pagetitle">View Devices</h6>
@endsection

@section('main_section')
 <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
	<colgroup>
		<col class="con0" />
		<col class="con1" />
		<col class="con0" />
		<col class="con1" />
	</colgroup>
	<thead>
		<tr>
			<th class="head0">No</th>
			<th class="head1">IP</th>
			<th class="head0">Port</th>
			<th class="head1"></th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th class="head0">No</th>
			<th class="head1">IP</th>
			<th class="head0">Port</th>
			<th class="head1"></th>
		</tr>
	</tfoot>
	<tbody>		
		@foreach($devices as $device)
		<tr class="gradeA">
			<td>{{ $device->id }}</td>
			<td>{{ $device->ip }}</td>
			<td>{{ $device->port }}</td>
			<td>
				<a class="btn btn3 btn_black btn_trash" href="#"></a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<br /><br />

@endsection
