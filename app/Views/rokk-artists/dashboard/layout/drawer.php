<div class="registered_artists-container">
    <div class="registered-artist-details-drawer">
        <div class="drawer-header">
            <h3>Artist Details</h3>
            <button class="close-drawer">&times;</button>
        </div>
        <div class="drawer-content">
            <form id="ArtistForm" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="request-type" id="request-type" value="add">
            <input type="hidden" name="artist_id" id="artist_id" value="">

            <div class="popup-body">
                <div class="form-row">
                    <div class="popup-form-group">
                        <label for="artist_type">Artist Type *</label>
                        <select name="artist_type" id="artist_type" required>
                            <option value="">Select type</option>
                            <option value="Band">Band</option>
                            <option value="Solo Artist">Solo Artist</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="popup-form-group">
                        <label for="artist_name">Artist Name *</label>
                        <input type="text" name="artist_name" id="artist_name" required placeholder="Enter artist name">
                    </div>
                </div>

                <div class="form-row">
                    <div class="popup-form-group">
                        <label for="artist_country">Country *</label>
                        <input type="text" name="artist_country" id="artist_country" required placeholder="Enter country">
                    </div>
                </div>

                <div class="form-row">
                    <div class="popup-form-group">
                        <label for="email_management">Management Email *</label>
                        <input type="email" name="email_management" id="email_management" required placeholder="Enter management email">
                    </div>
                </div>

                <div class="form-row">
                    <div class="popup-form-group">
                        <label for="official_contact_email">Official Contact Email *</label>
                        <input type="email" name="official_contact_email" id="official_contact_email" required placeholder="Enter contact email">
                    </div>
                </div>

                <div class="form-row">
                    <div class="popup-form-group">
                        <label for="preferred_rokk_address">Preferred Rokk Address</label>
                        <input type="text" name="preferred_rokk_address" id="preferred_rokk_address" placeholder="Enter preferred address">
                    </div>
                </div>

                <div class="form-row">
                    <div class="popup-form-group">
                        <label for="facebook">Facebook</label>
                        <input type="url" name="facebook" id="facebook" placeholder="https://">
                    </div>
                </div>

                <div class="form-row">
                    <div class="popup-form-group">
                        <label for="instagram">Instagram</label>
                        <input type="url" name="instagram" id="instagram" placeholder="https://">
                    </div>
                </div>

                <div class="form-row">
                    <div class="popup-form-group">
                        <label for="twitter">Twitter</label>
                        <input type="url" name="twitter" id="twitter" placeholder="https://">
                    </div>
                </div>

                <div class="form-row">
                    <div class="popup-form-group">
                        <label for="spotify">Spotify</label>
                        <input type="url" name="spotify" id="spotify" placeholder="https://">
                    </div>
                </div>

                <div class="form-row">
                    <div class="popup-form-group">
                        <label for="metal_archives">Metal Archives</label>
                        <input type="url" name="metal_archives" id="metal_archives" placeholder="https://">
                    </div>
                </div>

                <div class="form-row">
                    <div class="popup-form-group">
                        <label for="website">Website</label>
                        <input type="url" name="website" id="website" placeholder="https://">
                    </div>
                </div>

                <div class="form-row">
                    <div class="popup-form-group">
                        <label for="discogs">Discogs</label>
                        <input type="url" name="discogs" id="discogs" placeholder="https://">
                    </div>
                </div>

                <div class="form-row">
                    <div class="popup-form-group">
                        <label for="label">Label</label>
                        <input type="text" name="label" id="label" placeholder="Enter label name">
                    </div>
                </div>

                <div class="form-row">
                    <div class="popup-form-group">
                        <label for="distributor">Distributor & Aggregator</label>
                        <input type="text" name="distributor_and_aggregator" id="distributor_and_aggregator" placeholder="">
                    </div>
                </div>

                <div class="form-row">
                    <div class="popup-form-group">
                        <label for="referral">Referral</label>
                        <input type="text" name="referral" id="referral" placeholder="">
                    </div>
                </div>


                <div class="form-row">
                    <div class="popup-form-group">
                        <label for="artist_link_status">Artist Link Status</label>
                        <input type="text" name="artist_link_status" id="artist_link_status" placeholder="">
                    </div>
                </div>
                            
                <div class="form-row">
                    <div class="popup-form-group">
                        <label for="status">Status *</label>
                        <div class="custom-dropdown">
                            <div class="dropdown-selected" id="dropdown-selected"></div>
                            <div class="dropdown-toggle-icon" id="dropdown-toggle-icon">
                                <i class="fas fa-chevron-down"></i> 
                            </div>
                            <div class="dropdown-options" id="dropdown-options">
                                <div class="dropdown-option" data-value="active">Active</div>
                                <div class="dropdown-option" data-value="requested">Requested</div>
                                <div class="dropdown-option" data-value="inactive">Inactive</div>
                            </div>
                            <input type="hidden" name="status" id="status" required>
                        </div>
                    </div>
                </div>

                <div class="form-row drawer-additional-fields" style="display:none;">
                    <div class="popup-form-group">
                        <label for="join_date">Join Date</label>
                        <input type="text" name="join_date" id="join_date" readonly>
                    </div>
                </div>

            </div>
        </div>

        <div class="drawer-actions drawer-actions-add">
            <button class="mark-btn drawer-actions-submit-btn"><i class="ri-add-line"></i> SUBMIT</button>
            <button class="close-drawer-btn"><i class="ri-close-line"></i> CANCEL</button>
        </div>

        <div class="drawer-actions drawer-actions-update" style='display:none;'>
            <button class="mark-btn drawer-actions-update-btn"><i class="ri-edit-line"></i> UPDATE</button>
            <button class="close-drawer-btn"><i class="ri-close-line"></i> CANCEL</button>
        </div>

        </form>
    </div>
</div>