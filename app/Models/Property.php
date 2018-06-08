<?php

namespace Holdingglobe\Models;

class Property extends Master
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function saleType()
    {
        return $this->belongsTo(SaleType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function propertyType()
    {
        return $this->hasOne(PropertyType::class);
    }

    /**
     * Scope a query to not include sold items.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsNotSold($query)
    {
        return $query->where('sold', 0);
    }

    /**
     * Scope a query to only include properties of a given type.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfPropertyType($query, $type)
    {
        return $query->where('property_type_id', $type);
    }

    /**
     * Scope a query to only include properties of a given sale type.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfSaleType($query, $type)
    {
        return $query->where('sale_type_id', $type);
    }

    /**
     * Scope a query to only include items with a given title text.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $text
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLikeTitle($query, $text)
    {
        if (empty($text)) {
            return $query;
        }

        return $query->where('title', 'like', "%$text%");
    }

    /**
     * Scope a query to only include items with a given detail text.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $text
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLikeDetails($query, $text)
    {
        if (empty($text)) {
            return $query;
        }

        return $query->where('details', 'like', "%$text%");
    }

    /**
     * Scope a query to only include items of a given price range.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $min
     * @param mixed $max
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBetweenPrices($query, $min, $max)
    {
        return $query->where('price', '>=', $min)
            ->where('price', '<=', $max);
    }
}
