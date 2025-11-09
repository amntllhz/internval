@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429 - Too Many Requests')
@section('message', __('
    Anda telah mengirim terlalu banyak permintaan dalam waktu singkat. Harap tunggu beberapa saat sebelum mencoba kembali untuk menghindari pembatasan
'))
