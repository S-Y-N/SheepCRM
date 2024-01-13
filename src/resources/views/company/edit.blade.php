@php
    $title = "Редагувати компанію \"$company->name\"";
    $formAction = route('company.update', $company->id);
    $isUpdate = true;
@endphp

@extends('layouts.form')

@section('form-body')
    <!--Logo-->
    <div class="form-group">
        <label for="photo">Логотип</label>
        <input type="file" class="form-control" id="logo" name="logo" placeholder="Виберіть файл" value="{{ $company->logo }}" required>
    </div>
    <!-- name -->
    <div class="form-group">
        <label for="name">Назва компанії</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Введіть назву компанії" value="{{$company->name}}"  required>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!-- email -->
    <div class="form-group">
        <label for="email">Ел. пошта</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Введіть ел. пошту" value="{{$company->email}}" required>
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!-- website -->
    <div class="form-group">
        <label for="website">Ел. пошта</label>
        <input type="text" class="form-control" id="website" name="website" placeholder="Введіть назву сайта" value="{{$company->website}}" required>
        @error('website')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
@endsection
