<?php

namespace Eab\UniqueDatatypesBundle\Core\FieldType\UniqueTextLine;

use eZ\Publish\Core\FieldType\TextLine\Type as TextLineType;

class Type extends TextLineType
{
    /**
     * Inspects given $inputValue and potentially converts it into a dedicated value object.
     *
     * @param string|\eZ\Publish\Core\FieldType\TextLine\Value $inputValue
     * @return \eZ\Publish\Core\FieldType\TextLine\Value The potentially converted and structurally plausible value.
     */
    protected function createValueFromInput( $inputValue )
    {
        if ( is_string( $inputValue ) ) {
            $inputValue = new Value( $inputValue );
        }
        return $inputValue;
    }

    /**
     * Converts an $hash to the Value defined by the field type
     *
     * @param mixed $hash
     * @return \eZ\Publish\Core\FieldType\TextLine\Value $value
     */
    public function fromHash( $hash )
    {
        if ( $hash === null ) {
            return $this->getEmptyValue();
        }
        return new Value( $hash );
    }

    /**
     * Returns the fallback default value of field type when no such default
     * value is provided in the field definition in content types.
     *
     * @return \eZ\Publish\Core\FieldType\TextLine\Value
     */
    public function getEmptyValue()
    {
        return new Value;
    }

    /**
     * Returns the field type identifier for this field type
     *
     * @return string
     */
    public function getFieldTypeIdentifier()
    {
        return "ezuniquestring";
    }
}
