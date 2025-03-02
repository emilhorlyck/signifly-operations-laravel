<?php

namespace Tests\Unit\Models;

use App\Models\Organisation;
use App\Models\User;

test('to array', function (): void {
    $package = Organisation::factory()->create()->fresh();

    expect(array_keys($package->toArray()))->toBe([
        'id',
        'name',
        'notion_id',
        'created_at',
        'updated_at',
    ]);
});

it('can assign a user to an organisation', function (): void {
    $organisation = Organisation::factory()->create();
    $user = User::factory()->create();

    $organisation->users()->attach($user, ['role' => 1]);

    expect($organisation->users()->count())->toBe(1);

    expect($organisation->users()->first()->id)->toBe($user->id);
});
