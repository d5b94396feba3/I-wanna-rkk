<style>
#dashboard-footer {
    margin: 0px 55px 0px 111px !important;
}
.header-scrolled {
    padding: 42px 66px 20px 14px !important;
}
.separator {
    width: 100%;
    height: 1px;
    background-color: #333333ab;
    margin: 0px 0px 25px 0px;
}

#faq-content-placeholder {
    background: linear-gradient(to right, rgba(40, 40, 40, 0) 47.82%, rgba(17, 17, 17, 0) 100%);
    background-size: 100% 100%, 100% 100%, contain;
    background-position: right center;
    border-radius: 15px;
    color: #FFFFFFCC;
    margin: 0px 0px 0px 0px;
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
        background-position: 0 0;
    }
    100% {
        background-position: 2000px 0;
    }
}

.account-animated-background {
    animation-duration: 2.6s;
    animation-fill-mode: forwards;
    animation-iteration-count: infinite;
    animation-name: placeHolderShimmer;
    animation-timing-function: linear;
    background: linear-gradient(to right, #141414 0%, rgb(17 17 17 / 95%) 100%);
    background-size: 200% 100%;
    height: 750px !important;
    border-radius: 1px;
    position: relative;
}

.main-container {
    padding: 7px 37px 30px 112px !important;
}

.main-container p {
    line-height: 1.6rem;
    color: #888;
    font-size: 13px;
}

/* Main Navigation Bar */
.main-nav {
    display: flex;
    justify-content: space-between;
    padding: 0px 0px;
    margin:45px 0px 25px 0px;
}

.main-nav-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    color: #fff;
    text-decoration: none;
    padding: 15px 40px;
    background-color: #1a1a1a;
    border-radius: 12px;
    gap: 10px;
    font-size: 14px !important;
    margin-right: 10px !important;
}

.main-nav-item i {
    font-size: 24px;
    color: #ff8303;
    margin-bottom: 5px;
}

.main-nav-item.active {
    background-color: rgba(255,255,255,0.17);
    color: #fff;
}

.main-nav-item:hover {
    background-color: rgba(255,255,255,0.16);
    color: #fff;
}

.analytics-header {
    padding: 10px 0;
    margin-bottom: 0px;
    margin-top: 30px;
}

