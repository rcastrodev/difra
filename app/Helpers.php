<?php
use App\Customer;

if (! function_exists('current_customer')) {
    function current_customer($id)
    {
        return Customer::where('id', $id)->first();
    }
}