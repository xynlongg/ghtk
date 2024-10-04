<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('notifications', function($user) {
    return $user != null;
});

Broadcast::channel('chat', function($user) {
    if($user != null){
        return ['id' => $user->id, 'name' => $user->name];
    }
    return false;
});

Broadcast::channel('chat.greet.{receiver_id}', function ($user, $receiver_id) {
    return (int) $user->id === (int) $receiver_id;
});
Broadcast::channel('post-office.{id}', function ($user, $id) {
    return $user->postOffices->contains($id);
});