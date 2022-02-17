<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ArticleSeeder extends Seeder
{
  public function run()
  {
    Article::create([
        "title" => "Sol·licitar passaport covid",
        "slug" => "sol-licitar-passaport-covid",
        "content" => "Vis id minim dicant sensibus. Pri aliquip conclusionemque ad, ad malis evertitur torquatos his. Has ei solum harum reprimique, id illum saperet tractatos his. Ei omnis soleat antiopam quo. Ad augue inani postulant mel, mel ea qualisque forensibus.Dicunt percipit deserunt ut usu. Aliquip delenit an eam, vocent vituperata vim ea. Ei mollis audire interpretaris cum, ei impedit fierent sea. Ius at homero noster prompta, ea sit dignissim vituperata efficiendi. Natum placerat ad mei. Est ei erat mucius quaeque. Ei his quas phaedrum, efficiantur mediocritatem ne sed, hinc oratio blandit ei sed. Blandit gloriatur eam et. Brute noluisse per et, verear disputando neglegentur at quo. Sea quem legere ei, unum soluta ne duo. Ludus complectitur quo te, ut vide autem homero pro.At quaeque adversarium ius, sed at integre persius verterem. Sit summo tibique at, eam et fugit complectitur, vis te natum vivendum mandamus. Iudico quodsi cum ad, dicit everti sensibus in sea, ea eius paulo deterruisset pri. Pro id aliquam hendrerit definitiones. Per et legimus delectus.Virtute equidem ceteros in mel. Id volutpat neglegentur eos. Eu eum facilisis voluptatum, no eam albucius verterem. Sit congue platonem adolescens ut. Offendit reprimique et has, eu mei homero imperdiet.Has maiorum habemus detraxit at. Timeam fabulas splendide et his. Facilisi aliquando sea ad, vel ne consetetur adversarium. Integre admodum et his, nominavi urbanitas et per, alii reprehendunt et qui. His ei meis legere nostro, eu kasd fabellas definiebas mei, in sea augue iriure.",
        "category_id" => 1,
        "author_id" => 1,
        "active" => true,
    ]);

    Article::create([
        "title" => "Demanar la prestació de l'atur",
        "slug" => "demanar-la-prestacio-de-l-atur",
        "content" => "Vis id minim dicant sensibus. Pri aliquip conclusionemque ad, ad malis evertitur torquatos his. Has ei solum harum reprimique, id illum saperet tractatos his. Ei omnis soleat antiopam quo. Ad augue inani postulant mel, mel ea qualisque forensibus.Dicunt percipit deserunt ut usu. Aliquip delenit an eam, vocent vituperata vim ea. Ei mollis audire interpretaris cum, ei impedit fierent sea. Ius at homero noster prompta, ea sit dignissim vituperata efficiendi. Natum placerat ad mei. Est ei erat mucius quaeque. Ei his quas phaedrum, efficiantur mediocritatem ne sed, hinc oratio blandit ei sed. Blandit gloriatur eam et. Brute noluisse per et, verear disputando neglegentur at quo. Sea quem legere ei, unum soluta ne duo. Ludus complectitur quo te, ut vide autem homero pro.At quaeque adversarium ius, sed at integre persius verterem. Sit summo tibique at, eam et fugit complectitur, vis te natum vivendum mandamus. Iudico quodsi cum ad, dicit everti sensibus in sea, ea eius paulo deterruisset pri. Pro id aliquam hendrerit definitiones. Per et legimus delectus.Virtute equidem ceteros in mel. Id volutpat neglegentur eos. Eu eum facilisis voluptatum, no eam albucius verterem. Sit congue platonem adolescens ut. Offendit reprimique et has, eu mei homero imperdiet.Has maiorum habemus detraxit at. Timeam fabulas splendide et his. Facilisi aliquando sea ad, vel ne consetetur adversarium. Integre admodum et his, nominavi urbanitas et per, alii reprehendunt et qui. His ei meis legere nostro, eu kasd fabellas definiebas mei, in sea augue iriure.",
        "category_id" => 2,
        "author_id" => 1,
        "active" => true,
    ]);

    Article::create([
        "title" => "Demanar cita prèvia al metge de capçalera",
        "slug" => "demanar-cita-previa-al-metge-de-capçalera",
        "content" => "Vis id minim dicant sensibus. Pri aliquip conclusionemque ad, ad malis evertitur torquatos his. Has ei solum harum reprimique, id illum saperet tractatos his. Ei omnis soleat antiopam quo. Ad augue inani postulant mel, mel ea qualisque forensibus.Dicunt percipit deserunt ut usu. Aliquip delenit an eam, vocent vituperata vim ea. Ei mollis audire interpretaris cum, ei impedit fierent sea. Ius at homero noster prompta, ea sit dignissim vituperata efficiendi. Natum placerat ad mei. Est ei erat mucius quaeque. Ei his quas phaedrum, efficiantur mediocritatem ne sed, hinc oratio blandit ei sed. Blandit gloriatur eam et. Brute noluisse per et, verear disputando neglegentur at quo. Sea quem legere ei, unum soluta ne duo. Ludus complectitur quo te, ut vide autem homero pro.At quaeque adversarium ius, sed at integre persius verterem. Sit summo tibique at, eam et fugit complectitur, vis te natum vivendum mandamus. Iudico quodsi cum ad, dicit everti sensibus in sea, ea eius paulo deterruisset pri. Pro id aliquam hendrerit definitiones. Per et legimus delectus.Virtute equidem ceteros in mel. Id volutpat neglegentur eos. Eu eum facilisis voluptatum, no eam albucius verterem. Sit congue platonem adolescens ut. Offendit reprimique et has, eu mei homero imperdiet.Has maiorum habemus detraxit at. Timeam fabulas splendide et his. Facilisi aliquando sea ad, vel ne consetetur adversarium. Integre admodum et his, nominavi urbanitas et per, alii reprehendunt et qui. His ei meis legere nostro, eu kasd fabellas definiebas mei, in sea augue iriure.",
        "category_id" => 3,
        "author_id" => 1,
        "active" => true,
    ]);

  }
}