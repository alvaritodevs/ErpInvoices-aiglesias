<!DOCTYPE html>
<html lang="en">

<?php include("head.php");?>

<body class="fix-header">
    <!-- ===== Main-Wrapper ===== -->
    <div id="wrapper">
        <div class="preloader">
            <div class="cssload-speeding-wheel"></div>
        </div>
        <!-- ===== Top-Navigation ===== -->
        <?php include("nav.php");?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php include("left-sidebar.php");?>
        
        <div class="page-wrapper">
            <div class="container-fluid">
            
      
        <form action="<?php echo $helper->url("facturas","actualizar"); ?>" method="post" class="col-lg-5" enctype="multipart/form-data" id="editfactura">
            <h3>Editar factura</h3>
            <input type="hidden" name="id" class="form-control" value="<?php echo $factura->id;?>" />
            <hr/>
          
           fecha: <input type="date" name="fecha" class="form-control"   value="<?php echo $factura->fecha;?>" />
            
            Empresa: <select name="id_empresas" class="form-control" >
            <option></option>
            <?php echo $helper->crearOptionsSel($allempresas,"id","nombre_comercial",$factura->id_empresas);?>
            
            
            </select>
            
            Incidencia: <select name="id_incidencias" class="form-control" >
            <option></option>
            
            <?php echo $helper->crearOptionsSel($allincidencias,"id","fecha",$factura->id_incidencias);?>
            
            
            </select>
            
     
            
            baseimponible: <input type="number" name="baseimponible" class="form-control"  value="<?php echo $factura->baseimponible;?>"  />
            
            iva: <input type="number" name="iva" class="form-control"   value="<?php echo $factura->iva;?>" />
            
            total: <input type="number" name="total" class="form-control"  value="<?php echo $factura->total;?>"  />
            
       
            
            
            
            <input type="submit" value="enviar" class="btn btn-success" id="enviar"/>
        </form>
        
        
		
	<!-- ===== Page-Container-End ===== -->
            <footer class="footer t-a-c">
                © 2017 Cubic Admin
            </footer>
        </div>
        <!-- ===== Page-Content-End ===== -->
    </div>
    </div>
    <!-- ===== Main-Wrapper-End ===== -->
    <!-- ==============================
        Required JS Files
    =============================== -->
    <!-- ===== jQuery ===== -->
    <script src="plugins/components/jquery/dist/jquery.min.js"></script>
    <!-- ===== Bootstrap JavaScript ===== -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ===== Slimscroll JavaScript ===== -->
    <script src="js/jquery.slimscroll.js"></script>
    <!-- ===== Wave Effects JavaScript ===== -->
    <script src="js/waves.js"></script>
    <!-- ===== Menu Plugin JavaScript ===== -->
    <script src="js/sidebarmenu.js"></script>
    <!-- ===== Custom JavaScript ===== -->
    <script src="js/custom.js"></script>
    <!-- ===== Plugin JS ===== -->
    <script src="plugins/components/chartist-js/dist/chartist.min.js"></script>
    <script src="plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="plugins/components/sparkline/jquery.sparkline.min.js"></script>
    <script src="plugins/components/sparkline/jquery.charts-sparkline.js"></script>
    <script src="plugins/components/knob/jquery.knob.js"></script>
    <script src="plugins/components/easypiechart/dist/jquery.easypiechart.min.js"></script>
    <script src="js/db1.js"></script>
    <!-- ===== Style Switcher JS ===== -->
    <script src="plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- Dropzone JavaScript -->

    <!-- ===== Validator ===== -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


    <script>

$(document).ready(function() {
  $("#editfactura").validate({
    rules: {
        fecha: {
        required: true
      },
        id_empresas: {
        required: true
      },
        id_incidencias: {
        required: true
      },
        baseimponible: {
        required: true
      },
        iva: {
        required: true
      },
        total: {
        required: true
      }
    },
    messages: {
        fecha: {
        required: "Porfavor introduzca una fecha."
      },
        id_empresas: {
        required: "Porfavor seleccione una empresa."
        
      },
        id_incidencias: {
        required: "Porfavor seleccione una incidencia."
      },
        baseimponible: {
        required: "Porfavor introduzca una base imponible."
      },
        iva: {
        required: "Porfavor introduzca el iva.."
      },
        total: {
        required: "Porfavor introduzca el total."
      }
    },

  });
});
        </script>


<style>

    .error{

  display: flex;
  color: red;
  margin-left: 5px;
  vertical-align: middle;
    }


</style>


<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

