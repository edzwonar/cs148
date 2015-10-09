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

$queryNumber = 0;

if (isset($_GET['getRecordsFor'])) {
    $queryNumber = (int) $_GET['getRecordsFor'];
}
 // Begin output
print '<article>';

// print out a list of all the tables and their description
// make each table name a link to display the record
print '<section id="tables2" class="float_left">';


$info2=null;
$columns=0;


         print '<table>';
   
 //now print out each question, depending on the table
    switch($queryNumber) {
        case(1):
            $query = 'SELECT pmkNetId FROM tblTeachers';
            $info2 = $thisDatabaseReader->select($query, "", 0, 0, 0, 0, false, false);
            $columns = 1;
            break;
        case(2):
            $query = "SELECT fldDepartment FROM tblCourses WHERE fldCourseName LIKE 'Introduction%'";
            $info2 = $thisDatabaseReader->select($query, "", 1, 0, 2, 0, false, false);
            $columns = 1;
            break;
        case(3):
            $query = "SELECT * FROM tblSections WHERE fldStart='13:10:00' AND fldBuilding='Kalkin'";
            $info2 = $thisDatabaseReader->select($query, "", 1, 1, 4, 0, false, false);
            $columns = 12;
            break;
        case(4):
            $query = "SELECT * FROM tblCourses WHERE fldCourseName='Database Design for the Web'";
            $info2 = $thisDatabaseReader->select($query,"",1,0,2,0,false,false);
            $columns = 5;
            break;
        case(5):
            $query = "SELECT fldFirstName, fldLastName FROM tblTeachers WHERE pmkNetId LIKE 'r%o'";
            $info2 = $thisDatabaseReader->select($query,"",1,0,2,0,false,false);
            $columns = 2;
            break;
        case(6):
            $query = "SELECT fldCourseName FROM tblCourses WHERE fldCourseName LIKE '%data%' AND fldDepartment != 'CS'";
            $info2 = $thisDatabaseReader->select($query,"",1,2,4,0,false,false);
            $columns = 1;
            break;
        case(7):
            $query = "SELECT DISTINCT fldDepartment FROM tblCourses";
            $info2 = $thisDatabaseReader->select($query,"",0,0,0,0,false,false);
            $columns = 1;
            break;
        case(8):
            $query = "SELECT DISTINCT fldBuilding, COUNT(fldSection) FROM tblSections GROUP BY fldBuilding";
            $info2 = $thisDatabaseReader->select($query,"",0,0,0,0,false,false);
            $columns = 2;
            break;
        case(9):
            $query = "SELECT DISTINCT fldBuilding, COUNT(fldNumStudents) FROM tblSections WHERE fldDays LIKE '%W%' GROUP BY fldBuilding";
            $info2 = $thisDatabaseReader->select($query,"",1,0,2,0,false,false);
            $columns = 2;
            break;
        case(10):
            $query = "SELECT DISTINCT fldBuilding, COUNT(fldNumStudents) FROM tblSections WHERE fldDays LIKE '%F%' GROUP BY fldBuilding";
            $info2 = $thisDatabaseReader->select($query,"",1,0,2,0,false,false);
            $columns = 2;
            break;
        case(11):
            $query = "SELECT DISTINCT fnkCourseId, COUNT(fldSection) FROM tblSections WHERE COUNT(fldSection) > 50 GROUP BY fnkCourseId";
            print $thisDatabaseReader->testquery($query,"",1,0,0,1,false,false);
            $info2 = $thisDatabaseReader->select($query,"",1,0,0,1,false,false);
            $columns = 1;
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
    print '</aside>';
    print '</article>';
    print '<article id="queryTitle">';
    print "<h1>SQL: " . $query . "</h1>";
    print "<h1>Total Records: " . count($info2)."</h1>";
    print '</article>';
?>