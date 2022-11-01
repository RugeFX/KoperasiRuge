@extends('template')
@section('content')
<title>Create</title>
<h2 style="text-align: center; color: #00901C;">Create User</h2>
<a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>

@if($errors->any())
<div class="alert alert-danger">
    <strong>Waduh!</strong> Input gagal. <br><br>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
    </ul>
</div>
@endif
        
<form action="{{ route('user.store') }}" method="POST">
    @csrf
        
    <div class="main-container">
        <div class="form-grid">
            <div class="form-title">
                <strong>ID User :</strong>
            </div>
            <div class="form-item">
                <input type="text" name="userId"  placeholder="ID User">
            </div>
            <div class="form-title">
                <strong>Password :</strong>
            </div>
            <div class="form-item">
                <input type="text" name="password">
            </div>
            <div class="form-title">
                <strong>Level :</strong>
            </div>
            <div class="form-item">
                <input type="text" name="level"  placeholder="Level">
            </div>
        </div>
        <div style="display: flex; justify-content: center; margin-top: .5rem;">
            <button type="submit" class="action-btn" style="text-align: center; border: none; cursor: pointer; padding: .5rem;">Simpan</button>
        </div>
    </div>
</form>
@endsection
