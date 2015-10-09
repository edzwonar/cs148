<?php

//##############################################################################
//
// This page lists your tables and fields within your database. if you click on
// a database name it will show you all the records for that table. 
// 
// 
// This file is only for class purposes and should never be publicly live
//##############################################################################
include "top.php";

 // Begin output
print '<article>';

// print out a list of all the tables and their description
// make each table name a link to display the record
print '<section id="tables2" class="float_left">';



         print '<table>';
   
            //now print out query
            $query = 'SELECT * FROM tblStudents ORDER BY fldLastName ASC, fldFirstName LIMIT 10 OFFSET 1000';
            $info2 = $thisDatabaseReader->select($query, "", 0, 1, 0, 0, false, false);
            $columns = 8;
            
   $fields = array_keys($info2[0]);
   $labels = array_filter($fields, "is_string");

   foreach ($labels as $label) {
       if ($label != "") {
           $label = substr($label,3);
            print "<td>" . $label . "</td>";  
       }
   }
   
    //function highlight($info2, $columns) {
    $highlight = 0; // used to highlight alternate rows
    foreach ($info2 as $rec) {
        $highlight++;
        if ($highlight % 2 != 0) {
            $style = ' odd ';
        } else {
            $style = ' even ';
        }
        print '<tr class="' . $style . '">';
        for ($i = 0; $i < $columns; $i++) {
            print '<td>' . $rec[$i] . '</td>';
        }
        print '</tr>';
      }
   
    // all done
    print '</table>';
    print '</section>';
    print '</article>';
    print '<article id="queryTitle">';
    print "<h1>SQL: " . $query . "</h1>";
    print "<h1>Total Records: " . count($info2)."</h1>";
    print '</article>';
?>

