<?php
$path = __DIR__ . '/../config/database.php';
echo "Chemin calculé : $path\n";

if (!file_exists($path)) {
    die("❌ Le fichier n'existe pas à cet emplacement !");
}

require_once $path;
echo "✅ Fichier database.php inclus avec succès !";


// Connexion à MySQL

// $filmTags = [
//     [1, 1], // Les Sabots de Vénus → Long métrage
//     [1, 4], // Les Sabots de Vénus → Nominé
//     [2, 5], // L'Aile et la Bête → Court métrage
//     [2, 4], // L'Aile et la Bête → Nominé
//     [2, 2], // L'Aile et la Bête → Documentaire
//     [3, 5], // Le Radeau → Court métrage
//     [4, 1], // Aventure sur la Rivière Blanche → Long métrage
//     [4, 4], // Aventure sur la Rivière Blanche → Nominé
//     [5, 1], // Les Chemins de l’Or Blanc → Long métrage
//     [5, 2], // Les Chemins de l’Or Blanc → Documentaire
//     [5, 6], // Les Chemins de l’Or Blanc → En production
//     [6, 3]  // Hay Qué → Clip musical
// ];

// $stmt = $pdo->prepare("INSERT INTO film_tag (film_id, tag_id) VALUES (?, ?)");
// foreach ($filmTags as $filmTag) {
//     $stmt->execute($filmTag);
// }
// echo "✅ Relations films/tags insérées avec succès !\n";


// // 1️⃣ INSÉRER LES FILMS
// $stmt = $pdo->prepare("INSERT INTO films (id, title, subtitle, release_date, description, synopsis, slug) 
// VALUES (?, ?, ?, ?, ?, ?, ?)");

// $films = [
//   [1, "Les Sabots de Vénus", "Sélection Festival de Cannes", "2003", 
//       "Un clin d’oeil malicieux sur la santé et l’affaire du sang contaminé au milieu de paysages magnifiques dans les sept plus belles régions de France",
//       "Un film qui explore les implications éthiques et sociales de l’affaire du sang contaminé. À travers des paysages grandioses, le réalisateur plonge le spectateur dans une réflexion sur la responsabilité et la justice.",
//       "/films/les-sabots-de-venus"],
  
//   [2, "L'Aile et la Bête", "Un James Bond à la Jimmy-Paul Coti", "2021-09-10",
//       "Un film d’action explosif avec une mise en scène inspirée des plus grands films d’espionnage.",
//       "Ce thriller intense suit un agent secret pris dans une course contre la montre pour empêcher un complot international. Avec des scènes aériennes spectaculaires, il rend hommage aux plus grands films d’espionnage.",
//       "/films/l-aile-et-la-bete"],

//   [3, "Le Radeau", "Un court-métrage d'aventure", "?",
//       "Un exploit cinématographique où le réalisateur prend la place du cascadeur bravant les dangers du grand canyon du Verdon.",
//       "Le réalisateur embarque sur un radeau fragile pour traverser les eaux tumultueuses du Verdon, repoussant les limites du cinéma d’aventure.",
//       "/films/le-radeau"],

//   [4, "Aventure sur la Rivière Blanche", "Un western à la française", "?",
//       "Une fuite désespérée, un hiver implacable, un trappeur énigmatique… Vingt ans plus tard, la rivière révélera son dernier secret.",
//       "Dans une nature sauvage et glaciale, un fugitif tente de survivre face aux éléments et à ses poursuivants. Un western atypique qui plonge le spectateur dans un suspense haletant.",
//       "/films/Aventure-sur-la-Rivière-Blanche"],

//   [5, "LES CHEMINS DE L’OR BLANC", "Un film documentaire collaboratif", "En production",
//       "Un film documentaire romancé sur l'exploitation du sel en Camargue.",
//       "Entre traditions ancestrales et enjeux contemporains, ce documentaire explore l’exploitation du sel en Camargue et la vie des hommes qui en dépendent.",
//       "/films/les-chemins-de-l-or-blanc"],

//   [6, "Hay Qué", "Un clip musical réalisé par cg-film", "?",
//       "Le premier clip musical de cg-film à la demande de Grizzlyprod avec la chanteuse Marie Dazzler.",
//       "Un clip captivant réalisé pour la talentueuse chanteuse Marie Dazzler, où la musique et l’image fusionnent pour raconter une histoire vibrante et émotive.",
//       "/films/hay-que"]
// ];


