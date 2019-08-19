<!DOCTYPE html>
<html>
<head>
	<link href="{{{ URL::asset('css/bootstrap.min.css') }}}" rel="stylesheet" type="text/css">
	<link href="{{{ URL::asset('js/vendor/fontawesome-free/css/all.min.css') }}}" rel="stylesheet" type="text/css">
	<style>
		.page-break {
		    page-break-after: always;
		}
	</style>
</head>
<body>


<table class="table">
	<!-- Row 1 -->
	<tr>
		<td align="center" colspan="2">
			<table class="table" border="0">
				<tr>
					<td align="right" width="40%"><img src="{{ URL::asset('img/logo.png') }}" height="100" width="100" /></td>
					<td>
						<h4>KS XIN Trading <small>(011760477)</small></h4>
						No. 170 Jalan Kundor, Lebuhraya Sultan Abdul Halim, <br />
						05400 Alor Setar, Kedah Darul Aman. <br />
						012-554 1999 / 019-4682888 <br />
					</td>
				</tr>
			</table>
		</td>
	</tr>	
	<!-- Row 2 -->
	<tr>
		<td width="70%" >
			<strong>To : </strong>Cash <br />
			{{ $data['repair']->car->owner }},<br />
			{{ $data['repair']->car->plateNo }}
			
		</td>
		<td>
			<table class="table table-bordered" style="border-radius: 1px">
				<tr>
					<td align="center" colspan="2"><font size="4"><strong>Invoice</strong></font></td>
				</tr>
			</table>
			<table class="table table-sm">
				<tr>
					<td><small>No </small></td>
					<td>:</td>
					<td align="center"><small></small></td>
				</tr>
				<tr>
					<td><small>Date </small></td>
					<td>:</td>
					<td align="center"><small>{{ Carbon\Carbon::parse($data['repair']->dateIn)->format('d-m-Y') }}</small></td>
				</tr>
				<tr>
					<td><small>Car No </small></td>
					<td>:</td>
					<td align="center"><small>{{ $data['repair']->car->plateNo}}</small></td>
				</tr>
				<tr>
					<td><small>Mileage </small></td>
					<td>:</td>
					<td align="center"><small>-</small></td>
				</tr>
				<tr>
					<td><small>Page </small></td>
					<td>:</td>
					<td align="center"><small>1 of 2</small></td>
				</tr>				
			</table>			
		</td>
	</tr>
	<!-- Row 3 -->
	<tr>
		<td colspan="2">
			<table class="table table-bordered">
				<thead>
					<td><strong>No</strong></td>
					<td><strong>Description</strong></td>
					<td align="center"><strong>Qty</strong></td>
					<td align="center"><strong>Unit</strong></td>
					<td align="center"><strong>Price (RM)</strong></td>
					<td align="center"><strong>Amount (RM)</strong></td>
				</thead>
				<tbody>