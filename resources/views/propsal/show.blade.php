@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

			<div class="card">
				
				<div class="card-primary ">

					<div class="card-header"> <center>Propsal Information </center>
					
					</div>
					      	

					<div class="card-body">

						<center>
							<ul>
							@foreach($propsal as $propsal)
							<li>Client Name : {{$propsal->client_name}}</li>
							<li>Client Source : {{$propsal->client_source}}</li>
							<li>Propsal Type : {{$propsal->propsal_type}}</li>
							<li>Propsal Value : {{$propsal->propsal_value}}</li>
							<li>Propsal Approval : 
							@technical
								@if($propsal->approved_by === null)
									{!!Form::open(['method' => 'PUT','route' => ['propsal.update',$propsal->id ] ] )!!}
									{!!Form::submit('Approve')!!}
									{!!Form::close()!!}
								@else
									{{$propsal->approved_by()->first()->fname.' '.$propsal->approved_by()->first()->lname}}
								@endif	
							@else
								{{$propsal->approved_by === null?'Wait for techincal Approval':$propsal->approved_by()->first()->fname.' '.$propsal->approved_by()->first()->lname}}
							@endtechnical
							</li>
							<li>Propsal Created By : {{$propsal->created_by()->first()->fname.' '.$propsal->created_by()->first()->lname}}</li>
							<li>Proposal Code : 
								{{$propsal->approved_by === null?'Wait for techincal Approval':$propsal->code_criteria}}
							</li>
							@endforeach
							</ul>
						</center>

					</div>
				</div>
		
			</div>
		</div>
	</div>
</div>
@endsection