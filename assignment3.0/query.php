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
            $query = 'SELECT DISTINCT fldCourseName, fldGrade FROM tblEnrolls JOIN tblCourses on fnkCourseId = pmkCourseId WHERE fldGrade=100 GROUP BY fnkCourseId ORDER BY fldCourseName';
            $info2 = $thisDatabaseReader->select($query, "", 1, 1, 0, 0, false, false);
            $columns = 2;
            break;
        case(2):
            $query = "SELECT DISTINCT fldDays, fldStart, fldStop from tblSections JOIN tblTeachers on fnkTeacherNetId = pmkNetId WHERE fldLastName='Snapp' AND fldFirstName='Robert Raymond' ORDER BY fldStart";
            $info2 = $thisDatabaseReader->select($query, "", 1, 2, 4, 0, false, false);
            $columns = 3;
            break;
        case(3):
            $query = "SELECT DISTINCT fldCourseName, fldDays, fldStart, fldStop from tblCourses JOIN tblSections on fnkCourseId = pmkCourseId WHERE fnkTeacherNetId='jlhorton' ORDER BY fldStart";
            $info2 = $thisDatabaseReader->select($query, "", 1, 1, 2, 0, false, false);
            $columns = 4;
            break;
        case(4):
            $query = "SELECT fnkSectionId, fldFirstName, fldLastName FROM tblEnrolls JOIN tblStudents on pmkStudentID = fnkStudentId WHERE fnkCourseId=392 ORDER BY fnkCourseId";
            $info2 = $thisDatabaseReader->select($query, "", 1, 1, 0, 0, false, false);
            $columns = 3; 
            break;
        case(5):
            $query = "SELECT DISTINCT fldFirstName, fldLastName, SUM(fldNumStudents) FROM tblTeachers JOIN tblSections on pmkNetId = fnkTeacherNetId LEFT JOIN tblCourses on fnkCourseId = pmkCourseId WHERE fldDepartment = 'CS' AND fldType != 'LAB' GROUP BY fnkTeacherNetId ORDER BY SUM(fldNumStudents) DESC";
            $info2 = $thisDatabaseReader->select($query, "", 1, 3, 4, 0, false, false);
            $columns = 3;
            break;
        case(6):
            $query = "SELECT fldFirstName, fldPhone, fldSalary from tblTeachers WHERE fldSalary < (SELECT AVG(fldSalary) from tblTeachers)";
            $info2 = $thisDatabaseReader->select($query, "", 1, 0, 0, 1, false, false);
            $columns = 3;
            break;
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


