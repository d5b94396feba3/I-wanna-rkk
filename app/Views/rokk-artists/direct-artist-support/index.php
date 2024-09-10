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
    .section-header p, .discover-section-header p {
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

#top20-artists-container-placeholder {
    width: 97%;
    background: linear-gradient(to right, #282828 47.82%, rgba(17, 17, 17, 0) 100%);
    background-size: 100% 100%, 100% 100%, contain;
    background-position: right center;
    border-radius: 15px;
    color: #FFFFFFCC;
    margin-top: 0px !important;
    padding: 0;
    margin-bottom: 60px;
    margin-left: 0px;
    transition: background .3s ease, transform .3s ease;
    border: none;
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
.top20-artists-animated-background {
    animation-duration: 2s;
    animation-fill-mode: forwards;
    animation-iteration-count: infinite;
    animation-name: placeHolderShimmer;
    animation-timing-function: linear;
    background: linear-gradient(to right, #111 47.82%, rgba(17, 17, 17, 0) 100%);
    background-size: 100% 100%, 100% 100%, contain;
    background-position: right center;
    min-height: 541px;
    border-radius: 1px;
    position: relative;
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
.section-divider {
    margin: 22px -7px -25px;
    border-top: 2px solid rgba(255, 255, 255, .1);
}

/*das style*/

.top-artist-header-section {
    margin-top: 37px;
    margin-bottom: -36px;
    padding-top: 220px;
    margin-left: -220px !important;
    padding-bottom: 74px;
    margin-right: -256px !important;
    background: #282828;
    padding-left: 211px;
}

.top-20-artists-section {
    overflow: hidden !important;
    height: 100% !important;
    padding: 6px 0px 0px 8px !important;
    margin-bottom: 0px !important;
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
}

.main-container {
    padding: 0px 37px 0px 112px;
    height: 55vh;
    overflow-y: auto;
}
.das-active-address {
    height: 45vh;
}
p.mb-4.show-result.show-das-heading {
    margin-top: 15px !important;
}

.pass-valid-text {
    color: #DFDFDF !important;
    font-size: 11px !important;
    margin: 7px 0px 20px 0px !important;
}


.das-input {
    width: 30% !important;
    margin-left: 0px;
    padding-left: 14px;
    background: linear-gradient(0deg, #111 100%, rgba(0, 0, 0, 0) 27.82%), linear-gradient(0deg, #0b0b0b, #080808);
    color: #d3d3d3;
    border: 1px solid #d3d3d32b;
    padding-top: 10px !important;
    padding-bottom: 10px;
    margin-top: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
}

.termsofsevice-txtarea {
    margin-top: 16px;
    margin-bottom: 21px;
    overflow-y: scroll;
    border: 1px solid #d3d3d32b;
    border-radius: 5px !important;
    font-size: 13px !important;
    color: #d3d3d3;
    background: linear-gradient(0deg, #111 100%, rgba(0, 0, 0, 0) 27.82%), linear-gradient(0deg, #0b0b0b, #080808);
    height: 266px !important;
    overflow-y: scroll !important;
    padding:15px 10px 19px 15px;
}

input[type="checkbox"] {
    accent-color: #FF8302;
}

.checkbox {
    width: 100% !important;
    margin-left: -11px;
    padding-left: 14px;
    /* background: #282828 !important; */
    /* color: #fff; */
    border: none !important;
    padding-top: 0px !important;
    padding-bottom: 0px;
    margin-top: 10px;
    margin-bottom: 10px;
    font-size: 13px;
}

.checkbox-link{
    cursor: pointer;
}

.checkbox-link:hover {
    color: #fff !important;
}

.das-preferred-address {
    margin-right: 9px;
}
.copy-preferred-address {
    padding-left: 14px;
    background: linear-gradient(0deg, #282828 100%, rgba(0, 0, 0, 0) 27.82%), linear-gradient(0deg, #0b0b0b, #080808);
    color: #d3d3d3;
    border: none !important;
    padding: 12px 40px 13px 40px !important;
    cursor: pointer;
    border-radius: 55px 55px;
}
.copy-preferred-address:hover {
    background: #1b1a1a !important;
    color: #fff;
}


</style>



<script type="text/javascript">
  

    $(document).ready(function () {

        // Show the loader initially
        $("#ajax_loader").show();
        // Creating an array of promises for each AJAX request
        const promises = [
            load_artist_profile_data_OnPageLoad(),
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


        // coping preferred address

        var clipboard = new ClipboardJS('.copy-preferred-address', {
            target: function(trigger) {
                return document.getElementById('preferred_rokk_address');
            }
        });

        clipboard.on('success', function(e) {
            // Change text to "Copied"
            $(".copy-preferred-address").text("Copied");
            $(".das-input").css('border', '2px solid #e66a00');

            // Change text back to "Copy" after 2 seconds
            setTimeout(function() {
                $(".copy-preferred-address").text("Copy");
                $(".das-input").css('border', '2px solid transparent');

            }, 1500);

            e.clearSelection();
        });


        clipboard.on('error', function(e) {
            console.error('Error copying to clipboard:', e.action);
        });


    });



    function load_artist_profile_data_OnPageLoad() {

        var url = '<?= base_url('DirectArtistSupport/ajax_direct_artist_support_onPageLoad') ?>';

         // Get CSRF token values
        var csrfName ="<?= csrf_token() ?>";
        var csrfValue ="<?= csrf_hash() ?>";

        $.ajax({
            url: url,
            type: 'POST',
            data: { [csrfName]: csrfValue },
            beforeSend: function (jqXHR) {
                $('#ajax_loader').show();
            },
            success: function(response){

                var html = response.html;
                var artist_link_status_heading = response.artist_link_status_heading;

                $('#ajax_loader').fadeOut("slow");
                $('#top20-artists-container-placeholder').hide(); 
                $('#top-20-artists-container').html(html);

                $('.show-das-heading').html(artist_link_status_heading);

            },
            complete: function(data) {
                $('#ajax_loader').fadeOut("slow");
            },
            error: function (error) {
                console.log('Error:', error);
            },
            dataType: 'json'  
        });
        
    }



</script>

<div class="heading">
   <h2>Direct Artist Support</h2>
   <p class="mb-4 mt-5 show-result show-das-heading">...</p>
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
   <div class="row">
      <div class="row mt-5 top-20-artists-section">
         <div id="top20-artists-container-placeholder">
            <div class="top20-artists-animated-background">
               <div class="background-masker"></div>
            </div>
         </div>
         <div class="row">
            <div class="result-top-20-artists" id="top-20-artists-container">
            </div>
         </div>
      </div>
   </div>
</div>