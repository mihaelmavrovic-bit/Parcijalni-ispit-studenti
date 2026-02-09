@extends('layouts.app')

@section('title', 'Detalji studenta')
@section('page_title', 'Detalji studenta')

@section('content')

<p><strong>Ime:</strong> {{ $student->ime }}</p>
<p><strong>Prezime:</strong> {{ $student->prezime }}</p>
<p><strong>Status:</strong> {{ $student->status }}</p>
<p><strong>Godiste:</strong> {{ $student->godiste }}</p>
<p><strong>Prosjek:</strong> {{ number_format($student->prosjek, 2) }}</p>

<a class="btn" href="{{ route('studenti.index') }}">Natrag</a>

@endsection