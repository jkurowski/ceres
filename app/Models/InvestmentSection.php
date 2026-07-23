<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestmentSection extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'investment_id',
        'columns',
        'type',
        'title',
        'subtitle',
        'content',
        'file',
        'file_alt',
        'sort'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            // jeśli sort już jest ustawiony → nic nie rób
            if (!empty($model->sort)) {
                return;
            }

            // pobierz ostatni sort dla tej inwestycji
            $lastSort = self::where('investment_id', $model->investment_id)
                ->max('sort');

            $model->sort = $lastSort ? $lastSort + 1 : 1;
        });
    }
}
