<style>
    #dashboard-footer {
        margin: 0px 40px 0px 113px !important;
    }
    .main-container {
        height: 100% !important;
    }
    .main-container {
        padding: 45px 37px 30px 112px !important;
    }
    .error-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 70vh;
        text-align: center;
        background-color: #0e0e0e;
        color: #FFFFFF;
    }

    .error-code {
        font-size: 120px;
        font-weight: bold;
        color: #ff8303;
        margin-bottom: 20px;
    }

    .error-message {
        font-size: 24px;
        margin-bottom: 30px;
    }

    .error-description {
        font-size: 16px;
        color: #888;
        margin-bottom: 30px;
        max-width: 600px;
    }

    .return-home {
        display: inline-block;
        padding: 12px 24px;
        background-color: #ff8303;
        color: #FFFFFF;
        text-decoration: none;
        border-radius: 12px;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .return-home:hover {
        background-color: #e67300;
        color:#fff;
    }
</style>

<div class="main-container">

<div class="error-container">
    <div class="error-code">404</div>
    <h1 class="error-message">Page Not Found</h1>
    <p class="error-description">Oops! The page you're looking for doesn't exist or may have been moved.</p>
    <a href="<?php echo base_url(); ?>/" class="return-home">Return to Homepage</a>
</div>
  
</div>
