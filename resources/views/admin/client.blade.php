@extends('admin.layouts.admin')
@livewireStyles
@section('content')

@livewire('admin.client',['id' => $id])
@livewireScripts
@endsection
