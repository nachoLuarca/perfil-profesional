@extends('layouts.app')

@section('title', $user->name . ' - Perfil Profesional')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        @if($user && $user->photo)
            <img src="{{ asset('storage/' . $user->photo) }}" class="rounded-circle" width="150">
        @endif
        @if($user)
            <h1 class="mt-3">{{ $user->name }}</h1>
            <h4 class="text-muted">{{ $user->profession }}</h4>
            <p>{{ $user->bio }}</p>
        @endif
    </div>
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
    {{-- Sección de proyectos --}}
    <div class="mb-5">
        <h2 class="text-center mb-4">Proyectos</h2>
        <div class="row">
            @foreach($projects as $project)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($project->image)
                            <img src="{{ asset('storage/'.$project->image) }}" class="card-img-top" alt="{{ $project->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                            @if($project->url)
                                <a href="{{ $project->url }}" class="btn btn-outline-primary" target="_blank">Ver Proyecto</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $projects->links() }}
    </div>
    {{-- Sección de contacto --}}
    <div class="py-5 border-top mt-5">
        <h2 class="text-center mb-4">Contáctame</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                @if($contact)
                    <p><strong>Correo:</strong> <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
                    @if($contact->phone)
                        <p><strong>Teléfono:</strong> {{ $contact->phone }}</p>
                    @endif
                    @if($contact->address)
                        <p><strong>Dirección:</strong> {{ $contact->address }}</p>
                    @endif
                    @if($contact->message)
                        <p class="text-muted">{{ $contact->message }}</p>
                    @endif
                @else
                    <p>No hay información de contacto configurada.</p>
                @endif
            </div>
        </div>

        {{-- Formulario de mensaje --}}
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <form method="POST" action="{{ route('home.send') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Tu nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Tu correo</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Mensaje</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                    </div>
                </form>
            </div>
        </div>
            {{-- Sección de redes sociales --}}
        <div class="py-5 border-top mt-5 text-center">
            <h2 class="mb-4">Sígueme en redes sociales</h2>
            <div class="d-flex justify-content-center gap-4">
                @if($user->facebook)
                    <a href="{{ $user->facebook }}" target="_blank" class="text-decoration-none text-dark">
                        <i class="fab fa-facebook fa-2x"></i>
                    </a>
                @endif
                @if($user->instagram)
                    <a href="{{ $user->instagram }}" target="_blank" class="text-decoration-none text-dark">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
                @endif
                @if($user->twitter)
                    <a href="{{ $user->twitter }}" target="_blank" class="text-decoration-none text-dark">
                        <i class="fab fa-twitter fa-2x"></i>
                    </a>
                @endif
                @if($user->linkedin)
                    <a href="{{ $user->linkedin }}" target="_blank" class="text-decoration-none text-dark">
                        <i class="fab fa-linkedin fa-2x"></i>
                    </a>
                @endif
                @if($user->github)
                    <a href="{{ $user->github }}" target="_blank" class="text-decoration-none text-dark">
                        <i class="fab fa-github fa-2x"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
