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
//             'price'=>7.99,
//             // Zdroj: https://referaty.aktuality.sk/slnecnica-rocna/referat-29985
//             'description'=>'
// sunflower is an annual plant native to North America, belonging to the astraceae family with a large inflorescence
// the stem can grow up to 3 meters high
// the root system of the sunflower is massive, richly branched, the main round root penetrates to a depth of 1.5 m
// distinctive tongue-shaped flowers, located in a circle on the edge of the plant, are usually yellow, sometimes even orange or change to brown
// tubular flowers are in the inner part of the dress',
//             'short_description'=>'The sunflower is known for its tasty seeds. In terms of world production of oilseeds, it is the most important oilseed after soybeans, cottonseed and groundnuts.',
//             'category'=>'flowers',
//             'product_size'=>'large'
//         ] );

//         Product::create( [
//             'name'=>'Daffodil',
//             'price'=>2.59,
//             // Zdroj: https://mojerastliny.sk/narcis/
//             'description'=>'
// narcissus likes sunny and warm places
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

//         Product::create( [
//             'name'=>'Gerbera',
//             'price'=>3.59,
//             // Zdroj: https://mojerastliny.sk/gerbera/
//             'description'=>'
// Gerberas have large showy flowers in various shades of white, yellow, orange, red, pink and purple.
// The flower heads are 5-10 cm in size and bloom on firm, upright, grey-green stems that reach up to 60 cm in length.
// Through breeding, numerous hybrids with stems half as short have been developed.
// These are often annual plants or short-lived perennials that can produce 5-6 flowers at the same time.
// The leaves are approx. 15 cm long, lobed and usually felty on the underside.',
//             'short_description'=>'Gerberas bloom most abundantly in late spring and early summer, with good care, flowering lasts until the arrival of the winter season. The plant likes plenty of light with occasional direct sun.',
//             'category'=>'flowers',
//             'product_size'=>'small'
//         ] );

//         Product::create( [
//             'name'=>'Lily',
//             'price'=>3.59,
//             // Zdroj: https://mojerastliny.sk/lalia/
//             'description'=>'
// The lily is a perennial flowering bulbous plant.
// Underground, it has a white, egg-shaped bulb covered with several broad scales.
// It can reproduce with these scales.
// Annual roots and a flower stalk grow from the bulb.
// The bush is straight, 30-150 cm tall and densely leafy with opposite lanceolate or elliptic leaves.
// The flowers are formed at the end of the stem either singly or in inflorescences.
// The inflorescence is composed of 6 petals.
// The flowers are striking due to their size and distinctive coloration.',
//             'short_description'=>'The lily has a long flowering period, from May to September, the main period for most varieties is the end of June and July.',
//             'category'=>'flowers',
//             'product_size'=>'medium'
//         ] );

//         Product::create( [
//             'name'=>'Orchid',
//             'price'=>9.99,
//             // Zdroj: https://mojerastliny.sk/orchidea-phalaenopsis/
//             'description'=>'
// The phalaenopsis orchid is easy to care for and blooms with beautiful flowers of varied bright colors that last on the plant for months (mostly during winter and spring).
// The plant has large oval to oblong thick leaves arranged oppositely.
// At the bottom of the stem or between the leaves, thick, silvery roots are formed, which are adapted to absorb moisture and nutrients from the air and attach the plant to the substrate.
// The flowers grow in bunches on an upright stem, up to 80 cm long.',
//             'short_description'=>'The orchid is popularly grown in residential conditions for long-blooming exotic flowers. It blooms mostly in winter and spring and lasts for many weeks, it happens that it stays in flower even for 6 months.',
//             'category'=>'flowers',
//             'product_size'=>'medium'
//         ] );

