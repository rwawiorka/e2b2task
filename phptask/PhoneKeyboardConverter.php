<?php

namespace phptask;

class PhoneKeyboardConverter {

    public static $keypadRepresentation = [
        '2' => 'a',
        '22' => 'b',
        '222' => 'c',
        '3' => 'd',
        '33' => 'e',
        '333' => 'f',
        '4' => 'g',
        '44' => 'h',
        '444' => 'i',
        '5' => 'j',
        '55' => 'k',
        '555' => 'l',
        '6' => 'm',
        '66' => 'n',
        '666' => 'o',
        '7' => 'p',
        '77' => 'q',
        '777' => 'r',
        '7777' => 's',
        '8' => 't',
        '88' => 'u',
        '888' => 'v',
        '9' => 'w',
        '99' => 'x',
        '999' => 'y',
        '9999' => 'z',
        '0' => ' '
    ];

    /**
     * This method converts a string representation to a string that user should type on old phone keyboard to reveive given string
     * @param string $value
     * @return string
     */

    public static function convertToNumeric(string $value) : string {
        if (empty($value)) {
            return 'You should specify a string to convert to a numeric old phone keyboard format.';
        }
        $output = '';
        for($i = 0; $i < strlen($value); $i++) {
            if($value[$i] === strtoupper($value[$i])) { // if value is uppercase, convert to lower case
                $value[$i] = strtolower($value[$i]);
            }
            $output .= array_search($value[$i], self::$keypadRepresentation); // search key by value in array keypadRepresentation
            $output .= ','; // add comma to end of number
        }
        $output = rtrim($output, ','); // remove comma at the end of the string
        return $output;
    }

    /**
     * This method converts a phone keypad representation to a string that user should reveive on screen when typing on phone keyboard
     * @param string $value
     * @return string
     */

    public static function convertToString(string $value) : string {
        if (empty($value)) {
            return 'You should specify a string old phone keyboard format to convert to a string.';
        }
        $output = '';
        $keypadRepresentationFlip = array_flip(self::$keypadRepresentation); // flip keypadRepresentation array to search by value
        $keypadExploded = explode(',', $value); // explode given string $value into array by comma delimeter
        for($i = 0; $i < count($keypadExploded); $i++) {
            $output .= array_search($keypadExploded[$i], $keypadRepresentationFlip); // search key by value in array keypadRepresentationFlip
        }
        return $output;
    }
}