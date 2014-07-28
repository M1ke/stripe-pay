/*> ../jspp_imports/base.js */

$(function(){
	$('.stripe-pay').click(function(e){
		e.preventDefault();
		var value=$('[name="pay"]').val();
		if (!value){
			alert('You must enter a value to send a payment.');
			return false;
		}
		var handler=StripeCheckout.configure({
			key:$(this).data('stripe'),
			image:'http://gcskydiving.com/images/avatar-128.png',
			token:function(token){
				var $input=$('[name="stripe"]').val(token.id);
				$input.closest('form').submit();
			}
		});
		handler.open({
			name: 'Ground Control Skydiving'
			,description: 'Subscription ($'+value+')'
			,amount: (value*100)
			,email: 'info@gcskydiving.com'
			,currency: $('[name="currency"]').val()
			,panelLabel: 'Pay for Ground Control!'
		});
	}).removeClass('btn-warning').addClass('btn-primary').text('Pay now');
});