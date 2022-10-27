<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        /** Slider */
        for ($i=0; $i <= 2; $i++) { 
            Content::create([
                'section_id' => 1,
                'order'     => 'AA',
                'image'     => 'images/home/Mask_Group_209.png',
                'content_1' => 'DIFRA CNC',
                'content_2' => 'Fabrica de Routers, Pantógrafos y Fresadoras CNC 3D, Accesorios, Repuestos'
            ]);
        }

        Content::create([
            'section_id'    => 2,
            'order'         => 'AA',
            'image'         => 'images/home/Mask_Group_248.png',
            'content_1'     => 'DIFRA CNC',
            'content_2'     => '<p>Difra CNC es una empresa argentina con más de 24 años de experiencia. Desde el año 1994 nos enfocamos en el mercado industrial, fabricando equipos CAD / CAM / CNC.</p>',
        ]);
        
        Content::create([
            'section_id'    => 3,
            'content_1'     => 'NUESTRAS REDES SOCIALES',
            'content_2'     => 'images/home/Mask_Group_268.png',
            'content_3'     => 'images/home/Mask_Group_268.png',
        ]);


        /** Fin home page */

        /** Empresa  */

        for ($i=0; $i < 2; $i++) { 
            Content::create([
                'section_id'    => 4,
                'order'         => 'AA',
                'image'         => 'images/company/Mask_Group_194.png',
            ]);
        }

        
        Content::create([
            'section_id'    => 5,
            'image'         => 'images/company/Mask_Group_249.png',
            'content_1'     => '<p>Difra CNC es una empresa argentina con más de 24 años de experiencia. Desde el año 1994 nos enfocamos en el mercado industrial, fabricando equipos CAD / CAM / CNC.</p>
            <p>La empresa está conformada por personal que posee una gran trayectoria en la industria, que le permite brindarle todos sus conocimientos en la fabricación y reparación de fresadoras cnc y routers cnc.</p>
            <p>"Su equipo CNC debe ser una herramienta que le brinde rapidez, rendimiento y mejor calidad en su trabajo. Combinando estructura, tecnología de avanzada y diseños dinámicos DIFRA CNC le brinda la tranquilidad y garantía necesaria para que en su fábrica o taller la produccion sea inigualable."</p>
            <p>Nuestros equipos son fabricados y ensamblados en Argentina, utilizando los mejores componentes de calidad certificada originarios en Italia, Japón, Estados Unidos, Alemania, y Argentina, teniendo en cuenta a cada cliente en forma particular, de esta manera obtendrá la máquina que realmente necesita.</p>
            <p>Somos proveedores de maquinaria industrial y equipos de control numérico computarizados, sus componentes y accesorios.</p>
            <p>Como así también equipos standard y máquinas especiales a medida de cada necesidad.</p>
            <p>Con cada equipo proveemos un manual de uso con instrucciones claras para que Ud. y su personal puedan operarlo con tranquilidad, pero también brindamos servicio técnico personalizado.</p>',
        ]);

        Content::create([
            'section_id'    => 6,
            'content_1'     => 'EQUIPOS',
            'content_2'     => '<p>Los equipos incluyen una consola de operación de fácil manejo; la capacidad de almacenamiento del control numérico, de varios Gigabytes, logran guardar en el mismo varios archivos de trabajo, los cuales pueden ser almacenados mediante los puertos de RED y USB.</p>',
            'content_3'     => '<p>Además se puede trabajar sin estar conectada a una computadora donde se hacen los archivos de diseño / trabajos. Algunos equipos especiales cuentan con consolas de EU y EEUU para manejar hasta 6 ejes simultáneos.</p>',
        ]);
        
        Content::create([
            'section_id' => 7,
            'order'     => 'AA',
            'image'     => 'images/technical_service/configuraciones.svg',
            'content_1' => 'SOPORTE TÉCNICO',
            'content_2' => '<p>Actualización, reparación y mantenimiento de todos los Routers y Fresadoras a Control Numérico, Importados y Nacionales.</p>',
        ]);

        Content::create([
            'section_id' => 7,
            'order'     => 'AA',
            'image'     => 'images/technical_service/bosquejo.svg',
            'content_1' => 'CAPACITACIÓN',
            'content_2' => '<p>La venta de todo equipo incluye un Curso de Capacitación. El curso comprenderá aspectos teóricos, aplicaciones generales y particulares para su requerimiento específico.</p>',
        ]);

        Content::create([
            'section_id' => 7,
            'order'     => 'AA',
            'image'     => 'images/technical_service/Path_3914.svg',
            'content_1' => 'CURSO DE CAPACITACIÓN',
            'content_2' => '<p>Instalaciones necesarias (incluye Manual de Pre-Instalación). Instalación y Puesta en Marcha. Operación de la máquina (incluye Manual de Operación).</p>',
        ]);

        Content::create([
            'section_id' => 7,
            'order'     => 'AA',
            'image'     => 'images/technical_service/cliente.svg',
            'content_1' => 'GARANTÍA',
            'content_2' => '<p>Cada equipo tiene garantía por 1 (un) año. La misma comprende la totalidad de la máquina ya que, ante un eventual desperfecto en alguna parte (importada o nacional), nosotros respondemos por la misma. Para que la garantía sea efectiva, se deberá haber realizado el curso, tener las instalaciones correctamente efectuadas, y el uso deberá haber sido el adecuado según el Manual de la misma.</p>',
        ]);

        Content::create([
            'section_id' => 7,
            'order'     => 'AA',
            'image'     => 'images/technical_service/servicio_al_cliente.svg',
            'content_1' => 'ASISTENCIA TÉCNICA TELEFÓNICA',
            'content_2' => '<p>Asistencia técnica telefónica para resolver inquietudes. Un técnico especializado lo atenderá para resolver de la mejor manera posible su inquietud, tanto en lo que hace al manejo del equipo como del Software de CAD/CAM.</p>',
        ]);

        Content::create([
            'section_id' => 7,
            'order'     => 'AA',
            'image'     => 'images/technical_service/Path_3915.svg',
            'content_1' => 'MANUAL DE OPERACIÓN',
            'content_2' => '<p>Cuando Ud. asiste al curso de capacitación se le entrega el manual de operación, totalmente en español, y si fuera necesario también en portugués e inglés. En el mismo encontrará las instrucciones de manejo, parámetros de seteo y explicaciones sobre opcionales de la máquina.</p>',
        ]);

        Content::create([
            'section_id' => 7,
            'order'     => 'AA',
            'image'     => 'images/technical_service/maquina_de_prensa.svg',
            'content_1' => 'SERVICIO TÉCNICO Y REPUESTOS',
            'content_2' => '<p>Contamos con un reconocido servicio técnico para la reparación de equipos, con stock de repuestos para todos los modelos vendidos. Otras circunstancias pueden requerir la remisión del equipo a nuestra oficina, garantizando la reparación en el término de 48 a 72 hs. o más dependiendo del problema.</p>',
        ]);

        Content::create([
            'section_id' => 7,
            'order'     => 'AA',
            'image'     => 'images/technical_service/Group_3404.svg',
            'content_1' => 'SERVICIO DE MANTENIMIENTO',
            'content_2' => '<p>El mantenimiento de la máquina está detallado completamente en el manual de operación. Si Ud. lo prefiere también ofrecemos el servicio a costo accesible (no incluye viáticos ni estadías).</p>',
        ]);

        Content::create([
            'section_id' => 8,
            'order'     => 'AA',
            'image'     => 'images/applications/Group_3404.svg',
            'content_1' => 'MOLDES Y MATRICES',
            'content_2' => '<p>Moldes y matrices para calzados, indumentaria, juguetería, joyería, medicina, odontología, arte, esculturas, publicidad, naval, automotriz, militar, etc.</p>',
        ]);

        Content::create([
            'section_id' => 8,
            'order'     => 'AA',
            'image'     => 'images/applications/Mask_Group_251.png',
            'content_1' => 'MODELOS',
            'content_2' => '<p>Modelos para inyección y fundición, soplado o termoformado.</p>',
        ]);

        Content::create([
            'section_id' => 8,
            'order'     => 'AA',
            'image'     => 'images/applications/Mask_Group_252.png',
            'content_1' => 'EQUIPOS PARA FABRICACIÓN',
            'content_2' => '<p>Equipos para fabricación de piezas de esculturas y marcos artísticos.</p>',
        ]);

        Content::create([
            'section_id' => 9,
            'order'     => 'AA',
            'image'     => '<iframe width="640" height="360" src="https://www.youtube.com/embed/6HIry-2FzP4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'content_1' => 'EXPO FIMAQH 2021',
            'content_2' => '<p>Routers CNC 3D *DIFRACNC* en funcionamiento. - Diversos mecanizados, materiales y herramientas.</p>',
        ]);

        Content::create([
            'section_id' => 9,
            'order'     => 'BB',
            'image'     => '<iframe width="640" height="360" src="https://www.youtube.com/embed/6HIry-2FzP4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'content_1' => 'CORTE CARTÓN CORRUGADO',
            'content_2' => '<p>D9013 con HUSILLO de 3HP + CABEZAL TANGENCIAL OSCILANTE</p>',
        ]);

        Content::create([
            'section_id' => 9,
            'order'     => 'CC',
            'image'     => '<iframe width="640" height="360" src="https://www.youtube.com/embed/6HIry-2FzP4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'content_1' => 'MECANIZADO ALFOMBRA SANITIZANTE',
            'content_2' => '<p>ROUTER CNC 3D • Marca: DIFRA CNC Equipo Especial diseñado con Husillo de 3HP + Cabezal Tangencial Oscilante</p>',
        ]);
        
        Content::create([
            'section_id' => 10,
            'order'     => 'AA',
            'image'     => 'images/clients/Image_284.png',
        ]);

        Content::create([
            'section_id' => 10,
            'order'     => 'BB',
            'image'     => 'images/clients/Image_285.png',
        ]);

        Content::create([
            'section_id' => 10,
            'order'     => 'CC',
            'image'     => 'images/clients/Image_286.png',
        ]);

        Content::create([
            'section_id' => 10,
            'order'     => 'DD',
            'image'     => 'images/clients/Image_291.png',
        ]);

        Content::create([
            'section_id' => 10,
            'order'     => 'FF',
            'image'     => 'images/clients/Image_294.png',
        ]);

        Content::create([
            'section_id' => 10,
            'order'     => 'FF',
            'image'     => 'images/clients/Image_287.png',
        ]);
    }
}

    