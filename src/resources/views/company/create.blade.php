@php
    $title = 'Додати нову компанію';
    $formAction = route('company.store');
@endphp

@extends('layouts.form')

@section('form-body')
    <!-- logo -->
    <div class="form-group">
        <label for="logo">Логотип компанії</label>
        <input type="file" class="form-control" id="logo" name="logo" placeholder="Виберіть файл" required>
        @error('logo')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!-- name -->
    <div class="form-group">
        <label for="name">Назва компанії</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Введіть назву компанії" required>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!-- email -->
    <div class="form-group">
        <label for="email">Ел. пошта</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Введіть ел. пошту" required>
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!-- website -->
    <div class="form-group">
        <label for="website">Вебсайт компанії</label>
        <input type="text" class="form-control" id="website" name="website" placeholder="Введіть назву сайта" required>
        @error('website')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
@endsection
