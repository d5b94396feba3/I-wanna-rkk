<style>
#main-footer {
    margin: 0px 55px 0px 111px !important;
}
.ac-table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0 10px;
  font-family: 'Poppins', sans-serif;
  color: #fff;
  background-color: transparent;
}

.ac-table thead th {
  padding: 10px;
  text-align: left;
  font-weight: normal;
  color: rgba(255,255,255,0.5);
  font-size: 12px;
  position: relative;
}

.ac-table thead th > a{
  color: rgba(255,255,255,0.5);
}

.ac-table .sort-icon {
  float: right;
  color: #666;
  font-size: 12px;
  margin-left: 5px;
}

.ac-table thead th a:hover,
.ac-table thead th a:hover > .sort-icon{
    color: #fff;
}

.active-arrow{
  color: #fff;
}

.ac-table tbody tr {
  background-color: rgba(255,255,255,0.02);
  transition: background-color 0.3s;
  border-radius: 10px;
  overflow: hidden;
}

.ac-table tbody tr:hover {
  background-color: #2a2a2a;
}

.ac-table td {
  padding: 10px;
  font-size: 12px;
  color: rgba(255,255,255,0.7);
}

.ac-table td:first-child {
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
}

.ac-table td:last-child {
  border-top-right-radius: 10px;
  border-bottom-right-radius: 10px;
}

.ac-table td:first-child {
    width: 85px;
}

.ac-table td img {
    width: 42px;
    height: 42px;
    object-fit: cover;
    border-radius: 5px;
}

.ac-table .active {
  font-weight: 500;
}

.ac-table .active.pending {
  color: #FFAB5D;
}
.ac-table .active.active,
.ac-table .active.yes {
  color: #90EE90; /* Light green color */
}

.ac-table .active.inactive,
.ac-table .active.no  {
  color: #E45263;
}

.ac-table .arrow {
  font-size: 24px;
  color: #666;
}

.ac-table .arrow {
    font-size: 24px;
    color: #666;
    float: right;
    margin-right: 10px;
}

#pagination-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 12px;
  font-family: 'Poppins', sans-serif;
  color: rgba(255,255,255,0.7);
  padding-bottom:30px;
}

.pagi-rank {
  font-size: 12px;
  margin: 0;
}

.pagination {
    display: flex;
    list-style-type: none;
    padding: 0;
    margin: 0;
    font-size: 12px;
}

.pagination a, .pagination .current-page {
    display: inline-block;
    padding: 5px 10px;
    text-decoration: none;
    color: rgba(255,255,255,0.7);
    background-color: rgba(255,255,255,0.08);
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
    margin: 0 5px;
}

.pagination .current-page {
    background-color: rgba(255,255,255,0.2);
    color: #fff;
}

.pagination a:hover {
  background-color: #ff8303;
  color: #000;
}

.ca-header{
    margin: 0px 0px 10px 0px;
    padding: 0px 0px 0px 0px;
    border-bottom: 1px solid #322b2b;
}

.no-result{
  text-align: center; 
  color: #666; 
  font-size: 16px; 
  padding: 20px;
}

@media screen and (max-width: 768px) {
    .table-container {
        overflow-x: auto;
   }
   .pagination a, .pagination .current-page {
        padding: 0px 3px !important;
    }
  #main-footer {
    margin: 0px 0px 0px 0px !important;
  }
}

</style>

<div class="acccount-header ca-header">
    <h2 class="acccount-header-title">Connected Accounts</h2>
    <p>Shows your all the connected accounts.</p>
</div>

