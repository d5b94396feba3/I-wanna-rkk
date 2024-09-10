<style>

section {
    padding: 50px 0;
    overflow: hidden;
}
.section-header {
    text-align: left;
    padding-bottom: 40px;
}
.section-header p {
    font-size: 13px;
    letter-spacing: 1px;
    font-weight: 500;
    margin: 0;
    color: #fff;
    text-transform: uppercase;
}
.section-header h2 {
    margin: -154px 0 0;
    color: rgba(255, 255, 255, .8);
    margin-bottom: 25px;
    font-size: 64px !important;
    font-weight: 500;
    line-height: 77px;
    letter-spacing: .03em;
    text-align: left;
}

@media (max-width:768px) {
    .section-header p{
    font-size: 28px;
    line-height: 32px;
}
}.top-artist-header-section {
    margin-top: 37px;
    margin-bottom: -36px;
    padding-top: 220px;
    margin-left: -120px;
    padding-bottom: 74px;
    margin-right: -333px;
    background: #282828;
    padding-left: 121px;
}

@media (max-width:968px) {
    .top-artist-header-section {
    height: 295px !important;
}
.top-artist-header-section h2 {
    margin-left: 8px;
    font-size: 50px !important;
}
}
#main {
    background: #111;
    background: linear-gradient(0deg, #111 100%, rgba(0, 0, 0, 0) 27.82%), linear-gradient(0deg, #0b0b0b, #080808);
    width: 94% !important;
    display: block;
    margin: 0 auto;
    z-index: 99999;
    padding-left: 0 !important;
    padding-right: 0 !important;
}

#pro-content-placeholder {
    width: 97%;
    background: linear-gradient(to right, #282828 47.82%, rgba(17, 17, 17, 0) 100%);
    background-size: 100% 100%, 100% 100%, contain;
    background-position: right center;
    border-radius: 15px;
    color: #FFFFFFCC;
    margin-top: 18px;
    padding: 0;
    margin-bottom: 20px;
    margin-left: 8px;
    transition: background .3s ease, transform .3s ease;
    border: 4px solid #353535;
    position: relative;
    overflow: hidden;
    margin-right: 0;
}
.background-masker {
    background-color: #fff;
    position: absolute;
}
@keyframes placeHolderShimmer {
    0% {
    background-position: -800px 0;
}
100% {
    background-position: 800px 0;
}
}

.show-result {
    font-size: 25px !important;
    font-weight: 500;
    color: var(--text-color-show-result);
    text-transform: uppercase;
    font-family: 'TitlingGothicFBComp-Medium', sans-serif;
}
.highlight-result {
    color: #cf6c05;
}
.second-highlight-result {
    color: #888;
}

.show-result-country {
    margin-top: -18px !important;
    margin-bottom: 0 !important;
}
.section-divider {
    margin: 22px -7px -25px;
    border-top: 2px solid rgba(255, 255, 255, .1);
}


/*artist login style*/

.top-artist-header-section {
    margin-top: 37px;
    margin-bottom: -36px;
    padding-top: 220px;
    margin-left: -220px !important;
    padding-bottom: 74px;
    margin-right: -256px !important;
    background: #282828;
    padding-left: 211px;
    /* width: 100% !important; */
}

.top-20-artists-section {
    overflow: hidden !important;
    max-height: 100% !important;
    padding: 6px 0px 0px 8px !important;
    margin-bottom: 34px !important;
}

div#top-20-artists-container {
    width: 80%;
}

label.label-block.profile-label-heading {
    font-size: 19px;
    font-weight: 700;
    margin-bottom: 20px;
    width: 100%;
    padding-bottom: 20px;
    border-bottom: 3px solid #ffffff24;
}


#pro-content-placeholder {
    width: 100%;
    background: linear-gradient(to right, #282828 47.82%, rgba(17, 17, 17, 0) 100%);
    background-size: 100% 100%, 100% 100%, contain;
    background-position: right center;
    border-radius: 15px;
    color: #FFFFFFCC;
    margin: -47px 0 0 -60px;
    padding: 0;
    transition: background .3s ease, transform .3s ease;
    border: none !important;
    position: relative;
    overflow: hidden;
}

.background-masker {
    background-color: #fff;
    position: absolute;
}

@keyframes placeHolderShimmer {

    0% {
        background-position: -800px 0;
    }
    100% {
        background-position: 800px 0;
    }
}

