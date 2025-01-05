<style>

.notification-table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0 10px;
  font-family: 'Poppins', sans-serif;
  color: #fff;
  background-color: transparent;
}

.notification-table thead th {
  padding: 10px;
  text-align: left;
  font-weight: normal;
  color: rgba(255,255,255,0.5);
  font-size: 12px;
  position: relative;
}

.notification-table thead th > a{
  color: rgba(255,255,255,0.5);
}

.notification-table .sort-icon {
  float: right;
  color: #666;
  font-size: 12px;
  margin-left: 5px;
}

.notification-table thead th a:hover,
.notification-table thead th a:hover > .sort-icon{
    color: #fff;
}

.active-arrow{
  color: #fff;
}

.notification-table tbody tr {
  background-color: rgba(255,255,255,0.02);
  transition: background-color 0.3s;
  border-radius: 10px;
  overflow: hidden;
}

.notification-table tbody tr:hover {
  background-color: #2a2a2a;
}
.notification-table td, .notification-table td a{
  padding: 10px;
  font-size: 12px;
  color: rgba(255,255,255,0.7);
}
.notification-table tbody tr:hover td,
.notification-table tbody tr:hover td a{
  color: #fff  !important;
}
.notification-table td:first-child {
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
}

.notification-table td:last-child {
  border-top-right-radius: 10px;
  border-bottom-right-radius: 10px;
}

.notification-table td:first-child {
    width: 85px;
}

.notification-table td img {
    width: 42px;
    height: 42px;
    object-fit: cover;
    border-radius: 5px;
}

.notification-table .active {
  font-weight: 500;
}

.notification-table .active.pending {
  color: #FFAB5D;
}
.notification-table .active.active,
.notification-table .active.yes {
  color: #90EE90; 
}

.notification-table .active.inactive,
.notification-table .active.no  {
  color: #E45263;
}

.notification-table .arrow {
  font-size: 24px;
  color: #666;
}

.notification-table .arrow {
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
    list-style-answer: none;
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
    margin: 25px 0px 10px 0px;
    padding: 0px 0px 22px 0px;
    border-bottom: 1px solid #322b2b;
}

.notification-table-title {
    font-size: 18px;
    font-weight: 500;
    color: rgba(255, 255, 255, 0.8);
    margin: 0;
    font-family: 'Poppins', sans-serif;
}

.notification-table-description {
    font-size: 14px;
    color: rgba(255,255,255,0.7);
    margin: 5px 0 0 0;
}

