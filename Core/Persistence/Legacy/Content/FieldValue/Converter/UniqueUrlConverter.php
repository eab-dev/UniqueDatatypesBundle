<?php

namespace Eab\UniqueDatatypesBundle\Core\Persistence\Legacy\Content\FieldValue\Converter;

use eZ\Publish\Core\Persistence\Legacy\Content\FieldValue\Converter\Url as UrlConverter;

/**
 * UniqueUrl field value converter class
 */
class UniqueUrlConverter extends UrlConverter
{
    /**
     * Factory for current class
     *
     * @note Class should instead be configured as service if it gains dependencies.
     *
     * @return TextLine
     */
    public static function create()
    {
        return new self;
    }
}
