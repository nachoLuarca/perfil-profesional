@extends('layouts.app')

@section('title', $user?->name ? $user->name . ' - Perfil Profesional' : 'Perfil Profesional')
@section('meta_description', $user?->bio ?? 'Sin descripción disponible')
@section('meta_keywords', 'Portafolio, ' . ($user?->profession ?? 'Profesión no especificada'))


@section('content')
<div class="container py-5">
  <div class="text-center mb-5">
    @if($user)
  <div class="text-center mb-5">
      @if($user->photo)
          <img src="{{ asset('storage/' . $user->photo) }}" class="rounded-circle" width="150">
      @endif
      <h1 class="mt-3">{{ $user->name }}</h1>
      <h4 class="text-muted">{{ $user->profession }}</h4>
      <p>{{ $user->bio }}</p>
  </div>
@else
  <p class="text-center text-muted">No hay usuario disponible actualmente.</p>
@endif
  </div>

  <h2>Competencias</h2>
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

  <h2 class="mt-5">Portafolio de Proyectos</h2>
  <div class="row">
    @foreach($projects as $project)
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          @if($project->image)
            <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top">
          @endif
          <div class="card-body">
            <h5 class="card-title">{{ $project->title }}</h5>
            <p class="card-text">{{ $project->description }}</p>
          </div>
          @if($project->url)
            <div class="card-footer">
              <a href="{{ $project->url }}" target="_blank" class="btn btn-primary">Ver Proyecto</a>
            </div>
          @endif
        </div>
      </div>
    @endforeach
  </div>

  <div class="d-flex justify-content-center">
    {{ $projects->links() }}
  </div>
</div>
@endsection
