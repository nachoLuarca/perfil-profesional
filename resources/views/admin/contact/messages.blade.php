@extends('layouts.admin')

@section('title', 'Mensajes de Contacto')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Mensajes Recibidos</h5>
    </div>
    <div class="card-body">
        @if($messages->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Mensaje</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $msg)
                        <tr>
                            <td>{{ $msg->name }}</td>
                            <td><a href="mailto:{{ $msg->email }}">{{ $msg->email }}</a></td>
                            <td>{{ Str::limit($msg->message, 80) }}</td>
                            <td>{{ $msg->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $messages->links() }}
        @else
            <div class="alert alert-info">No se han recibido mensajes todavía.</div>
        @endif
    </div>
</div>
@endsection
