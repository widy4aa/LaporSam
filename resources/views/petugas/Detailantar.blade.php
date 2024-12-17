
@extends('petugas.layouts.petugas')
@livewireStyles
@section('content')

@livewire('petugas.detail-antar-sampah',['id' => $id])
@livewireScripts
@endsection
