<style>

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
.ac-table td, .ac-table td a{
  padding: 10px;
  font-size: 12px;
  color: rgba(255,255,255,0.7);
}
.ac-table tbody tr:hover td,
.ac-table tbody tr:hover td a{
  color: #fff  !important;
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

.ac-table-title {
    font-size: 18px;
    font-weight: 500;
    color: rgba(255, 255, 255, 0.8);
    margin: 0;
    font-family: 'Poppins', sans-serif;
}

.ac-table-description {
    font-size: 14px;
    color: rgba(255,255,255,0.7);
    margin: 5px 0 0 0;
}

.answer-cell {
    max-width: 200px; 
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.question-cell {
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

<!-- <div class="acccount-header ca-header">
    <h3 class="ac-table-title">FAQ Question</h3>
    <p class="ac-table-description">This table displays information about FAQ questions, including their ID, question, answer, and priority.</p>
</div> -->

<?php if (!empty($faq_question_data)): ?>
<div class="table-container">
<table class="ac-table">
  <thead>
    <tr>
      <th>
        <a class="ac-table-a" href="<?= esc(site_url(
            "Faqs/ajax_faq_question_dashboard_data?sort_column=id&order=" .
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
            "Faqs/ajax_faq_question_dashboard_data?sort_column=question&order=" .
            ($sort_column == "question" && $order == "asc" ? "desc" : "asc")
        )) ?>"> 
        QUESTION
          <span class="sort-icon">
            <?= ($sort_column == "question" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th>
      <th>
        <a class="ac-table-a" href="<?= esc(site_url(
            "Faqs/ajax_faq_question_dashboard_data?sort_column=answer&order=" .
            ($sort_column == "answer" && $order == "asc" ? "desc" : "asc")
        )) ?>">
         ANSWER
          <span class="sort-icon">
            <?= ($sort_column == "answer" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th>
      <th>
        <a class="ac-table-a" href="<?= esc(site_url(
            "Faqs/ajax_faq_question_dashboard_data?sort_column=prio&order=" .
            ($sort_column == "prio" && $order == "asc" ? "desc" : "asc")
        )) ?>">
         Prio
          <span class="sort-icon">
            <?= ($sort_column == "prio" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th>
      <th>
        <a class="ac-table-a" href="<?= esc(site_url(
            "Faqs/ajax_faq_question_dashboard_data?sort_column=updated_by&order=" .
            ($sort_column == "updated_by" && $order == "asc" ? "desc" : "asc")
        )) ?>">
        UPDATED BY
          <span class="sort-icon">
            <?= ($sort_column == "updated_by" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th>
      <th>
        <a class="ac-table-a" href="<?= esc(site_url(
            "Faqs/ajax_faq_question_dashboard_data?sort_column=updated&order=" .
            ($sort_column == "updated" && $order == "asc" ? "desc" : "asc")
        )) ?>">
        LAST UPDATED
          <span class="sort-icon">
            <?= ($sort_column == "updated" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
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
      foreach ($faq_question_data as $i => $question): ?>
        <tr>
            <td><?= $index ?></td>
            <td class="tb-faq_section_id-<?= $index ?>" style="display:none;"><?= $question['faq_section_id'] ?></td>
            <td class="question-cell tb-question-<?= $index ?>" title="<?= htmlspecialchars($question['question']) ?>"><a href="#"><?= $question['question'] ?></a></td>
            <td class="answer-cell tb-answer-<?= $index ?>" title="<?= htmlspecialchars($question['answer']) ?>"><?= $question['answer'] ?></td>
            <td class="tb-prio-<?= $index ?>"><?= $question['prio'] ?></td>
            <td class="tb-updated_by-<?= $index ?>"><?= $question['updated_by'] ?></td>
            <td class="tb-updated-<?= $index ?>"><?= $question['updated'] ?></td>
            <td>
                <div class="action-buttons">
                    <a href="#" class="action-button edit-button edit-faq-btn" data-tbl-index="<?= $index ?>" data-id="<?= $question['id'] ?>">
                        <i class="fas fa-edit"></i> 
                    </a>
                    <a href="#" class="action-button delete-button del-faq-btn drawer-faq-delete-btn2" data-faq-id="<?= $question['id'] ?>">
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
            <a href="<?= esc(site_url('Faqs/ajax_faq_question_dashboard_data?page='.$current_page - 1)) ?>" class="prev-link">&laquo; Prev</a>
        <?php endif; ?>

        <?php for ($i = max(1, $current_page - 2); $i <= min($total_pages, $current_page + 2); $i++): ?>
            <?php if ($i == $current_page): ?>
                <span class="current-page"><?= $i ?></span>
            <?php else: ?>
                <a href="<?= esc(site_url('Faqs/ajax_faq_question_dashboard_data?page=' . $i)) ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($has_next): ?>
            <a href="<?= esc(site_url('Faqs/ajax_faq_question_dashboard_data?page='.$current_page + 1)) ?>" class="next-link">Next &raquo;</a>
        <?php endif; ?>
    </div>
</div>

<?php } else { ?>

<div id="pagination-container">
<p class="pagi-rank">Showing <?php echo $total_records; ?> </p>
</div>

<?php }else: ?>
  <div class="no-result-container">
    <p class="no-result-message">No question found.</p>
  </div>  
<?php endif; ?>



<script>


// Common delete confirmation dialog config
deleteDialogConfig = {
  title: '<h2>DELETE QUESTION</h2>',
  html: '<p>Are you sure you want to delete this question?</p>',
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
};

// Handle delete from both drawer and table row
$(document).on('click', '.del-faq-btn', function(event) {
    event.preventDefault();

    const id = $(this).data('faq-id'); 
    // Validate ID
    if (!id) {
        console.error('No FAQ ID found');
        return;
    }

    Swal.fire(deleteDialogConfig).then((result) => {
        if (result.isConfirmed) {
            window.delete_selected_faq_data(id);
        }
    });
});

window.delete_selected_faq_data = function(id) {

  var url = '<?= base_url('Faqs/delete_faq_question') ?>';
  var sec='faq-question';
  // Get CSRF token values

  // Abort any existing request
  if (currentDelRequest && currentDelRequest.state() === 'pending') {
    currentDelRequest.abort();
  }
  // Store the new request
  currentDelRequest = $.ajax({
      url: url,
      type: 'post',
      data:{
          id:id,
          <?= csrf_token() ?>: '<?= csrf_hash() ?>' // CSRF token
      },
      timeout:20000, // 20 seconds
      beforeSend: function (jqXHR) {
        const message = "Processing...";
        // Show global loading indicator while request is processing
        window.show_sweet2alert_loader(message);
      },
      success: function(response){
          if (response.csrf_hash) {
                $('input[name="csrf_ar"]').val(response.csrf_hash); // Update form with new token
          }
          if (response.success) {
              msg = response.message;
              window.successMsg(msg,sec);
          } else {
              msg = response.message;
              window.errorMsg(msg);
          }
      },
      error: function (error) {
          window.errorMsg("Please refresh, an error occurred while deleting the question.");
          console.log('Error:', error);
      },
      dataType: 'json'
  });

}

// Handle delete from both drawer and table row
$(document).on('click', '.drawer-faq-delete-btn', function(event) {
    event.preventDefault();
    
    // Get ID from either drawer or table row button
    const id = $('.faq-details-drawer').attr('data-faq-id');

    // Validate ID
    if (!id) {
        console.error('No FAQ ID found');
        return;
    }

    Swal.fire(deleteDialogConfig).then((result) => {
        if (result.isConfirmed) {
            window.delete_selected_faq_data(id);
        }
    });
});


</script>