<?php

namespace pxlrbt\FilamentExcel\Concerns;

use Closure;

trait Except
{
    protected Closure | array | null $except = null;

    public function except(Closure | array | string $columns): self
    {
        $this->except = match (true) {
            is_callable($columns), is_array($columns) => $columns,
            default => func_get_args()
        };

        return $this;
    }

    public function getExcept(): ?array
    {
        return $this->evaluate($this->except);
    }
}
