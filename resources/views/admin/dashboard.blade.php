{{-- resources/views/admin/dashboard.blade.php --}}

{{-- Ganti layout lama 'layouts.lte.main' dengan layout baru Anda --}}
@extends('layouts.admin_master')

{{-- Set title dan page_name untuk Alpine.js --}}
@section('title', 'Admin Dashboard')
@section('page_name', 'ecommerce') {{-- 'ecommerce' adalah nama halaman ini di sidebar --}}

{{-- Tampilkan Breadcrumb --}}
@section('breadcrumb')
  <div x-data="{ pageName: `Dashboard`}">
    {{-- Memanggil parsial breadcrumb --}}
    @include('partials.breadcrumb')
  </div>
@endsection

{{-- Ini adalah konten utama halaman dashboard --}}
@section('content')
  {{-- 
    Salin struktur konten dari file template asli
    (misalnya: larshp_tamplate/src/index.html)
    dan gunakan @include untuk memanggil parsial Blade Anda.
  --}}
  
  <div class="grid grid-cols-12 gap-4 md:gap-6">
    <div class="col-span-12 space-y-6 xl:col-span-7">
      @extends('partials.metric-group.metric-group-01')
      @include('partials.chart.chart-01')
      </div>
    <div class="col-span-12 xl:col-span-5">
      @include('partials.chart.chart-02')
      </div>

    <div class="col-span-12">
      @include('partials.chart.chart-03')
      </div>

    <div class="col-span-12 xl:col-span-5">
      @include('partials.map-01')
      </div>

    <div class="col-span-12 xl:col-span-7">
      @include('partials.table.table-01')
      </div>
  </div>
@endsection