.pro-animated-background {
    animation-duration: 2s;
    animation-fill-mode: forwards;
    animation-iteration-count: infinite;
    animation-name: placeHolderShimmer;
    animation-timing-function: linear;
    background: linear-gradient(to right, #111 47.82%, rgba(17, 17, 17, 0) 100%);
    background-size: 100% 100%, 100% 100%, contain;
    background-position: right center;
    height: 625px;
    border: none !important;
    position: relative;
}

.pro-nav-container {
    width: 200px;
    margin-top: 34px;
}
.navbar-list {
     list-style-type: disc;
    padding: 0;
}

.navbar-item {
    padding: 6px 0px 6px 10px;
    text-align: left;
    cursor: pointer;
    border-radius: 22px;
    margin-top: 5px;
    font-size: 16px;
    width: 160px;
}

.navbar-item:hover{
    background-color: rgba(255,131,3,.6);
    color: #fff !important;
}

.navbar-item:hover > .navbar-item-link{
    color: #fff !important;
}

.menu-active{
     background-color: rgba(255,131,3,.6);
     color: #fff;
     font-weight: 500;
}

.pro-right-sidebar {
    overflow-y: auto;
    background: linear-gradient(0deg, #111 100%, rgba(0, 0, 0, 0) 27.82%), linear-gradient(0deg, #0b0b0b, #282828);
    margin-top: 46px;
    padding: 50px 66px 30px 65px;
    height: 100% !important;
    overflow-x: hidden;
    height: 55vh !important;
}

.artist-popup-left-sidebar {
    position: sticky !important;
    margin-top: 52px !important;
    height: 100%;
    z-index: 99 !important;
     background: #282828; 
    padding-left: 48px;
}


.top-artist-header-section {
    margin-top: 37px;
    margin-bottom: -36px;
    padding-top: 220px;
    margin-left: -607px !important;
    padding-bottom: 74px;
    margin-right: -600px !important;
    background: #282828;
    padding-left: 211px;
}
.section-header h2 {
    margin: -154px 0 0;
    color: rgba(255, 255, 255, .8);
    margin-bottom: 25px;
    font-size: 64px !important;
    font-weight: 500;
    line-height: 77px;
    letter-spacing: .03em;
    text-align: left;
    margin-left: 391px;
}
.section-header p {
    font-size: 13px;
    letter-spacing: 1px;
    font-weight: 500;
    margin: 0;
    color: #fff;
    text-transform: uppercase;
    margin-left: 391px;
    color: #b6b6b6;
}

.main-container {
    padding: 0px 50px 0px 41px;
}

.main-container p {
    line-height: 1.8rem;
    color: #b6b6b6;
}

</style>



<script type="text/javascript">
  

    $(document).ready(function () {
        // Show the loader initially
        $("#ajax_loader").show();
        // $('body').css('overflow', 'hidden');

        // Creating an array of promises for each AJAX request
        const promises = [
            load_artist_stats_data_OnPageLoad(),
        ];

        // Wait for all AJAX requests to complete before hiding the loader
        Promise.all(promises)
            .then(() => {
                $("#ajax_loader").fadeOut("slow");
                $('#bottom-banner .carousel-indicators').show();            
            })
            .catch((error) => {
                console.log("Error:", error);
            });


    });



    function load_artist_stats_data_OnPageLoad() {

        var url = '<?= base_url('Statistics/ajax_artist_stats_data_onPageLoad') ?>';

        // Get CSRF token values
        var csrfName ="<?= csrf_token() ?>";
        var csrfValue ="<?= csrf_hash() ?>";

        $.ajax({
            url: url,
            type: 'POST',
            data:{
                [csrfName]:csrfValue
            },
            beforeSend: function (jqXHR) {
                // $('#ajax_loader').show();
                $('.profile-details-btn').addClass('menu-active');
            },
            success: function(response){
                var html = response;
                $('#ajax_loader').fadeOut("slow");
                $('#pro-content-placeholder').hide(); 
                $('.pro-selected-menu-container').html(html);
            },
            complete: function(data) {
                $('#ajax_loader').fadeOut("slow");
            },
            error: function (error) {
                console.log('Error:', error);
            },
            dataType: 'text'  
        });
}



    function clear_popup_wrapper_data(){
      $(".popup-all-country-genre-heading").empty();
    }

    function show_popup_loading_heading(){
      $(".popup-all-country-genre-heading").html("<p style='font-size:18px !important; font-weight:500 !important;'>Loading...</p>");
    }



</script>

<div class="heading">
   <h2>Statistics</h2>
   <p class="mb-4">Your account statistics data showing below</p>
</div>
<div class="main-container">
   <?php
      if(isset($_SESSION['success-msg']))
      { ?>
   <div class="alert alert-success mt-4">
      <?php echo $_SESSION['success-msg'];
         unset($_SESSION['success-msg']);
         ?>
      <span class="alert-close-icon" style="cursor: pointer;">&times;</span>
   </div>
   <?php   }  ?>
   <?php
      if(isset($_SESSION['error-msg']))
      { ?>
   <div class="alert alert-danger">
      <?php echo $_SESSION['error-msg'];
         unset($_SESSION['error-msg']);
         ?>
      <span class="alert-close-icon" style="cursor: pointer;">&times;</span>
   </div>
   <?php   }  ?>
   <div class="row top-20-artists-section">
         <div class="col-md-12 col-lg-12 col-sm-12 artist-popup-right-sidebar-dis pro-right-sidebar">
            <div class="row pro-container">
               <div id="pro-content-placeholder">
                  <div class="pro-animated-background">
                     <div class="background-masker"></div>
                  </div>
               </div>
               <div class="pro-selected-menu-container"></div>
            </div>
         </div>
   </div>
</div>