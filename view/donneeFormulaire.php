<!-- templates/baseLayout.php -->
<!DOCTYPE html>
<html>
<head>
<?php
	require_once 'utility.php';
?>
     <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/medd-126x120.png" type="image/x-icon">

<link rel="stylesheet" type="text/css" href="<?php echo home_base_url();?>css/dataTables.checkboxes.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url();?>css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url();?>css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url();?>plugins/jquery-ui/jquery-ui.css">
<link rel="stylesheet" href="<?php echo home_base_url();?>plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo home_base_url();?>css/reboisement.css">
 <link rel="stylesheet" href="<?php echo home_base_url();?>dist/css/adminlte.min.css">


</head>
<body>
   		<?php echo $formulaire;?>


<script src="<?php echo home_base_url();?>plugins/jquery/jquery.min.js"></script>
<script src="<?php echo home_base_url();?>plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo home_base_url();?>plugins/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript">
	
	$('#districtcode').change(function () {


     var url="<?php echo base_url();?>";
      var arraydistrict = "'"+$('#districtcode').val()+"'";
 
    sql = "select * from commune where district_id in ("+ arraydistrict +")  ";

    $.post(url+"index.php/activite.php/getList", {sql: sql}, function(result){
       
       const obj = JSON.parse(result);

         $('#communecode').find('option')
                        .remove()
                        .end();
           
       $.each(obj, function(key, value) {

           $('#communecode')
                        .append( '<option value="'+value['commune_id']+'">'+value['commune_libelle']+'</option>' );
       
    });

  });
    });

   $('#regioncode').change(function () {
 

     var url="<?php echo base_url();?>";
     var regionchoix = "'"+$('#regioncode').val()+"'";
 
    sql = "select * from district where region_id in ("+ regionchoix +")  ";

   

    $.post(url+"index.php/activite.php/getList", {sql: sql}, function(result){
      const obj = JSON.parse(result);

        $('#districtcode').find('option')
                        .remove()
                        .end();
           
       $.each(obj, function(key, value) {
          $('#districtcode').append( '<option value="'+value['district_id']+'">'+value['district_libelle']+'</option>' );
    });

        });
     });
  
     $('#codeprojet').change(function () {
 

     var url="<?php echo base_url();?>";
     var choix = "'"+$('#codeprojet').val()+"'";
 
    sql = "select * from activite where codeprojet in ("+ choix +")  ";

   

    $.post(url+"index.php/activite.php/getList", {sql: sql}, function(result){
      const obj = JSON.parse(result);

        $('#codeactivite').find('option')
                        .remove()
                        .end();
           
       $.each(obj, function(key, value) {
          $('#codeactivite').append( '<option value="'+value['codeactivite']+'">'+value['libelleactivite']+'</option>' );
          $('#libelleactivite').val(value['libelleactivite']);
         });

        });
     });
</script>
</body>
</html>