@extends('layouts.min')

@section('content')
    <div class="login-box container-fluid mt-5" style="width: 420px">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h4>SheepFish CRM</h4>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Увійдіть для початку сесії</p>

                <form action="{{ route('auth.auth') }}" method="post">
                    @csrf

                    <!-- email -->
                    <div class="form-group mb-3">
                        <div class="input-group">
                            <input type="email" class="form-control @error('email') border-danger @enderror" id="email" name="email" placeholder="Введіть email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- password -->
                    <div class="form-group mb-3">
                        <div class="input-group">
                            <input type="password" class="form-control @error('password') border-danger @enderror" id="password" name="password" placeholder="Введіть пароль">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex row mt-5 mb-2 justify-content-between align-items-end">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Увійти</button>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <a href="#">Я забув пароль</a>
                        </div>
                    </div>
                    <!-- /.row -->
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
@endsection
