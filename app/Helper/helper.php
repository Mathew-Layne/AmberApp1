<?php

use App\Models\Student;

const HLP_TBL = "<table>";
const HLP_END_TBL = "</table>";
const HLP_TR = "<tr>";
const HLP_END_TR = "</tr>";
const HLP_TH = "<th>";
const HLP_END_TH = "</th>";
const HLP_TD = "<td>";
const HLP_END_TD = "</td>";



function help_table($header, $data){    
    echo HLP_TBL;
        echo HLP_TR;
    foreach ($header as $key => $value) {
             echo HLP_TH;                
                    echo strtoupper($key);            
            echo HLP_END_TH;
    }
        echo HLP_END_TR;
    foreach ($data as $values) {
        echo HLP_TR;
        foreach($values->toArray() as $col){
            echo HLP_TD;
                echo $col;
            echo HLP_END_TD;
        }    
        echo HLP_END_TR;
        }
    echo HLP_END_TBL;

}