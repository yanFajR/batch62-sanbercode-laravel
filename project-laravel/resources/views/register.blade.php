@extends('layouts.master')

@section('title')
    Register
@endsection

@section('content')
    <h1>Buat Account Baru!</h1>
    <h3>Sign Up Form</h3>
    <form action="/welcome" method="POST">
        @csrf
        <label for="firstName">First Name:</label><br>
        <input type="text" name="firstName"><br><br>
        <label for="lastName">Last Name:</label><br>
        <input type="text" name="lastName"><br><br>
        <label>Gender:</label><br>
        <input type="radio" name="gender" value="male">Male<br>
        <input type="radio" name="gender" value="female">Female<br>
        <input type="radio" name="gender" value="other">Other<br><br>
        <label for="">Nationality:</label><br>
        <select name="Nationality">
            <option value="Indonesian" name="nationality">Indonesian</option>
            <option value="Singaporean" name="nationality">Singaporean</option>
            <option value="Malaysian" name="nationality">Malaysian</option>
        </select><br><br>
        <label>Languange Spoken:</label><br>
        <input type="checkbox" name="language" value="Indonesia">Bahasa Indonesia<br>
        <input type="checkbox" name="language" value="English">English<br>
        <input type="checkbox" name="language" value="Other">Other<br><br>
        <label for="bio">Bio:</label><br>
        <textarea name="bio" id="bio" rows="10" cols="30"></textarea><br>
        <input type="submit" value="Sign Up">
    </form>
@endsection