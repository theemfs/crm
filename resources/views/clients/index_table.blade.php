@extends('layouts.app')



@section('css')
	<link href="{{ url('/') }}/css/jquery.dataTables.min.css" rel="stylesheet">
{{-- <META HTTP-EQUIV="refresh" CONTENT="60"> --}}
@endsection



@section('title', trans('app.Clients'))



@section('content')



{{-- BREADCRUMBS --}}
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}">{{ trans('app.Home') }}</a></li>
	<li class="active">{{ trans('app.Clients') }}</li>
</ol>


	{{-- <div class="col-md-1"></div> --}}

	{{-- CENTER BLOCK --}}
	<div class="col-md-12">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ trans('app.Clients') }}
					<a class="btn btn-default btn-success pull-right btn-xs" href="{{ action('ClientsController@create') }}" role="button"><i class="fa fa-fw fa-btn fa-plus"></i> {{ trans('app.Create') }}</a>
				</div>

				<div class="panel-body">

					<div> {{-- TABS --}}

						<div class="tab-content">



							{{-- I AM AUTHOR --}}
							<div role="tabpanel" class="table-responsive tab-pane">
								<table class="table table-condensed table-bordered">
									<thead>
										<td class="text-center"><strong>#</strong></td>
										<td class="text-center col-xs-6"><strong>{{ trans('app.Case') }}</strong></td>
										<td class="text-center col-xs-1"><strong>{{ trans('app.Last Reply At') }}</strong></td>
										<td class="text-center col-xs-1"><strong>{{ trans('app.Created At') }}</strong></td>
										<td class="text-center col-xs-1"><strong>{{ trans('app.Due To') }}</strong></td>
										<td class="text-center col-xs-1"><strong>{{ trans('app.Status') }}</strong></td>
										<td class="text-center col-xs-1"><strong>{{ trans('app.Performers') }}</strong></td>
										<td class="text-center col-xs-1"><strong>{{ trans('app.Members') }}</strong></td>
									</thead>

									@foreach ($clients as $client)
										<tr style="background-color: {{ $client->status->color }}">
											<td class="text-center">
												<a href="{{ action('ClientsController@show', $client->id) }}">{{ $client->id }}</a>
											</td>
											<td>
												<a href="{{ action('ClientsController@show', $client->id) }}">
													<i class="fa fa-fw fa-btn fa-briefcase"></i>
													<strong>{{ $client->name }}</strong>
													<small class="text-muted col-md-11 col-md-offset-1 hidden-xs">{{ mb_substr($client->text, 0, 100)."..." }}</small>
												</a>
											</td>
											<td class="text-center"><small>{{ $client->last_reply_at }} ({{ $client->last_replier->getSurnameWithInitials() }})</small></td>
											<td class="text-center"><small>{{ $client->created_at }}</small></td>
											<td class="text-center"><small>{{ $client->due_to }}</small></td>
											<td class="text-center"><small>{{ $client->status->name }}</small></td>
											<td class="text-center">
												@foreach($client->performers as $performer)
													<small>
														<a href="{{ action('UsersController@show', $performer->id) }}" data-toggle="tooltip" data-placement="auto" data-container="body" title="{{ $performer->department }}/{{ $performer->title }}: {{ $performer->phone }}, {{ $performer->mobile }}">
															{{-- <i class="fa fa-fw fa-btn fa-user"></i> --}}
															{{ $performer->getSurnameWithInitials() }}
														</a><br>
													</small>
												@endforeach
											</td>
											<td class="text-left text-overflow">
												@if($client->members->count()<=5)
													@foreach($client->members as $member)
														<small>
															<a href="{{ action('UsersController@show', $member->id) }}" data-toggle="tooltip" data-placement="auto" data-container="body" title="{{ $member->department }}/{{ $member->title }}: {{ $member->phone }}, {{ $member->mobile }}">
																{{-- <i class="fa fa-fw fa-btn fa-user"></i> --}}
																{{ $member->getSurnameWithInitials() }}
															</a>
														</small><br>
													@endforeach
												@else
													<small>{{ trans('app.Members Count') }}: {{ $client->members->count() }}</small>
												@endif
											</td>
										</tr>
									@endforeach
								</table>
							</div>





						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

@endsection



@section('js')
	<script src="{{ url('/') }}/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('table').DataTable({
				// "sDom": '<"top"i>rt<"bottom"flp><"clear">',
				"bFilter":		false,
				"lengthMenu":	[[10, 25, 50, -1], [10, 25, 50, "Все"]],
				"paging":		false,
				"ordering":		true,
				"order": 		[[ 2, "desc" ]],
				"info":			false,
				"search":		false,
				"stateSave":	false,
				"pagingType":	"full_numbers",
				// "scrollY": 200,
				// "scrollX": true
				"language": {
				// 	"decimal": ",",
				// 	"thousands": "."
					"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
				}
			});
		} );

		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
@endsection