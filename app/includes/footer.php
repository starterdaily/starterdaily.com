
          <footer id="site-footer">
                    <div class="row">
                        <a class="logo large-2 columns" href="index.html"><img src="<?php echo $base_url?>/images/logo-footer.png" alt="Logo StarterDaily"></a>

                        <ul class="large-10 columns">
                            <li><a href="#">Sobre Nosotros</a></li>
                            <li><a href="#">Política de Privacidad</a></li>
                            <li><a href="#">Términos de Uso</a></li>
                            <li><a href="#">Publicidad</a></li>
                            <li><a href="#">Contacto</a></li>
                            <li class="copyright">
                                <span>© StarterDaily 2014. All rights reserved.</span>
                            </li>
                        </ul>
                    </div>
                </footer>

     

  <script src="<?php echo $base_url ?>/js/jquery.sharrre.js" ></script>
  <script>

 

$('#shareme').sharrre({
  share: {
    twitter: true,
    facebook: true,
    googlePlus: true,
  },
  template: '<div class="count">{total}</div><div class="box"><div class="textShares">Shares</div><div class="middle"><a href="javascript:void(0)" class="facebook">f</a><a href="javascript:void(0)" class="twitter">t</a><a href="javascript:void(0)" class="googleplus">+1</a><a href="javascript:void(0)" class="linkedin"></a></div></div>',
  enableHover: false,
  enableTracking: true,
  render: function(api, options){
  $(api.element).on('click', '.twitter', function() {
    api.openPopup('twitter');
  });
  $(api.element).on('click', '.facebook', function() {
    api.openPopup('facebook');
  });
  $(api.element).on('click', '.googleplus', function() {
    api.openPopup('googlePlus');
  });
  $(api.element).on('click', '.linkedin', function() {
    api.openPopup('linkedin');
  });
},
});

</script>
  <script src="<?php echo $base_url ?>/js/classie.js" ></script>
  <script src="<?php echo $base_url ?>/js/sidebarEffects.js" ></script>

</body>
</html>