@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Add Client</h1>
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
                    {!! Form::open(['url' => '/client/save','method' => 'post']) !!}
                    {{ csrf_field() }}

                    {!! Form::label('First Name', 'First Name', ['class' => 'grey-text']) !!}
                    {!! Form::text('first_name','',['class' => 'form-control']); !!}

                    {!! Form::label('Last Name', 'Last Name', ['class' => 'grey-text']) !!}
                    {!! Form::text('last_name','',['class' => 'form-control']); !!}

                    {!! Form::label('Phone', 'Phone', ['class' => 'grey-text']) !!}
                    {!! Form::text('phone','',['class' => 'form-control']); !!}

                    {!! Form::label('Email Name', 'Email Name', ['class' => 'grey-text']) !!}
                    {!! Form::email('email','',['class' => 'form-control']); !!}

                    {!! Form::label('company_id', 'Название компании', ['class' => 'grey-text']) !!}
                    {!! Form::select('company_id', $companies,'', ['class' => 'select-company form-control']) !!}

                    {!! Form::label('Shipping address', 'Shipping address', ['class' => 'grey-text']) !!}
                    {!! Form::text('shipping_address','',['class' => 'form-control']); !!}

                    {!! Form::label('Billing address', 'Billing address', ['class' => 'grey-text']) !!}
                    {!! Form::text('billing_address','',['class' => 'form-control']); !!}

                    <div class="text-center mt-4">
                        <a class="btn btn-outline-warning" href="{{ url('/client')}}">Back</a>
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
        $(document).ready(function() {
            $('.select-company').select2();
        });
    </script>
@stop