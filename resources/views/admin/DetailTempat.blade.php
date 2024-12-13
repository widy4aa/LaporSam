@extends('admin.layouts.admin')
@livewireStyles
@section('content')

@livewire('admin.detail-tempat-pembuangan',['id' => $id])
@livewireScripts
@endsection
