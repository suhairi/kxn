

<!-- restructure with checking $data['repair']->rparts has how many items -->
<!-- and then coding from there wether to have how many page-breaks -->
<?php $page = 1; ?>
@foreach($parts as $part)
	
	@if($loop->first == true)
		@include('printouts._header_do')
	@endif
	
	<tr>
		<td>{{ $loop->iteration }}</td>
		<td>{{ $part['name'] }}</td>
		<td>{{ $part['quantity'] }}</td>
		<td>-</td>
		<td align="right">{{ $part['price'] }}</td>
		<td align="right">{{ $part['total'] }}</td>
	</tr>


	@if($loop->iteration % 8 == 0)
		@include('printouts._footer_do')
		<div class="page-break"></div>
		<?php $page++; ?>
		@include('printouts._header_do')
	@endif

	@if($loop->last == true)
		<tr>
			<td colspan="5" align="right"><strong>Sub Total (RM)</strong></td>
			<td align="right"><strong>{{ $data['repair']->grandTotal }}</strong></td>
		</tr>
		@include('printouts._footer_do')
	@endif


	
@endforeach
