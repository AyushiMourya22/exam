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

        echo '<form action="./result.php" method="POST">
            <div class="flex justify-center"><div class=" w-4/12 mb-6">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Roll Number</label>
            <select name="rollno" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">';
            $sql = "select * from student";   
            $res = mysqli_query($conn, $sql);
            while ($result = mysqli_fetch_assoc($res)) {
                echo '<option value="'.$result['roll_no'].'">'.$result['roll_no'].' ( '.$result['student_name'].' )</option>';
            }
        echo '</select>
        </div></div>';

        $sql = "select * from examination";
        $res = mysqli_query($conn, $sql);
        $ques_no = 1;
        while ($result = mysqli_fetch_assoc($res)) {
            echo
            '<div class="flex justify-center">
            <div class="rounded-xl border p-5 shadow-md bg-white m-3 w-4/5">
                <div class="flex w-full items-center justify-between border-b pb-3">
                    <div class="flex items-center font-semibold space-x-3">Question '.$result['q_id'].'</div>
                </div>
                <div class="mt-4 mb-6">
                    <div class="mb-3 text-xl font-semibold">' . $result['question_contents'] . '</div>
                </div>
                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                        <div class="flex items-center pl-3">
                            <label for="horizontal-list-radio-license" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">A) '.$result['option_a'].'</label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                        <div class="flex items-center pl-3">
                            <label for="horizontal-list-radio-id" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">B) '.$result['option_b'].'</label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                        <div class="flex items-center pl-3">
                            <label for="horizontal-list-radio-millitary" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">C) '.$result['option_c'].'</label>
                        </div>
                    </li>
                    <li class="w-full dark:border-gray-600">
                        <div class="flex items-center pl-3">
                            <label for="horizontal-list-radio-passport" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">D) '.$result['option_d'].'</label>
                        </div>
                    </li>
                </ul>
                <div class="flex mt-5 justify-center">
                    <div class=" w-4/12 mb-6">
                        <select name="'.$result['q_id'].'" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="none">Select your choice</option>
                            <option value="a"> (a) '.$result['option_a'].'</option>
                            <option value="b"> (b) '.$result['option_b'].'</option>
                            <option value="c"> (c) '.$result['option_c'].'</option>
                            <option value="d"> (d) '.$result['option_d'].'</option>
                        </select>
                    </div>
                </div>
                </div>
            </div>';
            $ques_no += 1;
        }
        ?>
        <div class="flex justify-center w-full md:w-full px-3 mb-6">
            <button type="submit" class="appearance-none block w-60 bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:bg-white focus:border-gray-500">Submit Quiz</button>
        </div>
        </form>
    </section>
</body>

</html>