<?php
require_once 'functions/utils.php';

session_start();

TPL::getInstance()->display('registration.tpl');