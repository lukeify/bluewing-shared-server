<?php

namespace Bluewing\SharedServer;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Pivot class designed to set a few properties that Bluewing models utilise.
 */
class BluewingPivot extends Pivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Whether attributes on the `Pivot` should be accessed via snake_case.
     *
     * @var bool
     */
    public static $snakeAttributes = false;

    /**
     * The database name for the created at datetime field.
     */
    const CREATED_AT = 'createdAt';

    /**
     * The database name for the updated at datetime field.
     */
    const UPDATED_AT = 'updatedAt';
}
