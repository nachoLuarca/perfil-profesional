@extends('layouts.app')

@section('title','Crear Proyecto')

@section('content')
<div class="container py-5">
  <h1>Crear Nuevo Proyecto</h1>
  <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Título</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Descripción</label>
      <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Imagen</label>
      <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="mb-3">
      <label for="url" class="form-label">URL del Proyecto</label>
      <input type="url" class="form-control" id="url" name="url" value="{{ old('url') }}">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</div>
@endsection
