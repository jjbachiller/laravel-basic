@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header modal-new-employee">New employee of {{ $company->name }}</div>

                @include('employees.forms.create', array('company' => $company))
            </div>
        </div>
    </div>
</div>
@endsection
