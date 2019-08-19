

<!-- restructure with checking $data['repair']->rparts has how many items -->
<!-- and then coding from there wether to have how many page-breaks -->

@for($i=1; $i<=$pages; $i++)
	@include('printouts._header')

	@foreach($data['repair']->rparts as $rpart)
		<tr>
			<td>{{ $loop->iteration }}</td>
			<td>{{ $rpart->name }}</td>
			<td>{{ $rpart->quantity }}</td>
			<td align="center">-</td>
			<td align="right">{{ $rpart->price }}</td>
			<td align="right">{{ $rpart->total }}</td>
		</tr>
		@if($loop->iteration == 9)
			@include('printouts._footer')
			<div class="page-break">
				
			</div>
			<tr>
				<td colspan="6">here</td>
			</tr>
		@endif
	@endforeach
	@if(count($data['repair']->rparts) < 9)
		@for($i=count($data['repair']->rparts) + 1; $i<9; $i++)
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			
		@endfor
	@endif
	@include('printouts._footer')
@endfor



	
	


					
				