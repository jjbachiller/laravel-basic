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
                            <h3 class="display-4">Add an employee</h3>
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

                    <!-- {{ Form::model($employee, array('route' => array('employee.create'))) }} -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
