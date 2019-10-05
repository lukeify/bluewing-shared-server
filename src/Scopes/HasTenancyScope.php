<?php

namespace Bluewing\Scopes;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Scope;

/**
 * A trait which provides the functionality of the `TenancyScope` scope to traited models.
 */
trait HasTenancyScope {

    /**
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new TenancyScope);
    }

    /**
     * Any model which has a scope of a tenancy
     *
     * @laravel-relation `HasTenancyScope` belongsTo `Organization`
     *
     * @return BelongsTo
     */
    public function organization()
    {
        return $this->belongsTo(
            config('bluewing.tenancies.organization.model'),
            config('bluewing.tenancies.organization.identifier')
        );
    }

    /**
     * @param $related
     * @param null $foreignKey
     * @param null $ownerKey
     * @param null $relation
     * @return mixed
     */
    public abstract function belongsTo($related, $foreignKey = null, $ownerKey = null, $relation = null);

    /**
     * @param Scope $scope
     *
     * @return mixed
     */
    public static abstract function addGlobalScope(Scope $scope);
}
