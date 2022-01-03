<!DOCTYPE html>

@foreach($users as $user)
    <img src="{{asset($user->avatar)}}"><br>
    {{$user->name}}<br>
    {{$user->email}}
@endforeach