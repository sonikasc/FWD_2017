<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<section id="huge_it_portfolio_content_<?php echo $portfolioID; ?>" style="clear: both" class="portfolio-gallery-content <?php if ( $portfolioShowSorting == 'on' ) {
	echo 'sortingActive ';
}
if ( $portfolioShowFiltering == 'on' ) {
	echo 'filteringActive';
} ?>"
         data-portfolio-id="<?php echo esc_attr($portfolioID); ?>"
         data-image-behaviour="<?php echo esc_attr($portfolio_gallery_get_options['portfolio_gallery_port_natural_size_toggle']); ?>">
	<div id="huge-it-container-loading-overlay_<?php echo $portfolioID; ?>"></div>
	<?php if ( ( $sortingFloatToggle == 'left' && $filteringFloatToggle == 'left' ) || ( $sortingFloatToggle == 'right' && $filteringFloatToggle == 'right' ) ) { ?>
	<div id="huge_it_portfolio_options_and_filters_<?php echo $portfolioID; ?>">
		<?php } ?>
		<?php if ( $portfolioShowSorting == "on" ) { ?>
			<div id="huge_it_portfolio_options_<?php echo $portfolioID; ?>" 
			     data-sorting-position="<?php echo esc_attr($portfolio_gallery_get_options["portfolio_gallery_ht_view0_sorting_float"]); ?>">
				<ul id="sort-by" class="option-set clearfix" data-option-key="sortBy">
                                        <?php if($portfolio_gallery_get_options["portfolio_gallery_ht_view0_sorting_name_by_default"] != ''):?>
					<li><a href="#sortBy=original-order" data-option-value="original-order" class="selected"
					       data><?php echo $portfolio_gallery_get_options["portfolio_gallery_ht_view0_sorting_name_by_default"]; ?></a></li>
                                        <?php endif;?>
                                        <?php if($portfolio_gallery_get_options["portfolio_gallery_ht_view0_sorting_name_by_id"] != ''):?>
					<li><a href="#sortBy=id"
					       data-option-value="id"><?php echo $portfolio_gallery_get_options["portfolio_gallery_ht_view0_sorting_name_by_id"]; ?></a>
					</li>
                                        <?php endif;?>
                                        <?php if($portfolio_gallery_get_options["portfolio_gallery_ht_view0_sorting_name_by_name"] != ''):?>
					<li><a href="#sortBy=symbol"
					       data-option-value="symbol"><?php echo $portfolio_gallery_get_options["portfolio_gallery_ht_view0_sorting_name_by_name"]; ?></a>
					</li>
                                        <?php endif;?>
                                        <?php if($portfolio_gallery_get_options["portfolio_gallery_ht_view0_sorting_name_by_random"] != ''):?>
					<li id="shuffle"><a
							href='#shuffle'><?php echo $portfolio_gallery_get_options["portfolio_gallery_ht_view0_sorting_name_by_random"]; ?></a>
					</li>
                                        <?php endif;?>
				</ul>
				<ul id="port-sort-direction" class="option-set clearfix" data-option-key="sortAscending">
                                        <?php if($portfolio_gallery_get_options["portfolio_gallery_ht_view0_sorting_name_by_asc"] != ''):?>
					<li><a href="#sortAscending=true" data-option-value="true"
					       class="selected"><?php echo $portfolio_gallery_get_options["portfolio_gallery_ht_view0_sorting_name_by_asc"]; ?></a>
					</li>
                                        <?php endif;?>
                                        <?php if($portfolio_gallery_get_options["portfolio_gallery_ht_view0_sorting_name_by_desc"] != ''):?>
					<li><a href="#sortAscending=false"
					       data-option-value="false"><?php echo $portfolio_gallery_get_options["portfolio_gallery_ht_view0_sorting_name_by_desc"]; ?></a>
					</li>
                                        <?php endif;?>
				</ul>
			</div>
		<?php }
		if ( $portfolioShowFiltering == "on" ) { ?>
			<div id="huge_it_portfolio_filters_<?php echo $portfolioID; ?>"
			     data-filtering-position="<?php echo esc_attr($portfolio_gallery_get_options["portfolio_gallery_ht_view0_filtering_float"]); ?>">
				<ul>
					<li rel="*"><a><?php echo $portfolio_gallery_get_options["portfolio_gallery_ht_view0_cat_all"]; ?></a></li>
					<?php
					$portfolioCats = explode( ",", $portfolioCats );
					foreach ( $portfolioCats as $portfolioCatsValue ) {
						if ( ! empty( $portfolioCatsValue ) ) {
							?>
							<li rel=".<?php echo str_replace( " ", "_", $portfolioCatsValue ); ?>">
								<a><?php echo str_replace( "_", " ", $portfolioCatsValue ); ?></a></li>
							<?php
						}
					}
					?>
				</ul>
			</div>
		<?php } ?>
		<?php if ( ( $sortingFloatToggle == 'left' && $filteringFloatToggle == 'left' ) || ( $sortingFloatToggle == 'right' && $filteringFloatToggle == 'right' ) ) { ?>
	</div>
<?php } ?>
	<div id="huge_it_portfolio_container_<?php echo $portfolioID; ?>"
	     data-show-loading="<?php echo esc_attr($portfolioShowLoading); ?>"
		 data-show-center="<?php echo esc_attr($portfolioposition); ?>"
	     class="huge_it_portfolio_container super-list variable-sizes clearfix view-<?php echo $view_slug;?>" <?php if ( $portfolio_gallery_get_options["portfolio_gallery_ht_view0_sorting_float"] == "top" && $portfolio_gallery_get_options["portfolio_gallery_ht_view0_filtering_float"] == "top" ) {
		echo "style='clear: both;'";
	} ?>>
		<?php
		$group_key1 = 0;
		foreach ( $images as $key => $row ) {
			$group_key1 ++;
			$group_key    = (string) $group_key1;
			$portfolioID1 = (string) $portfolioID;
			$group_key    = $group_key . "-" . $portfolioID;
			$link         = $row->sl_url;
			$descnohtml   = strip_tags( $row->description );
			$result       = substr( $descnohtml, 0, 50 );
			$catForFilter = explode( ",", $row->category );
			$imgurl       = explode( ";", $row->image_url );
			$lighboxable  = ( count( $imgurl ) == 2 ) ? "lighboxable" : "dropdownable";
			?>
			<div
				class="portelement portelement_<?php echo $portfolioID; ?> colorbox_grouping <?php foreach ( $catForFilter as $catForFilterValue ) {
					echo str_replace( " ", "_", $catForFilterValue ) . " ";
				} ?>" data-symbol="<?php echo esc_attr($row->name); ?>" data-category="alkaline-earth">
				<div class="default-block_<?php echo $portfolioID; ?> <?php echo $lighboxable; ?>" style="<?php if( $row->name == '' && count($imgurl) < 3 && $imgurl[1] =='' && $row->description == '' && $link == '') echo "height:".$portfolio_gallery_get_options['portfolio_gallery_ht_view0_block_height']."px !important;";?>">
					<div class="image-block image-block_<?php echo $portfolioID; ?>  add-H-relative">
						<?php $imgurl = explode( ";", $row->image_url ); ?>
						<?php
						if ( $row->image_url != ';' ) {
							switch ( portfolio_gallery_youtube_or_vimeo_portfolio( $imgurl[0] ) ) {
								case 'image': ?>
									<a href="<?php echo esc_url( $imgurl[0] ); ?>"
									   class="portfolio-group<?php if ( $lighboxable == "lighboxable" ) {
										   echo $group_key;
									   } ?>" title="<?php echo $row->name; ?>" data-groupID="<?php echo esc_attr($group_key);?>">
										<img alt="<?php echo esc_attr( $row->name ); ?>"
										     id="wd-cl-img<?php echo $key; ?>"
										     src="<?php if($portfolio_gallery_get_options['portfolio_gallery_port_natural_size_toggle'] == 'resize') echo esc_url( portfolio_gallery_get_image_by_sizes_and_src( $imgurl[0], array( $portfolio_gallery_get_options['portfolio_gallery_ht_view0_block_width'], $portfolio_gallery_get_options['portfolio_gallery_ht_view0_block_height']), false ) );
                                                                                     else echo esc_url( $imgurl[0] );?>" />
									</a>
									<?php
									break;
								case 'youtube':
									$videourl = portfolio_gallery_get_video_id_from_url( $imgurl[0] ); ?>
									<a href="https://www.youtube.com/embed/<?php echo $videourl[0]; ?>"
									   class="huge_it_portfolio_item pyoutube portfolio-group<?php if ( $lighboxable == "lighboxable" ) {
										   echo $group_key;
									   } ?> " title="<?php echo $row->name; ?>" data-groupID="<?php echo esc_attr($group_key);?>">
										<img alt="<?php echo esc_attr( $row->name ); ?>"
										     id="wd-cl-img<?php echo $key; ?>"
										     src="//img.youtube.com/vi/<?php echo $videourl[0]; ?>/mqdefault.jpg"/>
										<div class="play-icon <?php echo $videourl[1]; ?>-icon"></div>
									</a>
									<?php
									break;
								case 'vimeo':
									$videourl = portfolio_gallery_get_video_id_from_url( $imgurl[0] );
									$hash = unserialize( wp_remote_fopen( "http://vimeo.com/api/v2/video/" . $videourl[0] . ".php" ) );
									$imgsrc = $hash[0]['thumbnail_large'];
									?>
									<a href="http://player.vimeo.com/video/<?php echo $videourl[0]; ?>"
									   class="huge_it_portfolio_item pvimeo portfolio-group<?php if ( $lighboxable == "lighboxable" ) {
										   echo $group_key;
									   } ?> " title="<?php echo esc_attr( $row->name ); ?>" data-groupID="<?php echo esc_attr($group_key);?>">
										<img alt="<?php echo esc_attr( $row->name ); ?>"
										     src="<?php echo esc_attr( $imgsrc ); ?>"/>
										<div class="play-icon <?php echo $videourl[1]; ?>-icon"></div>
									</a>
									<?php break;

							}
						} else { ?>
							<img alt="<?php echo esc_attr( $row->name ); ?>"
							     id="wd-cl-img<?php echo $key; ?>" src="images/noimage.jpg"/>
							<?php
						} ?>
					</div>
					<div class="title-block title-block_<?php echo $portfolioID; ?>">
						<h3 title="<?php echo esc_attr( $row->name ); ?>"
						    class="title"><?php echo $row->name; ?></h3>
						<div class="open-close-button"></div>
					</div>
				</div>

				<div class="wd-portfolio-panel wd-portfolio-panel_<?php echo $portfolioID; ?>" id="panel<?php echo $key; ?>">
					<?php 
                                        $imgurl = explode( ";", $row->image_url );
					if ( $portfolio_gallery_get_options['portfolio_gallery_ht_view0_show_thumbs'] == 'on' && $portfolio_gallery_get_options['portfolio_gallery_ht_view0_thumbs_position'] == "before" && count( $imgurl ) != 2 ) {
						?>
						<div>
							<ul class="thumbs-list_<?php echo $portfolioID; ?>">
								<?php
								array_pop( $imgurl );
								foreach ( $imgurl as $key1 => $img ) {
									?>
									<li>
										<?php
										switch ( portfolio_gallery_youtube_or_vimeo_portfolio( $img ) ) {
											case 'image':
												?>
												<a href="<?php echo $img; ?>"
												   class=" portfolio-group<?php echo $group_key; ?> " data-groupID="<?php echo esc_attr($group_key);?>"><img
														src="<?php echo esc_url( portfolio_gallery_get_image_by_sizes_and_src( $img, $portfolio_gallery_get_options['portfolio_gallery_ht_view0_thumbs_width'], true ) ); ?>"></a>
												<?php
												break;
											case 'youtube':
												$videourl = portfolio_gallery_get_video_id_from_url( $img ); ?>
												<a href="https://www.youtube.com/embed/<?php echo $videourl[0]; ?>"
												   class="huge_it_portfolio_item pyoutube portfolio-group<?php echo $group_key; ?> "
												   style="position:relative" data-groupID="<?php echo esc_attr($group_key);?>">
													<img
														src="//img.youtube.com/vi/<?php echo $videourl[0]; ?>/mqdefault.jpg">
													<div class="play-icon youtube-icon"></div>
												</a>

												<?php
												break;
											case 'vimeo':
												$videourl = portfolio_gallery_get_video_id_from_url( $img );
												$hash = unserialize( wp_remote_fopen( "http://vimeo.com/api/v2/video/" . $videourl[0] . ".php" ) );
												$imgsrc = $hash[0]['thumbnail_large']; ?>
												<a class="huge_it_portfolio_item pvimeo portfolio-group<?php echo $group_key; ?> "
												   href="http://player.vimeo.com/video/<?php echo $videourl[0]; ?>"
												   title="<?php echo $row->name; ?>"
												   style="position:relative" data-groupID="<?php echo esc_attr($group_key);?>">
													<img src="<?php echo $imgsrc; ?>"
													     alt="<?php echo $row->name; ?>"/>
													<div class="play-icon vimeo-icon"></div>
												</a>
												<?php
												break;
										} ?>
									</li>
									<?php
								}
								?>
							</ul>
						</div>
					<?php }
					if ( $portfolio_gallery_get_options['portfolio_gallery_ht_view0_show_description'] == 'on' && $row->description != '') {
						?>
						<div class="description-block_<?php echo $portfolioID; ?>">
							<p><?php echo $row->description; ?></p>
						</div>
					<?php }
					$imgurl = explode( ";", $row->image_url );
					//  array_shift($imgurl);
					if ( $portfolio_gallery_get_options['portfolio_gallery_ht_view0_show_thumbs'] == 'on' && $portfolio_gallery_get_options['portfolio_gallery_ht_view0_thumbs_position'] == "after" && count( $imgurl ) != 2 ) {
						?>
						<div>
							<ul class="thumbs-list_<?php echo $portfolioID; ?>">
								<?php

								array_pop( $imgurl );
								foreach ( $imgurl as $key1 => $img ) {
									?>
									<li>
										<?php
										switch ( portfolio_gallery_youtube_or_vimeo_portfolio( $img ) ) {
											case 'image':
												?>
												<a href="<?php echo esc_url( $img ); ?>"
												   class=" portfolio-group<?php echo $group_key; ?> " ><img
														src="<?php echo esc_url( portfolio_gallery_get_image_by_sizes_and_src( $img, $portfolio_gallery_get_options['portfolio_gallery_ht_view0_thumbs_width'], true ) ); ?>"></a>
												<?php
												break;
											case 'youtube':
												$videourl = portfolio_gallery_get_video_id_from_url( $img ); ?>
												<a href="https://www.youtube.com/embed/<?php echo $videourl[0]; ?>"
												   class="huge_it_portfolio_item pyoutube portfolio-group<?php echo $group_key; ?> "
												   style="position:relative">
													<img
														src="//img.youtube.com/vi/<?php echo $videourl[0]; ?>/mqdefault.jpg">
													<div class="play-icon youtube-icon"></div>
												</a>

												<?php
												break;
											case 'vimeo':
												$videourl = portfolio_gallery_get_video_id_from_url( $img );
												$hash = unserialize( wp_remote_fopen( "http://vimeo.com/api/v2/video/" . $videourl[0] . ".php" ) );
												$imgsrc = $hash[0]['thumbnail_large']; ?>
												<a class="huge_it_portfolio_item pvimeo portfolio-group<?php echo $group_key; ?> "
												   href="http://player.vimeo.com/video/<?php echo $videourl[0]; ?>"
												   title="<?php echo esc_attr( $row->name ); ?>"
												   style="position:relative">
													<img src="<?php echo esc_attr( $imgsrc ); ?>"
													     alt="<?php echo esc_attr( $row->name ); ?>"/>
													<div class="play-icon vimeo-icon"></div>
												</a>
												<?php
												break;
										} ?>
									</li>
									<?php
								}
								?>
							</ul>
						</div>
					<?php }
					if ( $portfolio_gallery_get_options['portfolio_gallery_ht_view0_show_linkbutton'] == 'on' && $link != '' ) {
						?>
						<div class="button-block">
							<a href="<?php echo esc_url( $link ); ?>" <?php if ( $row->link_target == "on" ) {
								echo 'target="_blank"';
							} ?>><?php echo $portfolio_gallery_get_options['portfolio_gallery_ht_view0_linkbutton_text']; ?></a>
						</div>
					<?php } ?>
				</div>
			</div>

			<?php
		}
		?>
	</div>
</section>