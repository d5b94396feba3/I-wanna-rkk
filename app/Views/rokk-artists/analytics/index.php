<style>

#dashboard-footer {
    margin: 0px 55px 0px 111px !important;
}

#pro-content-placeholder {
    width: 100%;
    background: linear-gradient(to right, rgba(40, 40, 40, 0) 47.82%, rgba(17, 17, 17, 0) 100%);
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
    background: linear-gradient(to right, #131313 47.82%, rgba(17, 17, 17, 0) 100%);
    background-size: 100% 100%, 100% 100%, contain;
    background-position: right center;
    height: 625px !important;
    border-radius: 1px;
    position: relative;
}

.pro-right-sidebar {
    overflow-y: hidden;
    background: rgba(30, 30, 30, 0.67);
    margin-top: 15px;
    padding: 35px 66px 30px 35px;
    height: 100% !important;
    overflow-x: hidden;
    height: 30vh !important;
    border-radius: 10px;
    margin-left: 12px;
}
.main-container p {
    line-height: 1.6rem;
    color: #888;
    font-size: 13px;
}

.analytics-header {
    padding: 0px 0;
    margin-bottom: 0px;
    margin-top: 0px;
    overflow-x: auto;
}

.analytics-nav {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    list-style-type: none;
    padding: 0;
    margin: 0;
    flex-wrap: nowrap;
    min-width: max-content;
}

.analytics-nav-item {
    margin-right: 10px;
    border: 1px solid #292626;
    border-radius: 65px;
    flex-shrink: 0;
}

.analytics-nav-link {
    display: inline-block;
    padding: 8px 16px;
    border-radius: 20px;
    color: #888;
    text-decoration: none;
    font-size: 13px;
    transition: background-color 0.3s, color 0.3s;
    white-space: nowrap;
}

.analytics-nav-link:hover,
.analytics-nav-link.active {
    background-color: #333;
    color: #fff;
}

.analytics-nav-link.active {
    background-color: #333;
    color: #ff8303;
}

/* Media query for smaller screens */
@media (max-width: 768px) {
    .analytics-nav-link {
        padding: 6px 12px;
        font-size: 12px;
    }
    #dashboard-footer {
        margin: 0px 0px 0px 0px !important;
    }
}

</style>



<script type="text/javascript">
  

    $(document).ready(function () {
        // Creating an array of promises for each AJAX request
        const promises = [
            load_artist_stats_data_OnPageLoad(),
        ];

        // Wait for all AJAX requests to complete before hiding the loader
        Promise.all(promises)
            .then(() => {
                $("#ajax_loader").fadeOut("slow");
            })
            .catch((error) => {
                console.log("Error:", error);
            });

    });



    function load_artist_stats_data_OnPageLoad() {

        var url = '<?= base_url('Analytics/ajax_artist_stats_data_onPageLoad') ?>';
        // Get CSRF token values
        var csrfName ="<?= csrf_token() ?>";
        var csrfValue ="<?= csrf_hash() ?>";

        $.ajax({
            url: url,
            type: 'GET',
            data:{
                [csrfName]:csrfValue
            },
            timeout:20000, // 20 seconds
            beforeSend: function (jqXHR) {
                $('.profile-details-btn').addClass('menu-active');
            },
            success: function(response){
                var html = response;
                $('#ajax_loader').fadeOut("slow");
                $('#pro-content-placeholder').hide(); 
                $('.pro-selected-menu-container').html(html);
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors
                // window.show_error_msg('An error occurred while processing your request. Please refresh and try again.');
                $('#pro-content-placeholder').hide();
                $('.pro-selected-menu-container').html('An error occurred while processing your request. Please refresh and try again.');
                console.log('Error submitting form:', error);
            },
            dataType: 'text'  
        });
    }

    $(document).ready(function() {
        $('.analytics-nav-link').on('click', function(e) {
            e.preventDefault();
            $('.analytics-nav-link').removeClass('active');
            $(this).addClass('active');
        });
    });


</script>

<div class="main-container">

    <div class="analytics-header">
        <nav>
            <ul class="analytics-nav">
                <li class="analytics-nav-item"><a href="#" class="analytics-nav-link active">All</a></li>
                <li class="analytics-nav-item"><a href="#" class="analytics-nav-link">Releases</a></li>
                <li class="analytics-nav-item"><a href="#" class="analytics-nav-link">Streams</a></li>
                <li class="analytics-nav-item"><a href="#" class="analytics-nav-link">Income</a></li>
                <li class="analytics-nav-item"><a href="#" class="analytics-nav-link">Followers</a></li>
                <li class="analytics-nav-item"><a href="#" class="analytics-nav-link">Direct Artist Support</a></li>
            </ul>
        </nav>
    </div>
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
         <div class="col-md-12 col-lg-12 col-sm-12 pro-right-sidebar">
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