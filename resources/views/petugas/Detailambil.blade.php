
@extends('petugas.layouts.petugas')
@livewireStyles
@section('content')

@livewire('petugas.detail-ambil-sampah',['id' => $id])
@livewireScripts
@endsection
