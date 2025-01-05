<style>

.release-table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0 10px;
  font-family: 'Poppins', sans-serif;
  color: #fff;
  background-color: transparent;
}

.release-table thead th {
  padding: 10px;
  text-align: left;
  font-weight: normal;
  color: rgba(255,255,255,0.5);
  font-size: 12px;
  position: relative;
}

.release-table thead th > a{
  color: rgba(255,255,255,0.5);
}

.release-table .sort-icon {
  float: right;
  color: #666;
  font-size: 12px;
  margin-left: 5px;
}

.release-table thead th a:hover,
.release-table thead th a:hover > .sort-icon{
    color: #fff;
}

.active-arrow{
  color: #fff;
}

.release-table tbody tr {
  background-color: rgba(255,255,255,0.08);
  transition: background-color 0.3s;
  border-radius: 10px;
  overflow: hidden;
  cursor: pointer;
}

.release-table tbody tr:hover {
  background-color: #2a2a2a;
}

.release-table td {
  padding: 10px;
  font-size: 12px;
  color: rgba(255,255,255,0.7);
}

.release-table td a{
  color: rgba(255,255,255,0.7);
}

.release-table td:first-child {
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
}

.release-table td:last-child {
  border-top-right-radius: 10px;
  border-bottom-right-radius: 10px;
}

.release-table td:first-child {
    width: 85px;
}
.release-table td:nth-child(2) {
    width: 85px;
}

.release-table td img {
    width: 42px;
    height: 42px;
    object-fit: cover;
    border-radius: 5px;
}

.release-table .status {
  font-weight: 500;
}

.release-table .status.pending {
  color: #FFAB5D;
}

.release-table .status.active {
  color: #03D973;
}

.release-table .status.inactive {
  color: #E45263;
}

.release-table .arrow {
  font-size: 24px;
  color: #666;
}

.release-table .arrow:hover {
  color: #ff8303;
}

.release-table tbody tr:hover a{
  color: #fff;
}
.release-table tbody tr:hover .arrow{
  color: #ff8303;
}

#pagination-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 20px;
  font-family: 'Poppins', sans-serif;
  color: rgba(255,255,255,0.7);
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


<?php if (!empty($artist_release)): ?>
<div class="table-container">
<table class="release-table">
  <thead>
    <tr>
      <th>
        <a class="release-tbl-a" href="<?= esc(site_url(
            "MusicRelease/artist_release_table_data?sort_column=release_id&order=" .
            ($sort_column == "release_id" && $order == "asc" ? "desc" : "asc")
        )) ?>">
          NO.
          <span class="sort-icon">
            <?= ($sort_column == "release_id" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th>
      <th>COVER</th>
      <th>
        <a class="release-tbl-a" href="<?= esc(site_url(
            "MusicRelease/artist_release_table_data?sort_column=release_title&order=" .
            ($sort_column == "release_title" && $order == "asc" ? "desc" : "asc")
        )) ?>">
         NAME
          <span class="sort-icon">
            <?= ($sort_column == "release_title" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th>
      <th>
        <a class="release-tbl-a" href="<?= esc(site_url(
            "MusicRelease/artist_release_table_data?sort_column=genre&order=" .
            ($sort_column == "genre" && $order == "asc" ? "desc" : "asc")
        )) ?>">
         GENRE
          <span class="sort-icon">
            <?= ($sort_column == "genre" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th>
      <th>
        <a class="release-tbl-a" href="<?= esc(site_url(
            "MusicRelease/artist_release_table_data?sort_column=release_date&order=" .
            ($sort_column == "release_date" && $order == "asc" ? "desc" : "asc")
        )) ?>">
         RELEASE DATE
          <span class="sort-icon">
            <?= ($sort_column == "release_date" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th>
      <!-- <th>
        <a class="release-tbl-a" href="<?= esc(site_url(
            "MusicRelease/artist_release_table_data?sort_column=status&order=" .
            ($sort_column == "status" && $order == "asc" ? "desc" : "asc")
        )) ?>">
        STATUS
          <span class="sort-icon">
            <?= ($sort_column == "status" ? ($order == "asc" ? "<span class='active-arrow'>↓</span>↑" : "↓<span class='active-arrow'>↑</span>") : "↑↓") ?>
          </span>
        </a>
      </th> -->
    </tr>
  </thead>
  <tbody>
    <?php
      $index = 1;
      $start_record = ($current_page - 1) * $per_page + 1;
      $index = $start_record;
      $end_record = min($current_page * $per_page, $total_records);
      foreach ($artist_release as $i => $release): ?>
          <tr onclick="window.location='<?= base_url('release_detail/'.$release['release_id']) ?>'">
            <td><?= $index ?></td>
            <td><img src="<?= $release['image_link'] ?>" alt="<?= $release['release_title'] ?>"></td>
            <td><?= $release['release_title'] ?></td>
            <td><?= $release['genre'] ?></td>
            <td><?= date('d M, Y', strtotime($release['release_date'])) ?></td>
            <!-- <td class="status <?= strtolower($release['status']) ?>"><?= $release['status'] ?></td> -->
            <td><span class="arrow">›</span></td>
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
            <a href="<?= esc(site_url('MusicRelease/artist_release_table_data?page='.$current_page - 1)) ?>" class="prev-link">&laquo; Prev</a>
        <?php endif; ?>

        <?php for ($i = max(1, $current_page - 2); $i <= min($total_pages, $current_page + 2); $i++): ?>
            <?php if ($i == $current_page): ?>
                <span class="current-page"><?= $i ?></span>
            <?php else: ?>
                <a href="<?= esc(site_url('MusicRelease/artist_release_table_data?page=' . $i)) ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($has_next): ?>
            <a href="<?= esc(site_url('MusicRelease/artist_release_table_data?page='.$current_page + 1)) ?>" class="next-link">Next &raquo;</a>
        <?php endif; ?>
    </div>
</div>

<?php } else { ?>

<div id="pagination-container">
<p class="pagi-rank">Showing <?php echo $total_records; ?> </p>
</div>

<?php }else: ?>
<div class="no-result-container">
   <p class="no-result-message">No releases found.</p>
</div>
<?php endif; ?>

