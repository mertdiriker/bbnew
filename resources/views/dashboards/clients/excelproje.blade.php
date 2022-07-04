@extends('dashboards.clients.layouts.client-dash-layout')
@section('title','Excel-Teklif')

@section('content')

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
         Excel İle Teklif Oluştur
        </div>
        <div class="card-body">
            <div>
                Örnek Excel
                <form action=" {{ route('clientDownloadProjectFile') }}" method="POST">
                    @csrf
                    <input type="hidden" name="dosyaad" value="ornekexcel.xlsx">
                    <button style="width:250px;" type="submit" class="btn btn-info">İncele </button>

                  </form>
            </div>
            <br>
            <br>
            <form action="{{ route('clientImport') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input style="width:270px;" type="file" name="file" class="form-control" required>
                <br>
                <button class="btn btn-success">Oluştur</button>
            </form>
  
           
  
        </div>
    </div>
</div>


@endsection