.analytics-nav {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.analytics-nav-item {
    margin-right: 10px;
    border: 1px solid #292626;
    border-radius: 65px;
}

.analytics-nav-link {
    display: inline-block;
    padding: 8px 16px;
    border-radius: 20px;
    color: #888;
    text-decoration: none;
    font-size: 13px;
    transition: background-color 0.3s, color 0.3s;
}

.analytics-nav-link:hover,
.analytics-nav-link.active {
    background-color: #333;
    color: #fff;
}

.analytics-nav-link.active {
    background-color: #ff8303;
    color: #fff;
}

/* Secondary Navigation Bar */
.secondary-nav {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    gap: 10px;
    margin-bottom: 26px;
    z-index: 1;
    transition: background-color 0.3s ease;
}

.secondary-nav-item {
    color: #888;
    text-decoration: none;
    padding: 8px 16px;
    border-radius: 12px;
    font-size: 14px;
    border: 1px solid #292626;
}

.secondary-nav-item.active {
    background-color: #ff8303;
    color: #fff;
}

.secondary-nav-item:hover {
    background-color: #ff8303;
    color: #fff;
}

.read-more-btn, .read-less-btn{
    color: #888;
    text-decoration: none;
    padding: 8px 16px;
    border-radius: 12px;
    font-size: 12px;
    border: 1px solid #4b4343;
}

/* faq styling start here... */
.faq-container {
    margin-top: 20px;
}

.faq-item,
.faq-item-noresult{
    background-color: rgba(255,255,255,0.08);
    border-radius: 10px;
    margin-bottom: 20px;
    overflow: hidden;
    height: 300px;
    border: 1px solid rgba(255,255,255,0.08);
}
.faq-question {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 20px 20px 20px;
    cursor: pointer;
    font-weight:500;
    font-family: 'Poppins', sans-serif;
}

.faq-question span {
    color: rgba(255, 255, 255, 0.9);
    font-size: 18px;
    font-weight: 600;
}

.faq-question svg {
    color: #6f6d6d;
    transition: transform 0.3s ease;
}

.faq-question svg.rotate360 {
    transform: rotate(180deg);
}

.faq-answer {
    padding: 0px 80px 20px 22px;
    margin-top: -10px;
    color: rgba(255, 255, 255, 0.2);
}
.faq-answer p {
    margin: 0;
    font-size: 14px;
    font-family: 'Poppins', sans-serif;
    line-height: 1.7em;
}

.show-more-content{
    display: none;
}

.faq-item.active {
    background-color: rgba(255,255,255,0.16);
    border: 1px solid #565454;
}

.faq-item:hover{
    background-color: rgba(255,255,255,0.16);
    border: 1px solid #565454;
}
.faq-item:hover .faq-question span,
.faq-item.active .faq-question span{
    color: #ff8303;
}
.faq-item:hover .faq-answer p,
.faq-item.active .faq-answer p{
    color: rgba(255, 255, 255, 0.7);
}
.faq-item:hover .read-more-btn,
.faq-item:hover .read-less-btn,
.faq-item.active .read-more-btn,
.faq-item.active .read-less-btn {
    color: #cfc2c2;
    border: 1px solid #7d7a7a;
}

.alert svg {
    font-size: 20px;
    margin-left: 10px;
    margin: 0px 25px -1px 5px;
}

/* Media query for smaller screens */
@media (max-width: 768px) {
    .main-nav {
        display: grid;
        grid-template-columns: 1fr 1fr;
        margin: 6px 0px 16px 0px;
        width: 100%;
        gap: 2px 10px;
    }
    .main-nav-item {
        display: block;
        border-radius: 12px;
        font-size: 12px !important;
        margin: 0px 4px 12px 0px;
        padding: 10px 10px 10px 10px;
    }
    .main-nav-item svg {
        width: 17px;
        height: 17px;
        margin-right: 7px;
    }
    .secondary-nav {
        gap: 0px;
    }
    .secondary-nav-item {
        margin-bottom: 10px;
        margin-right: 10px;
    }
    .faq-item {
        height: 361px;
        margin-bottom:20px;
    }
    #dashboard-footer {
        position: static !important;
        width: 100%;
    }
    .secondary-nav.sticky {
        top: 74px;
        position: static !important;
    }
    #dashboard-footer {
        margin: 0px 0px 0px 0px !important;
    }
}

</style>

<script src="<?= base_url('assets/src/js/faqs/public/index.js') ?>"></script>
<script src="<?= base_url('assets/src/js/faqs/public/main-nav.js') ?>"></script>
<script src="<?= base_url('assets/src/js/faqs/public/read-more.js') ?>"></script>
<script src="<?= base_url('assets/src/js/faqs/public/secondary-nav.js') ?>"></script>
<script src="<?= base_url('assets/src/js/faqs/public/header-scroll.js') ?>"></script>


