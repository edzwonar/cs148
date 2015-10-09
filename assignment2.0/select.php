<?php

//##############################################################################
//
// main home page for the site 
// 
//##############################################################################
include "top.php";
?>
        <h1>Query Directory</h1>
        <hr>
        <article>
        <ul>
            <li><a href="tables.php?getRecordsFor=1">q01</a> - SQL: SELECT pmkNetId FROM tblTeachers</li>
            <li><a href="tables.php?getRecordsFor=2">q02</a> - SQL: SELECT fldDepartment FROM tblCourses WHERE fldCourseName LIKE '%Introduction%'</li>
            <li><a href="tables.php?getRecordsFor=3">q03</a> - SQL: SELECT * FROM tblSections WHERE fldStart=13:10:00 AND fldBuilding='Kalkin'</li>
            <li><a href="tables.php?getRecordsFor=4">q04</a> - SQL: SELECT * FROM tblCourses WHERE fldCourseName='Database Design for the Web'</li>
            <li><a href="tables.php?getRecordsFor=5">q05</a> - SQL: SELECT fldFirstName, fldLastName FROM tblTeachers WHERE pmkNetId LIKE 'r%o'</li>
            <li><a href="tables.php?getRecordsFor=6">q06</a> - SQL: SELECT fldCourseName FROM tblCourses WHERE fldCourseName LIKE '%data%' AND fldDepartment != 'CS'</li>
            <li><a href="tables.php?getRecordsFor=7">q07</a> - SQL: SELECT DISTINCT fldDepartment FROM tblCourses</li>
            <li><a href="tables.php?getRecordsFor=8">q08</a> - SQL: SELECT DISTINCT fldBuilding, COUNT(fldSection) FROM tblSections GROUP BY fldBuilding</li>
            <li><a href="tables.php?getRecordsFor=9">q09</a> - SQL: SELECT DISTINCT fldBuilding, fldNumStudents FROM tblSections WHERE fldDays LIKE '%W%'</li>
            <li><a href="tables.php?getRecordsFor=10">q10</a> - SQL: SELECT DISTINCT fldBuilding, COUNT(fldNumStudents) FROM tblSections WHERE fldDays LIKE '%F%' GROUP BY fldBuilding</li>
            <li><a href="tables.php?getRecordsFor=11">q11</a></li>
            <li><a href="tables.php?getRecordsFor=12">q12</a></li>
        </ul>
        </article>
    </body>
</html>
