<?php

//##############################################################################
//
// main home page for the site 
// 
//##############################################################################
include "top.php";
?>
        <h1>Join Query Directory</h1>
        <hr>
        <article>
        <ul>
            <li><a href="query.php?getRecordsFor=1">q01</a> - SQL: SELECT DISTINCT fldCourseName, fldGrade FROM tblEnrolls join tblCourses on fnkCourseId = pmkCourseId WHERE fldGrade=100 GROUP BY fnkCourseId</li>
            <li><a href="query.php?getRecordsFor=2">q02</a> - SQL: SELECT DISTINCT fldDays, fldStart, fldStop from tblSections join tblTeachers on fnkTeacherNetId=pmkNetId WHERE fldLastName='Snapp' AND fldFirstName='Robert Raymond' ORDER BY fldStart</li>
            <li><a href="query.php?getRecordsFor=3">q03</a> - SQL: SELECT DISTINCT fldCourseName, fldDays, fldStart, fldStop from tblCourses join tblSections on fnkCourseId = pmkCourseId WHERE fnkTeacherNetId='jlhorton' ORDER BY fldStart</li>
            <li><a href="query.php?getRecordsFor=4">q04</a> - SQL: SELECT fnkSectionId, fldFirstName, fldLastName FROM tblEnrolls JOIN tblStudents on pmkStudentID = fnkStudentId WHERE fnkCourseId=392 ORDER BY fnkCourseId</li>
            <li><a href="query.php?getRecordsFor=5">q05</a> - SQL: </li>
            <li><a href="query.php?getRecordsFor=6">q06</a> - SQL: </li>
            <li><a href="query.php?getRecordsFor=7">q07</a> - SQL: </li>
            <li><a href="query.php?getRecordsFor=8">q08</a> - SQL: </li>
            <li><a href="query.php?getRecordsFor=9">q09</a> - SQL: </li>
            <li><a href="query.php?getRecordsFor=10">q10</a> - SQL: </li>
            <li><a href="query.php?getRecordsFor=11">q11</a></li>
            <li><a href="query.php?getRecordsFor=12">q12</a></li>
        </ul>
        </article>
    </body>
</html>
