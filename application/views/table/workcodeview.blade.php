@layout('master')


@section('nav')
	<h6 class="pagetitle">View Lessons Code Prefixs</h6>
@endsection

@section('main_section')
 <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
	<colgroup>
		<col class="con0" />
		<col class="con1" />
		<col class="con0" />
	</colgroup>
	<thead>
		<tr>
			<th class="head0">ID</th>
			<th class="head1">Workcode Prefix</th>
			<th class="head1">Remark</th>
			<th class="head0"></th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th class="head0">ID</th>
			<th class="head1">Workcode Prefix</th>
			<th class="head1">Remark</th>
			<th class="head0"></th>
		</tr>
	</tfoot>
	<tbody>
		@foreach($workcodes as $workcode)
		<tr class="gradeA">
			<td>{{ $workcode->id }}</td>
			<td>{{ $workcode->name}}</td>
			<td>{{ $workcode->remark}} </td>
			<td>
				<a class="btn btn3 btn_black btn_trash" href="#"></a>
			</td>			
		</tr>
		@endforeach
	</tbody>
</table>

<br /><br />

@endsection
