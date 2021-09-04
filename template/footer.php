</div>

</section>
   
    <script src=" <?php echo $url;?>assets/vendor/jquery.min.js"></script>
    <script src="<?php echo $url ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $url; ?>assets/vendor/data_table/jquery.dataTables.min.js"></script>
    <script src="<?php echo $url; ?>assets/vendor/data_table/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo $url; ?>assets/vendor/summer_note/summernote-bs4.js"></script>
    <script src="<?php echo $url; ?>assets/js/app.js"></script>

    <script>
        let currentPage=location.href;
        $(".menu-item-link").each(function(){

            let links =$(this).attr("href");
            if(currentPage == links){
                // $(".menu-item-link").removeClass("active");
                $(this).addClass("active");
                let screenHeight = $(window).height();
                let active = $(".active").offset().top;
                if(active > screenHeight*0.8 ){
                    $(".sidebar").animate({
                        scrollTop:active
                    },1000);
                }
            }
        })
</script>
   
   
</body>
</html>
