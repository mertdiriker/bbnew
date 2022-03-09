@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Dashboard')

@section('content')

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Laravel 9 Import Export Excel to Database Example - ItSolutionStuff.com
        </div>
        <div class="card-body">
            <form action="{{ route('adminImport') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
            </form>
  
            <table class="table table-bordered mt-3">
                <tr>
                    <th colspan="3">
                        List Of Users
            
                    </th>
                </tr>
                <tr>
                    <th>ID</th>
             
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->urun_ID }}</td>
                
                </tr>
                @endforeach
            </table>
  
        </div>
    </div>
</div>


@endsection