@extends('layouts.app')

@section('title', 'Studenti')
@section('page_title', 'Popis studenata')

@section('content')

@if(session('uspjeh'))
  <div class="uspjeh">{{ session('uspjeh') }}</div>
@endif

<a class="btn" href="{{ route('studenti.create') }}">+ Novi student</a>

<p>Trenutno vrijeme: {{ \Carbon\Carbon::now()->format('d.m.Y H:i:s') }} </p>
<table style="margin-top: 1rem;">
  <tr>
    <th>ID</th>
    <th>Ime</th>
    <th>Prezime</th>
    <th>Status</th>
    <th>Godište</th>
    <th>Prosjek</th>
    <th>Promjene</th>
  </tr>

  @foreach($studenti as $s)
    <tr>
      <td>{{ $s->id }}</td>
      <td>{{ $s->ime }}</td>
      <td>{{ $s->prezime }}</td>
      <td>{{ $s->status }}</td>
      <td>{{ $s->godiste }}</td>
      <td>{{ $s->prosjek }}</td>
      <td>
        <a href="{{ route('studenti.show', $s) }}">Prikaži</a> |
        <a href="{{ route('studenti.edit', $s) }}">Uredi</a> |
        <form action="{{ route('studenti.destroy', $s) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return confirm('Obrisati?')">Obriši</button>
        </form>
      </td>
    </tr>
  @endforeach

</table>


@endsection
