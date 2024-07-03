<?php
$libs_raw = file_get_contents(__DIR__."/lib.json");
$libs = json_decode($libs_raw, true);

foreach ($libs as $lib) {
  require_once "$lib/index.php";
}