//         Product::create( [
//             'name'=>'Tulip',
//             'price'=>2.59,
//             // Zdroj: https://mojerastliny.sk/tulipan/
//             'description'=>'
// Tulip is a perennial ornamental spring bulbous plant, growing to a height of 10-70 cm.
// Tulip bulbs are annual and covered in a thin papery scale.
// In the spring, it grows oval, close-fitting gray green leaves with a waxy surface and a straight, strong, tall stem bearing a flower, leafy in the lower part with the same alternate leaves.
// The flower has six petals and is distinctive in its size and color.
// Various deep reds, yellows and pinks are popular, but tulips are grown in almost every possible color from white to black.
// The flower ripens into a capsule-like fruit - a capsule that contains disk-shaped seeds.
// After flowering, the mother bulb disappears in the ground and daughter bulbs are formed, which will bloom the following year when sufficiently matured.',
//             'short_description'=>'Tulips reproduce vegetatively. They bloom in April and May.',
//             'category'=>'flowers',
//             'product_size'=>'small'
//         ] );

// ---------------------------------------- FRUITS -----------------------------------------------------------------------
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
//             'category'=>'fruit',
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
//             'category'=>'fruits',
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
//             'category'=>'fruits',
//             'product_size'=>'small'
//         ] );

//         Product::create( [
//             'name'=>'Watermelon',
//             'price'=>6.89,
//             // Zdroj: https://www.frutas-hortalizas.com/Fruits/About-Watermelon.html
//             'description'=>'
// The watermelon is a crawling and climbing plant with lengthy stems and leaves divided in lobes.
// Its fruit is a berry that may weigh up to 15kg, with a hard green rind and a sweet pulp of more or less reddish colour.
// The upper side of the leaves is very smooth, whereas the reverse is very rough, with strongly marked nerves.
// The leaves are divided in rounded segments, each one with 3 to 5 lobes.
// The flowers are born in the axils of the leaves.
// They are yellow and solitary, masculine and feminine.
// They are pollinated by insects.
// The feminine flowers give rise to the watermelons, that are great berries of more or less spherical shape and variable size, that weigh between 2 and 15kg.
// The pulp is of pink or reddish colour, containing multiple squashed seeds of variable colour (brown, black, white, etc.).
// The rind is smooth or with clearer streaks and its colour ranges from dark green to pale green.',
//             'short_description'=>'The watermelon is a large fruit of a more or less spherical shape. It is usually eaten raw as table dessert. It has a sweet reddish or yellowish flesh. It is a very refreshing food that supplies very few calories. It also provides some vitamins and minerals.',
//             'category'=>'fruits',
//             'product_size'=>'large'
//         ] );

//         Product::create( [
//             'name'=>'Grapevine',
//             'price'=>35.89,
//             // Zdroj: https://wikifarmer.com/grape-plant-information/
//             'description'=>'
// Grapevine is a perennial plant bush, characterized by helices – tendrils and trailing growth.
// It is a climbing plant and normally climbs on rocks or tree trunks.
// Tendrils grow on stems and are believed to be degenerated inflorescences.
// Leaves are big, opposite, heart resembled, and inflorescences grow across them.
// They may be terraced or lobed with 3-5 lobs and distinct nerves.',
//             'short_description'=>'Grapes botanically are berries. Shoots produce the flower clusters right after sprouting.',
//             'category'=>'fruits',
//             'product_size'=>'large'
//         ] );

//         Product::create( [
//             'name'=>'Currant',
//             'price'=>7.89,
//             // Zdroj: https://www.britannica.com/plant/currant
//             'description'=>'
// Currant plants are erect or spreading shrubs.
// They generally are composed of short stems and long stems and may be hairy or glandular and lack spines.
// The leaves range in shape from roundish to nearly triangular and have palmate venation (their veins radiate from a common point near the leafstalk).
// The flowers generally are clustered and range in colour from greenish to white, yellow, pink, red, or purple.
// The fruits are true berries.',
//             'short_description'=>'Currants are extremely high in vitamin C and also supply calcium, phosphorus, and iron.',
//             'category'=>'fruits',
//             'product_size'=>'medium'
//         ] );

