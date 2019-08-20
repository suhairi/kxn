

<!-- restructure with checking $data['repair']->rparts has how many items -->
<!-- and then coding from there wether to have how many page-breaks -->

@for($i=1; $i<=$pages; $i++)
	@include('printouts._header')

	@foreach($data['repair']->rparts as $key => $rpart)
		<tr>
			<td>{{ $loop->iteration }} </td>
			<td>{{ $rpart->name }}</td>
			<td>{{ $rpart->quantity }}</td>
			<td align="center">-</td>
			<td align="right">{{ $rpart->price }}</td>
			<td align="right">{{ $rpart->total }}</td>
		</tr>
		
		<?php $data['repair']->rparts = $data['repair']->rparts->forget($key); ?>
		
		@if($loop->iteration >= 7)
			@include('printouts._footer')

			<div class="page-break"></div>
			<?php break; ?>
		@endif


	@endforeach

	<!-- Extra table row -->
	@if(count($data['repair']->rparts) < 7)
		@for($i=count($data['repair']->rparts) + 1; $i<8; $i++)
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
@endfor
