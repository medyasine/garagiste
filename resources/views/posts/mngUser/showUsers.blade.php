@extends('layouts.app')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header" style="margin-top: 80px;">
            <button type="button" class="btn btn-outline-info"><a href="{{ route('mngUser.createUser') }}">add client</a></button>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <h4>Sortable Table</h4>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped" id="sortable-table">
                    <thead>
                        <>
                            <th class="text-center">
                                <i class="fas fa-th"></i>
                            </th>

                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">email</th>
                            <th scope="col">address</th>
                            <th scope="col">phoneNumber</th>

                            </tr>
                    </thead>
                    <tbody>
                        @if (count($users) > 0)
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="sort-handler">
                                    <i class="fas fa-th"></i>
                                </div>
                            </td>
                            <td>{{$user->firstName}}</td>
                            <td class="align-middle">
                                {{$user->lastName}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>{{$user->address}}</td>

                            <td>{{$user->phoneNumber}}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6">No users found</td>
                        </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection