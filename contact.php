<?php
$lang = $_GET['lang'] ?? 'fr';
$isAr = $lang === 'ar';
$dir = $isAr ? 'rtl' : 'ltr';
$sent = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $sujet = trim($_POST['sujet'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $copie = isset($_POST['copie']) ? 1 : 0;

    if ($nom === '' || $email === '' || $sujet === '' || $message === '') {
        $error = 'Tous les champs obligatoires doivent etre remplis.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Adresse email invalide.';
    } else {
        require __DIR__ . '/db.php';
        $stmt = $pdo->prepare('INSERT INTO messages_contact (nom, email, sujet, message, copie_email) VALUES (:nom, :email, :sujet, :message, :copie_email)');
        $stmt->execute([':nom' => $nom, ':email' => $email, ':sujet' => $sujet, ':message' => $message, ':copie_email' => $copie]);
        $sent = true;
    }
}

$home = 'index.php?lang=' . ($isAr ? 'ar' : 'fr');
$contactAction = 'contact.php?lang=' . ($isAr ? 'ar' : 'fr');
?>
<!doctype html>
<html lang="<?= $isAr ? 'ar' : 'fr' ?>" dir="<?= $dir ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact - INSEA</title>
    <link rel="stylesheet" href="style.css">
    <script src="app.js" defer></script>
</head>
<body>
    <header class="topbar"><div class="container topbar-inner"><div class="logo-mark"><span></span><span></span><span></span></div><input type="search" placeholder="<?= $isAr ? 'بحث...' : 'Recherche...' ?>"><select><option><?= $isAr ? 'ولوج سريع' : 'Acces direct' ?></option></select><nav class="quick-links"><a href="<?= $home ?>"><?= $isAr ? 'الرئيسية' : 'Accueil' ?></a><a href="<?= $home ?>#actualites"><?= $isAr ? 'الأخبار' : 'Actualites' ?></a><a href="<?= $home ?>#pedagogie"><?= $isAr ? 'الطلبة' : 'Etudiants' ?></a><a href="contact.php?lang=fr">FR</a><a href="contact.php?lang=ar">AR</a></nav></div></header>
    <section class="brand-strip"><div class="container brand-inner"><div class="brand-block"><strong>INSEA</strong><span><?= $isAr ? 'المعهد الوطني للإحصاء والاقتصاد التطبيقي' : "Institut National de Statistique et d'Economie Appliquee" ?></span></div><div class="socials"><b></b><b></b><b></b><b></b></div></div></section>
    <nav class="main-nav"><div class="container nav-grid"><a href="<?= $home ?>#presentation">INSEA</a><a href="<?= $home ?>#pedagogie">PROGRAMME</a><a href="<?= $home ?>#recherche">RECHERCHE</a><a href="<?= $home ?>#stage">STAGE</a><a href="<?= $home ?>#partenaires">PARTENAIRES</a><a href="<?= $home ?>#vie">VIE ESTUDIANTINE</a><a href="<?= $home ?>#cid">CID</a><a href="<?= $home ?>#laureats">LAUREATS</a></div></nav>
    <section class="hero compact-hero"><div class="container hero-grid"><div class="hero-copy"><h1><?= $isAr ? 'اتصال' : 'Contact' ?></h1><p><?= $isAr ? 'موقع المعهد واستمارة للتواصل مع الإدارة.' : "Retrouvez la localisation de l'INSEA et envoyez votre message a l'administration." ?></p></div><div class="hero-photo"><div class="building"></div></div></div></section>
    <div class="container breadcrumb"><?= $isAr ? 'الرئيسية / اتصال' : 'Vous etes ici : Accueil / Contact' ?></div>

    <main class="container contact-layout">
        <aside class="contact-left"><form class="newsletter"><h3>Newsletter</h3><input type="email" placeholder="Email"><button>S'abonner</button></form><section class="side-box"><h3>Derniers evenements</h3><p>Aucun evenement</p></section></aside>
        <section class="contact-main">
            <h2>INSEA</h2>
            <?php if ($sent): ?><p class="success">Votre message a ete enregistre avec succes.</p><?php endif; ?>
            <?php if ($error !== ''): ?><p class="error"><?= htmlspecialchars($error) ?></p><?php endif; ?>
            <div class="contact-columns">
                <article class="contact-info"><h3>Localisation</h3><iframe class="contact-map" title="Localisation INSEA Rabat" src="https://www.openstreetmap.org/export/embed.html?bbox=-6.880%2C33.970%2C-6.850%2C34.005&layer=mapnik&marker=33.986%2C-6.865"></iframe><p>Institut National de Statistique et d'Economie Appliquee<br>Madinat Al Irfane, Rabat, Maroc<br>BP 6217</p><p>Tel : (212) 05 37 77 45 59<br>Fax : (212) 05 37 77 94 57</p><a class="map-link" href="https://www.openstreetmap.org/search?query=INSEA%20Rabat" target="_blank" rel="noopener">Ouvrir la localisation</a></article>
                <form class="contact-form" method="post" action="<?= $contactAction ?>"><h3>Formulaire de contact</h3><p>Tous les champs avec * sont obligatoires. Les donnees seront visibles dans la table messages_contact.</p><label>Nom *</label><input type="text" name="nom" required><label>Email *</label><input type="email" name="email" required><label>Sujet *</label><input type="text" name="sujet" required><label>Message *</label><textarea name="message" rows="8" required></textarea><label class="checkbox-line">Envoyer une copie a votre adresse <input type="checkbox" name="copie"></label><button type="submit">Envoyer</button></form>
            </div>
        </section>
    </main>
</body>
</html>
