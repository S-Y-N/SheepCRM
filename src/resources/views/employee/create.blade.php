@php
    $title = 'Додати працівника';
    $formAction = route('employee.store');
@endphp

@extends('layouts.form')

@section('form-body')
    <!-- company_id -->
    <div class="form-group">
        <label for="company_id">Компанія</label>
        <select class="form-control select2bs4 w-100" id="company_id" name="company_id" data-placeholder="Оберіть компанію" required>
            <option></option>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}">
                    {{ $company->name }}
                </option>
            @endforeach
        </select>
        @error('country_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!-- name -->
    <div class="form-group">
        <label for="first_name">Ім'я працівника</label>
        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Введіть ім'я" required>
        @error('first_name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!-- last name -->
    <div class="form-group">
        <label for="last_name">Прізвище працівника</label>
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Введіть прізвище" required>
        @error('last_name')
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
    <!-- phone num -->
    <div class="form-group">
        <label for="phone">Номер телефону</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Введіть номер телефону" required>
        @error('phone')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
@endsection
