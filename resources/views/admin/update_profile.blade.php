@extends('layouts.admin_app')

@section('title', 'admin_register')


@section('content')

    <!-- form-container section -->

    <section class="form-container">

        <form action="" method="post">
            <h3>update profile</h3>
            <input type="text" name="name" maxlength="20" class="box" placeholder="enter your username" 
            oninput="this.value = this.value.replace(/\s/g, '')" value="">
            <input type="password" name="old_pass" class="box" maxlength="20" placeholder="enter your old password" 
            oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name="new_pass" class="box" maxlength="20" placeholder="enter your new password" 
            oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name="cpass" class="box" maxlength="20" placeholder="confirm your password" 
            oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="submit" name="submit" class="btn" value="update now">
        </form>

    </section>


@endsection




