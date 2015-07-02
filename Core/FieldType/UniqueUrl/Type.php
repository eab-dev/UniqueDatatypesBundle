<?php

namespace Eab\UniqueDatatypesBundle\Core\FieldType\UniqueUrl;

use eZ\Publish\Core\FieldType\Url\Type as UrlType;
use eZ\Publish\SPI\Persistence\Content\FieldValue;

class Type extends UrlType
{
    /**
     * Inspects given $inputValue and potentially converts it into a dedicated value object.
     *
     * @param string|\Eab\UniqueDatatypesBundle\Core\FieldType\UniqueUrl\Value $inputValue
     * @return \Eab\UniqueDatatypesBundle\Core\FieldType\UniqueUrl\Value The potentially converted and structurally plausible value.
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
     * @return \Eab\UniqueDatatypesBundle\Core\FieldType\UniqueUrl\Value $value
     */
    public function fromHash( $hash )
    {
        if ( $hash === null ) {
            return $this->getEmptyValue();
        }
        if ( isset( $hash["text"] ) ) {
            return new Value( $hash["link"], $hash["text"] );
        }
        return new Value( $hash["link"] );
    }

    /**
     * Returns the fallback default value of field type when no such default
     * value is provided in the field definition in content types.
     *
     * @return \Eab\UniqueDatatypesBundle\Core\FieldType\UniqueUrl\Value
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
        return "ezuniqueurl";
    }

    /**
     * Converts a persistence $fieldValue to a Value
     * This method builds a field type value from the $data and $externalData properties.
     *
     * @param \eZ\Publish\SPI\Persistence\Content\FieldValue $fieldValue
     * @return \Eab\UniqueDatatypesBundle\Core\FieldType\UniqueUrl\Value
     */
    public function fromPersistenceValue( FieldValue $fieldValue )
    {
        if ( $fieldValue->externalData === null ) {
            return $this->getEmptyValue();
        }

        return new Value(
            $fieldValue->externalData,
            $fieldValue->data['text']
        );
    }
}
