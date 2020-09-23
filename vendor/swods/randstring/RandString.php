<?php

namespace swods\randstring;

/**
 * "How to use" can be found in README.md file
 * @author SSU (SwoDs) <etc@swods.ru>
 */
class RandString
{
    public static function generate($config = []) 
    {
        $settings = [
            'chars' => self::getChars(),
            'length' => 5
        ];

        foreach ($settings as $key => $value) {
            if (!empty($config[$key])) {
                $settings[$key] = $config[$key];
            }
        }

        $numChars = strlen($settings['chars']);
        $string = '';
        
        for ($i = 0; $i < $settings['length']; $i++) {
            $string .= substr($settings['chars'], rand(1, $numChars) - 1, 1);
        }

        return $string;
    }

    public static function getChars() 
    {
        $chr_ranges = [
            'h' => [
                'start' => ord('A'),
                'end' => ord('Z')
            ],
            'l' => [
                'start' => ord('a'),
                'end' => ord('z')
            ],
            'n' => [
                'start' => ord('0'),
                'end' => ord('9')
            ],
        ];

        $chars = '';
        foreach ($chr_ranges as $range) {
            for ($i = $range['start']; $i <= $range['end']; ++$i) {
                $chars .= chr($i);
            }
        }

        return $chars;
    }
}
