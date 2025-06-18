<?php
function group1()
{
    //instruktur
    return ['4'];
}
//students
function group2()
{
    return ['3'];
}
//admin, admininstrator, users, PIC
function group3()
{
    return ['1', '2', '5', '6'];
}
function role_available()
{
    //instruktur, students
    return ['4', '3'];
}

//in array
function canAddModul($role)
{
    if (in_array($role, group1())) {
        return true;
    }
}
