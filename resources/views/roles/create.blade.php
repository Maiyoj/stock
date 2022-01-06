@extends('layouts.main')

@section('title')
<title>Add Roles</title>
@endsection
@section('content') 

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Permissions
                            </div>
                            <div class="card-body">
                                        <form action="{{route('roles.store')}}" method="post">  
                                            @csrf
                                            <div class="row mb-3">
                                            <div class="col-md-8">

                                            @if ($errors->any())
                                            @foreach($errors->all() as $error)
                                            <div class="alert alert-danger">
                                                {{$error}}
                                        </div>

                                            @endforeach

                                            @endif
                                            
                                        

                        <div class="form-group">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Permission:</strong>
                        <br/>
                        @foreach($permission as $value)
                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                            {{ $value->name }}</label>
                        <br/>
                        @endforeach
                    </div>
                    <div class="col-md-8 mt-4">
                        <div class="d-grid gap-2 col-4 mx-auto">
                       <div class="col">
                       <button type="submit" class="btn btn-primary">Save</button>
                       <a class="btn btn-danger" href="/admin">Cancel</a>
                       </div>
                       </div>
                       </div>
                        </form>
                    </div>
                                        </form>
                                    </div>
                        </div>
                    </div>
                </main>
@endsection  