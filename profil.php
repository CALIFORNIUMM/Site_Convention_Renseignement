<?php
$title = "Profil";
include('header.php');
$dao = New StageDAO();
$stages = $dao->findAllByIdEtudiant($_SESSION['Etudiant']->get_idEtudiant());

$entreprisedao = New EntrepriseDAO();
$entreprisedao=$entreprisedao->findAll();

$profdao = New ProfDAO();
$profdao=$profdao->findAll();

$anneedao = New AnneeScolaireDAO();
$anneedao=$anneedao->findAll();

?>
 <table>
      <tr>
        <th>Entreprise</th>
        <th>Date de début</th>
        <th>Date de fin</th>
        <th>Enseignant référant</th>
        <th>Durant l'année</th>
        <th>PDF</th>
      </tr>
      <tr>
        <?php
          foreach($stages as $stage){ 
            echo "<tr>";

            foreach($entreprisedao as $entreprise){
              if($stage->get_idEnt() == $entreprise->get_idEnt()){
                  echo "<td>".$entreprise->get_nomEnt()."</td>";
              }
            }

            echo "<td>".$stage->get_dateDebutStage()."</td>";
            echo "<td>".$stage->get_dateFinStage()."</td>";

            foreach($profdao as $prof){
              if($stage->get_idProf() == $prof->get_idProf()){
                  echo "<td>".$prof->get_nomProf()." ".$prof->get_prenomProf()."</td>";
              }
            }

            foreach($anneedao as $annee){
              if($stage->get_idAnneeScolaire() == $annee->get_idAnneeScolaire()){
                  echo "<td>".$annee->get_libAnneeScolaire()."</td>";
              }
            }
            echo '<td><a href="pdf_fiche_renseignement.php?id='.$stage->get_idStage().'">PDF</a></td>';

            echo "</tr>";
          }
        ?>
    </table>
  </body>
</html>
<?php
include('footer.php'); // touchew
?>