//         Product::create( [
//             'name'=>'Blackberry',
//             'price'=>7.89,
//             // Zdroj: https://www.britannica.com/plant/blackberry
//             'description'=>'
// Closely related to raspberries, blackberry plants have biennial canes (stems) that are characteristically covered with prickles and are erect, semi-erect, or trailing; the thornless blackberry is a modern development.
// The compound leaves usually feature three or five oval, coarsely toothed, stalked leaflets, many of which persist through the winter.
// Borne on terminal clusters, the flowers are white, pink, or red and produce black or red-purple fruits.
// Though commonly called berries, the fruits of Rubus species are technically aggregates of drupelets.
// Unlike the hollow fruits of raspberries, the drupelets of blackberries remain attached to a juicy white core, thus distinguishing the two.',
//             'short_description'=>'Blackberries are a fairly good source of iron, vitamin C, and antioxidants and are generally eaten fresh, in preserves, or in baked goods such as cobblers and pies.',
//             'category'=>'fruits',
//             'product_size'=>'medium'
//         ] );

// ---------------------------------------- VEGETABLES -----------------------------------------------------------------------

//         Product::create( [
//             'name'=>'Tomato',
//             'price'=>4.50,
//             // Zdroj: https://www.britannica.com/plant/tomato
//             'description'=>'
// Tomato plants are generally much branched, spreading 60–180 cm (24–72 inches) and somewhat trailing when fruiting, but a few forms are compact and upright.
// Leaves are more or less hairy, strongly odorous, pinnately compound, and up to 45 cm (18 inches) long.
// The five-petaled flowers are yellow, 2 cm (0.8 inch) across, pendant, and clustered.
// Fruits are berries that vary in diameter from 1.5 to 7.5 cm (0.6 to 3 inches) or more.
// They are usually red, scarlet, or yellow, though green and purple varieties do exist, and they vary in shape from almost spherical to oval and elongate to pear-shaped.
// Each fruit contains at least two cells of small seeds surrounded by jellylike pulp.',
//             'short_description'=>'The plant requires relatively warm weather and much sunlight; it is grown chiefly in hothouses in cooler climates. Tomatoes are usually staked, tied, or caged to keep the stems and fruits off the ground, and consistent watering is necessary to avoid blossom-end rot and cracking of the fruits.',
//             'category'=>'vegetables',
//             'product_size'=>'medium'
//         ] );

//         Product::create( [
//             'name'=>'Potato',
//             'price'=>2.55,
//             // Zdroj: https://www.kew.org/plants/potato
//             'description'=>'
// Potato plants grow up to 1m tall with hairy stems and leaves divided into around four leaflet pairs.
// Flowers can be white, pink, purple or blue with yellow centres; grow on stalks around 3cm long; and measure about 2.5cm across.
// Potatoes are a succulent but inedible spherical, yellow-green berry, up to 4cm across.
// Underground, the edible root forms a tuber that can be a range of colours, sizes and shapes, depending on the cultivated variety (cultivar).',
//             'short_description'=>'Boiled, mashed, in stews or roasted, potatoes are a staple food across the world. In fact, potato is the fourth most grown food crop in the world.',
//             'category'=>'vegetables',
//             'product_size'=>'medium'
//         ] );

//         Product::create( [
//             'name'=>'Pumpkin',
//             'price'=>6.58,
//             // Zdroj: https://www.britannica.com/plant/pumpkin
//             'description'=>'
// Pumpkins, which produce very long annual vines, are planted individually or in twos or threes on little hills about 2.5 to 3 metres (8 to 10 feet) apart.
// Botanically, pumpkin fruits are a type of berry known as a pepo.
// They are generally large, 4–8 kg (9–18 pounds) or more, though some varieties are very small.
// The largest pumpkins are varieties of C. maxima and may weigh 34 kg (75 pounds) or more; the most massive pumpkins ever grown have exceeded 907 kg (2,000 pounds).
// Pumpkins are often yellowish to orange in colour, and they vary from oblate to globular to oblong; some feature a white rind.
// The rind is smooth and usually lightly furrowed or ribbed.
// The fruit stem is hard and woody, ridged, and angled.
// The fruits mature in early autumn and can be stored for a few months in a dry place well above freezing temperatures.',
//             'short_description'=>'Pumpkins are commonly grown for human consumption, for decoration, and also for livestock feed.',
//             'category'=>'vegetables',
//             'product_size'=>'large'
//         ] );

