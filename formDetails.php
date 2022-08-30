<?php
    class stdDetails{
        private $std_name;
        private $std_form_no;
        private $std_phone;
        private $std_email;
        private $major_subject;
        private $minor_subject;
        private $multidisciplinary_subject;
        private $skill_subject;
        public $error = false;

        public function getStdName(){
            echo $this->std_name;
        }
        public function getMajorSubject(){
            return $this->major_subject;
        }
        public function getMinorSubject(){
            return $this->minor_subject;
        }
        public function setStdName($std_name){

            $this->std_name = $std_name;
        }
        public function setStdFormNo($std_form_no, $connection){
            $query = $connection->prepare(
                'SELECT * FROM students WHERE form_number = :form_number');
            $query->bindParam(':form_number', $std_form_no);
            $query->execute();
            if($query->rowCount() != 0){
                echo "<br> Form Number already exists";
                $this->error = true;
            }else{
                $this->std_form_no = $std_form_no;
            }

        }
        public function setStdPhone($std_phone){
            $this->std_phone = $std_phone;
        }
        public function setStdEmail($std_email){
            $this->std_email = $std_email;
        }
        public function setMajorSub($major_subject){
            $this->major_subject = $major_subject;
        }
        public function setMinorSub($minor_subject){
            $this->minor_subject = $minor_subject;
        }
        public function setMulSub($multidisciplinary_subject){
            $this->multidisciplinary_subject = $multidisciplinary_subject;
        }
        public function setSkillSub($skill_subject){
            $this->skill_subject = $skill_subject;
        }
        public function addDetails($connection){
            try {
              $query = $connection->prepare("INSERT INTO students VALUES(NULL,:stdName, :formNo, :mobileNumber, :email, :major, :minor, :multidisciplinary, :skill)");

              $query->bindParam(':stdName', $this->std_name);
              $query->bindParam(':formNo', $this->std_form_no);
              $query->bindParam(':mobileNumber', $this->std_phone);
              $query->bindParam(':email', $this->std_email);
              $query->bindParam(':major', $this->major_subject);
              $query->bindParam(':minor', $this->minor_subject);
              $query->bindParam(':multidisciplinary', $this->multidisciplinary_subject);
              $query->bindParam(':skill', $this->skill_subject);
              $query->execute();

              $query2 = $connection->prepare("SELECT count FROM multidisciplinary_subjects WHERE subject_name = :mulSub");
              $query2->bindParam(':mulSub', $this->multidisciplinary_subject);
              $query2->execute();
              $result1=$query2->fetchAll();
              $multiCount = $result1[0]['count'];
              $query3 = $connection->prepare("SELECT count FROM skill_subjects WHERE subject_name = :skillSub");
              $query3->bindParam(':skillSub', $this->skill_subject);
              $query3->execute();
              $result2=$query3->fetchAll();
              $skillCount = $result2[0]['count'];

              $newMultiCount = $multiCount+1;
              $newSkillCount = $skillCount+1;
              $query4 = $connection->prepare("UPDATE multidisciplinary_subjects SET count = :newCount WHERE subject_name = :mulSub");
              $query4->bindParam(':newCount', $newMultiCount);
              $query4->bindParam(':mulSub', $this->multidisciplinary_subject);
               $query4->execute();

              $query5 = $connection->prepare("UPDATE skill_subjects SET count = :newCount WHERE subject_name = :skillsub");
              $query5->bindParam(':newCount', $newSkillCount);
              $query5->bindParam(':skillsub', $this->skill_subject);
               $query5->execute();
              header('location:success.php');
          } catch (Exception $e) {
              echo "Reg Error: ".$e->getMessage();
          }
        }
    }
?>
