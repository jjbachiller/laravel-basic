@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Employees</div>

                <div class="card-body">

                    <div class="col-sm-12">
                        @if(session()->get('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                    </div>

                    <div>
                        <a style="margin: 19px;" href="{{ route('employees.create') }}" class="btn btn-primary">New employee</a>
                    </div>

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

                            @foreach ($employees as $employee)

                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->firstname }}</td>
                                    <td>{{ $employee->lastname }}</td>
                                    <td> - </td>
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
@endsection
