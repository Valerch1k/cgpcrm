@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Companies</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a type="button" class="btn btn-info" href="{{ url('/companies/add')}}">
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
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Description</th>
                            <th>created_at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td>{{$company->company_name}}</td>
                                <td>{{$company->phone}}</td>
                                <td>{{$company->description}}</td>
                                <td>{{$company->created_at}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ url('/companies/edit/' . $company->id)}}" ><span class="fas fa-fw fa-pencil-alt"></span></a>
                                    <a class="btn btn-danger btn-sm" href="{{ url('/companies/delete/' . $company->id)}}" ><span class="fas fa-fw fa-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <strong>Записи с {{($companies->currentpage()-1)* $companies->perpage()+1}} до  {{(($companies->currentpage()-1)*$companies->perpage())+$companies->count()}} из {{$companies->total()}} записей</strong>
                    <div class="text-center">{{ $companies->links() }} </div>
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