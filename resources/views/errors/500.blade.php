@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500 - Server Error')
@section('message', __('
    Terjadi kesalahan pada server kami saat memproses permintaan Anda. Silakan coba lagi nanti atau hubungi administrator untuk bantuan
'))
