@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Companies</div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-8 offset-sm-2">
                            <h3 class="display-4">Edit company</h3>
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

                    <!-- {{ Form::open(array('route' => array('companies.update', $company->id), 'files' => true)) }} -->
                    {{ Form::model($company, array('route' => array('companies.update', $company->id), 'method' => 'put')) }}

                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, array('class' => 'form-control')) !!}
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', null, array('class' => 'form-control')) }}
                         </div>

                         <div class="form-group">
                             {{ Form::label('logo', 'Logo') }}
                             {{ Form::file('logo', null, array('class' => 'form-control')) }}
                         </div>

                         <div class="form-group">
                             {{ Form::label('website', 'Website') }}
                             {{ Form::text('website', null, array('class' => 'form-control')) }}
                         </div>

                         {{ Form::submit('Update company') }}

                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
