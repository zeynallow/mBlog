@extends('mAdmin.layouts.app')
@push('css')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('/vendor/translation/css/main.css')}}">
@endpush
@push('js')
  <script src="{{asset('/vendor/translation/js/app.js')}}"></script>
@endpush
