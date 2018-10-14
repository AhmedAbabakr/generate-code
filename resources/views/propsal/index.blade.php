@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

			<div class="card">
				
				<div class="card-primary ">

					<div class="card-header"> {{$title}}  
					@sales
								<a class="pull-right  btn btn-primary btn-sm" href="/propsal/create"> Add New Propsal</a>
					

					@endsales
					</div>
					      	

					<div class="card-body">

						<ul class="list-group">

							@foreach($propsals as $propsal)
							
							<li class="list-group-item" style="text-transform: capitalize;"><a href="/propsal/{{ $propsal->id }}"> {{$propsal->propsal_type}}</a></li>
							
							@endforeach

						</ul>
						                {!!$propsals->render()!!}

					</div>
				</div>
		
			</div>
		</div>
	</div>
</div>
@endsection