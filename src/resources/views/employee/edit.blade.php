@php
    $title = "Редагувати працівника \"$employee->first_name $employee->last_name\"";
    $formAction = route('employee.update', $employee->id);
    $isUpdate = true;
@endphp

@extends('layouts.form')

@section('form-body')
    <!-- company_id -->
    <div class="form-group">
        <label for="company_id">Компанія</label>
        <select class="form-control select2bs4 w-100" id="company_id" name="company_id" data-placeholder="Оберіть компанію" required>
            <option></option>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}" @selected($company->id == $employee->company_id)>
                    {{ $company->name }}
                </option>
            @endforeach
        </select>
        @error('company_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!-- name -->
    <div class="form-group">
        <label for="first_name">Ім'я працівника</label>
        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Введіть ім'я" value="{{$employee->first_name}}" required>
        @error('first_name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!-- last name -->
    <div class="form-group">
        <label for="last_name">Прізвище працівника</label>
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Введіть прізвище" value="{{$employee->last_name}}" required>
        @error('last_name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!-- email -->
    <div class="form-group">
        <label for="email">Ел. пошта</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Введіть ел. пошту" value="{{$employee->email}}" required>
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <!-- phone num -->
    <div class="form-group">
        <label for="phone">Номер телефону</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Введіть номер телефону" value="{{$employee->phone}}"  required>
        @error('phone')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
@endsection
