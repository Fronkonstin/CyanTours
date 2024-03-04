
drop database if exists cyan;
create database cyan;
SET NAMES utf8mb4;
use cyan;


CREATE TABLE pais (
    id_pais INT AUTO_INCREMENT,
    nombre_pais VARCHAR(50),
    descripcion_pais VARCHAR(500),
    ruta_img_pais VARCHAR(50),
    PRIMARY KEY (id_pais)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE ciudad (
    id_ciudad INT AUTO_INCREMENT,
    nombre_ciudad VARCHAR(50),
    descripcion_ciudad VARCHAR(500),
    ruta_img_ciudad VARCHAR(50),
    id_pais INT,
    PRIMARY KEY (id_ciudad),
    FOREIGN KEY (id_pais) REFERENCES pais(id_pais)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE tour (
    id_tour INT AUTO_INCREMENT,
    nombre_tour VARCHAR(50),
    descripcion_1 VARCHAR(500),
    descripcion_2 VARCHAR(500),
    descripcion_3 VARCHAR(500),
    descripcion_4 VARCHAR(500),
    ruta_img_tour VARCHAR(50),
    punto_inicio VARCHAR(50),
    punto_final VARCHAR(50),
    id_ciudad INT,
    PRIMARY KEY (id_tour),
    FOREIGN KEY (id_ciudad) REFERENCES ciudad(id_ciudad)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE usuario (
    id_usuario INT AUTO_INCREMENT,
    nombre VARCHAR(50),
    apellidos VARCHAR(50),
    email VARCHAR(50),
    PRIMARY KEY (id_usuario)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE reserva (
    id_reserva VARCHAR(36),
    num_personas INT,
    fecha_reserva DATE,
    fecha_actual DATETIME,
    estado_reserva boolean DEFAULT 1,
    id_tour INT,
    id_usuario INT,
    PRIMARY KEY (id_reserva),
    FOREIGN KEY (id_tour) REFERENCES tour(id_tour),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/*PAISES*/
INSERT INTO pais (nombre_pais, descripcion_pais, ruta_img_pais) VALUES ('Alemania', 'Alemania es un país ubicado en Europa Central, conocido por su rica historia, cultura y tecnología avanzada. Es famoso por su arquitectura, música clásica, automóviles de alta calidad y su papel como líder económico en Europa.', './imgs/pais/Alemania.jpg');
INSERT INTO pais (nombre_pais, descripcion_pais, ruta_img_pais) VALUES ('Bélgica', 'Bélgica es un país situado en Europa Occidental, conocido por su capital, Bruselas, que es considerada la capital de la Unión Europea. Bélgica es famosa por sus deliciosos chocolates, cervezas especiales, patrimonio arquitectónico y su diversidad cultural y lingüística.', './imgs/pais/Belgica.jpg');
INSERT INTO pais (nombre_pais, descripcion_pais, ruta_img_pais) VALUES ('República Checa', 'La República Checa, ubicada en Europa Central, es conocida por su rica historia y su arquitectura impresionante. Praga, la capital, es famosa por su casco antiguo medieval, su castillo y su puente de Carlos. El país es conocido por su cerveza, sus balnearios y su herencia cultural.', './imgs/pais/RepublicaCheca.jpg');
INSERT INTO pais (nombre_pais, descripcion_pais, ruta_img_pais) VALUES ('Países Bajos', 'Los Países Bajos, también conocidos como Holanda, se encuentran en Europa Occidental. Son famosos por sus campos de tulipanes, sus molinos de viento, sus canales y su cultura ciclista. Ámsterdam, la capital, es conocida por sus museos, como el Rijksmuseum y el Museo Van Gogh.', './imgs/pais/PaisesBajos.jpg');
INSERT INTO pais (nombre_pais, descripcion_pais, ruta_img_pais) VALUES ('Francia', 'Francia, situada en Europa Occidental, es conocida por su rica historia, su arte y su cultura. París, la capital de Francia, es famosa por la Torre Eiffel, el Museo del Louvre y la moda. El país es reconocido por su cocina gourmet, sus viñedos, su moda y su influencia en la cultura occidental.', './imgs/pais/Francia.jpg');
INSERT INTO pais (nombre_pais, descripcion_pais, ruta_img_pais) VALUES ('Portugal', 'Portugal, ubicado en el suroeste de Europa, es conocido por sus hermosas playas, su historia marítima y su vino de Oporto. Lisboa, la capital, es famosa por su encanto histórico y sus callejuelas empedradas. El país tiene una rica cultura, con influencias tanto de Europa como de África.', './imgs/pais/Portugal.jpg');
INSERT INTO pais (nombre_pais, descripcion_pais, ruta_img_pais) VALUES ('Italia', 'Italia, situada en Europa del Sur, es famosa por su historia antigua, su arte, su arquitectura y su gastronomía. Roma, la capital de Italia, alberga el Coliseo y el Vaticano. Otras ciudades importantes incluyen Milán, Florencia y Venecia. Italia es famosa por su pasta, pizza, moda y sus impresionantes paisajes.', './imgs/pais/Italia.jpg');
INSERT INTO pais (nombre_pais, descripcion_pais, ruta_img_pais) VALUES ('Reino Unido', 'El Reino Unido, formado por Inglaterra, Escocia, Gales e Irlanda del Norte, es conocido por su historia, su cultura y su influencia global. Londres, la capital, es famosa por sus monumentos icónicos como el Big Ben y el Palacio de Buckingham. El Reino Unido es conocido por su música, literatura, deportes y su famoso té de la tarde.', './imgs/pais/ReinoUnido.jpg');

/*CIUDADES*/
INSERT INTO ciudad (nombre_ciudad, descripcion_ciudad, ruta_img_ciudad, id_pais) VALUES ('Berlin', 'La capital de Alemania, Berlín, es una ciudad vibrante y cosmopolita que combina una rica historia con una escena artística y cultural en constante evolución. La ciudad es famosa por sus monumentos históricos, como el Muro de Berlín y la Puerta de Brandenburgo, así como por su vida nocturna y sus diversos barrios.', './imgs/ciudad/Berlin.jpg', 1);
INSERT INTO ciudad (nombre_ciudad, descripcion_ciudad, ruta_img_ciudad, id_pais) VALUES ('Bruselas', 'La capital de Bélgica y la sede de la Unión Europea, Bruselas es conocida por sus hermosas plazas, su arquitectura histórica y su deliciosa comida. La ciudad es famosa por su Grand Place, su Manneken Pis y sus exquisitos chocolates y cervezas.', './imgs/ciudad/Bruselas.jpg', 2);
INSERT INTO ciudad (nombre_ciudad, descripcion_ciudad, ruta_img_ciudad, id_pais) VALUES ('Praga', 'La capital de la República Checa, Praga, es famosa por su hermosa arquitectura gótica, sus calles empedradas y su castillo histórico. La ciudad cuenta con el famoso Puente de Carlos y la Plaza de la Ciudad Vieja, que es el corazón histórico de la ciudad.', './imgs/ciudad/Praga.jpg', 3);
INSERT INTO ciudad (nombre_ciudad, descripcion_ciudad, ruta_img_ciudad, id_pais) VALUES ('Ámsterdam', 'La capital de los Países Bajos, Amsterdam es conocida por sus hermosos canales, sus casas históricas y sus museos de renombre, como el Museo Van Gogh y el Rijksmuseum. La ciudad tiene una vibrante escena cultural y cuenta con una actitud tolerante hacia diversas formas de vida.', './imgs/ciudad/Amsterdam.jpg', 4);
INSERT INTO ciudad (nombre_ciudad, descripcion_ciudad, ruta_img_ciudad, id_pais) VALUES ('París', 'La capital de Francia, París, es conocida como la "Ciudad de la Luz" y es famosa por sus icónicos monumentos, su arte y su cultura. Desde la Torre Eiffel hasta el Louvre y la Catedral de Notre-Dame, la ciudad ofrece una experiencia inigualable.', './imgs/ciudad/Paris.jpg', 5);
INSERT INTO ciudad (nombre_ciudad, descripcion_ciudad, ruta_img_ciudad, id_pais) VALUES ('Lisboa', 'La capital de Portugal, Lisboa, es una ciudad encantadora con una rica historia marítima. Con sus callejuelas empedradas, sus azulejos coloridos y su famoso tranvía, Lisboa ofrece vistas panorámicas desde sus colinas y una animada escena cultural.', './imgs/ciudad/Lisboa.jpg', 6);
INSERT INTO ciudad (nombre_ciudad, descripcion_ciudad, ruta_img_ciudad, id_pais) VALUES ('Oporto', 'Situada en Portugal, Oporto es conocida por su vino de Oporto y sus impresionantes bodegas a orillas del río Duero. La ciudad también cuenta con una arquitectura encantadora, como la iglesia de San Francisco y la librería Lello.', './imgs/ciudad/Oporto.jpg', 6);
INSERT INTO ciudad (nombre_ciudad, descripcion_ciudad, ruta_img_ciudad, id_pais) VALUES ('Roma', 'La capital de Italia, Roma, es conocida como la "Ciudad Eterna" debido a su rica historia y su legado duradero. La ciudad alberga monumentos impresionantes como el Coliseo, el Foro Romano y el Panteón. Roma también es famosa por ser la sede del Vaticano, donde se encuentra la Basílica de San Pedro y los Museos Vaticanos con la Capilla Sixtina. Además, la cocina romana y la moda italiana son mundialmente reconocidas.', './imgs/ciudad/Roma.jpg', 7);
INSERT INTO ciudad (nombre_ciudad, descripcion_ciudad, ruta_img_ciudad, id_pais) VALUES ('Florencia', 'Situada en la región de la Toscana en Italia, Florencia es conocida como la cuna del Renacimiento. La ciudad alberga obras maestras de artistas como Miguel Ángel y Botticelli, y cuenta con impresionantes lugares como el Duomo de Florencia y el Ponte Vecchio.', './imgs/ciudad/Florencia.jpg', 7);
INSERT INTO ciudad (nombre_ciudad, descripcion_ciudad, ruta_img_ciudad, id_pais) VALUES ('Londres', 'La capital del Reino Unido, Londres, es una ciudad global con una mezcla fascinante de historia y modernidad. Desde el Palacio de Buckingham hasta el Museo Británico y el London Eye, la ciudad ofrece una amplia gama de atracciones culturales y turísticas.', './imgs/ciudad/Londres.jpg', 8);
INSERT INTO ciudad (nombre_ciudad, descripcion_ciudad, ruta_img_ciudad, id_pais) VALUES ('Edimburgo', 'La capital de Escocia, Edimburgo, es una ciudad llena de historia y encanto. Con su imponente castillo, su Royal Mile y su festival anual del Edimburgo Fringe, la ciudad atrae a visitantes de todo el mundo. Además, cuenta con una rica tradición literaria y es conocida por ser el lugar de nacimiento del famoso escritor escocés Robert Burns.', './imgs/ciudad/Edimburgo.jpg', 8);

/*TOURS*/
INSERT INTO tour (nombre_tour, descripcion_1, descripcion_2, descripcion_3, descripcion_4, ruta_img_tour, punto_inicio, punto_final, id_ciudad)   
VALUES ('Berlín al completo', 'Te invitamos a descubrir la historia y la cultura de Berlín en este tour gratuito.', 'El recorrido comienza en la Puerta de Brandeburgo, un símbolo de la ciudad, y finaliza en Checkpoint Charlie, un punto de control de la Guerra Fría.', 'A lo largo del recorrido, aprenderás sobre la historia de Berlín, desde la época de los caballeros teutones hasta la actualidad. Visitarás lugares emblemáticos como el Monumento a los Judíos Asesinados de Europa y el Muro de Berlín.', '¿Te animas a descubrir Berlín?', './imgs/tours/Berlin-t.jpg', 'Puerta de Brandeburgo', 'Checkpoint Charlie', 1);
INSERT INTO tour (nombre_tour, descripcion_1, descripcion_2, descripcion_3, descripcion_4, ruta_img_tour, punto_inicio, punto_final, id_ciudad) 
VALUES ('Bruselas al completo', 'Te invitamos a explorar la rica historia y cultura de Bruselas en este tour gratuito.', 'El viaje empieza en la Grand Place, el corazón de Bruselas, y concluye en el Manneken Pis, una estatua que se ha convertido en un emblema de la ciudad.', 'Durante el tour, te sumergirás en la historia de Bruselas, desde sus orígenes hasta el presente. Tendrás la oportunidad de visitar hitos significativos como la majestuosa Catedral de San Miguel y Santa Gúdula y el impresionante Parc du Cinquantenaire.', '¿Estás listo para explorar Bruselas?', './imgs/tours/Bruselas-t.jpg', 'Grand Place', 'Manneken Pis', 2);
INSERT INTO tour (nombre_tour, descripcion_1, descripcion_2, descripcion_3, descripcion_4, ruta_img_tour, punto_inicio, punto_final, id_ciudad) 
VALUES ('Praga al completo', 'Te invitamos a un viaje inolvidable por Praga con este tour gratuito.', 'Comenzaremos nuestra aventura en la Plaza de la Ciudad Vieja, el epicentro de la vida en Praga, y terminaremos nuestro viaje en el Puente de Carlos, un testimonio del pasado medieval de la ciudad.', 'En este tour, no solo caminarás por las calles de Praga, sino que también viajarás a través del tiempo. Desde la época medieval hasta el presente, cada rincón de Praga tiene una historia que contar. Descubrirás el Reloj Astronómico, una maravilla de la ingeniería del siglo XV, la imponente Catedral de San Vito y el Barrio Judío, que ha sido testigo de siglos de historia.', '¿Estás listo para embarcarte en esta aventura por Praga?', './imgs/tours/Praga-t.jpg', 'Plaza de la Ciudad Vieja ', 'Puente de Carlos', 3);
INSERT INTO tour (nombre_tour, descripcion_1, descripcion_2, descripcion_3, descripcion_4, ruta_img_tour, punto_inicio, punto_final, id_ciudad) 
VALUES ('Ámsterdam al completo', 'Te invitamos a un recorrido fascinante por Ámsterdam con este tour gratuito.', 'Nuestra aventura comienza en la Estación Central de Ámsterdam, una joya arquitectónica que es la puerta de entrada a la ciudad, y termina en la Plaza Dam, el corazón histórico de Ámsterdam.', 'En este tour, te adentrarás en la rica historia y cultura de Ámsterdam. Caminarás por los famosos canales de la ciudad, que fueron declarados Patrimonio de la Humanidad por la UNESCO. Visitarás lugares icónicos como el Barrio Rojo, conocido por su vida nocturna vibrante, y el Mercado de las Flores, el único mercado flotante de flores del mundo.', '¿Estás listo para embarcarte en esta aventura por Ámsterdam?', './imgs/tours/Amsterdam-t.jpg', 'Estación Central de Ámsterdam', 'Plaza Dam', 4);
INSERT INTO tour (nombre_tour, descripcion_1, descripcion_2, descripcion_3, descripcion_4, ruta_img_tour, punto_inicio, punto_final, id_ciudad) 
VALUES ('París al completo', 'Te invitamos a un recorrido inolvidable por París con este tour gratuito.', 'Nuestra travesía comienza en la Catedral de Notre Dame, joya del gótico francés, y culmina en la Torre Eiffel, el emblema indiscutible de París.', 'En este paseo, te sumergirás en la rica historia de París. Desde la majestuosidad del Louvre, hogar de innumerables obras maestras, hasta la elegancia de los Jardines de las Tullerías, cada paso te acercará más al corazón de la ciudad. Descubrirás la Place de la Concorde, testigo silencioso de momentos clave en la historia francesa, y te maravillarás con la belleza del Sena mientras paseas por sus orillas.', '¿Estás listo para descubrir los secretos de París?', './imgs/tours/Paris-t1.jpg', 'Catedral de Notre Dame', 'Torre Eiffel', 5);
INSERT INTO tour (nombre_tour, descripcion_1, descripcion_2, descripcion_3, descripcion_4, ruta_img_tour, punto_inicio, punto_final, id_ciudad) 
VALUES ('París: Montmartre', 'Te invitamos a un paseo mágico por Montmartre, el corazón artístico de París, con este tour gratuito.', 'Nuestro viaje empieza en el Moulin Rouge, cuna del can-can, y termina en la Basílica del Sacré-Cœur, un santuario en lo alto de la colina que ofrece vistas impresionantes de París.', 'En este tour, explorarás el vibrante pasado y presente artístico de Montmartre. Caminarás por las mismas calles que una vez inspiraron a artistas como Picasso y Van Gogh. Visitarás la Place du Tertre, famosa por sus artistas callejeros, y el Muro del Amor, un homenaje al lenguaje universal del amor.', '¿Estás listo para sumergirte en la magia de Montmartre?', './imgs/tours/Paris-t2.jpg', 'Moulin Rouge', 'Basílica del Sacré-Cœur', 5);
INSERT INTO tour (nombre_tour, descripcion_1, descripcion_2, descripcion_3, descripcion_4, ruta_img_tour, punto_inicio, punto_final, id_ciudad) 
VALUES ('Lisboa al completo', 'Te invitamos a un recorrido cautivador por Lisboa con este tour gratuito.', 'Nuestra aventura comienza en la Praça do Comércio, una plaza emblemática en el centro de Lisboa, y termina en el Elevador de Santa Justa, un ascensor neogótico que ofrece vistas panorámicas de la ciudad.', 'En este tour, te adentrarás en la rica historia y cultura de Lisboa. Pasearás por las encantadoras calles de Alfama, el barrio más antiguo de Lisboa, conocido por sus estrechas calles y casas coloridas. También visitarás el vibrante Bairro Alto, famoso por su vida nocturna.', '¿Estás preparado para descubrir los encantos de Lisboa?', './imgs/tours/Lisboa-t.jpg', 'Praça do Comércio', 'Elevador de Santa Justa', 6);
INSERT INTO tour (nombre_tour, descripcion_1, descripcion_2, descripcion_3, descripcion_4, ruta_img_tour, punto_inicio, punto_final, id_ciudad) 
VALUES ('Oporto al completo', 'Te invitamos a un recorrido fascinante por Oporto con este tour gratuito.', 'Nuestra aventura comienza en la Estación de São Bento, famosa por sus impresionantes azulejos que representan escenas históricas de Portugal, y termina en Ribeira, el colorido barrio medieval a orillas del río Duero.', 'En este tour, te adentrarás en la rica historia y cultura de Oporto. Pasearás por las encantadoras calles adoquinadas, descubrirás la majestuosa Catedral de Oporto y te maravillarás con la belleza del Palácio da Bolsa.', '¿Estás listo para descubrir los encantos de Oporto?', './imgs/tours/Oporto-t.jpg', 'Estación de São Bento', 'Ribeira', 7);
INSERT INTO tour (nombre_tour, descripcion_1, descripcion_2, descripcion_3, descripcion_4, ruta_img_tour, punto_inicio, punto_final, id_ciudad) 
VALUES ('Roma al completo', 'Te invitamos a un viaje apasionante por Roma con este tour gratuito.', 'Nuestra aventura comienza en el Coliseo, una maravilla arquitectónica que es testigo del poder y la grandeza del Imperio Romano, y termina en la Fontana di Trevi, la fuente más famosa de Roma, conocida por su impresionante belleza.', 'En este tour, te adentrarás en la rica historia de Roma. Desde los tiempos del Imperio Romano hasta el presente, cada calle de Roma tiene una historia que contar. Visitarás lugares icónicos como el Panteón, una obra maestra de la arquitectura antigua, y la Piazza Navona, una de las plazas más bellas y populares de Roma.', '¿Estás listo para sumergirte en la historia y la belleza de Roma?', './imgs/tours/Roma-t.jpg', 'Coliseo Romano', 'Fontana di Trevi', 8);
INSERT INTO tour (nombre_tour, descripcion_1, descripcion_2, descripcion_3, descripcion_4, ruta_img_tour, punto_inicio, punto_final, id_ciudad) 
VALUES ('Florencia al completo', 'Te invitamos a un recorrido cautivador por Florencia con este tour gratuito.', 'Nuestro viaje empieza en la Catedral de Santa Maria del Fiore, una joya arquitectónica que domina el horizonte de Florencia, y termina en el Piazzale Michelangelo, que ofrece una vista panorámica inigualable de la ciudad.', 'En este tour, te sumergirás en la rica historia y cultura del Renacimiento. Caminarás por las mismas calles que una vez inspiraron a artistas como Da Vinci y Botticelli. Visitarás la famosa Galería Uffizi, hogar de innumerables obras maestras, y el Ponte Vecchio, el puente más antiguo de Florencia.', '¿Estás preparado para sumergirte en la belleza renacentista de Florencia?', './imgs/tours/Florencia-t.jpg', ' Catedral de Santa Maria del Fiore', 'Piazzale Michelangelo', 9);
INSERT INTO tour (nombre_tour, descripcion_1, descripcion_2, descripcion_3, descripcion_4, ruta_img_tour, punto_inicio, punto_final, id_ciudad) 
VALUES ('Londres al completo', 'Te invitamos a un recorrido fascinante por Londres con este tour gratuito.', 'Nuestra aventura comienza en el Big Ben, el reloj más famoso del mundo, y termina en la Torre de Londres, un castillo histórico situado en la orilla norte del río Támesis.', 'En este tour, te adentrarás en la rica historia y cultura de Londres. Pasearás por las mismas calles que una vez inspiraron a escritores como Charles Dickens y Virginia Woolf. Visitarás lugares icónicos como el Palacio de Buckingham, la residencia oficial del Rey, y el Puente de la Torre, uno de los puentes más reconocibles del mundo.', '¿Estás listo para embarcarte en esta aventura por Londres?', './imgs/tours/Londres-t1.jpg', 'Big Ben', 'Torre de Londres', 10);
INSERT INTO tour (nombre_tour, descripcion_1, descripcion_2, descripcion_3, descripcion_4, ruta_img_tour, punto_inicio, punto_final, id_ciudad) 
VALUES ('Londres Mágico', 'Te invitamos a un recorrido fascinante por Londres con este tour inspirado en Harry Potter.', 'Nuestra aventura comienza en la Plataforma 9 ¾ en la Estación King`s Cross, donde los estudiantes de Hogwarts toman el Expreso de Hogwarts al comienzo de cada año escolar, y termina en Leadenhall Market, que sirvió como inspiración para el Callejón Diagon en las películas.', 'En este tour visitarás lugares icónicos de las películas como el Puente del Milenio, que fue destruido por los mortífagos, la Embajada de Australia, que se usó para recrear Gringotts, o Claremont Square, lugar donde se encontraba el cuartel de la Órden del Fénix.', '¿Estás preparado para embarcarte en esta aventura mágica por Londres?', './imgs/tours/Londres-t2.jpg', 'Estación King`s Cross', 'Leadenhall Market', 10);
INSERT INTO tour (nombre_tour, descripcion_1, descripcion_2, descripcion_3, descripcion_4, ruta_img_tour, punto_inicio, punto_final, id_ciudad) 
VALUES ('Edimburgo al completo', 'Te invitamos a un viaje inolvidable por Edimburgo con este tour gratuito.', 'Nuestra aventura comienza en el Castillo de Edimburgo, una fortaleza histórica que se alza majestuosamente sobre la ciudad desde su posición en la cima de Castle Rock. Desde allí, podrás disfrutar de una vista panorámica de la ciudad que te dejará maravillado.', 'En este tour, te sumergirás en la rica historia y cultura de Edimburgo. Descubrirás lugares emblemáticos como la Royal Mile, una serie de calles que forman la arteria principal del casco antiguo de la ciudad, y Victoria Street, famosa por sus fachadas coloridas y su animada vida comercial. También tendrás la oportunidad de explorar Grassmarket, una plaza histórica situada en el corazón del casco antiguo.', '¿Estás listo para adentrarte en esta aventura por Edimburgo?', './imgs/tours/Edimburgo-t.jpg', 'Castillo de Edimburgo', 'Cementerio de Greyfriars', 11);

/*USUARIOS*/
INSERT INTO usuario (nombre, apellidos, email) VALUES ('Juan', 'Pérez', 'juan.perez@example.com');
INSERT INTO usuario (nombre, apellidos, email) VALUES ('María', 'García', 'maria.garcia@example.com');
INSERT INTO usuario (nombre, apellidos, email) VALUES ('Carlos', 'López', 'carlos.lopez@example.com');
INSERT INTO usuario (nombre, apellidos, email) VALUES ('Laura', 'Fernández', 'laura.fernandez@example.com');
INSERT INTO usuario (nombre, apellidos, email) VALUES ('Pedro', 'Rodríguez', 'pedro.rodriguez@example.com');

/*RESERVAS*/
INSERT INTO reserva (id_reserva,num_personas, fecha_reserva, fecha_actual, estado_reserva, id_tour, id_usuario) 
VALUES (UUID(), 3, '2023-11-20', NOW(), 1, 1, 1);
INSERT INTO reserva (id_reserva,num_personas, fecha_reserva, fecha_actual, estado_reserva, id_tour, id_usuario) 
VALUES (UUID(), 4, '2023-12-10', NOW(), 1, 2, 2);
INSERT INTO reserva (id_reserva,num_personas, fecha_reserva, fecha_actual, estado_reserva, id_tour, id_usuario) 
VALUES (UUID(), 7, '2024-01-10', NOW(), 1, 3, 3);
INSERT INTO reserva (id_reserva,num_personas, fecha_reserva, fecha_actual, estado_reserva, id_tour, id_usuario) 
VALUES (UUID(), 3, '2024-02-10', NOW(), 1, 3, 4);
INSERT INTO reserva (id_reserva,num_personas, fecha_reserva, fecha_actual, estado_reserva, id_tour, id_usuario) 
VALUES (UUID(), 14, '2024-02-10', NOW(), 1, 4, 5);


