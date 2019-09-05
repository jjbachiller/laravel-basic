@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New employee of {{ $company->name }}</div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-8 offset-sm-2">
                            <h3 class="display-4">Add an employee to {{ $company->name }}</h3>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif

                    {{ Form::open(array('route' => 'employees.store', 'files' => true)) }}
                        {{ Form::hidden('company', $company->id) }}

                        <div class="form-group">
                            {!! Form::label('firstname', 'Firstname') !!}
                            {!! Form::text('firstname', null, array('class' => 'form-control')) !!}
                        </div>

                        <div class="form-group">
                            {{ Form::label('lastname', 'Lastname') }}
                            {{ Form::text('lastname', null, array('class' => 'form-control')) }}
                         </div>

                         <div class="form-group">
                             {{ Form::label('email', 'Email') }}
                             {{ Form::email('email', null, array('class' => 'form-control')) }}
                         </div>

                         <div class="form-group">
                             {{ Form::label('phone', 'Phone') }}
                             {{ Form::text('phone', null, array('class' => 'form-control')) }}
                         </div>

                         {{ Form::submit('Add employee') }}

                    {{ Form::close() }}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
