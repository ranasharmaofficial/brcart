 <!--products list-->
                        <div class="on_list_view_false products nt_products_holder row fl_center row_pr_1 cdt_des_1 round_cd_false nt_cover ratio_nt position_8 space_30 nt_default">
                            <?php
				if(is_array($getAllCategoryRana) && count($getAllCategoryRana) > 0) {
					foreach ($getAllCategoryRana as $val) {
						?>
							<div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                <div class="product-inner pr">
                                    <div class="product-image pr oh lazyload">
                                        <span class="tc nt_labels pa pe_none cw"><span class="nt_label new">New</span></span>
                                        <a class="d-block" href="<?php echo WEB_URL.'item/'.$val['slug'];?>">
                                            <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__127_571" data-bgset="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>"></div>
                                        </a>
                                        <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                            <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__127_571" data-bgset="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>"></div>
                                        </div>
                                        <div class="nt_add_w ts__03 pa ">
                                            <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right"><span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i></a>
                                        </div>
                                        <div class="hover_button op__0 tc pa flex column ts__03">
                                            <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#"><span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span></a>
                                            <a href="#" class="pr pr_atc cd br__40 bgw tc dib js__qs cb chp ttip_nt tooltip_top_left"><span class="tt_txt">Quick Shop</span><i class="iccl iccl-cart"></i><span>Quick Shop</span></a>
                                        </div>
                                        <div class="product-attr pa ts__03 cw op__0 tc">
                                            <p class="truncate mg__0 w__100">XS, S, M, L, XL</p>
                                        </div>
                                    </div>
                                    <div class="product-info mt__15">
                                        <h3 class="product-title pr fs__14 mg__0 fwm">
                                            <a class="cd chp" href="<?php echo WEB_URL.'item/'.$val['slug'];?>"><?php echo $val['name']; ?></a>
                                        </h3>
                                        <span class="price dib mb__5">Rs&nbsp;<?php echo $val['price']; ?></span>
                                        
                                    </div>
                                </div>
                            </div>
                            <?php
					}
				}
				?>
				
                        </div>
                        <!--end products list-->
<ul class="pagination">
	<?php echo $pagelinks ?>
</ul>
                        <!--navigation-->
                        <div class="products-footer tc mt__40">
                            <nav class="nt-pagination w__100 tc paginate_ajax">
                                <ul class="pagination-page page-numbers">
                                    <li><a class="prev page-numbers" href="#">Prev</a></li>
                                    <li><span class="page-numbers">1</span></li>
                                    <li><a class="page-numbers current" href="#">2</a></li>
                                    <li><a class="page-numbers" href="#">3</a></li>
                                    <li><a class="page-numbers" href="#">4</a></li>
                                    <li><a class="next page-numbers" href="#">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!--end navigation-->