.content-cell {
    max-width: 200px; 
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.title-cell {
    font-weight: 500;
    color: rgba(255,255,255,0.85) !important; 
    max-width: 250px; 
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.action-buttons {
    display: flex;
    justify-content: right;
}

.action-button {
    padding: 5px 10px;
    border-radius: 4px;
    color: #fff;
    text-decoration: none;
    font-size: 12px;
    transition: background-color 0.3s;
}

.edit-button svg {
   color: #4CAF50;
}

.edit-button:hover {
  background: #FF8303;
}

.edit-button:hover svg {
  color: #fff;
}

.delete-button svg{
  color: #f44336;
}

.delete-button:hover {
  background: #FF8303;
}

.delete-button:hover svg{
  color: #fff;
}
.last-col {
    float: right;
}

.status-cell {
    font-weight: 500;
    padding: 5px 10px;
    border-radius: 4px;
    text-align: center;
}

.status-published {
    background-color: rgba(144, 238, 144, 0.2);
    color: #90EE90;
}

.status-preview {
    background-color: rgba(255, 171, 93, 0.2);
    color: #FFAB5D;
}

.no-result-container {
    width: 100%;
    background-color: rgba(255, 255, 255, 0.08);
    border-radius: 10px;
    padding: 20px;
    box-sizing: border-box;
}

.no-result-message {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
    text-align: center;
    margin: 0;
    font-family: 'Poppins', sans-serif;
}

@media screen and (max-width: 768px) {
    .table-container {
        overflow-x: auto;
   }
   .pagination a, .pagination .current-page {
        padding: 0px 3px !important;
    }
}

</style>

<?php if (!empty($notification_data)): ?>
<div class="table-container">
<table class="notification-table">
  <thead>
    <tr>
      <th>
        <a class="notification-table-a" href="<?= esc(site_url(
            "Notification/ajax_notification_dashboard_data?sort_column=id&order=" .
            ($sort_column == "id" && $order == "asc" ? "desc" : "asc")
        )) ?>">
          NO.
          <span class="sort-icon">
            <?= ($sort_column == "id" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th>
      <th>
        <a class="notification-table-a" href="<?= esc(site_url(
            "Notification/ajax_notification_dashboard_data?sort_column=title&order=" .
            ($sort_column == "title" && $order == "asc" ? "desc" : "asc")
        )) ?>"> 
        TITLE
          <span class="sort-icon">
            <?= ($sort_column == "title" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th>
      <th>
        <a class="notification-table-a" href="<?= esc(site_url(
            "Notification/ajax_notification_dashboard_data?sort_column=content&order=" .
            ($sort_column == "content" && $order == "asc" ? "desc" : "asc")
        )) ?>">
         CONTENT
          <span class="sort-icon">
            <?= ($sort_column == "content" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th>
      <th>
        <a class="notification-table-a" href="<?= esc(site_url(
            "Notification/ajax_notification_dashboard_data?sort_column=types&order=" .
            ($sort_column == "types" && $order == "asc" ? "desc" : "asc")
        )) ?>">
         TYPES
          <span class="sort-icon">
            <?= ($sort_column == "types" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th>
      <th>
        <a class="notification-table-a" href="<?= esc(site_url(
            "Notification/ajax_notification_dashboard_data?sort_column=imgUrl&order=" .
            ($sort_column == "imgUrl" && $order == "asc" ? "desc" : "asc")
        )) ?>">
        IMGURL
          <span class="sort-icon">
            <?= ($sort_column == "imgUrl" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th>
      <th>
        <a class="notification-table-a" href="<?= esc(site_url(
            "Notification/ajax_notification_dashboard_data?sort_column=createdAt&order=" .
            ($sort_column == "createdAt" && $order == "asc" ? "desc" : "asc")
        )) ?>">
        CREATED_AT
          <span class="sort-icon">
            <?= ($sort_column == "createdAt" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th>

      <th>
        <a class="notification-table-a" href="<?= esc(site_url(
            "Notification/ajax_notification_dashboard_data?sort_column=updatedAt&order=" .
            ($sort_column == "updatedAt" && $order == "asc" ? "desc" : "asc")
        )) ?>">
        UPDATED_AT
          <span class="sort-icon">
            <?= ($sort_column == "updatedAt" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th>

      <th>
        <a class="notification-table-a" href="<?= esc(site_url(
            "Notification/ajax_notification_dashboard_data?sort_column=status&order=" .
            ($sort_column == "status" && $order == "asc" ? "desc" : "asc")
        )) ?>">
        STATUS
          <span class="sort-icon">
            <?= ($sort_column == "status" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th>


      <th>
        <span class="last-col" href="#">
        ACTION
        </span>
      </th>
      
    </tr>
  </thead>
  <tbody>
    <?php
      $index = 1;
      $start_record = ($current_page - 1) * $per_page + 1;
      $index = $start_record;
      $end_record = min($current_page * $per_page, $total_records);
      foreach ($notification_data as $i => $notification): ?>
        <tr>
            <td><?= $index ?></td>
            <td class="title-cell tb-title-<?= $notification['id'] ?>" title="<?= htmlspecialchars($notification['title']) ?>"><a href="#"><?= $notification['title'] ?></a></td>
            <td class="content-cell tb-content-<?= $notification['id'] ?>" title="<?= htmlspecialchars($notification['content']) ?>"><?= $notification['content'] ?></td>
            <td class="tb-types-<?= $notification['id'] ?>"><?= $notification['types'] ?></td>
            <td class="tb-imgUrl-<?= $notification['id'] ?>"><?= $notification['imgUrl'] ?></td>
            <td class="tb-createdAt-<?= $notification['id'] ?>"><?= $notification['createdAt'] ?></td>
            <td class="tb-updatedAt-<?= $notification['id'] ?>"><?= $notification['updatedAt'] ?></td>
            <td>
                <?php
                $status = strtolower($notification['status']);
                $statusClass = $status === 'published' ? 'status-published' : 'status-preview';
                ?>
                <span class="tb-status-<?= $notification['id'] ?> status-cell <?= $statusClass ?>"><?= ucfirst($status) ?></span>
            </td>
            <td>
                <div class="action-buttons">
                    <a href="#" class="action-button edit-button edit-notificaton-btn" data-id="<?= $notification['id'] ?>">
                        <i class="fas fa-edit"></i> 
                    </a>
                    <a href="#" class="action-button delete-button del-notification-btn" data-id="<?= $notification['id'] ?>">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </td>
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
            <a href="<?= esc(site_url('Notification/ajax_notification_dashboard_data?page='.$current_page - 1)) ?>" class="prev-link">&laquo; Prev</a>
        <?php endif; ?>

        <?php for ($i = max(1, $current_page - 2); $i <= min($total_pages, $current_page + 2); $i++): ?>
            <?php if ($i == $current_page): ?>
                <span class="current-page"><?= $i ?></span>
            <?php else: ?>
                <a href="<?= esc(site_url('Notification/ajax_notification_dashboard_data?page=' . $i)) ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($has_next): ?>
            <a href="<?= esc(site_url('Notification/ajax_notification_dashboard_data?page='.$current_page + 1)) ?>" class="next-link">Next &raquo;</a>
        <?php endif; ?>
    </div>
</div>

<?php } else { ?>

<div id="pagination-container">
<p class="pagi-rank">Showing <?php echo $total_records; ?> </p>
</div>

<?php }else: ?>
<div class="no-result-container">
   <p class="no-result-message">No notification found.</p>
