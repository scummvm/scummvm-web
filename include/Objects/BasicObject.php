<?php
namespace ScummVM\Objects;

/**
 * The BasicObject class is inherited by all other objects and houses all common
 * functions.
 */
abstract class BasicObject
{
    protected ?string $name;
    protected ?string $description;

    /**
     * @param array{'description'?: string, 'name'?: string} $data
     */
    public function __construct(array $data)
    {
        $this->description = $data['description'] ?? null;
        $this->name = $data['name'] ?? null;
    }

    public function __toString(): string
    {
        return $this->getName() ?? '';
    }

     /* Get the name. */
    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * If the input array doesn't contain the numerical key 0, wrap it inside
     * an array. This functions operates on the data directly.
     *
     * @param $data the input
     * @param-out mixed[] $data
     */
    public function toArray(mixed &$data): void
    {
        if (!is_array($data) || !array_key_exists(0, $data)) {
            $data = array($data);
        }
    }
}
