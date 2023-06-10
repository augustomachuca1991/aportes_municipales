export const lengthOfService = (state) => {
    var fechaIngreso = new Date("2018-06-01");
    var fechaEgreso = new Date("2022-12-31");
    var diferenciaMilisegundos = fechaEgreso.getTime() - fechaIngreso.getTime();
    var milisegundosEnUnAnio = 365.25 * 24 * 60 * 60 * 1000;
    var antiguedadEnAnios = diferenciaMilisegundos / milisegundosEnUnAnio;
    var aniosCompletos = Math.floor(antiguedadEnAnios);
    var mesesRestantes = Math.floor((antiguedadEnAnios - aniosCompletos) * 12);
    
    return {'anio':aniosCompletos, 'meses': mesesRestantes};
};
