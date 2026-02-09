@extends('layouts.app')

@section('title', 'Novi student')
@section('page_title', 'Dodaj studenta')

@section('content')

@if($errors->any()) 
  <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
    <strong>Greške:</strong>
    <ul>
      @foreach($errors->all() as $e)
        <li>{{ $e }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form class="form-box" method="POST" action="{{ route('studenti.store') }}">
  @csrf

  <label>Ime</label>
  <input type="text" name="ime" value="{{ old('ime') }}">

  <label>Prezime</label>
  <input type="text" name="prezime" value="{{ old('prezime') }}">

  <label>Status</label>
  <select name="status" required>
  <option value="redovni" {{ old('status') == 'redovni' ? 'selected' : '' }}>Redovni</option>
  <option value="izvanredni" {{ old('status') == 'izvanredni' ? 'selected' : '' }}>Izvanredni</option>
</select>

  <label>Godiste</label>
  <input type="number" name="godiste" value="{{ old('godiste') }}" min="1980" max="{{ date('Y') }}" required>

  <label>Prosjek</label>
  <input type="number" name="prosjek" value="{{ old('prosjek') }}" step="0.01" min="1" max="5" required>

  <button type="submit">Spremi</button>
</form>

@endsection
