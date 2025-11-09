@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503 - Service Unavailable')
@section('message', __('
    Layanan sedang tidak tersedia untuk sementara waktu karena pemeliharaan atau gangguan teknis. Silakan coba lagi dalam beberapa saat
'))
