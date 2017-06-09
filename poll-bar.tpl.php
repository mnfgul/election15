<?php

/**
 * @file
 * Default theme implementation to display the bar for a single choice in a
 * poll.
 *
 * Variables available:
 * - $title: The title of the poll.
 * - $votes: The number of votes for this choice
 * - $total_votes: The number of votes for this choice
 * - $percentage: The percentage of votes for this choice.
 * - $vote: The choice number of the current user's vote.
 * - $voted: Set to TRUE if the user voted for this choice.
 *
 * @see template_preprocess_poll_bar()
 */
?>
<div class="text"><?php print $title; ?></div>
<div class="row">
	<div class="col-md-9 col-sm-9 col-xs-9">
		<div class="bar progress" style="width: 100%;">
		  <div data-percentage="0%" style="width: <?php print $percentage; ?>%;" class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
		</div>
	</div>
	<div class="col-md-3 col-sm-3 col-xs-3">
		<div class="percent" style="text-align: left;">
  <?php print $percentage; ?>% (<?php print format_plural($votes, '1 Oy', '@count Oy'); ?>)
</div>
	</div>
</div> 



