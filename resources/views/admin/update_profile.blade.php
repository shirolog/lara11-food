@extends('layouts.admin_app')

@section('title', 'admin_register')


@section('content')

    <!-- form-container section -->

    <section class="form-container">

        <form action="{{route('admin.profile_update', $admin->id)}}" method="post">
            @csrf
            @method('PUT')
            <h3>update profile</h3>
            <input type="text" name="name" maxlength="20" class="box" placeholder="enter your username" 
            oninput="this.value = this.value.replace(/\s/g, '')" value="{{old('name', $admin->name)}}" required>
            @error('name')
                <p class="text-danger">{{$message}}</p> 
            @enderror
            <input type="password" name="old_password" class="box" maxlength="20" placeholder="enter your old password" 
            oninput="this.value = this.value.replace(/\s/g, '')" required>
            @error('old_password')
                <p class="text-danger">{{$message}}</p> 
            @enderror
            <input type="password" name="new_password" class="box" maxlength="20" placeholder="enter your new password" 
            oninput="this.value = this.value.replace(/\s/g, '')" required>
            @error('new_password')
                <p class="text-danger">{{$message}}</p> 
            @enderror
            <input type="password" name="new_password_confirmation" class="box" maxlength="20" placeholder="confirm your password" 
            oninput="this.value = this.value.replace(/\s/g, '')" required>
            @error('new_password_confirmation')
                <p class="text-danger">{{$message}}</p> 
            @enderror
            <input type="submit" name="submit" class="btn" value="update now">
        </form>

    </section>


@endsection




