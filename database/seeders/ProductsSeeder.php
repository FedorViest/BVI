<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::truncate();

//         Product::create( [
//             'name'=>'Cherry tree',
//             'price'=>19.99,
//             // Zdroj: https://www.zones.sk/studentske-prace/biologia/14520-ceresna-vtacia/
//             'description'=>'
// there are glands at the base of the blade
// treetop is broadly ovate to spherical
// bork with typical circles
// branches obliquely ascending
// flowers white, diameter 3 cm
// stems up to 5 cm long
// round drupe, diameter 2.5 cm
// leaf ovate to elliptical, 5-15 cm long
// margin coarsely indented
// blooms before foliage
// in wild forms, straight trunk to the top of the crown
// many cultivars are grown',
//             'short_description'=>'The fruit of the prunus avium must be harvested at the time of ripeness. The tasty juicy fruit contains a lot of sugar, minerals and vitamins.',
//             'category'=>'trees',
//             'product_size'=>'medium'
//         ] );

//         Product::create( [
//             'name'=>'Linden tree',
//             'price'=>16.89,
//             // Zdroj: https://zdravopedia.sk/prirodna-lekaren/bylinky/lipa-velkolista-lipa-malolista
//             'description'=>'
// linden trees are 20-30 m tall trees with a wide crown
// the leaves are alternate, on long petioles, irregularly heart-shaped, slightly serrated on the edge, with leaflets in the axils
// the leaves of the small-leaved linden are dark green on the face and bluish-green on the back with yellow-red hairs
// the leaves of the large-leaved linden have whitish hairs on the back
// the flowers are arranged in forks and their stem is about halfway fused with a large, leathery, bare bract
// the flowers of the small-leaved linden are yellowish-white and those of the large-leaved linden are light yellow
// the small-leaved linden blooms in the summer before the large-leaved linden
// the dried flowers are light yellow with yellow-green leaves, they smell pleasant and have a bittersweet taste
// in nature, lindens grow on slightly moist soils, in mixed deciduous forests, they can also grow along the edges of roads or on stony slopes as scrub
// linden trees can also be planted as park trees or in avenues',
//             'short_description'=>'We collect linden flowers with leaves at the time of flowering (June-July). When picking, care must be taken not to crush or stick to the flowers, as they may steam and then darken when dried.',
//             'category'=>'trees',
//             'product_size'=>'medium'
//         ] );

//         Product::create( [
//             'name'=>'Apple tree',
//             'price'=>18.99,
//             // Zdroj: https://www.zones.sk/studentske-prace/biologia/8187-jablon/
//             'description'=>'
// apple trees are defined as a large shrub or tree and they can be 6-10 m tall
// the trunk has gray to dark gray bark with light gray lenticels, the annual rings are greenish-brown to purple-tinged
// buds are short conical, sometimes rounded, felty
// the flower buds are ovate or cone-ovate, also felty
// the leaves are entire, the blade is elliptic to narrowly round, rounded at the base, pointed at the top, and has a serrate to serrate serrated edge
// it is sparsely hairy to bald on the face, dark green in color, rough, light gray green on the reverse, the stem is 2-4.5 cm long
// the inflorescence is a sparsely flowered plume, with 4-8 flowers, with linear bracts
// the flower is 4-5 cm wide, five-numbered, calyx gray felt, pod felt
// the petals are white to pinkish, broadly elliptic to broadly ovate
// there are 15-20 stamens in the flower, the pistil has 4-5 carpels
// malvica is at least 5 cm in diameter (4-9 cm long, 5-10 cm wide), spherical, flattened, barrel-shaped or conical, the stem is shorter than malvica
// the seeds are 8-10 mm long, ovoid, in parchment cases, usually 1-2',
//             'short_description'=>'The tree lives 80-150 years, grafted cultivars less. It begins to bear fruit between the age of 5 and 15. It blooms in May.',
//             'category'=>'trees',
//             'product_size'=>'small'
//         ] );

//         Product::create( [
//             'name'=>'Pine tree',
//             'price'=>15.50,
//             // Zdroj: https://sk.wikipedia.org/wiki/Borovica_lesn%C3%A1
//             'description'=>'
// it has a high crown and grows to a height of 20 to 40 m
// the needles are 4-8 cm long, they grow in bundles of two from the brachyblast
// it blooms in may and june
// the ovoid-conical cones are pendulous, unripe green, ripe gray-brown, 3-6 cm long and 1-3 cm wide, and the seeds are winged
// male cones are yellowish, female cones are reddish, usually paired at the end of the branches',
//             'short_description'=>'The pine tree is a coniferous tree with a massive, deep-going main root and a wide-spreading to flat crown.',
//             'category'=>'trees',
//             'product_size'=>'large'
//         ] );

