<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="CalculReput.php" method="POST">
        <input type="text" name="query"/>

        <p>Premier critère :</p>
        <input type="radio" name="crit1" value="dateSortie">
        <label for="dateSortie">Date de sortie</label><br>
        <input type="radio" name="crit1" value="nbUtilisateur">
        <label for="nbUtilisateur">Nombre d'utilisateurs</label><br>
        <input type="radio" name="crit1" value="nbDefi">
        <label for="nbDefi">Nombre de défis</label>

        <br>  

        <p>Second critère :</p>
        <input type="radio" name="crit2" value="dateSortie">
        <label for="dateSortie">Date de sortie</label><br>
        <input type="radio" name="crit2" value="nbUtilisateur">
        <label for="nbUtilisateur">Nombre d'utilisateurs</label><br>
        <input type="radio" name="crit2" value="nbDefi">
        <label for="nbDefi">Nombre de défis</label>

        <br>  

        <p>Troisième critère :</p>
        <input type="radio" name="crit3" value="dateSortie">
        <label for="dateSortie">Date de sortie</label><br>
        <input type="radio" name="crit3" value="nbUtilisateur">
        <label for="nbUtilisateur">Nombre d'utilisateurs</label><br>
        <input type="radio" name="crit3" value="nbDefi">
        <label for="nbDefi">Nombre de défis</label>

        <br>

        <input type="submit" value="Rechercher">
    </form>
</body>
</html>