</div>
<?php endif; ?>


<script>


window.delete_selected_notification = function (id) {

  var url = '<?= base_url('Notification/delete_notification') ?>';
  // Abort any existing request
  if (currentDeleteRequest && currentDeleteRequest.state() === 'pending') {
    currentDeleteRequest.abort();
  }
  // Store the new request
  currentDeleteRequest = $.ajax({
      url: url,
      type: 'post',
      data:{
          id:id,
          <?= csrf_token() ?>: '<?= csrf_hash() ?>' // CSRF token
      },
      timeout:20000, // 20 seconds
      beforeSend: function() {
          //Show loading indicator
          const message = "Processing...";
          window.show_sweet2alert_loader(message);
      },
      success: function(response) {
          if (response.csrf_hash) {
              $('input[name="csrf_ar"]').val(response.csrf_hash); // Update form with new token
          }
          if (response.success) {
              window.successMsg(response.message);
              $('.notification-details-drawer').removeClass('open');
          } else {
              window.errorMsg(response.message);
          }
      },
      error: function(xhr, status, error) {
          window.errorMsg('An error occurred while processing your request. Please refresh and try again.');
          console.error('Error submitting form:', error);
      },
      dataType: 'json'
  });

}


// Handle deleting notification from table view
$(document).on('click', '.del-notification-btn', function(event){
    event.preventDefault();

    var id = $(this).data("id");

    // Show confirmation dialog before deleting
    Swal.fire({
        title: '<h2>DELETE NOTIFICATION</h2>',
        html: '<p>Are you sure you want to delete this notification?</p>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, I want to delete',
        cancelButtonText: 'Cancel',
        customClass: {
            popup: 'custom-popup',
            title: 'custom-title',
            htmlContainer: 'custom-html-container',
            icon: 'custom-icon',
            confirmButton: 'custom-confirm-button',
            cancelButton: 'custom-cancel-button'
        },
        buttonsStyling: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.delete_selected_notification(id);
        }
    });
});


</script>