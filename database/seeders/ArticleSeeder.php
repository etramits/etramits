<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $articles = [
            [
                'title' => 'Sol·licitar Certificat Covid',
                'slug' => 'sol·licitar-certificat-covid',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et dolor ipsum. Proin est ante, lacinia nec lorem ac, mollis fringilla arcu. Donec interdum mollis augue, in sagittis orci vestibulum eget. Maecenas nec eleifend elit. Nam diam dolor, vestibulum et porttitor ac, aliquam vitae nisi. Sed in semper arcu. Fusce in sem ultrices, vestibulum dolor sit amet, finibus justo.Nunc vulputate nibh vel elit blandit, in eleifend tortor sodales. Proin quis elit blandit, aliquam eros sed, aliquet justo. Nulla orci justo, tempus at metus et, pharetra dignissim nunc. Suspendisse eget enim ullamcorper, cursus velit nec, lacinia justo. Etiam hendrerit lacus nulla, at tristique justo porta dapibus. Mauris facilisis tellus a felis mollis ornare. Ut venenatis quis ex et sodales. Nulla lorem augue, tristique in posuere tristique, molestie at leo.Sed cursus sapien ac augue luctus tempor. Phasellus pulvinar a nisi vitae semper. Nam vitae tellus ornare, volutpat lorem vestibulum, ornare tortor. Vivamus finibus lobortis massa, eu lacinia velit viverra ut. Nam vestibulum quam sit amet viverra dictum. Nullam vel pellentesque mi. Maecenas lectus eros, blandit sed finibus in, lacinia nec nulla. Suspendisse quis velit aliquam, aliquam ipsum et, vehicula lacus. Maecenas nibh sem, rhoncus non turpis vitae, laoreet dignissim dui. Nam ut consectetur quam.Ut fermentum lectus et nulla tincidunt, eu volutpat ligula interdum. Ut convallis orci urna, non tempus risus eleifend non. Sed lobortis dictum tincidunt. Ut a varius ligula. Morbi malesuada eu elit in interdum. Quisque ut dui consequat, posuere justo quis, elementum ante. Curabitur sed pulvinar diam. Vestibulum facilisis maximus velit, at laoreet magna. Donec venenatis dui eget odio efficitur, nec congue turpis commodo. Maecenas dictum nulla id mauris elementum, ac tristique dolor hendrerit. Donec laoreet sem massa, porttitor luctus ipsum condimentum nec. Aenean feugiat est ut ligula rutrum commodo nec sit amet eros. Mauris facilisis tristique varius. Quisque hendrerit arcu et orci varius ullamcorper. Sed consectetur odio et augue pulvinar, quis tincidunt massa consectetur. Integer a tellus eu odio suscipit cursus.Duis accumsan eu orci eu cursus. Fusce elementum dolor a augue convallis lacinia. Etiam non finibus tellus, sit amet pellentesque enim. Donec nisi enim, scelerisque sed turpis eu, bibendum molestie ante. Aenean sed ante blandit, ullamcorper libero ut, consequat nibh. Nulla lobortis nisi et auctor vehicula. Suspendisse volutpat tempus orci ut vestibulum. Nam non accumsan sem, eget aliquam dui. Aliquam convallis nisi a gravida molestie. Quisque sit amet enim at dui sodales mattis vitae id mi.',
                'category_id' => 1,
                'author_id' => 1,
                'active' => 1,
                'created_at' => now()
            ],
            [
                'title' => 'Sol·licitar Certificat Digital',
                'slug' => 'sol·licitar-certificat-digital',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et dolor ipsum. Proin est ante, lacinia nec lorem ac, mollis fringilla arcu. Donec interdum mollis augue, in sagittis orci vestibulum eget. Maecenas nec eleifend elit. Nam diam dolor, vestibulum et porttitor ac, aliquam vitae nisi. Sed in semper arcu. Fusce in sem ultrices, vestibulum dolor sit amet, finibus justo.Nunc vulputate nibh vel elit blandit, in eleifend tortor sodales. Proin quis elit blandit, aliquam eros sed, aliquet justo. Nulla orci justo, tempus at metus et, pharetra dignissim nunc. Suspendisse eget enim ullamcorper, cursus velit nec, lacinia justo. Etiam hendrerit lacus nulla, at tristique justo porta dapibus. Mauris facilisis tellus a felis mollis ornare. Ut venenatis quis ex et sodales. Nulla lorem augue, tristique in posuere tristique, molestie at leo.Sed cursus sapien ac augue luctus tempor. Phasellus pulvinar a nisi vitae semper. Nam vitae tellus ornare, volutpat lorem vestibulum, ornare tortor. Vivamus finibus lobortis massa, eu lacinia velit viverra ut. Nam vestibulum quam sit amet viverra dictum. Nullam vel pellentesque mi. Maecenas lectus eros, blandit sed finibus in, lacinia nec nulla. Suspendisse quis velit aliquam, aliquam ipsum et, vehicula lacus. Maecenas nibh sem, rhoncus non turpis vitae, laoreet dignissim dui. Nam ut consectetur quam.Ut fermentum lectus et nulla tincidunt, eu volutpat ligula interdum. Ut convallis orci urna, non tempus risus eleifend non. Sed lobortis dictum tincidunt. Ut a varius ligula. Morbi malesuada eu elit in interdum. Quisque ut dui consequat, posuere justo quis, elementum ante. Curabitur sed pulvinar diam. Vestibulum facilisis maximus velit, at laoreet magna. Donec venenatis dui eget odio efficitur, nec congue turpis commodo. Maecenas dictum nulla id mauris elementum, ac tristique dolor hendrerit. Donec laoreet sem massa, porttitor luctus ipsum condimentum nec. Aenean feugiat est ut ligula rutrum commodo nec sit amet eros. Mauris facilisis tristique varius. Quisque hendrerit arcu et orci varius ullamcorper. Sed consectetur odio et augue pulvinar, quis tincidunt massa consectetur. Integer a tellus eu odio suscipit cursus.Duis accumsan eu orci eu cursus. Fusce elementum dolor a augue convallis lacinia. Etiam non finibus tellus, sit amet pellentesque enim. Donec nisi enim, scelerisque sed turpis eu, bibendum molestie ante. Aenean sed ante blandit, ullamcorper libero ut, consequat nibh. Nulla lobortis nisi et auctor vehicula. Suspendisse volutpat tempus orci ut vestibulum. Nam non accumsan sem, eget aliquam dui. Aliquam convallis nisi a gravida molestie. Quisque sit amet enim at dui sodales mattis vitae id mi.',
                'category_id' => 1,
                'author_id' => 1,
                'active' => 1,
                'created_at' => now()
            ],
        ];

        Article::insert($articles);
    }
}
