<?php
function generateRandomName() {
    $firstNames = ['João', 'Maria', 'Pedro', 'Ana', 'Carlos', 'Juliana', 'Marcos', 'Fernanda', 'Ricardo', 'Patrícia'];
    $lastNames = ['Silva', 'Santos', 'Oliveira', 'Souza', 'Lima', 'Costa', 'Pereira', 'Carvalho', 'Ribeiro', 'Martins'];
    return $firstNames[array_rand($firstNames)] . ' ' . $lastNames[array_rand($lastNames)];
}

function generateRandomMovements() {
    return [
        'Deadlift', 'Back Squat', 'Bench Press', 'Snatch', 'Clean and Jerk', 'Front Squat', 'Overhead Press', 'Pull-up', 'Push-up', 'Row', 'Sprint', 'Jump', 'Swing', 'Lunge', 'Burpee', 'Dips', 'Kettlebell Swing', 'Plank', 'Sit-up', 'Run',
        'Deadlift_01', 'Back Squat_01', 'Bench Press_01', 'Snatch_01', 'Clean and Jerk_01', 'Front Squat_01', 'Overhead Press_01', 'Pull-up_01', 'Push-up_01', 'Row_01', 'Sprint_01', 'Jump_01', 'Swing_01', 'Lunge_01', 'Burpee_01', 'Dips_01', 'Kettlebell Swing_01', 'Plank_01', 'Sit-up_01', 'Run_01',
        'Deadlift_02', 'Back Squat_02', 'Bench Press_02', 'Snatch_02', 'Clean and Jerk_02', 'Front Squat_02', 'Overhead Press_02', 'Pull-up_02', 'Push-up_02', 'Row_02', 'Sprint_02', 'Jump_02', 'Swing_02', 'Lunge_02', 'Burpee_02', 'Dips_02', 'Kettlebell Swing_02', 'Plank_02', 'Sit-up_02', 'Run_02',
        'Deadlift_03', 'Back Squat_03', 'Bench Press_03', 'Snatch_03', 'Clean and Jerk_03', 'Front Squat_03', 'Overhead Press_03', 'Pull-up_03', 'Push-up_03', 'Row_03', 'Sprint_03', 'Jump_03', 'Swing_03', 'Lunge_03', 'Burpee_03', 'Dips_03', 'Kettlebell Swing_03', 'Plank_03', 'Sit-up_03', 'Run_03',
        'Deadlift_04', 'Back Squat_04', 'Bench Press_04', 'Snatch_04', 'Clean and Jerk_04', 'Front Squat_04', 'Overhead Press_04', 'Pull-up_04', 'Push-up_04', 'Row_04', 'Sprint_04', 'Jump_04', 'Swing_04', 'Lunge_04', 'Burpee_04', 'Dips_04', 'Kettlebell Swing_04', 'Plank_04', 'Sit-up_04', 'Run_04',
        'Deadlift_05', 'Back Squat_05', 'Bench Press_05', 'Snatch_05', 'Clean and Jerk_05', 'Front Squat_05', 'Overhead Press_05', 'Pull-up_05', 'Push-up_05', 'Row_05', 'Sprint_05', 'Jump_05', 'Swing_05', 'Lunge_05', 'Burpee_05', 'Dips_05', 'Kettlebell Swing_05', 'Plank_05', 'Sit-up_05', 'Run_05',
        'Deadlift_06', 'Back Squat_06', 'Bench Press_06', 'Snatch_06', 'Clean and Jerk_06', 'Front Squat_06', 'Overhead Press_06', 'Pull-up_06', 'Push-up_06', 'Row_06', 'Sprint_06', 'Jump_06', 'Swing_06', 'Lunge_06', 'Burpee_06', 'Dips_06', 'Kettlebell Swing_06', 'Plank_06', 'Sit-up_06', 'Run_06',
        'Deadlift_07', 'Back Squat_07', 'Bench Press_07', 'Snatch_07', 'Clean and Jerk_07', 'Front Squat_07', 'Overhead Press_07', 'Pull-up_07', 'Push-up_07', 'Row_07', 'Sprint_07', 'Jump_07', 'Swing_07', 'Lunge_07', 'Burpee_07', 'Dips_07', 'Kettlebell Swing_07', 'Plank_07', 'Sit-up_07', 'Run_07',
        'Deadlift_08', 'Back Squat_08', 'Bench Press_08', 'Snatch_08', 'Clean and Jerk_08', 'Front Squat_08', 'Overhead Press_08', 'Pull-up_08', 'Push-up_08', 'Row_08', 'Sprint_08', 'Jump_08', 'Swing_08', 'Lunge_08', 'Burpee_08', 'Dips_08', 'Kettlebell Swing_08', 'Plank_08', 'Sit-up_08', 'Run_08',
        'Deadlift_09', 'Back Squat_09', 'Bench Press_09', 'Snatch_09', 'Clean and Jerk_09', 'Front Squat_09', 'Overhead Press_09', 'Pull-up_09', 'Push-up_09', 'Row_09', 'Sprint_09', 'Jump_09', 'Swing_09', 'Lunge_09', 'Burpee_09', 'Dips_09', 'Kettlebell Swing_09', 'Plank_09', 'Sit-up_09', 'Run_09',
        'Deadlift_10', 'Back Squat_10', 'Bench Press_10', 'Snatch_10', 'Clean and Jerk_10', 'Front Squat_10', 'Overhead Press_10', 'Pull-up_10', 'Push-up_10', 'Row_10', 'Sprint_10', 'Jump_10', 'Swing_10', 'Lunge_10', 'Burpee_10', 'Dips_10', 'Kettlebell Swing_10', 'Plank_10', 'Sit-up_10', 'Run_10'
    ];
}

function generateSQLFile($filename, $sqlStatements) {
    file_put_contents($filename, implode("\n", $sqlStatements));
}

// Gerando usuários
$userCount = 300;
$userSQL = [];
for ($i = 1; $i <= $userCount; $i++) {
    $name = generateRandomName();
    $userSQL[] = "INSERT INTO `user` (id, name) VALUES ($i, '$name');";
}
generateSQLFile('users.sql', $userSQL);

// Gerando movimentos
$movements = generateRandomMovements();
$movementSQL = [];
foreach ($movements as $index => $movement) {
    $movementSQL[] = "INSERT INTO `movement` (id, name) VALUES (" . ($index + 1) . ", '$movement');";
}
generateSQLFile('movements.sql', $movementSQL);

// Gerando personal records
$personalRecordsSQL = [];
foreach (range(1, $userCount) as $userId) {
    $userMovements = array_rand($movements, count($movements));
    if (!is_array($userMovements)) $userMovements = [$userMovements];
    foreach ($userMovements as $movementIndex) {
        $record = (int)(rand(50, 300) + (rand(0, 99) / 100));
        $date = date('Y-m-d H:i:s', strtotime('-' . rand(1, 365) . ' days'));
        $personalRecordsSQL[] = "INSERT INTO `personal_record` (user_id, movement_id, value, date) VALUES ($userId, " . ($movementIndex + 1) . ", $record, '$date');";
    }
}
generateSQLFile('personal_records.sql', $personalRecordsSQL);

echo "Arquivos SQL gerados com sucesso!";
