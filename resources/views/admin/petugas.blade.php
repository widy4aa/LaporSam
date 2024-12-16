@extends('admin.layouts.admin')
@livewireStyles
@section('content')

@livewire('admin.petugas',['id' => $id])
@livewireScripts
@endsection
