<?php

/**
 * Convert a SimpleXML object to an associative array
 *
 * @param object $xmlObject
 *
 * @return array
 * @access public
 */
function simpleXmlToArray($xmlObject)
{
    $array = [];
    foreach ($xmlObject->children() as $node) {
        $array[$node->getName()] = is_array($node) ? simplexml_to_array($node) : (string) $node;
    }

    return $array;
}