<?php if (!empty($artist_user)): ?>
<div class="table-container">
<table class="ac-table">
  <thead>
    <tr>
      <th>
        <a class="ac-table-a" href="<?= esc(site_url(
            "Account/ajax_paginated_artist_connected_accounts_data?sort_column=id&order=" .
            ($sort_column == "id" && $order == "asc" ? "desc" : "asc")
        )) ?>">
          NO.
          <span class="sort-icon">
            <?= ($sort_column == "id" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th>
      <th>
        <a class="ac-table-a" href="<?= esc(site_url(
            "Account/ajax_paginated_artist_connected_accounts_data?sort_column=user_id&order=" .
            ($sort_column == "user_id" && $order == "asc" ? "desc" : "asc")
        )) ?>">
         USER ID
          <span class="sort-icon">
            <?= ($sort_column == "user_id" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th>
      <th>
        <a class="ac-table-a" href="<?= esc(site_url(
            "Account/ajax_paginated_artist_connected_accounts_data?sort_column=type&order=" .
            ($sort_column == "type" && $order == "asc" ? "desc" : "asc")
        )) ?>">
         TYPE
          <span class="sort-icon">
            <?= ($sort_column == "type" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th>
      <th>
        <a class="ac-table-a" href="<?= esc(site_url(
            "Account/ajax_paginated_artist_connected_accounts_data?sort_column=role&order=" .
            ($sort_column == "role" && $order == "asc" ? "desc" : "asc")
        )) ?>">
         ROLE
          <span class="sort-icon">
            <?= ($sort_column == "role" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th>
      <th colspan="2">
        <a class="ac-table-a" href="<?= esc(site_url(
            "Account/ajax_paginated_artist_connected_accounts_data?sort_column=active&order=" .
            ($sort_column == "active" && $order == "asc" ? "desc" : "asc")
        )) ?>">
        ACTIVE
          <span class="sort-icon">
            <?= ($sort_column == "active" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th>
    </tr>
  </thead>
  <tbody>
    <?php
      $index = 1;
      $start_record = ($current_page - 1) * $per_page + 1;
      $index = $start_record;
      $end_record = min($current_page * $per_page, $total_records);
      foreach ($artist_user as $i => $user): ?>
        <tr>
            <td><?= $index ?></td>
            <td><?= $user['user_id'] ?></td>
            <td><?= $user['type'] ?></td>
            <td><?= $user['role'] ?></td>
            <td class="active <?= strtolower($user['active']) ?>"><?= $user['active'] ?></td>
            <!-- <td><a href="<?= base_url('account_detail/'.$user['id']) ?>"><span class="arrow">›</span></a></td> -->
            <td><a href="#"><span class="arrow">›</span></a></td>
        </tr>
    <?php $index++; ?>
    <?php endforeach; ?>
  </tbody>
</table>
</div>

<?php if ($total_records >= $per_page) { ?>

<div id="pagination-container">
    <p class="pagi-rank">Showing <?= ($current_page - 1) * $per_page + 1 ?> to <?= min($current_page * $per_page, $total_records) ?> of <?= $total_records ?> </p>
    
    <div class="pagination">
        <?php if ($has_previous): ?>
            <a href="<?= esc(site_url('Account/ajax_paginated_artist_connected_accounts_data?page='.$current_page - 1)) ?>" class="prev-link">&laquo; Prev</a>
        <?php endif; ?>

        <?php for ($i = max(1, $current_page - 2); $i <= min($total_pages, $current_page + 2); $i++): ?>
            <?php if ($i == $current_page): ?>
                <span class="current-page"><?= $i ?></span>
            <?php else: ?>
                <a href="<?= esc(site_url('Account/ajax_paginated_artist_connected_accounts_data?page=' . $i)) ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($has_next): ?>
            <a href="<?= esc(site_url('Account/ajax_paginated_artist_connected_accounts_data?page='.$current_page + 1)) ?>" class="next-link">Next &raquo;</a>
        <?php endif; ?>
    </div>
</div>

<?php } else { ?>

<div id="pagination-container">
<p class="pagi-rank">Showing <?php echo $total_records; ?> </p>
</div>

<?php }else: ?>
    <p class="no-result">No connected account found.</p>
<?php endif; ?>


<!-- connected accounts script start here -->

<script>
        $(document).on('click', '.ac-table-a, .pagination a', function(e) {
            e.preventDefault();
            var pageUrl = $(this).attr('href');
            $.ajax({
                url: pageUrl,
                type: 'Get',
                timeout:20000, // 20 seconds
                beforeSend: function(jqXHR) {
                    $('.secid-2').empty();
                    $('#account-content-placeholder').show(); 
                },
                success: function(html) {
                    $('#account-content-placeholder').hide(); 
                    $('.secid-2').html(html);
                },
                error: function(xhr, status, error) {
                  // Handle AJAX errors
                  window.show_error_msg('An error occurred while processing your request. Please refresh and try again.');
                  console.error('Error submitting form:', error);
                },
                dataType: 'html'
            });
        });

</script>
<!-- connected accounts script end here -->
