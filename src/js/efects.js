    var provinciasPorPais = {
        'Guatemala':['Guatemala','Alta Verapaz','Baja Verapaz','Chiquimula','El Progreso',
            'Izabal','Zacapa','Jalapa','Jutiapa','Santa Rosa','Chimaltenango',
            'Escuintla','Sacatepéquez','Retalhuleu','San Marcos',
            'Sololá','Suchitepéquez','Totonicapán','Quetzaltenango',
            'Huehuetenango','Quiché','Petén'],
        'Costa Rica':['SAN JOSÉ','ALAJUELA','CARTAGO','HEREDIA','LIBERIA','PUNTARENAS']
    }

    var regionesPorProvincia = {
        'Guatemala':['Guatemala','Santa Catarina Pinula','San José Pinula','San José del Golfo',
            'Palencia','Chinautla','San Pedro Ayampuc','Mixco',
            'San Pedro Sacatepéquez','San Juan Sacatepéquez',
            'San Raymundo','Chuarrancho','Fraijanes','Amatitlán',
            'Villa Nueva','Villa Canales','San Miguel Petapa'],
        'Alta Verapaz':['Cobán','San Pedro Carchá','San Juan Chamelco','San Cristóbal Verapaz',
            'Tactic','Tucurú','Tamahú','Panzós','Senahú','Cahabón','Lanquín','Chahal',
            'Fray Bartolomé de las Casas','Chisec','Santa Cruz Verapaz','Santa Catalina La Tinta',
            'Raxruhá'],
        'Baja Verapaz':['Cubulco','Santa Cruz el Chol','Granados','Purulhá',
            'Rabinal','Salamá','San Miguel Chicaj','San Jerónimo'],
        'Chiquimula':['Chiquimula','Camotán','Concepción Las Minas','Esquipulas',
            'Ipala','Jocotán','Olopa','Quezaltepeque','San José La Arada',
            'San Juan Ermita','San Jacinto'],
        'El Progreso':['Guastatoya','Morazán','San Agustín Acasaguastlán',
            'San Cristóbal Acasaguastlán','El Jícaro','Sansare','Sanarate',
            'San Antonio La Paz'],
        'Izabal':['Puerto Barrios','Livingston','El Estor',
            'Morales','Los Amates'],
        'Zacapa':['Cabañas','Estanzuela','Gualán','Huité','La Unión','Río Hondo',
            'San Diego','Teculután','Usumatlán','Zacapa'],
        'Jalapa':['Jalapa','San Pedro Pinula','San Luis Jilotepeque',
            'San Manuel Chaparrón','San Carlos Alzatate','Monjas','Mataquescuintla'],
        'Jutiapa':['Jutiapa','Agua Blanca','Asunción Mita','Atescatempa','Comapa',
            'Conguaco','El Adelanto','El Progreso','Jalpatagua','Jeréz','Moyuta',
            'Pasaco','Quesada','San José Acatempa','Santa Catarina Mita','Yupiltepeque',
            'Zapotitlán'],
        'Santa Rosa':['Cuilapa','Casillas','Chiquimulilla','Guazacapán','Nueva Santa Rosa',
            'Oratorio','Pueblo Nuevo Viñas','San Juan Tecuaco','San Rafaél Las Flores',
            'Santa Cruz Naranjo','Santa María Ixhuatán','Santa Rosa de Lima','Taxisco',
            'Barberena'],
        'Chimaltenango':['Chimaltenango','San José Poaquíl','San Martín Jilotepeque',
            'San Juan Comalapa','Santa Apolonia','Tecpán Guatemala','Patzún','Pochuta',
            'Patzicía','Santa Cruz Balanyá','Acatenango','San Pedro Yepocapa','San Andrés Itzapa',
            'Parramos','Zaragoza','El Tejar'],
        'Escuintla':['Escuintla','Guanagazapa','Iztapa','La Democracia','La Gomera','Masagua',
            'Nueva Concepción','Palín','Puerto San José','San Vicente Pacaya','Santa Lucía Cotzumalguapa',
            'Siquinalá','Tiquisate'],
        'Sacatepéquez':['Alotenango','Antigua Guatemala','Ciudad Vieja','Jocotenango','Magdalena Milpas Altas',
            'Pastores','San Antonio Aguas Calientes','San Bartolomé Milpas Altas','San Lucas Sacatepéquez',
            'San Miguel Dueñas','Santa Catarina Barahona','Santa Lucía Milpas Altas','Santa María de Jesús',
            'Santiago Sacatepéquez','Santo Domingo Xenacoj','Sumpango'],
        'Retalhuleu':['Champerico','El Asintal','Nuevo San Carlos','Retalhuleu','San Andrés Villa Seca',
            'San Martín Zapotitlán','San Felipe','San Sebastián','Santa Cruz Muluá'],
        'San Marcos':['San Marcos','Ayutla','Catarina','Comitancillo','Concepción Tutuapa','El Quetzal',
            'El Rodeo','El Tumbador','Ixchiguán','La Reforma','Malacatán','Nuevo Progreso','Ocós','Pajapita',
            'Esquipulas Palo Gordo','San Antonio Sacatepéquez','San Cristóbal Cucho','San José Ojetenam',
            'San Lorenzo','San Miguel Ixtahuacán','San Pablo','San Pedro Sacatepéquez','San Rafaél Pie de La Cuesta',
            'Sibinal','Sipacapa','Tacaná','Tajumulco','Tejutla','Río Blanco'],
        'Sololá':['Sololá','Concepción','Nahualá','Panajachel','San Andrés Semetabaj','San Antonio Palopó',
            'San José Chacayá','San Juan La Laguna','San Lucas Tolimán','San Marcos La Laguna',
            'San Pablo La Laguna','San Pedro La Laguna','Santa Catarina Ixtahuacan',
            'Santa Catarina Palopó','Santa Clara La Laguna','Santa Cruz La Laguna',
            'Santa Lucía Utatlán','Santa María Visitación','Santiago Atitlán'],
        'Suchitepéquez':['Mazatenango','Chicacao','Cuyotenango','Patulul','Pueblo Nuevo','Río Bravo',
            'Samayac','San Antonio Suchitepéquez','San Bernardino','San José El Ídolo','San Francisco Zapotitlán',
            'San Gabriel','San Juan Bautista','San Lorenzo','San Miguel Panán','San Pablo Jocopilas','Santa Barbara',
            'Santo Domingo Suchitepequez','Santo Tomas La Unión','Zunilito'],
        'Totonicapán':['Totonicapán','Momostenango','San Andrés Xecul','San Bartolo','San Cristóbal Totonicapán',
            'San Francisco El Alto','Santa Lucía La Reforma','Santa María Chiquimula'],
            'Quetzaltenango':['Almolonga','Cabricán','Cajolá','Cantel','Coatepeque','Colomba',
            'Concepción Chiquirichapa','El Palmar','Flores Costa Cuca','Génova','Huitán',
            'La Esperanza','Olintepeque','San Juan Ostuncalco','Palestina de Los Altos',
            'Quetzaltenango','Salcajá','San Carlos Sija','San Francisco La Unión','San Martín Sacatepéquez',
            'San Mateo','San Miguel Sigüilá','Sibilia','Zunil'],
        'Huehuetenango':['Aguacatán','Chiantla','Colotenango','Concepción Huista','Cuilco',
            'Huehuetenango','Jacaltenango','La Democracia','La Libertad','Malacatancito','Nentón',
            'San Antonio Huista','San Gaspar Ixchil','San Ildefonso Ixtahuacán','San Juan Atitán',
            'San Juan Ixcoy','San Mateo Ixtatán','San Miguel Acatán','San Pedro Necta','San Pedro Soloma',
            'San Rafael La Independencia','San Rafael Petzal','San Sebastián Coatán','San Sebastián Huehuetenango',
            'Santa Ana Huista','Santa Bárbara','Santa Cruz Barillas','Santa Eulalia','Santiago Chimaltenango',
            'Tectitán','Todos Santos Cuchumatán','Unión Cantinil'],
        'Quiché':['Santa Cruz del Quiché','Canillá','Chajul','Chicamán','Chiché','Chichicastenango',
            'Chinique','Cunén','Ixcán','Joyabaj','Nebaj','Pachalum','Patzité','Sacapulas','San Andrés Sajcabajá',
            'San Antonio Ilotenango','San Bartolomé Jocotenango','San Juan Cotzal','San Pedro Jocopilas',
            'Uspantán','Zacualpa'],
        'Petén':['Dolores','San Benito','Flores','San Francisco','La Libertad','San José','Melchor de Mencos',
            'San Luis','Poptún','Santa Ana','San Andrés','Sayaxché'],
        'SAN JOSÉ':['CENTRAL','PÉREZ ZELEDÓN','ESCAZÚ','DESAMPARADOS','PURISCAL','TARRAZÚ','ASERRÍ',
            'MORA','GOICOECHEA','SANTA ANA','ALAJUELITA','VÁZQUEZ DE CORONADO','ACOSTA',
            'TIBÁS','MORAVIA','MONTES DE OCA','TURRUBARES','DOTA','CURRIDABAT','LEÓN CORTÉS CASTRO'],
        'ALAJUELA':['CENTRAL','SAN CARLOS','UPALA','LOS CHILES','GUATUSO','SAN MATEO','OROTINA',
            'SAN RAMÓN','GRECIA','ATENAS','NARANJO','PALMARES','POÁS','ZARCERO','VALVERDE VEGA'],
        'CARTAGO':['CENTRAL','PARAÍSO','LA UNIÓN','JIMÉNEZ','TURRIALBA','ALVARADO',
            'OREAMUNO','EL GUARCO'],
        'HEREDIA':['CENTRAL','SARAPIQUÍ','BARVA','SANTO DOMINGO','SANTA BÁRBARA','SAN RAFAEL',
            'SAN ISIDRO','BELÉN','FLORES','SAN PABLO'],
        'LIBERIA':['LIBERIA','NICOYA','SANTA CRUZ','BAGACES','CARRILLO','CAÑAS','ABANGARES',
            'TILARÁN','NANDAYURE','LA CRUZ','HOJANCHA'],
        'PUNTARENAS':['CENTRAL','ESPARZA','MONTES DE ORO','AGUIRRE','PARRITA','GARABITO',
            'BUENOS AIRES','OSA','GOLFITO','COTO BRUS','CORREDORES']
    };

    function onChangePais() {
        var paisSelected = document.getElementById("pais").value;
        var lstProvincias = provinciasPorPais[paisSelected];
        var newOptions = "<option value=''>Seleccione su provincia</option>";
        for (var i = 0; i < lstProvincias.length; i++) {
            newOptions += "<option value='" + lstProvincias[i] + "'>" + lstProvincias[i] + "</option>";
        }
        document.getElementById("provincia").innerHTML = newOptions;
    }

    function onChangeProvincia() {
        var provinciaSelected = document.getElementById("provincia").value;
        var lstCantones = regionesPorProvincia[provinciaSelected];
        var newOptions = "<option value=''>Seleccione su canton</option>";
        for (var i = 0; i < lstCantones.length; i++) {
            newOptions += "<option value='" + lstCantones[i] + "'>" + lstCantones[i] + "</option>";
        }
        document.getElementById("canton").innerHTML = newOptions;
    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            console.log("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        var x = document.getElementById("demo");
        var latitud = document.getElementById("latitud");
        var longitud = document.getElementById("longitud");
        latitud.value = position.coords.latitude;
        longitud.value = position.coords.longitude;

    }

    function onClickContinuar() {
        window.location.href = "http://girobticino.com/menuprincipal/";
    }

    (function() {
        'use strict';
        window.onload = function() {
            var selector = document.getElementById("selector");
            if(selector) {
                selector.onclick = function() {
                    var checkboxes = document.getElementsByClassName("checkbox");
                    for (var i = 0; i < checkboxes.length; i++) {
                        var element = checkboxes[i];
                        if (element.classList.contains('hidden')) {
                            element.classList.remove("hidden");
                            element.classList.add("shown");
                        } else {
                            element.classList.remove("shown");
                            element.classList.add("hidden");
                        }
                    }
                };
            }

            var selectorCompetencia = document.getElementById("selectorCompetencia");
            if(selectorCompetencia) {
                selectorCompetencia.onclick = function() {
                    var checkboxes = document.getElementsByClassName("checkboxCompetencia");
                    for (var i = 0; i < checkboxes.length; i++) {
                        var element = checkboxes[i];
                        if (element.classList.contains('hidden')) {
                            element.classList.remove("hidden");
                            element.classList.add("shown");
                        } else {
                            element.classList.remove("shown");
                            element.classList.add("hidden");
                        }
                    }
                };
            }

            var closeItems = document.getElementById("close_btn");
            if(closeItems) {
                closeItems.onclick = function () {
                        var divModal = document.getElementsByClassName("section-modal-legal-disclaimer")[0];
                        var divBlackBG = document.getElementsByClassName("section-black-modal-BG")[0];
                        divModal.classList.remove('shown');
                        divBlackBG.classList.remove('shown');
                        divModal.classList.add('hidden');
                        divBlackBG.classList.add('hidden');
                }
            }

            var btnGetLocation = document.getElementById("getLocation");
            if(btnGetLocation) {
                btnGetLocation.onclick = function () {
                        getLocation();
                }
            }
        };
    })();
