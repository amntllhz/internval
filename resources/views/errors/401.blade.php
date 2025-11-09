@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401 - Unauthorized')
@section('message', __('
    Anda tidak memiliki izin untuk mengakses halaman ini. Silakan login terlebih dahulu atau hubungi administrator untuk mendapatkan hak akses yang sesuai
'))
