<?php

namespace Bluewing\Models;

use Bluewing\BluewingModel;
use Bluewing\BluewingTenant;
use Bluewing\Contracts\BluewingTenantContract;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organization extends BluewingModel implements BluewingTenantContract
{
    use BluewingTenant;

    /**
     * The name of the table in the database.
     */
    protected $table = 'Organizations';

    /**
     *
     */
    protected $guarded = ['id'];

    /**
     * An `Organization` is comprised of many `User`'s, both staff members and students, each having
     * varying levels of access to the `Organization`'s associated data.
     *
     * @laravel-relation `Organization` belongsToMany `User`.
     *
     * @return BelongsToMany
     */
    public function users() {
        return $this->belongsToMany('Bluewing\Models\User', 'UserOrganizations', 'organizationId', 'userId');
    }

    /**
     * An `Organization` is linked to its `User`'s through the `UserOrganization` pivot table.
     *
     * @laravel-relation `Organization` hasMany `UserOrganization`.
     *
     * @return HasMany
     */
    public function userOrganizations() {
        return $this->hasMany('Bluewing\Models\UserOrganization', 'organizationId');
    }
}