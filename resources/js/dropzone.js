
import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aquí tu imagen",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Archivo",
    maxFiles: 1,
    uploadMultiple: false,

});


dropzone.on("success", function (file, response) {

    arrayRes = [];
    response.imagen.push(arrayRes);
    document.querySelector('[name="imagen"]').value = arrayRes;
});

dropzone.on("removedfile", function () {
    document.querySelector('[name="imagen"]').value = "";
});

console.log('hello world');