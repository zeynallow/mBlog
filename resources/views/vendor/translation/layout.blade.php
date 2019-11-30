@extends('mAdmin.layouts.app')
@push('css')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/vendor/translation/css/main.css">
@endpush
@push('js')
  <script src="/vendor/translation/js/app.js"></script>
@endpush
