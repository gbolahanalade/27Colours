<!-- FOOTER -->
    <footer>
      <div class="container">
        <!-- footer 1 -->
        <div class="footer1">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <h2>About <img src="{{ asset('img/logo.png') }}" alt="Logo" width="140" height="40"></h2>
                    <div>
                        <!-- <img src="img/logo.png" alt="Logo" width="140" height="50"> -->
                        <p>27Colours is a Talent discovery and management site where unrated talents 
                            can showcase their exceptional works to talent hunters, producers, fans and 
                            the world. </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 quick-links">
                    <h2>Quick Explore</h2>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-music"></i> <a href="">Listen to Songs</a></li>
                        <li><i class="fa fa-video-camera"></i> <a href="">Watch Videos</a></li>
                        <li><i class="fa fa-camera"></i> <a href="">View Pictures</a></li>
                        <li><i class="fa fa-user"></i> <a href="">View Talents Profile</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 quick-links">
                    <h2>Contact Us</h2>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-link"></i> <a href="">Advertise with us</a></li>
                        <li><i class="fa fa-link"></i> <a href="">Sponsorship</a></li>
                        <li><i class="fa fa-link"></i> <a href="">Ask a question</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 social-connect">
                    <h2>Connect With Us</h2>
                    <div class="subscribe">
                      <form action="">
                        <input type="email" placeholder="Email Address">
                        <button><i class="fa fa-plus-square"></i></button>
                      </form>
                    </div>
                    <div class="social-icons">
                          <h3>Keep In Touch</h3>

                          <ul class="list-inline">
                            <li class="padding-0"><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="padding-0"><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="padding-0"><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="padding-0"><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                          </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer 2 -->
        <div class="footer2 copyright">
            <p class="pull-left">Copyright &copy; 
                <script type="text/javascript">
                    var currentYr = new Date();
                    var insertYr = currentYr.getFullYear();
                    document.write(insertYr);
                </script>,
                27Colours - All Rights Reserved. 
            </p>
            <p class="developer pull-right">Powered by  <a class="developer-logo" href="#">CuriouzMind Tech</a></p>
        </div>
       </div> <!-- ./ container -->
    </footer>


    <!-- FB PLUGIN JAVASCRIPT CODE -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=221153544678812";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <!-- ./ FB PLUGIN -->