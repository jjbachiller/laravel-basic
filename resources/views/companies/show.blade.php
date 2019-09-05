@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $company->name }}</div>

                <div class="card-body">

                    <div class="col-sm-12">
                        @if(session()->get('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                    </div>

                    <div>
                        <h2>{{ $company->name }}</h2>
                        @if (!is_null($company->logo))
                            <img width="100px" src="{{ asset(Storage::disk('logos')->url($company->logo)) }}" alt="logo from {{ $company->name }}">
                        @endif
                        <br/>
                        <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                        <br/>
                        <a style="margin: 19px;" href="{{ route('employees.create', $company->id) }}" class="btn btn-primary">Add employee</a>

                        <table class="table table-striped">

                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Firstname</td>
                                    <td>Lastname</td>
                                    <td>Company</td>
                                    <td>Email</td>
                                    <td>Phone</td>

                                    <td colspan="2">Actions</td>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($company->employees as $employee)

                                    <tr>
                                        <td>{{ $employee->id }}</td>
                                        <td>{{ $employee->firstname }}</td>
                                        <td>{{ $employee->lastname }}</td>
                                        <td>{{ $company->name }} </td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone }}</td>

                                        <td>
                                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            {{ Form::open(array('route' => array('employees.destroy', $employee->id), 'method' => 'delete')) }}

                                                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}

                                            {{ Form::close() }}
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>

                        </table>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