<script>
Dropzone.autoDiscover = false;
$(document).ready(function () {
//Galeria
    var myDropzoneGaleria = new Dropzone("div#myDropzoneGaleria", {
                                   url: '<?php echo $helper->urlSubirFicheros("Productos","subir",IMAGENES_PRODUCTOS);?>', 
                                   paramName: "image_gallery",
                                    acceptedFiles: 'image/*',
                                    maxFilesize: 20,
                                    maxFiles: 5,
                                    thumbnailWidth: 600,
                                    thumbnailHeight: 350,
                                    thumbnailMethod: 'contain',
                                    parallelUploads: 20,
                                    //previewTemplate: previewTemplate,
                                    autoQueue: true,
                                    clickable: true,
                                    addRemoveLinks: true,
                                   // previewsContainer: "#previews",
                                   // clickable: ".fileinput-button"
         dictDefaultMessage: '<i class="far fa-image fa-5x"></i><br>Arrastra el archivo aquí para subirlo.', // Default: Drop files here to upload
        dictRemoveFile: 'Eliminar', // Default: Remove file
        
        dictFallbackMessage: "Su navegador no admite la carga de archivos mediante la función de arrastrar y soltar.", 
					dictFileTooBig: "El archivo es demasiado grande({{filesize}}MiB). Tamaño máximo de archivo: {{maxFilesize}}MiB.", 
					dictInvalidFileType: "No puedes subir archivos de este tipo.", 
					dictResponseError: "El servidor respondió con {{statusCode}} codigo.", 
					dictCancelUpload: "Cancelar carga.", 
					dictUploadCanceled: "Subida cancelada.", 
					dictCancelUploadConfirmation: "¿Estás seguro de que deseas cancelar esta carga?", 
					
					 
					dictRemoveFileConfirmation: null, 

					
					dictMaxFilesExceeded: "No puedes subir más archivos.", 
					
       
        dictFileSizeUnits: {tb: "TB", gb: "GB", mb: "MB", kb: "KB", b: "b"},
        
        removedfile: function(file) {
                var name = file.name;        
                $.ajax({
                type: 'POST',
                url: 'deletegaleria.php',
                data: "id="+name,
                dataType: 'html'
                });
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;        
                 },
         maxfilesexceeded: function (files) {
            myDropzoneGaleria.removeAllFiles();
            myDropzoneGaleria.addFile(files);
        },
        accept: function(file, done) {
        console.log("uploaded");
        done();
    },
    init: function() {
        this.on("maxfilesexceeded", function(file){
             bootbox.dialog({
                                    message: "Solo puede adjuntar un banner en su perfil. Se reemplazará el nuevo banner por el anterior.",
                                    title: "<i class='glyphicon glyphicon-trash'></i> Cambiar Banner !",
                                    buttons: {
                                    success: {
                                          label: "Aceptar",
                                          className: "btn-success",
                                          
                                    }

                                }
                                  }); 
        });
    },             
                               
});
       
 myDropzoneGaleria.autoDiscover = false;
myDropzoneGaleria.on("queuecomplete", function(file, res) {
         if (myDropzoneGaleria.files[0].status != Dropzone.SUCCESS ) {
            
              $("#file").val(myDropzoneGaleria.files[1].name);
         } else {
             var imagenes="";
             if(myDropzoneGaleria.files[0]){
                  imagenes="<?php echo IMAGENES_PRODUCTOS;?>/"+myDropzoneGaleria.files[0].name;
             }
             if(myDropzoneGaleria.files[1]){
                  imagenes=imagenes+","+"<?php echo IMAGENES_PRODUCTOS;?>/"+myDropzoneGaleria.files[1].name;
             }
             if(myDropzoneGaleria.files[2]){
                  imagenes=imagenes+","+"<?php echo IMAGENES_PRODUCTOS;?>/"+myDropzoneGaleria.files[2].name;
             }
             if(myDropzoneGaleria.files[3]){
                  imagenes=imagenes+","+"<?php echo IMAGENES_PRODUCTOS;?>/"+myDropzoneGaleria.files[3].name;
             }
             if(myDropzoneGaleria.files[4]){
                  imagenes=imagenes+","+"<?php echo IMAGENES_PRODUCTOS;?>/"+myDropzoneGaleria.files[4].name;
             }
             if(myDropzoneGaleria.files[5]){
                  imagenes=imagenes+","+"<?php echo IMAGENES_PRODUCTOS;?>/"+myDropzoneGaleria.files[5].name;
             }
             //alert(imagenes);
             $("#file").val(imagenes);

         }
     });

/*$("#enviar").click(function() {
       
                   var image_gallery=$("#file").val();
    alert(image_gallery);

});*/
});

</script>
</body>

</html>