// foreach ($films as $film) {
//     $stmt->execute($film);
// }

// $stmt = $pdo->prepare("INSERT INTO partners (id, name, logo, image_alt) 
// VALUES (?, ?, ?, ?)");

// $partners = [
//     [1, "CANAL+", "/images/partners/canal+.webp", "Logo de Canal+"],
//     [2, "Canal J", "/images/partners/canalj.webp", "Logo de Canal J"],
//     [3, "CNC", "/images/partners/cnc.webp", "Logo du CNC"],
//     [4, "Dpt Bouches-du-Rhône", "/images/partners/dpt_bouches_rhone.webp", "Logo du département des Bouches-du-Rhône"],
//     [5, "EITB", "/images/partners/eitb.webp", "Logo de EITB"],
//     [6, "France 3 Méditerranée", "/images/partners/F3_mediterranee.webp", "Logo de France 3 Méditerranée"],
//     [7, "France 3", "/images/partners/F3.webp", "Logo de France 3"],
//     [8, "France 2", "/images/partners/fr2.webp", "Logo de France 2"],
//     [9, "France Bleue", "/images/partners/france_bleue.webp", "Logo de France Bleue"],
//     [10, "France Media", "/images/partners/france_media.webp", "Logo de France Média"],
//     [11, "France Télévision", "/images/partners/france_television.webp", "Logo de France Télévisions"],
//     [12, "France TV", "/images/partners/france_tele.webp", "Logo de France TV"],
//     [13, "Hachette", "/images/partners/hachette.webp", "Logo de Hachette"],
//     [14, "Procirep", "/images/partners/procirep.webp", "Logo de la Procirep"],
//     [15, "Radio Camargue", "/images/partners/radio_camargue.webp", "Logo de Radio Camargue"],
//     [16, "RTBF", "/images/partners/rtbf.webp", "Logo de RTBF"],
//     [17, "SACD", "/images/partners/sacd.webp", "Logo de la SACD"],
//     [18, "Salins", "/images/partners/salins.webp", "Logo de Salins"],
//     [19, "SCAM", "/images/partners/scam.webp", "Logo de la SCAM"],
//     [20, "SOLVAY", "/images/partners/solvay.webp", "Logo de Solvay"],
//     [21, "TF1", "/images/partners/tf1.webp", "Logo de TF1"],
//     [22, "TMC", "/images/partners/tmc.webp", "Logo de TMC"],
//     [23, "Unimage", "/images/partners/unimage.webp", "Logo de Unimage"]
// ];

// foreach ($partners as $partner) {
//     $stmt->execute($partner);
// }

// echo "✅ Partenaires insérés avec succès !";


// // 2️⃣ INSÉRER LES VIDÉOS
// $stmt = $pdo->prepare("INSERT INTO film_videos (film_id, video_type, video_thumbnail, video_src, embed_url, video_id) 
// VALUES (?, ?, ?, ?, ?, ?)");

// $film_videos = [
//     // 🎬 Les Sabots de Vénus
//     [1, "mp4", "/images/sdv/thumbnail_sdv.webp", "/videos/sabots_de_venus.mp4", NULL, NULL],
//     [1, "youtube", NULL, NULL, "https://www.youtube.com/embed/fdCmZEv1LLU", "fdCmZEv1LLU"],

//     // 🎬 L'Aile et la Bête
//     [2, "youtube", NULL, NULL, "https://www.youtube.com/embed/WfNqy_tRNcc", "WfNqy_tRNcc"],
//     [2, "mp4", "/images/aile_bete/thumbnail_aile_bete.webp", "/videos/Aile-et-la-Bete.mp4", NULL, NULL],

//     // 🎬 Le Radeau
//     [3, "youtube", NULL, NULL, "https://www.youtube.com/embed/F4S2cXmHizc", "F4S2cXmHizc"],
//     [3, "mp4", "/images/thumbnail_radeau.webp", "/videos/radeau.mp4", NULL, NULL],

//     // 🎬 Aventure sur la Rivière Blanche
//     [4, "mp4", "/images/riviere/thumbnail_riviere.webp", "/videos/aventure_riviere_blanche.mp4", NULL, NULL],

//     // 🎬 Les Chemins de l'Or Blanc
//     [5, "mp4", "/videos/videoThumbnail.mp4", "/videos/chemins_or_blanc.mp4", NULL, NULL],

//     // 🎬 Hay Qué
//     [6, "mp4", "/images/hay_que/thumbnail_hay_que.webp", "/videos/hay_que.mp4", NULL, NULL]
// ];

