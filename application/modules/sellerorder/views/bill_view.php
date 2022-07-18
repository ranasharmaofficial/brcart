<?php
function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
}
?>
<style>
body {
    background-color: #000
}

.padding {
    padding: 2rem !important
}

.card {
    margin-bottom: 30px;
    border: none;
    -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22)
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid #e6e6f2
}

h3 {
    font-size: 20px
}

h5 {
    font-size: 15px;
    line-height: 26px;
    color: #3d405c;
    margin: 0px 0px 15px 0px;
    font-family: 'Circular Std Medium'
}

.text-dark {
    color: #3d405c !important
}
</style>
<link rel="icon"  type="image/x-icon" href="<?php echo WEB_PATH_ADMIN.'img/favicon.png?v='.CSS_JS_VERSION;?>"/>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
     <div class="card">
         <div class="card-header p-4">
             <a class="pt-2 d-inline-block" href="<?php echo WEB_URL; ?>" data-abc="true"><span><img style="height:80px;" src="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $invoiceLogo; ?>"></a>
             <div class="float-right">
                 <h5 class="mb-0">Tax invoice/Bill of supply/Cash Memo</br>(Original for Recipient)</h5>
            </div>
         </div>
         <div class="card-body">
             <div class="row mb-4">
				<div style="margin-left:20px;" class="col-sm-12">
					<p class="text-dark mb-1"><small>Digitally Signed by : <?php echo $details['shop_name']; ?></small></p>
					<p class="text-dark mb-1"><small>Date : <?php echo $details['order_date']; ?></small></p>
					<p class="text-dark mb-1"><small>Reason : Invoice</small></p>
                </div>
                 <div class="col-sm-6 pt-2">
                     <h5 class="mb-1">Solb by:</h5>
                     <h3 class="text-dark mb-1"><?php echo $details['shop_name']; ?></h3>
                     <div><?php echo $details['shop_address']; ?>,</div>
                     <div><?php echo $details['city']; ?>,<?php echo $details['state']; ?> <?php echo $details['zip']; ?></div>
                     <div>Email: <?php echo $details['email']; ?></div>
                     <div>Phone: +91 <?php echo $details['seller_mobile']; ?></div>
                 </div>
				  <div class="col-sm-6 pt-2 ">
                     <h5 class="mb-3">Shipping Address:</h5>
                     <h3 class="text-dark mb-1"><?php echo $details['user_name']; ?></h3>
                     <div><?php echo $details['house_no']; ?>, <?php echo $details['address']; ?>, <?php echo $details['landmark']; ?></div>
                     <div><?php echo $details['city']; ?>, <?php echo $details['state']; ?>, <?php echo $details['pin']; ?></div>
                     <div>Phone: <?php echo $details['mobile']; ?></div>
                 </div>
				 <div class="col-sm-6 pt-3">
                     <div><strong>Pan No.:&nbsp;</strong><?php echo $details['gst']; ?></div>
                     <div><strong>GST:&nbsp;</strong><?php echo $details['pan']; ?>,</div>
                  </div>
				 <div class="col-sm-6 pt-3">
                     <h5 class="mb-3">Billing Address:</h5>
                     <h3 class="text-dark mb-1"><?php echo $details['user_name']; ?></h3>
                     <div><?php echo $details['house_no']; ?>, <?php echo $details['address']; ?>, <?php echo $details['landmark']; ?></div>
                     <div><?php echo $details['city']; ?>, <?php echo $details['state']; ?>, <?php echo $details['pin']; ?></div>
                     <div>Phone: <?php echo $details['mobile']; ?></div>
                     <div><strong>Place of supply:</strong> <span style="text-transform:uppercase;"><?php echo $details['state']; ?></span></div>
                     <div><strong>Place of delivery:</strong> <span style="text-transform:uppercase;"><?php echo $details['state']; ?></span></div>
                 </div>
				 
				 <div class="col-sm-6 pt-3">
                     <div><strong>Order Number:&nbsp;</strong><?php echo $details['order_no']; ?></div>
                     <div><strong>Order Date:&nbsp;</strong><?php echo $details['order_date']; ?></div>
                  </div>
				  <div class="col-sm-6 pt-3">
                     <div><strong>Invoice Number:&nbsp;</strong><?php echo $details['order_no']; ?></div>
                     <div><strong>Invoice Details:&nbsp;</strong><?php echo $details['order_date']; ?></div>
                     <div><strong>Invoice Date:&nbsp;</strong><?php echo $details['order_date']; ?></div>
                  </div>
				
				 
             </div>
             <div class="table-responsive-sm">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <th class="center">Sl.No.</th>
                             <th>Description</th>
                             <th class="right">MRP</th>
                             <th class="right">Unit Price</th>
                             <th class="center">Qty</th>
                             <th class="center">Net Amount</th>
                             <th class="center">Tax Rate</th>
                             <th class="center">Tax Amount</th>
                             <th class="right">Total</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td class="center">1</td>
                             <td class="left strong"><?php echo $details['product_name'];?></td>
                             <td class="right"><?php echo getNumberFormat($details['previous_price']);?></td>
                             <td class="right"><?php echo getNumberFormat($details['without_gst_price']);?></td>
                             <td class="center"><?php echo $details['qty'];?></td>
                             <td class="center"><?php echo getNumberFormat($details['qty']*$details['without_gst_price']); ?></td>
                             <td class="center"><?php echo $details['gst_percentage'];?>&nbsp;%</td>
                             <td class="center"><?php echo $details['gst_amount']*$details['qty'];?></td>
                              <td class="right"><?php echo getNumberFormat($details['qty']*$details['product_price']) ;?></td>
							<?php $subTotal = $details['qty']*$details['product_price']; ?>
						</tr>
                          
                     </tbody>
                 </table>
             </div>
             <div class="row">
                 <div class="col-lg-4 col-sm-5">
                 </div>
                 <div class="col-lg-4 col-sm-5 ml-auto">
                     <table class="table table-clear">
                         <tbody>
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">Subtotal</strong>
                                 </td>
                                 <td class="right"><?php echo getNumberFormat($subTotal); ?></td>
                             </tr>
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">Discount (20%)</strong>
                                 </td>
                                 <td class="right">$5,761,00</td>
                             </tr>
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">VAT (10%)</strong>
                                 </td>
                                 <td class="right">$2,304,00</td>
                             </tr>
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">Total</strong> </td>
                                 <td class="right">
                                     <strong class="text-dark">$20,744,00</strong>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
		 <?php if(false) { ?>
         <div class="card-footer bg-white">
             <p class="mb-0">BBBootstrap.com, Sounth Block, New delhi, 110034</p>
         </div>
		 <?php } ?>
     </div>
 </div>