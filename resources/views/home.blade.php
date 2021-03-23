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
                    <p>List companies</p>
                </div>
                <div class="card-body">
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
                                    <button onclick="" class="btn btn-primary btn-sm" ><span class="fas fa-fw fa-pencil-alt"></span></button>
                                    <button onclick="" class="btn btn-danger btn-sm"  ><span class="fas fa-fw fa-trash"></span></button>
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
    {{--$(document).ready(function(){--}}

        {{--$.ajaxSetup({--}}
            {{--headers:{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}--}}
        {{--});--}}

        {{--// view list users--}}
        {{--ListViewUsers();--}}

        {{--$('#perPage').on('change', function () {--}}
            {{--ListViewUsers('?perPage='+this.value);--}}
        {{--});--}}

        {{--$(document).on('click', '.pagination a', function (e) {--}}
            {{--getUsersPaginatin($(this).attr('href').split('page=')[1]);--}}
            {{--e.preventDefault();--}}
        {{--});--}}


    {{--});--}}
    {{--function ListViewUsers(params = '') {--}}
        {{--$.ajax({--}}
            {{--url: "{{route('listUsers')}}"+params,--}}
            {{--type: 'GET',--}}
        {{--}).done(--}}
            {{--function(data) {--}}
                {{--$('#listUser').trigger("reset");--}}
                {{--$('#listUser').html(data.html);--}}
            {{--}--}}
        {{--);--}}
    {{--}--}}
</script>
@stop