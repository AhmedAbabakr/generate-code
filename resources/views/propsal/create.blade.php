@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

			<div class="card">
				
				<div class="card-primary ">


					<div class="card-header"><center>{{$title}} </center>  </div>
					<div class="card-body">
							
						{!!Form::open(['route'=>'propsal.store','id' =>'propsal'])!!}

							{{Form::label('client_name', 'Client Name')}}
                            {!! Form::text('client_name',old('client_name'),['placeholder'=>'Client Name' ,'required'])!!}<br>

                            {{Form::label('propsal_value', 'Propsal Value')}}
                            {!! Form::text('propsal_value',old('propsal_value'),['placeholder'=>'Propsal Value' ,'required'])!!}<br>

                            {{Form::label('propsal_type', 'Propsal Type')}}
                            {!!Form::select('propsal_type',['Web Development'=>'Web Development','Digital Marketing'=>'Digital Marketing','Web Product'=>'Web Product'],old('propsal_type'),['placeholder'=>'Choose Propsal Type','required'])!!}<br>

                            {{Form::label('client_source', 'Client Source')}}
                            {!!Form::select('client_source',['Recap'=>'Recap','Digital_Campaign'=>'Digital Campaign'],old('client_source'),['placeholder'=>'Choose Client Source','required'])!!}<br>

                            {!!Form::submit('Add Propsal',['id'=>'add_propsal'])!!}
                        {!!Form::close()!!}
					</div>  

				</div>
		
			</div>
		</div>
	</div>
</div>
@endsection