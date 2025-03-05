<template>
  <Header />
  <main>
    <section class="intro">
      <div class="intro-content">
        <figure>
          <NuxtImg src="/images/jimmy_radeau.webp" alt="Photo de Jimmy-Paul Coti lors du tournage de 'Aventure sur la rivière blanche'" width="1260" height="430"/>
          <figcaption>Quand le cascadeur est introuvable! - "Aventure sur la rivière Blanche"</figcaption>
        </figure>

        <h1 class="intro-title">Découvrez l'univers de Jimmy-Paul Coti</h1>
        <p class="intro-txt">"Jimmy-Paul Coti, réalisateur autodidacte et visionnaire, donne vie à des récits captivants depuis plus de quatre décennies."</p>
        <BtnScroll class="btn-scroll" sectionToScroll=".film-maker__bio" btnContent="Découvrir le réalisateur"/>
      </div>
      <div class="overlay"></div>
    </section>
    <section class="film-maker__bio">
      <h2 class="section-title">Les premiers pas d'un réalisateur passionné</h2>
      <div class="bio-content">
        <ImgSticky src="/images/derriere_la_camera.webp" alt="Photo de Jimmy-Paul Coti" :width="400" :height="400" caption="Jimmy-Paul Coti derrière la caméra"/>
          <div class="bio-txt">
            <p>Jimmy-Paul Coti n’avait jamais imaginé devenir un jour réalisateur. Après avoir exercé une dizaine de métiers variés dans l’industrie et le commerce, la providence lui a offert une opportunité unique à 26 ans, sans formation académique ni école de cinéma.</p>
            <h3>"Les débuts en super 8 !"</h3>
            <p>À cette époque, les amateurs passionnés utilisaient des caméras 8mm ou Super 8, les plus fortunés optant pour le 16mm. Le prix élevé des caméras, des projecteurs, et surtout de la pellicule argentique, rendait cet art presque inaccessible. Malgré ces défis, Jimmy-Paul a fait ses débuts en autodidacte avec sa première caméra, une Super 8 ELMO, qu'il considérait comme une petite merveille technologique.</p>
            <h3>"Un premier projet audacieux !"</h3>
            <p>Avec cet équipement, il réalisa son tout premier film, 'Dernière Mission'. Avec sa naïveté de débutant Il avait écrit une sorte de James Bond, comportant des poursuites en voiture, des cascades spectaculaires, et même une course en 1300cc Kawasaki sous les ailes d’un avion volant en rase-motte. Ces débuts audacieux marquèrent le début d’une carrière où la passion et l'engagement de Jimmy-Paul ne faibliront jamais.</p>
        </div>
      </div>
    </section>
    <section class="time-line">
      <CinemaCurtain />
      <TimeLine />
    </section>
    <section>
      <Parallax backgroundImg="/images/travelling.webp" />
    </section>

    <section>
      <div class="film-maker__about">
        <h2>Il n’avait peur de rien, convaincu que tout était possible.</h2>
        <div class="film-maker__about_content">
          <p class="film-maker__about_p1">Porté par un enthousiasme débordant, Jimmy-Paul s’est lancé dans une deuxième production tout aussi périlleuse : <strong>"L’Étincelle"</strong>. Ce projet l’a placé au cœur des flammes, pour capturer des images saisissantes d’un phénomène destructeur ravageant les pinèdes du sud de la France.</p>
          <p class="film-maker__about_p2">Avec un engagement sans faille, il a mis son talent au service d’une cause noble, suivant les pompiers dans leur combat acharné. <strong>À bord des Canadairs</strong>, sur des vedettes maritimes écopant l’eau, ou encore dans des hélicoptères de reconnaissance, il a retranscrit avec authenticité la réalité de cette lutte héroïque.</p>
          <p class="film-maker__about_p3"><strong>Mais Jimmy-Paul ne s’est pas arrêté au documentaire.</strong> Pour dénoncer les motivations des incendiaires, il a transformé ce témoignage en une fiction bouleversante, collant au plus près de la vérité. Ce choix audacieux a payé : lors de la première projection, plus de 700 spectateurs étaient présents.</p>
          <p class="film-maker__about_p4"><strong>Ce succès marquant a ouvert une nouvelle page de sa carrière. France 3 Méditerranée et TMC ont diffusé et rediffusé "L’Étincelle"</strong>, renforçant la reconnaissance de Jimmy-Paul, alors connu sous le nom de Jean-Pierre Coindet. Ce tournant a définitivement posé les bases d’un réalisateur passionné et engagé.</p>
        </div>
      </div>
    </section>

    <section class="article">
      <h2 class="section-title">Un Parcours Exceptionnel et des Projets à Venir</h2>

      <div class="article-container">
        <div class="imgSticky_mobile" >
        <ImgSticky src="/images/jimmy_provence.webp" alt="Jimmy Paul Cotti posant pour le journal provence" :width="300" />
        <ImgSticky src="/images/chemin_or_blanc_affiche.webp" alt="Affiche 'Le chemin de l'or Blanc'" :width="300" :height="390" />
        </div>

        <ImgSticky src="/images/jimmy_provence.webp" alt="Jimmy Paul Cotti posant pour le journal provence" :width="300" class="imgSticky_desktop"/>

        <div class="article-content">
          <h3>Des aventures cinématographiques uniques qui marquent l’histoire et des projets en constante évolution.</h3>
          <article class="article-content_txt">
              <p>"Cinéaste autodidacte, j'ai eu la chance de réaliser plusieurs films pour la télévision française, <strong>diffusés dans plus de 22 pays</strong>. Mon premier long-métrage, Il était une fois... Les Sabots de Vénus, tourné en décors naturels, m’a ouvert les portes du prestigieux <strong>Festival de Cannes</strong>. Parmi mes œuvres marquantes :</p>
              <ul>
                <li><NuxtImg src="/images/icons/icon_camera.webp" alt="icone d'une caméra" width="30" height="30" class="icon_camera_puce"/>Le Radeau, une prouesse sportive unique en coproduction avec France 2, diffusée plus de 500 fois dans le monde entier.</li>
                <li><NuxtImg src="/images/icons/icon_camera.webp" alt="icone d'une caméra" width="30" height="30" class="icon_camera_puce"/>L’Aile et la Bête, un défi inédit en ULM, filmé dans le Grand Canyon du Verdon. Aujourd’hui, je poursuis ma passion en montant un documentaire de 90 minutes et en développant le scénario de mon prochain long-métrage : Les Embruns de Liberté."</li>
              </ul>
          </article>
          <aside >
            <p>Projets en cours :</p>
            <ul>
              <li>Montage d’un documentaire de 90 minutes.</li>
              <li>Écriture du scénario pour le long-métrage 'Les Embruns de Liberté'.</li>
            </ul>
          </aside>
        </div>
      <ImgSticky src="/images/chemin_or_blanc_affiche.webp" alt="Affiche 'Le chemin de l'or Blanc'" :width="300" :height="390" class="imgSticky_desktop"  />
    </div>
    </section>
    <section class="credits">
      <span>Crédits : </span><a href="https://fr.vecteezy.com/vecteur-libre/t%C3%A9l%C3%A9vision">Télévision Vecteurs par Vecteezy, </a>
      <a href="https://fr.vecteezy.com/vecteur-libre/camera-video">Camera Video Vecteurs par Vecteezy, </a>
      <a href="https://fr.vecteezy.com/vecteur-libre/flamme">Flamme Vecteurs par Vecteezy, </a>
      <a href="https://fr.vecteezy.com/vecteur-libre/film">Film Vecteurs par Vecteezy, </a>
      <a href="https://fr.vecteezy.com/vecteur-libre/clapboard">Clapboard Vecteurs par Vecteezy, </a>
      <a href="https://fr.freepik.com/vecteurs-libre/fond-rideau-soie-rouge_5597360.htm#fromView=search&page=1&position=1&uuid=16b3fbe8-e362-48c7-bc63-631cf8d6b331&new_detail=true&query=rideau+th%C3%A9%C3%A2tre">Rideau de cinéma par Freepik, </a>
    </section>
 
  </main>
  <Footer />
</template>


<script setup>
import Header from '~/components/Header.vue';
import Footer from '~/components/Footer.vue';
import TimeLine from '~/components/TimeLine.vue';
import BtnScroll from '~/components/BtnScroll.vue';
import CinemaCurtain from '~/components/CinemaCurtain.vue';
import Parallax from '~/components/Parallax.vue';
import ImgSticky from '~/components/ImgSticky.vue';

</script>

<style scoped lang="scss">
@use '@/assets/scss/pages/filmMaker.scss';
.imgSticky_mobile{
  display: none;

  @media (max-width:768px) {
    display: block;
    width: 100%;
    height: 100%;
    position: sticky;
    top: 0px;
    margin: 0 auto;
  }

  .img-content{
    top: 0px;
    margin-bottom: 20px;
  }
}

.imgSticky_desktop{
  display: flex;

  @media (max-width:768px) {
    display: none;
  }
}

</style>