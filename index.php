<?php
$lang = $_GET['lang'] ?? 'fr';
$isAr = $lang === 'ar';
$dir = $isAr ? 'rtl' : 'ltr';
$home = 'index.php?lang=' . ($isAr ? 'ar' : 'fr');
$contact = 'contact.php?lang=' . ($isAr ? 'ar' : 'fr');
?>
<!doctype html>
<html lang="<?= $isAr ? 'ar' : 'fr' ?>" dir="<?= $dir ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INSEA - Site institutionnel</title>
    <link rel="stylesheet" href="style.css">
    <script src="app.js" defer></script>
    <link rel="icon" type="image/png" href="images/favicon.png">
</head>
<body>
    <header class="topbar">
        <div class="container topbar-inner">
            <img src="images/logo.png" alt="INSEA Logo" class="logo-img">
            <input type="search" placeholder="<?= $isAr ? 'بحث...' : 'Recherche...' ?>">
            <select><option><?= $isAr ? 'ولوج سريع' : 'Acces direct' ?></option></select>
            <nav class="quick-links">
                <a href="<?= $home ?>"><?= $isAr ? 'الرئيسية' : 'Accueil' ?></a>
                <a href="#actualites"><?= $isAr ? 'الأخبار' : 'Actualites' ?></a>
                <a href="#pedagogie"><?= $isAr ? 'الطلبة' : 'Etudiants' ?></a>
                <a href="<?= $contact ?>"><?= $isAr ? 'اتصال' : 'Contact' ?></a>
                <a href="index.php?lang=fr">FR</a>
                <a href="index.php?lang=ar">AR</a>
            </nav>
        </div>
    </header>
    
    <section class="brand-strip"><div class="container brand-inner"><div class="brand-block"><strong>INSEA</strong><span><?= $isAr ? 'المعهد الوطني للإحصاء والاقتصاد التطبيقي' : "Institut National de Statistique et d'Economie Appliquee" ?></span></div><div class="socials"><b></b><b></b><b></b><b></b></div></div></section>
    <nav class="main-nav"><div class="container nav-grid"><div class="dropdown">
    <a href="#">INSEA</a>

    <div class="submenu">
        <a href="#">Présentation</a>
        <a href="#">L'INSEA en chiffres</a>
        <a href="#">Infrastructures</a>
        <a href="#">Corps Enseignant</a>
        <a href="#">Publications INSEA</a>
        <a href="#">Admission</a>
    </div>
