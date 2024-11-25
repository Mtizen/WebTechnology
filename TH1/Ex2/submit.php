<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<?php
    $filename = "questions.txt";
    $questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $current_question = [];
    foreach ($questions as $line) {
        if (strpos($line, "Câu") === 0) {
            if (!empty($current_question)) {
                $questionsList[] = $current_question;
            }
            $current_question = [];
        }
        $current_question[] = $line;
    }
    if (!empty($current_question)) {
        $questionsList[] = $current_question;
    }


    $answers = [];
    foreach ($questionsList as $question) {
        $answers[] = trim(substr($question[5], strpos($question[5], ":") + 1));
    }


    $score = 0;
    foreach ($_POST as $key => $userAnswer) {
        $questionNumber = (int)filter_var($key, FILTER_SANITIZE_NUMBER_INT);
        if (isset($answers[$questionNumber - 1]) && $answers[$questionNumber - 1] === $userAnswer) {
            $score++;
        }
    }
?>

<body class="bg-gray-100 p-8">
    <div class="mx-auto p-4">
        <p class="text-4xl text-center mb-10 font-bold">Kết quả trắc nghiệm</p>
        
        <div class="bg-green-200 p-6 rounded-md shadow-lg">
            <div class="pt-1 pb-5">
                <p class="text-center text-xl">Bạn trả lời đúng <span class="font-bold text-xl"><?php echo $score; ?></span>/<?php echo count($answers); ?> câu hỏi.</p>
            </div>
        </div>

        <div class="mt-10 mb-3 text-center">
                <a href="index.php" class="bg-blue-500 text-white py-3 px-5 rounded hover:bg-blue-600">Làm lại</a>
        </div>
    </div>
</body>
</html>