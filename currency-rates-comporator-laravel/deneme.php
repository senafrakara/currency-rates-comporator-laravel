<?php 
use Illuminate\Support\Facades\DB;

$tables = \DB::select('show tables');

print_r($tables);