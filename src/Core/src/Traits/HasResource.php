<?php

declare(strict_types=1);

namespace MoonShine\Core\Traits;

use MoonShine\Contracts\Core\ResourceContract;
use MoonShine\Core\Exceptions\ResourceException;
use Throwable;

/**
 * @template-covariant T of ResourceContract
 * @template-covariant PT of ResourceContract
 */
trait HasResource
{
    protected ?ResourceContract $resource = null;

    protected ?ResourceContract $parentResource = null;

    public function getParentResource(): ?ResourceContract
    {
        return $this->parentResource;
    }

    public function setParentResource(ResourceContract $resource): static
    {
        $this->parentResource = $resource;

        return $this;
    }

    public function setResource(ResourceContract $resource): static
    {
        $this->resource = $resource;

        return $this;
    }

    public function hasResource(): bool
    {
        return ! is_null($this->resource);
    }

    public function getResource(): ?ResourceContract
    {
        return $this->resource;
    }

    /**
     * @throws Throwable
     */
    protected function validateResource(): void
    {
        throw_if(
            ! $this->hasResource(),
            ResourceException::required()
        );
    }
}