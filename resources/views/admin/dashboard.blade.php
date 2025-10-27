@extends('layouts.app')

@section('title','Panel de Administración')

@section('content')
<div class="container py-5">
  <h1 class="mb-4">Panel de Administración</h1>

  <div class="row">
   <div class="col-md-6 mb-3">
     <div class="card">
       <div class="card-header">Proyectos</div>
       <div class="card-body">
         <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">Nuevo Proyecto</a>
         <ul class="list-group">
           @foreach($projects as $p)
             <li class="list-group-item d-flex justify-between align-items-center">
               {{ $p->title }}
               <a href="{{ route('admin.projects.edit',$p) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
             </li>
           @endforeach
         </ul>
         <div class="mt-3">
           {{ $projects->links() }}
         </div>
       </div>
     </div>
   </div>

   <div class="col-md-6 mb-3">
     <div class="card">
       <div class="card-header">Competencias</div>
       <div class="card-body">
         <a href="{{ route('admin.skills.create') }}" class="btn btn-success mb-3">Nueva Competencia</a>
         <ul class="list-group">
           @foreach($skills as $s)
             <li class="list-group-item d-flex justify-between align-items-center">
               {{ $s->name }} ({{ $s->level }}%)
               <a href="{{ route('admin.skills.edit',$s) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
             </li>
           @endforeach
         </ul>
       </div>
     </div>
   </div>
  </div>
</div>
@endsection
