@extends('layout.layout')

@section('title', 'Effortless Flow Quick Results')
@section('content')
    <x-navbar></x-navbar>
    <x-hero></x-hero>
    <div class="flex flex-col justify-center items-center lg:gap-20 md:gap-16 xs:gap-12 lg:mt-0 md:-mt-[40rem] xs:-mt-40">
        <x-flow></x-flow>
        <x-feature></x-feature>
        <x-footer></x-footer>
    </div>
@endsection