// foreach ($film_videos as $video) {
//     $stmt->execute($video);
// }

// echo "✅ Vidéos insérées avec succès !";

// $stmt = $pdo->prepare("INSERT INTO actors (id, name) VALUES (?, ?)");

// $actors = [
//     [1, "Christian Barbier"],
//     [2, "Jean-Paul Egalon"],
//     [3, "Pierre Magré"],
//     [4, "Marc Gallier"],
//     [5, "Jean Nerh"],
//     [6, "Paul Silve"],
//     [7, "Antoine Coessens"],
//     [8, "Myrtille Buttner"],
//     [9, "Grégory Knop"],
//     [10, "Michel Rasmus"],
//     [11, "Rémy Ventura"],
//     [12, "Gérard Dubouche"],
//     [13, "Jean-Pierre Duru"],
//     [14, "Christian Javoy"],
//     [15, "André Rolland"],
//     [16, "Joëlle Olivier"],
//     [17, "Norbert Sammut"],
//     [18, "Anne-Marie Ponsot"],
//     [19, "Francine Mouraux"],
//     [20, "Jacques Mouraux"],
//     [21, "Jacques Chauvin"],
//     [22, "Dany Castaing"],
//     [23, "Isabelle Astier"],
//     [24, "Pierre Canard"],
//     [25, "Alain Ballestra"],
//     [26, "Luc Moreau"],
//     [27, "Sophie Laurent"],
//     [28, "Marie Dazzler"],
//     [29, "Arlette Ménard"],
//     [30, "Nathalie Lasserre"],
//     [31, "Jean-Pierre Coindet"],
//     [32, "Marie-Joëlle Guiol"],
//     [33, "Nicolas Coindet"],
//     [34, "Anne Coindet"],
//     [35, "Richard Aquilo"],
//     [36, "François Tolmer"],
//     [37, "Raymond Mussot"],
//     [38, "Francine Mouraux"]
// ];

// foreach ($actors as $actor) {
//     $stmt->execute($actor);
// }

// echo "✅ Acteurs insérés avec succès !";

$stmt = $pdo->prepare("INSERT INTO film_images (film_id, src, alt, type) VALUES (?, ?, ?, ?)");

$film_images = [
    // 🎬 Les Sabots de Vénus
    [1, "/images/sdv/christian_barbier_1.webp", "Christian Barbier", "photo"],
    [1, "/images/sdv/chrisitian_barbier_2.webp", "Christian Barbier", "photo"],
    [1, "/images/sdv/chrisitian_barbier_3.webp", "Christian Barbier", "photo"],
    [1, "/images/sdv/chrisitian_barbier_4.webp", "Joseph devant les tombes", "photo"],
    [1, "/images/sdv/egalon_barbier_1.webp", "Jean-Paul Egalon et Christian Barbier", "photo"],
    [1, "/images/sdv/egalon_barbier_2.webp", "Jean-Paul Egalon et Christian Barbier", "photo"],
    [1, "/images/sdv/egalon_rasmus.webp", "Jean-Paul Egalon et Michel Rasmus", "photo"],
    [1, "/images/sdv/egalon_sandy.webp", "Jean-Paul Egalon et Sandy", "photo"],
    [1, "/images/sdv/grue_tournage_sdv.webp", "Jimmy-Paul Coti et Daniel Penez", "photo"],
    [1, "/images/sdv/jp_egalon_1.webp", "Jean-Paul Egalon", "photo"],
    [1, "/images/sdv/jp_egalon_2.webp", "Jean-Paul Egalon", "photo"],
    [1, "/images/sdv/jp_egalon_3.webp", "Jean-Paul Egalon", "photo"],
    [1, "/images/sdv/knop.webp", "Gregory Knop", "photo"],
    [1, "/images/sdv/nehr_sammut.webp", "Jean Nehr et Norbert Sammut", "photo"],
    [1, "/images/sdv/sylve_nehr_coti.webp", "Paul Sylve, Jean Nehr et Jimmy-Paul Coti", "photo"],

    // 🎬 L'Aile et la Bête
    [2, "/images/aile_bete/scene_ulm.webp", "Dernier briefing avant le décollage", "photo"],
    [2, "/images/aile_bete/patrice_barcouda.webp", "Patrice Barcouda dans la tourmente", "photo"],
    [2, "/images/aile_bete/preparation.webp", "Photo-montage des étapes de préparation", "photo"],

    // 🎬 Le Radeau
    [3, "/images/radeau/jimmy_radeau_nb.webp", "Jean-Pierre Coindet descendant le Verdon", "photo"],
    [3, "/images/radeau/jimmy_radeau_sepia.webp", "Raft en radeau sur le Verdon", "photo"],
    [3, "/images/radeau/jimmy_radeau_near.webp", "Jean-Pierre Coindet s'improvise cascadeur", "photo"],
    [3, "/images/radeau/sanson.webp", "Gorges du Verdon", "photo"],

    // 🎬 Aventure sur la Rivière Blanche
    [4, "/images/riviere/alain_mallet_cadreur.webp", "Alain Mallet | Cadreur", "photo"],
    [4, "/images/radeau/francis_gome_cadreur.webp", "Francis Gome | Cadreur", "photo"],
    [4, "/images/radeau/jimmy_radeau_nb.webp", "Jean-Pierre Coindet descendant le Verdon", "photo"],
    [4, "/images/radeau/jimmy_radeau_sepia.webp", "Raft en radeau sur le Verdon", "photo"],
    [4, "/images/radeau/jimmy_radeau_near.webp", "Jean-Pierre Coindet s'improvise cascadeur", "photo"],
    [4, "/images/radeau/sanson.webp", "Gorges du Verdon", "photo"],

    // // 🎬 Les Chemins de l'Or Blanc
    // [5, "/images/chemins_or_blanc/chemin_or_blanc_affiche.webp", "Affiche du film Les Chemins de l’Or Blanc", "poster"],

    // // 🎬 Hay Qué
    // [6, "/images/hay_que/hay_que_poster.webp", "Affiche du clip Hay Qué", "poster"]
];

