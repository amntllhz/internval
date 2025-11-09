@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403 - Forbidden')
@section('message', __($exception->getMessage() ?: '
    	Server memahami permintaan Anda sepenuhnya, tetapi menolak akses. Anda tidak memiliki izin atau hak istimewa yang diperlukan untuk melihat konten ini
'))
