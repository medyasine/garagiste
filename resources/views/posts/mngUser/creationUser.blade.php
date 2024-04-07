@extends('layouts.app')
@section('content')
<div class="card">
    <button type="button" class="btn btn-outline-info"><a href="{{ route('mngUser.users') }}">list of
            clients</a></button>
    <div class="card-header">
        <h4>Input Text</h4>
    </div>
    <form method="post" class="card-body" action="{{ route('mngUser.store') }}" enctype="multipart/form-data">
        @csrf
        <!-- Error message when data is not inputted -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group">
            <label>First name</label>
            <input type="text" class="form-control" />
        </div>
        <div class="form-group">
            <label>last name </label>
            <input type="text" class="form-control" />
        </div>
        <div class="form-group">
            <label>Phone Number (US Format)</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-phone"></i>
                    </div>
                </div>
                <input type="text" class="form-control phone-number" />
            </div>
        </div>
        <div class="form-group">
            <label>Password Strength</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </div>
                </div>
                <input type="password" class="form-control pwstrength" data-indicator="pwindicator" />
            </div>
            <div id="pwindicator" class="pwindicator">
                <div class="bar"></div>
                <div class="label"></div>
            </div>
        </div>
        <div class="form-group">
            <label>Email</label>
            <div class="input-group">
                <input type="email" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary">
                Submit
            </button>
        </div>
    </form>
</div>
@endsection