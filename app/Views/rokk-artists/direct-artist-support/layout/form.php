<style>

.copy-input-container {
    position: relative;
    display: flex;
    align-items: center;
    gap: 10px;
    width: 98%;
}

.das-input.das-preferred-address {
    flex: 1;
    height: 44px;
    padding: 8px 16px;
    font-size: 16px;
    color: rgba(255, 255, 255, 0.9);
    background: rgba(255, 255, 255, 0.07);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    transition: all 0.2s ease;
    width: 76% !important;
}

.das-input.das-preferred-address:focus {
    border-color: rgba(255, 131, 3, 0.5);
    outline: none;
    box-shadow: 0 0 0 2px rgba(255, 131, 3, 0.2);
}

.copy-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    height: 44px;
    padding: 0 20px;
    color: rgba(255, 255, 255, 0.9);
    background: rgba(255, 131, 3, 0.1);
    border: 1px solid rgba(255, 131, 3, 0.2);
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.copy-btn:hover {
    background: rgba(255, 131, 3, 0.2);
    border-color: rgba(255, 131, 3, 0.3);
}

.copy-btn:active {
    transform: translateY(1px);
}

.copy-btn svg {
    color: rgba(255, 131, 3, 0.9);
}

.copy-btn span {
    font-size: 14px;
    font-weight: 500;
}
</style>


<?php

if($artist_link_status=="empty"){
    $artist_link_status_heading = "<span class='status-inactive'>You haven't submitted your ROKK Preferred address yet.</span>";
}
else if($artist_link_status=="requested"){
    $artist_link_status_heading = "<span class='status-requested'>You can still change your preferred ROKK address.</span>";
}
else if($artist_link_status=="confirmed"){
    $artist_link_status_heading = "<span class='status-active'>Congratulations! The ROKK address you requested has been confirmed.</span>";
}

$artist_id = trim($record->artist_id);
$preferred_rokk_address = strtolower($record->preferred_rokk_address);

if($artist_link_status !== "confirmed"): ?>

    <p class="show-result show-das-heading"><?= $artist_link_status_heading ?></p>

    <form action="<?= base_url('update_direct_artist_support') ?>" class="das-form" id="das-form" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <input type="hidden" class="das-input" name="userid" id="userid" value="<?= $artist_id ?>">

        <input type="text" class="das-input" name="preferred_rokk_address" id="preferred_rokk_address" value="<?= $preferred_rokk_address ?>" placeholder="YourBandName" required> <span class="rokk-app">.rokk.app</span>

        <p class="pass-valid-text"> Allowed: letters, digits and -, at least 3 letters</p>
             
        <section id="termsofsevice" class="termsofsevice-txtarea">
            <!-- Terms of service content -->
            <?php include(__DIR__ . '/terms_of_service.php'); ?>
        </section>

        <p class="checkbox">
            <input type="checkbox" id="tfs-checkbox1" name="tfs-checkbox1" required> I have read and agreed to the <a href="#" class="checkbox-link">"terms of service"</a>.
        </p>

        <p class="checkbox">
            <input type="checkbox" id="tfs-checkbox2" name="tfs-checkbox2" required> I have the right to act on behalf of the above-mentioned artist in business matters.
        </p>

        <div class="form-group">
            <button type="submit" class="das-submit-btn">Submit</button>
        </div>
    </form>

<?php else: ?>

    <p class="show-result show-das-heading"><?= $artist_link_status_heading ?></p>
    <div class="das-container das-active-address">
        <p class="das-info">Copy and paste it to your social networks and start earning Direct Artist Support!</p>
        <div class="copy-input-container">
            <input type="text" class="das-input das-preferred-address" name="preferred_rokk_address" id="preferred_rokk_address" value="<?= $preferred_rokk_address ?>" placeholder="YourBandName" readonly>
            <button type="button" class="copy-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 3H4C3.45 3 3 3.45 3 4V16C3 16.55 3.45 17 4 17H16C16.55 17 17 16.55 17 16V4C17 3.45 16.55 3 16 3ZM15 15H5V5H15V15ZM19 7V19C19 19.55 18.55 20 18 20H6V22H18C19.65 22 21 20.65 21 19V7H19Z" fill="currentColor"/>
                </svg>
                <span class="copy-preferred-address">Copy</span>
            </button>
        </div>
    </div>

<?php endif; ?>

<script src="<?= base_url('assets/src/js/direct-artist-support/form.js') ?>"></script>
