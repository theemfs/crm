@extends('layouts.app')

@section('libraries')
	<meta http-equiv="refresh" content="5">
@endsection

@section('title', 'Gateways')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">

			Gateways
				<div class="btn-group pull-right" role="group" aria-label="...">
					<button onclick="window.location='{{ action('GatewaysController@index') }}'" type="button" class="btn btn-sm btn-default">Refresh</button>
					{{-- <button onclick="window.location='{{ action('GatewaysController@create') }}'" type="button" class="btn btn-sm btn-success">Create</button> --}}
				</div>
		<hr>

			{{--
			{!! Form::open(['method' => 'GET', 'url'=>'gateways', 'class' => 'form-horizontal']) !!}
				<div class="form-horizontal">
					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<div class="input-group">
								{!! Form::text('filter', $filter, ['class' => 'form-control', 'autocomplete' => 'off', 'autofocus' => 'on']) !!}
								<div class="input-group-btn">
									{!! Form::submit('Filter', ['class' => 'btn btn-primary']) !!}
								</div>
							</div>
						</div>
					</div>
				</div>
			{!! Form::close() !!}
			--}}

		</div>

		<div class="panel-body">

			@foreach ($gateways as $gateway)

				<div class="snippet">
					<h4 class="snippet-heading">
						{{ $gateway->name }}
							<div class="btn-group pull-right" role="group" aria-label="...">
								<button onclick="window.location='{{ 'gateways' }}/{{ $gateway->id }}'" type="button" class="btn btn-xs btn-default">Show</button>
								<button onclick="window.location='{{ 'gateways' }}/{{ $gateway->id }}/edit'" type="button" class="btn btn-xs btn-warning">Edit</button>
							</div>
					</h4>
					<div class="snippet-body">
						<p>{{ $gateway->comment }}</p>

						<div class="">
							{{-- @if ( strstr($gateway->getStatus()->status, 'online') )
								<p>Status: <span class="bg-success">{{ $gateway->getStatus()->status }}</p></span>
							@else
								<p>Status: <span class="bg-danger">{{ $gateway->getStatus()->status }}</p></span>
							@endif

							<p>Status: {{ $gateway->getStatus()->status }}</p>
							<p>Sent (SMS / Reports): {{ $gateway->getStatus()->sent->sms }} / {{ $gateway->getStatus()->sent->dlr }}</p>
							<p>Recieved (SMS / Reports): {{ $gateway->getStatus()->received->sms }} / {{ $gateway->getStatus()->received->dlr }}</p> --}}
						</div>

					</div>
				</div>

			@endforeach

			<div class="col-xs-12">
				{!! $gateways->appends(['filter' => $filter])->links() !!}
			</div>

		</div>
	</div>

@endsection