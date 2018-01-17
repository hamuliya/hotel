@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Customers</h1>

        <!--Search-->
        <div class="container">

            <form class="form-inline pull-left" action="customers.index" method="get">
                @include('customers.index_fields')
            </form>
        </div>


        <!-- Add New-->
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
               href="{!! route('customers.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('customers.table')
            </div>
        </div>
    </div>
@endsection