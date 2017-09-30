<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz Results</title>
</head>
<body>
    <h1>Quiz Results</h1>
    <ol>
        <?php
            $questions = array(
                'Q1' => array(
                    'text' => "How many degrees do the cylinders in a 4-stroke, 4-cylinder engine fire?",
                    'answer' => "180"
                ),
                'Q2' => array(
                    'text' => "This type of steam locomotive has a driveshaft as opposed to the more common drive rods:",
                    'answer' => "Shay"
                ),
                'Q3' => array(
                    'text' => "The display protocol used internally by older laptops:",
                    'answer' => "LVDS"
                ),
                'Q4' => array(
                    'text' => "The primary oxidizer in black powder:",
                    'answer' => "Saltpeter"
                ),
                'Q5' => array(
                    'text' => "The register that holds the return value in the AMD64 SysV ABI:",
                    'answer' => "rax"
                )
            );
            $num_correct = 0;
            foreach($questions as $questionName => $questionProperties) {
                echo "<li>";
                echo "<b>".$questionProperties['text']."</b><br/>";
                echo "<b>Your answer: </b>".$_POST[$questionName]."<br/>";
                echo "<b>Correct answer: </b>".$questionProperties["answer"]."<br/>";
                if ($_POST[$questionName] !== $questionProperties["answer"]) {
                    echo "<b>Incorrect</b><br/>";
                } else {
                    echo "<b>Correct</b><br/>";
                    $num_correct++;
                }
                echo "</li>";
            }
        ?>
    </ol>
    <b>Score: <?php echo ($num_correct/5.0)*100; ?>%</b>
</body>
</html>