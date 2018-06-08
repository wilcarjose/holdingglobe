<?php

namespace Holdingglobe\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
