
<?php 
    // asdfghjklsadfghjklsdfghjk
    $pdo = null;

    function Getpdo(){
        if (!empty($GLOBALS["pdo"])){
            return $GLOBALS["pdo"];
        }
        else{
            $host = '127.0.0.1'; 
            $db = 'dataLogin'; 
            $user = 'root';
            $pass = 'web';
            $charset = 'utf8';

            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];


            try {
                $pdo = new PDO($dsn, $user, $pass, $options);
            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
                echo 'Connexion échoué';
            }

            $GLOBALS['pdo'] =  $pdo;
        }
    }
    
    function AfficherRow($ordre,$filtre, $race,$sexe,$region,$min,$max){
        $stmt = $GLOBALS['pdo']->query('SELECT id, nom, sexe, race, age, region FROM personnage');
        if(!($ordre == ""))
        {
            $stmt = TriTbleau($ordre);
        }
        if (!($filtre == "")) {
            $stmt = TableauFiltrer($filtre,$race,$sexe,$region,$min,$max);
        }

        while ($row = $stmt->fetch())
        {
            echo "<form method='POST' action='modifier.php'>
            <tr>
            <td hidden>".$row['id']."</td>
            <td>".$row['nom']."</td>
            <td>".$row['sexe']."</td>
            <td>".$row['race']."</td>
            <td>".$row['age']."</td>
            <td>".$row['region']."</td>
            <td><button type='submit' name='id' value='".$row['id']."'>Modifier</button>
            <button type='submit' name='id' formaction='supprimer.php' value='".$row['id']."'>supprimer</button>
            </td>
            </tr>
            </form>";
        }
    }

    function TableauFiltrer($filtre, $race, $sexe, $region,$min,$max)
    {
        switch ($filtre) {
            case 'race':
                $stmt = $GLOBALS['pdo']->query("SELECT id, nom, sexe, race, age, region FROM personnage where race ='". $race ."'");
                break;
            case 'sexe':
                $stmt = $GLOBALS['pdo']->query("SELECT id, nom, sexe, race, age, region FROM personnage where sexe ='". $sexe ."'");
                break;
            case 'region':
                $stmt = $GLOBALS['pdo']->query("SELECT id,nom, sexe, race, age, region FROM personnage where region ='". $region ."'");
                break;
                case 'age':
                    $stmt = $GLOBALS['pdo']->query("SELECT id,nom, sexe, race, age, region FROM personnage where age >=". $min ." and age <=".$max."");
                    break;
        }
        return $stmt;
    }

    function TriTbleau($ordre)
    {
        switch ($ordre) {
            case 'nom_desc':
                $stmt = $GLOBALS['pdo']->query('SELECT id,nom, sexe, race, age, region FROM personnage ORDER BY nom desc');
                break;
            case 'nom_asc':
                $stmt = $GLOBALS['pdo']->query('SELECT id,nom, sexe, race, age, region FROM personnage ORDER BY nom asc');
                break;
            case 'sexe_desc':
                $stmt = $GLOBALS['pdo']->query('SELECT id,nom, sexe, race, age, region FROM personnage ORDER BY sexe desc');
                break;
            case 'sexe_asc':
                $stmt = $GLOBALS['pdo']->query('SELECT id,nom, sexe, race, age, region FROM personnage ORDER BY sexe asc');
                break;
            case 'race_asc':
                $stmt = $GLOBALS['pdo']->query('SELECT id,nom, sexe, race, age, region FROM personnage ORDER BY race asc');
                break;
            case 'race_desc':
                $stmt = $GLOBALS['pdo']->query('SELECT id,nom, sexe, race, age, region FROM personnage ORDER BY race desc');
                break;
            case 'age_asc':
                $stmt = $GLOBALS['pdo']->query('SELECT id,nom, sexe, race, age, region FROM personnage ORDER BY age asc');
                break;
            case 'age_desc':
                $stmt = $GLOBALS['pdo']->query('SELECT id,nom, sexe, race, age, region FROM personnage ORDER BY age desc');
                break;
            case 'region_asc':
                $stmt = $GLOBALS['pdo']->query('SELECT id,nom, sexe, race, age, region FROM personnage ORDER BY region asc');
                break;
            case 'region_desc':
                $stmt = $GLOBALS['pdo']->query('SELECT id,nom, sexe, race, age, region FROM personnage ORDER BY region desc');
                break;
        }
        return $stmt;
    }

    function AjouterUtilisateur($nom, $prenom, $pseudonyme, $mdp){
        $pdo = getPdo();
        try {
            $sql = "INSERT INTO Login (nom, prenom, pseudonyme, mdp) VALUES (?, ?, ?, ?)";
            $stmt= $pdo->prepare($sql);
            $stmt->execute([$nom, $prenom, $pseudonyme, $mdp]);
            echo "tu est un genie! ";
        } catch (Exception $e) {
            //throw new \Exception($e->getMessage(), (int)$e->getCode());
            echo 'POURRI! MARCHE PAS!';
        }
    }

    function ModifierPersonnage($id, $nom, $sexe, $race, $age, $region){
        $pdo = getPdo();
        try {
            $sql = "UPDATE personnage SET nom=?, sexe=?, race=?, age=?, region=? WHERE id=?";
            $stmt= $pdo->prepare($sql);
            $stmt->execute([$nom, $sexe, $race, $age, $region, $id]);
        } catch (Exception $e) {
            throw new \Exception($e->getMessage(), (int)$e->getCode());
        }
    }

    function SupprimerPersonnage($id){
        $pdo = getPdo();
        $sql = "DELETE FROM personnage WHERE id=?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    function GetRegion($selected){
        $stmt = $GLOBALS['pdo']->query('SELECT Distinct nom FROM region');
        while ($row = $stmt->fetch())
        {
            if ($selected == $row['nom']){
                echo "<option selected>".$row['nom']."</option>";
            }
            else {
                echo "<option>".$row['nom']."</option>";
            }
            
        }
    }

    function GetRace($selected){
        $stmt = $GLOBALS['pdo']->query('SELECT Distinct nom FROM race');
        while ($rows = $stmt->fetch())
        {
            if ($selected == $rows['nom']){
                echo "<option selected>".$rows['nom']."</option>";
            }
            else {
                echo "<option >".$rows['nom']."</option>";
            }
        }
    }

    function GetPersonnage($id){
        $stmt = $GLOBALS['pdo']->query("SELECT nom, sexe, race, region, age FROM personnage where id='$id'");
        while ($row = $stmt->fetch())
        {
            $tab = array($row['nom'], $row['sexe'], $row['race'], $row['region'], $row['age']);
        }
        return $tab;
    }

    function SelectedSexe($selected){
        if ($selected == "M"){
            echo "<label> Sexe :  Masculin </label>
            <input  type='radio' value='M' checked name='sexe'>
            <label> Féminin </label>
            <input  type='radio' value='F' name='sexe'>
            <label> Inconnu </label>
            <input  type='radio' value='I' name='sexe'>";
        }
        else if ($selected == "F"){
            echo "<label> Sexe :  Masculin </label>
            <input  type='radio' value='M' name='sexe'>
            <label> Féminin </label>
            <input  type='radio' value='F' checked name='sexe'>
            <label> Inconnu </label>
            <input  type='radio' value='I' name='sexe'>";
        }
        else{
            echo "<label > Sexe :  Masculin </label>
            <input type='radio' value='M' name='sexe'>
            <label > Féminin </label>
            <input type='radio' value='F' name='sexe'>
            <label > Inconnu </label>
            <input type='radio' name='sexe' value='I' checked>";
        }
        
    }
?>
