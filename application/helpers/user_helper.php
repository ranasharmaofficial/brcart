<?php

function getCurrentDateTime()
{
    date_default_timezone_set("Asia/Calcutta");
    return date('d-M-Y h:i:s');
}

function getDatedMY($date)
{
    return date('d-M-Y', strtotime($date));
}

function getDefaultImg($data)
{
    $str = $data['str'];
    $html = "<img src='https://res.cloudinary.com/ranasharma-com/image/upload/v1621870172/ranalogo/logo_m4qvb0.jpg' " . $str . ">";
    return $html;
}

function getGender()
{
    return array('M' => 'Male', 'F' => 'Female');
}

function getRecordStatus($id = 0)
{
    $arr = array(1 => 'Pending', 2 => 'Active', 3 => 'InActive', 4 => 'Cancelled');
    if ($id) {
        return $arr[$id];
    } else {
        return $arr;
    }
}

function convertToFirstUpper($str)
{
    return ucwords(trim($str));
}

function convertToAllLower($str)
{
    return strtolower(trim($str));
}

function printData($data)
{
    echo "<pre>";
    print_r($data);
    exit();
}

function getNumberFormat($number = 0)
{
    return number_format($number, 2);
}

/*
 * Helper function to check whether the url slug already exists
 */
if (!function_exists('isUrlExists')) {
    function isUrlExists($tblName, $urlSlug)
    {
        if (!empty($tblName) && !empty($urlSlug)) {
            $ci = &get_instance();
            $ci->db->from($tblName);
            $ci->db->where('slug', $urlSlug);
            $rowNum = $ci->db->count_all_results();
            return ($rowNum > 0) ? true : false;
        } else {
            return true;
        }
    }
}

if (!function_exists('isContentUrlExists')) {
    function isContentUrlExists($tblName, $urlSlug)
    {
        if (!empty($tblName) && !empty($urlSlug)) {
            $ci = &get_instance();
            $ci->db->from($tblName);
            $ci->db->where('slug', $urlSlug);
            $rowNum = $ci->db->count_all_results();
            return ($rowNum > 0) ? true : false;
        } else {
            return true;
        }
    }
}

if (!function_exists('isSubcategoryUrlExists')) {
    function isSubcategoryUrlExists($tblName, $urlSlug)
    {
        if (!empty($tblName) && !empty($urlSlug)) {
            $ci = &get_instance();
            $ci->db->from($tblName);
            $ci->db->where('slug', $urlSlug);
            $rowNum = $ci->db->count_all_results();
            return ($rowNum > 0) ? true : false;
        } else {
            return true;
        }
    }
}

if (!function_exists('isChildcategoryUrlExists')) {
    function isChildcategoryUrlExists($tblName, $urlSlug)
    {
        if (!empty($tblName) && !empty($urlSlug)) {
            $ci = &get_instance();
            $ci->db->from($tblName);
            $ci->db->where('slug', $urlSlug);
            $rowNum = $ci->db->count_all_results();
            return ($rowNum > 0) ? true : false;
        } else {
            return true;
        }
    }
}

if (!function_exists('isProductUrlExists')) {
    function isProductUrlExists($tblName, $urlSlug)
    {
        if (!empty($tblName) && !empty($urlSlug)) {
            $ci = &get_instance();
            $ci->db->from($tblName);
            $ci->db->where('slug', $urlSlug);
            $rowNum = $ci->db->count_all_results();
            return ($rowNum > 0) ? true : false;
        } else {
            return true;
        }
    }
}