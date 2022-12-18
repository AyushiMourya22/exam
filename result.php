<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
    <link rel="stylesheet" href="./indexStyle.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
        include('./navbar.php');
    ?>
    <section class="flex-col w-full justify-center mt-10 mb-10">
        <?php
            include("./conf.php");

            $sql = "select * from examination order by q_id";
            $res = mysqli_query($conn, $sql);
            $score = 0;
            $correct = 0;
            $incorrect = 0;
            $notAnswered = 0;

            while ($result = mysqli_fetch_assoc($res)){
                
                if($_POST[$result['q_id']] == $result['correct_option']){
                    $score += $result['correct_marks'];
                    $correct += 1;
                }
                else if($_POST[$result['q_id']] == "none"){
                    $notAnswered += 1;
                    continue;
                }
                else{
                    $score -= $result['incorrect_marks'];
                    $incorrect += 1;
                }
            }

            $sql = "insert into results (`roll_no`,`total_marks`) values ('".$_POST['rollno']."',".$score.")";
            $res = mysqli_query($conn, $sql);

            echo '
            <div class="flex justify-center">
            <ul class="flex-col items-center w-5/12 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <h2 class="text-3xl my-4 tracking-tight">
                    Final Report
                </h2>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <label for="horizontal-list-radio-license" class="py-3 ml-2 w-full text-lg font-medium text-gray-900 dark:text-gray-300">Roll No: '.$_POST['rollno'].'</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <label for="horizontal-list-radio-id" class="py-3 ml-2 w-full text-lg font-medium text-gray-900 dark:text-gray-300">Correct Answered: '.$correct.'</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <label for="horizontal-list-radio-millitary" class="py-3 ml-2 w-full text-lg font-medium text-gray-900 dark:text-gray-300">Incorrect Answered: '.$incorrect.'</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <label for="horizontal-list-radio-millitary" class="py-3 ml-2 w-full text-lg font-medium text-gray-900 dark:text-gray-300">Not Answered: '.$notAnswered.'</label>
                    </div>
                </li>
                <li class="w-full dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <label for="horizontal-list-radio-passport" class="py-3 ml-2 w-full text-lg font-medium text-gray-900 dark:text-gray-300">Marks Obtained: '.$score.'</label>
                    </div>
                </li>
            </ul></div>';

            echo $score;
        ?>
    </section>
</body>

</html>