@extends('layout.main')

@section('title', $curso->name)

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-6">
        <img src="/img/cursos/{{ $curso->image }}" class="img-fluid" alt="{{ $curso->name }}">
      </div>
      <div id="info-container" class="col-md-6">
        <h1>{{ $curso->name }}</h1>
       <p class="curso-simplified_description"><ion-icon name="reader-outline"></ion-icon> {{ $curso->simplified_description}}</p>
       <p class="curso-alunosqtd"><ion-icon name="people-outline"></ion-icon> Alunos Minimos: $curso->alunosqtdM</p>
       <p class="curso-alunosqtd"><ion-icon name="people-outline"></ion-icon> Alunos Matriculados: $curso->alunosqtdM / {{ $curso->alunosqtd}}</p>
       <p class="curso-alunosqtd"><ion-icon name="people-outline"></ion-icon> Alunos Máximos: {{ $curso->alunosqtd}}</p>
       <p class="curso-alunosqtd"><ion-icon name="people-outline"></ion-icon> Status: Matrículas Abertas/Mínimo de alunos não atingido!/Matrículas Abertas - Curso acontecerá!/Matrículas Encerradas</p>
       <p class="curso-alunosqtd"><ion-icon name="people-outline"></ion-icon> Professor: {{$curso->id_professor}}</p>
        <a href="#" class="btn btn-primary" id="curso-submit">Encerrar Matriculas</a>
      </div>
      <div class="col-md-12" id="description-container">
        <h3>Sobre o curso:</h3>
        <p class="curso-description">{{$curso->description}}</p>
      </div>
    </div>
  </div>

@endsection
