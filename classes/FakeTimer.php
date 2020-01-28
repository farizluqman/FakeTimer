<?php

class FakeTimer
{
    public function generateHtml($attrs)
    {
        // Attributes
        $attrs = shortcode_atts(
            array(
                'hours' => '',
                'minutes' => '',
                'seconds' => '',
                'style' => '',
                'id' => '',
                'htext' => 'Hours',
                'mtext' => 'Minutes',
                'stext' => 'Seconds',
                'expiry' => 1
            ),
            $attrs,
            'div'
        );


        $gen_html = '';
        $gen_attrs = '';
        $gen_divs = '';

        // todo
        $gen_attrs .= 'dataFakeTimerH="' . $attrs['hours'] . '" ';
        $gen_attrs .= 'dataFakeTimerM="' . $attrs['minutes'] . '" ';
        $gen_attrs .= 'dataFakeTimerS="' . $attrs['seconds'] . '" ';
        $gen_attrs .= 'dataFakeTimerExpiry="' . $attrs['expiry'] . '" ';
        $gen_attrs .= 'id="FakeTimer' . $attrs['id'] . '" ';

        $gen_divs .= '<div class="FakeTimerMain FakeTimerRow" ' . $gen_attrs . '>';
        $gen_divs .= '<div class="FakeTimerCol FakeTimerH"></div>';
        $gen_divs .= '<div class="FakeTimerCol colon upper">:</div>';
        $gen_divs .= '<div class="FakeTimerCol FakeTimerM"></div>';
        $gen_divs .= '<div class="FakeTimerCol colon upper">:</div>';
        $gen_divs .= '<div class="FakeTimerCol FakeTimerS"></div>';
        $gen_divs .= '</div>';

        $gen_divs .= '<div class="FakeTimerRow">';
        $gen_divs .= '<div class="FakeTimerCol Text">'.$attrs['htext'].'</div>';
        $gen_divs .= '<div class="FakeTimerCol colon"></div>';
        $gen_divs .= '<div class="FakeTimerCol Text">'.$attrs['mtext'].'</div>';
        $gen_divs .= '<div class="FakeTimerCol colon"></div>';
        $gen_divs .= '<div class="FakeTimerCol Text">'.$attrs['stext'].'</div>';
        $gen_divs .= '</div>';


        $gen_html = '<div class="FakeTimer ' . $attrs['style'] . '">' . $gen_divs . '</div>';

        return $gen_html;
    }
}