//         Product::create( [
//             'name'=>'Oak tree',
//             'price'=>16.89,
//             // Zdroj: https://www.atlasdrevin.sk/druh/43-dub-letny
//             'description'=>'
// tree 30-40 m tall, massive crown, widely spread in the stand higher planted
// bark reddish brown later light gray smooth
// bark dark gray to black, solid, coarsely cracked longitudinally
// the buds are built in a spiral, at the end kicked up around the terminal bud
// buds are 4 - 8 x 5 mm in size, ovoid, obtuse to rounded, sessile
// the leaves are simple, pinnately lobed to notched, inverted ovate in basic shape
// the leaves are 7-15 x 3-7 cm large, the lobes are entirely marginal
// the lateral veins open into the lobes and into the notches
// there are 5 to 9 pairs of lateral veins
// the stalk is short (2-8 mm)
// the upper side of the leaves is dark green, shiny, the lower side is lighter
// heart-shaped leaf base (ended in two lobes)',
//             'short_description'=>'Oak is the second most important deciduous tree. The wood is of high quality and valuable - it is used for the production of solid furniture, sliced veneers, barrels, and in the past ships were built from oak wood.',
//             'category'=>'trees',
//             'product_size'=>'large'
//         ] );

//         Product::create( [
//             'name'=>'Beech tree',
//             'price'=>16.89,
//             // Zdroj: https://www.atlasdrevin.sk/druh/35-buk-lesny
//             'description'=>'
// tree of the first size (mighty - majestic) growing to a height of 30-40 m
// crown ovoid to widely spreading - of variable shape
// the root system is circular to heart-shaped
// the bark is brown, smooth
// bark light gray to dark gray smooth until very old, only at the base rarely finely cracked longitudinally
// leaves are simple, ovate to elliptic, short-pointed, broadly wedge-shaped at the base, whole marginal, wavy to toothed along the edge
// the upper side of the leaves is dark green shiny, the lower side is lighter
// the stalk is 5-15 mm long
// fallen leaves are difficult to decompose due to the high content of calcium in the leaves, therefore the fall accumulates under the mother plant
// it blooms in May at the same time as the leaves develop',
//             'short_description'=>'Beech wood is hard, strong, heavy, brittle, light pink in color and coreless with mature wood. It is used for furniture production and for chemical processing.',
//             'category'=>'trees',
//             'product_size'=>'large'
//         ] );

//         Product::create( [
//             'name'=>'Plum tree',
//             'price'=>19.99,
//             // Zdroj: https://www.zones.sk/studentske-prace/biologia/14522-slivka-domaca/
//             'description'=>'
// drupe, depending on the cultivar, spherical or oblong
// petiole softly hairy
// flowers white or greenish-white
// main branches ascending
// leaf ovate to elliptical, 5-10 cm long
// margin indented or serrated
// underside often densely hairy
// undemanding
// more than 2000 cultivars and forms with very different fruits',
//             'short_description'=>'The plum blossoms shortly before or at the same time as the leaves bud. The fruits are eaten raw, put in cakes, canned and made into alcoholic drinks.',
//             'category'=>'trees',
//             'product_size'=>'medium'
//         ] );
// ---------------------------------------- FLOWERS -----------------------------------------------------------------------
//         Product::create( [
//             'name'=>'Rose',
//             'price'=>8.55,
//             // Zdroj: https://referaty.aktuality.sk/ruza-stolista-rosa-centifolia-l/referat-31655
//             'description'=>'
// centifolia rose forms up to 3 m high bushes or trees with branches with strongly compressed spines
// the leaves are odd-pinnate, the individual leaflets are ovate and serrated at the edge
// the flower stalks bear large flowers with a full pink crown that smell noble
// blooming date: June - July
// harvest date (flowers): June - July
// the fruits are small hairy achenes, enclosed in a false fruit, called a rosette',
//             'short_description'=>'Roses were popularly grown in country gardens all over Europe. The infusion or broth is recommended as a bath additive, especially for more severely damaged skin.',
//             'category'=>'flowers',
//             'product_size'=>'medium'
//         ] );

