<?php

namespace Tests\Unit\Models;

use App\Models\Organisation;
use App\Models\User;

test('to array', function (): void {
    $package = User::factory()->create()->fresh();

    expect(array_keys($package->toArray()))->toBe([
        'id',
        'name',
        'email',
        'email_verified_at',
        'created_at',
        'updated_at',
    ]);
});

it('can assign an organisation to a user', function (): void {
    $user = User::factory()->create();
    $organisation = Organisation::factory()->create();

    $user->organisations()->attach($organisation, ['role' => 1]);

    expect($user->organisations()->count())->toBe(1);

    expect($user->organisations()->first()->id)->toBe($organisation->id);
});
