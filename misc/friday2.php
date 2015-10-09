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

$startRecord = 0;
$endRecord = 9;

if (isset($_GET['startRecord'])) {
    $startRecord = (int) $_GET['startRecord'];
}
if (isset($_GET['endRecord'])) {
    $endRecord = (int) $_GET['endRecord'];
}
/*
switch ($startRecord) {
    case 0: 
            $prevLink = '<<';
            $curr = 'Page 1';
            $nextLink = '<a href="?startRecord=10&endRecord=19">>></a>';
            break;
    case 10:
            $prevLink = '<a href="?startRecord=0&endRecord=9"><<</a>';
            $curr = 'Page 2';
            $nextLink = '<a href="?startRecord=20&endRecord=29">>></a>';
            break;
    case 20: 
            $prevlink = '<a href="?startRecord=10&endRecord=19"><<</a>';
            $curr = 'Page 3';
            $nextLink = '<a href="?startRecord=30&endRecord=39"><<</a>';
            break;
    default:
            $prevLink = '<<';
            $curr = 'Page 1';
            $nextLink = '<a href="?startRecord=10&endRecord=19">>></a>';
            break;
}
*/
if ($startRecord == 0) {
    $prevLink = '<<';
    $curr = "Page 1";
    $nextLink = '<a href="?startRecord=10&endRecord=19">>></a>';
}
$j = 1;
for ($i = 10; $i < 1000; $i+=9) {
   $j++;
    if ($startRecord == $i) {
        //$prevS = $i-10;
        //$prevE = $i--;
        $prevLink = '<a href="?startRecord='.($i-10).'&endRecord='.$i--.'"><<</a>';
        $curr = "Page ". $j++;
        $nextS = $i+10;
        $nextE = $nextS + 9;
        $nextLink = '<a href="?startRecord='.$nextS.'&endRecord='.$nextE.'">>></a>';
   
    }
    
}

 // Begin output
print '<article>';
// print out a list of all the tables and their description
// make each table name a link to display the record
print '<section id="tables2" class="float_left">';


         print '<table>';
   
            //now print out query
            $query = 'SELECT * FROM tblStudents ORDER BY fldLastName ASC, fldFirstName LIMIT 10 OFFSET ' .$startRecord;
            $info2 = $thisDatabaseReader->select($query,"", 0, 1, 0, 0, false, false);
            $columns = 8;
            
   $fields = array_keys($info2[0]);
   $labels = array_filter($fields, "is_string");
   foreach ($labels as $label) {
   $camelCase = preg_split('/(?=[A-Z])/', substr($label, 3));
   print '<td id="label">';
   foreach ($camelCase as $one) {
  
            print $one . " ";

   }
   
   print '</td>';
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
    print "<h2>Records ". $startRecord. " to ". $endRecord . "</h2>";
    print $prevLink . '  ' .$curr. '  ' . $nextLink;
    print '</article>';
?>

