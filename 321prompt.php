<!DOCTYPE html>
<html>
<head>
    <title>Générateur de Phrases</title>
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
        }
        .box {
            flex: 1;
            min-width: 45%;
            padding: 10px;
            box-sizing: border-box;
        }
        textarea {
            width: 100%;
            height: 200px;
        }
    </style>
</head>
<body>

<h1>Générateur de Phrases</h1>

<form method="post" action="">
    <div class="container">
        <!-- Boîte 1 -->
        <div class="box">
            <label for="start_phrase1">Début de la phrase 1 :</label><br>
            <input type="text" id="start_phrase1" name="start_phrase1" value="<?php echo isset($_POST['start_phrase1']) ? htmlspecialchars($_POST['start_phrase1']) : ''; ?>" required><br><br>
            
            <label for="start_value1">Valeur de départ :</label><br>
            <input type="number" step="0.01" id="start_value1" name="start_value1" value="<?php echo isset($_POST['start_value1']) ? htmlspecialchars($_POST['start_value1']) : ''; ?>" required><br><br>
            
            <label for="end_value1">Valeur d'arrivée :</label><br>
            <input type="number" step="0.01" id="end_value1" name="end_value1" value="<?php echo isset($_POST['end_value1']) ? htmlspecialchars($_POST['end_value1']) : ''; ?>" required><br><br>
            
            <label for="end_phrase1">Fin de la phrase 1 :</label><br>
            <input type="text" id="end_phrase1" name="end_phrase1" value="<?php echo isset($_POST['end_phrase1']) ? htmlspecialchars($_POST['end_phrase1']) : ''; ?>" required><br><br>
            
            <label for="num_phrases1">Nombre de phrases :</label><br>
            <input type="number" id="num_phrases1" name="num_phrases1" value="<?php echo isset($_POST['num_phrases1']) ? htmlspecialchars($_POST['num_phrases1']) : ''; ?>" required><br><br>
        </div>

        <!-- Boîte 2 -->
        <div class="box">
            <label for="start_phrase2">Début de la phrase 2 :</label><br>
            <input type="text" id="start_phrase2" name="start_phrase2" value="<?php echo isset($_POST['start_phrase2']) ? htmlspecialchars($_POST['start_phrase2']) : ''; ?>"><br><br>
            
            <label for="start_value2">Valeur de départ :</label><br>
            <input type="number" step="0.01" id="start_value2" name="start_value2" value="<?php echo isset($_POST['start_value2']) ? htmlspecialchars($_POST['start_value2']) : ''; ?>"><br><br>
            
            <label for="end_value2">Valeur d'arrivée :</label><br>
            <input type="number" step="0.01" id="end_value2" name="end_value2" value="<?php echo isset($_POST['end_value2']) ? htmlspecialchars($_POST['end_value2']) : ''; ?>"><br><br>
            
            <label for="end_phrase2">Fin de la phrase 2 :</label><br>
            <input type="text" id="end_phrase2" name="end_phrase2" value="<?php echo isset($_POST['end_phrase2']) ? htmlspecialchars($_POST['end_phrase2']) : ''; ?>"><br><br>
            
            <label for="num_phrases2">Nombre de phrases :</label><br>
            <input type="number" id="num_phrases2" name="num_phrases2" value="<?php echo isset($_POST['num_phrases2']) ? htmlspecialchars($_POST['num_phrases2']) : ''; ?>"><br><br>
        </div>
    </div>
    <input type="submit" value="Générer">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les entrées du formulaire pour la première phrase
    $startPhrase1 = $_POST['start_phrase1'];
    $startValue1 = floatval($_POST['start_value1']);
    $endValue1 = floatval($_POST['end_value1']);
    $endPhrase1 = $_POST['end_phrase1'];
    $numPhrases1 = intval($_POST['num_phrases1']);
    
    // Récupérer les entrées du formulaire pour la deuxième phrase (si présentes)
    $startPhrase2 = isset($_POST['start_phrase2']) ? $_POST['start_phrase2'] : '';
    $startValue2 = isset($_POST['start_value2']) ? floatval($_POST['start_value2']) : 0;
    $endValue2 = isset($_POST['end_value2']) ? floatval($_POST['end_value2']) : 0;
    $endPhrase2 = isset($_POST['end_phrase2']) ? $_POST['end_phrase2'] : '';
    $numPhrases2 = isset($_POST['num_phrases2']) ? intval($_POST['num_phrases2']) : $numPhrases1;
    
    // Calculer l'incrément pour les phrases
    $increment1 = ($endValue1 - $startValue1) / ($numPhrases1 - 1);
    $increment2 = ($startPhrase2 !== '') ? ($endValue2 - $startValue2) / ($numPhrases2 - 1) : 0;
    
    // Générer les phrases combinées
    $combinedResults = "";
    $maxPhrases = max($numPhrases1, $numPhrases2);
    for ($i = 0; $i < $maxPhrases; $i++) {
        $currentValue1 = $startValue1 + ($increment1 * $i);
        $currentValue2 = ($startPhrase2 !== '') ? $startValue2 + ($increment2 * $i) : '';
        $phrase1 = $startPhrase1 . $currentValue1 . $endPhrase1;
        $phrase2 = ($startPhrase2 !== '') ? ' , ' . $startPhrase2 . $currentValue2 . $endPhrase2 : '';
        $combinedResults .= $phrase1 . $phrase2 . "\n";
    }
    
    // Afficher les résultats
    echo "<h2>Résultats :</h2>";
    echo '<textarea readonly>' . htmlspecialchars($combinedResults) . '</textarea>';
}
?>

</body>
</html>
