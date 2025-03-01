<?php

namespace Tests\Unit\Models;

use App\Models\Organisation;

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
