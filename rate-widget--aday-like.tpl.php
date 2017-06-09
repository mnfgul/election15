<?php
/**
 * @file
 * Rate widget theme
 *
 * This is the default template for rate widgets. See section 3 of the README
 * file for information on theming widgets.
 *
 * Available variables:
 * - $links: Array with vote links
 *     array(
 *       array(
 *         'text' => 'Button label',
 *         'href' => 'Link href',
 *         'value' => 20,
 *         'votes' => 6,
 *       ),
 *     )
 * - $results: Array with voting results
 *     array(
 *       'rating' => 12, // Average rating
 *       'options' => array( // Votes per option. Only available when value_type == 'options'
 *         1 => 234,
 *         2 => 34,
 *       ),
 *       'count' => 23, // Number of votes
 *       'up' => 2, // Number of up votes. Only available for thumbs up / down.
 *       'down' => 3, // Number of down votes. Only available for thumbs up / down.
 *       'up_percent' => 40, // Percentage of up votes. Only available for thumbs up / down.
 *       'down_percent' => 60, // Percentage of down votes. Only available for thumbs up / down.
 *       'user_vote' => 80, // Value for user vote. Only available when user has voted.
 *     )
 * - $mode: Display mode.
 * - $just_voted: Indicator whether the user has just voted (boolean).
 * - $content_type: "node" or "comment".
 * - $content_id: Node or comment id.
 * - $buttons: Array with themed buttons (built in preprocess function).
 * - $info: String with user readable information (built in preprocess function).
 * 
 * 
 *  print theme('rate_button', array(
      'text' => $links[0]['text'],
      'href' => $links[0]['href'],
      'class' => "extra-class")
    );
 * 
 * $results['rating'];
 * $links[0]['votes'];
 * $results['count'];
 * $just_voted
 */
 
$path=drupal_get_path_alias('node/'.$content_id);

?>
<?php if(empty($results['user_vote'])){?>
	<div class="tiles blue p-all-10 rounded-t-2 rounded-b-2 z-depth-1"><a href="<?php print $links[0]['href'];?>" class="btn btn-large btn-success btn-block x-large-text rate-button rate-btn" title="Adaya destek oyunuzu vermek için tıklayınız" data-toggle="tooltip" data-placement="top">
		<i class="fa fa-thumbs-up xx-large-text"></i>&nbsp;&nbsp;&nbsp; Adayı Destekliyorum</a>
	</div>
	<div class="small-text muted rate-info text-center p-all-5"></div>
<?php }else{?>
	<a href="#" class="btn btn-large btn-default btn-block"><i class="fa fa-check x-large-text"></i>&nbsp;&nbsp; Adayı Desteklediniz</a>
	<p class="text-center x-small-text muted">Oyunuzu geri çekmek için <a href="<?php print $links[0]['href'];?>" title="Adaya destegini geri cek">tıklayın</a></p>
<?php }?>

<!-- Modal -->
<div class="modal fade" id="afterVoteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Kapat"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-green" id="myModalLabel">Teşekkür!</h4>
      </div>
      <div class="modal-bod text-center p-all-20">
        <p>Oy kullandığınız için teşekkür ederiz.</p> 
        <p>Sizde oy kullandığınızı paylaşarak daha çok kişinin oy kullanmasını sağlayabilirsiniz.</p>
        <p>
        	<div class="row p-t-20 p-b-20">
        		<div class="col-md-5 col-md-offset-1 col-sm-12 col-xs-12">
        			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php print $path;?>" target="_blank" title="Facebook ile Paylaşmak icin tiklayiniz" class="btn btn-block btn-info bnt-large"> <span class="pull-left"><i class="fa fa-facebook"></i></span> <span class="bold">Facebook ile Paylaş</span></a>
        		</div>
        		<div class="col-md-5 col-sm-12 col-xs-12">
        			<a href="https://twitter.com/home?status=2015%20se%C3%A7im%20aday%C4%B1ma%0A@secim_in%20ile%20destek%20verdim.%20%0ASende%20aday%C4%B1na%20destek%20ver%0A--%3E%20www.secim.in%20%3C--" target="_blank" title="Twitter ile Paylaş icin tiklayiniz" class="btn btn-block btn-success bnt-large"> <span class="pull-left"><i class="fa fa-twitter"></i></span> <span class="bold">Twitter ile Paylaş</span></a>
        		</div>
        	</div>

        </p>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>