//         Product::create( [
//             'name'=>'Cucumber',
//             'price'=>4.50,
//             // Zdroj: https://www.britannica.com/plant/cucumber
//             'description'=>'
// The cucumber plant is a tender annual with a rough, succulent, trailing stem.
// The hairy leaves have three to five pointed lobes, and the stem bears branched tendrils by which the plant can be trained to supports.
// The five-petaled yellow flowers are unisexual and produce a type of berry known as a pepo.
// The heat requirement is one of the highest among the common vegetables, and the fruits can become bitter if exposed to uneven watering conditions.
// The plants are susceptible to a number of bacterial and fungal diseases, including downy mildew, anthracnose, and Fusarium wilt.',
//             'short_description'=>'Cucumber is widely cultivated for its edible fruit. The nutritional value of the cucumber is low, but its delicate flavour makes it popular for salads and relishes.',
//             'category'=>'vegetables',
//             'product_size'=>'medium'
//         ] );

//         Product::create( [
//             'name'=>'Ginger',
//             'price'=>8.99,
//             // Zdroj: https://www.britannica.com/plant/ginger
//             'description'=>'
// The leafy stems of ginger grow about 1 metre (about 3 feet) high.
// The leaves are 15 to 30 cm (6 to 12 inches) long, elongate, alternate in two vertical rows, and arise from sheaths enwrapping the stem.
// The flowers are in dense conelike spikes about 2.5 cm (1 inch) thick and 5 to 8 cm (2 to 3 inches) long that are composed of overlapping green bracts, which may be edged with yellow.
// Each bract encloses a single small yellow-green and purple flower.',
//             'short_description'=>'The spice has a slightly biting taste and is used, usually dried and ground, to flavour breads, sauces, curry dishes, confections, pickles, and ginger ale.',
//             'category'=>'vegetables',
//             'product_size'=>'small'
//         ] );

//         Product::create( [
//             'name'=>'Garlic',
//             'price'=>2.50,
//             // Zdroj: https://www.britannica.com/plant/garlic
//             'description'=>'
// Garlic plants grow about 60 cm (2 feet) tall.
// Depending on the variety, the long leaves typically arise from a short hard stem above the bulb or emerge from a softer pseudostem made up of overlapping leaf sheaths.
// The bulb is covered with membranous skin and encloses up to 20 edible bulblets called cloves.
// The spherical flower cluster is initially enclosed in a pair of papery tapered bracts; the bracts split open when the green-white or pinkish flowers bloom.
// Flower stalks sometimes arise bearing tiny bulbils (tiny secondary bulbs that form in place of flowers) and sterile blossoms.
// Garlic is usually grown as an annual crop and is propagated by planting cloves or top bulbils, though seeds can be also be used.',
//             'short_description'=>'The bulbs have a powerful onionlike aroma and pungent taste and are not usually eaten raw.',
//             'category'=>'vegetables',
//             'product_size'=>'small'
//         ] );

//         Product::create( [
//             'name'=>'Onion',
//             'price'=>1.99,
//             // Zdroj: https://www.britannica.com/plant/onion-plant
//             'description'=>'
// The common onion has one or more leafless flower stalks that reach a height of 75–180 cm (2.5–6 feet), terminating in a spherical cluster of small greenish white flowers.
// Some flower clusters produce bulbils, tiny secondary bulbs that can be used to asexually propagate new plants.
// The concentric leaf bases of the developing plant swell to form the underground edible bulb.
// Most commercially cultivated onions are grown from the plant’s small black seeds, which are sown directly in the field, but onions may also be grown from small bulbs or from transplants.
// Onions are very hardy and can survive in a wide range of growing conditions.
// The bulbs vary in size, shape, colour, and pungency, though warmer climates generally produce onions with a milder, sweeter flavour than do other climates.
// The onion’s characteristic pungency results from the sulfur-rich volatile oil it contains; the release of this oil during peeling or chopping brings tears to the eyes.',
//             'short_description'=>'Onions are low in nutrients but are valued for their flavour and are used widely in cooking. They add flavour to such dishes as stews, roasts, soups, and salads and are also served as a cooked vegetable.',
//             'category'=>'vegetables',
//             'product_size'=>'small'
//         ] );


    }
}
