function ReplaceNumberWithCommas(yourNumber) {
    //Seperates the components of the number
    var n= yourNumber.toString().split(".");
    //Comma-fies the first part
    n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    //Combines the two sections
    return n.join(".");
}
jQuery(document).ready(function ($) {
	
	
 $("#commit").click(function(){  
 
  $monthly_income_wanted =  $('#monthly_income_wanted').val(); 
  $interest_rate =  $('#interest_rate').val(); 
  $tax_rate =  $('#tax_rate').val(); 
  $currency =  $('#currency').val(); 
	$result = (($monthly_income_wanted * 1200)/ parseFloat($interest_rate) ) ;  
	$result = Number($result).toFixed(2); 
	$result = ReplaceNumberWithCommas($result);
	 
	 
  $("#answer-mid").html(" <b>Answer: </br> You will only need $" + $result + " " + $currency + " to live on the interest of your capital.</b> </br>"
  
  +"</br> We have a program that will allow you to earn the equivalent of $"  + $result + " working part-time, and it doesn't require much time."
  
  );  
  
  
});


});