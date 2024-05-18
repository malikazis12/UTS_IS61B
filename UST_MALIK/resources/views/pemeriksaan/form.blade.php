@extends('layouts.master')
@section('title','Diagnosa Pasien')
@section('judul','Diagnosa Pasien')
@section('nama','Hananan Academy')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="/pemeriksaan/store/" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="diagnosa">Diagnosa:</label>
                    <input type="text" class="form-control" id="diagnosa" name="diagnosa">
                </div>
                <div class="form-group">
                    <label for="rekam_medis">Rekam Medis:</label>
                    <input type="text" class="form-control" id="rekam_medis" name="rekam_medis">
                </div>
                <div class="form-group">
                    <label for="foto">Foto:</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
