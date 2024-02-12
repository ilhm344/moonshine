<?php

declare(strict_types=1);

namespace MoonShine\Applies\Filters;

use Closure;
use MoonShine\Support\DbOperators;
use Illuminate\Contracts\Database\Eloquent\Builder;
use MoonShine\Contracts\ApplyContract;
use MoonShine\Fields\Field;

class TextModelApply implements ApplyContract
{
    /* @param \MoonShine\Fields\Text $field */
    public function apply(Field $field): Closure
    {
        return static function (Builder $query) use ($field): void {
            $query->where($field->column(), DbOperators::byModel($query->getModel())->like(), "%{$field->requestValue()}%");
        };
    }
}
