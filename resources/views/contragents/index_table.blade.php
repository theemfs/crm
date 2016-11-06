@extends('layouts.app')



@section('css')
	<link href="{{ url('/') }}/css/jquery.dataTables.min.css" rel="stylesheet">
{{-- <META HTTP-EQUIV="refresh" CONTENT="60"> --}}
@endsection



@section('title', trans('app.Contragents'))



@section('content')



{{-- BREADCRUMBS --}}
<ol class="breadcrumb">
	<li><a href="{{ url('/') }}">{{ trans('app.Home') }}</a></li>
	<li class="active">{{ trans('app.Contragents') }}</li>
</ol>


	{{-- <div class="col-md-1"></div> --}}

	{{-- CENTER BLOCK --}}
	<div class="col-md-12">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ trans('app.Contragents') }}
					<a class="btn btn-default btn-success pull-right btn-xs" href="{{ action('ContragentsController@create') }}" role="button"><i class="fa fa-fw fa-btn fa-plus"></i> {{ trans('app.Create') }}</a>
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

									@foreach ($contragents as $contragent)
										<tr style="background-color: {{ $contragent->status->color }}">
											<td class="text-center">
												<a href="{{ action('ContragentsController@show', $contragent->id) }}">{{ $contragent->id }}</a>
											</td>
											<td>
												<a href="{{ action('ContragentsController@show', $contragent->id) }}">
													<i class="fa fa-fw fa-btn fa-briefcase"></i>
													<strong>{{ $contragent->name }}</strong>
													<small class="text-muted col-md-11 col-md-offset-1 hidden-xs">{{ mb_substr($contragent->text, 0, 100)."..." }}</small>
												</a>
											</td>
											<td class="text-center"><small>{{ $contragent->last_reply_at }} ({{ $contragent->last_replier->getSurnameWithInitials() }})</small></td>
											<td class="text-center"><small>{{ $contragent->created_at }}</small></td>
											<td class="text-center"><small>{{ $contragent->due_to }}</small></td>
											<td class="text-center"><small>{{ $contragent->status->name }}</small></td>
											<td class="text-center">
												@foreach($contragent->performers as $performer)
													<small>
														<a href="{{ action('UsersController@show', $performer->id) }}" data-toggle="tooltip" data-placement="auto" data-container="body" title="{{ $performer->department }}/{{ $performer->title }}: {{ $performer->phone }}, {{ $performer->mobile }}">
															{{-- <i class="fa fa-fw fa-btn fa-user"></i> --}}
															{{ $performer->getSurnameWithInitials() }}
														</a><br>
													</small>
												@endforeach
											</td>
											<td class="text-left text-overflow">
												@if($contragent->members->count()<=5)
													@foreach($contragent->members as $member)
														<small>
															<a href="{{ action('UsersController@show', $member->id) }}" data-toggle="tooltip" data-placement="auto" data-container="body" title="{{ $member->department }}/{{ $member->title }}: {{ $member->phone }}, {{ $member->mobile }}">
																{{-- <i class="fa fa-fw fa-btn fa-user"></i> --}}
																{{ $member->getSurnameWithInitials() }}
															</a>
														</small><br>
													@endforeach
												@else
													<small>{{ trans('app.Members Count') }}: {{ $contragent->members->count() }}</small>
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