<?php

namespace Database\Seeders;

use App\Models\Organismo;
use Illuminate\Database\Seeder;

class OrganismoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organismos = [


            ['codigo' => 1, 'cuit'=>1,'jurisdiccion_id' =>  1, 'organismo' => 'MINISTERIO DE SEGURIDAD', 'created_at' => now()],
            ['codigo' => 10000, 'cuit'=>2,'jurisdiccion_id' =>  1, 'organismo' => 'Organismo 10000', 'created_at' => now()],
            ['codigo' => 2, 'cuit'=>3,'jurisdiccion_id' =>  2, 'organismo' => 'MINIS. DE HACIENDA Y FINANZAS', 'created_at' => now()],
            ['codigo' => 3, 'cuit'=>4,'jurisdiccion_id' =>  3, 'organismo' => 'MINISTERIO DE EDUCACIÓN', 'created_at' => now()],
            ['codigo' => 4, 'cuit'=>5,'jurisdiccion_id' =>  4, 'organismo' => 'SALUD PUBLICA', 'created_at' => now()],
            ['codigo' => 5, 'cuit'=>6,'jurisdiccion_id' =>  5, 'organismo' => 'MINISTERIO DE LA PRODUCCIÓN', 'created_at' => now()],
            ['codigo' => 6, 'cuit'=>7,'jurisdiccion_id' =>  6, 'organismo' => 'MRIO. DE OBRAS Y SERV. PÚBLICOS', 'created_at' => now()],
            ['codigo' => 7, 'cuit'=>8,'jurisdiccion_id' =>  7, 'organismo' => 'MINISTERIO SECRETARIA GENERAL', 'created_at' => now()],
            ['codigo' => 8, 'cuit'=>9,'jurisdiccion_id' =>  8, 'organismo' => 'HONORABLE TRIBUNAL DE CUENTAS', 'created_at' => now()],
            ['codigo' => 9, 'cuit'=>10,'jurisdiccion_id' =>  9, 'organismo' => 'PODER JUDICIAL', 'created_at' => now()],
            ['codigo' => 11, 'cuit'=>11,'jurisdiccion_id' => 10, 'organismo' => 'PODER LEGISLATIVO', 'created_at' => now()],
            ['codigo' => 12, 'cuit'=>12,'jurisdiccion_id' => 11, 'organismo' => 'FISCALÍA DE ESTADO', 'created_at' => now()],
            ['codigo' => 13, 'cuit'=>13,'jurisdiccion_id' => 12, 'organismo' => 'MINISTERIO DE COORDINACIÓN Y PLANIFICACIÓN', 'created_at' => now()],
            ['codigo' => 14, 'cuit'=>14,'jurisdiccion_id' => 13, 'organismo' => 'MINISTERIO DE DESARROLLO SOCIAL', 'created_at' => now()],
            ['codigo' => 15, 'cuit'=>15,'jurisdiccion_id' => 14, 'organismo' => 'DIRECCIÓN ENSEÑANZA PRIVADA', 'created_at' => now()],
            ['codigo' => 16, 'cuit'=>16,'jurisdiccion_id' => 15, 'organismo' => 'MINIST. DE JUSTICIA Y DERECHOS HUMANOS', 'created_at' => now()],
            ['codigo' => 17, 'cuit'=>17,'jurisdiccion_id' => 16, 'organismo' => 'SECRETARIA DE ENERGÍA', 'created_at' => now()],
            ['codigo' => 18, 'cuit'=>18,'jurisdiccion_id' => 17, 'organismo' => 'MINIST. DE INDUSTRIA, TRABAJO Y COMERCIO', 'created_at' => now()],
            ['codigo' => 19, 'cuit'=>19,'jurisdiccion_id' => 18, 'organismo' => 'MINISTERIO DE TURISMO', 'created_at' => now()],
            ['codigo' => 21, 'cuit'=>20,'jurisdiccion_id' => 19, 'organismo' => 'INSTITUTO LOTERÍA Y CASINOS', 'created_at' => now()],
            ['codigo' => 22, 'cuit'=>21,'jurisdiccion_id' => 20, 'organismo' => 'JEFATURA DE POLICÍA', 'created_at' => now()],
            ['codigo' => 23, 'cuit'=>22,'jurisdiccion_id' => 21, 'organismo' => 'ENSEÑANZA MEDIA Y SUPERIOR', 'created_at' => now()],
            ['codigo' => 24, 'cuit'=>23,'jurisdiccion_id' => 22, 'organismo' => 'INSTITUTO CORRENTINO DEL AGUA', 'created_at' => now()],
            ['codigo' => 25, 'cuit'=>24,'jurisdiccion_id' => 23, 'organismo' => 'VIALIDAD PROVINCIAL', 'created_at' => now()],
            ['codigo' => 26, 'cuit'=>25,'jurisdiccion_id' => 24, 'organismo' => 'INSTITUTO DE LA VIVIENDA', 'created_at' => now()],
            ['codigo' => 27, 'cuit'=>26,'jurisdiccion_id' => 25, 'organismo' => 'INSTIT. PROVINCIAL DEL TABACO', 'created_at' => now()],
            ['codigo' => 29, 'cuit'=>27,'jurisdiccion_id' => 26, 'organismo' => 'INSTITUTO PREVISIÓN SOCIAL', 'created_at' => now()],
            ['codigo' => 30, 'cuit'=>28,'jurisdiccion_id' => 27, 'organismo' => 'INSTITUTO DE DESARROLLO RURAL CORRIENTES', 'created_at' => now()],
            ['codigo' => 31, 'cuit'=>29,'jurisdiccion_id' => 28, 'organismo' => 'ADMINIST. DE OBRAS SANITARIAS', 'created_at' => now()],
            ['codigo' => 32, 'cuit'=>30,'jurisdiccion_id' => 29, 'organismo' => 'INST.OBRA SOCIAL DE LA PROVIN.', 'created_at' => now()],
            ['codigo' => 33, 'cuit'=>31,'jurisdiccion_id' => 30, 'organismo' => 'CONSEJO GENERAL DE EDUCACIÓN', 'created_at' => now()],
            ['codigo' => 34, 'cuit'=>32,'jurisdiccion_id' => 31, 'organismo' => 'INSTITUTO DE CARDIOLOGÍA', 'created_at' => now()],
            ['codigo' => 37, 'cuit'=>33,'jurisdiccion_id' => 32, 'organismo' => 'CONSEJO GENERAL DE EDUCACIÓN SUPLENTES', 'created_at' => now()],
            ['codigo' => 38, 'cuit'=>34,'jurisdiccion_id' => 33, 'organismo' => 'INSTITUTO DE CULTURA', 'created_at' => now()],
            ['codigo' => 101, 'cuit'=>35,'jurisdiccion_id' => 34, 'organismo' => 'Municipalidad de ALVEAR', 'created_at' => now()],
            ['codigo' => 102, 'cuit'=>36,'jurisdiccion_id' => 35, 'organismo' => 'Municipalidad de B. DE ASTRADA', 'created_at' => now()],
            ['codigo' => 103, 'cuit'=>37,'jurisdiccion_id' => 36, 'organismo' => 'Municipalidad de BELLA VISTA', 'created_at' => now()],
            ['codigo' => 104, 'cuit'=>38,'jurisdiccion_id' => 37, 'organismo' => 'Municipalidad de BOMPLAND', 'created_at' => now()],
            ['codigo' => 105, 'cuit'=>39,'jurisdiccion_id' => 38, 'organismo' => 'Municipalidad de C. C. PELLEGRINI', 'created_at' => now()],
            ['codigo' => 106, 'cuit'=>40,'jurisdiccion_id' => 39, 'organismo' => 'Municipalidad de C. MOCORETA', 'created_at' => now()],
            ['codigo' => 107, 'cuit'=>41,'jurisdiccion_id' => 40, 'organismo' => 'Municipalidad de CAA CATI', 'created_at' => now()],
            ['codigo' => 108, 'cuit'=>42,'jurisdiccion_id' => 41, 'organismo' => 'Municipalidad de CAJA MUNICIPAL DE PRESTAMOS', 'created_at' => now()],
            ['codigo' => 109, 'cuit'=>43,'jurisdiccion_id' => 42, 'organismo' => 'Municipalidad de CAROLINA', 'created_at' => now()],
            ['codigo' => 110, 'cuit'=>44,'jurisdiccion_id' => 43, 'organismo' => 'Municipalidad de CHAVARRIA', 'created_at' => now()],
            ['codigo' => 111, 'cuit'=>45,'jurisdiccion_id' => 44, 'organismo' => 'Municipalidad de COL. LIBERTAD', 'created_at' => now()],
            ['codigo' => 112, 'cuit'=>46,'jurisdiccion_id' => 45, 'organismo' => 'Municipalidad de COLONIA LIEBIG', 'created_at' => now()],
            ['codigo' => 113, 'cuit'=>47,'jurisdiccion_id' => 46, 'organismo' => 'Municipalidad de COLONIA PANDO', 'created_at' => now()],
            ['codigo' => 114, 'cuit'=>48,'jurisdiccion_id' => 47, 'organismo' => 'Municipalidad de CONCEPCION', 'created_at' => now()],
            ['codigo' => 115, 'cuit'=>49,'jurisdiccion_id' => 48, 'organismo' => 'Municipalidad de CRUZ DE LOS MILAGROS', 'created_at' => now()],
            ['codigo' => 116, 'cuit'=>50,'jurisdiccion_id' => 49, 'organismo' => 'Municipalidad de CTES. CAPITAL', 'created_at' => now()],
            ['codigo' => 117, 'cuit'=>51,'jurisdiccion_id' => 50, 'organismo' => 'Municipalidad de CURUZU CUATIA', 'created_at' => now()],
            ['codigo' => 118, 'cuit'=>52,'jurisdiccion_id' => 51, 'organismo' => 'Municipalidad de EL SOMBRERO', 'created_at' => now()],
            ['codigo' => 119, 'cuit'=>53,'jurisdiccion_id' => 52, 'organismo' => 'Municipalidad de EMPEDRADO', 'created_at' => now()],
            ['codigo' => 120, 'cuit'=>54,'jurisdiccion_id' => 53, 'organismo' => 'Municipalidad de ESQUINA', 'created_at' => now()],
            ['codigo' => 121, 'cuit'=>55,'jurisdiccion_id' => 54, 'organismo' => 'Municipalidad de ESTACION TORRENT', 'created_at' => now()],
            ['codigo' => 122, 'cuit'=>56,'jurisdiccion_id' => 55, 'organismo' => 'Municipalidad de FELIPE YOFRE', 'created_at' => now()],
            ['codigo' => 123, 'cuit'=>57,'jurisdiccion_id' => 56, 'organismo' => 'Municipalidad de GARRUCHOS', 'created_at' => now()],
            ['codigo' => 124, 'cuit'=>58,'jurisdiccion_id' => 57, 'organismo' => 'Municipalidad de GDOR. MARTINEZ', 'created_at' => now()],
            ['codigo' => 125, 'cuit'=>59,'jurisdiccion_id' => 58, 'organismo' => 'Municipalidad de GOB. VIRASORO', 'created_at' => now()],
            ['codigo' => 126, 'cuit'=>60,'jurisdiccion_id' => 59, 'organismo' => 'Municipalidad de GOYA', 'created_at' => now()],
            ['codigo' => 127, 'cuit'=>61,'jurisdiccion_id' => 60, 'organismo' => 'Municipalidad de GUAVIRAVI', 'created_at' => now()],
            ['codigo' => 128, 'cuit'=>62,'jurisdiccion_id' => 61, 'organismo' => 'Municipalidad de HERLITZKA', 'created_at' => now()],
            ['codigo' => 129, 'cuit'=>63,'jurisdiccion_id' => 62, 'organismo' => 'Municipalidad de ITA IBATE', 'created_at' => now()],
            ['codigo' => 130, 'cuit'=>64,'jurisdiccion_id' => 63, 'organismo' => 'Municipalidad de ITATI', 'created_at' => now()],
            ['codigo' => 131, 'cuit'=>65,'jurisdiccion_id' => 64, 'organismo' => 'Municipalidad de ITUZAINGO', 'created_at' => now()],
            ['codigo' => 132, 'cuit'=>66,'jurisdiccion_id' => 65, 'organismo' => 'Municipalidad de JOSE R.GOMEZ (GARAVI)', 'created_at' => now()],
            ['codigo' => 133, 'cuit'=>67,'jurisdiccion_id' => 66, 'organismo' => 'Municipalidad de JUAN PUJOL', 'created_at' => now()],
            ['codigo' => 134, 'cuit'=>68,'jurisdiccion_id' => 67, 'organismo' => 'Municipalidad de L. DE VALLEJOS', 'created_at' => now()],
            ['codigo' => 135, 'cuit'=>69,'jurisdiccion_id' => 68, 'organismo' => 'Municipalidad de LA CRUZ', 'created_at' => now()],
            ['codigo' => 136, 'cuit'=>70,'jurisdiccion_id' => 69, 'organismo' => 'Municipalidad de LAVALLE', 'created_at' => now()],
            ['codigo' => 137, 'cuit'=>71,'jurisdiccion_id' => 70, 'organismo' => 'Municipalidad de LORETO', 'created_at' => now()],
            ['codigo' => 138, 'cuit'=>72,'jurisdiccion_id' => 71, 'organismo' => 'Municipalidad de MARIANO I. LOZA', 'created_at' => now()],
            ['codigo' => 139, 'cuit'=>73,'jurisdiccion_id' => 72, 'organismo' => 'Municipalidad de MBURUCUYA', 'created_at' => now()],
            ['codigo' => 140, 'cuit'=>74,'jurisdiccion_id' => 73, 'organismo' => 'Municipalidad de MERCEDES', 'created_at' => now()],
            ['codigo' => 141, 'cuit'=>75,'jurisdiccion_id' => 74, 'organismo' => 'Municipalidad de MONTE CASEROS', 'created_at' => now()],
            ['codigo' => 142, 'cuit'=>76,'jurisdiccion_id' => 75, 'organismo' => 'Municipalidad de NUEVE DE JULIO', 'created_at' => now()],
            ['codigo' => 143, 'cuit'=>77,'jurisdiccion_id' => 76, 'organismo' => 'Municipalidad de P. DE LA PATRIA', 'created_at' => now()],
            ['codigo' => 144, 'cuit'=>78,'jurisdiccion_id' => 77, 'organismo' => 'Municipalidad de P. DE LOS LIBRES', 'created_at' => now()],
            ['codigo' => 145, 'cuit'=>79,'jurisdiccion_id' => 78, 'organismo' => 'Municipalidad de P. LIBERTADOR', 'created_at' => now()],
            ['codigo' => 146, 'cuit'=>80,'jurisdiccion_id' => 79, 'organismo' => 'Municipalidad de P. R. FERNANDEZ', 'created_at' => now()],
            ['codigo' => 147, 'cuit'=>81,'jurisdiccion_id' => 80, 'organismo' => 'Municipalidad de PAGO DE LOS DESEOS', 'created_at' => now()],
            ['codigo' => 148, 'cuit'=>82,'jurisdiccion_id' => 81, 'organismo' => 'Municipalidad de PALMAR GRANDE', 'created_at' => now()],
            ['codigo' => 149, 'cuit'=>83,'jurisdiccion_id' => 82, 'organismo' => 'Municipalidad de PARADA PUCHETA', 'created_at' => now()],
            ['codigo' => 150, 'cuit'=>84,'jurisdiccion_id' => 83, 'organismo' => 'Municipalidad de PERUGORRIA', 'created_at' => now()],
            ['codigo' => 151, 'cuit'=>85,'jurisdiccion_id' => 84, 'organismo' => 'Municipalidad de RAMADA PASO', 'created_at' => now()],
            ['codigo' => 152, 'cuit'=>86,'jurisdiccion_id' => 85, 'organismo' => 'Municipalidad de RIACHUELO', 'created_at' => now()],
            ['codigo' => 153, 'cuit'=>87,'jurisdiccion_id' => 86, 'organismo' => 'Municipalidad de S. L DEL PALMAR', 'created_at' => now()],
            ['codigo' => 154, 'cuit'=>88,'jurisdiccion_id' => 87, 'organismo' => 'Municipalidad de SALADAS', 'created_at' => now()],
            ['codigo' => 155, 'cuit'=>89,'jurisdiccion_id' => 88, 'organismo' => 'Municipalidad de SAN ANTONIO APIPE', 'created_at' => now()],
            ['codigo' => 156, 'cuit'=>90,'jurisdiccion_id' => 89, 'organismo' => 'Municipalidad de SAN CARLOS', 'created_at' => now()],
            ['codigo' => 157, 'cuit'=>91,'jurisdiccion_id' => 90, 'organismo' => 'Municipalidad de SAN COSME', 'created_at' => now()],
            ['codigo' => 158, 'cuit'=>92,'jurisdiccion_id' => 91, 'organismo' => 'Municipalidad de SAN ISIDRO', 'created_at' => now()],
            ['codigo' => 159, 'cuit'=>93,'jurisdiccion_id' => 92, 'organismo' => 'Municipalidad de SAN LORENZO', 'created_at' => now()],
            ['codigo' => 160, 'cuit'=>94,'jurisdiccion_id' => 93, 'organismo' => 'Municipalidad de SAN MIGUEL', 'created_at' => now()],
            ['codigo' => 161, 'cuit'=>95,'jurisdiccion_id' => 94, 'organismo' => 'Municipalidad de SAN ROQUE', 'created_at' => now()],
            ['codigo' => 162, 'cuit'=>96,'jurisdiccion_id' => 95, 'organismo' => 'Municipalidad de SANTA ANA', 'created_at' => now()],
            ['codigo' => 163, 'cuit'=>97,'jurisdiccion_id' => 96, 'organismo' => 'Municipalidad de SANTA LUCIA', 'created_at' => now()],
            ['codigo' => 164, 'cuit'=>98,'jurisdiccion_id' => 97, 'organismo' => 'Municipalidad de SANTA ROSA', 'created_at' => now()],
            ['codigo' => 165, 'cuit'=>99,'jurisdiccion_id' => 98, 'organismo' => 'Municipalidad de SANTO TOME', 'created_at' => now()],
            ['codigo' => 166, 'cuit'=>100,'jurisdiccion_id' => 99, 'organismo' => 'Municipalidad de SAUCE', 'created_at' => now()],
            ['codigo' => 167, 'cuit'=>101,'jurisdiccion_id' => 100, 'organismo' => 'Municipalidad de TABAY', 'created_at' => now()],
            ['codigo' => 168, 'cuit'=>102,'jurisdiccion_id' => 101, 'organismo' => 'Municipalidad de TAPEBICUA', 'created_at' => now()],
            ['codigo' => 169, 'cuit'=>103,'jurisdiccion_id' => 102, 'organismo' => 'Municipalidad de TATACUA', 'created_at' => now()],
            ['codigo' => 170, 'cuit'=>104,'jurisdiccion_id' => 103, 'organismo' => 'Municipalidad de TRES DE ABRIL', 'created_at' => now()],
            ['codigo' => 171, 'cuit'=>105,'jurisdiccion_id' => 104, 'organismo' => 'Municipalidad de VILLA OLAVARI', 'created_at' => now()],
            ['codigo' => 172, 'cuit'=>106,'jurisdiccion_id' => 105, 'organismo' => 'Municipalidad de YAPEYU', 'created_at' => now()],
            ['codigo' => 173, 'cuit'=>107,'jurisdiccion_id' => 106, 'organismo' => 'Municipalidad de YATAITI CALLE', 'created_at' => now()],


            ['codigo' => 1000, 'cuit'=>108,'jurisdiccion_id' => 107, 'organismo' => 'Direccion Provincial de energias de Ctes', 'created_at' => now()],




        ];
        Organismo::insert($organismos);
    }
}
