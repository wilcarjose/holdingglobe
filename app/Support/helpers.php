<?php

function formatDate($date, $format = 'Y-m-d')
{
    return \Carbon\Carbon::parse($date)->format($format);
}

function toObject($array)
{
    return json_decode(json_encode($array), false);
}

function generateSlug($text)
{
    return rand(10000, 99999).'-'.str_slug($text, '-');
}