<div class="main-container">

    <nav class="main-nav">
        <!-- <a href="#" class="main-nav-item" data-main-navid="1">
            <svg width="35" height="34" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.25 13.75V10L19.5 15L13.25 20V16.25H2V13.75H13.25ZM3.82225 18.75H6.4769C7.96036 22.4147 11.5533 25 15.75 25C21.2729 25 25.75 20.5229 25.75 15C25.75 9.47715 21.2729 5 15.75 5C11.5533 5 7.96036 7.58521 6.4769 11.25H3.82225C5.41509 6.17861 10.153 2.5 15.75 2.5C22.6535 2.5 28.25 8.09644 28.25 15C28.25 21.9035 22.6535 27.5 15.75 27.5C10.153 27.5 5.41509 23.8214 3.82225 18.75Z" fill="#FF8303"/>
            </svg>
            <span>Registration</span>
        </a> -->

        <?php foreach($faq_sections as $section): ?>
            <?php $section_exist=false; ?>
         <a href="#" class="main-nav-item <?php echo ($section['id'] == 1) ? 'active' : ''; ?>" data-main-navid="<?php echo $section['id']; ?>">
        <?php if(strtolower($section['name']) == 'account'): ?>
            <svg width="35" height="34" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.42432 21.2501C3.88401 20.3142 3.47846 19.3376 3.20166 18.3425C4.41725 17.7222 5.24965 16.4584 5.24965 15.0001C5.24965 13.543 4.4185 12.2799 3.20441 11.6591C3.76281 9.64551 4.82321 7.77021 6.33092 6.23739C7.47587 6.98008 8.98669 7.06905 10.2496 6.33988C11.5126 5.6107 12.191 4.25781 12.1202 2.89493C14.2016 2.35563 16.3559 2.37493 18.3789 2.89815C18.3094 4.25995 18.9876 5.61128 20.2496 6.33988C21.5126 7.06903 23.0234 6.98008 24.1682 6.23746C24.8916 6.9747 25.5346 7.81426 26.075 8.75014C26.6152 9.686 27.0209 10.6627 27.2976 11.6577C26.082 12.278 25.2496 13.5419 25.2496 15.0001C25.2496 16.4574 26.0807 17.7204 27.2949 18.3411C26.7365 20.3547 25.6761 22.23 24.1684 23.7629C23.0234 23.0203 21.5126 22.9312 20.2496 23.6604C18.9866 24.3895 18.3084 25.7425 18.379 27.1054C16.2977 27.6446 14.1435 27.6254 12.1204 27.1021C12.1899 25.7402 11.5116 24.389 10.2496 23.6604C8.98672 22.9312 7.47599 23.0201 6.33105 23.7627C5.60771 23.0255 4.96465 22.186 4.42432 21.2501ZM11.4996 21.4954C12.8639 22.283 13.8436 23.5282 14.3129 24.9572C14.9357 25.0165 15.5627 25.0174 16.1857 24.9592C16.6547 23.5295 17.6347 22.2834 18.9996 21.4954C20.3645 20.7072 21.9338 20.4817 23.4065 20.7904C23.7682 20.2799 24.081 19.7364 24.3411 19.1674C23.3382 18.0465 22.7496 16.5754 22.7496 15.0001C22.7496 13.4249 23.3382 11.9539 24.3411 10.833C24.211 10.5505 24.0672 10.2727 23.9099 10.0001C23.7525 9.72761 23.5837 9.46423 23.4041 9.2104C21.9321 9.51833 20.3639 9.29255 18.9996 8.50494C17.6354 7.71731 16.6557 6.47198 16.1864 5.04306C15.5636 4.9838 14.9365 4.98295 14.3136 5.04103C13.8445 6.47076 12.8645 7.71693 11.4996 8.50494C10.1347 9.29296 8.56556 9.51855 7.09285 9.20991C6.73106 9.72039 6.41829 10.2638 6.1582 10.8328C7.16101 11.9538 7.74965 13.4249 7.74965 15.0001C7.74965 16.5754 7.16104 18.0464 6.1582 19.1672C6.28834 19.4497 6.43205 19.7276 6.5894 20.0001C6.74674 20.2726 6.9155 20.536 7.09515 20.7899C8.56721 20.482 10.1355 20.7077 11.4996 21.4954ZM15.2496 18.7501C13.1786 18.7501 11.4996 17.0712 11.4996 15.0001C11.4996 12.9291 13.1786 11.2501 15.2496 11.2501C17.3207 11.2501 18.9996 12.9291 18.9996 15.0001C18.9996 17.0712 17.3207 18.7501 15.2496 18.7501ZM15.2496 16.2501C15.94 16.2501 16.4996 15.6905 16.4996 15.0001C16.4996 14.3097 15.94 13.7501 15.2496 13.7501C14.5592 13.7501 13.9996 14.3097 13.9996 15.0001C13.9996 15.6905 14.5592 16.2501 15.2496 16.2501Z" fill="#FF8303"/>
            </svg>
            <?php $section_exist=true; ?>
        <?php endif; ?>
        <?php if(strtolower($section['name']) == 'direct artist support'): ?>
            <svg width="35" height="34" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.70153 5.58582C7.73147 2.55588 12.5591 2.41925 15.7511 5.17594C18.9411 2.41925 23.7687 2.55588 26.7986 5.58582C29.8231 8.61033 29.9646 13.4261 27.2232 16.6183L17.5179 26.3571C16.5859 27.289 15.1012 27.3314 14.1191 26.4841L13.9824 26.3571L4.27688 16.6183C1.53547 13.4261 1.67702 8.61033 4.70153 5.58582ZM6.4693 7.35358C4.33536 9.48752 4.2744 12.9094 6.2864 15.117L6.4693 15.3085L15.7501 24.5893L22.3784 17.9593L17.9597 13.5408L16.634 14.8666C15.1695 16.331 12.7951 16.331 11.3307 14.8666C9.8662 13.4021 9.8662 11.0278 11.3307 9.56329L13.9571 6.93517C11.8163 5.22129 8.71357 5.29979 6.66087 7.17067L6.4693 7.35358ZM17.0759 10.8891C17.564 10.401 18.3555 10.401 18.8436 10.8891L24.1461 16.1915L25.0309 15.3085C27.2275 13.1119 27.2275 9.55028 25.0309 7.35358C22.8969 5.21964 19.475 5.15868 17.2675 7.17067L17.0759 7.35358L13.0984 11.3311C12.6451 11.7843 12.6128 12.4992 13.0013 12.9898L13.0984 13.0989C13.5517 13.5521 14.2665 13.5845 14.7571 13.196L14.8662 13.0989L17.0759 10.8891Z" fill="#FF8303"/>
            </svg>
            <?php $section_exist=true; ?>
        <?php endif; ?>

        <?php if(strtolower($section['name']) == 'transparent royalty'): ?>
            <svg width="35" height="34" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M26.5 23.75H4.5V6.25H26.5V23.75ZM24 21.25V8.75H7V21.25H24ZM16.75 18.75H14.25V13.75H16.75V18.75ZM21.25 18.75H18.75V11.25H21.25V18.75ZM12.25 18.75H9.75V16.25H12.25V18.75Z" fill="#FF8303"/>
            <circle cx="15.5" cy="11.25" r="2.5" fill="#FF8303"/>
            </svg>
            <?php $section_exist=true; ?>
        <?php endif; ?>

        <?php if(strtolower($section['name']) == 'countries available'): ?>
            <svg width="35" height="34" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.5 2.5C8.3125 2.5 2.5 8.3125 2.5 15.5C2.5 22.6875 8.3125 28.5 15.5 28.5C22.6875 28.5 28.5 22.6875 28.5 15.5C28.5 8.3125 22.6875 2.5 15.5 2.5ZM25.9375 14.375H21.875C21.6875 11.5625 20.8125 8.9375 19.375 6.875C22.875 8 25.5 10.875 25.9375 14.375ZM15.5 25.875C14.0625 25.875 11.875 22.5 11.625 16.625H19.375C19.125 22.5 16.9375 25.875 15.5 25.875ZM11.625 14.375C11.875 8.5 14.0625 5.125 15.5 5.125C16.9375 5.125 19.125 8.5 19.375 14.375H11.625ZM11.625 6.875C10.1875 8.9375 9.3125 11.5625 9.125 14.375H5.0625C5.5 10.875 8.125 8 11.625 6.875ZM5.0625 16.625H9.125C9.3125 19.4375 10.1875 22.0625 11.625 24.125C8.125 23 5.5 20.125 5.0625 16.625ZM19.375 24.125C20.8125 22.0625 21.6875 19.4375 21.875 16.625H25.9375C25.5 20.125 22.875 23 19.375 24.125Z" fill="#FF8303"/>
            </svg>
            <?php $section_exist=true; ?>
        <?php endif; ?>

        <?php if(strtolower($section['name']) == 'about rokk'): ?>
            <svg width="35" height="34" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M23.5 15.5C23.5 13.3 22.65 11.3 21.25 9.75L19.5 11.5C20.45 12.625 21 14 21 15.5C21 19.075 18.075 22 14.5 22V19L10 23.5L14.5 28V25C19.75 25 23.5 20.75 23.5 15.5ZM14.5 8V11L19 6.5L14.5 2V5C9.25 5 5.5 9.25 5.5 14.5C5.5 16.7 6.35 18.7 7.75 20.25L9.5 18.5C8.55 17.375 8 16 8 14.5C8 10.925 10.925 8 14.5 8Z" fill="#FF8303"/>
            </svg>
            <?php $section_exist=true; ?>
        <?php endif; ?>

        <?php if(strtolower($section['name']) == 'partners'): ?>
            <svg width="35" height="34" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.5 13.75C22.75 13.75 24.5 12 24.5 9.75C24.5 7.5 22.75 5.75 20.5 5.75C18.25 5.75 16.5 7.5 16.5 9.75C16.5 12 18.25 13.75 20.5 13.75Z" fill="#FF8303"/>
                <path d="M10.5 13.75C12.75 13.75 14.5 12 14.5 9.75C14.5 7.5 12.75 5.75 10.5 5.75C8.25 5.75 6.5 7.5 6.5 9.75C6.5 12 8.25 13.75 10.5 13.75Z" fill="#FF8303"/>
                <path d="M20.5 15.75C17.63 15.75 12 17.19 12 20.06V24.25H29V20.06C29 17.19 23.37 15.75 20.5 15.75Z" fill="#FF8303"/>
                <path d="M10.5 15.75C7.63 15.75 2 17.19 2 20.06V24.25H10V20.06C10 18.41 10.93 16.18 14.13 14.58C12.83 15.03 11.54 15.75 10.5 15.75Z" fill="#FF8303"/>
            </svg>
            <?php $section_exist=true; ?>
        <?php endif; ?>

        <?php if(!$section_exist){ ?>
            <svg width="35" height="34" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.5 27.5C8.59644 27.5 3 21.9036 3 15C3 8.09644 8.59644 2.5 15.5 2.5C22.4036 2.5 28 8.09644 28 15C28 21.9036 22.4036 27.5 15.5 27.5ZM15.5 25C21.0228 25 25.5 20.5228 25.5 15C25.5 9.47715 21.0228 5 15.5 5C9.97715 5 5.5 9.47715 5.5 15C5.5 20.5228 9.97715 25 15.5 25ZM15.5 18.75C14.2573 18.75 13.25 17.7427 13.25 16.5C13.25 15.2573 14.2573 14.25 15.5 14.25C16.7427 14.25 17.75 15.2573 17.75 16.5C17.75 17.7427 16.7427 18.75 15.5 18.75ZM15.5 11.25C14.2573 11.25 13.25 10.2427 13.25 9C13.25 7.75736 14.2573 6.75 15.5 6.75C16.7427 6.75 17.75 7.75736 17.75 9C17.75 10.2427 16.7427 11.25 15.5 11.25Z" fill="#FF8303"/>
            </svg>
        <?php } ?>

        <span><?php echo $section['name']; ?></span>
        </a>
        <?php endforeach; ?>
      
    </nav>
    <div class="separator"></div>

    <nav class="secondary-nav">
       <?php if (!empty($faq_questions)): ?>
           <a href="#" class="secondary-nav-item active" data-sec-navid="7">All</a>
           <?php foreach ($faq_questions as $question): ?>
               <?php if(strtolower($question['name']) != "all" && $question['prio']==0): ?>
                   <a href="#" class="secondary-nav-item" data-sec-navid="<?php echo $question['id']; ?>"><?php echo $question['name']; ?></a>
               <?php endif; ?>
           <?php endforeach; ?>
       <?php else: ?>
           <p>No FAQ sections found.</p>
       <?php endif; ?>
    </nav>

    <?php if(isset($_SESSION['success-msg'])): ?>
        <div class="alert alert-success mt-4" style="width: 28% !important;">
            <i class="fas fa-check-circle"></i>
            <?php 
            echo $_SESSION['success-msg'];
            unset($_SESSION['success-msg']);
            ?>
        </div>
    <?php endif; ?>

    <?php if(isset($_SESSION['error-msg'])): ?>
        <div class="alert alert-danger mt-4" style="width: 50% !important;">
            <i class="fas fa-exclamation-circle"></i>
            <?php
            echo $_SESSION['error-msg'];
            unset($_SESSION['error-msg']);
            ?>
        </div>
    <?php endif; ?>
    
    <div id="faq-content-placeholder">
        <div class="account-animated-background">
            <div class="background-masker"></div>
        </div>
    </div>

    <div class="faq-container">
       <!-- dynamic content -->
    </div>

</div>

