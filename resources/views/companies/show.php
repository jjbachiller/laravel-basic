@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $company->name }}</div>

                <div class="card-body">

                    <div class="col-sm-12">
                        @if(session()->get('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                    </div>

                    <div>
                        <a style="margin: 19px;" href="{{ route('employess.create') }}" class="btn btn-primary">New company</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
