<?
function executeQuery($query)
{
    $conn = new mysqli(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PWD'), getenv('DB_NAME'));
    if ($conn->connect_error) die("Connection failed: ".$conn->connect_error);

    $result = $conn->query($query);
    if (!$result) die("Query failed: ".$conn->error);

    $conn->close();
    return $result;
}

$aboutme = executeQuery("SELECT * FROM aboutme")->fetch_all()[0];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title><?=$aboutme[0]?> <?=$aboutme[1]?></title>
    <link rel="stylesheet"
          href="style.css">
    <link rel="stylesheet" 
          href="debug.css">
</head>
<header id="header"
        class="portfolio-area"
        style="padding-top: 0; 
               height: 93vh"> <!-- style exception for scroll-snap-align work correctly -->
    <div id="header-illustrator">
        <!-- TODO IMAGE D'ILLUSTRATION -->
    </div>
    <div id="header-title">
        <span><?=$aboutme[0]?></span>
        <span><?=$aboutme[1]?></span>
    </div>
</header>
<header id="nav-bar">
    <div id="icon">
        <img src="data:image/png;base64,<?=$aboutme[2]?>" 
                alt="website-icon">
    </div>
    <nav>
        <div id="nav-home" 
                class="nav-button"> 
            <span>ACCUEIL</span>
        </div>
        <div id="nav-projects"
                class="nav-button">
            <span>PROJETS</span>
        </div>
        <div id="nav-skills"
                class="nav-button">
            <span>COMPETENCES</span>
        </div>
        <div id="nav-contact"
                class="nav-button">
            <span>CONTACT</span>
        </div>
    </nav>
</header>
<body>
    <div id="about-me"
         class="portfolio-area">
        <div id="about-illustrator">
            <!-- TODO IMAGE D'ILLUSTRATION -->
        </div>
        <div id="about-description">
            <span><?=$aboutme[5]?></span>
        </div>
    </div>

    <!-- Display all projects i maked -->
    <?
        // Generation of projects blocks
        ob_start();
        foreach (executeQuery("SELECT * FROM projects")->fetch_all() as $project)
        {
            echo '<div class="project-cell">';
            echo '    <div class="project-cell-illustration"><img src="data:image/png;base64,'.$project[1].'"></div>';
            echo '    <div class="project-cell-description">';
            echo '        <h1>'.$project[0].'</h1>';
            echo '        <h2>Description : </h2>';
            echo '        <span>'.$project[2].'</span>';
            echo '    </div>';
            echo '    <div class="project-cell-links">';
            
            foreach (executeQuery("SELECT * FROM social_media WHERE name='".$project[1]."';")->fetch_all() as $social_media)
            {
                echo '        <a href="'.$social_medias[3].'"><img src="data:image/png;base64,'.$social_media[2].'></a>';
            }
            
            echo '    </div>';
            echo '</div>';
        }
        $html_projects = ob_get_contents();
        ob_end_clean();
    ?>
    <div id="projects"
         class="portfolio-area">
        <h1 id="projects-title">Mes projets</h1>
        <div id="projects-cells">
            <?=$html_projects?>
        </div>
    </div>

    <!-- Display academic achievements and pro experience -->
    <div id="skills"
         class="portfolio-area">
        <?
            ob_start();
            foreach (executeQuery("SELECT * FROM academic_achievements")->fetch_all() as $academic_achievement)
            {
                echo '<div>';
                echo '    <div><img src="data:image/png;base64,'.$academic_achievement[5].'"></div>';
                echo '    <div>';
                echo '        <h1>'.$academic_achievement[2].'</h1>';
                echo '        <h2>'.$academic_achievement[0].'</h2>';
                echo '        <h3>'.$academic_achievement[3].'</h3>';
                
                echo '    </div>';
                echo '</div>';
            }
            $html_academic_achievements = ob_clean();
        ?>
        <h1>Diplômes</h1>
        <div id="academic_achievements">
            <?=$html_academic_achievements?>
        </div>

        <?
            ob_start();
            $html_professional_experiences = ob_clean();
        ?>
        <h1>Expériences proffesionnel</h1>
        <div id="professional_experiences">
            <?=$html_professional_experiences?>
        </div>
    </div>

    <div id="contact"
         class="portfolio-area">

    </div>
</body>
<footer>
    
</footer>
</html>