foreach ($film_images as $image) {
    $stmt->execute($image);
}

echo "✅ Images des films insérées avec succès !";

// $stmt = $pdo->prepare("INSERT INTO film_roles (film_id, actor_id, role) VALUES (?, ?, ?)");

// $film_roles = [
//     // 🎬 Les Sabots de Vénus
//     [1, 1, "Personnage principal"],
//     [1, 2, "Personnage secondaire"],
//     [1, 3, "Musique originale"],
//     [1, 4, "Maître Pisier"],
//     [1, 5, "?"],
//     [1, 6, "?"],
//     [1, 7, "?"],
//     [1, 8, "?"],
//     [1, 9, "?"],
//     [1, 10, "?"],
//     [1, 11, "?"],
//     [1, 12, "?"],
//     [1, 13, "?"],
//     [1, 14, "?"],
//     [1, 15, "?"],
//     [1, 16, "?"],
//     [1, 17, "?"],
//     [1, 18, "?"],
//     [1, 19, "?"],
//     [1, 20, "?"],
//     [1, 21, "?"],
//     [1, 22, "?"],
//     [1, 23, "?"],
//     [1, 24, "?"],
//     [1, 25, "?"],
//     [1, 29, "?"],
//     [1, 30, "?"],

//     // 🎬 L'Aile et la Bête
//     [2, 26, "Agent secret"],
//     [2, 27, "Complice mystérieuse"],

//     // 🎬 Le Radeau
//     [3, 31, "Cascadeur"],

//     // 🎬 Aventure sur la Rivière Blanche
//     [4, 31, "Tom adulte"],
//     [4, 32, "Peggy adulte"],
//     [4, 33, "Tom enfant"],
//     [4, 34, "Peggy enfant"],
//     [4, 35, "L’oncle Ted"],
//     [4, 36, "Le trappeur"],
//     [4, 37, "Le pasteur"],
//     [4, 38, "Samuël"],
//     [4, 19, "Mady"],

//     // 🎬 Hay Qué
//     [6, 28, "Chanteuse"]
// ];

// foreach ($film_roles as $role) {
//     $stmt->execute($role);
// }

// echo "✅ Rôles insérés avec succès !";

// // Insertion des tags
// $stmt = $pdo->prepare("INSERT INTO tags (id, name) VALUES (?, ?)");

// $tags = [
//     [1, "Long métrages"],
//     [2, "Documentaires"],
//     [3, "Clips musicaux"],
//     [4, "Nominés"],
//     [5, "Court métrages"],
//     [6, "En production"]
// ];

// foreach ($tags as $tag) {
//     $stmt->execute($tag);
// }

// echo "✅ Tags insérés avec succès !\n";

echo "✅ Données insérées avec succès !";
?>
