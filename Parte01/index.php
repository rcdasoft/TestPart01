<?php
include './CompleteRange.php';
include './ChangeString.php';
include './ClearPar.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
entrada : "()())()" salida : "()()()"
entrada : "()(()" salida : "()()"
entrada : ")(" salida : ""
entrada : "((()" salida : "()"
*/

$test = new ClearPar();


echo $test->build('()');