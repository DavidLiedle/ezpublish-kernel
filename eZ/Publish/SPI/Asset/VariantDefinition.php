<?php

namespace eZ\Publish\SPI\Asset;

class VariantDefinition
{
    /**
     * Unique identifier of this variant.
     *
     * Note that "original" is reserved.
     *
     * @var string
     */
    public $identifier;

    /**
     * Identifier of the source variant which is used as the basis for this one.
     *
     * @var string
     */
    public $source = 'original';

    /**
     * Array of filters to apply in a sequence on $source to generate this variant.
     *
     * @var \eZ\Publish\SPI\Asset\FilterDefinition[]
     */
    public $filters;

    /**
     * Target encoding format.
     *
     * @var mixed
     * @TODO Specify how this will work.
     */
    public $targetFormat;
}