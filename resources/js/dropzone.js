
import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aquí tu imagen",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Archivo",

});

let responsesArray = [];
dropzone.on("success", function (file, response) {

    responsesArray.push(response); // Push the response value into the array
    // console.log(responsesArray);
    // console.log(responsesArray.join(','));
    // document.querySelector('[name="imagen"]').value = responsesArray;



    let val = responsesArray.map(function(objeto) {
        return objeto.imagen;
      });
      
      let res = val.join(",");
      console.log(res); // Resultado: "10, 20, 30"
    document.querySelector('[name="imagen"]').value = res;

});

dropzone.on("removedfile", function () {
    document.querySelector('[name="imagen"]').value = "";
});

