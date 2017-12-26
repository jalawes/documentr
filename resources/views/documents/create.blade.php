@extends('layouts.app')

@section('content')
    <markdown-create :document="{{ $document }}"></markdown-create>
@endsection
