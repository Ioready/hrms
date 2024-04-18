<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale_Controller extends CI_Controller
{
	public function __construct()
    {
            parent::__construct();
            $this->load->model('Sale_model');
			$this->load->model('Taxes_model');
            $this->load->model('Util_model');
            $this->load->helper('form');
            $this->load->helper('url');
            
    }
	public function index()
	{
		if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
			$data['customers'] = $this->Util_model->getCustomerWithBalance();
			
			$data['items'] = $this->Sale_model->getItems();
			$data['getAllTax'] = $this->Taxes_model->getAllTax();

			$data['records'] = $this->Sale_model->getDataLimit();
			$title = array('menu' => 'Invoice');
			$new_data = array_merge($data,$title);

			$this->load->view('includes/assets', $title);
			$this->load->view('includes/header', $title);
			
			$this->load->view('Sale_view', $new_data);
			$this->load->view('includes/footer_sale');
		
	}  
	public function quote()
	{
		if (!isset($_SESSION['saUserEmail'])) {
            redirect('home/logout');
        }
			$data['customers'] = $this->Util_model->getCustomerWithBalance();
			
			$data['items'] = $this->Sale_model->getItems();
			$data['getAllTax'] = $this->Taxes_model->getAllTax();

			$data['records'] = $this->Sale_model->getDataLimit_forQuote();
			$title = array('menu' => 'Quotes');
			$new_data = array_merge($data,$title);
			$this->load->view('includes/assets', $title);
			$this->load->view('includes/header', $title);
			
			$this->load->view('Quote_view', $new_data);
			$this->load->view('includes/footer_sale');
		
	} 

	public function insert()
	{ 
		$this->Sale_model->insert();//$this->printNow('Save');
		echo 1;
	}
	public function insert_quote()
	{ 
		$this->Sale_model->insert_quote();//$this->printNow('Save');
		echo 1;
	}
	public function printPDF()
	{
		$this->printNow('Print');
	}
	public function quote_printPDF()
	{
		$this->printNow('Quote');
	}
	
	
	public function getLastPurchasePrice()
	{
		$data['lastPurchasePrice'] = $this->Sale_model->getLastPurchasePrice();
		echo json_encode($data);
	}

	public function showDetailOnUpdate()
	{
		$data['records'] = $this->Sale_model->showDetail();
		$data['customerInfo'] = $this->Sale_model->getCustomerInfo();
		echo json_encode($data);
	}

	public function checkForUpdate()
	{
		if($this->Sale_model->checkForUpdate() == 1)
        {
        	$data = "cant";
        	echo json_encode($data);
        }
	}
	
	public function update()
	{
		$this->Sale_model->update();
		// $this->printNow('Update');
		echo 1;
	}
	
	public function update_quote()
	{
		$this->Sale_model->update_quote();
		// $this->printNow('Update');
		echo 1;
	}

	public function delete()
	{
		if($this->Sale_model->checkPossibility() == 1)
        {
        	$data = "yes";
        	echo json_encode($data);
        }
        else
        {
			$this->Sale_model->delete();
// 			$data['records'] = $this->Sale_model->getDataLimit();
// 			echo json_encode($data);
echo 1;
		}
	}

	public function loadAllRecords()
	{
		$data['records'] = $this->Sale_model->getDataAll();
		echo json_encode($data);
	}

	public function searchRecords()
	{
		$data['records'] = $this->Sale_model->searchRecords();
		echo json_encode($data);
	}


	public function getQuotations()
	{
		$this->load->model('Quotation_model');
		$data['records'] = $this->Quotation_model->getDataLimit();
		echo json_encode($data);
	}
	public function getAllQuotations()
	{
		$this->load->model('Quotation_model');
		$data['records'] = $this->Quotation_model->getDataAll();
		echo json_encode($data);
	}
	public function getQuotationProducts()
	{
		$data['records'] = $this->Sale_model->getQuotationProducts();
		echo json_encode($data);
	}
	public function getSaleDetial()
	{
		$data['saleDetail'] = $this->Sale_model->getSaleDetail();
		echo json_encode($data);
	}


	function numberTowords($number)
	{
		$no = round($number);
	    $decimal = round($number - ($no = floor($number)), 2) * 100;    
	    $digits_length = strlen($no);    
	    $i = 0;
	    $str = array();
	    $words = array(
	        0 => '',
	        1 => 'One',
	        2 => 'Two',
	        3 => 'Three',
	        4 => 'Four',
	        5 => 'Five',
	        6 => 'Six',
	        7 => 'Seven',
	        8 => 'Eight',
	        9 => 'Nine',
	        10 => 'Ten',
	        11 => 'Eleven',
	        12 => 'Twelve',
	        13 => 'Thirteen',
	        14 => 'Fourteen',
	        15 => 'Fifteen',
	        16 => 'Sixteen',
	        17 => 'Seventeen',
	        18 => 'Eighteen',
	        19 => 'Nineteen',
	        20 => 'Twenty',
	        30 => 'Thirty',
	        40 => 'Forty',
	        50 => 'Fifty',
	        60 => 'Sixty',
	        70 => 'Seventy',
	        80 => 'Eighty',
	        90 => 'Ninety');
	    $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
	    while ($i < $digits_length) {
	        $divider = ($i == 2) ? 10 : 100;
	        $number = floor($no % $divider);
	        $no = floor($no / $divider);
	        $i += $divider == 10 ? 1 : 2;
	        if ($number) {
	            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;            
	            $str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
	        } else {
	            $str [] = null;
	        }  
	    }
	    
	    $Rupees = implode(' ', array_reverse($str));
	    $paise = ($decimal) ? "And Paise " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
	    return ($Rupees ? 'Rupees ' . $Rupees : '') . $paise . " Only";
	}
	public function printNow($arg) 
	{
		$data['records'] = $this->Sale_model->getDataLimit();
		$rowId = -10;
		if($arg == "Update")
		{
			$rowId = $this->input->post('globalrowid');
		}
		else if($arg == "Save")
		{
			$rowId = $this->Sale_model->getDbNo();
		}
		else if($arg == "Print")
		{
			$rowId = $this->input->post('globalrowid');
			$header = 'Invoice';
			$order_type = 'Invoice';
			$data['products'] = $this->Sale_model->getProducts($rowId);

		}
		else if($arg == "Quote")
		{
			$rowId = $this->input->post('globalrowid');
			$header = 'Quote';
			$order_type = 'Quotation';
			$data['products'] = $this->Sale_model->getProducts_forQuote($rowId);

		}
		else
		{
			$rowId = $this->input->post('globalrowid');
		}

		$getSetting = getSetting();

		$logo = base_url($getSetting['invoice_logo']);
		$bottom = base_url('/assets/assets/img/bottom.jpg');
		$data['custInfo'] = $this->Sale_model->getCustInfo($rowId);



		$customer_name = $data['custInfo'][0]['customerName'];
		$invoice_date = date('d-M-Y', strtotime($data['custInfo'][0]['dbDt'] ));
		$customer_address = $data['custInfo'][0]['address'];
		// $invoiceNo = $data['products'][0]['InvoiceID'];
		// $invoiceNo =$getSetting['invoice_no'];
		$invoiceNo = intval($getSetting['invoice_no'])+1;

		// $dispatchNo =  $data['products'][0]['dispatchNo'];
		$orderID = $data['products'][0]['orderID'];
		$Remarks = $data['products'][0]['Remarks'];

		$RepName =$getSetting['RepName'];
		// $Sales_Office = $getSetting['Sales_Office'];
		$Customer_Ref = $getSetting['Customer_Ref']; 
		// $Account_No = $getSetting['Account_No'];
		// $Credit_Controller = $getSetting['Credit_Controller'];
		$Direct_Line = $getSetting['Direct_Line'];
		$Email = $getSetting['Email'];

		$fsc_certificate = $getSetting['fsc_certificate'];
		$terms_condition = $getSetting['terms_condition'];

		$discountPercent = $data['products'][0]['discount']; 

		// $remit_queries = $getSetting['remit_queries'];

		$vat_rate = $data['products'][0]['taxname'];
		$principle = $data['products'][0]['grandTotal'];
		$net_price = $data['products'][0]['grandTotal'];
		$gross_price = $net_price *(1+($vat_rate/100));
		$vat_amount = $gross_price - $net_price;
		$discount_amount = 0;
		if($discountPercent > 0){
			$getDiscount  = $discountPercent / 100 ;
			$discount_amount = $gross_price * $getDiscount;
			$gross_price = $gross_price - $discount_amount;
		}else{
			$gross_price = $gross_price;
		}

//////////Items table
$sn=1;
$itemRows =""; 
foreach ($data['products'] as $row) {
	
	$itemName = $row['itemName'].'  '.$row['codes'].'  '.$row['description'].'  '.$row['cutting_edged'];

	$itemRows .= '<tr class="tm_gray_bg">';
	$itemRows .= '<td class="tm_width_7"> '.$itemName.'</td>';
	$itemRows .= '<td class="tm_width_2">'. number_format((float)$row['qty'], 2) .'</td>';
	$itemRows .= '<td class="tm_width_2"> EACH </td>';
	$itemRows .= '<td class="tm_width_1">£'. number_format((float)$row['rate'], 2) .'</td>';
	$itemRows .= '<td class="tm_width_2 tm_text_right">£'. number_format((float)$row['netAmt'], 2) .'</td>';
	$itemRows .= '</tr>';
}

		$html = ' <div class="tm_container" style="font-family: Arial, Helvetica, sans-serif;">';
		$html .= '   <div class="tm_invoice_wrap">';
		$html .= '     <div class="tm_invoice tm_style2" id="tm_download_section">';
		$html .= '       <div class="tm_invoice_in">';
		$html .= '         <div class="tm_invoice_head tm_top_head tm_mb20">';
		$html .= '           <div class="tm_invoice_left">';
		$html .= '             <div class="tm_logo">';
		$html .= '               <img src="'.$logo.'" alt="">';
		$html .= '           </div>';
		$html .= '           </div>';
		$html .= '           <div class="tm_invoice_right">';
		$html .= '             <div class="tm_grid_row tm_col_2">';
		$html .= '               <div>';
		$html .= '                 <span class="tm_primary_color">'.$order_type.' No:</span> '.$invoiceNo.' <br>';
		$html .= '                 <span class="tm_primary_color">Date:</span> '.$invoice_date .' <br>';
		$html .= '                 <span class="tm_primary_color">Direct Line:</span> '.$Direct_Line.'<br>';
		$html .= '               </div>';
 
		$html .= '               <div>';
		$html .= '                 <span class="tm_primary_color" style="font-size: 40px; padding-right:30px;"> '.$header.' </span> <br>';
		// $html .= '                 Page 1 - Page 1 ' font-weight: 600;;
		$html .= '               </div>';

		$html .= '             </div>';
		$html .= '                 <p class="tm_primary_color">Email: '.$Email.'</p>';	 

		$html .= '           </div>';
		$html .= '         </div>';
		$html .= '         <div class="tm_invoice_info tm_mb10">';
		$html .= '           <div class="tm_invoice_info_left">';
		$html .= '             <p>';
		$html .= '               <span class="tm_f16 tm_primary_color">'.$header.' Order</span>';
		$html .= '             </p>';
		$html .= '           </div>';
		$html .= '           <div class="tm_invoice_info_right">';
		$html .= '             <div class="tm_grid_row tm_col_2 tm_invoice_info_in tm_accent_bg">';
// 		$html .= '               <div>';
// 		$html .= '                     </div>';
		$html .= '               <div>';
		$html .= '                 <span class="tm_white_color_60" style="color:black;">Delivery Address:</span> <br>';
		$html .= '                 <span class="tm_f16 tm_primary_color">'.$customer_name.'</span> <br>';
		$html .= '                 '.$customer_address.'<br>';
		$html .= '               </div>';
		
		$html .= '               <div>';
		$html .= '               </div>';
		
		$html .= '             </div>';
		$html .= '           </div>';
		$html .= '         </div>';
		$html .= '         <div class="tm_invoice_info_left">';
		$html .= '           <p>';
		$html .= '             <span class="tm_f16 tm_primary_color">Order Ref : </span>'.$orderID.' <br>';
		$html .= '           </p>';
		$html .= '         </div>';

		$html .= '         <div class="tm_invoice_info_left" style="width: 90%;">';
		$html .= '           <p>';
		$html .= '             <span class="tm_f16 tm_primary_color">Rep : </span>'.$RepName.' <br>';
		$html .= '           </p>';
		$html .= '         </div>';

		$html .= '         <div class="tm_invoice_info_left" style="width: 90%;">';
		$html .= '           <p>';
		$html .= '             <span class="tm_primary_color" >Any Queries on this invoice must be report to your Credit Controller within 72 hours of receipt</span>';
		$html .= '            ';
		$html .= '           </p>';
		$html .= '         </div>';
		$html .= '         <div class="tm_table tm_style1">';
		$html .= '           <div class="tm_round_border">';
		$html .= '             <div class="tm_table_responsive">';
		$html .= '               <table>';
		$html .= '                 <thead>';
		$html .= '                   <tr>';
		$html .= '                     <th class="tm_width_7 tm_semi_bold tm_accent_color">Product Code & Description</th>';
		$html .= '                     <th class="tm_width_2 tm_semi_bold tm_accent_color">Quantity</th>';
		$html .= '                     <th class="tm_width_1 tm_semi_bold tm_accent_color">Unit</th>';
		$html .= '                     <th class="tm_width_1 tm_semi_bold tm_accent_color">Unit Price (£)</th>';
		$html .= '                     <th class="tm_width_2 tm_semi_bold tm_accent_color tm_text_right">Value (£)</th>';
		$html .= '                   </tr>';
		$html .= '                 </thead>';
		$html .= '                 <tbody>'. $itemRows;
		$html .= '                   <tr >';
		$html .= '                     <td class="tm_width_7">';
		$html .= '                       ';
		$html .= '                   </tr>';

		$html .= '                   <tr class="tm_gray_bg">';
		$html .= '                   </tr>';
		$html .= '                 </tbody>';
		$html .= '               </table>';
		$html .= '             </div>';
		$html .= '           </div>';
		$html .= '           <div class="tm_invoice_footer tm_mb15 tm_m0_md">';
		$html .= '             <div class="tm_left_footer">';
		$html .= '               <div class="tm_card_note tm_ternary_bg"><b>Rate% </b><br>'.$vat_rate;
		$html .= '               </div>';
		$html .= '               <div class="tm_card_note tm_ternary_bg"><b>Principle </b><br>£'.$principle.'</div>';
		$html .= '               <div class="tm_card_note tm_ternary_bg"><b>VAT </b><br>£'.$vat_amount.'</div>';
		$html .= '               <div class="tm_card_note tm_ternary_bg"><b>Delivery% </b><br>'.$discountPercent.'</div>';


	if(!empty($Remarks)){
		$html .= '               <div><span class="tm_f16 tm_primary_color">Remarks : </span>'.$Remarks.' <br></div>';
}
		$html .= '             </div>';
		
		

		$html .= '             <div class="tm_right_footer">';
		$html .= '               <table class="tm_mb15">';
		$html .= '                 <tbody>';
		$html .= '                   <tr>';
		$html .= '                     <td class="tm_width_3 tm_primary_color tm_border_none" style="border: 1px solid #000!important;">Goods</td>';
		$html .= '                     <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none" style="border: 1px solid #000!important;">£'.number_format($principle,2).'</td>';
		$html .= '                   </tr>';
		$html .= '                  ';
		$html .= '                   <tr>';
		$html .= '                     <td class="tm_width_3 tm_primary_color tm_border_none" style="border: 1px solid #000!important;"> VAT@  '.$vat_rate.'%</td>';
		$html .= '                     <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none" style="border: 1px solid #000!important;">£'.number_format($vat_amount,2).'</td>';
		$html .= '                   </tr>';
		$html .= '                   <tr>';
		$html .= '                     <td class="tm_width_3 tm_primary_color tm_border_none" style="border: 1px solid #000!important;"> Delivery@  '.$discountPercent.'%</td>';
		$html .= '                     <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none" style="border: 1px solid #000!important;">£'.number_format($discount_amount,2).'</td>';
		$html .= '                   </tr>';
		$html .= '                   <tr>';
		$html .= '                     <td class="tm_width_3 tm_primary_color tm_border_none" style="background-color: #000!important;border-radius:5px;color:#fff!important;">Total</td>';
		$html .= '                     <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none" style="border: 1px solid #000!important;">£'.number_format($gross_price,2).'</td>';
		$html .= '                   </tr>';
		$html .= '                 </tbody>';
		$html .= '               </table>';
		$html .= '             </div>';
		$html .= '           </div>';
	if(!empty($fsc_certificate)){
		$html .= '             <p class="tm_mb2"><span class="tm_primary_color">'.$fsc_certificate.'</p>';
	}
	if(!empty($terms_condition)){
	    $html .= '   			<div class="tm_note tm_font_style_normal tm_text_center">';
		
		$html .= '  			<hr class="tm_mb15">';
		$html .= '             <p class="tm_m0">'.$terms_condition.'</p>';
		$html .= '         </div>';
	}
		$html .= '       </div>';
		$html .= '     </div>';
		$html .= '   </div>';
		$html .= ' </div>  ';


		$data['html'] = $html;

		echo json_encode($data);
	}	
}
