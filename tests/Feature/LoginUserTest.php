<?php

//trait para no afectar la bd real

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('shows the login screen', function() {

    $request = $this->get(route('login'));

    $request->assertOk();

});

test('logs in a verified user successfully', function() {

    User::create([
        'name' => 'Jesús',
        'email' => 'jmichel@gmail.com',
        'password' => bcrypt('password'),
        'email_verified_at' => now()
    ]);

    $response = $this->post(route('login.store'), [
        'email' => 'jmichel@gmail.com',
        'password' => 'password'
    ]);

    $response->assertRedirect(route('dashboard'));

    $this->assertAuthenticated();

});

test('does not log in with the invalid credentials', function() {

    User::create([
        'name' => 'Jesús',
        'email' => 'jmichel@gmail.com',
        'password' => bcrypt('password'),
        'email_verified_at' => now()
    ]);

    $response = $this->post(route('login.store'), [
        'email' => 'jmichel@gmail.com',
        'password' => 'not-the-password'
    ]);

    $response->assertRedirect(route('login'));
    $response->assertSessionHas('error', 'Las credenciales son incorrectas');

    $this->assertGuest();
    
});

test('prevents unverified user from accessing', function() {

    User::factory()->unverified()->create([
        'name' => 'Jesús',
        'email' => 'jmichel@gmail.com',
        'password' => bcrypt('password')
    ]);

    $response = $this->post(route('login.store'), [
        'email' => 'jmichel@gmail.com',
        'password' => 'password'
    ]);

    $response->assertRedirect(route('dashboard'));
    $this->assertAuthenticated();

    $dashboardResponse = $this->get(route('dashboard'));
    $dashboardResponse->assertRedirect(route('verification.notice'));

});

test('does not allow access to dashboard if email is not verified', function() {

    $user = User::factory()->create([
        'email_verified_at' => null
    ]);

    $response = $this->actingAs($user)->get(route('dashboard'));

    $response->assertRedirect(route('verification.notice'));

});

test('allow to access to dashboard if email is verified', function() {

    $user = User::factory()->create([
        'email_verified_at' => now()
    ]);

    $response = $this->actingAs($user)->get(route('dashboard'));

    $response->assertOk();
});

test('fails login if user does not exist', function() {

    $response = $this->from(route('login'))
        ->post(route('login.store'), [
            'email' => 'alex@gmail.com',
            'password' => 'password'
            ]);

    $response->assertRedirect(route('login'));
    $response->assertSessionHasErrors([
        'email' => 'No encontramos una cuenta con ese email'
    ]);

    $this->assertGuest();

});


