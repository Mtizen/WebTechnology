<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Games</title>
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
?>

<body class="bg-gradient-to-r from-red-300 via-orange-300 to-yellow-300 p-8">
    <div class="mx-auto p-4">
        <p class="text-center text-4xl mb-10 font-bold">Trắc nghiệm</p>
        <form action="submit.php" method="POST">
            <?php foreach ($questionsList as $index => $question): ?>
                <div class='overflow-auto bg-white shadow-lg rounded-md mb-6'>
                    <div class='bg-gray-300 p-4 font-bold'><?php echo $question[0]; ?></div>
                    <div class='p-4 hover:bg-blue-100 transition-colors duration-200'>
                        <?php 
                            $options = ['A', 'B', 'C', 'D'];
                            for ($i = 1; $i <= 4; $i++):
                        ?>
                            <div class='flex items-center mb-2'>
                                <input class='mr-2' type='radio' name='question<?php echo $index + 1; ?>' value='<?php echo $options[$i - 1]; ?>' id='question<?php echo $index + 1; ?><?php echo $options[$i - 1]; ?>'>
                                <label for='question<?php echo $index + 1; ?><?php echo $options[$i - 1]; ?>'><?php echo $question[$i]; ?></label>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Nộp bài</button>
            </div>
        </form>
    </div>
</body>
</html>