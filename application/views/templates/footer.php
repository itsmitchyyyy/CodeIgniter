
</body>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/js/jq.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pp.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bs.js"></script>
<script>
 $(window).ready(function(){
     if(sessionStorage.getItem('dontLoad') == null){
         $('.loader').delay(1000).show().fadeOut('slow');
         sessionStorage.setItem('dontLoad', true);
     }
});
</script>
</html>