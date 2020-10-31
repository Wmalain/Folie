<?php

function displaymovie()
{
    global $db;

    // $sql = $db->query('SELECT * FROM movie order by RAND() limit 0,1');
    $sql = $db->query('SELECT * FROM movie LEFT JOIN age ON movie.id_age = age.id LEFT JOIN date ON movie.id_date = date.id LEFT JOIN genre_de_film ON movie.id_genre = genre_de_film.id LEFT JOIN type_de_film ON movie.id_type1 = type_de_film.id order by RAND() limit 0,1');
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $sql->fetch()) {
        ?>

<div class="movie-card">
        <div class="poster-wrapper">
          <div class="poster">
          <img src="assets/uploads/<?php echo $row['affiche']; ?>" alt="affiche">
          </div>
        </div>
        <!-- end poster-wrapper -->
        <div class="movie-info">
          <div class="header-section">
            <h1 class="titrefilm"><?php echo $row['titre']; ?></h1>
            <p><?php echo $row['realisateur']; ?> </p>
            <p><?php echo $row['genre']; ?></p>
            <p><?php echo $row['decennie']; ?>   /   <?php echo $row['age']; ?></p>
            <p><?php echo $row['type']; ?></p>
          </div>
        
          <div class="synopsis-section">
            <h2>SYNOPSIS</h2>
            <p>
            <?php echo $row['synopsis']; ?>
            </p>
          </div>
          <a href="<?php echo $row['lien']; ?>" class="btnimdb">IMDB</a>

        </div>
      </div>
      <!-- end movie-card -->
   
        <?php
    }
}

function displaymoviegenre($id)
{
    global $db;
    $sql = $db->query("SELECT * FROM movie LEFT JOIN age ON movie.id_age = age.id LEFT JOIN date ON movie.id_date = date.id LEFT JOIN genre_de_film ON movie.id_genre = genre_de_film.id LEFT JOIN type_de_film ON movie.id_type1 = type_de_film.id   WHERE id_genre = {$id} order by RAND() limit 0,1");
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $sql->fetch()) {
        ?>
   <div class="movie-card">
        <div class="poster-wrapper">
          <div class="poster">
          <img src="assets/uploads/<?php echo $row['affiche']; ?>" alt="affiche">
          </div>
        </div>
        <div class="movie-info">
          <div class="header-section">
            <h1 class="titrefilm"><?php echo $row['titre']; ?></h1>
            <p><?php echo $row['realisateur']; ?> </p>
            <p><?php echo $row['genre']; ?></p>
            <p><?php echo $row['decennie']; ?>   /   <?php echo $row['age']; ?></p>
            <p><?php echo $row['type']; ?></p>
          </div>
        
          <div class="synopsis-section">
            <h2>SYNOPSIS</h2>
            <p>
            <?php echo $row['synopsis']; ?>
            </p>
          </div>
          <a href="<?php echo $row['lien']; ?>" class="btnimdb">IMDB</a>

        </div>
      </div>
   
        <?php
    }
}

function displaymovieenvie($id)
{
    global $db;
    $sql = $db->query("SELECT * FROM movie LEFT JOIN age ON movie.id_age = age.id LEFT JOIN date ON movie.id_date = date.id LEFT JOIN genre_de_film ON movie.id_genre = genre_de_film.id LEFT JOIN type_de_film ON movie.id_type1 = type_de_film.id   WHERE movie.id_type1 = {$id} order by RAND() limit 0,1");
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $sql->fetch()) {
        ?>
   <div class="movie-card">
        <div class="poster-wrapper">
          <div class="poster">
          <img src="assets/uploads/<?php echo $row['affiche']; ?>" alt="affiche">
          </div>
        </div>
        <div class="movie-info">
          <div class="header-section">
            <h1 class="titrefilm"><?php echo $row['titre']; ?></h1>
            <p><?php echo $row['realisateur']; ?> </p>
            <p><?php echo $row['genre']; ?></p>
            <p><?php echo $row['decennie']; ?>   /   <?php echo $row['age']; ?></p>
            <p><?php echo $row['type']; ?></p>
          </div>
        
          <div class="synopsis-section">
            <h2>SYNOPSIS</h2>
            <p>
            <?php echo $row['synopsis']; ?>
            </p>
          </div>
          <a href="<?php echo $row['lien']; ?>" class="btnimdb">IMDB</a>

        </div>
      </div>
   
        <?php
    }
}

function displaymovieage($id)
{
    global $db;
    $sql = $db->query("SELECT * FROM movie LEFT JOIN age ON movie.id_age = age.id LEFT JOIN date ON movie.id_date = date.id LEFT JOIN genre_de_film ON movie.id_genre = genre_de_film.id LEFT JOIN type_de_film ON movie.id_type1 = type_de_film.id  WHERE age.id = {$id} order by RAND() limit 0,1");
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $sql->fetch()) {
        ?>
 <div class="movie-card">
        <div class="poster-wrapper">
          <div class="poster">
          <img src="assets/uploads/<?php echo $row['affiche']; ?>" alt="affiche">
          </div>
        </div>
        <div class="movie-info">
          <div class="header-section">
            <h1 class="titrefilm"><?php echo $row['titre']; ?></h1>
            <p><?php echo $row['realisateur']; ?> </p>
            <p><?php echo $row['genre']; ?></p>
            <p><?php echo $row['decennie']; ?>   /   <?php echo $row['age']; ?></p>
            <p><?php echo $row['type']; ?></p>
          </div>
        
          <div class="synopsis-section">
            <h2>SYNOPSIS</h2>
            <p>
            <?php echo $row['synopsis']; ?>
            </p>
          </div>
          <a href="<?php echo $row['lien']; ?>" class="btnimdb">IMDB</a>

        </div>
      </div>
   
        <?php
    }
}

function searchmovie()
{
    // Ouvre une connexion au serveur MySQL
    if (isset($_POST['search'])) {
        global $db;

        // $conn = mysqli_connect('localhost', 'root', '', 'gom');

        $recherche = $_POST['recherche'];

        $sql = $db->query("SELECT * FROM movie WHERE titre LIKE '%".$recherche."%'");
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        if ($sql->execute()) {
            while ($row = $sql->fetch()) {
                ?>

</br>
    <div class="tab">
      <table class="tabgen">
        <tr>
          <td> <p class="tabmov1"> <?php echo $row['titre']; ?> </p></td> 
          <td> <p class="tabmov2"> <?php echo $row['realisateur']; ?> </p></td>
          <td><a class="btnad1" href="modify_movie.php?id=<?php echo $row['id']; ?> "><i class="fas fa-video"></i></a></td>
          <td><a class="btnad2" href="delete_movie.php?id=<?php echo $row['id']; ?> "><i class="fas fa-trash-alt"></i></a></td>
          </br>
        </tr>
      </table> 
    </div>
           
       
    <?php
            }
        }
    }
}?>
