@extends('layouts.app')

@section('title', $user?->name . ' - Perfil Profesional')
@section('meta_description', $user?->bio ?? '')
@section('meta_keywords', 'Portafolio, ' . ($user?->profession ?? ''))

@section('content')
<div class="container py-5">

  {{-- Perfil del usuario --}}
  @if($user)
  <div class="text-center mb-5">
    @if($user->photo)
      <img src="{{ asset('storage/' . $user->photo) }}" class="rounded-circle" width="150">
    @endif
    <h1 class="mt-3">{{ $user->name }}</h1>
    <h4 class="text-muted">{{ $user->profession }}</h4>
    <p>{{ $user->bio }}</p>
  </div>
  @endif

  {{-- Habilidades --}}
  @foreach($skills as $skill)
    <div class="mb-3">
      <strong>{{ $skill->name }}</strong>
      <div class="progress">
        <div class="progress-bar" role="progressbar"
             style="width:{{ $skill->level }}%" aria-valuenow="{{ $skill->level }}"
             aria-valuemin="0" aria-valuemax="100">{{ $skill->level }}%</div>
      </div>
    </div>
  @endforeach

  {{-- Proyectos --}}
  <div>
    <h3>Proyectos</h3>
    <div class="row">
      @foreach($projects as $project)
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            @if($project->image)
              <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top" alt="{{ $project->title }}">
            @endif
            <div class="card-body">
              <h5 class="card-title">{{ $project->title }}</h5>
              <p class="card-text">{{ $project->description }}</p>
              <a href="{{ $project->url }}" target="_blank" class="btn btn-outline-primary btn-sm">Ver proyecto</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

</div>
@endsection
