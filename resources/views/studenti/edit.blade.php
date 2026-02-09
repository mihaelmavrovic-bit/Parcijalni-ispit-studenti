@extends('layouts.app')

@section('title', 'Uredi studenta')
@section('page_title', 'Uredi studenta')

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

<form class="form-box" method="POST" action="{{ route('studenti.update', $student->id) }}">
  @csrf
  @method('PUT')

  <label>Ime</label>
  <input type="text" name="ime" value="{{ old('ime', $student->ime) }}" required>

  <label>Prezime</label>
  <input type="text" name="prezime" value="{{ old('prezime', $student->prezime) }}" required>

  <label>Status</label>
  <select name="status" required>
    <option value="redovni" {{ old('status', $student->status) == 'redovni' ? 'selected' : '' }}>Redovni</option>
    <option value="izvanredni" {{ old('status', $student->status) == 'izvanredni' ? 'selected' : '' }}>Izvanredni</option>
  </select>

  <label>Godište</label>
  <input type="number" name="godiste" value="{{ old('godiste', $student->godiste) }}" min="1980" max="{{ date('Y') }}" required>

  <label>Prosjek</label>
  <input type="number" name="prosjek" value="{{ old('prosjek', $student->prosjek) }}" step="0.01" min="1" max="5" required>

  <button type="submit">Spremi promjene</button>
</form>

<a class="btn" href="{{ route('studenti.index') }}" style="margin-top:10px; display:inline-block;">Natrag na listu</a>

@endsection
