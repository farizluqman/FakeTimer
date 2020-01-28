<?php


class TodaysDate
{
    public function get($attrs)
    {
        // Attributes
        $attrs = shortcode_atts(
            array(
//                'format' => 'd-m-Y h:i:sa'
                'format' => 'd/m/Y'
            ),
            $attrs,
            'span'
        );
        return date($attrs['format']);
    }
}