<?php

use App\Models\Account;
use Illuminate\Support\Facades\Auth;

if (!function_exists('generateYearOptions')) {
    function generateYearOptions($numberOfYears = 10)
    {
        $currentYear = date('Y');
        $years = [];

        for ($i = 0; $i <= $numberOfYears; $i++) {
            $year = $currentYear - $i;
            $years[$year] = $year;
        }

        return $years;
    }
}