</div><a href="#pedagogie">PROGRAMME</a><a href="#partenaires">PARTENAIRES</a><a href="#vie">VIE ESTUDIANTINE</a></div></nav>
    <main>
        <section class="hero"><div class="container hero-grid"><div class="hero-copy"><h1><?= $isAr ? 'إعلان مناقشة أطروحة دكتوراه' : 'Avis de soutenance de these doctorale' ?></h1><p><?= $isAr ? 'بوابة مؤسساتية للمعهد مع الأخبار والتدبير البيداغوجي والتواصل.' : "Site institutionnel de l'INSEA avec actualites, gestion pedagogique, agenda et contact." ?></p><a href="#actualites"><?= $isAr ? 'اقرأ المزيد' : 'Lire la suite' ?></a></div><div class="hero-photo"><div class="building"></div></div></div></section>
        <div class="container breadcrumb"><?= $isAr ? 'أنت هنا : الرئيسية' : 'Vous etes ici : Accueil' ?></div>

        <section class="container layout">
            <div class="content">
                <h2 id="actualites"><?= $isAr ? 'أخبار المعهد' : 'Actualites INSEA' ?></h2>
                <article class="featured-news" id="event-22"><div class="thumb campus"></div><div><h3><?= $isAr ? 'إعلان مناقشة أطروحة' : 'Avis de soutenance de these de doctorat' ?></h3><p><?= $isAr ? 'مناقشة دكتوراه يوم 22 أبريل 2026.' : "Une soutenance doctorale aura lieu a l'INSEA le 22 Avril 2026." ?></p><a href="<?= $contact ?>"><?= $isAr ? 'اتصل بالإدارة' : "Contacter l'administration" ?></a></div></article>
                <div class="news-grid">
                    <article id="event-2" class="news-card"><div class="thumb small-campus"></div><time>2 Avril 2026</time><h3>Conference Data Science</h3><p>Conference scientifique autour des donnees.</p><a href="#agenda">Voir agenda</a></article>
                    <article id="event-7" class="news-card"><div class="thumb small-campus"></div><time>7 Avril 2026</time><h3>Forum INSEA Entreprises</h3><p>Rencontre entre etudiants et recruteurs.</p><a href="#agenda">Voir agenda</a></article>
                    <article class="news-card"><div class="thumb small-campus"></div><time>22 Avril 2026</time><h3>Soutenance doctorale</h3><p>Annonce officielle de soutenance.</p><a href="#event-22">Lire la suite</a></article>
                </div>
                <div class="info-grid"><article id="presentation"><h3>CREATION</h3><p>Cree en 1961, l'INSEA forme des cadres dans les statistiques, l'economie appliquee, l'informatique et la data science.</p><a href="#localisation">Localisation</a></article><article><h3>MISSION</h3><p>L'institut assure la formation d'ingenieurs, la recherche appliquee et l'expertise scientifique.</p><a href="#pedagogie">Voir programme</a></article><article><h3>ORGANISATION</h3><p>L'INSEA est organise autour de filieres, laboratoires et services pedagogiques.</p><a href="#recherche">Voir recherche</a></article></div>
            </div>
            <aside class="sidebar">
                <div class="tabs"><button type="button">INSEA en video</button><button type="button">INSEA en images</button></div>
                <section class="agenda" id="agenda"><h3>Agenda</h3><div class="month">Avril 2026</div><table><tr><th>D</th><th>L</th><th>M</th><th>M</th><th>J</th><th>V</th><th>S</th></tr><?php for ($day = 1; $day <= 35; $day += 7): ?><tr><?php for ($i = 0; $i < 7; $i++): $d = $day + $i; ?><td><?php if ($d <= 30): ?><button class="<?= $d === 22 ? 'today has-event' : (($d === 2 || $d === 7) ? 'has-event' : '') ?>" data-agenda-day="<?= $d ?>"><?= $d ?></button><?php endif; ?></td><?php endfor; ?></tr><?php endfor; ?></table><div class="agenda-details" data-agenda-details><strong>22 Avril 2026</strong><span>Soutenance doctorale a l'INSEA.</span></div></section>
                <form class="newsletter"><h3>Newsletter</h3><input type="email" placeholder="Email"><button>S'abonner</button></form>
            </aside>
        </section>

        <section class="pedagogy container" id="pedagogie"><h2>Gestion pedagogique</h2><div class="schema"><div>FILIERES</div><span></span><div>NIVEAUX</div><span></span><div>SEMESTRES</div><span></span><div>PERIODES</div><span></span><div>SEMAINES</div></div><div class="schema"><div>SEMESTRES</div><span></span><div>MODULES</div><span></span><div>MATIERES</div><span></span><div>MATIERE_ENSEIGNEMENT</div><span></span><div>TYPES_ENSEIGNEMENT</div></div><h2>Base de donnees pedagogique</h2><div class="tables"><article class="data-table"><h3>Annees scolaires</h3><table><tr><th>ID</th><th>Libelle</th></tr><tr><td>1</td><td>2025-2026</td></tr><tr><td>2</td><td>2026-2027</td></tr></table></article><article class="data-table"><h3>Filieres</h3><table><tr><th>ID</th><th>Nom</th><th>Code</th></tr><tr><td>1</td><td>Data and Software Engineering</td><td>DSE</td></tr><tr><td>2</td><td>Data Science</td><td>DS</td></tr></table></article></div></section>
        <section class="container services-grid"><article id="recherche"><h2>Recherche</h2><p>Laboratoires, projets et publications.</p><a href="<?= $contact ?>">Demander des informations</a></article><article id="stage"><h2>Stage</h2><p>Offres, conventions et suivi des stages.</p><a href="<?= $contact ?>">Contacter le service stage</a></article><article id="partenaires"><h2>Partenaires</h2><p>Institutions et entreprises partenaires.</p><a href="<?= $contact ?>">Proposer un partenariat</a></article><article id="vie"><h2>Vie estudiantine</h2><p>Clubs et activites etudiantes.</p><a href="<?= $contact ?>">Voir les activites</a></article><article id="cid"><h2>CID</h2><p>Documentation et ressources numeriques.</p><a href="<?= $contact ?>">Contacter le CID</a></article><article id="laureats"><h2>Laureats</h2><p>Reseau des anciens et carrieres.</p><a href="<?= $contact ?>">Rejoindre le reseau</a></article></section>
        <section class="container location-section" id="localisation"><h2>Localisation de l'INSEA</h2><div class="location-grid"><div><h3>Adresse</h3><p>Institut National de Statistique et d'Economie Appliquee, Madinat Al Irfane, Rabat, Maroc.</p><p>Tel : (212) 05 37 77 45 59</p><a class="map-link" href="https://www.openstreetmap.org/search?query=INSEA%20Rabat" target="_blank" rel="noopener">Ouvrir dans OpenStreetMap</a></div><iframe title="Localisation INSEA Rabat" src="https://www.openstreetmap.org/export/embed.html?bbox=-6.880%2C33.970%2C-6.850%2C34.005&layer=mapnik&marker=33.986%2C-6.865"></iframe></div></section>
    </main>
    <footer class="footer"><div class="container footer-grid"><section><h3>Decouvrir l'INSEA</h3><a href="#presentation">Presentation</a><a href="#pedagogie">Classes</a><a href="#recherche">Recherche</a></section><section><h3>Formation</h3><a href="#pedagogie">Programme</a><a href="#stage">Stages</a><a href="#pedagogie">Formation</a></section><section><h3>Anciens</h3><a href="#laureats">Pre-inscription</a><a href="#vie">Vie etudiante</a><a href="#laureats">Laureats</a></section><section><h3>Contact</h3><p>INSEA, Rabat, Maroc</p><p>Email : contact@insea.ac.ma</p><a class="map-link" href="#localisation">Voir la localisation</a></section></div></footer>
</body>
</html>
