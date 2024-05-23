<?php
session_start();

?>

<!-- table.php -->
<form id="multiPageForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">


    <!-- Page 1 -->
    <div class="page active-page" id="page1">




        <table>
            <thead>
                <?php
                echo "Welcome " . $current_user  ."<br>";
                echo "UserID: " . $user_id  ;

                ?>


                <tr>
                    <th colspan="6">
                        <div id="A1metadata">
                            <h5><b>A1. Preparation and Display of Course handout on First day of Semester for both Semesters in A.Y.</h5>
                            <p style="text-align-last: right;">Maximum Score: 04 Points</b></p>
                            <p><b>
                                    <hr>Guidelines to Earn Points:
                                </b></p>
                            <ol>
                                <li>Displayed on Notice Board and uploaded on ERP / LMS for all subjects assigned during first semester : 1 Point /Sub/Sem</li>
                                <li>Displayed on Notice Board and uploaded on ERP / LMS for all subjects assigned during second semester : 1 Point /Sub/Sem</li>
                            </ol>
                            <p><b><i>Note: <u>Upload the Course Handout and Proof of display for both semesters.</u></i></b></p>
                        </div>
                    </th>


                </tr>

                <tr>
                    <th rowspan="2">Sr. No.</th>
                    <th rowspan="2">Semester</th>
                    <th colspan="2">Points Claimed</th>
                    <th rowspan="2">Supporting Document Attachment</th>

                    <th rowspan="2">Verification Status</th>
                </tr>
                <tr>
                    <th>Sub1</th>
                    <th>Sub2</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>For 1st Semester</td>
                    <td><input type="number" id="sem1_sub1_points" name="sem1_sub1_points" min="0" max="1" ></td>
                    <td><input type="number" id="sem1_sub2_points" name="sem1_sub2_points" min="0" max="1" ></td>
                    
                    <td rowspan="2"> <!-- Modified rowspan here -->

                        <input type="file" id="supporting_document" name="supporting_document" accept=" .pdf">

                    </td>


                    <td rowspan="2" id="a1_verificationResult"></td>

                </tr>
                <tr>
                    <td>2</td>
                    <td>For 2st Semester</td>
                    <td><input type="number" id="sem2_sub1_points" name="sem2_sub1_points" min="0" max="1" ></td>
                    <td><input type="number" id="sem2_sub2_points" name="sem2_sub2_points" min="0" max="1" ></td>




                </tr>

            </tbody>


        </table>
        <br>
        <button type="button" onclick="nextPage('page1','page2')" class="print-hidden">Next</button>
        
        <input type="submit" value="Submit"  class="print-hidden">

        <!-- <button type="button" onclick="nextPage('page1','page14')">Page14</button> -->
    </div>




    <!-- Page 2 -->
    <div class="page" id="page2">
    



        <table>
            <thead>


                <tr>
                    <th colspan="11">
                        <div id="A2metadata">
                            <h5><b>A2. Lectures conducted in both semesters in A.Y.</h5>
                            <p style="text-align-last: right;">Maximum Score: 08 Points</b></p>
                            <p><b>
                                    <hr>Guidelines to Earn Points:
                                </b></p>
                            <ol>
                                <li>If 100% Lectures conducted : 2 Points per subject per sem : Max 4 points per year</li>
                                <li>If 90-99% Lectures conducted : 1 Points per subject per sem : Max 2 points per year</li>
                                <li>If Less than 90% Lectures conducted : 0 Points per subject per sem</li>
                            </ol>
                            <p><b><i>Note: <u>Upload the ERP / LMS Report of Theory attendance for both semesters.</u></i></b></p>
                        </div>
                    </th>


                </tr>

                <tr>
                    <th rowspan="1">Sr. No.</th>
                    <th rowspan="1">Class/Dept</th>
                    <th rowspan="1">Sem</th>
                    <th rowspan="1">Name of Course</th>
                    <th rowspan="1">Credits of Course</th>
                    <th rowspan="1">Total Lectures as per Scheme per Sem</th>
                    <th rowspan="1">Total Lectures Conducted</th>
                    <th rowspan="1">% of Lectures Conducted</th>
                    <th rowspan="1">Points Claimed</th>
                    <th rowspan="1">Supporting Document Attachment</th>
                    <th rowspan="1">Verification Status</th>


                </tr>

            </thead>
            <tbody>
                <tr>
                    <td>1</td>

                    <td>
                        <select class="classDropdown1" onchange="populateSemesterDropdown(this, 1)" id="a2_classname1" name="a2_classname1">
                            <option value="">Select Department</option>
                        </select>
                    </td>

                    <td><select class="semesterDropdown1" onchange="populateCourses(this, 1)" id="a2_semname1" name="a2_semname1">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown1" onchange="LecdisplayCourseInfo(this, 1)" id="a2_coursename1" name="a2_coursename1" disabled>
                            <option value="">Select</option>
                        </select></td>

                    <td>
                        <div class="TheorycourseInfo1" >
                        </div>
                        <input type="hidden" id="theory_credits_input1" name="theory_credits_input1">

                    </td>

                    <td><input type="number" id="totalInput1" name="total" min="0" max="45"></td>
                    <td><input type="number" id="outOfTotalInput1" name="outOfTotal" min="0" max="45"></td>
                    <td id="percentageOutput1" name="percentage" ></td>
                    <td id="creditInput1" name="credit"></td>
                    <td rowspan="4">
                        <input type="file" class="fileInput" name="verificationfile" accept=".png, .pdf, .doc, .docx">
                        <span class="fileLabel"></span>
                    </td>


                    <td rowspan="4" id="verificationResult"></td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>
                        <select class="classDropdown2" onchange="populateSemesterDropdown(this, 2)" id="a2_classname2">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown2" onchange="populateCourses(this, 2)" id="a2_semname2">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown2" onchange="LecdisplayCourseInfo(this, 2)" id="a2_coursename2" disabled>
                            <option value="">Select</option>
                        </select></td>
                    <td>
                        <div class="TheorycourseInfo2" id="a2_course_credit2"></div>
                    </td>
                    <td><input type="number" id="totalInput2" name="total" min="0" max="45"></td>
                    <td><input type="number" id="outOfTotalInput2" name="outOfTotal" min="0" max="45"></td>
                    <td id="percentageOutput2" name="percentage" ></td>
                    <td id="creditInput2" name="credit"></td>


                </tr>

                <tr>
                    <td>3</td>
                    <td>
                        <select class="classDropdown3" onchange="populateSemesterDropdown(this, 3)" id="a2_classname3">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown3" onchange="populateCourses(this, 3)" id="a2_semname3">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown3" onchange="LecdisplayCourseInfo(this, 3)" id="a2_coursename3" disabled>
                            <option value="">Select</option>
                        </select></td>

                    <td>
                        <div class="TheorycourseInfo3" id="a2_course_credit3"></div>
                    </td>
                    <td><input type="number" id="totalInput3" name="total" min="0" max="45"></td>
                    <td><input type="number" id="outOfTotalInput3" name="outOfTotal" min="0" max="45"></td>
                    <td id="percentageOutput3" name="percentage" ></td>
                    <td id="creditInput3" name="credit"></td>



                </tr>

                <tr>
                    <td>4</td>
                    <td>
                        <select class="classDropdown4" onchange="populateSemesterDropdown(this, 4)" id="a2_classname4">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown4" onchange="populateCourses(this, 4)" id="a2_semname4">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown4" onchange="LecdisplayCourseInfo(this, 4)" id="a2_coursename4" disabled>
                            <option value="">Select</option>
                        </select></td>

                    <td>
                        <div class="TheorycourseInfo4" id="a2_course_credit4"></div>
                    </td>
                    <td><input type="number" id="totalInput4" name="total" min="0" max="45"></td>
                    <td><input type="number" id="outOfTotalInput4" name="outOfTotal" min="0" max="45"></td>
                    <td id="percentageOutput4" name="percentage" ></td>
                    <td id="creditInput4" name="credit"></td>



                </tr>


            </tbody>
        </table>

        <br>
        <button type="button" onclick="previousPage('page2','page1')">Previous</button>
        <button type="button" onclick="nextPage('page2','page3')">Next</button>
        

    </div>

    <!-- Page 3 -->
    <div class="page" id="page3">
    
        <table>
            <thead>


                <tr>
                    <th colspan="11">
                        <div id="A3metadata">
                            <h5><b>A3. Practicals / Tutorial Conducted in both Semesters.</h5>
                            <p style="text-align-last: right;">Maximum Score: 04 Points</b></p>
                            <p><b>
                                    <hr>Guidelines to Earn Points:
                                </b></p>
                            <ol>
                                <li>If 100% Lectures conducted : 2 Points per subject per sem : Max 4 points per year</li>
                                <li>If 90-99% Lectures conducted : 1 Points per subject per sem : Max 2 points per year</li>
                                <li>If Less than 90% Lectures conducted : 0 Points per subject per sem</li>
                            </ol>
                            <p><b><i>Note: <u>Upload the ERP / LMS Report of Theory attendance for both semesters.</u></i></b></p>
                        </div>
                    </th>


                </tr>

                <tr>
                    <th rowspan="1">Sr. No.</th>
                    <th rowspan="1">Class/Dept</th>
                    <th rowspan="1">Sem</th>
                    <th rowspan="1">Name of Course</th>
                    <th rowspan="1">Credits of Course</th>
                    <th rowspan="1">Total PR/TU as per Scheme per Sem</th>
                    <th rowspan="1">Total PR/TU Conducted</th>
                    <th rowspan="1">% of PR/TU Conducted</th>
                    <th rowspan="1">Points Claimed</th>
                    <th rowspan="1">Supporting Document Attachment</th>
                    <th rowspan="1">Verification Status</th>


                </tr>

            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <select class="classDropdown5" onchange="populateSemesterDropdown(this,5)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown5" onchange="populateCourses(this, 5)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown5" onchange="PracdisplayCourseInfo(this, 1)" disabled>
                            <option value="">Select</option>
                        </select></td>

                    <td>
                        <div class="PraccourseInfo1"></div>
                    </td>

                    <td><input type="number" id="totalInput5" name="total" min="0" max="25"></td>
                    <td><input type="number" id="outOfTotalInput5" name="outOfTotal" min="0" max="25"></td>
                    <td><input type="number" id="percentageOutput5" name="percentage" min="0" max="100" readonly></td>
                    <td id="creditInput5" name="credit"></td>

                    <td rowspan="4">
                        <input type="file" class="fileInput" name="verificationfile" accept=".png, .pdf, .doc, .docx" onchange="displayFileName(this)">
                        <span class="fileLabel"></span>
                    </td>


                    <td rowspan="4" id="verificationResult"></td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>
                        <select class="classDropdown6" onchange="populateSemesterDropdown(this,6)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown6" onchange="populateCourses(this, 6)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown6" onchange="PracdisplayCourseInfo(this, 2)" disabled>
                            <option value="">Select</option>
                        </select></td>

                    <td>
                        <div class="PraccourseInfo2"></div>
                    </td>
                    <td><input type="number" id="totalInput6" name="total" min="0" max="25"></td>
                    <td><input type="number" id="outOfTotalInput6" name="outOfTotal" min="0" max="25"></td>
                    <td><input type="number" id="percentageOutput6" name="percentage" min="0" max="100" readonly></td>
                    <td id="creditInput6" name="credit"></td>



                </tr>

                <tr>
                    <td>3</td>
                    <td>
                        <select class="classDropdown7" onchange="populateSemesterDropdown(this,7)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown7" onchange="populateCourses(this, 7)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown7" onchange="PracdisplayCourseInfo(this, 3)" disabled>
                            <option value="">Select</option>
                        </select></td>

                    <td>
                        <div class="PraccourseInfo3"></div>
                    </td>
                    <td><input type="number" id="totalInput7" name="total" min="0" max="25"></td>
                    <td><input type="number" id="outOfTotalInput7" name="outOfTotal" min="0" max="25"></td>
                    <td><input type="number" id="percentageOutput7" name="percentage" min="0" max="100" readonly></td>
                    <td id="creditInput7" name="credit"></td>


                </tr>

                <tr>
                    <td>4</td>
                    <td>
                        <select class="classDropdown8" onchange="populateSemesterDropdown(this,8)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown8" onchange="populateCourses(this, 8)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown8" onchange="PracdisplayCourseInfo(this, 4)" disabled>
                            <option value="">Select</option>
                        </select></td>

                    <td>
                        <div class="PraccourseInfo4"></div>
                    </td>
                    <td><input type="number" id="totalInput8" name="total" min="0" max="25"></td>
                    <td><input type="number" id="outOfTotalInput8" name="outOfTotal" min="0" max="25"></td>
                    <td><input type="number" id="percentageOutput8" name="percentage" min="0" max="100" readonly></td>

                    <td id="creditInput8" name="credit"></td>




                </tr>


            </tbody>
        </table>




        <br>
        <button type="button" onclick="previousPage('page3','page2')">Previous</button>
        <button type="button" onclick="nextPage('page3','page4')">Next</button>
    </div>


    <!-- Page 4 -->
    <div class="page" id="page4">

        <table>
            <thead>


                <tr>
                    <th colspan="9">
                        <div id="A4metadata">
                            <h5><b>A4. Students Feedback at the end of Semesters.</h5>
                            <p style="text-align-last: right;">Maximum Score: 08 Points</b></p>
                            <p><b>
                                    <hr>Guidelines to Earn Points:
                                </b></p>
                            <ol>
                                <li>Average Score above 8 : 2 Points per subject per sem </li>
                                <li>Average Score between 6 - 8 : 1 Points per subject per sem </li>
                                <li>Average Score between 5 - 6 : 0 Points per subject per sem</li>
                            </ol>
                            <p><b><i>Note: <u>Upload the Average feedback Score sheet of each semester.</u></i></b></p>
                        </div>
                    </th>


                </tr>

                <tr>
                    <th rowspan="1">Sr. No.</th>
                    <th rowspan="1">Class/Dept</th>
                    <th rowspan="1">Sem</th>
                    <th rowspan="1">Name of Course</th>


                    <th rowspan="1">Feedback Score</th>
                    <th rowspan="1">Average Feedback Score</th>
                    <th rowspan="1">Points Claimed</th>
                    <th rowspan="1">Supporting Document Attachment</th>
                    <th rowspan="1">Verification Status</th>


                </tr>

            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <select class="classDropdown9" onchange="populateSemesterDropdown(this,9)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown9" onchange="populateCourses(this, 9)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown9" disabled>
                            <option value="">Select</option>
                        </select></td>
                    <td><input type="number" id="" name="" min=0 max=10></td>
                    <td><input type="number" id="averagefeedback1" name="averagefeedback" min=0 max=10></td>
                    <td id="A4credit1"></td>

                    <td rowspan="4"> <!-- Modified rowspan here -->

                        <input type="file" id="a1_verification_file" name="a1_verification_file" accept=".png, .pdf, .doc, .docx">

                    </td>


                    <td rowspan="4" id="verificationResult"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <select class="classDropdown10" onchange="populateSemesterDropdown(this,10)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown10" onchange="populateCourses(this, 10)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown10" disabled>
                            <option value="">Select</option>
                        </select></td>
                    <td><input type="number" id="" name="" min=0 max=10></td>
                    <td><input type="number" id="averagefeedback2" name="averagefeedback" min=0 max=10></td>
                    <td id="A4credit2"></td>


                </tr>

                <tr>
                    <td>3</td>
                    <td>
                        <select class="classDropdown11" onchange="populateSemesterDropdown(this,11)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown11" onchange="populateCourses(this, 11)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown11" disabled>
                            <option value="">Select</option>
                        </select></td>
                    <td><input type="number" id="" name="" min=0 max=10></td>
                    <td><input type="number" id="averagefeedback3" name="averagefeedback" min=0 max=10></td>
                    <td id="A4credit3"></td>



                </tr>

                <tr>
                    <td>4</td>
                    <td>
                        <select class="classDropdown12" onchange="populateSemesterDropdown(this,12)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown12" onchange="populateCourses(this, 12)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown12" disabled>
                            <option value="">Select</option>
                        </select></td>
                    <td><input type="number" id="" name="" min=0 max=10></td>
                    <td><input type="number" id="averagefeedback4" name="averagefeedback" min=0 max=10></td>
                    <td id="A4credit4"></td>



                </tr>







            </tbody>
        </table>
        <br>
        <button type="button" onclick="previousPage('page4','page3')">Previous</button>
        <button type="button" onclick="nextPage('page4','page5')">Next</button>
    </div>

    <!-- Page 5 -->
    <div class="page" id="page5">

        <table>
            <thead>


                <tr>
                    <th colspan="9">
                        <div id="A5metadata">
                            <h5><b>A5.</h5>
                            <ol>
                                <li>Conduction of Internal Tests during Class Hour and Evaluation </li>
                                <li>Use of LMS / Lernico in day to day T-L</li>

                            </ol>
                            <p style="text-align-last: right;">Maximum Score: 12 Points</b></p>
                            <p><b>
                                    <hr>Guidelines to Earn Points:
                                </b></p>
                            <ol>
                                <li>Minimum 2 Tests per Course per Semester as per Course handout : 2 Points </li>
                                <li>Use of LMS/Lernico in day T-L : 1 Points</li>

                            </ol>
                            <p><b><i>Note: <u>Enclose the Attendance sheet of Tests conducted. Proof of LMS/Lernico used of each sem</u></i></b></p>
                        </div>
                    </th>
                <tr>
                    <th rowspan="1">Sr. No.</th>
                    <th rowspan="1">Class/Dept</th>
                    <th rowspan="1">Sem</th>
                    <th rowspan="1">Name of Course</th>
                    <th rowspan="1">No. of Tests conducted during Class Hour</th>
                    <th rowspan="1">Used LMS/Lernico in day to day T-L (Yes/No)</th>
                    <th rowspan="1">Points Claimed</th>
                    <th rowspan="1">Supporting Document Attachment</th>
                    <th rowspan="1">Verification Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <select class="classDropdown13" onchange="populateSemesterDropdown(this,13)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown13" onchange="populateCourses(this, 13)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown13" disabled>
                            <option value="">Select</option>
                        </select></td>
                    <td><input type="number" id="testno1" name="A5test" min="0" max="10"></td>
                    <td>
                        <select name="Yes/No" id="lmsyesno1">
                            <option value="no">NO</option>
                            <option value="yes">Yes</option>
                        </select>
                    </td>
                    <td id="A5credits1"></td>


                    <td rowspan="4"> <!-- Modified rowspan here -->

                        <input type="file" id="a1_verification_file" name="a1_verification_file" accept=".png, .pdf, .doc, .docx">

                    </td>


                    <td rowspan="4" id="verificationResult"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <select class="classDropdown14" onchange="populateSemesterDropdown(this,14)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown14" onchange="populateCourses(this, 14)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown14" disabled>
                            <option value="">Select</option>
                        </select></td>
                    <td><input type="number" id="testno2" name="A5test" min="0" max="10"></td>
                    <td>
                        <select name="Yes/No" id="lmsyesno2">
                            <option value="no">NO</option>
                            <option value="yes">Yes</option>
                        </select>
                    </td>
                    <td id="A5credits2"></td>



                </tr>
                <tr>
                    <td>3</td>
                    <td>
                        <select class="classDropdown15" onchange="populateSemesterDropdown(this,15)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown15" onchange="populateCourses(this, 15)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown15" disabled>
                            <option value="">Select</option>
                        </select></td>
                    <td><input type="number" id="testno3" name="A5test" min="0" max="10"></td>
                    <td>
                        <select name="Yes/No" id="lmsyesno3">
                            <option value="no">NO</option>
                            <option value="yes">Yes</option>
                        </select>
                    </td>
                    <td id="A5credits3"></td>



                </tr>
                <tr>
                    <td>4</td>
                    <td>
                        <select class="classDropdown16" onchange="populateSemesterDropdown(this,16)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown16" onchange="populateCourses(this, 16)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown16" disabled>
                            <option value="">Select</option>
                        </select></td>
                    <td><input type="number" id="testno4" name="A5test" min="0" max="10"></td>
                    <td>
                        <select name="Yes/No" id="lmsyesno4">
                            <option value="no">NO</option>
                            <option value="yes">Yes</option>
                        </select>
                    </td>
                    <td id="A5credits4"></td>



                </tr>



            </tbody>


            </tr>
            </thead>
        </table>
        <br>
        <button type="button" onclick="previousPage('page5','page4')">Previous</button>
        <button type="button" onclick="nextPage('page5','page6')">Next</button>
    </div>

    <!-- Page 6 -->
    <div class="page" id="page6">
        <table>
            <thead>


                <tr>
                    <th colspan="9">
                        <div id="A6metadata">
                            <h5><b>A6. Research Guidance to Ph.D. students + Qualitative Guidance for Micro/ Mini/ Major Projects/ Seminars at U.G. and P.G. Level</h5>
                            <p style="text-align-last: right;">Maximum Score: 24 Points</b></p>
                            <p><b>
                                    <hr>Guidelines to Earn Points:
                                </b></p>
                            <ol>
                                <li>Time schedule and project handout is prepared for UG and PG courses: 1 Point per year per batch for UG courses (Max 2pts) and 2 Points per year per batch for PG courses (Max 4pts) </li>
                                <li>All activites as per the course handout are achieved and Continuous assessment is done and entered in LMS/ERP at the end of the each sem: 1 Point per year per batch for UG courses(Max 2pts) and 2 Points per year per batch for PG Courses(Max 4pts)</li>
                                <li>Micro/ Mini/ Major Project guided successfully and produced quality report at UG and PG: 1 Point per year per batch for UG courses(Max 2pts) and 2 Points per year per batch for PG courses(Max 4pts) </li>
                                <li>A research paper/ IPR published based on project: 02 Points per year </li>
                                <li>Guiding Ph.D. student(s) : 02 Points per year per student(Max. 4pts)</li>
                            </ol>
                            <p><b><i>Note: <u>Enclose the project/ seminar handout, Continuous assessment, Copy of paper and IPR document. </u></i></b></p>
                        </div>
                    </th>
                <tr>
                    <th rowspan="2">Sr. No.</th>
                    <th rowspan="2">Title of Micro/ Mini / Major Projects/ Seminars/ Ph.D. Topic / PR/ Research</th>
                    <th rowspan="2">No. of Students</th>
                    <th rowspan="2">Sem</th>
                    <th rowspan="2">Parameter</th>
                    <th colspan="2">Points Claimed</th>
                    <th rowspan="2">Supporting Document Attachment</th>
                    <th rowspan="2">Verification Status</th>
                </tr>
                <tr>
                    <th>UG</th>
                    <th>PG</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><input type="text" id="" name=""></td>
                    <td><input type="number" id="" name="" min=0></td>
                    <td><input type="number" id="" name="" min=1></td>
                    <td>
                        <p>Time schedule and project handout is prepared for UG & PG</p>
                    </td>
                    <td><input type="number" id="" name="" min=0 max=2></td>
                    <td><input type="number" id="" name="" min="0" max="4"></td>

                    <td rowspan="5"> <!-- Modified rowspan here -->

                        <input type="file" id="a1_verification_file" name="a1_verification_file" accept=".png, .pdf, .doc, .docx">

                    </td>


                    <td rowspan="5" id="verificationResult"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><input type="text" id="" name=""></td>
                    <td><input type="number" id="" name="" min=0></td>
                    <td><input type="number" id="" name="" min=1></td>
                    <td>
                        <p>All activites as per the course handout are achieved and Continuous assessment is done</p>
                    </td>
                    <td><input type="number" id="" name="" min=0 max=2></td>
                    <td><input type="number" id="" name="" min="0" max="4"></td>



                </tr>
                <tr>
                    <td>3</td>
                    <td><input type="text" id="" name=""></td>
                    <td><input type="number" id="" name="" min=0></td>
                    <td><input type="number" id="" name="" min=1></td>
                    <td>
                        <p>Micro/ Mini/ Major Project guided successfully and produced quality successfully and produced quality report at UG and PG</p>
                    </td>
                    <td><input type="number" id="" name="" min=0 max=2></td>
                    <td><input type="number" id="" name="" min="0" max="4"></td>



                </tr>
                <tr>
                    <td>4</td>
                    <td><input type="text" id="" name=""></td>
                    <td><input type="number" id="" name="" min=0></td>
                    <td><input type="number" id="" name="" min=1></td>
                    <td>
                        <p>A research paper/ IPR published based on project</p>
                    </td>
                    <td colspan="2"><input type="number" id="" name="" min=0 max=4></td>



                </tr>
                <tr>
                    <td>5</td>
                    <td><input type="text" id="" name=""></td>
                    <td><input type="number" id="" name="" min=0></td>
                    <td><input type="number" id="" name="" min=1></td>
                    <td>
                        <p>Guiding Ph.D. student(S)</p>
                    </td>
                    <td colspan="2"><input type="number" id="" name="" min=0 max=4></td>




            </tbody>
            </tr>

        </table>
        <br>
        <button type="button" onclick="previousPage('page6','page5')">Previous</button>
        <button type="button" onclick="nextPage('page6','page7')">Next</button>
    </div>
    <!-- Page 7 -->
    <div class="page" id="page7">
        <table>
            <thead>


                <tr>
                    <th colspan="6">
                        <div id="A7metadata">
                            <h5><b>A7. Exam Work</h5>
                            <p style="text-align-last: right;">Maximum Score: 05 Points</b></p>
                            <p><b>
                                    <hr>Guidelines to Earn Points:
                                </b></p>
                            <ol>
                                <li>Minimum three activites out of the following with Punctuality : Maximum 03 Points per year

                                    <p>i.Invigilation&nbsp; &nbsp; ii.Paper Setting&nbsp; &nbsp; iii.Moderation&nbsp; &nbsp; iv.CAP work&nbsp; &nbsp; v.Assessment work etc.
                                </li>
                                </li>


                                <li>Ph.D. seminar referee/ Ph.D. examiner at parent/ other university/ Worked as Senior Supervisor/ CAP director/ CoE/ Dy.CoE : Maximum 02 Points per year</li>

                            </ol>
                            <p><b><i>Note: <u>Enclose the supporting document. </u></i></b></p>
                        </div>
                    </th>
                <tr>
                    <th rowspan="1">Sr. No.</th>
                    <th rowspan="1">Details of Exam Work Performed</th>
                    <th rowspan="1">Date</th>
                    <th colspan="1">Points Claimed</th>
                    <th rowspan="1">Supporting Document Attachment</th>
                    <th rowspan="1">Verification Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <select id="A7taskType1" name="taskType" onchange="A7checkCredits()">
                            <option value="">Select Activity</option>
                            <option value="Invigilation">Invigilation</option>
                            <option value="Paper Setting">Paper Setting</option>
                            <option value="Moderation">Moderation</option>
                            <option value="CAP work">CAP work</option>
                            <option value="Assessment work">Assessment work</option>
                            <!-- Add more options as needed -->
                        </select>
                    </td>
                    <td><input type="date" id="" name=""></td>
                    <td rowspan=3 id="A7credits"></td>


                    <td rowspan="4"> <!-- Modified rowspan here -->

                        <input type="file" id="a1_verification_file" name="a1_verification_file" accept=".png, .pdf, .doc, .docx">

                    </td>


                    <td rowspan="4" id="verificationResult"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <select id="A7taskType2" name="taskType" onchange="A7checkCredits()">
                            <option value="">Select Activity</option>
                            <option value="Invigilation">Invigilation</option>
                            <option value="Paper Setting">Paper Setting</option>
                            <option value="Moderation">Moderation</option>
                            <option value="CAP work">CAP work</option>
                            <option value="Assessment work">Assessment work</option>
                            <!-- Add more options as needed -->
                        </select>
                    </td>
                    <td><input type="date" id="" name=""></td>




                </tr>
                <tr>
                    <td>3</td>
                    <td>
                        <select id="A7taskType3" name="taskType" onchange="A7checkCredits()">
                            <option value="">Select Activity</option>
                            <option value="Invigilation">Invigilation</option>
                            <option value="Paper Setting">Paper Setting</option>
                            <option value="Moderation">Moderation</option>
                            <option value="CAP work">CAP work</option>
                            <option value="Assessment work">Assessment work</option>
                            <!-- Add more options as needed -->
                        </select>
                    </td>
                    <td><input type="date" id="" name=""></td>



                </tr>
                <tr>
                    <td>4</td>
                    <td><input type="text" id="" name=""></td>
                    <td><input type="date" id="" name=""></td>
                    <td><input type="number" id="" name="" min=0 max=2></td>



                </tr>
            </tbody>
        </table>
        <br>
        <button type="button" onclick="previousPage('page7','page6')">Previous</button>
        <button type="button" onclick="nextPage('page7','page8')">Next</button>
    </div>
    <!-- Page 8 -->
    <div class="page" id="page8">
        <table>
            <thead>
                <tr>
                    <th colspan="8">
                        <div id="A8metadata">
                            <h5><b>A8. University Exam Results(Theory and Practical)</h5>
                            <p style="text-align-last: right;">Maximum Score: 08 Points</b></p>
                            <p><b>
                                    <hr>Guidelines to Earn Points:
                                </b></p>
                            <ol>
                                <li>If Average percentage of passing in the subject taught is more than 80% : 2 Points per subject per sem</li>
                                <li>If Average percentage of passing in the subject taught is between 70-80% : 1 Point per subject per sem</li>
                                <li>If Average percentage of passing in the subject taught is below 70% : 0 Point per subject per sem</li>

                            </ol>
                            <p><b><i>Note: <u>Enclose the authorized document of Result Analysis. </u></i></b></p>
                        </div>
                    </th>
                <tr>
                    <th rowspan="1">Sr. No.</th>
                    <th colspan="1">Class/Dept</th>
                    <th rowspan="1">Sem</th>
                    <th rowspan="1">Name of the Course</th>
                    <th colspan="1">Average % of Passing in the subject taught</th>
                    <th colspan="1">Points Claimed</th>
                    <th rowspan="1">Supporting Document Attachment</th>
                    <th rowspan="1">Verification Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <select class="classDropdown17" onchange="populateSemesterDropdown(this,17)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown17" onchange="populateCourses(this, 17)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown17" disabled>
                            <option value="">Select</option>
                        </select></td>
                    <td><input type="number" id="" name="" min="0" max=100></td>
                    <td><input type="number" id="" name="" min="0" max="2"></td>

                    <td rowspan="4"> <!-- Modified rowspan here -->

                        <input type="file" id="a1_verification_file" name="a1_verification_file" accept=".png, .pdf, .doc, .docx">

                    </td>


                    <td rowspan="4" id="verificationResult"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <select class="classDropdown18" onchange="populateSemesterDropdown(this,18)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown18" onchange="populateCourses(this, 18)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown18" disabled>
                            <option value="">Select</option>
                        </select></td>
                    <td><input type="number" id="" name="" min="0" max=100></td>
                    <td><input type="number" id="" name="" min="0" max="2"></td>



                </tr>
                <tr>
                    <td>3</td>
                    <td>
                        <select class="classDropdown19" onchange="populateSemesterDropdown(this,19)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown19" onchange="populateCourses(this, 19)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown19" disabled>
                            <option value="">Select</option>
                        </select></td>
                    <td><input type="number" id="" name="" min="0" max=100></td>
                    <td><input type="number" id="" name="" min="0" max="2"></td>



                </tr>
                <tr>
                    <td>4</td>
                    <td>
                        <select class="classDropdown20" onchange="populateSemesterDropdown(this,20)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown20" onchange="populateCourses(this, 20)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown20" disabled>
                            <option value="">Select</option>
                        </select></td>
                    <td><input type="number" id="" name="" min="0" max=100></td>
                    <td><input type="number" id="" name="" min="0" max="2"></td>



                </tr>
            </tbody>
        </table>
        <br>
        <button type="button" onclick="previousPage('page8','page7')">Previous</button>
        <button type="button" onclick="nextPage('page8','page9')">Next</button>
    </div>
    <!-- Page 9 -->
    <div class="page" id="page9">
        <table>
            <thead>
                <tr>
                    <th colspan="8">
                        <div id="A9metadata">
                            <h5><b>A9. Attendance of all students</h5>
                            <p style="text-align-last: right;">Maximum Score: 04 Points</b></p>
                            <p><b>
                                    <hr>Guidelines to Earn Points:
                                </b></p>
                            <ol>
                                <li>If Average Attendance of class above 75% : 1 Points per subject per sem</li>
                                <li>If Average Attendance of class below 75% : 0 Point per subject per sem</li>
                            </ol>
                            <p><b><i>Note: <u>Enclose the Average Attendance sheet of each semester from ERP/LMS. </u></i></b></p>
                        </div>
                    </th>
                <tr>
                    <th rowspan="1">Sr. No.</th>
                    <th colspan="1">Class/Dept</th>
                    <th rowspan="1">Sem</th>
                    <th rowspan="1">Name of the Course</th>


                    <th colspan="1">Average % of Attendance of Class at the End of the Sem</th>
                    <th colspan="1">Points Claimed</th>
                    <th rowspan="1">Supporting Document Attachment</th>
                    <th rowspan="1">Verification Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <select class="classDropdown21" onchange="populateSemesterDropdown(this,21)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown21" onchange="populateCourses(this, 21)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown21" disabled>
                            <option value="">Select</option>
                        </select></td>
                    <td><input type="number" id="" name="" min="0" max=100></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>

                    <td rowspan="4"> <!-- Modified rowspan here -->

                        <input type="file" id="a1_verification_file" name="a1_verification_file" accept=".png, .pdf, .doc, .docx">

                    </td>


                    <td rowspan="4" id="verificationResult"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <select class="classDropdown22" onchange="populateSemesterDropdown(this,22)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown22" onchange="populateCourses(this, 22)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown22" disabled>
                            <option value="">Select</option>
                        </select></td>
                    <td><input type="number" id="" name="" min="0" max=100></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>



                </tr>
                <tr>
                    <td>3</td>
                    <td>
                        <select class="classDropdown23" onchange="populateSemesterDropdown(this,23)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown23" onchange="populateCourses(this, 23)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown23" disabled>
                            <option value="">Select</option>
                        </select></td>
                    <td><input type="number" id="" name="" min="0" max=100></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>



                </tr>
                <tr>
                    <td>4</td>
                    <td>
                        <select class="classDropdown24" onchange="populateSemesterDropdown(this,24)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown24" onchange="populateCourses(this, 24)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown24" disabled>
                            <option value="">Select</option>
                        </select></td>
                    <td><input type="number" id="" name="" min="0" max=100></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>



                </tr>
            </tbody>
        </table>
        <br>
        <button type="button" onclick="previousPage('page9','page8')">Previous</button>
        <button type="button" onclick="nextPage('page9','page10')">Next</button>
    </div>
    <!-- Page 10 -->
    <div class="page" id="page10">
        <table>
            <thead>
                <tr>
                    <th colspan="7">
                        <div id="A10metadata">
                            <h5><b>A10. Curriculum Development</h5>
                            <p style="text-align-last: right;">Maximum Score: 10 Points</b></p>
                            <p><b>
                                    <hr>Guidelines to Earn Points:
                                </b></p>
                            <ol>
                                <li>1 point for each activity : Maximum 5 Points/Sem</li>
                            </ol>
                            <p><b><i>Note: <u>Enclose the Supporting document of each point. </u></i></b></p>
                        </div>
                    </th>
                <tr>
                    <th rowspan="1">Sr. No.</th>
                    <th rowspan="1">Name of the Activity</th>
                    <th rowspan="1">Sem I</th>
                    <th colspan="1">Sem II</th>
                    <th colspan="1">Points Claimed</th>
                    <th rowspan="1">Supporting Document Attachment</th>
                    <th rowspan="1">Verification Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <p>Contribution in new Curricula</p>
                    <td><input type="text" id="" name=""></td>
                    <td><input type="text" id="" name=""></td>

                    <td><input type="number" id="" name="" min=0 max=2></td>

                    <td rowspan="4"> <!-- Modified rowspan here -->

                        <input type="file" id="a1_verification_file" name="a1_verification_file" accept=".png, .pdf, .doc, .docx">

                    </td>


                    <td rowspan="4" id="verificationResult"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <p>Course Development</p>
                    <td><input type="text" id="" name=""></td>
                    <td><input type="text" id="" name=""></td>

                    <td><input type="number" id="" name="" min=0 max=2></td>



                </tr>
                <tr>
                    <td>3</td>
                    <td>
                        <p>Development/ Use of MOOCs</p>
                    <td><input type="text" id="" name=""></td>
                    <td><input type="text" id="" name=""></td>

                    <td><input type="number" id="" name="" min=0 max=2></td>



                </tr>
                <tr>
                    <td>4</td>
                    <td>
                        <p>Development of e Content</p>
                    <td><input type="text" id="" name=""></td>
                    <td><input type="text" id="" name=""></td>

                    <td><input type="number" id="" name="" min=0 max=2></td>



                </tr>
                <tr>
                    <td>5</td>
                    <td>
                        <p>Use of Innovative pedagogy</p>
                    <td><input type="text" id="" name=""></td>
                    <td><input type="text" id="" name=""></td>

                    <td><input type="number" id="" name="" min=0 max=2></td>



                </tr>
            </tbody>
        </table>
        <br>
        <button type="button" onclick="previousPage('page10','page9')">Previous</button>
        <button type="button" onclick="nextPage('page10','page11')">Next</button>
    </div>
    <!-- Page 11 -->
    <div class="page" id="page11">
        <table>
            <thead>
                <tr>
                    <th colspan="6">
                        <div id="A11metadata">
                            <h5><b>A11.</h5>
                            <ol>
                                <li>Post Doctoral Research Work / Awards / Fellowships </li>
                                <li>Citations for Research Papers</li>

                            </ol>
                            <p style="text-align-last: right;">Maximum Score: 02 Points</b></p>
                            <p><b>
                                    <hr>Guidelines to Earn Points:
                                </b></p>
                            <ol>
                                <li>If completed Post Doctoral Research work / Received Awards / Received Awards / Received fellowship in appraisal year : 1 Point per year</li>
                                <li>If received the citations for research papers in appraisal year ( Any peer reviewed agencies / Research Gate ) : Minimum 3 citations per Year: 1 Point</li>
                            </ol>
                            <p><b><i>Note: <u>Enclose the Supporting document of each point. </u></i></b></p>
                        </div>
                    </th>
                <tr>
                    <th rowspan="1">Sr. No.</th>
                    <th rowspan="1">Name of Research Work</th>
                    <th rowspan="1">Details</th>
                    <th colspan="1">Points Claimed</th>
                    <th rowspan="1">Supporting Document Attachment</th>
                    <th rowspan="1">Verification Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <p>Post Doctoral Research Work/ Awards/ Fellowship</p>
                    <td><input type="text" id="" name=""></td>
                    <td><input type="number" id="" name="" min=0 max=1></td>

                    <td rowspan="2"> <!-- Modified rowspan here -->

                        <input type="file" id="a1_verification_file" name="a1_verification_file" accept=".png, .pdf, .doc, .docx">

                    </td>


                    <td rowspan="2" id="verificationResult"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <p>Citations for Research Papers (Minimum 3 per Year.)</p>
                    <td><input type="text" id="" name=""></td>
                    <td><input type="number" id="" name="" min=0 max=1></td>



                </tr>
            </tbody>
        </table>
        <br>
        <button type="button" onclick="previousPage('page11','page10')">Previous</button>
        <button type="button" onclick="nextPage('page11','page12')">Next</button>
    </div>
    <!-- Page 12 -->
    <div class="page" id="page12">
        <table>
            <thead>
                <tr>
                    <th colspan="7">
                        <div id="A12metadata">
                            <h5><b>A12. Authoring Book/Book Chapter/ Editor for a book</h5>
                            <p style="text-align-last: right;">Maximum Score: 02 Points</b></p>
                            <p><b>
                                    <hr>Guidelines to Earn Points:
                                </b></p>
                            <ol>
                                <li>If published a book in current appraisal year : 1 Point per year</li>
                                <li>If published book chapter/ edited a book in current appraisal year: 1 Point per year</li>
                            </ol>
                            <p><b><i>Note: <u>Enclose the Xerox copy of First page of Book/ Book Chapter . </u></i></b></p>
                        </div>
                    </th>
                <tr>
                    <th rowspan="1">Sr. No.</th>
                    <th rowspan="1">Title of Book/ Book Chapter</th>
                    <th rowspan="1">Name of Publisher</th>
                    <th rowspan="1">ISBN</th>
                    <th colspan="1">Points Claimed</th>
                    <th rowspan="1">Supporting Document Attachment</th>
                    <th rowspan="1">Verification Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><input type="text" id="" name=""></td>
                    <td><input type="text" id="" name=""></td>
                    <td><input type="text" id="" name=""></td>
                    <td><input type="number" id="" name="" min=0 max=1></td>

                    <td rowspan="2"> <!-- Modified rowspan here -->

                        <input type="file" id="a1_verification_file" name="a1_verification_file" accept=".png, .pdf, .doc, .docx">

                    </td>


                    <td rowspan="2" id="verificationResult"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><input type="text" id="" name=""></td>
                    <td><input type="text" id="" name=""></td>
                    <td><input type="text" id="" name=""></td>
                    <td><input type="number" id="" name="" min=0 max=1></td>



                </tr>
            </tbody>
        </table>
        <button type="button" onclick="previousPage('page12','page11')">Previous</button>
        <button type="button" onclick="nextPage('page12','page13')">Next</button>

    </div>

    <!-- Page 13 (Form A2)-->
    <div class="page" id="page13">
        <table>
            <thead>


                <tr>
                    <th colspan="8">
                        <div id="A13metadata">
                            <h5><b>A13. Contribution to OBE:</h5>
                            <p style="text-align-last: right;">Maximum Score: 15 Points</b></p>
                            <p><b>
                                    <hr>Guidelines to Earn Points:
                                </b></p>
                            <ol>
                                <li>One mark to each activity per subject per sem for Sr.No.1 : Maximum 3 Points X 2sujects: Max 6 points per sem</li>
                                <li>One mark to each activity for Sr.No.2 : Maximum 3 points per year/</li>
                            </ol>
                            <p>Note: Fill Points Mannually</p>
                        </div>
                    </th>


                </tr>

                <tr>
                    <th rowspan="1">Sr. No.</th>
                    <th rowspan="1">Description</th>
                    <th colspan="4">Points Claimed</th>
                    <th rowspan="1">Points Earned</th>
                    <th rowspan="1">Signature (Upload Sign)</th>


                </tr>

            </thead>
            <tbody>
                <tr>
                    <td rowspan="7">1.</td>
                    <td>No.of Actiivities completed by the faculty to improve the attainmet of poorly attained COs / POs in the subject</td>
                    <td>Sub 1</td>
                    <td>Sub 2</td>
                    <td>Sub 1</td>
                    <td>Sub 2</td>
                    <td rowspan="11" id="a13_total"></td>
                    <td rowspan="11" id="signature"><input type="file" id="a1_verification_file" name="a1_verification_file" accept=".png, .pdf, .doc, .docx"></td>
                </tr>
                <tr>

                    <td>Sem 1 (i) <input type="text" id="" name="" size="50"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>

                </tr>
                <tr>

                    <td>(ii) <input type="text" id="" name="" size="50"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>

                </tr>
                <tr>

                    <td>(iii) <input type="text" id="" name="" size="50"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>

                </tr>
                <tr>

                    <td>Sem 2 (iv) <input type="text" id="" name="" size="50"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>

                </tr>
                <tr>

                    <td>(v) <input type="text" id="" name="" size="50"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>

                </tr>
                <tr>

                    <td>(vi) <input type="text" id="" name="" size="50"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>

                </tr>
                <tr>
                    <td rowspan="4">2.</td>
                    <td colspan="5">No.of Actiivities completed by the faculty towards attainmet of poorly attained COs / POs in the subject</td>
                </tr>
                <tr>

                    <td>(i) <input type="text" id="" name="" size="50"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>

                </tr>
                <tr>

                    <td>(ii) <input type="text" id="" name="" size="50"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>

                </tr>
                <tr>

                    <td>(iii) <input type="text" id="" name="" size="50"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>
                    <td><input type="number" id="" name="" min="0" max="1"></td>

                </tr>


            </tbody>
        </table>
        <br>
        <button type="button" onclick="previousPage('page13','page12')">Previous</button>
        <button type="button" onclick="nextPage('page13','page14')">Next</button>



    </div>

    <!-- Page 14 (Form A5)-->
    <div class="page" id="page14">
        <table>
            <thead>


                <tr>
                    <th colspan="9">
                        <div id="A14metadata">
                            <h5><b>A14. Continuous Assessment (C.A.) in time</h5>
                            <p style="text-align-last: right;">Maximum Score: 16 Points</b></p>
                            <p><b>
                                    <hr>Guidelines to Earn Points:
                                </b></p>
                            <ol>
                                <li>Continuous assessment displayed at the end of each month: 1 points/subject/sem X 3(1Point for each month): Max 12 points/year</li>
                                <li>Sign of Students on C.A. sheet at the end of each month: 1 point per subject per semester : Max 4 pts/year/</li>
                            </ol>
                            <p><b><i>Note: <u>Enclose the ERP/LMS Report of assessment for and student signature sheet at the end of each semester. </u></i></b></p>
                            <p>Note: Fill Points Mannually</p>
                        </div>
                    </th>


                </tr>

                <tr>
                    <th rowspan="1">Sr. No.</th>
                    <th rowspan="1">Class/Dept</th>
                    <th rowspan="1">Sem</th>
                    <th rowspan="1">Name of Course</th>
                    <th rowspan="1">Points Claimed: Marks displayed and C.A. done as per Course Handout</th>
                    <th rowspan="1">Signature of students collected on C.A. Sheet (Yes or No)</th>
                    <th rowspan="1">Points Claimed</th>
                    <th rowspan="1">Points Earned</th>
                    <th rowspan="1">Signature (Upload Proof)</th>


                </tr>



            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <select class="classDropdown25" onchange="populateSemesterDropdown(this, 25)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown25" onchange="populateCourses(this, 25)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown25" onchange="LecdisplayCourseInfo(this, 25)" disabled>
                            <option value="">Select</option>
                        </select></td>
                    <td>
                        <input type="number">
                    </td>
                    <td>
                        <select name="Yes/No" id="lmsyesno4">
                            <option value="no">NO</option>
                            <option value="yes">Yes</option>
                        </select>
                    </td>
                    <td>
                        <input type="number" min="0" max="10">
                    </td>
                    <td rowspan="4">

                    </td>
                    <td rowspan="4" id="signature"><input type="file" id="a1_verification_file" name="a1_verification_file" accept=".png, .pdf, .doc, .docx"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <select class="classDropdown26" onchange="populateSemesterDropdown(this, 26)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown26" onchange="populateCourses(this, 26)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown26" onchange="LecdisplayCourseInfo(this, 26)" disabled>
                            <option value="">Select</option>
                        </select></td>
                    <td>
                        <input type="number">
                    </td>
                    <td>
                        <select name="Yes/No" id="lmsyesno5">
                            <option value="no">NO</option>
                            <option value="yes">Yes</option>
                        </select>
                    </td>
                    <td>
                        <input type="number" min="0" max="10">
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>
                        <select class="classDropdown27" onchange="populateSemesterDropdown(this, 27)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown27" onchange="populateCourses(this, 27)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown27" onchange="LecdisplayCourseInfo(this, 27)" disabled>
                            <option value="">Select</option>
                        </select></td>
                    <td>
                        <input type="number">
                    </td>
                    <td>
                        <select name="Yes/No" id="lmsyesno6">
                            <option value="no">NO</option>
                            <option value="yes">Yes</option>
                        </select>
                    </td>
                    <td>
                        <input type="number" min="0" max="10">
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>
                        <select class="classDropdown28" onchange="populateSemesterDropdown(this, 28)">
                            <option value="">Select Department</option>
                        </select>
                    </td>
                    <td><select class="semesterDropdown29" onchange="populateCourses(this, 29)">
                            <option value="">Select</option>
                        </select></td>

                    <td><select class="courseDropdown30" onchange="LecdisplayCourseInfo(this, 30)" disabled>
                            <option value="">Select</option>
                        </select></td>
                    <td>
                        <input type="number">
                    </td>
                    <td>
                        <select name="Yes/No" id="lmsyesno7">
                            <option value="no">NO</option>
                            <option value="yes">Yes</option>
                        </select>
                    </td>
                    <td>
                        <input type="number" min="0" max="10">
                    </td>
                </tr>



            </tbody>
        </table>
        <br>

        <button type="button" onclick="previousPage('page14','page13')">Previous</button>
        <button type="button" onclick="nextPage('page14','page15')">Next</button>
        <input type="submit" value="Submit">
        <button type="button" onclick="printForm()"  class="print-hidden">Print Form</button>

    </div>




</form>

<?php
include 'formsaccess.php';
?>
