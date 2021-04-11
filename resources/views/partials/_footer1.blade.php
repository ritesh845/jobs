<!--Footer-->
<div class="footerWrap">
  <div class="container">
    <div class="row"> 
      <!--About Us-->
      <div class="col-md-3 col-sm-12">
        <div class="ft-logo"><img src="images/logo.png" alt="Your alt text here"></div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et consequat elit. Proin molestie eros sed urna auctor lobortis. Integer eget scelerisque arcu. Pellentesque scelerisque pellentesque nisl, sit amet aliquam mi pellentesque fringilla. Ut porta augue a libero pretium laoreet. Suspendisse sit amet massa accumsan, pulvinar augue id, tristique tortor.</p>
        
        <!-- Social Icons -->
        <div class="social"> <a href="#." target="_blank"> <i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="#." target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="#." target="_blank"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a> <a href="#." target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> <a href="#." target="_blank"><i class="fa fa-youtube-square" aria-hidden="true"></i></a> </div>
        <!-- Social Icons end --> 
      </div>
      <!--About us End--> 
      
      <!--Quick Links-->
      <div class="col-md-2 col-sm-6">
        <h5>Quick Links</h5>
        <!--Quick Links menu Start-->
        <ul class="quicklinks">
          <li><a href="#.">Career Services</a></li>
          <li><a href="#.">CV Writing</a></li>
          <li><a href="#.">Career Resources</a></li>
          <li><a href="#.">Company Listings</a></li>
          <li><a href="#.">Success Stories</a></li>
          <li><a href="#.">Contact Us</a></li>
          <li><a href="#.">Create Account</a></li>
          <li><a href="#.">Post a Job</a></li>
          <li><a href="#.">Contact Sales</a></li>
        </ul>
      </div>
      <!--Quick Links menu end--> 
      
      <!--Jobs By Industry-->
      <div class="col-md-3 col-sm-6">
        <h5>Jobs By Industry</h5>
        <!--Industry menu Start-->
        <ul class="quicklinks">
          <li><a href="#.">Information Technology Jobs</a></li>
          <li><a href="#.">Recruitment/Employment Firms Jobs</a></li>
          <li><a href="#.">Education/Training Jobs</a></li>
          <li><a href="#.">Manufacturing Jobs</a></li>
          <li><a href="#.">Call Center Jobs</a></li>
          <li><a href="#.">N.G.O./Social Services Jobs</a></li>
          <li><a href="#.">BPO Jobs</a></li>
          <li><a href="#.">Textiles/Garments Jobs</a></li>
          <li><a href="#.">Telecommunication/ISP Jobs</a></li>
        </ul>
        <!--Industry menu End-->
        <div class="clear"></div>
      </div>
      
      <!--Latest Articles-->
      <div class="col-md-4 col-sm-12">
        <h5>Latest Articles</h5>
        <ul class="posts-list">
          <!--Article 1-->
          <li>
            <article class="post post-list">
              <div class="entry-content media">
                <div class="media-left"> <a href="#." title="" class="entry-image"> <img width="80" height="80" src="images/news-1.jpg" alt="Your alt text here"> </a> </div>
                <div class="media-body">
                  <h4 class="entry-title"> <a href="#.">Sed fermentum at lectus nec porta.</a> </h4>
                  <div class="entry-content-inner">
                    <div class="entry-meta"> <span class="entry-date">Jan 28, 2016</span> </div>
                  </div>
                </div>
              </div>
            </article>
          </li>
          <!--Article end 1--> 
          
          <!--Article 2-->
          <li>
            <article class="post post-list">
              <div class="entry-content media">
                <div class="media-left"> <a href="#." title="" class="entry-image"> <img width="80" height="80" src="images/news-2.jpg" alt="Your alt text here"> </a> </div>
                <div class="media-body">
                  <h4 class="entry-title"> <a href="#.">Sed fermentum at lectus nec porta.</a> </h4>
                  <div class="entry-content-inner">
                    <div class="entry-meta"> <span class="entry-date">Jan 28, 2016</span> </div>
                  </div>
                </div>
              </div>
            </article>
          </li>
          <!--Article end 2--> 
          
          <!--Article 3-->
          <li>
            <article class="post post-list">
              <div class="entry-content media">
                <div class="media-left"> <a href="#." title="" class="entry-image"> <img width="80" height="80" src="images/news-3.jpg" alt="Your alt text here"> </a> </div>
                <div class="media-body">
                  <h4 class="entry-title"> <a href="#.">Sed fermentum at lectus nec porta.</a> </h4>
                  <div class="entry-content-inner">
                    <div class="entry-meta"> <span class="entry-date">Jan 28, 2016</span> </div>
                  </div>
                </div>
              </div>
            </article>
          </li>
          <!--Article end 3-->
        </ul>
      </div>
    </div>
  </div>
</div>
<!--Footer end--> 

<!--Copyright-->
<div class="copyright">
  <div class="container">
    <div class="bttxt">Copyright &copy; 2017 Your Company Name. All Rights Reserved. Design by: <a href="http://graphicriver.net/user/ecreativesol" target="_blank">eCreativeSolutions</a></div>
  </div>
</div>

<!-- Bootstrap's JavaScript --> 
<script src="{{asset('js/bootstrap.min.js')}}"></script> 

<!-- Owl carousel --> 
{{-- <script src="js/owl.carousel.js"></script>  --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>   
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
{{-- <script src="{{asset("js/datepicker.js")}}"></script> --}}
<!-- Custom js --> 
<script >
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
</script>
    <script src="{{asset('js/jquery-validate.min.js')}}"></script>
    <script src="{{asset("ckeditor/ckeditor.js")}}"></script>

<script src="{{asset('js/script.js')}}"></script>


</body>

<!-- Mirrored from www.sharjeelanjum.com/html/jobs-portal/demo/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Mar 2021 12:34:06 GMT -->
</html>