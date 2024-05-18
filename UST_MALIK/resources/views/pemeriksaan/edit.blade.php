@extends('layouts.master')
@section('title','Edit Diagnosa Pasien')
@section('judul','Edit Diagnosa Pasien')
@section('nama','Rawat Inap Darurat')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="/pemeriksaan/{{$pem->id}}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="diagnosa">Diagnosa:</label>
                    <input type="text" class="form-control" id="diagnosa" name="diagnosa" value="{{ $pem->diagnosa }}">
                </div>
                <div class="form-group">
                    <label for="rekam_medis">Rekam Medis:</label>
                    <input type="date" class="form-control" id="rekam_medis" name="rekam_medis" value="{{ $pem->rekam_medis }}">
                </div>
                <div class="form-group">
                    <label for="foto">Foto:</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                    <img src="{{ $pem->foto }}" width="100" alt="Current photo">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
