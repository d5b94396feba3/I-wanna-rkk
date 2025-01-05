<div class="faq-content">
<?php if (!empty($questions_data)): ?>
    <div class="row">
    <?php foreach ($questions_data as $index => $question): ?>
        <div class="col-md-4 col-sm-12">
            <div class="faq-item">
                <div class="faq-question">
                    <span><?= esc($question['question']) ?></span>
                </div>
                <div class="faq-answer">
                    <?php if (strlen($question['answer']) > 200): ?>
                        <div class="show-less-content active">
                            <p class="mb-3"><?= esc(substr($question['answer'], 0, 200)) ?>...</p>
                            <a href="#" class="read-more-btn">READ MORE</a>
                        </div>
                        <div class="show-more-content">
                            <p class="mb-3"><?= esc($question['answer']) ?></p>
                            <a href="#" class="read-less-btn">READ LESS</a>
                        </div>
                    <?php else: ?>
                        <div class="show-less-content active">
                            <p class="mb-3"><?= esc($question['answer']) ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if (($index + 1) % 3 == 0 || $index == count($questions_data) - 1): ?>
            </div>
            <?php if ($index < count($questions_data) - 1): ?>
                <div class="row">
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>

<?php else: ?>
   
    <div class="row">
    <div class="col-md-12 col-sm-12">
            <div class="faq-item-noresult">
                <div class="faq-question">
                    <span>No Questions Available</span>
                </div>
                <div class="faq-answer">
                        <div class="show-less-content active">
                            <p class="mb-3">There are no questions available for this section.</p>
                        </div>
                </div>
            </div>
    </div>
<?php endif; ?>

<script>
$(document).ready(function() {
    $('.read-more-btn, .read-less-btn').click(function(e) {
        e.preventDefault();
        var $faqItem = $(this).closest('.faq-item');
        var $showLessContent = $faqItem.find('.show-less-content');
        var $showMoreContent = $faqItem.find('.show-more-content');

        // Toggle content visibility
        $showMoreContent.slideToggle();
        $showLessContent.slideToggle();

        // Toggle active class on faq-item and adjust height
        $faqItem.css('height', $(this).hasClass('read-more-btn') ? 'auto' : '300px')
                .toggleClass('active');
    });
});
</script>