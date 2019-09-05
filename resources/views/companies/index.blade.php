@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Companies</div>

                <div class="card-body">

                    <div class="col-sm-12">
                        @if(session()->get('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                    </div>

                    <div>
                        <a style="margin: 19px;" href="{{ route('companies.create') }}" class="btn btn-primary">New company</a>
                    </div>

                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Logo</td>
                                <td>Website</td>

                                <td colspan="2">Actions</td>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($companies as $company)

                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>
                                        @if (!is_null($company->logo))
                                          <img height="100px" src="{{ asset(Storage::disk('logos')->url($company->logo)) }}"/>
                                        @endif
                                    </td>
                                    <td>{{ $company->website }}</td>

                                    <td>
                                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        {{ Form::open(array('route' => array('companies.destroy', $company->id), 'method' => 'delete')) }}

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
