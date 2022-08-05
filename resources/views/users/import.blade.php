@extends('layouts.admin')
@section('content')
<div class="container">
    <div class ="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">Import excel</div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status')}}
                </div>
                @endif
                <form action ="users/import" method ="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                        <input type="file" name="file" />
                        <button type="submit" class="btn btn-primary">Import</button>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection