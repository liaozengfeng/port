@extends('layouts.layouts')

@section('title', 'Register')
@section('content')
    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">L+</h1>

            </div>
            <h3>Welcome to register L+</h3>
            <p>Create a new account</p>
            <form class="m-t" role="form" action="/admin/do_register" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Please enter user name" required="" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Please enter your password" required="" name="pwd">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Please confirm the password" required="" name="confirmpwd">
                </div>
                 <div class="form-group text-left">
                    <div class="checkbox i-checks">
                        <label class="no-padding">
                            <input type="radio" name="authority" value="0"><i></i> Super Admin</label>
                        <label class="no-padding">
                            <input type="radio" name="authority" value="1"><i></i> Admin</label>
                    </div>
                </div>
                <div class="form-group text-left">
                    <div class="checkbox i-checks">
                        <label class="no-padding">
                            <input type="checkbox"><i></i> I agree to the registration agreement</label>
                    </div>
                </div>
                <button  type="submit" class="btn btn-primary block full-width m-b">Submit</button>

                <p class="text-muted text-center"><small>I already have an account</small><a href="/login/login">Clikc Login</a>
                </p>

            </form>
        </div>
    </div>
@endsection
