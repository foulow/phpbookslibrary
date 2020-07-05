<?php
    function redireccionar($var){
        ?>
        <script>
            window.location="<?=$var?>";
        </script>
        <?php
        die();
    }

    function alertar($txt,$type,$url){

        //"error", "success" and "info".

        if($type==0){
            $t = "error";
        }elseif($type==1){
            $t = "success";
        }elseif($type==2){
            $t = "info";
        }else{
            $t = "info";
        }

        echo '<script>swal({ title: "Alerta", text: "'.$txt.'", icon: "'.$t.'"});';
        echo '$(".swal-button").click(function(){ window.location="?p='.$url.'"; });';
        echo '</script>';
    }
?>