//         Product::create( [
//             'name'=>'Sunflower',
//             'price'=>4.99,
//             // Zdroj: https://referaty.aktuality.sk/slnecnica-rocna/referat-29985
//             'description'=>'
// sunflower is an annual plant native to North America, belonging to the astraceae family with a large inflorescence
// the stem can grow up to 3 meters high
// the root system of the sunflower is massive, richly branched, the main round root penetrates to a depth of 1.5 m
// distinctive tongue-shaped flowers, located in a circle on the edge of the plant, are usually yellow, sometimes even orange or change to brown
// tubular flowers are in the inner part of the dress',
//             'short_description'=>'The sunflower is known for its tasty seeds. In terms of world production of oilseeds, it is the most important oilseed after soybeans, cottonseed and groundnuts.',
//             'category'=>'flowers',
//             'product_size'=>'medium'
//         ] );

//         Product::create( [
//             'name'=>'Daffodil',
//             'price'=>2.59,
//             // Zdroj: https://mojerastliny.sk/narcis/
//             'description'=>'
// narcissus likes a sunny and warm place
// onions are planted on the bed in September to a depth of 10-15 cm
// they need a little more time and heat to root than other spring bulbs
// after planting, they need a period of cold and darkness for at least 8 weeks
// they are left in one place until they bloom profusely, about 4 years.
// it thrives in permeable, slightly moist, rather acidic soil, it does not like organic fertilizer in the ground
// narcissus blooms from March to May, depending on the species and variety and environmental conditions',
//             'short_description'=>'The daffodil is a perennial spring ornamental bulbous plant and reaches a height of 15-50 cm. Long lance-shaped leaves of a pleasant green color and a stem bearing a flower grow in pairs from the onion.',
//             'category'=>'flowers',
//             'product_size'=>'small'
//         ] );

// ---------------------------------------- FRUIT -----------------------------------------------------------------------
//         Product::create( [
//             'name'=>'Blueberry',
//             'price'=>3.89,
//             // Zdroj: https://www.zones.sk/studentske-prace/biologia/9220-cucoriedky/
//             'description'=>'
// blueberries are characterized by a prostrate growth, they have a more powerful growth and larger fruits, but they are not as aromatic, the flesh is pale green to pale in color
// blueberries grow on fresh, moist, humus to peaty acid soils with a medium supply of nutrients and a high level of groundwater, or with a constant influence of water
// fruits and leaves are collected, and today this valuable drug is also used by the pharmaceutical industry
// blueberry is a species that is demanding on the soil reaction, the optimal pH is 3.8 to 4.5
// we plant in large pits, concrete rings with a diameter of 0.8 m and a depth of 700 to 800 mm in the prepared substrate
// fertility ranges from 2 to 12 kg per bush, depending on cultivar and age',
//             'short_description'=>'Blueberry has a high sugar content, the vitamin C content is lower. The content of vitamins B1 and B2, minerals, iron, phosphorus is important.',
//             'category'=>'flowers',
//             'product_size'=>'medium'
//         ] );

//         Product::create( [
//             'name'=>'Raspberry',
//             'price'=>6.20,
//             // Zdroj: https://www.dombyliniek.sk/malina-lesna-list---repikov-herbar/
//             'description'=>'
// raspberry blackberry is a shrub belonging to the Rosaceae family
// straight, somewhat hairy and spiny branches on which alternate three to five leaves grow
// the leaves are felty on the back and sharply saw-shaped
// the flowers are white, regular, five-numbered with many stamens
// the fruits are red, folded, after ripening they fall from the bed
// raspberry blackberries grow on two-year lignified canes, one-year green canes do not bear fruit',
//             'short_description'=>'Raspberry leaf contains vitamin C, organic acids and tannins.',
//             'category'=>'flowers',
//             'product_size'=>'small'
//         ] );


//         Product::create( [
//             'name'=>'Strawberry',
//             'price'=>5.10,
//             // Zdroj: https://mojerastliny.sk/jahoda-obycajna/
//             'description'=>'
// the five-petalled flowers grow in a sparse cluster on higher stems
// the color of the flowers is white
// the fruits are achenes
// the fruits are formed from a thickened, thickened flower bed. the plant grows to a height of 10-15 cm and blooms in May and June
// strawberries ripen in June and July
// it reproduces by means of rooting creepers',
//             'short_description'=>'Strawberry produces tasty fruits that contain a lot of vitamin C. Strawberry leaf tea is a strengthening drink for those who suffer from anemia and nervousness.',
//             'category'=>'flowers',
//             'product_size'=>'small'
//         ] );


    }
}
