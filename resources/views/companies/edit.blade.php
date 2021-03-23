@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Company</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::open(['url' => '/companies/edit/'. $company->id,'method' => 'post']) !!}
                    {{ csrf_field() }}

                    {!! Form::label('Company Name', 'Company Name', ['class' => 'grey-text']) !!}
                    {!! Form::text('company_name',$company->company_name,['class' => 'form-control']); !!}

                    {!! Form::label('Phone', 'Phone', ['class' => 'grey-text']) !!}
                    {!! Form::text('phone',$company->phone,['class' => 'form-control']); !!}

                    {!! Form::label('Description', 'Description', ['class' => 'grey-text']) !!}
                    {!! Form::text('description',$company->description,['class' => 'form-control']); !!}

                    <div class="text-center mt-4">
                        <a class="btn btn-outline-warning" href="{{ url('/')}}">Back</a>
                        <button class="btn btn-outline-warning" type="submit">Save<i class="fa fa-paper-plane-o ml-2"></i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
    </script>
@stop