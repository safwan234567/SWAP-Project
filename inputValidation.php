<?php

function inputValidation($coursename,$coursedesc,$tutorinfo,$price,$numberoflectures){
    if (preg_match('/[A-Za-z0-9]+/', $coursename)) {
        if (preg_match('/[A-Za-z0-9]+/', $coursedesc)) {
            if (preg_match('/[A-Za-z0-9]+/', $tutorinfo)) {
                if (preg_match('/^[0-9]+(?:\.[0-9]+)?$/',$price)) {
                    if (preg_match('/[0-9]+/', $numberoflectures) ) {
                                        return true;
                    }
                    else{
                        exit('numberoflectures is not valid!');
                    }
                }
                else{
                    exit('price is not valid!');
                }
            }
            else{
                exit('tutorinfo is not valid!');
            }
        }
        else{
            exit('coursedesc is not valid!');
        }
    }
    else{
        exit('coursename is not valid!');
    }	
}
?>