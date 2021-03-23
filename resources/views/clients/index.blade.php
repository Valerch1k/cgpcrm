@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Clients</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a type="button" class="btn btn-info" href="{{ url('/client/add')}}">
                        <i class="fa fa-plus"></i> &nbsp;
                    </a>
                </div>
                <div class="card-body">
                    @if (\Illuminate\Support\Facades\Session::has('message'))
                        <div class="alert alert-success  fade show" role="alert">
                            {{ \Illuminate\Support\Facades\Session::get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table id="example" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>created_at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{$client->first_name}}</td>
                                <td>{{$client->last_name}}</td>
                                <td>{{$client->phone}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->created_at}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ url('/client/edit/' . $client->id)}}" ><span class="fas fa-fw fa-pencil-alt"></span></a>
                                    <a class="btn btn-danger btn-sm" href="{{ url('/client/delete/' . $client->id)}}" ><span class="fas fa-fw fa-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <strong>Записи с {{($clients->currentpage()-1)* $clients->perpage()+1}} до  {{(($clients->currentpage()-1)*$clients->perpage())+$clients->count()}} из {{$clients->total()}} записей</strong>
                    <div class="text-center">{{ $clients->links() }} </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        function ShowModalAddUser() {

        }
    </script>
@stop