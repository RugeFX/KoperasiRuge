@extends('template')
@section('content')
<title>Show</title>

<h2 style="text-align: center; color: #00901C;">Show User</h2>
<a href="{{ route('jen.index') }}" class="btn btn-secondary">Kembali</a>

<div class="main-container">
    <div class="form-grid">
        <div class="form-title">
            <strong>ID User :</strong>
        </div>
        <div class="form-item">
            {{ $user->userId }}
        </div>
        <div class="form-title">
            <strong>Password :</strong>
        </div>
        <div class="form-item">
            {{ $user->password }}
        </div>
        <div class="form-title">
            <strong>Level :</strong>
        </div>
        <div class="form-item">
            {{ $user->level }}
        </div>
    </div>
@endsection